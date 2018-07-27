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

                <blockquote>
                    <p>Eventos disponíveis</p>					
                </blockquote>                       

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
                    $background_card = $data->background_card;
                    $data_atual = date('Y-m-d');
                    $fim_inscricoes_bd = data_bd($data->dtFim_Insc);


                    $fl_pago = $data->fl_pago;
                    if ($valor == 0) {
                        $valor = "Evento gratuito";
                    }

                    if ($fl_ativo == "S" || $fl_ativo == "s" && strtotime($data_atual) <= strtotime($fim_inscricoes_bd)) {
                        ?>
                        <div class="col-md-3 orientacoes">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo base_url('assets/img/background_cards/' . $background_card); ?>">
                                <div class="card-block">
                                    <h4 class="card-title"><?php echo limitar_texto($nome_evento, 50) ?></h4>
                                    <div class="meta">

                                    </div>
                                    <div class="card-text">                                    
                                        <?php if ($fl_inscrito == "N") { ?>
                                            <button type="button" class="btn btn-info btn-sm btn-card" data-toggle="modal" disabled="" data-target="#ver-mais<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Atividades / Informações</button>
                                            <button type="button" class="btn btn-danger btn-sm btn-card" data-toggle="modal" disabled=""><i class="glyphicon glyphicon-search"></i> Submissão de trabalhos</button>
                                            <button type="button" class="btn btn-warning btn-sm btn-card " disabled=""><i class="glyphicon glyphicon-ok"></i> Pagamento</button>
                                            <button type="button" class="btn btn-warning btn-sm btn-card" disabled=""><i class="glyphicon glyphicon-ok"></i> Imprimir</button>
                                            <?php if($id_evento == 6){ ?>
                                                <button type="button" class="btn btn-success btn-sm btn-card" disabled data-toggle="modal" data-target="#inscricao<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button>    
                                            <?php }else{ ?>
                                            <button type="button" class="btn btn-success btn-sm btn-card" data-toggle="modal" data-target="#inscricao<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button>
                                            <?php } ?>
                                        <?php } else { ?> 
                                            <button type="button" class="btn btn-sm btn-info btn-card" data-toggle="modal" data-target="#ver-mais<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Atividades / Informações</button>
                                            <?php if ($tem_submissao == "s" || $tem_submissao == "S") {
                                                ?>

                                                <a href="<?php echo base_url('admin/SubTrabalho/sub_trabalho/' . $id_evento); ?>"<button type="button" class="btn-card btn btn-info btn-sm"><i class="glyphicon glyphicon-search"></i> Submissão de trabalhos</button></a>

                                            <?php } else { ?>
                                                <button type="button" class="btn btn-info btn-sm btn-card" disabled=""><i class="glyphicon glyphicon-search"></i> Submissão de trabalhos</button>

                                            <?php }; ?>


                                            <?php if ($gerouPagamento == "NGERADO") { ?> 
                                                <button type="button" class="btn btn-success btn-sm btn-card" data-toggle="modal" data-target="#enviar-comprovante<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-ok"></i> Enviar Comprovante de Pagamento</button>
                                                <!--<td><a href="<?php echo base_url('admin/Inscricoes/gerarBoleto/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-success btn-group-xs"><i class="glyphicon glyphicon-ok"></i> Gerar Boleto</button></a></td>-->

                                            <?php } else { ?>

                                                <?php if ($fl_pago == "NPAGO") { ?>
                                                                                                                        <button type="button" class="btn btn-success btn-sm btn-card"  disabled="" data-toggle="modal"><i class="glyphicon glyphicon-ok"></i> Comprovante Enviado</button>                                                                                                                                                                                                                                                                                                                                                                     <!--<td><a href="<?php echo base_url('admin/Inscricoes/gerarBoleto/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-primary btn-group-xs"><i class="glyphicon glyphicon-ok"></i> 2º via do Boleto</button></a></td>-->

                                                <?php } else if ($fl_pago == "PAGO") { ?>
                                                    <button type="button" class="btn btn-success btn-sm disabled btn-card"><i class="glyphicon glyphicon-ok"></i> Pagamento efetuado</button>
                                                <?php } ?>
                                            <?php } ?>
                                            <a href="<?php echo base_url('admin/pdfs/imprimirComprovante/' . $id_evento); ?>" target="_blank"><button type="button" class="btn btn-warning btn-sm btn-card"><i class="glyphicon glyphicon-file"></i> Imprimir Comprovante</button></a>

                                            <?php if ($id_evento == 19) { ?>
                                                <button type="button" class="btn btn-success btn-sm col-md-5" data-toggle="modal" data-target="#sub-area"> Sub de Simpósios</button> 
                                                <button type="button" class="btn btn-danger btn-sm disabled  col-md-offset-1 col-md-6"><i class="glyphicon glyphicon-ok"></i> Inscrito</button> 
                                            <?php }else{ ?>
                                            <button type="button" class="btn btn-danger btn-sm disabled btn-card"><i class="glyphicon glyphicon-ok"></i> Inscrito</button>                 
                                        <?php }} ?>


                                    </div>
                                </div>
                                <div class="card-footer">
                                    <span class="float-right">Fim das Inscrições:</span>
                                    <span><i class=""></i><strong><?php echo $fim_inscricoes; ?></strong></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

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


                                <h4 class="modal-title">Minicurso: <?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">                                        
                                <div class="hidden" id="aguarde<?php echo $id_evento; ?>">
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

                                    <?php if ($numInscricoesAtividades == 0 || $numInscricoesAtividades != 0) { ?>
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
                                <div class="hidden" id="aguarde-oficina<?php echo $id_evento; ?>">
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

                                <h4 class="modal-title" onclick="enviarIns('<?php echo $id_evento; ?>');">Evento: <?php echo $nome_evento; ?></h4>
                            </div>
                            <div class="modal-body">
                                <div class="hidden" id="aguarde-evento<?php echo $id_evento; ?>">
                                    <img src="http://cev.urca.br/siseventos/assets/img/aguarde.gif" class="img-responsive">
                                </div>

                                <div class="alert alert-danger" id="valores-ins<?php echo $id_evento; ?>">
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

                                                if ($id_evento == $dados->id_evento) {
                                                    echo "<option value='$id_categoria'>$descricao</option><br>";
                                                }
                                            }
                                            ?>
                                        </select>                            
                                    </div> 

                                    <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">
                                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                    <button type="submit"  class="btn btn-success btn-group-xs col-md-12"  ><i class="glyphicon glyphicon-ok"></i> Realizar Inscrição</button>
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
                    <h4 class="modal-title">Enviar Comprovante de pagamento: <?php echo $nome_evento; ?></h4>
                </div>
                <div class="modal-body">  
                    <div class="hidden" id="aguarde-comprovante<?php echo $id_evento ?>">
                        <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>" class="img-responsive">
                    </div>


                    <form method="post" name="comprovante" action="<?php echo base_url('admin/Inscricoes/enviarComprovante/' . $id_evento . '/' . $this->session->userdata('usuario')->id_pessoa) ?>" enctype="multipart/form-data">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enviar Comprovante de Pagamento</h3>
                            </div>
                            <div class="panel-body">   
                                <div class="alert alert-danger" id="format-comprovante<?php echo $id_evento; ?>">
                                    <strong><i class="glyphicon glyphicon-warning-sign"></i> Tipos de arquivos permitidos: jpg | jpeg | png | pdf</strong>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Arquivo:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                    <input type="file" required="" class="form-control" id="comprovante" name="comprovante"/>
                                </div> 
                                <input type="submit" class="btn btn-success col-md-12" onclick="enviarComprovante('<?php echo $id_evento; ?>');" value="Enviar">
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

<div class="modal fade" id="sub-area" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Submissão de propostas de simpósios temáticos</h4>
                </div>
                <div class="modal-body">  
                    

                   

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Submissão de propostas de simpósios temáticos</h3>
                            </div>
                            <div class="panel-body">   
                                <form method="post" name="comprovante" action="<?php echo base_url('admin/Inscricoes/enviarSimposio') ?>">
                               
                                 <div class="form-group">
                                    <label for="titulo">Simpósio Temático:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                    <input type="text" required="" class="form-control" id="nome" name="titulo"/>
                                </div> 
                                
                                 <div class="form-group">
                                    <label for="titulo">Descrição:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                    <textarea class="form-control" name="descricao"></textarea>
                                </div> 
                                    <input type="submit" class="btn btn-success col-md-12" value="Enviar">
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