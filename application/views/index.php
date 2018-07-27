<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Siseventos - URCA</title>

        <!--    Google Fonts-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!--Fontawesom-->
        <link rel="stylesheet" href="<?php echo base_url('assets/blog/'); ?>css/font-awesome.min.css">

        <!--Animated CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/blog/'); ?>css/animate.min.css">

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/blog/'); ?>css/bootstrap.min.css" rel="stylesheet">
        <!--Bootstrap Carousel-->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/blog/'); ?>css/carousel.css" />

        <link rel="stylesheet" href="<?php echo base_url('assets/blog/'); ?>css/isotope/style.css">

        <!--Main Stylesheet-->
        <link href="<?php echo base_url('assets/blog/'); ?>css/style.css" rel="stylesheet">
        <!--Responsive Framework-->
        <link href="<?php echo base_url('assets/blog/'); ?>css/responsive.css" rel="stylesheet">

        <link href="<?php echo base_url('assets/blog/'); ?>css/modalLogin.css" rel="stylesheet">

    </head>

    <body data-spy="scroll" data-target="#header">

        <!--Start Hedaer Section-->
        <section id="header">
            <div class="header-area">

                <div class="header_menu text-center" data-spy="affix" data-offset-top="50" id="nav">
                    <div class="container">
                        <nav class="navbar navbar-default zero_mp ">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand custom_navbar-brand" href="#"><img src="<?php echo base_url('assets/blog/'); ?>img/logo.png" alt=""></a>
                            </div>
                            <!--End of navbar-header-->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse zero_mp" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right main_menu">
                                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>

                                    <!--<li><a href="#" data-toggle="modal" data-target="#myModal" data-title="Contact Us">Fale Conosco</a></li>-->
                                    
                                    <li><a href="http://cev.urca.br/siseventos#welcome">Sobre</a></li>
                                    <!--                                    <li><a href="http://localhost/siseventos#portfolio">Eventos Disponíveis</a></li>-->
                                    <li><a href="http://cev.urca.br/siseventos#counter">Estátisticas</a></li>
                                    <li><a href="http://cev.urca.br/siseventos#event">Eventos Realizados</a></li>

                                    <li><a href="http://cev.urca.br/siseventos#contact">Fale Conosco</a></li>
                                    <li><a href="<?php echo base_url('pessoa'); ?>" class="btn btn-primary btn-sm">Cadastro</a></li>
                                    <li><a href="#" class="btn btn-primary btn-sm" role="button" data-toggle="modal" data-target="#login-modal">login</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                        <!--End of nav-->
                    </div>
                    <!--End of container-->
                </div>
                <!--End of header menu-->
            </div>
            <!--end of header area-->
        </section>
        <!--End of Hedaer Section-->



        <!--Start of slider section-->
        <section id="slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $numEventos; $i++) { ?>
                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class=""></li>
                    <?php } ?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                    foreach ($eventos as $dados) {

                        $nome = $dados->titulo;
                        $descricao = $dados->descricao;
                        $slide = $dados->imagem_slide;
                        $data_atual = date('Y-m-d');
                        $fim_inscricoes_bd = data_bd($dados->dtFim_Insc);
                        $descricao = $dados->descricao;
                        $fl_ativo = $dados->ativo;

                        if ($fl_ativo == "S" || $fl_ativo == "s" && strtotime($data_atual) <= strtotime($fim_inscricoes_bd)) {
                            ?>  
                            <div class="item">
                                <div class="slider_overlay">
                                    <img src="<?php echo base_url("assets/blog/img/slide/$slide"); ?>" alt="...">
                                    <div class="carousel-caption">
                                        <div class="slider_text">
                                            <h3><?php echo $nome; ?></h3>

                                            <p><?php echo $descricao; ?></p>
                                            <a href="#"  role="button" data-toggle="modal" data-target="#login-modal"  class="custom_btn">Inscreva-se</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                </div>
                <!--End of Carousel Inner-->
            </div>
        </section>
        <!--end of slider section-->



        <!--Start of welcome section-->

        <section id="welcome">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wel_header">
                            <h2>Bem - Vindo ao SisEventos - URCA</h2>
                            <p>Sistema voltado a automação de processos em Eventos Universitários</p>
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-desktop"></i>
                                    </div>
                                    <h4>Design Responsivo</h4>
                                    <p>O Sistema se adapta para o seu dispositivo, seja este um celular, tablet ou smartphone.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <h4>Integração Mobile</h4>
                                    <p>Possibilidade de registrar frequência de atividades a pártir de nosso aplicativo.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <h4>Certificados On-Line</h4>
                                    <p>Geração de certificados para: Participação, Atividades (minicursos, oficinas, palestras, etc), Certificados de Submissão.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    <h4>Você administrador</h4>
                                    <p>Você terá total autônomia e acesso a dados sobre seu evento.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--end of welcome section-->







        <!--Start of counter-->
        <section id="counter">
            <div class="counter_img_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="counter_header">
                                <h2>Algumas informações</h2>
                                <p>Confira algumas informações pertinentes ao nosso SisEventos.</p>
                            </div>
                        </div>
                        <!--End of col-md-12-->
                    </div>
                    <!--End of row-->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/cadastros.png" alt="">
                                    <div class="counter_text">
                                        <span class="couter counter-cadastrados"></span>
                                        <p>Cadastros Realizados</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/hand.png" alt="">
                                    <div class="counter_text">
                                        <span class="couter counter-certificados">1458</span>
                                        <p>Certificados Emitidos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/tuhnder.png" alt="">
                                    <div class="counter_text">
                                        <span class="couter counter-eventos">9854</span>
                                        <p>Eventos Cadastrados</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/cloud.png" alt="">
                                    <div class="counter_text">
                                        <span class="couter counter-sub">5412</span>
                                        <p>Submissões</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of row-->
                </div>
                <!--End of container-->
            </div>
        </section>
        <!--end of counter-->



        <!--start of event-->
        <section id="event">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="event_header text-center">
                            <h2>Últimos Eventos</h2>
                            <p>Confira os últimos eventos realizados em nossa plataforma.</p>
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <div class="row">
                    <div class="col-md-8">

                        <?php
                        foreach ($eventosCard as $dados) {
                            $nome = $dados->titulo;
                            $descricao = $dados->descricao;
                            $slide = $dados->imagem_slide;
                            $dataFim = $dados->dtFim_Insc;
                            $descricao = $dados->descricao;
                            $card = $dados->background_card;
                            $periodo = $dados->periodo_evento;
                            $descricao = $dados->descricao;
                            $data_atual = date('Y-m-d');
                            $fim_inscricoes_bd = data_bd($dados->dtFim_Insc);
                            ?>

                            <div class="row">
                                <div class="col-md-5 zero_mp">
                                    <div class="event_item">
                                        <div class="event_img">

                                            <img src="<?php echo base_url("assets/img/background_cards/$card"); ?>" alt="">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 zero_mp">
                                    <div class="event_item">
                                        <div class="event_text text-center">
                                            <h4><?php echo $nome; ?></h4>
                                            <h6><?php echo $periodo; ?></h6>
                                            <p><?php echo $descricao; ?></p>
                                            <?php if (strtotime($data_atual) <= strtotime($fim_inscricoes_bd)) { ?>
                                                <a href="<?php echo base_url('login'); ?>" class="event_btn">Increva-se</a>
                                            <?php } else { ?>
                                                <a href="" class="event_btn">Inscrições encerradas</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <?php } ?>
                        <!--End of row-->

                    </div>
                    <!--End of col-md-8-->
                    <div class="col-md-4">

                        <?php
                        foreach ($eventosSidebar as $dados) {
                            $nome = $dados->titulo;
                            $descricao = $dados->descricao;
                            $slide = $dados->imagem_slide;
                            $dataFim = $dados->dtFim_Insc;
                            $descricao = $dados->descricao;
                            $card = $dados->background_card;
                            $periodo = $dados->periodo_evento;
                            $descricao = $dados->descricao;
                            ?>

                            <div class="event_news">
                                <div class="event_single_item fix">
                                    <div class="event_news_img floatleft">
                                        <img src="<?php echo base_url("assets/img/background_cards/$card"); ?>" alt="">
                                    </div>
                                    <div class="event_news_text">
                                        <h4><?php echo $nome; ?></h4>
                                        <p><?php echo $descricao; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!--End of col-md-4-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--end of event-->



        <!--Start of testimonial-->
<!--        <section id="testimonial">
            <div class="testimonial_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="testimonial_header text-center">
                                <h2>testimonials</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    End of row
                    <section id="carousel">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                                         Carousel indicators 
                                        <ol class="carousel-indicators">
                                            <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                                        </ol>
                                         Carousel items 
                                        <div class="carousel-inner">
                                            <div class="active item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="<?php echo base_url('assets/blog/'); ?>img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="<?php echo base_url('assets/blog/'); ?>img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            End of item with active
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="<?php echo base_url('assets/blog/'); ?>img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="<?php echo base_url('assets/blog/'); ?>img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ENd of item
                                        </div>
                                    </div>
                                </div>
                            </div>
                            End of row
                        </div>
                        End of container
                    </section>
                    End of carousel
                </div>
            </div>
            End of container
        </section>-->
        <!--end of testimonial-->



        <!--Start of blog-->
<!--        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest_blog text-center">
                            <h2>Últimas Notícias</h2>
                            <p>Confira as últimas notícias referentes ao eventos de nossa plataforma.</p>
                        </div>
                    </div>
                </div>
                End of row
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/climate_effect.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>III Seminário de Histórias e Contemporaneidades: Certificados Liberados</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    End of col-md-4
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/air_pollutuon.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>How to avoid indoor air pollution?</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    End of col-md-4
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="<?php echo base_url('assets/blog/'); ?>img/threat_bear.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>Threat to Yellowstone’s grizzly bears.</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    End of col-md-4
                </div>
                End of row
            </div>
            End of container
        </section>-->
        <!-- end of blog-->



        <!--Start of Purches-->
<!--        <section id="purches">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="purches_title">Buy our wordpress theme</h2>
                    </div>
                    <div class="col-md-2 col-md-offset-4">
                        <a href="" class="purches_btn">purches</a>
                    </div>
                </div>
                End of row
            </div>
            End of container
        </section>-->
        <!--End of purches-->



        <!--Start of Market-->
<!--        <section id="market">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="market_area text-center">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="<?php echo base_url('assets/blog/'); ?>img/audiojungle.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="<?php echo base_url('assets/blog/'); ?>img/codecanyon.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="<?php echo base_url('assets/blog/'); ?>img/graphicriver.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="<?php echo base_url('assets/blog/'); ?>img/audiojungle.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            End of row
                        </div>
                        End of market Area
                    </div>
                    End of col-md-12
                </div>
                End of row
            </div>
            End of container
        </section>-->
        <!--End of market-->



        <!--Start of contact-->
        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="colmd-12">
                        <div class="contact_area text-center">
                            <h3>Podemos lhe ajudar?</h3>
                            <p>Entre em contato e lhe daremos o suporte necessário para que seu evento seja único.</p>
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="office">
                            <div class="title">
                                <h5>Onde estamos?</h5>
                            </div>
                            <div class="office_location">
                                <div class="address">
                                    <i class="fa fa-map-marker"><span> Rua Cel. Antônio Luis, 1161 - 63105-000 - Pimenta - Crato/CE</span></i>
                                </div>
                                <div class="phone">
                                    <i class="fa fa-phone"><span>+ 88 99604 - 2686</span></i>
                                </div>
                                <div class="email">
                                    <i class="fa fa-envelope"><span>erlanio.freire@urca.br</span></i>
                                </div>
                                <div id="mapa"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.0123127146737!2d-39.41670189951223!3d-7.238030199538171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7a184905b138735%3A0xb59a0b06c3a0681c!2sURCA+-+Universidade+Regional+do+Cariri!5e0!3m2!1spt-BR!2sbr!4v1520824167951" width="555" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="msg">
                            <div class="msg_title">
                                <h5>Entre em contato por E-mail</h5>
                            </div>
                            <div class="form_area">
                                <!-- CONTACT FORM -->
                                <div class="contact-form wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
                                    <div id="message"></div>
                                    <form action="" class="form-horizontal contact-1" role="form" name="contactform" id="contactform" onsubmit="return false">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="subject" class="form-control" id="subject" placeholder="Assunto *">
                                                <div class="text_area">
                                                    <textarea name="contact-message" id="msg" class="form-control" cols="30" rows="8" placeholder="Mensagem"></textarea>
                                                </div>
                                                <button type="submit" class="btn custom-btn" id="btn-enviar" data-loading-text="Loading...">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-6-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--End of contact-->



        <!--Start of footer-->
        <section id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p><?php echo date('Y'); ?> - <span><a href="">DTI - URCA</a></span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="designer">

                        </div>
                    </div>
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--End of footer-->



        <!--Scroll to top-->
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <!--End of Scroll to top-->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/jquery-1.12.3.min.js"></script>

        <!--Counter UP Waypoint-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/waypoints.min.js"></script>
        <!--Counter UP-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/jquery.counterup.min.js"></script>

        <script>
                                        //for counter up
                                        $('.counter').counterUp({
                                            delay: 10,
                                            time: 1000
                                        });
        </script>


        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjxvF9oTfcziZWw--3phPVx1ztAsyhXL4"></script>


        <!--Isotope-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/isotope/min/scripts-min.js"></script>
        <script src="<?php echo base_url('assets/blog/'); ?>js/isotope/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url('assets/blog/'); ?>js/isotope/packery-mode.pkgd.min.js"></script>
        <script src="<?php echo base_url('assets/blog/'); ?>js/isotope/scripts.js"></script>


        <!--Back To Top-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/backtotop.js"></script>
        <script src="<?php echo base_url('assets/'); ?>js/jquery.inputmask.bundle.js"></script>


        <!--JQuery Click to Scroll down with Menu-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/jquery.localScroll.min.js"></script>
        <script src="<?php echo base_url('assets/blog/'); ?>js/jquery.scrollTo.min.js"></script>
        <!--WOW With Animation-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/wow.min.js"></script>
        <!--WOW Activated-->
        <script>
                                        new WOW().init();
        </script>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo base_url('assets/blog/'); ?>js/bootstrap.min.js"></script>
        <!-- Custom JavaScript-->
        <script src="<?php echo base_url('assets/blog/'); ?>js/main.js"></script>
    </body>

    <!-- BEGIN # MODAL LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="<?php echo base_url('assets/blog'); ?>/img/logo-modal-login.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">

                    <!-- Begin # Login Form -->
                    <form id="login-form" onsubmit="return false">
                        <div class="modal-body">
                            <div id="div-login-msg" class="hidden">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg"></span>
                            </div>
                            <input id="login_username" class="form-control" type="text" placeholder="Email" required>
                            <input id="login_password" class="form-control" type="password" placeholder="Senha" required>

                        </div>
                        <div class="modal-footer">
                            <div>
                                <button id="btn-logar" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
                            <div>
                                <a href="<?php echo base_url('login/esqueceuSenha'); ?>"<button id="login_lost_btn" type="button" class="btn btn-link">Esqueceu sua senha?</button></a>
                                <a href="<?php echo base_url('login/esqueceuEmail'); ?>"<button id="login_lost_btn" type="button" class="btn btn-link">Esqueceu seu email?</button></a>
                                <br>
                                <a href="<?php echo base_url('pessoa'); ?>"<button id="login_register_btn" type="button" class="btn btn-link">Cadastre-se</button></a>
                            </div>
                        </div>
                    </form>
                    <!-- End # Login Form -->                     
                </div>
                <!-- End # DIV Form -->

            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->


    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Solicitar cadastro de evento</h3>
                </div>
                <div class="modal-body">

                    <div id="resposta-envio">

                    </div>

                    <form role="form">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Eu sou:</h4>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Sou: </label>
                                    <label class="radio-inline"><input type="radio" name="sou" value="professor">Professor</label>
                                    <label class="radio-inline"><input type="radio" name="sou" value="aluno">Aluno</label>
                                    <label class="radio-inline"><input type="radio" name="sou" value="pubExterno">Público Externo</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-solicitacao">


                            <div class="form-group" id="matricula">
                                <label for="message-text" class="control-label">Matrícula:</label>
                                <input type="text" required="" class="form-control" id="matriculaSolicitacao">                           
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nome Completo:</label>
                                <input type="text" required="" class="form-control" id="nomeSolicitacao">
                            </div>                        

                            <div class="form-group">
                                <label for="message-text" class="control-label">Nome do Evento:</label>
                                <input type="text" required="" class="form-control" id="eventoSolicitacao">                           
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Justificativa:</label>
                                <textarea class="form-control" required="" id="justificativaSolicitacao"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Email:</label>
                                <input type="email" required="" class="form-control" id="emailSolicitacao">                           
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Repita Email:</label>
                                <input type="email" required="" class="form-control" id="RepeteEmailSolicitacao">                           
                            </div>

                            <div class="form-group">
                                <label for="message-text" class="control-label">Telefone:</label>
                                <input type="text" required="" class="form-control" id="telefoneSolicitacao">                           
                            </div>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-remove"></i> Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn-enviar-solicitacao"> <i class="fa fa-check"></i> Enviar soliticação</button>
                </div>
            </div>
        </div>
    </div>
</html>