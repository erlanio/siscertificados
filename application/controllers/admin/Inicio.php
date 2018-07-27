<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
       
        $this->load->model('Model_Atividade', 'atividade');
        $this->load->helper('uteis_helper');

        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        } else {
            if ($this->session->userdata('usuario')->nivel_usuario == 0 || $this->session->userdata('usuario')->nivel_usuario == 1) {
                redirect(base_url('admin/Inscricoes'));
            }
        }
    }
    
    public function index() {
        $data['tipoAtividades'] = $this->atividade->retornaTipoAtividades();
        $data['funcoes'] = $this->atividade->retornaFuncoes();
        
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('admin/inicio',$data);
        $this->load->view('footer');
    }
}