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
                <div class="card card-container">
                    <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <img id="profile-img" class="profile-img-card" src="<?php echo base_url('assets/img/ico-login.png'); ?>" />
                    <form class="form-signin" method="post" action="<?php echo base_url('Login/logar'); ?>">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>                
                        <button class="btn btn-lg btn-primary btn-block btn-signin enviar" type="submit">Entrar</button>
                    </form><!-- /form -->
                    <a href="login/esqueceuSenha" class="forgot-password">
                        Esqueceu a senha?
                    </a><br>

                    <a href="login/esqueceuEmail" class="forgot-password">
                        Recuperar E-mail?
                    </a>
                </div>
            </div> 
        </div>

    </body>
</html>