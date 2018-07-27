
<?php
date_default_timezone_set('America/Sao_Paulo');


foreach ($certificado as $dados) {
    $id_evento = $dados->id_evento;
    $nome = $dados->nome;
    $titulo = strtoupper($dados->titulo);
    $descricao = strtoupper($dados->descricao);
    $ch = $dados->carga_horaria;
    $background = $dados->base_certficado;
    $periodo = $dados->periodo_evento;
}
?>


<!DOCTYPE html>
<html lang="pt">
    <head>    
        <title>Sistem de Eventos - URCA</title>      	       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <!-- Bootstrap -->
      
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
        <?php if($id_evento == 3) {?>
        <div class="corpo">
            <div class="texto">
                Certificamos que <strong><?php echo mb_strtoupper($nome, "utf-8") ?></strong> participou na condição de <strong>OUVINTE</strong> do(a)
                <strong> <?php echo mb_strtoupper($titulo, "utf-8") ?></strong>, <?php if(!empty($descricao)){ ?> com o tema: <strong> <?php echo  mb_strtoupper($descricao, "utf-8") ?></strong>, <?php } ?> evento realizado na Universidade Regional do Cariri-URCA, Crato-CE, no período de <?php echo $periodo; ?>.                 
            </div>   

        </div>
    <?php } else {  ?>
 <div class="corpo">
            <div class="texto">
                Certificamos que <strong><?php echo mb_strtoupper($nome, "utf-8") ?></strong> participou na condição de <strong>OUVINTE</strong> do(a)
                <strong> <?php echo mb_strtoupper($titulo, "utf-8") ?></strong>, <?php if(!empty($descricao)){ ?> com o tema: <strong> <?php echo  mb_strtoupper($descricao, "utf-8") ?></strong>, <?php } ?> evento realizado na Universidade Regional do Cariri-URCA, Crato-CE, no período de <?php echo $periodo; ?>, perfazendo um total de <?php echo $ch; ?> horas.                 
            </div>   

        </div>
    <?php } ?>
    </body>
</html>