<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

        $this->load->helper('uteis_helper');
    }

    public function index() {      
        $this->load->view('login');
    }
    
    
    
    
    
    
    
    
    
    
    
    

    public function totalCadastrados() {
        echo $this->eventos->getCadastrados();
    }

    public function totalCertificados() {
        echo $this->eventos->getCertificadosParticipacao() + $this->eventos->getCertificadosSubmissao() + $this->eventos->getCertificadosAtividades();
    }

    public function totalEventos() {
        echo $this->eventos->totalEventos();
    }

    public function totalSub() {
        echo $this->eventos->totalSub();
    }

    public function criptografia() {
        $nome = "b44b2a4555444e4a6eb4f09b1f00cdd2";
        //echo md5($nome);
        echo sha1($nome);
    }

    public function contato() {
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $assunto = $this->input->post('assunto');
        $msg = $this->input->post('msg');

        $corpo = "Nome: $nome<br>"
                . "Email: $email<br>"
                . "Assunto: $assunto<br>"
                . "Mensagem: $msg<br>";

        if (enviar_email($email, "Contato SISEVENTOS", $corpo)) {
            echo "1";
        }
    }

    public function solicitacaoEvento() {
        $data['nome_solicitante'] = $this->input->post('nome');
        $data['nome_evento'] = $this->input->post('evento');
        $data['justificativa'] = $this->input->post('justificativa');
        $data['email'] = $this->input->post('email');
        $data['matricula'] = 12313;
        $data['telefone'] = preg_replace("/\D+/", "", $this->input->post('telefone'));
        $data['categoria_solicitante'] = $this->input->post('categoria');
        $data['data_solicitacao'] = date('Y-m-d');
        $this->solicitacoes->salvar($data);
    }

    public function cadastroEvento() {
        $data['categorias'] = $this->categorias->retornaCategorias();
        $data['estados'] = $this->cidEstados->retornaEstados();

        $this->load->view('header');
        $this->load->view('cadEventoSol', $data);
    }

    public function buscaCPF() {
        $data['pessoa'] = $this->pessoa->retornaPessoaCPF($this->input->post('cpf'));
        if ($data['pessoa']) {

            foreach ($data['pessoa'] as $dados) {
                $nome = $dados->nome;
            }

            echo 1;
        } else {
            echo "<div class='alert alert-danger col-md-6'>Ops! Parece que você ainda não tem cadastro em nossos sitema! Vamos realiar?</div>"
            . "<div class='col-md-offset-5 col-md-12'><a href='#' data-toggle='modal' data-target='#cadastro'><button class='btn btn-success col-md-4'>Cadastre-se</button></a></div>";
        }
    }

    public function inserirEvento() {
        $data['titulo'] = $this->input->post('evento');
        $data['descricao'] = $this->input->post('descricao');
        $data['dtIni_Insc'] = $this->input->post('dtIni');
        $data['dtFim_Insc'] = $this->input->post('dtFim');
        $data['ativo'] = 'n';
        $data['local'] = $this->input->post('local');
        $data['email_evento'] = $this->input->post('email');
        $data['carga_horaria'] = $this->input->post('ch');
        $data['periodo_evento'] = $this->input->post('periodo');
        $data['site_evento'] = $this->input->post('site');
        $data['tem_submissao'] = $this->input->post('temSub');
        $data['freq_mobile'] = $this->input->post('freqAPP');

        if ($this->solicitacoes->inserirEvento($data)) {
            $data2['id_evento'] = $this->eventos->retornaLastInsert();
            foreach ($data2['id_evento'] as $dados) {
                echo $dados->id_evento;
            }
        } else {
            echo "";
        }
    }

    public function inserirImagemEventoSlide() {

        $pasta = "assets/blog/img/slide/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemSlide";
        $campo = "imagem_slide";
        $id_imagem = "slideID";
        $this->inserirImagens($pasta, $tipoArquivos, $input, $campo, $id_imagem);
    }

    public function inserirImagemEventoSlideUpdate() {

        $pasta = "assets/blog/img/slide/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemSlide";
        $campo = "imagem_slide";
        $id_imagem = "slideID";
        $id_evento = $this->input->post('id_evento');
        $this->inserirImagensUpdate($pasta, $tipoArquivos, $input, $campo, $id_imagem, $id_evento);
    }

    public function inserirImagemEventoCard() {

        $pasta = "assets/img/background_cards/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemCard";
        $campo = "background_card";
        $id_imagem = "cardID";
        $this->inserirImagens($pasta, $tipoArquivos, $input, $campo, $id_imagem);
    }

    public function inserirImagemEventoCardUpdate() {

        $pasta = "assets/img/background_cards/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemCard";
        $campo = "background_card";
        $id_imagem = "cardID";
        $id_evento = $this->input->post('id_evento');
        $this->inserirImagensUpdate($pasta, $tipoArquivos, $input, $campo, $id_imagem, $id_evento);
    }

    public function inserirImagemEventoCertificado() {
        $pasta = "assets/img/background_certificados/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemCertificado";
        $campo = "base_certficado";
        $id_imagem = "imagemCertificado";
        $this->inserirImagens($pasta, $tipoArquivos, $input, $campo, $id_imagem);
    }

    public function inserirImagemEventoCertificadoUpdate() {
        $pasta = "assets/img/background_certificados/";
        $tipoArquivos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
        $input = "imagemCertificado";
        $campo = "base_certficado";
        $id_imagem = "imagemCertificado";
        $id_evento = $this->input->post('id_evento');
        $this->inserirImagensUpdate($pasta, $tipoArquivos, $input, $campo, $id_imagem, $id_evento);
    }

    public function inserirImagens($pasta, $tipoArquivos, $input, $campo, $id_imagem) {

        $data4['last'] = $this->eventos->retornaLastInsert();

        foreach ($data4['last'] as $last) {
            $id_evento_ok = $last->id_evento;
        }

        $pasta = $pasta;
        /* formatos de imagem permitidos */
        $permitidos = $tipoArquivos;
        //$id_imagem = $this->input->post('id_imagem');
        if (isset($_POST)) {
            if (isset($_FILES["$input"])) {
                $nome_imagem = $_FILES["$input"]['name'];
                $tamanho_imagem = $_FILES["$input"]['size'];
            }
            /* pega a extensão do arquivo */
            $ext = strtolower(strrchr($nome_imagem, "."));

            /*  verifica se a extensão está entre as extensões permitidas */
            if (in_array($ext, $permitidos)) {

                /* converte o tamanho para KB */
                $tamanho = round($tamanho_imagem / 1024);


                $nome_atual = md5(uniqid(time())) . $ext; //nome que dará a imagem
                if (isset($_FILES["$input"])) {
                    $tmp = $_FILES["$input"]['tmp_name']; //caminho temporário da imagem                    
                }

                /* se enviar a foto, insere o nome da foto no banco de dados */
                if (move_uploaded_file($tmp, $pasta . $nome_atual)) {
                    $url = base_url();
                    echo "<br><img src='$url$pasta$nome_atual' class='img-responsive' id='$id_imagem'> ";
                    $data["$campo"] = $nome_atual;



                    $this->eventos->update($id_evento_ok, $data);
                } else {
                    echo "Falha ao enviar";
                }
            } else {
                echo "Somente são aceitos arquivos do tipo Imagem";
            }
        } else {
            echo "Selecione uma imagem";
            exit;
        }
    }

    public function inserirImagensUpdate($pasta, $tipoArquivos, $input, $campo, $id_imagem, $id_evento) {


        $pasta = $pasta;
        /* formatos de imagem permitidos */
        $permitidos = $tipoArquivos;
        //$id_imagem = $this->input->post('id_imagem');
        if (isset($_POST)) {
            if (isset($_FILES["$input"])) {
                $nome_imagem = $_FILES["$input"]['name'];
                $tamanho_imagem = $_FILES["$input"]['size'];
            }
            /* pega a extensão do arquivo */
            $ext = strtolower(strrchr($nome_imagem, "."));

            /*  verifica se a extensão está entre as extensões permitidas */
            if (in_array($ext, $permitidos)) {

                /* converte o tamanho para KB */
                $tamanho = round($tamanho_imagem / 1024);


                $nome_atual = md5(uniqid(time())) . $ext; //nome que dará a imagem
                if (isset($_FILES["$input"])) {
                    $tmp = $_FILES["$input"]['tmp_name']; //caminho temporário da imagem                    
                }

                /* se enviar a foto, insere o nome da foto no banco de dados */
                if (move_uploaded_file($tmp, $pasta . $nome_atual)) {
                    $url = base_url();
                    echo "<br><img src='$url$pasta$nome_atual' class='img-responsive' id='$id_imagem'> ";
                    $data["$campo"] = $nome_atual;



                    $this->eventos->update($id_evento, $data);
                } else {
                    echo "Falha ao enviar";
                }
            } else {
                echo "Somente são aceitos arquivos do tipo Imagem";
            }
        } else {
            echo "Selecione uma imagem";
            exit;
        }
    }

    public function cadastroEixos() {
        $this->load->view('cadastro-area');
//        $area = $this->input->post('area');
//        $descricao = $this->input->post('descricao');
    }

}
