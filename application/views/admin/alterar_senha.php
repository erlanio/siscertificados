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

            <h2>Alterar Senha</h2>
            <div class="row col-md-12">
                <form method="post" id="form-alterar-senha" name="form-alterar-senha" action="<?php echo base_url('Pessoa/alterarSenha') ?>" onsubmit="return false">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Alterar Senha</h3>
                        </div>
                        <div class="panel-body">
                            <div class="alert alert-danger" id="error-repete-senha">wefwe</div>
                            <div class="col-md-12">
                                <div class="form-group  col-md-4">
                                    <label for="titulo" id="titulo-t">Senha atual: *</label>
                                    <input type="password" required="" class="form-control" id="senha-atual" name="senha-atual">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo" id="titulo-t">Nova senha: *</label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo" id="titulo-t">Repita a senha: *</label>
                                    <input type="password" class="form-control" id="repete_senha" name="repete_senha">
                                </div>

                            </div>

                        </div>
                    </div>
            </div>
            <div class="col-md-12 btn-formulario">
                <input type="submit" class="btn btn-success btn-lg col-md-offset-4 col-md-4 col-xs-12 enviar" value="Alterar" id="alterar-senha">
            </div>
            </form>
        </div>
    </div>
</div>
</div>
