<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">

    <!-- /.navbar-header -->
    <ul class="nav-link-topo navbar-top-links navbar-left">
        <li>
            <img src="<?php echo base_url('assets/img/brasao.png'); ?> " class="img-responsive brasao">            
        </li>
    </ul>  

    <ul class="nav-link-topo navbar-top-links navbar-right">

        <li class="dropdown">
            <a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#"> 
                <i class="glyphicon glyphicon-user"></i> 
                <?php echo $this->session->userdata('usuario')->nome_pessoa ?>
                <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">			
                <li>
                    <a href="<?php echo base_url('login/logout'); ?>">
                        <i class="glyphicon glyphicon-log-out"></i> Sair
                    </a>
                </li>
            </ul> 
        </li>
        <!-- /.dropdown -->
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li><a href="<?php echo base_url('admin/Inicio'); ?>" data-toggle="collapse" data-target="#inicio"> 
                        <i class="glyphicon glyphicon-home"></i> Início / Home </a>
                </li>

<!--                <li><a href="<?php echo base_url('Pessoa/dadosPessoais/'); ?>" data-toggle="collapse" data-target="#meusDados"> 
                        <i class="glyphicon glyphicon-user"></i> Meus Dados </a>
                </li>-->

                <li><a href="<?php echo base_url('admin/evento'); ?>" data-toggle="collapse" data-target="#realizarInscricao"> 
                        <i class="glyphicon glyphicon-search"></i> Meus Certificados </a>
                </li>				



               
                <li><a href="<?php echo base_url('Pessoa/formAlterarSenha'); ?>" data-toggle="collapse" data-target="#recursoIsencao"> 
                        <i class="glyphicon glyphicon-star"></i> Alterar Senha </a>
                </li>

                <li><a href="<?php echo base_url('login/logout'); ?>" data-toggle="collapse" data-target="#sair"> 
                        <i class="glyphicon glyphicon-log-out"></i> Sair </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

    <!-- /.navbar-static-side -->
</nav>