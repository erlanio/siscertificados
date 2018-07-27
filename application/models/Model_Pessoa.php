<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Pessoa extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function salvar($data) {
        $this->db->insert('pessoa', $data);
        return true;
    }

    public function retornaEmailSenha($email, $senha) {
        $this->db->where("email_pessoa", $email);
        $this->db->where("senha_pessoa", $senha);
        $usuario = $this->db->get("pessoa");
        return $usuario->result();
    }

    public function buscaCPF($cpf, $email) {
        return $this->db->query("SELECT * FROM pessoa where cpf_pessoa = '$cpf' or email_pessoa = '$email'")->num_rows();
        
    }

    public function retornaPessoaEmail($email) {
        $this->db->where('email', $email);
        $dados = $this->db->get('cadastro');
        return $dados->result();
    }

    public function atualizarPessoa($id, $data2) {
        $this->db->where('id_pessoa', $id);
        $this->db->update('cadastro', $data2);
    }

    public function verificaRecuperarEmail($cpf, $dtNascimento, $nome) {
        $this->db->where('cpf', $cpf);
        $this->db->where('dt_nascimento', $dtNascimento);
        $this->db->where('nome', $nome);
        return $this->db->get('cadastro')->result();
    }

    public function alterarEmail($cpf, $data) {
        $this->db->where('cpf', $cpf);
        $this->db->update('cadastro', $data);
    }

    public function atualizarNivelUsuario($id, $data) {
        $this->db->where('id_pessoa', $id);
        $this->db->where('nivel_usuario <', '2');
        $this->db->update('cadastro', $data);
    }

    public function retornaPessoaID($id) {
        $this->db->where('id_pessoa', $id);
        return $this->db->get('cadastro')->result();
    }

    public function verificaAdmin($id_pessoa, $id_evento) {
        $this->db->where('id_evento', $id_evento);
        $this->db->where('id_pessoa', $id_pessoa);
        return $this->db->get('config_admin')->num_rows();
    }

    public function inserirAdmin($data) {
        $this->db->insert('config_admin', $data);
    }

}
