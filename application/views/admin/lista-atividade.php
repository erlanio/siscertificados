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



            <div class="col-md-12">
                <button class="btn btn-primary btn-lg col-md-4" data-toggle="modal" data-target="#add-atividade">Adicionar Atividade</button>
            </div><Br><br><br>


            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Gerênciar Atividades</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover thead col-md-8">
                        <thead>
                            <tr>  
                                <th>ID</th>
                                <th>Atividade</th>
                                <th>Gerênciar</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($atividade as $dados) {
                            $id_atividade = $dados->id_atividade;
                            $atividade = $dados->nome_atividade;
                            $tipoAtividaede = $dados->tipo_atividade;
                            ?>
                        <tbody id='linha-atividade-<?php echo $id_atividade; ?>'>
                            <td><?php echo $id_atividade; ?></td>
                            <td><?php echo $atividade; ?></td>

                            <td>
                                <button class="btn btn-success" onclick="listaInscritos('<?php echo $id_atividade; ?>');" data-toggle="modal" data-target="#modal-lista-inscritos"><i class="fa fa-list"></i> Lista de Inscritos</button>
                                <button class="btn btn-primary" onclick="buscarAtividade('<?php echo $id_atividade; ?>')" data-toggle="modal" data-target="#editar-atividade"><i class="fa fa-info"></i> Editar Atividade</button>
                                <button class="btn btn-danger" onclick="deletarAtividade('<?php echo $id_atividade; ?>');"><i class="fa fa-times"></i> Apagar Atividade</button>
                                <button class="btn btn-success" data-toggle="modal" data-target="#modal-add-participante" onclick="atribuirId_atividade('<?php echo $id_atividade; ?>');"><i class="fa fa-plus"></i> Adicionar Participante</button>

                            </td>
                            </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!--- MODAL EDITAR ATIVIDADE-->
<div class="modal modal-wide fade" id="editar-atividade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Atividade:</h4>
            </div>
            <div class="modal-body">  
                <div id="retorno-edicao"></div>
                <div id="retorno-editar-atividade"></div>
                <div class="col-md-12"><button class="btn btn-success col-md-12" onclick="salvarEditarAtividade();">Salvar</button></div>
            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL EDITAR ATIVIDADE-->



<!--- MODAL ADD ATIVIDADE -->
<div class="modal modal-wide fade" id="add-atividade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Atividade:</h4>
            </div>
            <div class="modal-body">  
                <div class='col-md-12'>
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Nome Atividade:</label>
                        <input type='text'  class='form-control' id='nome-atividade-salvar' name='nome-atividade-salvar'>                    
                    </div>

                    <div class='form-group col-md-6'>
                        <label for='message-text' class='control-label'>Data início:</label>
                        <input type='date'  class='form-control' id='data-inicio-salvar' name='data-inicio-salvar'>                    
                    </div>

                    <div class='form-group col-md-6'>
                        <label for='message-text' class='control-label'>Data Fim</label>
                        <input type='date'  class='form-control' id='data-fim-salvar' name='data-fim-salvar'>                     
                    </div>

                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Responsável</label>
                        <input type='text'  class='form-control' id='responsavel-salvar' name='responsavel-salvar'>                     
                    </div>

                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Tipo de Atividade</label>                                

                        <select class='form-control' id='tipo_atividade-salvar'>
                            <?php
                            foreach ($tipo_atividade as $valores) {
                                $id_tipo = $valores->id_tipo_atividade;
                                $nome_tipo = $valores->tipo_atividade;
                                
                                echo "<option value='$id_tipo'>$nome_tipo</option>";
                            }
                            ?>

                        </select>
                    </div>

                </div>
                    <div class="col-md-12"><button class="btn btn-success col-md-12" onclick="salvarAtividade();"> Salvar</button></div>
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
<div class="modal modal-wide fade" id="modal-lista-inscritos" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Lista de Inscritos:</h4>
            </div>
            <div class="modal-body">
                
                <div class="col-md-12">
                    <div class='form-group col-md-6'>
                        <label for='message-text' class='control-label'>Buscar Pessoa:</label>
                        <input type='text' class='form-control' id='buscaNome'>                    
                    </div>
                </div>
                
                <div id="retorno-edicao"></div>                               
                
                <div id="retorno-lista-inscritos"></div>
                <div class="col-md-12"><button class="btn btn-success col-md-12" onclick="salvarEditarAtividade();">Salvar</button></div>
            </div>

            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL lista inscritos-->



<!--- MODAL lista inscritos-->
<div class="modal modal-wide fade" id="modal-add-participante" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Participante</h4>
            </div>
            <div class="modal-body">
                
              <div class="col-md-12">
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Buscar Pessoa</label>
                        <input type='text'  class='form-control' id='buscaNomeCertificado' name='responsavel-salvar'>                     
                    </div>

                    <div id="retorno-busca-pessoa-certificado">

                    </div>

                    <div class='form-group col-md-12 hidden '>
                        <label for='message-text' class='control-label'>Tipo de Atividade</label>                                

                        <select class='form-control' id='tipo_atividade-salvar'>
                            <?php
                            foreach ($tipoAtividades as $valores) {
                                $id_tipo = $valores->id_tipo_atividade;
                                $nome_tipo = $valores->tipo_atividade;

                                echo "<option value='$id_tipo'>$nome_tipo</option>";
                            }
                            ?>
                        </select>
                    </div>
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
<div class="modal fade" id="modal-cadastrar-pessoa" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Pessoa</h4>
            </div>
            <div class="modal-body">  
                <div id="erro-mensagem">
                    
                </div>
                
                <div class="col-md-12">
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Nome:</label>
                        <input type='text'  class='form-control' id='nomePessoa'> 
                        <input type="hidden" id="id_atividade">
                    </div>

                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Email:</label>
                        <input type='text'  class='form-control' id='emailPessoa'>
                    </div>

                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>CPF:</label>
                        <input type='text'  class='form-control' id='cpfPessoa'>     
                    </div>
                    
                    <div class='form-group col-md-12'>
                        <label for='message-text' class='control-label'>Celular:</label>
                        <input type='text'  class='form-control' id='celularPessoa'>     
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success col-md-12" onclick="salvarPessoaAtividade();"> Salvar</button>
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