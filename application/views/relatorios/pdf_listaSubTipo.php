<?php
date_default_timezone_set('America/Sao_Paulo');

foreach ($subPoster as $dados) {
    $titulo = $dados->titulo;
    $autor = $dados->nome;
    $coautor1 = $dados->coautor_1;
    $coautor2 = $dados->coautor_2;
    $coautor3 = $dados->coautor_3;
    $coautor4 = $dados->coautor_4;
    $coautor5 = $dados->coautor_5;
    $coautor6 = $dados->coautor_6;

    $tipoTrabalho = $dados->id_tipo_trabalho;

    if($tipoTrabalho == 1){
        $tipo = "Oral";
    }else if($tipoTrabalho == 2){
        $tipo = "Poster";
    }
}

foreach ($evento as $event) {

    $nomeEvento = $event->titulo;
}




?>


<!DOCTYPE html>
<html lang="pt">
    <head>    
        <title>Sistem de Eventos - URCA</title>      	       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/estilo_pdf.css'); ?>" rel="stylesheet">  
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    </head>
    <body>
        <div class="corpo">
            <div class="cabecalho">
                <h4>Submissões em formato: <?php echo $tipo ?></h4>
                <h4>Lista de Submissões:<strong> <?php echo $nomeEvento; ?></strong></h4>

            </div>   
            <hr>


            <!-- BLOCO  -->
            <div class="tabela">

                <table class="tableClass">
                    <thead class="theadClass">
                        <tr class="headerRow">
                            <th>Titulo</th>
                            <td>Autor</td>
                            <td>Email</td>
                            <td>Coautores</td>
                            <td>Status</td>                          
                            
                        </tr>
                    </thead>
                    <tbody> 

                                <?php                
                        foreach ($subPoster as $dados) {
                            $titulo = $dados->titulo;
                            $autor = $dados->nome;
                            $coautor1 = $dados->coautor_1;
                            $coautor2 = $dados->coautor_2;
                            $coautor3 = $dados->coautor_3;
                            $coautor4 = $dados->coautor_4;
                            $coautor5 = $dados->coautor_5;
                            $coautor6 = $dados->coautor_6;
                            $email = $dados->email;
                            $status = $dados->status_avaliacao;
                            if($status == 1){
                                $status = "Aguardando avaliação";
                            }else if($status == 2){
                                $status = "Aceito";
                            }else if($status == 3){
                                $status = "Aprovado com Correções";
                            }else if($status == 4){
                                $status = "Não Aceito";
                            }

                         ?>
                        <tr class="linha">
                        <td><?php echo $titulo; ?></td>
                        <td><?php echo $autor; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php if(!empty($coautor1)){
                            echo $coautor1."; ";
                        }
                         if(!empty($coautor2)){
                            echo $coautor2."; ";
                        }
                         if(!empty($coautor3)){
                            echo $coautor3."; ";
                        }
                         if(!empty($coautor4)){
                            echo $coautor4."; ";
                        }
                         if(!empty($coautor5)){
                            echo $coautor5."; ";
                        }
                         if(!empty($coautor6)){
                            echo $coautor6."; ";
                        }

                         ?></td>
                        <td><?php echo $status; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </body>
</html>


