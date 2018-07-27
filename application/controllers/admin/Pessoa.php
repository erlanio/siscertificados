<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->helper('uteis');
    }

    public function index() {
        $data['categorias'] = $this->categorias->retornaCategorias();
        $data['estados'] = $this->cidEstados->retornaEstados();

        $this->load->view('header');
        $this->load->view('cadastro-pessoa', $data);
        $this->load->view('footer');
    }

    public function getCidades() {
        $id_estado = $this->input->post('id_estado');
        echo $this->cidEstados->selectedCidades($id_estado);
    }

    public function salvarPessoa() {
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = preg_replace("/\D+/", "", $this->input->post('cpf'));
        $telefone = $this->input->post('celular');        


        $senhaParteInicial = substr($cpf, 0, -8);    // PEGA OS 3 ULTIMOS DÍGITOS DO CPF
        $senhaParteFinal = substr($cpf, -3);    // PEGA OS 3 ULTIMOS DÍGITOS DO CPF
        $senha = $senhaParteInicial.$senhaParteFinal;
        //remove a máscara do telefone e add no array que será enviado para o model
        $data['celular_pessoa'] = preg_replace("/\D+/", "", $telefone);        
        $data['nome_pessoa'] = $nome;
        $data['cpf_pessoa'] = $cpf;
        $data['email_pessoa'] = $email;
        $data['senha_pessoa'] = $senha;
        
        
        if($this->verificaCadastroCPF($cpf, $email) == false){
            //se o usuario não for cadastrado no sistema CADASTRA
             $this->pessoa->salvar($data);
             echo 1;
        }else{
            //RETORNA 2 SE O USUÁRIO JÁ EXISTIR CADASTRADO NO SISTEMA
            echo "2";
        }
        
    }
    
    public function verificaCadastroCPF($cpf, $email) {
        $data['pessoa'] = $this->pessoa->buscaCPF($cpf, $email);
        
        if($data['pessoa'] == 0){
            return false;
        }else{
            return true;
        }
    }

   
}
