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

            <div class="col-md-12" style="margin-top: 40px;">
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group">
                        <label for="titulo" id="titulo-t">Área: *</label><span id="error-email" class="aviso-erro"></span>
                        <input type="email" required="" class="form-control" id="email" name="email" >
                    </div>


                    <div class="form-group">
                        <label for="titulo" id="titulo-t">Descrição: *</label><span id="error-email-repete" class="aviso-erro"></span>
                        <textarea name="descricao" class="form-control">
                            
                        </textarea>
                    </div>

                </div>
            </div> 
        </div>

    </body>
</html>