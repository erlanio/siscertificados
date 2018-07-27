<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">							
                        Bem vindo(a), <small><?php echo $this->session->userdata('usuario')->nome_pessoa ?></small>
                    </h1>
                </div>
            </div><!-- FIM -->





            <div class="container container-fluid col-md-12 pagina-inicial">

                <div class="col-md-12 icones-inicio">

                    <div class="col-md-3">
                        <a href="<?php echo base_url('admin/Atividade'); ?>"><button type="submit" class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Gerenciar Atividades</p></button></a>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="categoria-inicio" data-toggle="modal" data-target="#modal-funcoes"><i class="fa fa-check" aria-hidden="true"></i><p>Gerenciar Funções</p></button>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="slide-inicio" data-toggle="modal" data-target="#modal-tipo-atividades"><i class="fa fa-reorder" aria-hidden="true"></i><p>Gerenciar Tipos de Atividades</p></button>
                    </div>
                    
                     <div class="col-md-3">
                        <a href="<?php echo base_url('admin/Certificado'); ?>"><button type="submit" class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Gerenciar Certificados</p></button></a>
                    </div>

                    <!--                    <div class="col-md-3">
                                            <a href="<?php echo base_url('admin/Categoria'); ?>"><button type="submit" class="slide-inicio" ><i class="fa fa-reorder" aria-hidden="true"></i><p>Gerenciar Categorias</p></button></a>
                                        </div>-->
                </div>    

                <!--
                                <div class="col-md-12 icones-inicio">
                
                                    <div class="col-md-4 icone">
                                        <a href="<?php echo base_url('admin/Perfil'); ?>"><button type="submit" class="perfil-inicio"><i class="fa fa-user" aria-hidden="true"></i><p>Gerenciar Perfil</p></button></a>
                                    </div>
                
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url(); ?>" target="_blank"><button type="submit" class="visualizar-inicio"><i class="fa fa-eye" aria-hidden="true"></i><p>Visualizar Site</p></button></a>
                                    </div>
                
                                    <div class="col-md-4">
                                        <a href="<?php echo base_url('Login/logout'); ?>"><button type="submit" class="sair-inicio"><i class="fa fa-sign-out" aria-hidden="true"></i><p>Sair</p></button></a>
                                    </div>
                                </div>    -->


            </div>

        </div>
    </div>
</div>


<!--- MODAL lista inscritos-->
<div class="modal modal-wide fade" id="modal-tipo-atividades" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Tipo de Atividades:</h4>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary btn-lg col-md-4" data-toggle="modal" data-target="#add-tipo-atividade">Adicionar Tipo de Atividade</button><br><br>

                <table class="table table-hover thead col-md-8">

                    <tr>  
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="centro">Opções</th>
                    </tr>
                    </thead>

                    <?php
                    foreach ($tipoAtividades as $dados) {
                        $nome = $dados->tipo_atividade;
                        $id_tipo_atividade = $dados->id_tipo_atividade;
                        ?>

                        <tbody id="tipo-atividade-<?php echo $id_tipo_atividade; ?>">
                        <td><?php echo $id_tipo_atividade; ?></td>
                        <td><?php echo $nome; ?></td>
                        <td><button class="btn btn-info col-md-5" onclick="buscarTipoAtividade('<?php echo $id_tipo_atividade; ?>');" data-toggle="modal" data-target="#modal-editar-tipo-atividades"><i class="fa fa-edit"></i> Alterar</button>
                            <button  class="btn btn-danger col-md-offset-1 col-md-5" onclick="deletarTipoAtividade('<?php echo $id_tipo_atividade; ?>');"><i class="fa fa-times"></i> Excluir</button></td>   
                        </tbody>

                    <?php } ?>
                </table>


            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL lista inscritos-->



<!--- MODAL EDITAR TIPO ATIVIDADE-->
<div class="modal fade" id="modal-editar-tipo-atividades" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Tipo de Atividade</h4>
            </div>
            <div class="modal-body">



                <div id="retorno-tipo-atividade"></div>
                <div class="form-group col-md-12">
                    <button class="btn btn-success col-md-12" onclick="salvarTipoAtividadeEditar();"> Salvar Alterações</button>
                </div>
            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL lista inscritos-->




<!--- MODAL ADD ATIVIDADE -->
<div class="modal fade" id="add-tipo-atividade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Atividade:</h4>
            </div>
            <div class="modal-body">  
                <div class="col-md-12">
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Nome Tipo de Atividade:</label>
                        <input type='text'  class='form-control' id='nome-tipo-atividade-salvar' name='nome-tipo-atividade-salvar'>     
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success col-md-12" onclick="salvarTipoAtividade();"> Salvar</button>
                    </div>
                </div>




                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                          
        </div>                                                
    </div>
</div>
<!--- MODAL INSERIR AREA-->



<!--- MODAL lista inscritos-->
<div class="modal modal-wide fade" id="modal-funcoes" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar FUnções</h4>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary btn-lg col-md-4" data-toggle="modal" data-target="#add-papel">Adicionar Função</button><br><br>

                <table class="table table-hover thead col-md-8">

                    <tr>  
                        <th>ID</th>
                        <th>Função</th>
                        <th class="centro">Opções</th>
                    </tr>
                    </thead>

                    <?php
                    foreach ($funcoes as $dados) {
                        $nome = $dados->descricao;
                        $id_papel = $dados->id_papel;
                        ?>

                        <tbody id="papel-<?php echo $id_papel; ?>">
                        <td><?php echo $id_papel; ?></td>
                        <td><?php echo $nome; ?></td>
                        <td><button class="btn btn-info col-md-5" onclick="buscarPapel('<?php echo $id_papel; ?>');" data-toggle="modal" data-target="#modal-editar-papel"><i class="fa fa-edit"></i> Alterar</button>
                            <button  class="btn btn-danger col-md-offset-1 col-md-5" onclick="deletarPapel('<?php echo $id_papel; ?>');"><i class="fa fa-times"></i> Excluir</button></td>   
                        </tbody>

                    <?php } ?>
                </table>


            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL lista inscritos-->


<!--- MODAL EDITAR TIPO ATIVIDADE-->
<div class="modal fade" id="modal-editar-papel" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Papel</h4>
            </div>
            <div class="modal-body">



                <div id="retorno-papel"></div>
                <div class="form-group col-md-12">
                    <button class="btn btn-success col-md-12" onclick="salvarPapelEditar();"> Salvar Alterações</button>
                </div>
            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL lista inscritos-->



<!--- MODAL ADD ATIVIDADE -->
<div class="modal fade" id="add-papel" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Função</h4>
            </div>
            <div class="modal-body">  
                <div class="col-md-12">
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Adicionar Função</label>
                        <input type='text'  class='form-control' id='nome-funcao-salvar' name='nome-tipo-atividade-salvar'>     
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success col-md-12" onclick="salvarFuncao();"> Salvar</button>
                    </div>
                </div>




                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                          
        </div>                                                
    </div>
</div>
<!--- MODAL INSERIR AREA-->