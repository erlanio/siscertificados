<div class="container-fluid">
    <div class="col-md-12 cabecalho">
        <div class="col-md-7 icon-urca hidden-xs">
            <div class="col-md-3">
                <img src="<?php echo base_url('assets/img/brasao_login_left.png'); ?> " class="img-responsive">
            </div>

        </div>
        <h3>Universidade Regional do Cariri</h3>
    </div>
    <div class="col-md-12 corpo-inicio">     
        <div class="col-md-12 orientacoes">
            <h3 class="text-center">Siseventos URCA - Sistema de Eventos Acadêmicos</h3>
            <div class="col-md-12">
                <?php
                foreach ($eventos as $dados) {
                    var_dump($dados);
                }
                ?>
            </div>
            <div class="col-md-12 btn-formulario">
                <a href="<?php echo base_url('Pessoa'); ?>"><button class="btn btn-warning col-md-12 col-xs-12 enviar">Ainda NÃO se cadastrou ? Criar NOVO CADASTRO</button></a><p></p>
            </div>                        
            <div class="col-md-12 btn-formulario">   
                <a href="<?php echo base_url('login'); ?>"><button class="btn btn-success col-md-12 col-xs-12 enviar">Já tem cadastro ? FAZER LOGIN </button></a>
            </div>
        </div>
    </div>    
</div>






