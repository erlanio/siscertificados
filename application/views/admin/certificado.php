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
                
                  <div class="col-md-3">
                        <a href="<?php echo base_url('admin/Certificado/gerar'); ?>"><button type="submit" class="folder"><i class="fa fa-folder" aria-hidden="true"></i><p>Gerar Certificado</p></button></a>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="categoria-inicio" data-toggle="modal" data-target="#modal-funcoes"><i class="fa fa-check" aria-hidden="true"></i><p>Administrar Certificados</p></button>
                    </div>
                    

                
            </div>
            


        </div>
    </div>
</div>