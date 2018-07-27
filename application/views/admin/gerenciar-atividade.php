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
                <div class='form-group col-md-6'>
                    <label for='message-text' class='control-label'>Nome Atividade:</label>
                    <input type='text' required class='form-control' name="nome-atividade">                    
                </div>

                <div class='form-group col-md-3'>
                    <label for='message-text' class='control-label'>Data início:</label>
                    <input type='date' required class='form-control' name="data-inicio">                    
                </div>

                <div class='form-group col-md-3'>
                    <label for='message-text' class='control-label'>Data Fim</label>
                    <input type='date' required class='form-control' name="data-fim">                     
                </div>

            </div>

        </div>
    </div>
</div>

