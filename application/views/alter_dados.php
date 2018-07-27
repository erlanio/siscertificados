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

            <h2>Meus dados</h2>
            <div class="row">
                <div class="row col-md-12">
                    <form method="post" id="alterar-pessoa" name="alterar-pessoa" action="<?php echo base_url('Pessoa/alterarPessoa') ?>">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Dados Pessoais</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="titulo" id="titulo-t">Email cadastrado: *</label><span id="error-email" class="aviso-erro"></span>
                                        <input type="email" required="" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('usuario')->email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="titulo" id="titulo-t">Nome Completo: *</label></span>
                                        <input type="text" disabled class="form-control" id="nome" name="nome" value="<?php echo $this->session->userdata('usuario')->nome; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        foreach ($estadosAlter as $valor) {
                            $estado = $valor->nome;
                            $id_estadoAlter = $valor->id;
                        }
                        ?>

                        <div class="form-group">
                            <label for="texto">Estado: *</label>
                            <select class="form-control" id="estado" name="estado" required="">                
                                <option value='<?php echo $id_estadoAlter; ?>'><?php echo $estado; ?></option> 
                                <?php
                                foreach ($estados as $result) {
                                    $id_estado = $result->id;
                                    echo "<option value='$id_estado'>$result->nome</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <?php
                        foreach ($cidade as $valor) {
                            $cidade = $valor->nome;
                            $id_cidade = $valor->id;
                        }
                        ?>

                        <div class="form-group">
                            <label for="titulo" id="titulo-t">Cidade: *</label><span id="error-instituicao" class="aviso-erro"></span>
                            <select class="form-control" id="cidades" name="cidades" required="" disableds>
                                <option value="<?php echo $id_cidade; ?>"><?php echo $cidade; ?></option>
                            </select>                                     

                        </div>

                        <div class="form-group">
                            <label for="titulo" id="titulo-t">Celular: *</label><span id="error-telefone" class="aviso-erro"></span>
                            <input type="text" required="" class="form-control" id="celular" name="celular" value="<?php echo $this->session->userdata('usuario')->celular; ?>">
                        </div>


                        <div class="form-group">
                            <label for="titulo" id="titulo-t">Telefone Fixo:</label><span id="error-telfixo" class="aviso-erro"></span>
                            <input type="text" class="form-control" id="tel_fixo" name="tel_fixo" value="<?php echo $this->session->userdata('usuario')->fone_fixo; ?>">
                        </div>

                        <div class="form-group">
                            <label for="titulo" id="titulo-t">CPF: *</label><span id="error-cpf" class="aviso-erro"> </span>
                            <input type="text" disabled="" class="form-control" id="cpf" name="cpf" value="<?php echo $this->session->userdata('usuario')->cpf; ?>">
                        </div>
                        <?php
                        $sexo = $this->session->userdata('usuario')->sexo;
                        if ($sexo == 1) {
                            $sexo = "<option value='1'>Masculino</option>";
                            $sexo .= "<option value='2'>Faminino</option>";
                        } else if ($sexo == 2) {
                            $sexo = "<option value='2'>Faminino</option>";
                            $sexo .= "<option value='1'>Masculino</option>";
                        }
                        ?>

                        <div class="form-group">
                            <label for="texto">Sexo: *</label>
                            <select class="form-control" id="sexo" name="sexo" required="">                
                                <?php echo $sexo; ?>                             
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="texto">Categoria: *</label>

                            <?php
                            foreach ($categorias as $dados) {
                                $id = $dados->id_categorias_inscricoes;
                                $descricao = $dados->descricao;
                                $id_pessoa_titulacao = $this->session->userdata('usuario')->id_titulacao;
                                if ($id_pessoa_titulacao == 1) {

                                    $option = "<option value='1'>Professor / Pesquisador</option>";
                                    $option .= "<option value='2'>Aluno de Pós-Graduação</option>";
                                    $option .= "<option value='3'>Professor da Rede Básica</option>";
                                    $option .= "<option value='4'>Aluno de Graduação</option>";
                                    $option .= "<option value='5'>Ouvinte</option>";
                                } else if ($id_pessoa_titulacao == 2) {

                                    $option = "<option value='2'>Aluno de Pós-Graduação</option>";
                                    $option .= "<option value='1'>Professor / Pesquisador</option>";
                                    $option .= "<option value='3'>Professor da Rede Básica</option>";
                                    $option .= "<option value='4'>Aluno de Graduação</option>";
                                    $option .= "<option value='5'>Ouvinte</option>";
                                } else if ($id_pessoa_titulacao == 3) {

                                    $option = "<option value='3'>Professor da Rede Básica</option>";
                                    $option .= "<option value='1'>Professor / Pesquisador</option>";
                                    $option .= "<option value='2'>Aluno de Pós-Graduação</option>";
                                    $option .= "<option value='4'>Aluno de Graduação</option>";
                                    $option .= "<option value='5'>Ouvinte</option>";
                                } else if ($id_pessoa_titulacao == 4) {

                                    $option = "<option value='4'>Aluno de Graduação</option>";
                                    $option .= "<option value='1'>Professor / Pesquisador</option>";
                                    $option .= "<option value='2'>Aluno de Pós-Graduação</option>";
                                    $option .= "<option value='3'>Professor da Rede Básica</option>";
                                    $option .= "<option value='5'>Ouvinte</option>";
                                } else if ($id_pessoa_titulacao == 5) {
                                    $option = "<option value='5'>Ouvinte</option>";
                                    $option .= "<option value='1'>Professor / Pesquisador</option>";
                                    $option .= "<option value='2'>Aluno de Pós-Graduação</option>";
                                    $option .= "<option value='3'>Professor da Rede Básica</option>";
                                    $option .= "<option value='4'>Aluno de Graduação</option>";
                                }
                            }
                            ?>
                            <select class="form-control" id="categoria_pessoa" name="categoria_pessoa" required="">
                                <?php echo $option; ?>
                            </select>
                        </div>
                        <div class="col-md-12 btn-formulario">
                            <input type="submit" class="btn btn-success btn-lg col-md-offset-4 col-md-4 col-xs-12 enviar" value="Alterar" id="alterar-pessoa">
                        </div>
                    </form>
                </div>
            </div><br><br>
        </div>
    </div>
</div>
