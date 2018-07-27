<?php
date_default_timezone_set('America/Sao_Paulo');

foreach ($gt_evento as $dados) {
    $titulo_gt = $dados->descricao;
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
                <h4>Lista de Submissões:<strong> <?php echo $titulo_gt; ?></strong></h4>

            </div>   
            <hr>


            <!-- BLOCO  -->
            <div class="tabela">

                <table class="tableClass">
                    <thead class="theadClass">
                        <tr class="headerRow">
                            <th>ID</th>
                            <td>Nome</td>
                            <td>CPF</td>
                            <td>Título</td>                            
                            <td>Assinatura</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listaSub as $data) {

                            $id = $data->id_inscricoes_sub_trabalho;
                            $nome = $data->nome;
                            $cpf = $data->cpf;                            
                            $titulo = $data->titulo;
                            ?>
                            <tr class="linha">
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nome; ?></td>
                                <td><?php echo $cpf; ?></td>
                                <td><?php echo $titulo; ?></td>                                  
                                <td class="assinatura">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                           
                        <?php } ?>
                             
                    </tbody>
                </table>

            </div>


        </div>
    </body>
</html>


