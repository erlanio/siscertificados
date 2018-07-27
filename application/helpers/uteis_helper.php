<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | Site Helper
  | -------------------------------------------------------------------------
  | Desenvolvido por ERLANIO FREIRE
  |
 */

/**
 * url_amigavel
 * 
 * Retira acentos, substitui espaço por - e
 * deixa tudo minúsculo
 * 
 *
 * @param	string
 * @return	string
 */
function removeAcentos($string) {

    return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
}

/**
 * explode_t
 * 
 * Faz o explode em PHP, usa a função trim em cada índice do array e monta o array novamente
 * 
 *
 * @param	string, string
 * @return	array
 */
function explode_t($delimitador, $string) {
    $explode = explode($delimitador, $string);
    $array = array();
    foreach ($explode as $item) {
        $array[] = trim($item);
    }
    return $array;
}

/**
 * data_br
 * 
 * Converte uma data no formato mysql para o formato brasileiro
 * 
 *
 * @param	string
 * @return	string
 */
function data_br($data_bd) {
    return implode('/', array_reverse(explode('-', $data_bd)));
}

/**
 * data_bd
 * 
 * Converte uma data no formato brasileiro para o formato mysql
 * 
 *
 * @param	string
 * @return	string
 */
function data_bd($data_br) {
    return implode('-', array_reverse(explode('/', $data_br)));
}

/**
 * limitar_texto
 * 
 * Remove todas as tags HTML e limita os caractéres do texto, adicionando ... se for maior que o limite
 * 
 *
 * @param	string, int
 * @return	string
 */
function limitar_texto($texto, $limit) {
    $texto = strip_tags($texto);
    if (strlen($texto) > $limit) {
        return substr($texto, 0, $limit) . '...';
    } else {
        return substr($texto, 0, $limit);
    }
}

/**
 * enviar_email
 * 
 * Faz o envio de e-mail
 * 
 *
 * @param	string, string, string/array
 * @return	boolean
 */
function enviar_email($destinatarios, $assunto, $corpo, $anexo = null, $responsavel = null) {
    $CI = & get_instance();
    $config['charset'] = 'utf-8';
    $config['mailtype'] = 'html';
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_timeout'] = '30';
    $config['smtp_user'] = 'erlanio.freire@urca.br';
    $config['smtp_pass'] = 'kurtcobain';
    $config['newline'] = "\r\n";



    $CI->load->library('email', $config);

    $CI->email->set_newline("\r\n");
    $CI->email->from('', 'siseventos.urca.br');
    $CI->email->subject($assunto);
    $CI->email->message($corpo);
    $CI->email->cc($responsavel);
    $CI->email->to($destinatarios);
    $filename = $anexo;
    $CI->email->attach($filename);

    return $CI->email->send();
}

function inserirImagens($pasta, $tipoArquivos, $input) {
    $pasta = $pasta;

    /* formatos de imagem permitidos */
    $permitidos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");
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
                echo $nome_atual;
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

/* End of file site_helper.php */
/* Location: ./application/helpers/helper.php */
