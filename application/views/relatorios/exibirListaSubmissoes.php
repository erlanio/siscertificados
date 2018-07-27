<?php  $id_evento = $this->uri->segment(4); ?>
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

                <div class="form-group col-md-8">

                            <div class="col-md-12">
                                <h3 class="col-md-3"><a href="<?php echo base_url('admin/relatorios/imprimirSubPosters/' . $id_evento . '/1'); ?>"><button class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-print"></i> Imprimir Submissões Formato Oral </button></a></h3>
                                <h3 class="col-md-3"><a href="<?php echo base_url('admin/relatorios/imprimirSubPosters/' . $id_evento . '/2'); ?>"><button class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-print"></i> Imprimir Submissões Formato Poster </button></a></h3>
                            </div>

                    <label class="col-sm-2 control-label">Selecione uma linha:</label>
                    <div class="col-md-4">
                        <select class="form-control selectpicker" id="gt_filter" name="gt_filter" required="">   
                            <option value="all">Mostrar todos</option>   
                            <option value="poster">Submissões em Pôster</option>   
                            <?php
                            foreach ($gt_evento as $dados) {
                                $nome_gt = $dados->descricao;
                                $id_gt = $dados->id_gt_evento;
                                $id_evento = $this->uri->segment(4);
                                ?>
                                <option value="<?php echo $id_gt; ?>"><?php echo $nome_gt; ?></option>     
                            <?php } ?>                         
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-success" onclick="filtraSubmissoes('<?php echo $id_evento; ?>', '<?php echo base_url(); ?>');"><i class="glyphicon glyphicon-search"></i> Buscar</button>
                    </div>

                </div>

                <?php
                foreach ($gt_evento as $dados) {
                    $id_gt = $this->uri->segment(5);
                    if ($id_gt != "all") {
                        if ($dados->id_gt_evento == $id_gt) {
                            $descricao_gt = $dados->descricao;
                            ?>
                            <div class="col-md-12">
                                <h3 class="col-md-6"><?php echo $descricao_gt; ?></h3>
                            </div>
                            <div class="col-md-12">

                                <h3><a href="<?php echo base_url('admin/relatorios/impressInsSub/' . $id_evento . '/' . $id_gt); ?>"><button class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-print"></i> Imprimir Lista </button></a></h3>
                            </div>
                            <?php
                        }
                    }
                }
                ?>

<?php 
 foreach ($listaSub as $data) {
                        $id = $data->id_inscricoes_sub_trabalho;
                        $titulo = $data->titulo;
                        $status = $data->descricao;
                        $autor = $data->nome;
                        $liberado = $data->cert_sub;
                        $coautor1 = $data->coautor_1;
                        $coautor2 = $data->coautor_2;
                        $coautor3 = $data->coautor_3;
                        $coautor4 = $data->coautor_4;
                        $coautor5 = $data->coautor_5;
                        $coautor6 = $data->coautor_6;
                        }

?>
                <table class="table table-bordered table-action table-hover col-md-12">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Status</th>
                            <th>Autor</th>
                            <th>Coautores</th>
                            <th>Certificado</th>

                        </tr>
                    </thead>

                    <?php
                    foreach ($listaSub as $data) {
                        $id = $data->id_inscricoes_sub_trabalho;
                        $titulo = $data->titulo;
                        $status = $data->descricao;
                        $autor = $data->nome;
                        $liberado = $data->cert_sub;
                        $coautor1 = $data->coautor_1;
                        $coautor2 = $data->coautor_2;
                        $coautor3 = $data->coautor_3;
                        $coautor4 = $data->coautor_4;
                        $coautor5 = $data->coautor_5;
                        $coautor6 = $data->coautor_6;
                        ?>
                        <tbody>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $titulo; ?></td>
                        <td><?php echo $status; ?></td>

                        <td><?php echo $autor; ?></td>
                       <td><?php if(!empty($coautor1)){
                            echo $coautor1."; ";
                        }
                         if(!empty($coautor2)){
                            echo $coautor2."; ";
                        }
                         if(!empty($coautor3)){
                            echo $coautor3."; ";
                        }
                         if(!empty($coautor4)){
                            echo $coautor4."; ";
                        }
                         if(!empty($coautor5)){
                            echo $coautor5."; ";
                        }
                         if(!empty($coautor6)){
                            echo $coautor6."; ";
                        }

                         ?></td>
                        <?php if ($liberado == 'n') { ?>
                        <td id="sub<?php echo $id; ?>"><button class="btn btn-warning btn-xs" onclick="liberarCertificadoSub('<?php echo $id; ?>', '<?php echo $liberado; ?>');"><i class="glyphicon glyphicon-remove"></i> Não Liberado</button></td>
                        <?php } else { ?>
                            <td id="sub<?php echo $id; ?>"><button class="btn btn-success btn-xs" onclick="liberarCertificadoSub('<?php echo $id; ?>', '<?php echo $liberado; ?>');"><i class="glyphicon glyphicon-ok"></i> Liberado</button></td>
                        <?php } ?>


                        </tbody>
                    <?php } ?>

                </table>
                <div class="col-md-12">
                    <?php echo $paginacao; ?>
                </div>
            </div>

        </div><!-- FIM -->
    </div>
</div>
</div>
</div>

