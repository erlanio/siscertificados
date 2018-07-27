
<?php
date_default_timezone_set('America/Sao_Paulo');

foreach ($sub as $dados) {
$titulo = $dados->tituloSub;
$nome = $this->session->userdata('usuario')->nome;
$evento = $dados->titulo;
$periodo = $dados->periodo_evento;
$coautor1 = $dados->coautor_1;
$coautor2 = $dados->coautor_2;
$coautor3 = $dados->coautor_3;
$coautor4 = $dados->coautor_4;
$coautor5 = $dados->coautor_5;
$orientador = $dados->orientador;
$gt = $dados->gtDesc;
$background = $dados->base_certficado;
$descricao = $dados->descricao;
$periodo = $dados->periodo_evento;
$local = $dados->local;
}

?>



<!DOCTYPE html>
<html lang="pt">
    <head>    
       <title>Sistem de Eventos - URCA</title>                 
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <style>
        .corpo{
            background:url(<?php echo base_url('assets/img/background_certificados/' . $background); ?>) no-repeat;
            width: 100%;
            height: 100%;    
        }

        .texto{
            padding-top: 400px;
            width: 950px;
            text-align: justify;
            font-size: 16px;
            padding-left: 100px;
            height: auto;
        }

    </style>
    <body>
        <div class="corpo">
            <div class="texto">
                Certificamos que <strong><?php echo $nome.','; ?>
                <?php $encoding = mb_internal_encoding('UTF-8'); ?>
                <?php if($coautor1 != NULL){ echo mb_strtoupper($coautor1, "utf-8").','; }?>
                <?php if($coautor2 != NULL){ echo mb_strtoupper($coautor2, "utf-8").','; }?>
                <?php if($coautor3 != NULL){ echo mb_strtoupper($coautor3, "utf-8").','; }?>
                <?php if($coautor4 != NULL){ echo mb_strtoupper($coautor4, "utf-8").','; }?>
                <?php if($coautor5 != NULL){ echo mb_strtoupper($coautor5, "utf-8").','; }?>
                <?php if($orientador != NULL){ echo mb_strtoupper($orientador, "utf-8").','; }?>
                
                </strong>
                apresentou comunicação oral intitulada:<strong> <?php echo $titulo; ?></strong>, no <strong> <?php echo $evento; ?></strong> com o tema:<strong> <?php echo $descricao; ?></strong>.O evento foi realizado na
                <?php echo $local; ?>, no período de <?php echo $periodo; ?>.
            </div>   

        </div>

    </body>
</html>