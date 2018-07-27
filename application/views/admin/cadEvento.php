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


                <div class="col-md-12 ">     
                    <div class="col-md-12 orientacoes" id="cadastro-evento">

                        <div>
                            <div class="col-md-12">
                                <h3>1ª Etapa - Preencha as informações abaixo?</h3>
                            </div>

                            <div class='form-group col-md-6'>
                                <label for='message-text' class='control-label'>Nome do Evento:*</label>
                                <input type='text' required class='form-control' id='nomeEventoSol'>                    
                            </div>

                            <div class='form-group col-md-6'>
                                <label for='message-text' class='control-label'>Local do Evento:*</label>
                                <input type='text' required class='form-control' id='localEventoSol'>                    
                            </div>

                            <div class='form-group col-md-6'>
                                <label for='message-text' class='control-label'>Informções de pagamento:*</label>
                                <textarea class='form-control' rows='7' required id='descricaoEventoSol'></textarea>                 
                            </div>

                            <div class='form-group col-md-3'>
                                <label for='message-text' class='control-label'>Início Inscrições:*</label>
                                <input type='date' required class='form-control' id='dtInicioSol'>                    
                            </div>

                            <div class='form-group col-md-3'>
                                <label for='message-text' class='control-label'>Fim Inscrições:*</label>
                                <input type='date' required class='form-control' id='dtFimSol'>                    
                            </div>


                            <div class='form-group col-md-6'>
                                <label for='message-text' class='control-label'>Email do Evento:*</label>
                                <input type='email' required class='form-control' id='emailSol'>                    
                            </div>

                            <div class='form-group col-md-3'>
                                <label for='message-text' class='control-label'>Carga Horária:*</label>
                                <input type='text' required class='form-control' id='chSol'>                    
                            </div>

                            <div class='form-group col-md-3'>
                                <label for='message-text' class='control-label'>Período:*</label>
                                <input type='text' required class='form-control' placeholder="08 à 12 de abril" id='periodoSol'>                    
                            </div>

                            <div class='form-group col-md-6'>
                                <label for='message-text' class='control-label'>Site do Evento:*</label>
                                <input type='text' required class='form-control' id='siteSol'>                    
                            </div>

                            <div class="form-group col-md-3">
                                <label for="texto">Tem submissão: *</label>
                                <select class="form-control" id="temSubSol" name="estado" required="">                
                                    <option>Selecione...</option>        

                                    <option value='s'>Sim</option>
                                    <option value='n'>Não</option>

                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="texto">Frequência pelo APP: *</label>
                                <select class="form-control" id="preqAppSol" name="estado" required="">                
                                    <option>Selecione...</option>        

                                    <option value='s'>Sim</option>
                                    <option value='n'>Não</option>

                                </select>
                            </div>


                            <input type="submit" class="btn btn-success col-md-12" value="Cadastrar Evento" onclick="validarFromSolicitacao();">

                        </div>


                    </div>   

                    <div class="col-md-12 orientacoes" id="cadastro-evento-imagens">
                        <div class="col-md-12">
                            <h3>2ª Etapa - Vamos personalizar o seu evento?</h3>
                            <div class="alert alert-danger" id="etapa3-retorno">
                                Ops! Preencha todas as informações para continuar!
                            </div>
                        </div><Br>
                        <div class="row certificado">
                            <h3>Imagens do evento</h3>
                            <div class="form-group col-md-6">
                                <div class="col-md-12 alert alert-warning">
                                    Essa imagem ficará disponível na página inicial do site!

                                    Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                    Largura: 1900px;<br>
                                    Altura: 900px<br>
                                </div>
                                <div class="alert alert-danger" id="retorno-envio-img">

                                </div>
                                <label for='message-text' class='control-label'>Imagem Slide:*</label>


                                <form id="formulario" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoSlide'); ?>">
                                    <input type="file" id="imagemSlide" class="form-control" name="imagemSlide" />
                                    <input type="hidden" id="id_evento" name="id_evento">

                                </form>
                                <div id="visualizarSlide" class="col-md-12"></div>
                            </div>

                            <div class='form-group col-md-6'>


                                <div class="col-md-12 alert alert-warning">
                                    Essa imagem ficará disponível onde o usuário irá se inscrever no evento!

                                    Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                    Largura: 392px;<br>
                                    Altura: 376px<br>
                                </div>
                                <div class="alert alert-danger" id="retorno-envio-card">

                                </div>

                                <label for='message-text' class='control-label'>Imagem Card:*</label>
                                <form id="formulario2" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoCard'); ?>">
                                    <input type="file" name="imagemCard"  id="imagemCard" class="form-control" />
                                    <input type="hidden" id="id_evento_card" name="id_evento" >
                                </form>
                                <div id="visualizarCard" class="col-md-12"></div>
                            </div>
                        </div>

                        <div class="row certificado">
                            <div id="retorno-envio-certificado"></div>
                            <h3>Certificado</h3>
                            <div class='form-group col-md-6'>
                                <div class="col-md-12 alert alert-warning">
                                    Base do certificado!<br>

                                    Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                    Largura: 1126px;<br>
                                    Altura: 794px<br>
                                    Importante: O cabeçalho do certificado podera conter as identidade visual do seu evento, no entanto, a parte central é reservada para o conteúdo do certificado que será 
                                    criado de maneira automática pelo sistema.
                                </div>
                                <div class="alert alert-danger" id="retorno-envio-card">

                                </div>

                                <label for='message-text' class='control-label'>Base certificado:*</label>
                                <form id="formulario3" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoCertificado'); ?>">
                                    <input type="file" name="imagemCertificado"  id="imagemCertificado" class="form-control" />
                                    <input type="hidden" id="id_evento_certificado" name="id_evento">
                                </form>
                                <div id="visualizarCertificado" class="col-md-12"></div>
                            </div>

                            <div class='form-group col-md-offset-1 col-md-3'>
                                <img src="<?php echo base_url('assets/img/background_certificados/default.png'); ?>" class="img-responsive">
                            </div>
                            <button class="btn btn-info col-md-12" id="etapa3">Próximo</button>
                        </div>
                    </div>


                    

                    <div class="col-md-12 orientacoes" id="cadastro-evento-valores">
                        <div class="col-md-12">
                            <h3>3ª Etapa - Sobre o valores, responda algumas informações?</h3>

                        </div><Br>

                        <div class="form-group col-md-6">
                            <button class="btn btn-lg btn-info col-md-12" data-toggle="modal" data-target="#evento-pago">O Evento será pago</button>
                        </div>
                        <div class="form-group col-md-6">
                            <button class="btn btn-lg btn-warning col-md-12" onclick="eventoGratuito();">O Evento será gratuito</button>
                        </div>
                    </div>

                </div>    
            </div><!-- FIM -->
        </div>
    </div>
</div>


<div class="modal fade modal-wide" id="evento-pago" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Configurar valores:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Configurar Valores</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="col-md-12">

                            <div class="col-md-12" id="retorno-envio-valores">

                            </div>

                            <div class="form-group col-md-12">
                                <label for="texto">Categoria: *</label>
                                <select class="form-control" id="categorias-pagamento" required="">                
                                    <option>Selecione...</option>        
                                    <?php foreach ($categorias as $dados) {
                                        ?>
                                        <option value='<?php echo $dados->id_categorias_inscricoes; ?>'><?php echo $dados->descricao; ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <form method="post" id="form-valores">
                                    <div id="tabela-categorias">

                                    </div>
                                </form>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-12"><button class="btn btn-success col-md-offset-3 col-md-6" id="btn-salvar-valores">Salvar</button></div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-12"><button class="btn btn-warning col-md-offset-3 col-md-6 disabled" id="btn-continuar-valores">Continuar</button></div>
                            </div>
                        </div>

                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>