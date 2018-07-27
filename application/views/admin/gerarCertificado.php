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

                <div class="col-md-12">
                    <h3>Gerar Certificado</h3>
                </div>



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
        </div>
    </div>
</div>



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
                        <button class="btn btn-success col-md-12" onclick="salvarPessoa();"> Salvar</button>
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