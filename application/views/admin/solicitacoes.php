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
                    <h3 class="panel-title">Solicitações de eventos</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover thead col-md-8">
                        <thead>
                            <tr>                        
                                <th>Solicitante</th>
                                <th>Evento</th>                            
                                <th>Categoria</th>                            
                                <th>Avaliar Solicitação</th>                            

                            </tr>
                        </thead>
                        <?php foreach ($solicitacao as $dados) { 
                            
                            $categoria = $dados->categoria_solicitante;
                            
                            if($categoria == 'professor'){
                                $categoria = "Professor";
                            }else if($categoria == 'aluno'){
                                $categoria = "Aluno";
                            }else{
                                $categoria == "Pub. Ext";
                            }
                            
                            ?>
                        
                        
                            <tbody>

                            <td><?php echo $dados->nome_solicitante ?></td>
                            <td><?php echo $dados->nome_evento ?></td>
                            <td><?php echo $categoria ?></td>
                            
                            <?php if($dados->deferido == '0'){ ?>
                            <td id="btn-aval-sol-<?php echo $dados->id_solicitacao; ?>"><a href="#" data-toggle="modal" data-target="#myModal" data-title=""><button class="btn btn-success" onclick="buscarSolicitacao('<?php echo $dados->id_solicitacao; ?>');"><i class="glyphicon glyphicon-ok"></i> Avaliar</button></a></td>
                            
                            <?php }else if($dados->deferido == 's'){ ?>
                            <td id="btn-aval-sol-<?php echo $dados->id_solicitacao; ?>"><a href="#" data-toggle="modal" data-title=""><button disabled="" class="btn btn-success" onclick="buscarSolicitacao('<?php echo $dados->id_solicitacao; ?>');"><i class="glyphicon glyphicon-ok"></i> Deferido</button></a></td>
                            <?php }else if($dados->deferido == 'n'){ ?>
                            <td id="btn-aval-sol-<?php echo $dados->id_solicitacao; ?>"><a href="#" data-toggle="modal" data-title=""><button disabled="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Indeferido</button></a></td>
                            <?php } ?>
                            </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Solicitação de evento</h4>
            </div>
            <div class="modal-body" id="modal-solicitacoes">



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></i> Fechar</button>
            </div>
        </div>
    </div>
</div>

