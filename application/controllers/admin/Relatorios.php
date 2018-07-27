<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Evento', 'evento');
        $this->load->model('Model_Inscricoes', 'inscricoes');
        $this->load->model('Model_Relatorios', 'relatorios');
        $this->load->model('Model_Avaliacao_Sub', 'avaliacao');
        $this->load->model('Model_Certificado', 'certificado');
        $this->load->model('Model_Atividade', 'atividade');
        $this->load->model('Model_SubTrabalhos', 'submissao');
        $this->load->model('Model_Portal', 'portal');
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
        $id_pessoa = $this->session->userdata('usuario')->id_pessoa;
        $data['admEvento'] = $this->relatorios->retornaEventosAdmin($id_pessoa);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('relatorios/relatorioGeral', $data);
        $this->load->view('footer');
    }

    public function exibirRelatorio() {
        $id_pessoa = $this->session->userdata('usuario')->id_pessoa;
        $id_evento = $this->uri->segment(4);
        $data['evento'] = $this->evento->retornaEventoID($id_evento);
        $data['inscricoes'] = $this->relatorios->retornaNumInscricoes($id_evento);
        $data['sub'] = $this->relatorios->retornaNumSubEvento($id_evento);
        $data['atividades'] = $this->relatorios->retornaAtividadesIDEvento($id_evento);
        $data['sincron'] = $this->certificado->getFreqDifInsRows($id_evento);
        $data['areas'] = $this->relatorios->areas($id_evento);
        $data['atividadesCad'] = $this->atividade->retornaTiposAtividade();
        $data['configSub'] = $this->submissao->retornaConfgSub($id_evento);
        $data['portal'] = $this->portal->retornaPortal($id_evento);
        $data['programacao'] = $this->portal->retornaProgramacao($id_evento);
        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('relatorios/exibirRelatorio', $data);
        $this->load->view('footer');
    }

    public function listaInscritos() {
        $id_evento = $this->uri->segment(4);
        $cpf_pesquisado = $this->input->post('cpf');



        if (isset($cpf_pesquisado)) {
            $data['listaInscritos'] = $this->relatorios->retornaInscritosEvento($id_evento, $maximo = null, $inicio = null, $cpf_pesquisado);
        } else {

            $maximo = 10;
            $inicio = (!$this->uri->segment("5")) ? 0 : $this->uri->segment("5");
            $config['base_url'] = base_url('admin/relatorios/listaInscritos/' . $id_evento);
            $config['total_rows'] = $this->relatorios->retornaNumInscricoes($id_evento);
            $config['per_page'] = $maximo;
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['first_link'] = FALSE;
            $config['last_link'] = FALSE;
            $config['first_tag_open'] = "<li>";
            $config ['first_tag_close'] = "</li>";
            $config['prev_link'] = "Anterior";
            $config ['prev_tag_open'] = "<li class='prev'>";
            $config ['prev_tag_close'] = "</li>";
            $config['next_link'] = "Próxima";
            $config ['next_tag_open'] = "<li class='next'>";
            $config['next_tag_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tag_close'] = "</li>";
            $config['cur_tag_open'] = "<li class='active'><a href='#'>";
            $config['cur_tag_close'] = "</a></li>";
            $config['num_tag_open'] = "<li>";
            $config['num_tag_close'] = "</li>";



            $this->pagination->initialize($config);
            $data['paginacao'] = $this->pagination->create_links();

            $data['listaInscritos'] = $this->relatorios->retornaInscritosEvento($id_evento, $maximo, $inicio);
        }


        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('relatorios/exibirListaInscritos', $data);
        $this->load->view('footer');
    }

    public function listaSubmissoes() {
        $id_evento = $this->uri->segment(4);
        $id_gt = $this->uri->segment(5);

        if ($id_gt == "all") {
            $id_gt = null;
        } else if ($id_gt == "poster") {
            $id_gt = "poster";
        }

        $maximo = 800;
        $inicio = (!$this->uri->segment("6")) ? 0 : $this->uri->segment("6");
        $config['base_url'] = base_url('admin/relatorios/listaSubmissoes/' . $id_evento);
        $config['total_rows'] = $this->relatorios->retornaNumSubEvento($id_evento);
        $config['per_page'] = $maximo;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = "<li>";
        $config['first_tag_close'] = "</li>";
        $config['prev_link'] = "Anterior";
        $config['prev_tag_open'] = "<li class='prev'>";
        $config['prev_tag_close'] = "</li>";
        $config['next_link'] = "Próxima";
        $config['next_tag_open'] = "<li class='next'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";


        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();
        $data['listaSub'] = $this->relatorios->retornaSubEvento($id_evento, $maximo, $inicio, $id_gt);
        $data['gt_evento'] = $this->relatorios->retornaGtIdEvento($id_evento);



        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('relatorios/exibirListaSubmissoes', $data);
        $this->load->view('footer');
    }

    public function listaInsAtividade() {
        $id_evento = $this->uri->segment(4);
        $id_atividade = $this->uri->segment(5);


        $maximo = 500;
        $inicio = (!$this->uri->segment("6")) ? 0 : $this->uri->segment("6");
        $config['base_url'] = base_url('admin/relatorios/listaInsAtividade/' . $id_evento . "/" . $id_atividade);
        $config['total_rows'] = $this->relatorios->retornaNumInsAtividade($id_evento, $id_atividade);
        $config['per_page'] = $maximo;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;
        $config['first_tag_open'] = "<li>";
        $config ['first_tag_close'] = "</li>";
        $config['prev_link'] = "Anterior";
        $config ['prev_tag_open'] = "<li class='prev'>";
        $config ['prev_tag_close'] = "</li>";
        $config['next_link'] = "Próxima";
        $config ['next_tag_open'] = "<li class='next'>";
        $config['next_tag_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";


        $this->pagination->initialize($config);
        $data['paginacao'] = $this->pagination->create_links();
        $data['listaInsAtividade'] = $this->relatorios->retornaInsAtividade($id_evento, $id_atividade, $maximo, $inicio);




        $this->load->view('admin/header');
        $this->load->view('admin/menu');
        $this->load->view('relatorios/exibirListaInsAtividade', $data);
        $this->load->view('footer');
    }

    public function imprimirListaInscritos() {

        //libray
        $this->load->library('mpdf2');

        // o true é para retornar o codigo html do relatorio - no caso utilizei o proprio do mpdf
        $id_evento = $this->uri->segment(4);
        $tipo_rel = $this->uri->segment(5);

        if (isset($tipo_rel)) {
            $data['listaInscritos'] = $this->relatorios->retornaInscritosEventoPagConfirm($id_evento);
        } else {
            $data['listaInscritos'] = $this->relatorios->retornaInscritosEvento($id_evento, $maximo, $inicio);
        }


        $data['evento'] = $this->evento->retornaEventoID($id_evento);
        $html = $this->load->view('relatorios/pdf_listaInscritos', $data, true);

        $mpdf = new mPDF('', 'A4-L');
        $mpdf->WriteHTML($html);

        $mpdf->Output();
        exit();
    }

    public function imprimirSubPosters() {

        $this->load->library('mpdf2');
        $id_evento = $this->uri->segment(4);
        $tipoSubmissao = $this->uri->segment(5);
        $data['evento'] = $this->evento->retornaEventoID($id_evento);

        $data['subPoster'] = $this->relatorios->retornaSubTipos($id_evento, $tipoSubmissao);
  
       $html = $this->load->view('relatorios/pdf_listaSubTipo', $data, true);



        $mpdf = new mPDF('', 'A4-L');
        $mpdf->WriteHTML($html);

        $mpdf->Output("submissoes" . ".pdf", 'D');
        exit();
    }

    public function gerarDoc() {

        $data['caderno'] = $this->relatorios->cadernoResumos();

        foreach ($data['caderno'] as $dados) {
            $titulo = $dados->titulo;
            $resumo = $dados->resumo;
            $palavrasChaves = $dados->palavras_chaves;
            $area = $dados->descricao;
            $nomePessoa = $dados->nome;
            $orientador = $dados->orientador;
            $coautor1 = $dados->coautor_1;
            $coautor2 = $dados->coautor_2;




            // Definindo o tipo de arquivo (Ex: msexcel, msword, pdf ...)

            header("Content-type: application/msword");

// Formato do arquivo (Ex: .xls, .doc, .pdf ...)
            header("Content-Disposition: attachment; filename=MeuArquivo.doc");

// Montando a tabela
            $html = "<table>";

            $html .= "<tr>";
            $html .= "<td><strong>Autor</strong></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td>$nomePessoa</td>";
            $html .= "</tr>";

            if ($orientador != null || $orientador != "") {

                $html .= "<tr>";
                $html .= "<td><strong>Orientador</strong></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td>$orientador</td>";
                $html .= "</tr>";
            }
            if ($coautor1 != null || $coautor1 != "") {

                $html .= "<tr>";
                $html .= "<td><strong>Coautor 1</strong></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td>$coautor1</td>";
                $html .= "</tr>";
            }
            if ($coautor2 != null || $coautor2 != "") {

                $html .= "<tr>";
                $html .= "<td><strong>Coautor 2</strong></td>";
                $html .= "</tr>";

                $html .= "<tr>";
                $html .= "<td>$coautor2</td>";
                $html .= "</tr>";
            }


            $html .= "<tr>";
            $html .= "<td><strong>Título</strong></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td>$titulo</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td><strong>Resumo</strong></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td>$resumo</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td><strong>Palavras Chaves</strong></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td>$palavrasChaves</td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td><strong>Eixo</strong></td>";
            $html .= "</tr>";

            $html .= "<tr>";
            $html .= "<td>$area</td>";
            $html .= "</tr>";


            $html .= "<tr>";
            $html .= "<td><hr></td>";
            $html .= "</tr>";

            $html .= "</table>";


            ob_start();

// Jogando o conteúdo para o arquivo    
            print($html);
        }
    }

    public function SubConfirPag() {
        $data['dados'] = $this->relatorios->retornaSubPagamentoConfirmado();




        foreach ($data['dados'] as $valores) {
            $nome = $valores->nome;
            $titulo = $valores->titulo;
            $area = $valores->descricao;
            $link = $valores->compr_pag_upload;


            // Definindo o tipo de arquivo (Ex: msexcel, msword, pdf ...)

            header("Content-type: application/msexcel");

// Formato do arquivo (Ex: .xls, .doc, .pdf ...)
            header("Content-Disposition: attachment; filename=relatorio.xls");

// Montando a tabela

            $html = "<table border='1'>";
            $html .= "<tr>";
            $html .= "<td>$nome</td>";
            $html .= "<td>$titulo</td>";
            $html .= "<td>$area</td>";
            $html .= "</tr>";

            $html .= "</table>";


            ob_start();

// Jogando o conteúdo para o arquivo    
            print($html);
        }
    }

    public function jsonEvento() {
        $evento = $_GET['idEvento'];

        $data['evento'] = $this->evento->retornaEventoID($evento);

        $json_str = json_encode($data['evento']);
        $obj = json_decode($json_str);

        print_r($json_str);
    }

    public function inscritosEventoGeral() {
        $id_evento = $_GET['idEvento'];
        $confimPag = $_GET['confirmPagamento'];

        $data['inscritos'] = $this->relatorios->retornaInscritosEvento($id_evento);
    }

    public function getJson() {

        $json_file = file_get_contents(
                "http://cev.urca.br/siseventos/admin/ApiSisEventos/tipoAtividades");

        $json_str = json_decode($json_file, true);

        foreach ($json_str as $dados) {

            echo $dados['nome_tipo_atividade'];
        }
    }

    public function impressInsAtiviGeral() {
        $id_evento = $this->uri->segment(4);
        $id_atividade = $this->uri->segment(5);
        $this->load->library('mpdf2');



        $data['listaInsAtividade'] = $this->relatorios->retornaInsAtividade($id_evento, $id_atividade, $maximo = null, $inicio = 0);
        $data['atividade'] = $this->relatorios->retornaAtividadePorId($id_atividade);

        foreach ($data['atividade'] as $dados) {
            $titulo_atividade = $dados->titulo_atividade;
        }

        $html = $this->load->view('relatorios/pdf_listaInsAtividades', $data, true);

        $mpdf = new mPDF('', 'A4-L');
        $mpdf->WriteHTML($html);

        $mpdf->Output("$titulo_atividade" . ".pdf", 'D');
        exit();
    }

    public function impressInsSub() {
        $id_evento = $this->uri->segment(4);
        $id_gt = $this->uri->segment(5);
        $this->load->library('mpdf2');

        $data['listaSub'] = $this->relatorios->retornaSubEventoAceito($id_evento, $maximo = null, $inicio = 0, $id_gt);
        $data['gt_evento'] = $this->relatorios->retornaGt($id_gt);

        foreach ($data['gt_evento'] as $dados) {
            $titulo = $dados->descricao;
        }

        $html = $this->load->view('relatorios/pdf_listaSub', $data, true);

        $mpdf = new mPDF('', 'A4-L');
        $mpdf->WriteHTML($html);

        $mpdf->Output("$titulo" . ".pdf", 'D');
        exit();
    }

}
