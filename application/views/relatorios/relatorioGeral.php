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
            </div><!-- FIM -->





            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Relatório Geral</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover thead col-md-8">
                        <thead>
                            <tr>                        
                                <th>Evento</th>
                                <th>Relatório de Inscrições</th>

                            </tr>
                        </thead>

                        <?php
                        foreach ($admEvento as $data) {
                            $array = (array) $data;
                            $id_evento = $data->id_evento;
                            $nome_evento = $data->titulo;
                            ?>

                            <tbody>
                            <td><?php echo $nome_evento; ?></td>
                            <td><a href="<?php echo base_url('admin/relatorios/exibirRelatorio/'.$id_evento); ?>"<button type="button" class="btn btn-success btn-group-xs"><i class="glyphicon glyphicon-search"></i> Administrar</button></td>


                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

