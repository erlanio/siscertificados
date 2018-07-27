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
                foreach ($listaInsAtividade as $data) {
                    $atividade = $data->titulo_atividade;
                }
                ?>

                <div class="col-md-12 impress">
                    <h3>Atividade: <?php echo $atividade; ?></h3>
                </div>

                <table class="table table-bordered table-action table-hover col-md-12" id="example">
                    <thead>
                        <tr>
                            <th>ID</th>                            
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Liberar Certificado</th>
                            <th>Presença</th>
                        </tr>
                    </thead>

                    <?php
                    foreach ($listaInsAtividade as $data) {
                        $id = $data->id_insc_atividade;
                        $atividade = $data->titulo_atividade;
                        $nome = $data->nome;
                        $cpf = $data->cpf;
                        $certificado = $data->liberar_certificado;
                        $presenca = $data->confirm_presenca;
                        ?>
                        <tbody>
                        <td><?php echo $id ?></td>                        
                        <td><?php echo $nome ?></td>
                        <td><?php echo $cpf ?></td>

                        <?php if ($certificado == "n") { ?>                                                
                            <td  id="cert-ativ<?php echo $id; ?>"><button  onclick="liberarCertAtiv('<?php echo $id; ?>', '<?php echo $certificado; ?>', '<?php echo $presenca; ?>');" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-ok"></i> Liberar Certificado</button></td>
                        <?php } else { ?>
                            <td  id="cert-ativ<?php echo $id; ?>"><button onclick="liberarCertAtiv('<?php echo $id; ?>', '<?php echo $certificado; ?>', '<?php echo $presenca; ?>');" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i> Certificado Liberado</button></td>                        
                        <?php } ?>

                        <?php if ($presenca == "n") { ?>
                            <td id="<?php echo $id; ?>"><button class="btn btn-danger btn-xs" onclick="confirmPresencaAtiv('<?php echo $id; ?>', '<?php echo $presenca; ?>');" data-toggle="tooltip" data-placement="bottom" title="Confirmar a presença de <?php echo $nome; ?>"><i class="glyphicon glyphicon-remove" ></i> Não Confirmada</button></td>
                        <?php } else { ?>
                            <td id="<?php echo $id; ?>"><button class="btn btn-success btn-xs" onclick="confirmPresencaAtiv('<?php echo $id; ?>', '<?php echo $presenca; ?>');" data-toggle="tooltip" data-placement="bottom" title="Clique para cancelar confirmação"><i class="glyphicon glyphicon-ok"></i> Confirmada</button></td>

                        <?php } ?>
                        </tbody>
                    <?php } ?>

                </table>

            </div>

        </div><!-- FIM -->
    </div>
</div>
</div>
</div>

