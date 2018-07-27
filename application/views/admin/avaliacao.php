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

        <h2 class="col-md-10">Trabalhos Submetidos</h2>
        <div class="col-md-12">
            <table class="table table-hover thead col-md-8">
                <thead>
                    <tr>                        
                        <th>Evento</th>
                        <th>Avaliar</th>
                    </tr>
                </thead>

                <?php
  

                    foreach ($avaliadores as $data) {
                        $array = (array) $data;                        
                        $id_evento = $data->id_evento;
                        $nome_evento = $data->titulo;
                        $id_gt_evento = $data->id_gt_evento;
                        $nome_gt = $data->descricao;
                    }
                    ?>
                    <tbody>
                    <td><?php echo $nome_evento; ?></td>

                    <td><button type="button" class="btn btn-success btn-group-xs" data-toggle="modal" data-target="#aval-trab-<?php echo $id_evento; ?>"><i class="glyphicon glyphicon-search"></i> Selecionar Eixo</button></td>

                    </tbody>

                </table>

            </div>

        </div>
    </div>




    <!-- Modal EIXOS -->
    <div id="aval-trab-<?php echo $id_evento; ?>" class="modal fade">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Avaliar submissões : <?php echo $nome_evento ?> </h4>
                </div>

                <div class="modal-body">



                    <table class="table table-hover table-action thead col-md-8">
                        <thead>
                            <tr>                        
                                <th>Eixo</th>
                                <th>Avaliar</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($avaliadores as $data) {
                            $array = (array) $data;
                            $id_evento = $data->id_evento;
                            $nome_evento = $data->titulo;
                            $id_gt_evento = $data->id_gt_evento;
                            $nome_gt = $data->descricao;
                            ?>

                            <tbody>
                            <td><?php echo $nome_gt; ?></td>
                            <td><a href="<?php echo base_url('admin/Avaliacao/avaliacaoTrabEvento/' . $id_evento . '/' . $id_gt_evento); ?>"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-file"></i> Avaliar Submissões</button></a></td>
                            </tbody>
                        <?php } ?>


                    </table>
                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


