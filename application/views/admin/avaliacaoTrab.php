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
                    
        
<?php  
foreach ($gt_evento as $dados) {
    $descricao = $dados->descricao;
}

?>
        
        
        <h3 class="col-md-10">Submissões para : <strong><?php echo $descricao; ?> </strong> </h3>
        <div class="col-md-12">
            <table class="table table-hover thead col-md-8">
                <thead>
                    <tr>                        
                        <th>ID</th>
                        <th>Título do Trabalho</th>
                        <th>Avaliar</th>
                    </tr>
                </thead>

                
          