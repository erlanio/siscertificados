<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SubTrabalho extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Evento', 'evento');
        $this->load->model('Model_Inscricoes', 'inscricoes');
        $this->load->model('Model_SubTrabalhos', 'subTrabalho');
        $this->verificaLogado();
        $this->load->helper('uteis_helper');
    }

    public function sub_trabalho() {
        if ($id_evento = $this->uri->segment('4')) {
            $id_usuario = $this->session->userdata('usuario')->id_pessoa;

            $data['inscricao'] = $this->inscricoes->retornaInscricaoPorIdPessoaeEvento($id_evento, $id_usuario);
            foreach ($data['inscricao'] as $ins) {
                $id_inscricao = $ins->id_inscricao;
            }


            $data['sub_trabalho'] = $this->subTrabalho->retornaSubTrabalhoInscricaoCorreto($id_inscricao);
            $data['num_sub'] = $this->subTrabalho->retornaNumSubPorInscricao($id_inscricao);



            $dados['evento'] = $this->evento->retornaEventoID($id_evento);
            foreach ($dados['evento'] as $evento) {
                $tem_submissao = $evento->tem_submissao;
            }
            if ($tem_submissao == "s" || $tem_submissao == "S") {
                if (!$this->inscricoes->verificaInscricao($id_evento, $id_usuario) == "") {
                    if (!($data['gt_evento_area'] = $this->subTrabalho->retornaGTEvento($id_evento))) {
                        if (!$data['gt_evento'] = $this->subTrabalho->retornaSubTrabalhoPorEvento($id_evento)) {
                            redirect(base_url('admin/Inscricoes'));
                        }
                    }
                    $this->load->view('admin/header');
                    $this->load->view('admin/menu');
                    $this->load->view('admin/sub_trabalho', $data);
                    $this->load->view('footer');
                } else {
                    redirect(base_url('admin/Inscricoes'));
                }
            } else {
                redirect(base_url('admin/Inscricoes'));
            }
        } else {
            redirect(base_url('admin/Inscricoes'));
        }
    }

    public function inserirSubTrabalho() {
        $id_evento = $this->input->post('id_evento');
        $area_tematica = $this->input->post('area-tematica');
        $id_pessoa = $this->session->userdata('usuario')->id_pessoa;
        $titulo = $this->input->post('titulo');
        $resumo = $this->input->post('resumo');
        $modalidade = $this->input->post('modalidade');
        $palavras_chave = $this->input->post('palavras-chave');
        $orientador = $this->input->post('orientador');
        $coautor_1 = $this->input->post('coautor1');
        $coautor_2 = $this->input->post('coautor2');
        $coautor_3 = $this->input->post('coautor3');
        $coautor_4 = $this->input->post('coautor4');
        $coautor_5 = $this->input->post('coautor5');
        $coautor_6 = $this->input->post('coautor6');


        $data2['inscricao'] = $this->inscricoes->retornaInscricaoPorIdPessoaeEvento($id_evento, $id_pessoa);
        foreach ($data2['inscricao'] as $ins) {
            $id_inscricao = $ins->id_inscricao;
        }


        $data['id_inscricao'] = $id_inscricao;
        $data['id_gt_evento'] = $area_tematica;
        $data['titulo'] = $titulo;
        $data['resumo'] = $resumo;
        $data['palavras_chaves'] = $palavras_chave;
        $data['arquivo'] = "";
        $data['id_tipo_trabalho'] = $modalidade;
        $data['orientador'] = $orientador;
        $data['coautor_1'] = $coautor_1;
        $data['coautor_2'] = $coautor_2;
        $data['coautor_3'] = $coautor_3;
        $data['coautor_4'] = $coautor_4;
        $data['coautor_5'] = $coautor_5;
        $data['dt_sub'] = date('Y-m-d');
        if ($modalidade == 1) {

            if (!isset($_FILES['sub-trabalho-file'])) {

                $this->subTrabalho->inserirTrabalho($data);
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                . "';"
                . "alert('sucesso!');"
                . "</script>";
            } else {
                $titulo_arquivo = strtolower(url_title($titulo));
                $titulo_arquivo = convert_accented_characters($titulo_arquivo);

                $arquivo = $_FILES['sub-trabalho-file'];
                $data['arquivo'] = $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo . ".pdf";

                $configuracao = array(
                    'upload_path' => 'assets/pdf/sub_trabalhos/',
                    'allowed_types' => 'pdf',
                    'file_name' => $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo,
                );
                $this->load->library('upload');
                $this->upload->initialize($configuracao);
                if ($this->upload->do_upload('sub-trabalho-file')) {


                    //EMAIL   
                    $data3['evento'] = $this->evento->retornaEventoID($id_evento);

                    foreach ($data3['evento'] as $evento) {
                        $nome_evento = $evento->titulo;
                        $responsavel = $evento->email_evento;
                    }


                    $nomeGt = $this->getNomeGtPorId($area_tematica);
                    $corpo = "<strong>Submissão de Trabalho:</strong><br>"
                            . "<strong>Título do trabalho: $titulo</strong><br>"
                            . "<strong>Data da Inscrição: </strong>" . date('d/m/Y') . " às " . date('h:i:s') . "<br>"
                            . "<strong>Aréa da submissão:</strong> $nomeGt <br>";
                    $anexo = base_url('/assets/pdf/sub_trabalhos/' . $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo . ".pdf");

                    enviar_email($this->session->userdata('usuario')->email, 'SISTEMA DE EVENTOS', $corpo, $anexo, $responsavel);
                    //fim email

                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                    . "';"
                    . "alert('sucesso!');"
                    . "</script>";
                    $this->subTrabalho->inserirTrabalho($data);
                } else {
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                    . "';"
                    . "alert('Formato de arquivo não permitido');"
                    . "</script>";
                    echo $this->upload->display_errors();
                }
            }
        }else{
             echo "<script>"
                    . "window.location.href = '"
                    . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                    . "';"
                    . "alert('okokok');"
                    . "</script>";
        }
    }

    public function apagarSubTrabalho() {
        $id_submissao = $this->input->post('id_submissao');
        $id_usuario = $this->session->userdata('usuario')->id_pessoa;
        $id_evento = $this->input->post('id_evento');
        if (!$this->inscricoes->verificaInscricao($id_evento, $id_usuario) == "") {
            if ($this->subTrabalho->apagarSubTrabalho($id_submissao)) {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                . "';"
                . "alert('Apagado com sucesso!');"
                . "</script>";
            }
        } else {
            echo 'erlanio';
        }
    }

    public function editarTrabalho() {

        $id_evento = $this->input->post('id_evento');
        $area_tematica = $this->input->post('area-tematica');
        $modalidade = $this->input->post('modalidade');
        $titulo = $this->input->post('titulo');
        $resumo = $this->input->post('resumo');
        $palavras_chave = $this->input->post('palavras-chave');
        $orientador = $this->input->post('orientador');
        $coautor_1 = $this->input->post('coautor1');
        $coautor_2 = $this->input->post('coautor2');
        $coautor_3 = $this->input->post('coautor3');
        $coautor_4 = $this->input->post('coautor4');
        $coautor_5 = $this->input->post('coautor5');
        $coautor_6 = $this->input->post('coautor6');
        $id_submissao = $this->input->post('id_submissao');
        $id_usuario = $this->session->userdata('usuario')->id_pessoa;


        $data['id_gt_evento'] = $area_tematica;
        $data['titulo'] = $titulo;
        $data['resumo'] = $resumo;
        $data['id_tipo_trabalho'] = $modalidade;
        $data['palavras_chaves'] = $palavras_chave;
        $data['orientador'] = $orientador;
        $data['coautor_1'] = $coautor_1;
        $data['coautor_2'] = $coautor_2;
        $data['coautor_3'] = $coautor_3;
        $data['coautor_4'] = $coautor_4;
        $data['coautor_5'] = $coautor_5;



        if ($_FILES['sub-trabalho-file-upload']['name'] == "") {


            $data['arquivo'] = $this->input->post('arquivo');
            $this->subTrabalho->editarSubTrabalho($id_submissao, $data);
            echo "<script>"
            . "window.location.href = '"
            . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
            . "';"
            . "alert('Sucesso!');"
            . "</script>";
        } else {
            $titulo_arquivo = strtolower(url_title($titulo));
            $titulo_arquivo = convert_accented_characters($titulo_arquivo);

            //  retorna a id de inscricao 
            $data2['inscricao'] = $this->inscricoes->retornaInscricaoPorIdPessoaeEvento($id_evento, $id_usuario);
            foreach ($data2['inscricao'] as $ins) {
                $id_inscricao = $ins->id_inscricao;
            }

            //retorna dados da inscricao pelo id de inscricao
            $data2['nome_arquivo'] = $this->subTrabalho->retornaSubTrabalhoInscricao($id_inscricao);
            foreach ($data2['nome_arquivo'] as $dados) {
                $ultimas = substr($dados->arquivo, -10);
                $nome_arquivo = $dados->arquivo;
            }

            //DELETA O ARQUIVO EXISTENTE NA SUBMISSÃO
            $nomeArquivo = $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo . "-update.pdf";
            unlink('assets/pdf/sub_trabalhos/' . $nomeArquivo);
            //*****************//

            $arquivo = $_FILES['sub-trabalho-file-upload'];
            $data['arquivo'] = $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo . "-update.pdf";

            $configuracao = array(
                'upload_path' => 'assets/pdf/sub_trabalhos/',
                'allowed_types' => 'pdf',
                'file_name' => $id_evento . "-" . $area_tematica . "-" . $titulo_arquivo . "-update.pdf",
            );
            $this->load->library('upload');

            $this->upload->initialize($configuracao);

            if ($this->upload->do_upload('sub-trabalho-file-upload')) {
                echo "<script>"
                . "window.location.href = '"
                . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
                . "';"
                . "alert('sucesso!');"
                . "</script>";
                $this->subTrabalho->editarSubTrabalho($id_submissao, $data);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    /*
      if ($this->inscricoes->verificaInscricao($id_evento, $id_usuario)) {
      $this->subTrabalho->editarSubTrabalho($id_submissao, $data);
      echo "<script>"
      . "window.location.href = '"
      . base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento)
      . "';"
      . "alert('Alterado com sucesso!');"
      . "</script>";

      } else {
      redirect();
      }
     * */

    public function verificaLogado() {

        if (!$this->session->userdata('usuario_logado')) {
            echo "<script>"
            . "window.location.href = '"
            . base_url('Login')
            . "';"
            . "alert('Você não efetuou login!');"
            . "</script>";
        }
    }

    public function getNomeGtPorId($id_gt) {
        $data['gt_nome'] = $this->subTrabalho->retornaGtEventoId($id_gt);

        foreach ($data['gt_nome'] as $dados) {
            return $dados->descricao;
        }
    }

}
