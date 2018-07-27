<?php
foreach ($pessoa as $data) {
    $cpf = $data->cpf;
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>    
        <title>Sistem de Eventos - URCA</title>      	       
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/estilo-login.css'); ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/validacoes.js'); ?>"></script>
        <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
        <script src="<?php echo base_url('assets/js/bootbox.min.js'); ?>"></script>

    </head>
    <body>
        <div class="container-fluid corpo-inicio">
            <div class="col-md-12 cabecalho">
                <div class="col-md-7 icon-urca hidden-xs">
                    <div class="col-md-3">
                        <img src="<?php echo base_url('assets/img/brasao_login_left.png'); ?> " class="img-responsive">
                    </div>

                </div>
                <h3>Universidade Regional do Cariri</h3>
            </div>
            <div class="col-md-12 bloco-inputs">
                <div class="container recuperar-email">,                                 

<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <div class="col-md-offset-2 col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recuperar Email</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-signin" method="post" action="<?php echo base_url('Login/alterarEmail'); ?>">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="titulo" id="titulo-t">Novo e-mail: *</label><span id="error-email" class="aviso-erro"></span>
                                            <input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf ?>">
                                            <input type="email" required="" class="form-control" id="cpf" name="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="titulo" id="titulo-senha">Confirme e-mail: *</label><span id="error-senha" class="aviso-erro"></span>
                                            <input type="email" required="" value="" class="form-control" id="confira-email" name="confira-email" >
                                        </div>
                                    </div>

                            </div>
                            <button class="btn btn-success recuperar-email-btn">Recuperar Email</button>
                            </form>

                        </div>
                        </form><!-- /form -->
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>