<?php
foreach ($portal as $dados) {
    $evento = $dados->titulo;
    $apresentacao = $dados->apresentacao;
    $background_card = $dados->background_card;
    $slide = $dados->imagem_slide;
    $comissao = $dados->comissao;
    $cronograma = $dados->cronograma;
    $contatos = $dados->contatos;
    $logoTopo = $dados->logo_topo;
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $evento; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/portal/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?php echo base_url('assets/portal/'); ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url('assets/portal/'); ?>css/agency.min.css" rel="stylesheet">


        <style>
            header.masthead {
                text-align: center;
                color: white;
                background-image: url("<?php echo base_url('assets/blog/img/slide/' . $slide); ?>");
                background-repeat: no-repeat;
                background-attachment: scroll;
                background-position: center center;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                margin-top: 108px;
            }

            #mainNav{
                background-color: #006822;
            }

            .contatos{
                color: #fff;

            }
            .logo{
                max-height: 50px;
                min-height: 50px;
                max-width: 50px;
                min-width: 50px;
            }
        </style>

    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?php echo base_url('assets/portal/img/logos/' . $logoTopo); ?>" class="logo"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="http://cev.urca.br/siseventos">Inscrições</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Apresentação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#portfolio">Programação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">Comitê Técnico</a>
                        </li>
                        <!-- <li class="nav-item">
                             <a class="nav-link js-scroll-trigger" href="#team">Team</a>
                         </li>-->
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Fale Conosco</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header -->
        <header class="masthead">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"></div>
                    <div class="intro-heading text-uppercase"></div>
                    <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Sobre o evento</a>
                </div>
            </div>
        </header>

        <!-- Services -->
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Apresentação</h2>
                        <h3 class="section-subheading text-muted"><?php echo $evento; ?></h3>
                    </div>
                </div>
                <div class="row text-center">
                    <!-- <div class="col-md-4">
                         <span class="fa-stack fa-4x">
                             <i class="fa fa-circle fa-stack-2x text-primary"></i>
                             <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                         </span>
                         <h4 class="service-heading">E-Commerce</h4>
                         <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                     </div>
                     <div class="col-md-4">
                         <span class="fa-stack fa-4x">
                             <i class="fa fa-circle fa-stack-2x text-primary"></i>
                             <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                         </span>
                         <h4 class="service-heading">Responsive Design</h4>
                         <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                     </div>
                     <div class="col-md-4">
                         <span class="fa-stack fa-4x">
                             <i class="fa fa-circle fa-stack-2x text-primary"></i>
                             <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                         </span>
                         <h4 class="service-heading">Web Security</h4>
                         <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                     </div>-->

                    <div class="col-md-12" style="text-align: left">
                        <p>
                            <?php echo $apresentacao; ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Portfolio Grid -->
        <section class="bg-light" id="portfolio">
            <div class="container">



                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Programação</h2>
                        <h3 class="section-subheading text-muted"><?php echo $evento; ?></h3>
                    </div>
                </div>



                <div class="row">
                    <?php
                    foreach ($dias as $dia) {
                        $data = data_br($dia->data);
                        $id_programacao = $dia->id_programacao;
                        ?>

                        <div class="col-md-4 col-sm-6 portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal-<?php echo $id_programacao; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fa fa-plus fa-3x"></i>
                                    </div>
                                </div>
                                <img class="img-fluid" src="<?php echo base_url('assets/img/background_cards/' . $background_card); ?>" alt="">
                            </a>
                            <div class="portfolio-caption">
                                <h4><?php echo $data; ?></h4>
                                <p class="text-muted"></p>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </section>

        <!-- About -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Comitê técnico do Evento</h2>
                        <h3 class="section-subheading text-muted"><?php echo $evento; ?></h3>
                    </div>
                </div>

                <div class="col-md-12">
                    <ul class="list-inline" style="text-align: center">
                        <?php
                        echo $comissao;
                        ?>

                    </ul>
                </div>
                <!--<div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>2009-2011</h4>
                                        <h4 class="subheading">Our Humble Beginnings</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>March 2011</h4>
                                        <h4 class="subheading">An Agency is Born</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>December 2012</h4>
                                        <h4 class="subheading">Transition to Full Service</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>July 2014</h4>
                                        <h4 class="subheading">Phase Two Expansion</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Be Part
                                        <br>Of Our
                                        <br>Story!</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </section>


        <!-- CRONOGRAMA DO EVENTO -->
        <section class="bg-light" id="portfolio">
            <div class="container">



                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase"> Cronograma do Evento</h2>
                        <h3 class="section-subheading text-muted"><?php echo $evento; ?></h3>
                    </div>
                </div>

                <div class="col-md-12">
                    <ul class="list-inline" style="text-align: center">
                        <?php
                        echo $cronograma;
                        ?>

                    </ul>
                </div>

            </div>
        </section>

        <!-- Team
        <section class="bg-light" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
                            <h4>Kay Garland</h4>
                            <p class="text-muted">Lead Designer</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
                            <h4>Larry Parker</h4>
                            <p class="text-muted">Lead Marketer</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
                            <h4>Diana Pertersen</h4>
                            <p class="text-muted">Lead Developer</p>
                            <ul class="list-inline social-buttons">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- Clients -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/gov.png" alt="">
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/urca.png" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/promocao.png" alt="">
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="#">
                            <img class="img-fluid d-block mx-auto" src="img/logos/pratica.png" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading text-uppercase">Fale conosco</h2>
                        <h3 class="section-subheading text-muted"><?php echo $evento; ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form id="contactForm" name="sentMessage" novalidate>



                            <div class="row">
                                <div class="col-md-12 contatos">

                                    <?php
                                    echo $contatos;
                                    ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Developed by Erlânio Freire</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">

                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
        </footer>

        <!-- Portfolio Modals -->

        <!-- Modal 1 -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase"> Dia 23 de maio de 2018</h2>

                                    <ul class="list-inline">
                                        <li><strong>Manhã</strong></li>
                                        <li> Visita técnica ao município Nova Olinda e ao CTMC (Centro de Tecnologia
                                            Mineral do Cariri).</li><Br>

                                        <li><strong>Noite</strong></li>
                                        <li> 19 horas - Solenidade de Abertura
                                            Salão de Atos da URCA – Crato<br><br> <strong>MOMENTO I – Resgate Histórico</strong><br>
                                            Presidente da Mesa:<br>
                                            Prof. José Patrício Pereira Melo – Reitor da URCA<br><br>
                                            <strong>Palestra: O PUDINE/UFC E O PROJETO MORRIS AZIMOV</strong><br>
                                            Econ. CLÁUDIO FERREIRA LIMA – Ex Secretário de Planejamento do Ceará<br><Br>
                                        <srtong>Mediadores:</srtong><br>
                                        Adm. João Alves de Melo – Ex Presidente do BNB<br>
                                        Prof. Raimundo Padilha – Ex Presidente da Bolsa de Valores do Ceará<br>
                                        Prof. Micaelson Lacerda – Departamento de Economia da URCA<br>
                                        Abertura da Mostra Fotográfica Azimov Cariri - SALÃO DA TERRA /URCA<br>
                                        Coquetel de Confraternização</li><Br>

                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase"> Dia 24 de maio de 2018</h2>

                                    <ul class="list-inline">

                                        <li> <strong>Manhã (8h) : Minicursos – Módulo I</strong></li><Br>
                                        <li>Tema 1: Captação de Recursos para Indústria</li>
                                        <li>Tema 2: Modelos Estratégicos para o Desenvolvimento da Indústria</li>
                                        <li>Tema 3: Agroindústria</li>
                                        <li>Tema 4: Tecnologia mineral. </li><Br>
                                        <li><strong>Noite  (19h) - Salão de Atos da URCA – Crato</strong></li>
                                        <li><strong>MOMENTO II – História Recente do Desenvolvimento Industrial do
                                                Cariri:</strong></li>
                                        <li><strong>Presidente da Mesa:</strong></li>
                                        <li>Prof. Francisco do Ó de Lima Júnior – Vice-Reitor da URCA</li><br>
                                        <li><strong>Palestra:</strong></li>
                                        <li>O Desenvolvimento Industrial do Cariri 1980/2010 Econ. Mauro Filho – Secretário de Fazenda do Ceará</li><br>

                                        <li><strong>Mediadores:</strong></li>
                                        <li>Adm. Leonardo José Macêdo – Presidente do CRA/CE</li>
                                        <li>Econ. Lauro Chaves Neto – Presidente do CORECON/CE</li>
                                        <li>Cont. Robson de Castro – Presidente do CRC/CE</li>
                                    </ul>


                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 3 -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->

                                    <h2 class="text-uppercase"> Dia 25 de maio de 2018</h2>

                                    <ul class="list-inline">

                                        <li> <strong>Manhã (08h) : Minicursos – Módulo II</strong></li><Br>
                                        <li>Tema 1: Captação de Recursos para Indústria</li>
                                        <li>Tema 2: Modelos Estratégicos para o Desenvolvimento da Indústria</li>
                                        <li>Tema 3: Agroindústria</li>
                                        <li>Tema 4: Tecnologia mineral. </li><Br>
                                        <li><strong>Noite  (19h) - Salão de Atos da URCA – Crato</strong></li>
                                        <li><strong>MOMENTO III – O Futuro do Desenvolvimento Industrial do Cariri</strong></li>
                                        <li><strong>Presidente da Mesa:</strong></li>
                                        <li>Dr. Joaquim Cartaxo – Presidente do SEBRAE/CE</li><br>
                                        <li><strong>Palestra:</strong></li>
                                        <li>Estratégias para o Desenvolvimento Industrial do Cariri
                                            Dr. Cícero Pereira de Souza – Ex Coordenador do Pacto de Cooperação do Cariri e
                                            Consultor do SEBRAE</li><br>

                                        <li><strong>Entrega de CERTIFICADOS aos Homenageados ‘‘Líderes empresariais’’ fundadores da CECASA</strong></li>
                                        <li>Cerâmica do Cariri S.A. (em Barbalha)</li>
                                        <li>IMOCASA/ NORGUAÇU/ CIMASA (em Crato)</li>
                                        <li>Ÿ IESA / LUSANA/ INBOPLASA/ ALIANÇA DE OURO (em Juazeiro doNorte) </li>
                                    </ul>



                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 4 -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Lines</li>
                                        <li>Category: Branding</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal 5 -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Southwest</li>
                                        <li>Category: Website Design</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php
        foreach ($dias as $dia) {
            $data = data_br($dia->data);
            $id_programacao = $dia->id_programacao;
            $manha = $dia->manha;
            $tarde = $dia->tarde;
            $noite = $dia->noite;
            ?>

            <div class="portfolio-modal modal fade" id="portfolioModal-<?php echo $id_programacao; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl"></div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <div class="modal-body">
                                        <!-- Project Details Go Here -->
                                        <h2 class="text-uppercase"><?php echo $data; ?></h2>
                                        <p class="item-intro text-muted"><?php ?></p>
                                        <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">

                                        <ul class="list-inline">
                                            <?php
                                            if (!empty($manha)) {
                                                echo "<strong>Manhã</strong></li><Br>";
                                                echo $manha;
                                            }
                                            if (!empty($tarde)) {
                                                echo "<strong>Tarde</strong></li><Br>";
                                                echo $tarde;
                                            }
                                            if (!empty($noite)) {
                                                echo "<strong>Noite</strong></li><Br>";
                                                echo $noite;
                                            }
                                            ?>
                                        </ul>
                                        <button class="btn btn-primary" data-dismiss="modal" type="button">
                                            <i class="fa fa-times"></i>
                                            Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <!-- Modal 6 -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Seminário Desenvolvimento Industrial no Cariri</p>
                                    <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>Date: January 2017</li>
                                        <li>Client: Window</li>
                                        <li>Category: Photography</li>
                                    </ul>
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fa fa-times"></i>
                                        Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url('assets/portal/'); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/portal/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url('assets/portal/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
        <script src="<?php echo base_url('assets/portal/'); ?>js/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url('assets/portal/'); ?>js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php echo base_url('assets/portal/'); ?>js/agency.min.js"></script>

    </body>

</html>
