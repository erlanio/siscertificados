<?php
foreach ($cidades as $cidade) {
    
}

foreach ($estados as $estado) {
    
}
foreach ($ies as $instituicao) {
    
}

foreach ($evento as $even) {
    
}

foreach ($inscricao_evento as $inscricao) {
    
}

foreach ($categoria as $cat) {
    
}

foreach ($valores as $valor) {
    
}

date_default_timezone_set('America/Sao_Paulo');
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
                <img src="<?php echo base_url('assets/img/brasao_left_black.png'); ?> " class="img-responsive">                   
            </div>   
            <hr>

            <!-- BLOCO  -->
            <div class="titulo"><strong>DADOS PESSOAIS</strong><br></div>
            <div class="atributos">
                <strong>Nome: </strong><?php echo $this->session->userdata('usuario')->nome ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>CPF:</strong> <?php echo $this->session->userdata('usuario')->cpf ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Nascimento: </strong><?php echo data_br($this->session->userdata('usuario')->dt_nascimento) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Cidade: </strong><?php echo $cidade->nome ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <strong>Estado: </strong><?php echo $estado->nome ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Instituição: </strong><?php echo $instituicao->nome_ies ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

            <!-- BLOCO  -->
            <div class="titulo"><strong>DADOS PARA CONTATO</strong><br></div>
            <div class="atributos">
                <strong>Email: </strong><?php echo $this->session->userdata('usuario')->email ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Celular:</strong> <?php echo $this->session->userdata('usuario')->celular ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <?php if ($this->session->userdata('usuario')->tel_fixo != "") { ?>
                    <strong>Telefone Fixo:</strong> <?php echo $this->session->userdata('usuario')->fone_fixo ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php } ?>            
            </div>

            <!-- BLOCO  -->
            <div class="titulo"><strong>INFORMAÇÕES DA INSCRIÇÃO NO EVENTO</strong><br></div>
            <div class="atributos">
                <strong>Nº Inscrição: </strong><?php echo $even->id_evento ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Data da Inscrição:</strong> <?php echo data_br($inscricao->dt_inscricao) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <strong>Valor:</strong> <?php echo "R$ " . $valor->valor . ",00" ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <br>
                <strong>Nome do Evento: </strong><?php echo $even->titulo ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                <strong>Categoria de Inscrição:</strong> <?php echo $cat->descricao ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     

            </div>

            <!-- BLOCO  -->
            <div class="titulo"><strong>INFORMAÇÕES DE INSCRIÇÕES EM MINICURSOS</strong><br></div>

            <?php foreach ($inscricoes_atividades as $atividades) { ?>
                <?php if ($atividades->id_tipo_atividade == 1) { ?>

                    <div class="atributos">
                        <strong>Nº Inscrição: </strong><?php echo $atividades->id_insc_atividade ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Data de Inscrição: </strong><?php echo data_br($atividades->dt_inscricao) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <strong>Minicurso: </strong><?php echo $atividades->titulo_atividade ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <?php if ($even->id_evento == 5) { ?>
                            <strong>Valor do Minicurso: </strong>R$ 5,00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <?php } ?>
                    </div>

                    <?php
                }
            }
            ?>

            <!-- BLOCO 
            <div class="titulo"><strong>INFORMAÇÕES DE INSCRIÇÕES EM OFICINAS</strong><br></div>
    
            <?php foreach ($inscricoes_atividades as $atividades) { ?>
                <?php if ($atividades->id_tipo_atividade == 2) { ?>
                                                                                                    <div class="atributos">
                                                                                                        <strong>Nº Inscrição: </strong><?php echo $atividades->id_insc_atividade ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        <strong>Minicurso: </strong><?php echo $atividades->titulo_atividade ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        <strong>Data de Inscrição: </strong><?php echo data_br($atividades->dt_inscricao) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            
                                                                                                    </div>
                                                                            
                    <?php
                }
            }
            ?> -->

            <!-- BLOCO  -->
            <?php if ($submissoes) { ?>
                <div class="titulo"><strong>SUBMISSÕES</strong><br></div>

                <?php foreach ($submissoes as $sub) { ?>

                    <div class="atributos">
                        <strong>Nº Submissão: </strong><?php echo $sub->id_inscricoes_sub_trabalho ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <strong>Autor Principal: </strong><?php echo $this->session->userdata('usuario')->nome ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <strong>Título: </strong><?php echo $sub->titulo ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <strong>Área Temática: </strong><?php echo $sub->descricao ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                        <strong>Data da Submissão: </strong><?php echo data_br($sub->dt_sub) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                    <hr>
                    <?php
                }
            }
            ?>
            <br><br><br><br><br><br><br>
            <div class="atributos">
                <p>Documento gerado em: <?php echo date('d/m/Y') . " as " . date('h:i:s') ?> (horário de Brasília)</p>
            </div>
        </div>
    </body>
</html>


