<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">							
                        Bem vindo(a), <small><?php echo $this->session->userdata('usuario')->nome ?></small>
                    </h1>
                </div>
            </div><!-- FIM -->

            <?php
            if ($this->input->get('erro') != null) {
                $erro = $this->input->get('erro');
                if ($erro == 2) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo "<strong>Ops! Certificado ainda não disponível</strong>"; ?>
                    </div>
                    <?php
                }
            }
            ?>


            <?php
            foreach ($evento as $dados) {

                $id_inscricao = $dados->id_inscricao;
                $id_evento = $dados->id_evento;
                $titulo_evento = $dados->titulo;
                $certificado = $dados->certificado_liberado;
                ?>


                <div class="panel panel-success">  <!-- accordion 2 -->
                    <a data-toggle="collapse" class="link-cert" data-parent="#accordion" href="#<?php echo $id_evento; ?>">
                        <div class="panel-heading link-certificados"> 
                            <h4 class="panel-title" id="cert-participacao"> <!-- title 2 -->


                                <?php echo $titulo_evento; ?>
                            </h4>
                        </div>  </a>
                    <!-- panel body -->
                    <div id="<?php echo $id_evento; ?>" class="panel-collapse collapse">
                        <div class="panel-body">

                            <div class="col-md-4 hoverzoom">
                                <img src="<?php echo base_url('assets/img/atividades.jpg'); ?>" class="img-responsive" />
                                <div class="retina">
                                    <button class="btn btn-info" data-toggle="modal"  data-target="#tipo-atividade<?php echo $id_evento; ?>"><i class="fa fa-graduation-cap"></i> Acessar certificados</button>
                                </div>
                            </div>
                            <div class="col-md-4 hoverzoom">
                                <img src="<?php echo base_url('assets/img/participacao.jpg'); ?>" class="img-responsive" />
                                <div class="retina">
                                    <button class="btn btn-info" onclick="verificarCertificado('<?php echo $id_evento; ?>', '<?php echo $id_inscricao; ?>');"><i class="fa fa-graduation-cap"></i> Acessar certificados</button>
                                </div>
                            </div>
                            <div class="col-md-4 hoverzoom">
                                <img src="<?php echo base_url('assets/img/submissao.jpg'); ?>" class="img-responsive" />
                                <div class="retina">
                                    <button class="btn btn-info"  data-toggle="modal"  data-target="#submissao<?php echo $id_evento; ?>" onclick="verificarCertificadoSub('<?php echo $id_inscricao; ?>','<?php echo $id_evento; ?>')"><i class="fa fa-graduation-cap"></i> Acessar certificados</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--  MODAL ATIVIDAES -->
                <div class="modal fade" id="tipo-atividade<?php echo $id_evento; ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Selecione uma Atividade: <?php echo $titulo_evento; ?></h4>
                                
                            </div>
                            <div class="modal-body">  
                                <div class="col-md-12">

                                    <?php
                                    foreach ($tpAtividade as $dados) {
                                        $nome_atividade = $dados->nome_tipo_atividade;
                                        $id_tipo_atividade = $dados->id_tipo_atividade;
                                        if($id_tipo_atividade == 1 || $id_tipo_atividade == 2 || $id_tipo_atividade == 6){
                                        ?>

                                        <button class="btn btn-success col-md-12" onclick="getCertificadoAtividade('<?php echo $id_evento; ?>', '<?php echo $id_tipo_atividade; ?>');"><i class="fa fa-graduation-cap "></i> <?php echo $nome_atividade; ?></button>
                                        <br><br><br>
                                    <?php } }?>
                                </div>

                                <div class="col-md-12" id="atividades-inscrito<?php echo $id_evento; ?>">

                                </div>

                            </div>                                                                
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal" '><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                            </div>
                        </div>                                                        
                    </div>                                                
                </div>
                <!--  MODAL ATIVIDAES -->


                <!--  MODAL SUBMISSÕES -->
                <div class="modal fade" id="submissao<?php echo $id_evento; ?>" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Selecione uma submissão: <?php echo $titulo_evento; ?></h4>
                            </div>
                            <div class="modal-body">  

                                <div class="col-md-12" id="submissoes-evento<?php echo $id_evento; ?>">

                                </div>

                            </div>                                                                
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal" '><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                            </div>
                        </div>                                                        
                    </div>                                                
                </div>
                <!--  MODAL SUBMISSÕES -->

            <?php } ?>



        </div>
    </div>
</div>



</div>


