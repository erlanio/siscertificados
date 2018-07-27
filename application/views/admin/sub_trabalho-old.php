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

                <?php
                if ($gt_evento_area) {
                    foreach ($gt_evento_area as $data) {
                        $inicio_sub = $data->dtIni_sub;
                        $fim = $data->dtFim_sub;
                        $num_coAutores = $data->num_coAutores;
                        $num_caracteres = $data->maxRes_char;
                        $id_evento_gt = $data->id_evento;
                        $tem_arquivo = $data->tem_arquivo;
                        date_default_timezone_set('America/Sao_Paulo');
                        $max_submissao = $data->max_submissao;
                        $data_atual = date('Y-m-d');
                    }
                } else {
                    foreach ($gt_evento as $data) {
                        $inicio_sub = $data->dtIni_sub;
                        $fim = $data->dtFim_sub;
                        $num_coAutores = $data->num_coAutores;
                        $num_caracteres = $data->maxRes_char;
                        $id_evento_gt = $data->id_evento;
                        $tem_arquivo = $data->tem_arquivo;
                        $max_submissao = $data->max_submissao;
                        $data_atual = date('Y-m-d');
                    }
                }

                foreach ($sub_trabalho as $submissoes) {
                    $num_submissoes = $num_sub;
                }
                ?>    


                <?php if (strtotime($fim) >= strtotime($data_atual)) { ?>


                    <?php if ($num_sub < $max_submissao) { ?>

                        <div class="col-md-12">

                            <p onclick="abrirInformacoesSub();" id="abrir"><button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Informações sobre submissão</button></p>

                            <div class="col-md-5 bloco-sub-trabalho" id="bloco-sub-trabalho">   
                                <p><button class="col-md-offset-11 btn btn-danger" id="fechar-informacoes-sub"><i class="glyphicon glyphicon-remove"></i></button></p>
                                <div class="alert alert-danger"><p>Você enviou <strong><?php echo $num_sub; ?> </strong>trabalho(s) para este evento!</p>
                                    <p>Número máximo de submissões : <strong><?php echo $max_submissao ?></strong></p></div>
                                <p>Início de Submissões: <strong><?php echo data_br($inicio_sub); ?></strong></p>
                                <p>Fim de Submissões : <strong><?php echo data_br($fim); ?></strong></p>
                                <p>Número máximo de Co-autores : <strong><?php echo $num_coAutores; ?></strong></p>
                            </div>
                        </div>


                        <?php if ($gt_evento_area) { ?>

                            <?php if ($num_sub != 0) { ?>
                                <h2 class="col-md-10">Trabalhos Enviados</h2>
                                <div class="col-md-12">
                                    <table class="table table-bordered table-action thead col-md-8">
                                        <thead>
                                            <tr>                        
                                                <th>Título</th>
                                                <th>Autor Principal</th>
                                                <th>Status</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                                <th>Nova Submissão</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        foreach ($sub_trabalho as $submissoes) {
                                            $id_status_avaliacao = $submissoes->id_status_avaliacao;

                                            $status_avaliacao = $submissoes->descricao;
                                            $id_evento = $this->uri->segment(4);
                                            $id_submissao = $submissoes->id_inscricoes_sub_trabalho;
                                            $titulo = $submissoes->titulo;
                                            $autor_principal = $this->session->userdata('usuario')->nome;
                                            ?>
                                            <tbody>

                                            <td><?php echo $titulo ?></td>
                                            <td><?php echo $autor_principal ?></td>


                                            <td><strong><?php echo $status_avaliacao; ?></strong></td>

                                 
                                            <?php if ($id_status_avaliacao == 1 || $id_status_avaliacao == 3) { ?>
                                                <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit-<?php echo $id_submissao; ?>"><i class='glyphicon glyphicon-edit'></i> Editar trabalho</button></div></td>
                                            <?php } else { ?>
                                                <td><button class="btn btn-primary" disabled=""><i class='glyphicon glyphicon-edit'></i> Editar trabalho</button></div></td>
                                            <?php } ?>

                                            <td><button type='button' class='btn btn-danger btn-group-xs' onclick="apagarSubTrabalho('<?php echo $id_submissao; ?>', '<?php echo $id_evento; ?>', '<?php echo base_url(); ?>')"><i class='glyphicon glyphicon-remove'></i> Apagar trabalho</button></td>
                                            <td><button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Nova submissão</button></div></td>

                                            </tbody>
                                        <?php }
                                        ?>

                                    </table>
                                </div>
                            <?php } else if ($num_sub == 0) { ?> 
                                <div class="col-md-12 alert alert-warning" id="sessao-nova-sub"><strong>Você ainda não enviou trabalhos para este evento: </strong>                                    
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Nova submissão</button></div>
                                <?php
                            }
                        }
                        ?>




                        <!-- FIM VERIFICA NUM SUBMISSÕES-->
                    <?php } else { ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <strong>Ops! Você antingiu o número máximo de submissões</strong>
                                <br>Não se preocupe, você pode excluir ou alterar uma de suas submissões!
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-action thead col-md-8">
                                <thead>
                                    <tr>                        
                                        <th>Título</th>
                                        <th>Autor Principal</th>
                                        <th>Status</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>                        
                                    </tr>
                                </thead>

                                <?php
                                foreach ($sub_trabalho as $submissoes) {
                                     $id_status_avaliacao = $submissoes->id_status_avaliacao;
                                    $id_evento = $this->uri->segment(4);
                                    $status_avaliacao = $submissoes->descricao;
                                    $id_submissao = $submissoes->id_inscricoes_sub_trabalho;
                                    $titulo = $submissoes->titulo;
                                    $autor_principal = $this->session->userdata('usuario')->nome;
                                    ?>
                                    <tbody>

                                    <td><?php echo $titulo ?></td>
                                    <td><?php echo $autor_principal ?></td>
                                    <td><strong><?php echo $status_avaliacao; ?></strong></td>
                                    <?php if ($status_avaliacao == "Aprovado" || $status_avaliacao == "Reprovado") { ?>

                                        <td><button class="btn btn-warning" disabled=""><i class='glyphicon glyphicon-edit'></i> Editar trabalho</button></div></td>
                                        <td><button type='button' class='btn btn-danger btn-group-xs' disabled=""><i class='glyphicon glyphicon-remove'></i> Apagar trabalho</button></td>
                                    <?php } else { ?>
                                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#myModalEdit-<?php echo $id_submissao; ?>"><i class='glyphicon glyphicon-edit'></i> Editar trabalho</button></div></td>
                                        <td><button type='button' class='btn btn-danger btn-group-xs' onclick="apagarSubTrabalho('<?php echo $id_submissao; ?>', '<?php echo $id_evento; ?>', '<?php echo base_url(); ?>')"><i class='glyphicon glyphicon-remove'></i> Apagar trabalho</button></td>    
                                    <?php } ?>

                                    </tbody>
                                <?php }
                                ?>

                            </table>
                        </div>

                    <?php } ?>
                    <!-- FIM VERIFICA DATA SUBMISSÃO-->
                <?php } else {
                    ?>
                </div>
                <div class="alert alert-danger">
                    <strong>Ops! Período de submissões encerrado</strong>
                </div> 

                <div class="col-md-12">
                    <?php if ($num_sub > 0) { ?>
                        <table class="table table-bordered table-action thead col-md-8">
                            <thead>
                                <tr>                        
                                    <th>Título</th>
                                    <th>Autor Principal</th>
                                    <th>Status</th>
                                    <th>Status</th>

                                </tr>
                            </thead>

                            <?php
                            foreach ($sub_trabalho as $submissoes) {

                                $titulo = $submissoes->titulo;
                                $autor_principal = $this->session->userdata('usuario')->nome;
                                echo "<tbody>";
                                echo "<td>$titulo</td>";
                                echo "<td>$autor_principal</td>";
                                echo "<td>Aguardando avaliação</td>";
                                echo "<td><button type='button' disabled class='btn btn-primary btn-group-xs' data-toggle='modal'><i class='glyphicon glyphicon-time'></i> Aguardando avaliação</button></td>";
                                echo "</tbody>";
                            }
                            ?>
                        </table>
                        <?php
                    }
                }
                ?>
            </div>



            <!-- Modal SUBMISSÃO-->

            <?php
            $id_evento = $this->uri->segment(4);
            ?>
            <div id="myModal" class="modal modal-wide fade">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Submissão de trabalhos</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-offset-1" id="aguarde-sub">
                                <img src="<?php echo base_url('assets/img/aguarde.gif'); ?>">
                            </div>

                            <div class="col-md-12" id="sub-hide"> 


                                <form method="post" name="sub_trab" id="sub_trab" action="<?php echo base_url('admin/SubTrabalho/inserirSubTrabalho'); ?>" enctype="multipart/form-data" onsubmit="return false">

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Autores</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="titulo">Autor Principal: </label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                                <input type="text" disabled="" class="form-control" value="<?php echo $this->session->userdata('usuario')->nome ?>" >
                                            </div>

                                            <div class="form-group">
                                                <label for="titulo">Orientador / Coautor 1:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span><br>

                                                <div class="alert alert-warning">
                                                    <input type="radio" class="" id="ori-co" name="ori-co" value="orientador"> Orientador&nbsp;&nbsp;
                                                    <input type="radio" class="" id="ori-co" name="ori-co" value="coautor1"> Coautor 1&nbsp;&nbsp;                                                
                                                </div>

                                                <input type="text" class="form-control" id="coautor1" name="coautor1" placeholder="Informe o Coautor1">
                                                <input type="text" class="form-control" id="orientador" name="orientador" placeholder="Informe o Orientador">

                                            </div>


                                            <?php for ($i = 1; $i <= $num_coAutores; $i++) { ?>
                                                <div class="form-group">
                                                    <label for="titulo" id="titulo-t">Coautor <?php echo $i + 1; ?>:</label><span class="aviso-erro"> </span>
                                                    <input type="text" class="form-control" id="coautor<?php echo $i + 1; ?>" name="coautor<?php echo $i + 1; ?>" >
                                                </div>
                                            <?php } ?>                        
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="texto">Modálidade</label>
                                        <select class="form-control" id="modalidade" name="modalidade" required="">
                                            <option value="1">Oral</option>
                                            <option value="2">Poster</option>
                                        </select>
                                    </div> 

                                    <?php
                                    foreach ($gt_evento_area as $data) {

                                        $num_coAutores = $data->num_coAutores;
                                        $num_caracteres_max = $data->maxRes_char;
                                        $num_caracteres_min = $data->minRes_char;
                                        $id_evento_gt = $data->id_evento;
                                        $tem_arquivo = $data->tem_arquivo;
                                    }
                                    ?>

                                    <div class="form-group">
                                        <label for="titulo">Título: </label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                        <input type="text" required="" class="form-control" id="titulo" name="titulo" >
                                    </div>


                                    <div class="form-group">
                                        <label for="texto">Área temática</label>
                                        <select class="form-control" id="area-tematica" name="area-tematica" required="">

                                            <?php
                                            foreach ($gt_evento_area as $data) {
                                                $id_area = $data->id_gt_evento;
                                                $area_tematica = $data->descricao;
                                                $max_char = $data->maxRes_char;
                                                ?>
                                                <option value="<?php echo $id_area; ?>"><?php echo $area_tematica; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="id_evento" value="<?php echo $id_evento_gt; ?>">

                                    <div class="form-group">
                                        <label for="resumo">Resumo:</label><span id="sub-trab-resumo" class="aviso-erro"> </span>
                                        <div class="alert alert-danger">
                                            <strong><i class="glyphicon glyphicon-info-sign"></i> Atenção: </strong> Mínimo de caracteres: <strong><?php echo $num_caracteres_min; ?></strong><br>
                                            <strong><i class="glyphicon glyphicon-info-sign"></i> Atenção: </strong> Máximo de caracteres: <strong><?php echo $num_caracteres_max; ?></strong>

                                        </div>
                                        <textarea class="form-control" rows="10" maxlength="<?php echo $num_caracteres; ?>" id="resumo" name="resumo"></textarea>
                                        <input type="hidden" id="min_char" value="<?php echo $num_caracteres_min ?>">
                                        <div class="col-md-12 alert alert-danger" id="alert-sub">
                                            <p><strong><i class="glyphicon glyphicon-exclamation-sign"></i> Ops! Informe pelo menos <?php echo $num_caracteres_min; ?> caractéres</strong></p>
                                        </div>

                                        <div><strong>Total de caracteres informados: </strong><b id="num-digitados"> </b></div>

                                    </div>


                                    <div class="form-group">
                                        <label for="titulo">Palavras Chave: (Separe as palavras chave usando uma VÍRGULA)</label><span id="error-titulo-trabalho" class="aviso-erro"> </span><br>
                                        <input type="text" id="tags-input" class="form-control bootstrap-tagsinput" name="palavras-chave" />                                                             
                                    </div>

                                    <?php if ($tem_arquivo == "s" || $tem_arquivo == "S") { ?>
                                        <div class="form-group">                            
                                            <label for="titulo" id="titulo-t">Arquivo do Trabalho</label><span class="aviso-erro"> </span>
                                            <input type="file" required=""  class="form-control" id="sub-trabalho-file" name="sub-trabalho-file">                            
                                        </div>
                                        <div class="alert alert-danger" id="alert-file"><p><strong>Nenhum arquivo foi selecionado</strong></p></div>
                                </div>

                            <?php } ?>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success col-md-12" id="enviar-sub-aguarde">Enviar Submissão</button>                 
                            </div>
                            </form>           

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>


                </div>

            </div>
        </div>


        <!--modal edição -->

        <?php
        foreach ($sub_trabalho as $submissoes) {
            $id_evento = $this->uri->segment(4);
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
            ?>

            <!-- Modal EDITAR -->
            <div id="myModalEdit-<?php echo $id_submissao; ?>" class="modal modal-wide fade">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Editar Trabalho: <?php echo $titulo; ?></h4>
                        </div>
                        <div class="modal-body">


                            <div class="col-md-12">

                                <div class="col-md-12 corpo-sub-trabalho"> 
                                    <form method="post" name="sub_trab_edit" id="edit_sub" action="<?php echo base_url('admin/SubTrabalho/editarTrabalho') ?>" enctype="multipart/form-data">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Autores</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="titulo">Autor Principal: </label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                                    <input type="text" disabled="" class="form-control" value="<?php echo $this->session->userdata('usuario')->nome ?>" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="titulo">Orientador / Coautor 1:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                                    <?php if ($orientador != "") { ?>
                                                        <input type="text" class="form-control" id="orientador" name="orientador" value="<?php echo $orientador; ?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" id="coautor1" name="coautor1" value="<?php echo $submissoes->coautor_1; ?>" >

                                                    <?php } ?>
                                                </div>
                                                <?php for ($i = 1; $i <= $num_coAutores; $i++) { ?>

                                                    <div class="form-group">
                                                        <label for="titulo" id="titulo-t">Coautor <?php echo $i + 1; ?>:</label><span class="aviso-erro"> </span>
                                                        <input type="text" class="form-control" id="coautor<?php echo $i + 1; ?>" name="coautor<?php echo $i + 1; ?>" value="<?php echo $coautor[$i + 1] ?>" >
                                                    </div>

                                                <?php } ?>                        
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="texto">Modálidade</label>
                                            <select class="form-control" id="modalidade" name="modalidade" required="">
                                                <option value="1">Oral</option>
                                                <option value="2">Poster</option>
                                            </select>
                                        </div> 

                                        <?php
                                        foreach ($gt_evento_area as $data) {

                                            $num_coAutores = $data->num_coAutores;
                                            $num_caracteres_max = $data->maxRes_char;
                                            $num_caracteres_min = $data->minRes_char;
                                            $id_evento_gt = $data->id_evento;
                                            $tem_arquivo = $data->tem_arquivo;
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label for="titulo">Título: </label><span id="error-titulo-trabalho" class="aviso-erro"> </span>
                                            <input type="text" required="" class="form-control" id="titulo" name="titulo" value="<?php echo $titulo ?>" >
                                        </div>


                                        <div class="form-group">
                                            <label for="texto">Área temática</label>
                                            <select class="form-control" id="area-tematica" name="area-tematica" required="">

                                                <?php
                                                foreach ($gt_evento_area as $data) {
                                                    $id_area = $data->id_gt_evento;
                                                    $area_tematica = $data->descricao;
                                                    $max_char = $data->maxRes_char;
                                                    ?>
                                                    <option value="<?php echo $id_area; ?>"><?php echo $area_tematica; ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>

                                        <input type="hidden" name="id_evento" value="<?php echo $id_evento_gt; ?>">

                                        <div class="form-group">
                                            <label for="resumo">Resumo:</label><span id="sub-trab-resumo" class="aviso-erro"> </span>
                                            <div class="alert alert-danger">
                                                <strong><i class="glyphicon glyphicon-info-sign"></i> Atenção: </strong> Mínimo de caracteres: <strong><?php echo $num_caracteres_min; ?></strong><br>
                                                <strong><i class="glyphicon glyphicon-info-sign"></i> Atenção: </strong> Máximo de caracteres: <strong><?php echo $num_caracteres_max; ?></strong>
                                            </div>
                                            <textarea class="form-control" rows="10" maxlength="<?php echo $num_caracteres; ?>" id="resumo-edit" name="resumo"><?php echo $resumo ?></textarea>
                                            <div><strong>Total de caracteres informados: </strong><b id="num-digitados-edit"> </b></div>
                                            <div class="col-md-12 alert alert-danger" id="alert-sub-edit">
                                                <p><strong><i class="glyphicon glyphicon-exclamation-sign"></i> Ops! Informe pelo menos <?php echo $num_caracteres_min; ?> caractéres</strong></p>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="titulo">Palavras Chave:</label><span id="error-titulo-trabalho" class="aviso-erro"> </span><br>
                                            <input type="text" id="tags-edit" required="" class="form-control bootstrap-tagsinput" name="palavras-chave" value="<?php echo $palavrasChave ?>"/>                                                             
                                        </div>

                                        <?php if ($tem_arquivo == "s" || $tem_arquivo == "S") { ?>


                                            <div class="form-group">
                                                <label for="titulo" id="titulo-t">Arquivo do Trabalho:</label>
                                                <div class="alert alert-warning">
                                                    <strong><i class="glyphicon glyphicon-paperclip"></i> Para ver seu arquivo: </strong>( <a href="<?php echo base_url('assets/pdf/sub_trabalhos/' . $submissoes->arquivo); ?>" target="_blank">clique aqui</a> )
                                                </div>                                        
                                                <input type="file" class="form-control" id="sub-trabalho-file-upload" name="sub-trabalho-file-upload">                            
                                            </div>
                                        <?php } ?>

                                        <input type="hidden" name="arquivo" value="<?php echo $submissoes->arquivo; ?>">
                                        <input type="hidden" name="id_submissao" value="<?php echo $id_submissao; ?>">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-warning col-md-12 col-xs-12" id="alterar-sub">Alterar Submissão</button>                
                                        </div>
                                    </form>

                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div> 
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>

