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
            </div>
            <blockquote>
                <p>Eventos disponíveis</p>					
            </blockquote>            
            <table class="table table-bordered table-action">
                <thead>
                    <tr>                        
                        <th>Título do Evento</th>
                        <th>Início das Inscrições</th>
                        <th>Fim das Inscrições</th>
                        <th>Oficinas e Minicursos </th>
                        <th>Submissão de trabalhos</th>
                        <th>Realizar Pagamento</th>
                        <th>Imprimir Comprovante</th>
                        <th>Inscreva-se</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($eventosAtivos as $data) {
                        $id_evento = $data->id_evento;
                        $nome_evento = $data->titulo;
                        $descricao_evento = $data->descricao;
                        $valor = $data->valor_evento;
                        $inicio_inscricoes = data_br($data->dtIni_Insc);
                        $fim_inscricoes = data_br($data->dtFim_Insc);
                        $fone = $data->fone;
                        $local = $data->local;
                        $site = $data->site_evento;
                        $email = $data->email_evento;
                        $id_usuario = $this->session->userdata('usuario')->id_pessoa;
                        $fl_inscrito = $data->fl_inscrito;
                        $fl_ativo = $data->ativo;
                        $tem_submissao = $data->tem_submissao;
                        $gerouPagamento = $data->fl_enviouComprovante;

                        $data_atual = date('Y-m-d');
                        $fim_inscricoes_bd = data_bd($data->dtFim_Insc);


                        $fl_pago = $data->fl_pago;
                        if ($valor == 0) {
                            $valor = "Evento gratuito";
                        }

                        if ($fl_ativo == "S" || $fl_ativo == "s" && strtotime($data_atual) <= strtotime($fim_inscricoes_bd)) {
                            ?>    
                            <tr>
                                <td><?php echo $nome_evento ?></td>
                                <td><?php echo $inicio_inscricoes ?></td>
                                <td><?php echo $fim_inscricoes ?></td>


                                <?php if ($fl_inscrito == "N") { ?>
                                    <td><button type="button" class="btn btn-info btn-group-xs" data-toggle="modal" disabled="" data-target="#ver-mais<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Selecione</button></td>
                                    <td><button type="button" class="btn btn-danger btn-group-xs" data-toggle="modal" disabled=""><i class="glyphicon glyphicon-search"></i> Submissão de trabalhos</button></td>    
                                    <td><button type="button" class="btn btn-warning btn-group-xs" disabled=""><i class="glyphicon glyphicon-ok"></i> Pagamento</button></td>
                                    <td><button type="button" class="btn btn-warning btn-group-xs" disabled=""><i class="glyphicon glyphicon-ok"></i> Imprimir Comprovante</button></td>
                                    <td><button type="button" class="btn btn-success btn-group-xs" data-toggle="modal" data-target="#inscricao<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button></td>
                                    <?php } else {
                                    ?>
                                    <td><button type="button" class="btn btn-info btn-group-xs" data-toggle="modal" data-target="#ver-mais<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Selecione</button></td>
                                    <?php if ($tem_submissao == "s" || $tem_submissao == "S") {
                                        ?>

                                        <td><a href="<?php echo base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento); ?>"<button type="button" class="btn btn-info btn-group-xs"><i class="glyphicon glyphicon-search"></i> Submissão de trabalhos</button></a></td>    

                                    <?php } else { ?>
                                        <td><button type="button" class="btn btn-info btn-group-xs" disabled=""><i class="glyphicon glyphicon-search"></i> Este evento não tem submissão</button></td>    

                                    <?php }; ?>


                                    <?php if ($gerouPagamento == "NGERADO") { ?> 
                                        <td><button type="button" class="btn btn-success btn-group-xs" data-toggle="modal" data-target="#enviar-comprovante<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-ok"></i> Enviar Comprovante</button></td>
                                        <!--<td><a href="<?php echo base_url('admin/Inscricoes/gerarBoleto/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-success btn-group-xs"><i class="glyphicon glyphicon-ok"></i> Gerar Boleto</button></a></td>-->

                                    <?php } else { ?>

                                        <?php if ($fl_pago == "NPAGO") { ?>
                                                                <td><button type="button" class="btn btn-success btn-group-xs"  disabled="" data-toggle="modal"><i class="glyphicon glyphicon-ok"></i> Comprovante Enviado</button></td>                                                                                                                                                                                                                                                                                                                                                                       <!--<td><a href="<?php echo base_url('admin/Inscricoes/gerarBoleto/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-primary btn-group-xs"><i class="glyphicon glyphicon-ok"></i> 2º via do Boleto</button></a></td>-->
                                                                                                                                                                                                                                                                                                                                                                                            <!--<td><button type="button" class="btn btn-warning btn-group-xs disabled"><i class="glyphicon glyphicon-ok"></i> Aguardando pagamento</button></td>-->
                                        <?php } else if ($fl_pago == "PAGO") { ?>
                                            <td><button type="button" class="btn btn-success btn-group-xs disabled"><i class="glyphicon glyphicon-ok"></i> Pagamento efetuado</button></td>
                                        <?php } ?>
                                    <?php } ?>    
                                    <td><a href="<?php echo base_url('admin/pdfs/imprimirComprovante/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-warning btn-group-xs"><i class="glyphicon glyphicon-file"></i> Imprimir Comprovante</button></a></td>
                                    <td><button type="button" class="btn btn-danger btn-group-xs disabled"><i class="glyphicon glyphicon-ok"></i> Inscrito</button></td>                                    
                                <?php } ?>

                            </tr>   
                        </tbody>
                    <?php }
                } ?>


            </table>

            <?php
            foreach ($eventosAtivos as $data) {
                $id_evento = $data->id_evento;
                $nome_evento = $data->titulo;
                $descricao_evento = $data->descricao;
                $valor = $data->valor_evento;
                $inicio_inscricoes = data_br($data->dtIni_Insc);
                $fim_inscricoes = data_br($data->dtFim_Insc);
                $fone = $data->fone;
                $local = $data->local;
                $site = $data->site_evento;
                $email = $data->email_evento;
                $id_usuario = $this->session->userdata('usuario')->id_pessoa;
                $fl_inscrito = $data->fl_inscrito;
                $fl_ativo = $data->ativo;
                $tem_submissao = $data->tem_submissao;
                $gerouPagamento = $data->fl_enviouComprovante;

                $data_atual = date('Y-m-d');
                $fim_inscricoes_bd = data_bd($data->dtFim_Insc);
                ?>
                <!-- Modal-VER MAIS -->
                <div class="modal modal-wide fade" id="ver-mais<?php echo $id_evento; ?>" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">

                                <p><strong>Descrição:</strong> <?php echo $descricao_evento; ?></p>
                                <p><strong>Telefone: </strong><?php echo $fone; ?></p>
                                <p><strong>Site:</strong> <a href="<?php echo $site; ?>" target="_blank">( clique aqui )</a></p>
                                <p><strong>Email: </strong><?php echo $email; ?></p>
                            </div>
                            <div class="modal-footer icones-modal">      

    <?php if ($fl_inscrito == "S") { ?>                                                                                
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mini-curso<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Minicursos</button>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#oficinas<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Oficinas</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
    <?php } else { ?>
                                    <button type="button" class="btn btn-primary btn-group-xs" disabled="" data-toggle="modal"><i class="glyphicon glyphicon-search"></i> Minicursos</button>
                                    <button type="button" class="btn btn-primary btn-group-xs" disabled="" data-toggle="modal"><i class="glyphicon glyphicon-search"></i> Oficinas</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="glyphicon glyphicon-remove"></i> Fechar</button>
    <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal - VER MAIS -->   
<?php } ?>



            </tbody>
            </table>            
            <?php
            foreach ($eventosAtivos as $data) {
                $id_evento = $data->id_evento;
                $nome_evento = $data->titulo;
                $descricao_evento = $data->descricao;
                $valor = $data->valor_evento;
                $inicio_inscricoes = data_br($data->dtIni_Insc);
                $fim_inscricoes = data_br($data->dtFim_Insc);
                $fone = $data->fone;
                $local = $data->local;
                $site = $data->site_evento;
                $email = $data->email_evento;
                $id_usuario = $this->session->userdata('usuario')->id_pessoa;
                $fl_inscrito = $data->fl_inscrito;
                $fl_ativo = $data->ativo;
                $tem_submissao = $data->tem_submissao;
                $data_atual = date('d/m/Y');
                ?>



                <div class="modal modal-wide fade" id="mini-curso<?php echo $id_evento; ?>" role="dialog">
                    <div class="modal-dialog modal-lg">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">


                                <h4 class="modal-title">Oficina: <?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">                                        
                                <div class="col-md-offset-1" id="aguarde">
                                    <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>" class="img-responsive">
                                </div>
                                <table class="table table-responsive table-action">

                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Turno</th>
                                            <th>Dias</th>
                                            <th>Horário</th>
                                            <th>Local</th>
                                            <th>Inscreva-se</th>
                                        </tr>
                                    </thead>

                                    <?php if ($numInscricoesAtividades == 0) { ?>
                                        <?php
                                        foreach ($atividade as $dados) {
                                            $id_atividade = $dados->id_atividade_evento;
                                            $id_evento_mini = $dados->id_evento;
                                            $nome_atividade = $dados->titulo_atividade;
                                            $descricao_atividade = $dados->descricao_atividade;
                                            $max_participantes = $dados->max_participantes;
                                            $total_de_inscritos = $dados->num_inscritos;
                                            $data_inicio = $dados->dtIni_atividade;
                                            $data_fim = $dados->dtFim_atividade;
                                            $hora_inicio = $dados->horaIni_atividade;
                                            $hora_fim = $dados->horaFim_atividade;
                                            $local = $dados->local;
                                            $email = $dados->email_responsavel;
                                            $telefone = $dados->fone_responsavel;
                                            $id_minicurso = $dados->id_atividade_evento;
                                            $id_tipo_atividade = $dados->id_tipo_atividade;
                                            $id_evento_minicurso = $dados->id_evento;
                                            $inscrito_atividade = $dados->fl_inscrito_atividade;
                                            $dias = $dados->dias;
                                            $turno = $dados->turno;
                                            if ($id_evento == $id_evento_mini) {
                                                if ($id_tipo_atividade == 1) {
                                                    ?>
                                                    <tbody>
                                                    <th><?php echo $nome_atividade; ?></th>
                                                    <td><?php echo $turno; ?></td>
                                                    <td><?php echo $dias; ?></td>
                                                    <td><?php echo $hora_inicio . ":00 ás " . $hora_fim . ":00" ?></td>

                                                    <td><button class="btn btn-info col-md-12" onclick="localMinicurso('<?php echo $local ?>');"><i class="glyphicon glyphicon-search"></i></button></td>

                                                    <?php if ($total_de_inscritos < $max_participantes) { ?>
                                                        <?php if ($inscrito_atividade == "N") { ?>                                                   
                                                            <td><button class="btn btn-success col-md-12" onclick="cadastrarPessoaAtividade('<?php echo $id_atividade; ?>', '<?php echo $id_evento ?>', '<?php echo $id_usuario ?>');"><i class="glyphicon glyphicon-ok"></i> Inscreva-se</button></td>
                                                        <?php } else { ?>
                                                            <td><button class="btn btn-danger col-md-12" disabled=""> Inscrito</button></td>
                                                        <?php } ?>


                                                    <?php } else {
                                                        ?>
                                                        <td><button class="btn btn-danger col-md-12" disabled=""> Nº max atingido</button></td>                                
                    <?php }
                    ?>

                                                    </tbody>


                                                    <?php
                                                }
                                            }
                                        }
                                    } else {
                                        foreach ($atividade as $dados) {
                                            $id_atividade = $dados->id_atividade_evento;
                                            $id_evento_mini = $dados->id_evento;
                                            $nome_atividade = $dados->titulo_atividade;
                                            $descricao_atividade = $dados->descricao_atividade;
                                            $max_participantes = $dados->max_participantes;
                                            $total_de_inscritos = $dados->num_inscritos;
                                            $data_inicio = $dados->dtIni_atividade;
                                            $data_fim = $dados->dtFim_atividade;
                                            $hora_inicio = $dados->horaIni_atividade;
                                            $hora_fim = $dados->horaFim_atividade;
                                            $local = $dados->local;
                                            $email = $dados->email_responsavel;
                                            $telefone = $dados->fone_responsavel;
                                            $id_minicurso = $dados->id_atividade_evento;
                                            $id_tipo_atividade = $dados->id_tipo_atividade;
                                            $id_evento_minicurso = $dados->id_evento;
                                            $inscrito_atividade = $dados->fl_inscrito_atividade;
                                            $dias = $dados->dias;
                                            $turno = $dados->turno;
                                            if ($id_evento == $id_evento_mini) {
                                                if ($id_tipo_atividade == 1 && $inscrito_atividade == "S") {
                                                    ?>
                                                    <tbody>

                                                    <th><?php echo $nome_atividade; ?></th>
                                                    <td><?php echo $turno; ?></td>
                                                    <td><?php echo $dias; ?></td>
                                                    <td><?php echo $hora_inicio . ":00 ás " . $hora_fim . ":00" ?></td>
                                                    <td><button class="btn btn-info col-md-12" onclick="localMinicurso('<?php echo $local ?>');"><i class="glyphicon glyphicon-search"></i></button></td>
                                                    <td><button class="btn btn-danger col-md-12" disabled=""> Inscrito</button></td>

                                                    <div class="alert alert-danger"> Você já se inscreveu em um minicurso!</div>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>

                                </table>
                            </div>                                                                
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                            </div>
                        </div>                                                        
                    </div>                                                
                </div>

<?php } ?>    <!-- Modal - VER MAIS -->

            <!-- Modal-oficinas 
            ******************************* MODAL OFICINAS ***************************************
            -->
            <?php
            foreach ($eventosAtivos as $data) {
                $id_evento = $data->id_evento;
                $nome_evento = $data->titulo;
                $descricao_evento = $data->descricao;
                $valor = $data->valor_evento;
                $inicio_inscricoes = data_br($data->dtIni_Insc);
                $fim_inscricoes = data_br($data->dtFim_Insc);
                $fone = $data->fone;
                $local = $data->local;
                $site = $data->site_evento;
                $email = $data->email_evento;
                $id_usuario = $this->session->userdata('usuario')->id_pessoa;
                $fl_inscrito = $data->fl_inscrito;
                $fl_ativo = $data->ativo;
                $tem_submissao = $data->tem_submissao;
                $data_atual = date('d/m/Y');
                ?>




                <div id="oficinas<?php echo $id_evento; ?>" class="modal modal-wide fade">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">


                                <h4 class="modal-title">Oficina: <?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" id="aguarde-oficina">
                                    <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>" class="img-responsive">
                                </div>


                                <table class="table table-responsive table-action">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Turno</th>
                                            <th>Dias</th>
                                            <th>Horário</th>
                                            <th>Local</th>
                                            <th>Inscreva-se</th>
                                        </tr>
                                    </thead>


                                    <?php
                                    foreach ($atividade as $dados) {
                                        $id_atividade = $dados->id_atividade_evento;
                                        $id_evento_mini = $dados->id_evento;
                                        $nome_atividade = $dados->titulo_atividade;
                                        $descricao_atividade = $dados->descricao_atividade;
                                        $max_participantes = $dados->max_participantes;
                                        $total_de_inscritos = $dados->num_inscritos;
                                        $data_inicio = $dados->dtIni_atividade;
                                        $data_fim = $dados->dtFim_atividade;
                                        $hora_inicio = $dados->horaIni_atividade;
                                        $hora_fim = $dados->horaFim_atividade;
                                        $local = $dados->local;
                                        $email = $dados->email_responsavel;
                                        $telefone = $dados->fone_responsavel;
                                        $id_minicurso = $dados->id_atividade_evento;
                                        $id_tipo_atividade = $dados->id_tipo_atividade;
                                        $id_evento_minicurso = $dados->id_evento;
                                        $inscrito_atividade = $dados->fl_inscrito_atividade;
                                        $dias = $dados->dias;
                                        $turno = $dados->turno;
                                        if ($id_evento == $id_evento_mini) {
                                            if ($id_tipo_atividade == 2) {
                                                ?>
                                                <tbody>
                                                <th><?php echo $nome_atividade; ?></th>
                                                <td><?php echo $turno; ?></td>
                                                <td><?php echo $dias; ?></td>
                                                <td><?php echo $hora_inicio . ":00 ás " . $hora_fim . ":00" ?></td>

                                                <td><button class="btn btn-info col-md-12" onclick="localMinicurso('<?php echo $local ?>');"><i class="glyphicon glyphicon-search"></i></button></td>

                                                <?php if ($total_de_inscritos < $max_participantes) { ?>
                                                    <?php if ($inscrito_atividade == "N") { ?>                                                   
                                                        <td><button class="btn btn-success col-md-12" onclick="cadastrarPessoaAtividade('<?php echo $id_atividade; ?>', '<?php echo $id_evento ?>', '<?php echo $id_usuario ?>');"><i class="glyphicon glyphicon-ok"></i> Inscreva-se</button></td>
                                                    <?php } else { ?>
                                                        <td><button class="btn btn-danger col-md-12" disabled=""> Inscrito</button></td>
                                                    <?php } ?>


                                                <?php } else { ?>
                                                    <td><button class="btn btn-danger col-md-12" disabled=""> Nº max atingido</button></td>                                
                <?php }
                ?>

                                                </tbody>


                                                <?php
                                            }
                                        }
                                    }
                                    ?>

                                </table>
                            </div>                                                                
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                            </div>
                        </div>                                                        
                    </div>                                                
                </div>

<?php } ?>    <!-- Modal - VER MAIS -->


            <!-- Modal-oficinas 
            ******************************* MODAL INSCRICOES ***************************************
            -->
            <?php
            foreach ($eventosAtivos as $data) {
                $id_evento = $data->id_evento;
                $nome_evento = $data->titulo;
                $descricao_evento = $data->descricao;
                $valor = $data->valor_evento;
                $inicio_inscricoes = data_br($data->dtIni_Insc);
                $fim_inscricoes = data_br($data->dtFim_Insc);

                $fone = $data->fone;
                $local = $data->local;
                $site = $data->site_evento;
                $email = $data->email_evento;
                $id_usuario = $this->session->userdata('usuario')->id_pessoa;
                $fl_inscrito = $data->fl_inscrito;
                $fl_ativo = $data->ativo;
                $tem_submissao = $data->tem_submissao;
                $data_atual = date('d/m/Y');
                ?>


                <div class="modal fade" id="inscricao<?php echo $id_evento; ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="modal-title">Evento: <?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-danger" id="aguarde-evento">
                                    <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>" class="img-responsive">
                                </div>

                                <div class="alert alert-danger" id="valores-ins">
                                    <?php
                                    foreach ($valores as $data) {

                                        if ($id_evento == $data->id_evento) {
                                            $id = $data->id_valor;
                                            $valor = $data->valor;
                                            $id_categoria = $data->id_categoria;
                                            echo '<p><strong>' . $data->descricao . ': </strong>R$ ' . $valor . ',00</p>';
                                        }
                                    }
                                    ?>
                                </div>


                                <form action="<?php echo base_url('admin/Inscricoes/inserirInscricao'); ?>" method="post">



                                    <div class="form-group">
                                        <label for="texto">Categoria: </label>
                                        <select class="form-control" id="id_categoria" name="id_categoria" required="">
                                            <?php
                                            foreach ($valores as $dados) {

                                                $id_categoria = $dados->id_categorias_inscricoes;
                                                $descricao = $dados->descricao;
                                                echo "<option value='$id_categoria'>$descricao</option><br>";
                                            }
                                            ?>
                                        </select>                            
                                    </div> 
                                    <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                    <button type="submit" class="btn btn-success btn-group-xs col-md-12" id="enviar-ins"><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button>
                                </form>

                            </div>                                                                
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                            </div>
                        </div>                                                        
                    </div>                                                
                </div>
<?php } ?>    <!-- Modal - VER MAIS -->
        </div>
    </div>    
</div>


<!-- Modal-oficinas 
        ******************************* MODAL COMPROVANTE***************************************
-->
<?php
foreach ($eventosAtivos as $data) {
    $id_evento = $data->id_evento;
    $nome_evento = $data->titulo;
    $descricao_evento = $data->descricao;
    $valor = $data->valor_evento;
    $inicio_inscricoes = data_br($data->dtIni_Insc);
    $fim_inscricoes = data_br($data->dtFim_Insc);
    $fone = $data->fone;
    $local = $data->local;
    $site = $data->site_evento;
    $email = $data->email_evento;
    $id_usuario = $this->session->userdata('usuario')->id_pessoa;
    $fl_inscrito = $data->fl_inscrito;
    $fl_ativo = $data->ativo;
    $tem_submissao = $data->tem_submissao;
    $data_atual = date('d/m/Y');
    ?>


    <div class="modal fade" id="enviar-comprovante<?php echo $id_evento; ?>" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enviar Comprovante: <?php echo $nome_evento; ?></h4>
                </div>
                <div class="modal-body">  
                    <div class="alert alert-danger" id="aguarde-comprovante">
                        <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>" class="img-responsive">
                    </div>


                    <form method="post" name="comprovante" action="<?php echo base_url('admin/Inscricoes/enviarComprovante/' . $id_evento . '/' . $this->session->userdata('usuario')->id_pessoa) ?>" enctype="multipart/form-data">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enviar Comprovante</h3>
                            </div>
                            <div class="panel-body">   
                                <div class="alert alert-danger" id="format-comprovante">
                                    <strong><i class="glyphicon glyphicon-warning-sign"></i> Tipos de arquivos permitidos: jpg | jpeg | png | pdf</strong>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Arquivo:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                    <input type="file" required="" class="form-control" id="comprovante" name="comprovante"/>
                                </div> 
                                <input type="submit" class="btn btn-success col-md-12" id="enviar-comprovante" value="Enviar">
                            </div>
                        </div>                       
                    </form>
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal" '><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
<?php } ?>    <!-- Modal - VER MAIS -->
</div>
</div>    
</div>
