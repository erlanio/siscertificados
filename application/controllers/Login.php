<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    public function index() {

        $this->load->view('login');
        $this->load->view('footer');
    }

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_Pessoa', 'pessoa');
    }

    public function logar() {

        $email = $this->input->post('email');
        $password = md5($this->input->post('senha'));

        $usuario = $this->pessoa->retornaEmailSenha($email, $password);

        if ($usuario) {
            $dados = $this->pessoa->retornaEmailSenha($email, $password);
            $registro = array('usuario' => $dados[0], 'usuario_logado' => true);
            $this->session->set_userdata($registro);
            redirect(base_url('admin/Inicio'));
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('Login')
            . "';"
            . "alert('Email ou senha incorretos!');"
            . "</script>";
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url(''));
    }

    public function recuperarSenha() {
        $this->load->model('Model_Pessoa', 'pessoa');
        $this->load->helper('string');
        $email = $this->input->post('email');
        $dados = $this->pessoa->retornaPessoaEmail($email);
        $id;

        if ($dados) {
            foreach ($dados as $data) {
                $id = $data->id_pessoa;
                $nome = $data->senha;
                $email = $data->email;
            }
            if ($this->pessoa->retornaPessoaEmail($email)) {
                $string_random = random_string('alnum', 10);

                $this->load->library('email');
                $this->configEmail();
                $this->email->from('erlanio.freire@urca.br', 'erlaniofreire');
                $this->email->to($email);
                $this->email->message('Dados para efetuar login '
                        . 'no sistema: Nome de Usuario: ' . $this->input->post('usuario') . ' || ' . 'Senha: ' . $string_random);
                if ($this->email->send()) {
                    $senhaCriptografada = md5($string_random);
                    $data2['senha'] = $senhaCriptografada;
                    $this->pessoa->atualizarPessoa($id, $data2);
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('login')
                    . "';"
                    . "alert('Acesse o Email para recuperar a senha!');"
                    . "</script>";
                } else {
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('login')
                    . "';"
                    . "alert('Ocorreu um erro tento novamente!');"
                    . "</script>";
                }
            }
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('login')
            . "';"
            . "alert('Email informado não existe!');"
            . "</script>";
        }
    }

    public function esqueceuSenha() {
        $this->load->view('recuperarSenha');
        $this->load->view('footer');
    }

    public function esqueceuEmail() {
        $this->load->view('recuperar-email');
        $this->load->view('footer');
    }

    public function recuperarEmail() {
        $cpf = $this->input->post('cpf');
        $dtNasc = $this->input->post('data-nascimento');
        $nome = $this->input->post('nome');

        if (!empty($this->pessoa->verificaRecuperarEmail($cpf, $dtNasc, $nome))) {
            $dados['pessoa'] = $this->pessoa->verificaRecuperarEmail($cpf, $dtNasc, $nome);
            $this->load->view('recuperar-email-confirm', $dados);
            $this->load->view('footer');
        } else {
            echo 'n tem';
        }
    }

    public function alterarEmail() {
        $data2['email'] = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $data['pessoa'] = $this->pessoa->retornaPessoaCPF($cpf);
        $email = $this->input->post('email');


        if (empty($this->pessoa->retornaPessoaEmail($email))) {
            if (!empty($data['pessoa'])) {
                $this->pessoa->alterarEmail($cpf, $data2);
                $this->load->library('email');
                $this->configEmail();
                $this->email->from('eventosurca@gmail.com', 'SISTEMA DE EVENTOS - URCA');
                $this->email->to($email);
                $this->email->message("Troca de email confirmada com sucesso no sistema de EVENTOS - URCA");
                if ($this->email->send()) {
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('login')
                    . "';"
                    . "alert('Troca de email efetuada com sucesso!');"
                    . "</script>";
                } else {
                    echo "<script>"
                    . "window.location.href = '"
                    . base_url('login')
                    . "';"
                    . "alert('Ocorreu um erro tento novamente!');"
                    . "</script>";
                }
            }
        } else {
            echo "<script>"
            . "window.location.href = '"
            . base_url('login')
            . "';"
            . "alert('Email informado já cadastrado no sistema!');"
            . "</script>";
        }
    }

    function configEmail() {
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '30';
        $config['smtp_user'] = 'erlanio.freire@urca.br';
        $config['smtp_pass'] = 'kurtcobain';
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
    }

    
    public function logarPopUp() {

        $email = $this->input->post('email');
        $password = md5($this->input->post('senha'));

        
        $usuario = $this->pessoa->retornaEmailSenha($email, $password);

        if ($usuario) {
            $dados = $this->pessoa->retornaEmailSenha($email, $password);
            $registro = array('usuario' => $dados[0], 'usuario_logado' => true);
            $this->session->set_userdata($registro);
            echo 2;
        } else {
            echo 1;
            
        }
    }
}
