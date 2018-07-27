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
            </div>           
        </div>


        <div class="col-md-12 alert alert-danger">
            <strong><i class="glyphicon glyphicon-file"></i> Ops! Não existem submissões disponíveis para você avaliar!</strong>
        </div>

    </div>
</div>