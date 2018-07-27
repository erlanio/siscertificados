<?php
foreach ($subTrabalho as $data) {

    $status_avaliacao = $data->id_status_avaliacao;
    $titulo = $data->titulo;
    $id_sub = $data->id_inscricoes_sub_trabalho;
    $id_evento = $this->uri->segment(4);
    $id_gt = $this->uri->segment(5);
    $avaliando = $data->avaliando;
    ?>
    <tbody>
    <td><?php echo $id_sub; ?></td>
    <td><?php echo $titulo; ?></td>
    
    <?php if($avaliando == 'n' || $avaliando == 'N'){ ?>
    <?php if ($status_avaliacao == 1) { ?>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#aval-trab-<?php echo $id_sub; ?>"><i class="glyphicon glyphicon-search"></i> Aguardando avaliação</button></td>    

    <?php } else if ($status_avaliacao == 2) { ?>

        <td><button type="button" class="btn btn-success" disabled=""><i class="glyphicon glyphicon-search"></i> Aceito</button></td>    

    <?php } else if ($status_avaliacao == 3) { ?>
          <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#aval-trab-<?php echo $id_sub; ?>"><i class="glyphicon glyphicon-search"></i> Aprovado com correções</button></td>    
        
    <?php } else if ($status_avaliacao == 4) { ?>

      <td><button type="button" class="btn btn-danger" disabled=""><i class="glyphicon glyphicon-search"></i> Não aceito</button></td>    

    <?php } ?>
        
    <?php }else{ ?> 
         <td><button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Em avaliação</button></td>    
    <?php } ?>





<?php } ?>

<!--modal edição -->

<?php
foreach ($subTrabalho as $submissoes) {

    $id_status_avaliacao = $submissoes->id_status_avaliacao;
    $id_inscricao = $submissoes->id_inscricao;
    $arquivo = $submissoes->arquivo;
    $id_submissao = $submissoes->id_inscricoes_sub_trabalho;
    $titulo = $submissoes->titulo;
    $resumo = $submissoes->resumo;
    $palavrasChave = $submissoes->palavras_chaves;
    $autor_principal = $this->session->userdata('usuario')->nome;
    $orientador = $submissoes->orientador;
    $coautor[1] = $submissoes->coautor_1;
    $coautor[2] = $submissoes->coautor_2;
    $coautor[3] = $submissoes->coautor_3;
    $coautor[4] = $submissoes->coautor_4;
    $coautor[5] = $submissoes->coautor_5;
    $avaliando = $submissoes->avaliando;
    ?>

    <!-- Modal EDITAR -->
    <div id="aval-trab-<?php echo $id_submissao; ?>" class="modal modal-wide fade">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Avaliar trabalho: <?php echo $titulo; ?></h4>
                </div>
                <div class="modal-body">


                    <div class="col-md-12">

                        <div class="col-md-12 corpo-sub-trabalho"> 
                            <?php
                            foreach ($gt_evento as $data) {
                                $id_evento_gt = $data->id_gt_evento;
                                $descricao_gt = $data->descricao;
                            }
                            ?>

                            <div class="form-group">
                                <label for="titulo">Título: </label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                <input type="text" disabled="" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo ?>" >
                            </div>

                            <input type="hidden" name="id_evento" value="<?php echo $id_evento_gt; ?>">
                            <input type="hidden" id="id_sub_aval" class="id_sub_aval" value="<?php echo $id_submissao; ?>">
                            
                            <div class="form-group">
                                <label for="resumo">Resumo:</label><span id="sub-trab-resumo" class="aviso-erro"> </span>

                                <textarea class="form-control" rows="10" disabled="" id="resumo-edit" name="resumo"><?php echo $resumo ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="titulo">Palavras Chave:</label>
                                <input type="text" disabled="" class="form-control bootstrap-tagsinput" value="<?php echo $palavrasChave ?>"/>                                                             
                            </div>

                            <?php if ($arquivo != "") { ?>

                                <div class="form-group">
                                    <label for="titulo" id="titulo-t">Arquivo do Trabalho:</label>
                                    <div class="alert alert-warning">
                                        <strong><i class="glyphicon glyphicon-paperclip"></i> Para ver o arquivo: </strong>( <a href="<?php echo base_url('assets/pdf/sub_trabalhos/' . $submissoes->arquivo); ?>" target="_blank">clique aqui</a> )
                                    </div>                                                                                
                                </div>
                            <?php } ?>
                            
                            <?php if ($id_status_avaliacao == 4) { ?>
                            <button type="button" class="btn btn-primary  btn-avaliar-trab-sub" onclick="alterarAvaliando('<?php echo $id_submissao; ?>');" data-toggle="modal" data-target="#aval-trab-final-<?php echo $id_submissao; ?>"><i class="glyphicon glyphicon-search"></i> Reavaliar trabalho</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-success btn-avaliar-trab-sub" onclick="alterarAvaliando('<?php echo $id_submissao; ?>');" data-toggle="modal" data-target="#aval-trab-final-<?php echo $id_submissao; ?>"><i class="glyphicon glyphicon-search"></i> Avaliar trabalho</button>
                            <?php } ?>
                        </div>                      
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div> 
    </div>


    <!-- Modal AVALIAR -->
    <div id="aval-trab-final-<?php echo $id_submissao; ?>" class="modal modal-wide fade">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="cancelAvaliando('<?php echo $id_submissao; ?>');" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Avaliar trabalho: <?php echo $titulo; ?></h4>
                </div>
                <div class="modal-body">



                    <div id="avaliar">
                        <div class="alert alert-danger"><strong><i class="glyphicon glyphicon-paperclip"></i> Para ver o arquivo: </strong>( <a href="<?php echo base_url('assets/pdf/sub_trabalhos/' . $submissoes->arquivo); ?>" target="_blank">clique aqui</a> )</div>

                        <form action="<?php echo base_url('admin/Avaliacao/inserirAvaliacao'); ?>" method="post">

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Avaliar Trabalho</h3>
                                </div>
                                <div class="panel-body">


                                    <div class="form-group">
                                        <label for="texto">O trabalho está?: *</label>
                                        <select class="form-control" id="aval_sub" name="aval_sub" required="">     

                                            <?php
                                            foreach ($status_aval as $dados) {
                                                
                                                $status_avaliacao = $dados->descricao;
                                                ?>
                                                <option value="<?php echo $dados->id_status_avaliacao; ?>"><?php echo $status_avaliacao; ?></option>
                                            <?php } ?>                    
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $id_submissao ?>" id="id_submissao" name="id_submissao">
                                        <label for="resumo">Parecer:</label><span id="parecer-sub" class="aviso-erro"> </span>

                                        <textarea class="form-control" rows="10"  id="parecer-sub" name="parecer-sub"></textarea>
                                    </div>
                                    <input type="hidden" name="id_inscricao" id="id_inscricao" value="<?php echo $id_inscricao; ?>">
                                    <input type="hidden" name="id_evento" id="id_evento" value="<?php echo $id_evento; ?>">
                                    <input type="hidden" name="id_gt" id="id_gt" value="<?php echo $id_gt; ?>">
                                    <button class="btn btn-success col-md-12 btn-avaliar"  id="btn-avaliar">Concluir avaliação</button>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"  onclick="cancelAvaliando('<?php echo $id_submissao; ?>');"  data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

