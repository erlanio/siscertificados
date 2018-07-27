<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Certificado extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function buscarNomeCertificado($nome) {
        $this->db->like('nome_pessoa', $nome);
        return $this->db->get('pessoa')->result();
    }
    
}
