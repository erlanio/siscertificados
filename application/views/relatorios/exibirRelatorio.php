<?php
$num_inscritos = $inscricoes;
$id_evento = $this->uri->segment(4);


foreach ($evento as $event) {
    $temSub = $event->tem_submissao;
    $isAtivo = $event->ativo;
    $nomeEvento = $event->titulo;
    $descricao = $event->descricao;
    $dtIniEvento = $event->dtIni_Insc;
    $dtFimEvento = $event->dtFim_Insc;
    $localEvento = $event->local;
    $emailEvento = $event->email_evento;
    $chEvento = $event->carga_horaria;
    $baseCertificado = $event->base_certficado;
    $background_card = $event->background_card;
    $imagem_slide = $event->imagem_slide;
    $periodo = $event->periodo_evento;
    $fone = $event->fone;
}

foreach ($configSub as $configSubmissao) {

    $dtIni = $configSubmissao->dtIni_sub;
    $dtFim = $configSubmissao->dtFim_sub;
    $numCo = $configSubmissao->num_coAutores;
    $minChar = $configSubmissao->minRes_char;
    $maxChar = $configSubmissao->maxRes_char;
    $maxSub = $configSubmissao->max_submissao;
}


foreach ($portal as $dadosPortal) {
    $apresentacao = $dadosPortal->apresentacao;
    $comissao = $dadosPortal->comissao;
    $siglaSite = $dadosPortal->sigla;
    $contatos = $dadosPortal->contatos;
    $cronograma = $dadosPortal->cronograma;
    $logoTopo = $dadosPortal->logo_topo;
    $siglaPortal = $dadosPortal->sigla;
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
                
                <div class="col-md-12">
                    <h3>Você está administrando o Evento: <?php echo $nomeEvento; ?></h3>
                </div>


                <div class="col-md-5">


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Gerenciar Evento</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?php if ($isAtivo == "s") { ?>

                                    <button class="btn btn-danger btn-lg col-xs-12 col-md-12" onclick="ativarEvento('<?php echo $id_evento; ?>', '<?php echo $isAtivo; ?>');">Desativar Evento</button>
                                <?php } else { ?>
                                    <button class="btn btn-success btn-lg col-xs-12 col-md-12" onclick="ativarEvento('<?php echo $id_evento; ?>', '<?php echo $isAtivo; ?>');">Ativar Evento</button>


                                <?php } ?>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg col-xs-12 col-md-12" data-toggle="modal" data-target="#editar-evento"><i class="fa fa-info"></i> Editar Informações do evento</button>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-lg col-xs-12 col-md-12" data-toggle="modal" data-target="#editar-imagens-evento"><i class="fa fa-image"></i> Editar Imagens do Evento</button>
                            </div>
                        </div>
                    </div>



                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inscrições / Submissões</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover table-action thead col-md-8 relatorio-table">
                                <thead>
                                    <tr>                        
                                        <th>Nº de Inscritos</th>
                                        <th>Nº de Submissões</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <td><?php echo $num_inscritos; ?> |
                                    <a href="<?php echo base_url('admin/relatorios/listaInscritos/' . $id_evento); ?>">
                                        <button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Ver lista</button>
                                    </a>

                                </td>
                                <td><?php echo $sub; ?> | <a href="<?php echo base_url('admin/relatorios/listaSubmissoes/' . $id_evento); ?>"><button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Ver lista</button></a></td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">


                            <h3 class="panel-title">Gerenciar Portal do evento</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-4">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-intro"><i class="fa fa-align-justify" aria-hidden="true"></i><p>Apresentação</p></button>
                                <!--                                <div class=" btn btn-info col-md-12"  data-toggle="modal" data-target="#ger-intro">Gerenciar Introdução</div>-->
                            </div>

                            <div class="form-group col-md-4">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-programacao"><i class="fa fa-calendar" aria-hidden="true"></i><p>Programação</p></button>
                                <!--                                <div class="btn btn-info col-md-12"  data-toggle="modal" data-target="#ger-programacao">Programação</div>-->
                            </div>

                            <div class="form-group col-md-4">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-comissao"><i class="fa fa-group" aria-hidden="true"></i><p>Comissão</p></button>
                                <!--                                <div class="btn btn-info col-md-12"  data-toggle="modal" data-target="#ger-comissao">Comissão Organizadora</div>-->
                            </div>

                            <div class="form-group col-md-4">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-logo"><i class="fa fa-image" aria-hidden="true"></i><p>Logo</p></button>

                            </div>

                            <div class="form-group col-md-4">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-sigla"><i class="fa fa-check" aria-hidden="true"></i><p>Sigla</p></button>
                            </div>

                            <div class="form-group col-md-4 ">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-contatos"><i class="fa fa-phone" aria-hidden="true"></i><p>Contatos</p></button>
                            </div>

                            <div class="form-group col-md-4 ">
                                <button type="submit" class="folder" data-toggle="modal" data-target="#ger-cronograma"><i class="fa fa-calendar" aria-hidden="true"></i><p>Cronograma</p></button>
                            </div>
                            <?php if (!empty($siglaPortal)) { ?>
                                <div class="form-group col-md-8">

                                    <a href="<?php echo base_url('site/' . $siglaPortal); ?>" target="_blank"> <button type="submit" class="folder-warning"><i class="fa fa-eye" aria-hidden="true"></i><p>Ver site</p></button></a>
                                </div>
                            <?php } ?>


                        </div>
                    </div>

                    <?php if ($temSub == "s" || $temSub == "S") { ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">


                                <h3 class="panel-title">Gerenciar Submissões</h3>
                            </div>
                            <div class="panel-body">


                                <div class="col-md-12" id="bloco-submissao">
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-success col-md-12" data-toggle="modal" data-target="#cad-area"><i class="glyphicon glyphicon-plus"></i> Adicionar Área de Submissão</button>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button class="btn btn-success col-md-12" data-toggle="modal" data-target="#config-sub"><i class="glyphicon glyphicon-cog"></i> Confugurar Submissões</button>
                                    </div>

                                    <table class="table table-hover table-action thead col-md-8 relatorio-table" id="tabela-areas">
                                        <thead>
                                        <td>Área</td>
                                        <td>Ações</td>
                                        </thead>

                                        <?php
                                        foreach ($areas as $area) {
                                            $nomeArea = $area->descricao;
                                            $idArea = $area->id_gt_evento;
                                            $sigla = $area->sigla_gt;
                                            ?>
                                            <tbody id="area-<?php echo $idArea; ?>">
                                            <td style="text-align: left" class="col-md-9"><?php echo $nomeArea; ?></td>
                                            <td>                                        
                                                <button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Apagar" onclick="deletarArea('<?php echo $idArea; ?>');"><i class="glyphicon glyphicon-remove"></i></button>
                                                <button class="btn btn-success btn-xs"
                                                        data-toggleArea="tooltipArea" data-placement="bottom" title="Avaliadores"       
                                                        data-toggle="modal" data-target="#avaliadores"                                                                                                                                         
                                                        onclick="buscarAvaliadores('<?php echo $id_evento; ?>', '<?php echo $idArea; ?>');"
                                                        >
                                                    <i class="glyphicon glyphicon-user"></i>
                                                </button>
                                            </td>
                                            </tbody>

                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($id_evento == 1 || $id_evento == 14 || $id_evento == 13) { ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">


                                <h3 class="panel-title">Sincronizar Frequência Mobile</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-action thead col-md-8 relatorio-table">
                                    <thead>

                                    </thead>
                                    <tbody>

                                        <?php
                                        $flSincron = $sincron;
                                        if ($flSincron == 0) {
                                            ?>

                                            <tr><button class="btn btn-warning disabled col-md-12">Já Sincronizado</button></tr>
                                    <?php } else { ?>

                                        <tr><button class="btn btn-success col-md-12 impress" id="btn-sincronizar" onclick="sincronizarDadosApp('<?php echo $id_evento; ?>');"> Sincronizar</button></tr>

                                        <tr><button class="btn btn-warning col-md-12" id="insc-pendentes" onclick="sincronizarDadosApp('<?php echo $id_evento; ?>')"><?php echo $flSincron; ?> Inscições Pendentes</button></tr>
                                    <?php }
                                    ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>




                <div class="col-md-7">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inscrições atividades</h3>

                        </div>


                        <div class="panel-body">

                            <div class="col-md-12">
                                <button class="btn btn-success"  data-toggle="modal" data-target="#cadastrar-atividade"><i class="glyphicon glyphicon-plus"></i> Cadastrar nova atividade</button>
                            </div>


                            <table class="table table-hover thead col-md-8">
                                <thead class="thead-inverse">
                                    <tr>                        
                                        <th>Atividade</th>
                                        <th class="rel-ins">Nº de Inscrições</th>
                                        <th class="rel-ins">Vagas<br> Disponíveis</th>                                        
                                        <th>Ações</th>                                        
                                    </tr>
                                </thead>

                                <?php
                                foreach ($atividades as $dados) {
                                    $id_tipo_atividade = $dados->id_tipo_atividade;
                                    $id_atividade = $dados->id_atividade_evento;
                                    $nome_atividade = $dados->titulo_atividade;
                                    $total_de_inscritos = $dados->num_inscritos;
                                    $max_participantes = $dados->max_participantes;
                                    $vagas_disponiveis = $max_participantes - $total_de_inscritos;
                                    if ($vagas_disponiveis < 0) {
                                        $vagas_disponiveis = 0;
                                    }
                                    if ($id_tipo_atividade != 100) {
                                        ?>
                                        <tbody id="linha-atividade-<?php echo $id_atividade; ?>">
                                        <td id="nomeAtiv"><?php echo $nome_atividade; ?></td>
                                        <td class="rel-ins" id="insAtiv"><?php echo $total_de_inscritos; ?> <br> &nbsp;<a href="<?php echo base_url('admin/relatorios/listaInsAtividade/' . $id_evento . "/" . $id_atividade); ?>"><button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-list-alt"></i> Ver lista</button></a>                                        
                                            <br>&nbsp;<a href="<?php echo base_url('admin/relatorios/impressInsAtiviGeral/' . $id_evento . "/" . $id_atividade); ?>"><button class="btn btn-warning btn-xs btn-rel"><i class="glyphicon glyphicon-print"></i> Imprimir lista</button></a>
                                        </td>
                                        <td class="rel-ins" id="dis"><?php echo $vagas_disponiveis; ?></td>
                                        <td>
                                            <button class="btn btn-xs btn-success"
                                                    data-toggleArea="tooltipArea" data-placement="bottom" title="Gerenciar"       
                                                    data-toggle="modal" data-target="#editar-atividade" onclick="buscarAtividade('<?php echo $id_atividade; ?>');">
                                                <i class="glyphicon glyphicon-th-list"></i>
                                            </button>

                                            <button class="btn btn-xs btn-danger"
                                                    data-toggleArea="tooltipArea" data-placement="bottom" title="Apagar área"       
                                                    onclick="deletarAtividade('<?php echo $id_atividade; ?>');">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>


                                        </td>
                                        </tbody>

                                        <?php
                                    }
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- FIM -->
    </div>
</div>


<!--- MODAL INSERIR AREA-->
<div class="modal fade" id="cad-area" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Área Temática de Submissão:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cadastrar Área Temática de Submissão</h3>
                    </div>
                    <div class="panel-body">   



                        <div id="erro-area">

                        </div>

                        <div class="form-group">
                            <label for="titulo">Descrição Área Temática:</label>
                            <input type="text" required="" class="form-control" id="area-cad"/>
                            <input type="hidden" id="id_evento" value="<?php echo $id_evento; ?>"
                        </div> 

                        <div class="form-group">
                            <label for="titulo">Sigla:</label>
                            <input type="text" required="" class="form-control" id="area-sigla"/>
                        </div> 
                        <button class="btn btn-success col-md-12" id="envia-area">Enviar</button>
                    </div>
                </div>                       
                <!-- </form>-->
            </div>                                                                
            <div class="modal-footer">                                    
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
            </div>
        </div>                                                        
    </div>                                                
</div>
</div>
<!--- MODAL INSERIR AREA-->


<!--- MODAL AVALIADORES-->
<div class="modal modal-wide fade" id="avaliadores" role="dialog" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Avaliadores:</h4>
            </div>
            <div class="modal-body">  



                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Avaliadores</h3>
                    </div>
                    <div class="panel-body">   


                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="message-text" class="control-label">Cadastrar novo avaliador:</label>
                                <input type="text" required="" maxlength="11" value="" placeholder="Informe o CPF do avaliador" class="form-control" id="cpfBuscaAval">                                                    
                            </div>                            
                        </div>
                        <div class="col-md-12" id="resultado-busca-avaliador">

                        </div>

                        <div id="tabela-avaliadores" class="col-md-12">

                        </div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL INSERIR AREA-->

<!--- MODAL GERENCIAR ATIVIDADE-->
<div class="modal modal-wide fade" id="editar-atividade" role="dialog" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Atividade:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Atividade</h3>
                    </div>
                    <div class="panel-body">   

                        <div id="editar-atividade-modal" class="col-md-12">

                        </div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL INSERIR AREA-->

<!--- MODAL CADASTRAR ATIVIDADE-->
<div class="modal modal-wide fade" id="cadastrar-atividade" role="dialog" >
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cadastrar Atividade:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cadastrar Atividade</h3>
                    </div>
                    <div class="panel-body">   

                        <div class="col-md-12" id="retorno-cad-atividade">

                        </div>

                        <div class='form-group col-md-6'>
                            <label for='message-text' class='control-label'>Nome Atividade:</label>
                            <input type='text' required='' id='nome' class='form-control'>                                                    
                        </div>  

                        <div class='form-group col-md-3'>
                            <label for='message-text' class='control-label'>Local:</label>
                            <input type='text' required=''  id='local' class='form-control'>                                                    
                        </div>


                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Tipo de atividade:</label>
                            <select class='form-control' id='tipo'>
                                <?php
                                foreach ($atividadesCad as $dados) {
                                    echo " <option value='$dados->id_tipo_atividade'>$dados->nome_tipo_atividade</option>";
                                }
                                ?>

                            </select>                                                  
                        </div>


                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Carga horária:</label>
                            <input type='text' required=''  id='ch' class='form-control'>                                                    

                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Data Início:</label>
                            <input type='date' required='' placeholder='$dtIni' id='dtIni' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Data Fim:</label>
                            <input type='date' required='' placeholder='$dtFim' id='dtFim' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Hora Início:</label>
                            <input type='text' required=''  id='hrIni' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Hora Fim:</label>
                            <input type='text' required='' id='hrFim' class='form-control'>                                                    
                            <input type='hidden' required='' id="id_evento" value='<?php echo $id_evento; ?>'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Max Inscrições:</label>
                            <input type='text' required=''  id='max' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-4'>
                            <label for='message-text' class='control-label'>Email:</label>
                            <input type='text' required='' id='email' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Turno:</label>
                            <select class='form-control' id='turno'>
                                <option value='M'>Manhã</option>                
                                <option value='T'>Tarde</option>
                                <option value='N'>Noite</option>
                            </select>                                                
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Frequencia APP:</label>
                            <select class='form-control' id='freqApp'>
                                <option value='s'>Ativado</option>
                                <option value='n'>Desativado</option>
                            </select>                                                  
                        </div>

                        <div class='form-group col-md-4'>
                            <label for='message-text' class='control-label'>Dias:</label>
                            <textarea class='form-control' id='diasAtividade'>5º Feira</textarea>                                         
                        </div>

                        <div class='col-md-12'>
                            <button class='btn btn-success col-md-12' onclick="salvarAtividade();">Salvar Altações</button>
                        </div>

                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL CADASTRAR AREA-->


<!--- MODAL INSERIR AREA-->
<div class="modal modal-wide fade" id="config-sub" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Configurar Submissões:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Configurar submissões</h3>
                    </div>
                    <div class="panel-body">   
                        <div class='form-group col-md-offset-1 col-md-2'>
                            <label for='message-text' class='control-label'>Data Início:</label>
                            <input type='text' required='' placeholder='$dtIni' value="" id='dtIniSub' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Data Fim:</label>
                            <input type='date' required='' placeholder='$dtIni' value="" id='dtFimSub' class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Nº Coautores:</label>
                            <input type='text' required='' id='numCoautores' value="" class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Mín de Caractéres:</label>
                            <input type='text' required='' id='minChar' value="" class='form-control'>                                                    
                        </div>

                        <div class='form-group col-md-2'>
                            <label for='message-text' class='control-label'>Máx de Caractéres:</label>
                            <input type='text' required='' id='maxChar' value="" class='form-control'>                                                    
                        </div>

                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL INSERIR AREA-->



<!--- MODAL APRESENTACAO-->
<div class="modal modal-wide fade" id="ger-intro" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Introdução do Site:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Introdução do Site:</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="form-group"> 
                            <div id="retorno-apresentacao"></div>
                            <label for="comment">Apresentação:</label>

                            <input type="hidden" id="id_evento" value="<?php echo $id_evento; ?>"> 
                            <textarea class="form-control" id="apresentacao" name="apresentacao" rows="40"><?php
                                if (!empty($apresentacao)) {
                                    echo $apresentacao;
                                }
                                ?></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('apresentacao');
                            </script>

                        </div> 
                        <div class="btn btn-success col-md-12" onclick="salvarApresentacao();">Salvar</div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL APRESENTACAO-->


<!--- MODAL COMISSAO-->
<div class="modal modal-wide fade" id="ger-comissao" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar comissão do Site:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar comissão do Site:</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="form-group">
                            <div id="retorno-comissao"></div>
                            <label for="comment">Comissão:</label>

                            <textarea class="form-control" id="comissao" name="comissao" rows="40"><?php
                                if (!empty($comissao)) {
                                    echo $comissao;
                                }
                                ?></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('comissao');
                            </script>
                        </div> 
                        <div class="btn btn-success col-md-12" onclick="salvarComissao();">Salvar</div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL COMISSAO-->


<!--- MODAL CONTATOS-->
<div class="modal modal-wide fade" id="ger-contatos" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Contatos:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Contatos:</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="form-group">
                            <div id="retorno-comissao"></div>
                            <label for="comment">Contatos:</label>

                            <textarea class="form-control" id="contatos" name="contatos" rows="40"><?php
                                if (!empty($contatos)) {
                                    echo $contatos;
                                }
                                ?></textarea>
                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('contatos');
                            </script>
                        </div> 
                        <div class="btn btn-success col-md-12" onclick="salvarContatos();">Salvar</div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL CONTATOS-->

<!--- MODAL PROGRAMACAO-->
<div class="modal modal-wide fade" id="ger-programacao" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Programação:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Programação:</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="col-md-4 form-group">
                            <div class="btn btn-success" onclick="adicionarDia();"><i class="glyphicon glyphicon-plus"></i> Adicionar dia</div>
                        </div>


                        <div class="col-md-12" id="tabela-programacao">
                            <table class="table table-bordered table-action table-hover col-md-12" id="data-exemplo">
                                <thead>
                                    <tr>

                                        <th>Data</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>

                                    </tr>
                                </thead>

                                <?php
                                foreach ($programacao as $prog) {
                                    $id_programacao = $prog->id_programacao;
                                    $id_evento = $prog->id_evento;
                                    $data = $prog->data;
                                    $manha = $prog->manha;
                                    $tarde = $prog->tarde;
                                    $noite = $prog->noite;
                                    ?>

                                    <tbody>                                
                                    <td><center><?php echo data_br($data); ?></center></td>

                                    <td><button class="btn btn-info col-md-12"  onclick="editarProgramacao('<?php echo $id_programacao; ?>');"><i class="glyphicon glyphicon-edit"></i> Editar</button></td>
                                    <td><button class="btn btn-danger col-md-12"  onclick="editarProgramacao('<?php echo $id_programacao; ?>');"><i class="glyphicon glyphicon-trash"></i> Excluir</button></td>
                                    </tbody>

                                <?php } ?>
                            </table>
                        </div>

                        <div class="col-md-12" id="cadastro-programacao">

                            <div class="alert alert-danger" id="retorno-data-programacao">
                                Ops! A programação necessita de uma data, preencha para continuar!
                            </div>

                            <div class='form-group col-md-3'>
                                <label for='message-text' class='control-label'>Data:*</label>
                                <input type='date' required class='form-control' id='dataProgramacao'>                    
                            </div>

                            <div class='form-group col-md-12'>
                                <label for='message-text' class='control-label'>Manhã:*</label>
                                <textarea class="form-control" id="manha" name="manha" rows="5"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace('manha');
                                </script>
                            </div>

                            <div class='form-group col-md-12'>
                                <label for='message-text' class='control-label'>Tarde:*</label>
                                <textarea class="form-control" id="tarde" name="tarde" rows="5"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace('tarde');
                                </script>
                            </div>

                            <div class='form-group col-md-12'>
                                <label for='message-text' class='control-label'>Noite:*</label>
                                <textarea class="form-control" id="noite" name="noite" rows="5"></textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace('noite');
                                </script>
                            </div>
                            <div class="btn btn-success col-md-12" onclick="salvarProgramacao();">Salvar</div>
                        </div>


                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL programacao-->


<!--- MODAL COMISSAO-->
<div class="modal fade" id="ger-sigla" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Sigla:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Sigla do Site:</h3>
                    </div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger">
                            Atenção, esse sigal será utilizada para gerar a URL de seu portal.<br>
                            Exemplo: cev.urca.br/siseventos/sdic
                        </div>

                        <div id="retorno-sigla"></div>
                        <div class='form-group col-md-12'>
                            <label for='message-text' class='control-label'>Sigla:</label>
                            <input type='text' required='' id='sigla-cadastro' value="<?php
                            if (!empty($siglaPortal)) {
                                echo $siglaPortal;
                            }
                            ?>" class='form-control'>                                                    
                        </div>
                        <div class="btn btn-success col-md-12" onclick="salvarSigla();">Salvar</div>
                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL COMISSAO-->


<!--- MODAL LOGO -->
<div class="modal modal-wide fade" id="ger-logo" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Logo:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Logo:</h3>
                    </div>
                    <div class="panel-body">   
                        <div class="form-group">
                            <div id="retorno-comissao"></div>
                            <label for="comment">Logo:</label>
                            <form id="logo" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/portal/inserirLogo'); ?>">
                                <input type="file" id="imagemLogo" class="form-control" name="imagemLogo" />
                                <input type="hidden" id="id_evento" name="id_evento_logo" value="<?php echo $id_evento ?>">

                            </form>
                            <div id="visualizarLogo" class="col-md-12"></div>

                            <?php if (!empty($logoTopo)) { ?>
                                <img src="<?php echo base_url('assets/portal/img/logos/' . $logoTopo); ?>">
                            <?php } ?>
                        </div> 

                    </div>                       
                    <!-- </form>-->
                </div>                                                                
                <div class="modal-footer">                                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                </div>
            </div>                                                        
        </div>                                                
    </div>
</div>
<!--- MODAL CONTATOS-->


<!--- MODAL CRONOGRAMA-->
<div class="modal modal-wide fade" id="ger-cronograma" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Cronograma:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Cronograma:</h3>
                    </div>
                    <div class="panel-body">   



                        <div class="col-md-12" id="tabela-programacao">


                            <div class="col-md-12">



                                <div class='form-group col-md-12'>
                                    <label for='message-text' class='control-label'>Cronograma:*</label>
                                    <textarea class="form-control" id="cronograma" name="cronograma" rows="5"><?php
                                        if (!empty($cronograma)) {
                                            echo $cronograma;
                                        }
                                        ?></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace('cronograma');
                                    </script>
                                </div>

                                <div class="btn btn-success col-md-12" onclick="salvarCronograma();">Salvar</div>
                            </div>                       
                            <!-- </form>-->
                        </div>   
                    </div>
                    <div class="modal-footer">                                    
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                    </div>
                </div>                                                        

            </div>
        </div>
    </div>
</div>
<!--- MODAL CRONOGRAMA-->


<!--- MODAL EDITAR EVENTO-->
<div class="modal modal-wide fade" id="editar-evento" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Gerenciar Evento:</h4>
            </div>
            <div class="modal-body">  


                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gerenciar Evento:</h3>
                    </div>
                    <div class="panel-body">   
                        <div>
                            <div class="col-md-12">
                                <h3>Dados do Evento</h3>
                            </div>

                            <form method="post" action="<?php echo base_url('admin/evento/atualizarEvento'); ?>"
                                  <div class='form-group col-md-6'>
                                    <label for='message-text' class='control-label'>Nome do Evento:*</label>
                                    <input type='text' required class='form-control' name='evento' value="<?php echo $nomeEvento; ?>">  
                                    <input type="hidden" name="id_evento" value="<?php echo $id_evento; ?>"




                                           <div class='form-group col-md-6'>
                                        <label for='message-text' class='control-label'>Local do Evento:*</label>
                                        <input type='text' required class='form-control' id='localEventoSol' name="local" value="<?php echo $localEvento; ?>">                    
                                    </div>

                                    <div class='form-group col-md-6'>
                                        <label for='message-text' class='control-label'>Informções de pagamento:*</label>
                                        <textarea class='form-control' rows='7' required id='descricaoEventoSol' name="descricao"><?php echo $descricao; ?></textarea>                 
                                    </div>

                                    <div class='form-group col-md-3'>
                                        <label for='message-text' class='control-label'>Início Inscrições:*</label>
                                        <input type='date' required class='form-control' id='dtInicioSol' name="dtIni" value="<?php echo $dtIniEvento ?>">                    
                                    </div>

                                    <div class='form-group col-md-3'>
                                        <label for='message-text' class='control-label'>Fim Inscrições:*</label>
                                        <input type='date' required class='form-control' id='dtFimSol' name="dtFim" value="<?php echo $dtFimEvento; ?>">                    
                                    </div>


                                    <div class='form-group col-md-6'>
                                        <label for='message-text' class='control-label'>Email do Evento:*</label>
                                        <input type='email' required class='form-control' id='emailSol' name="email" value="<?php echo $emailEvento; ?>">                    
                                    </div>

                                    <div class='form-group col-md-3'>
                                        <label for='message-text' class='control-label'>Carga Horária:*</label>
                                        <input type='text' required class='form-control' id='chSol' name="ch" value="<?php echo $chEvento; ?>">                    
                                    </div>

                                    <div class='form-group col-md-3'>
                                        <label for='message-text' class='control-label'>Período:*</label>
                                        <input type='text' required class='form-control' name="periodo" placeholder="08 à 12 de abril" id='periodoSol' value="<?php echo $periodo; ?>">                    
                                    </div>

                                    <div class='form-group col-md-6'>
                                        <label for='message-text' class='control-label'>Site do Evento:*</label>
                                        <input type='text' class='form-control' id='siteSol' name="site">                    
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="texto">Tem submissão: *</label>
                                        <select class="form-control" id="temSubSol" name="estado" name="temSub" required="">                
                                            <option>Selecione...</option>        

                                            <option value='s'>Sim</option>
                                            <option value='n'>Não</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="texto">Frequência pelo APP: *</label>
                                        <select class="form-control" id="preqAppSol" name="freqAPP" required="">                
                                            <option>Selecione...</option>        

                                            <option value='s'>Sim</option>
                                            <option value='n'>Não</option>

                                        </select>
                                    </div>                        

                                </div>

                                <input type="submit" class="col-md-12 btn btn-success" value="Salvar Alterações">
                            </form>


                        </div>


                        <div class="modal-footer">                                    
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                        </div>
                    </div>                                                        

                </div>
            </div>
        </div>
    </div>
    <!--- MODAL programacao-->



    <!--- MODAL EDITAR IMAGENS EVENTO-->
    <div class="modal modal-wide fade" id="editar-imagens-evento" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gerenciar Evento:</h4>
                </div>
                <div class="modal-body">  


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Gerenciar Evento:</h3>
                        </div>
                        <div class="panel-body">   
                            <div class="col-md-12 orientacoes">
                                <div class="col-md-12">

                                    <div class="alert alert-danger" id="etapa3-retorno">
                                        Ops! Preencha todas as informações para continuar!
                                    </div>
                                </div><Br>
                                <div class="row certificado">
                                    <h3>Imagens do evento</h3>
                                    <div class="form-group col-md-6">
                                        <div class="col-md-12 alert alert-warning">
                                            Essa imagem ficará disponível na página inicial do site!

                                            Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                            Largura: 1900px;<br>
                                            Altura: 900px<br>
                                        </div>
                                        <div class="alert alert-danger" id="retorno-envio-img">

                                        </div>
                                        <label for='message-text' class='control-label'>Imagem Slide:*</label>


                                        <form id="formulario" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoSlideUpdate'); ?>">
                                            <input type="file" id="imagemSlide" class="form-control" name="imagemSlide" />
                                            <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">

                                        </form>
                                        <div id="visualizarSlide" class="col-md-12"><img src="<?php echo base_url('assets/blog/img/slide/' . $imagem_slide); ?> " class="img-responsive"></div>
                                    </div>

                                    <div class='form-group col-md-6'>


                                        <div class="col-md-12 alert alert-warning">
                                            Essa imagem ficará disponível onde o usuário irá se inscrever no evento!

                                            Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                            Largura: 392px;<br>
                                            Altura: 376px<br>
                                        </div>
                                        <div class="alert alert-danger" id="retorno-envio-card">

                                        </div>

                                        <label for='message-text' class='control-label'>Imagem Card:*</label>
                                        <form id="formulario2" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoCardUpdate'); ?>">
                                            <input type="file" name="imagemCard"  id="imagemCard" class="form-control" />
                                              <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">
                                        </form>
                                        <div id="visualizarCard" class="col-md-12"><img src="<?php echo base_url('assets/img/background_cards/' . $background_card); ?> " class="img-responsive"></div>
                                    </div>
                                </div>

                                <div class="row certificado">
                                    <div id="retorno-envio-certificado"></div>
                                    <h3>Certificado</h3>
                                    <div class='form-group col-md-6'>
                                        <div class="col-md-12 alert alert-warning">
                                            Base do certificado!<br>

                                            Atenção, a imagem abaixo deve conter as seguintes dimensões:<br>
                                            Largura: 1126px;<br>
                                            Altura: 794px<br>
                                            Importante: O cabeçalho do certificado podera conter as identidade visual do seu evento, no entanto, a parte central é reservada para o conteúdo do certificado que será 
                                            criado de maneira automática pelo sistema.
                                        </div>
                                        <div class="alert alert-danger" id="retorno-envio-card">

                                        </div>

                                        <label for='message-text' class='control-label'>Base certificado:*</label>
                                        <form id="formulario3" method="post" enctype="multipart/form-data" action="<?php echo base_url('Home/inserirImagemEventoCertificadoUpdate'); ?>">
                                            <input type="file" name="imagemCertificado"  id="imagemCertificado" class="form-control" />
                                            
                                               <input type="hidden" id="id_evento" name="id_evento" value="<?php echo $id_evento; ?>">
                                        </form>
                                        <div id="visualizarCertificado" class="col-md-12"><img src="<?php echo base_url('assets/img/background_certificados/' . $baseCertificado); ?> " class="img-responsive"></div>
                                    </div>

                                    <div class='form-group col-md-offset-1 col-md-3'>
                                        <img src="<?php echo base_url('assets/img/background_certificados/default.png'); ?>" class="img-responsive">
                                    </div>           

                                </div>
                                <!--
                                -->
                               
                                </form>


                            </div>

                        </div>
                    </div>
                            <div class="modal-footer">                                    
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Fechar</button>
                            </div>
                        </div>                                                        

                    </div>
                </div>
            </div>
        </div>
        <!--- MODAL EDITR IMAGENS-->
