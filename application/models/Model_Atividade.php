<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Atividade extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function retornaAtividades() {
        return $this->db->query("select a.*, ta.* from atividades as a INNER JOIN tipo_atividade as ta on ta.id_tipo_atividade = a.id_tipo_atividade ORDER BY id_atividade DESC")->result();
    }

    public function retornaAtividadeID($id) {
        $this->db->where('id_atividade', $id);
        return $this->db->get('atividades')->result();
    }

    public function retornaTiposAtividades() {
        return $this->db->get('tipo_atividade')->result();
    }

    public function update($data, $id) {
        $this->db->where('id_atividade', $id);
        $this->db->update('atividades', $data);
    }

    public function salvar($data) {
        $this->db->insert('atividades', $data);
    }

    public function deletar($id) {
        $this->db->where('id_atividade', $id);
        $this->db->delete('atividades');
    }

    public function retornaListaInscritos($id) {
        return $this->db->query("select i.*, a.*, p.nome_pessoa, p.email_pessoa, p.id_pessoa, p.celular_pessoa, p.cpf_pessoa, t.* from inscricoes_atividades as i INNER JOIN pessoa as p on p.id_pessoa = i.id_pessoa INNER JOIN atividades as a on a.id_atividade = i.id_atividade INNER JOIN tipo_atividade as t on t.id_tipo_atividade = a.id_tipo_atividade WHERE a.id_atividade=$id")->result();
    }

    public function retornaPessoa($nome, $id) {
        return $this->db->query("select i.*, a.*, p.nome_pessoa, p.email_pessoa, p.id_pessoa, p.celular_pessoa, p.cpf_pessoa, t.* from inscricoes_atividades as i INNER JOIN pessoa as p on p.id_pessoa = i.id_pessoa INNER JOIN atividades as a on a.id_atividade = i.id_atividade INNER JOIN tipo_atividade as t on t.id_tipo_atividade = a.id_tipo_atividade WHERE a.id_atividade=$id and p.nome_pessoa LIKE '%$nome%'")->result();
    }

    public function liberarCert($data, $id) {
        $this->db->where('id_inscricao', $id);
        $this->db->update('inscricoes_atividades', $data);
    }

    public function retornaTipoAtividades() {
        return $this->db->get('tipo_atividade')->result();
    }

    public function buscarTipoAtividade($id) {
        $this->db->where('id_tipo_atividade', $id);
        return $this->db->get('tipo_atividade')->result();
    }

    public function salvarTipoAtividade($data) {
        $this->db->insert('tipo_atividade', $data);
    }

    public function atividadesalvarEdicaoTipoAtividade($data, $id) {
        $this->db->where('id_tipo_atividade', $id);
        $this->db->update('tipo_atividade', $data);
    }

    public function deletarTipoAtividade($id) {
        $this->db->where('id_tipo_atividade', $id);
        $this->db->delete('tipo_atividade');
    }
    
    public function retornaFuncoes() {
        return $this->db->get('papeis')->result();
    }
    
     public function deletarPapel($id) {
        $this->db->where('id_papel', $id);
        $this->db->delete('papeis');
    }
    
    public function buscarPapel($id) {
        $this->db->where('id_papel', $id);
        return $this->db->get('papeis')->result();
    }
    
    public function salvarEdicaoPapel($data, $id) {
        $this->db->where('id_papel', $id);
        $this->db->update('papeis', $data);
    }
    
    public function salvarFuncao($data) {
        $this->db->insert('papeis', $data);
    }

      public function deletarParticipanteAtividade($id) {
        $this->db->where('id_inscricao', $id);
        $this->db->delete('inscricoes_atividades');
    }
    

}
