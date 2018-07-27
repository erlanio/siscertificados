<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitacoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Evento', 'evento');
        $this->load->model('Model_Inscricoes', 'inscricoes');
        $this->load->model('Model_Relatorios', 'relatorios');
        $this->load->model('Model_Avaliacao_Sub', 'avaliacao');
        $this->load->model('Model_Certificado', 'certificado');
        $this->load->model('Model_Solicitacoes', 'solicitacoes');
        $this->load->helper('uteis_helper');

        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
    }

    public function index() {

        $data['solicitacao'] = $this->solicitacoes->getSolicitacao();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/solicitacoes', $data);
        $this->load->view('footer');
    }

    public function buscar() {
        $id = $this->input->post('id');
        $data['solicitacoes'] = $this->solicitacoes->buscarId($id);

        foreach ($data['solicitacoes'] as $dados) {
            $id = $dados->id_solicitacao;
            $evento = $dados->nome_evento;
            $solicitante = $dados->nome_solicitante;
            $justificativa = $dados->justificativa;
            $email = $dados->email;
            $telefone = $dados->telefone;
            $dataSol = data_br($dados->data_solicitacao);
            $categoria = $dados->categoria_solicitante;
        }

        echo "<div class='panel panel-primary'>
                    <div class='panel-heading'>
                    <h3 class='panel-title'>$evento</h3>
                    </div>
                    <div class='panel-body'>
                    <p><strong>Solicitante</strong>: $solicitante</p>                        
                    <div class='form-group'>
                    <label for='comment'>Justificativa:</label>
                    <textarea class='form-control' disabled rows='5'>$justificativa</textarea>
                    </div> 
                    <p><strong>Email</strong>: $email</p>
                    <p><strong>Telefone</strong>: $telefone</p>
                    <p><strong>Data</strong>: $dataSol</p>                                     
                    <p><strong>Solicitante</strong>: $categoria</p>                 
                    <button type='button' onclick=\"deferirSolicitacao('$id', 'n');\" class='btn btn-danger  col-md-5'> <i class='glyphicon glyphicon-remove'></i> Indeferir</button>
                    <button type='button' onclick=\"deferirSolicitacao('$id', 's');\" class='btn btn-success col-md-offset-2 col-md-5' id='btn-enviar-solicitacao'> <i class='glyphicon glyphicon-ok'></i> Deferir</button>
                    </div>
                </div>";
    }

    public function deferir() {
        $deferido = $this->input->post('deferido');
        $id = $this->input->post('id');

        $data['deferido'] = $deferido;
        $this->solicitacoes->deferir($data, $id);

        $data['solicitacoes'] = $this->solicitacoes->buscarId($id);

        foreach ($data['solicitacoes'] as $dados) {
            $id = $dados->id_solicitacao;
            $evento = $dados->nome_evento;
            $solicitante = $dados->nome_solicitante;
            $justificativa = $dados->justificativa;
            $email = $dados->email;
            $telefone = $dados->telefone;
            $dataSol = data_br($dados->data_solicitacao);
        }

        if ($deferido == 's') {

            $corpo = "Antecipadamente agradecemos sua solicitação para cadastro do evento: $evento, sua solicitação foi <strong>DEFERIDA</strong><br>
            <h4>Segue os passos para continuar o processo de cadastramento:</h4><br>
            1 - Acesse o link <a href='http://cev.urca.br/siseventos/home/cadastroEvento'>Clique aqui </a><br>
            2 - Preencha todas as informações<br>
            3 - Aguarde o nosso retorno ( em torno de 48 horas ).";
        } else {

            $corpo = "Antecipadamente agradecemos sua solicitação para cadastro do evento: $evento, seu evento foi Indeferido<br>";
        }

        enviar_email($email, $evento, $corpo);
    }

    public function cadastro() {
        $data['solicitacao'] = $this->solicitacoes->getSolicitacao();
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/solicitacoes', $data);
        $this->load->view('footer');
    }

}
