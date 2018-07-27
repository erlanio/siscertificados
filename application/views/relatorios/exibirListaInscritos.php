<?php
$id_evento = $this->uri->segment(4);
$pagina = $this->uri->segment(5);

foreach ($listaInscritos as $data) {
    $id = $data->id_pessoa;
    $cpf = $data->cpf;
    $num_arrays = count($listaInscritos);
}
?>

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

                <div class="col-md-12 impress">
                    <a href="<?php echo base_url('admin/relatorios/imprimirListaInscritos/' . $id_evento); ?> " target="_blank"><button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-print"></i> Lista Geral de Inscritos</button></a>                     
                    <a href="<?php echo base_url('admin/relatorios/imprimirListaInscritos/' . $id_evento . '/pagConfirm'); ?> " target="_blank"><button class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-print"></i> Inscritos com Pagamento Confirmado</button></a>                     
                </div>
                <div class="col-md-12 impress">
                    <?php if (isset($num_arrays)) { ?>
                        <div class="col-md-2">
                            <?php if ($num_arrays == 1) { ?>                         
                                <input type="text" class="form-control" id="pesquisa-cpf" placeholder="Informe um CPF"  value="<?php echo $cpf; ?>">
                            </div>
                            <a href="<?php echo base_url('admin/Relatorios/listaInscritos/' . $id_evento); ?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Limpar Filtro</button></a>
                        <?php } else if ($num_arrays > 1) { ?>
                            <input type="text" class="form-control" id="pesquisa-cpf" placeholder="Informe um CPF">
                        </div>
                        <button class="btn btn-success" onclick="buscaCPFCertificado('<?php echo $id_evento; ?>', '<?php echo base_url(); ?>');"><i class="glyphicon glyphicon-search"></i> Buscar CPF</button>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-2">

                        <input type="text" class="form-control" id="pesquisa-cpf" placeholder="Informe um CPF"  value="">
                    </div>
                    <a href="<?php echo base_url('admin/Relatorios/listaInscritos/' . $id_evento); ?>"><button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Limpar Filtro</button></a>
                    <h3>Ops! Nenhum registro encontrado para este CPF!</h3>
<?php } ?>





            </div><br>

            <table class="table table-bordered table-action table-hover col-md-12" id="data-exemplo">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Comprovante</th>
                        <th>Confim. Pag</th>
                        <th>Cert. Participação</th>
                        <th>Presença</th>
                    </tr>
                </thead>

                <?php
                foreach ($listaInscritos as $data) {

                    $id_inscricao = $data->id_inscricao;
                    $id = $data->id_pessoa;
                    $nome = $data->nome;
                    $cpf = $data->cpf;
                    $email = $data->email;
                    $comprov = $data->compr_pag_upload;
                    $certificado = $data->certificado_liberado;
                    $presenca = $data->confirm_presenca;
                    $confirm_pagamento = $data->confirm_pagamento;
                    ?>
                    <tbody id="ins-<?php echo $id_inscricao; ?>">
                    <td><?php echo $id_inscricao; ?></td>
                    <td><?php echo $nome; ?></td>
                    <td><?php echo $cpf; ?></td>
                    <td><?php echo $email; ?></td>
    <?php if ($comprov == "") { ?>
                        <td><button class="btn btn-danger btn-xs disabled"><i class="glyphicon glyphicon-remove"></i> Não enviado</button></td>

                    <?php } else {
                        ?>
                        <td><a href="<?php echo base_url('assets/comprovantes/' . $comprov); ?>" target="_blank"><button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i> Ver comprovante</button></a></td>                        
                    <?php } ?>
    <?php if ($confirm_pagamento == "n") { ?>

                        <td><button class="btn btn-warning btn-xs" onclick="confirmarPagamento('<?php echo $id_inscricao; ?>', '<?php echo $confirm_pagamento; ?>','<?php echo $id_evento; ?>','<?php if(!empty($pagina)){echo $pagina;} ?>');"><i class="glyphicon glyphicon-ok"></i> Pendente</button></td>
                    <?php } else { ?>
                        <td><button class="btn btn-success btn-xs" onclick="confirmarPagamento('<?php echo $id_inscricao; ?>', '<?php echo $confirm_pagamento; ?>', '<?php echo $id_evento; ?>','<?php if(!empty($pagina)){echo $pagina;} ?>');"><i class="glyphicon glyphicon-ok"></i> Confirmado</button></td>
                    <?php } ?>
                    <?php if ($certificado == "n") { ?>                            
                        <td id="btn-liberar-cert<?php echo $id_inscricao; ?>"><button onclick="liberarCertPart('<?php echo $id_inscricao; ?>', '<?php echo $certificado; ?>');" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="bottom" title="Clique para liberar o certificado"> <i class="glyphicon glyphicon-ok"></i> Liberar Certificado</button></td>
                    <?php } else { ?>
                        <td id="btn-liberar-cert<?php echo $id_inscricao; ?>"><button onclick="liberarCertPart('<?php echo $id_inscricao; ?>', '<?php echo $certificado; ?>');" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Certificado Liberado - Clique para cancelar liberação"> <i class="glyphicon glyphicon-ok"></i> Certificado Liberado</button></td>
                    <?php } ?>

                    <?php if ($presenca == "n") { ?>
                        <td id="btn-confirmar-presenca<?php echo $id_inscricao; ?>"><button class="btn btn-danger btn-xs"  onclick="confirmarPresenca('<?php echo $id_inscricao; ?>', '<?php echo $presenca; ?>');" data-toggle="tooltip" data-placement="bottom" title="Confirmar a presença de <?php echo $nome; ?>"><i class="glyphicon glyphicon-remove" ></i> Não Confirmada</button></td>
    <?php } else { ?>
                        <td id="btn-confirmar-presenca<?php echo $id_inscricao; ?>"><button class="btn btn-success btn-xs" onclick="confirmarPresenca('<?php echo $id_inscricao; ?>', '<?php echo $presenca; ?>');"  data-toggle="tooltip" data-placement="bottom" title="Clique para cancelar confirmação"><i class="glyphicon glyphicon-ok"></i> Confirmada</button></td>

    <?php } ?>


                    </tbody>

                <?php }
                ?>

            </table>
            <div class="col-md-12">
                <?php
                if (isset($paginacao)) {
                    echo $paginacao;
                }
                ?>
            </div>
        </div>

    </div><!-- FIM -->
</div>
</div>
</div>
</div>


