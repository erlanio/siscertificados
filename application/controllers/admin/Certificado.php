<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Certificado extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Model_Atividade', 'atividade');
        $this->load->model('Model_Certificado', 'certificado');

        $this->load->helper('uteis_helper');

        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        } else {
            if ($this->session->userdata('usuario')->nivel_usuario == 0 || $this->session->userdata('usuario')->nivel_usuario == 1) {
                redirect(base_url('admin/Inscricoes'));
            }
        }
    }

    function index() {

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/certificado');
        $this->load->view('footer');
    }

    public function gerar() {

        $data['tipoAtividades'] = $this->atividade->retornaTipoAtividades();

        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/gerarCertificado', $data);
        $this->load->view('footer');
    }

    public function buscarNomeCertificado() {
        $nome = $this->input->post('nome');
        
        $data['pessoa'] = $this->certificado->buscarNomeCertificado($nome);

        if (!empty($data['pessoa'])) {
            echo "<table class='table table-hover thead col-md-8' id='table-lista-inscritos'>
                        <thead>
                            <tr>  
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                
                            </tr>
                        </thead>";

            foreach ($data['pessoa'] as $dados) {
                $id_pessoa = $dados->id_pessoa;
                $nome = $dados->nome_pessoa;
                $email = $dados->email_pessoa;
                $cpf = $dados->cpf_pessoa;
                 echo "
                            <tbody>
                            <td>$id_pessoa</td>
                            <td>$nome</td>                            
                            <td>$email</td>
                            <td>$cpf</td>
                            <td><buttom class='btn btn-success'>Selecionar</buttom></td>
                            <td>";
            }
        }else{
            echo "<div class='col-md-12'>
            
                    <div class='alert alert-danger'>Pessoa não encontrada...<buttom class='btn btn-success'  data-toggle='modal' data-target='#modal-cadastrar-pessoa'>Cadastrar Pessoa</buttom></div>
                                   
                    </div>";
        }
    }
    
    
 
}
