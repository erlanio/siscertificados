<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Categoria', 'categorias');
        $this->load->model('Model_Evento', 'eventos');
        $this->load->model('Model_Solicitacoes', 'solicitacoes');
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->model('Model_Categoria', 'categorias');
        $this->load->model('Model_Cidade_Estados', 'cidEstados');
        $this->load->model('Model_Portal', 'portal');
        $this->load->helper('uteis_helper');
    }

    public function site() {
        $sigla = $this->uri->segment(2);

        $data['portal'] = $this->portal->retornaPortalSigla($sigla);
        $data['numDias'] = $this->portal->retornaNumDias($sigla);
        $data['dias'] = $this->portal->retornaDias($sigla);

        if($data['portal']){
            $this->load->view('portal/index', $data);
        }else{
            redirect(base_url());
        }
        
    }

 
}
