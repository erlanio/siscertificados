
<?php
date_default_timezone_set('America/Sao_Paulo');


foreach ($certificadoAtiv as $dados) {
$nome = $dados->nome;
$minicurso = $dados->titulo_atividade;
$titulo = $dados->titulo;
$descricao = $dados->descricao;
$horas = $dados->ch_horaria_atividade;
$local = $dados->local;
$periodo = $dados->periodo_evento;
$background = $dados->base_certficado;
$tipo_atividade = $dados->nome_tipo_atividade;
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
                Certificamos que <strong><?php echo $nome ?></strong> participou de <?php echo mb_strtoupper($tipo_atividade, "utf-8") ?>: <strong><?php echo mb_strtoupper($minicurso, "utf-8") ?></strong> no
                <strong> <?php echo mb_strtoupper($titulo, "utf-8") ?> </strong><?php if(!empty($descricao)){  ?>, com o tema: <strong> <?php echo mb_strtoupper($descricao, "utf-8") ?>;</strong> <?php } ?> perfazendo uma carga horária de <?php echo $horas; ?> horas. Realizado na <?php echo $local?><?php if(!empty($periodo)){ ?>, no período de <?php echo $periodo; ?><?php } ?>.
            </div>   

        </div>

    </body>
</html>