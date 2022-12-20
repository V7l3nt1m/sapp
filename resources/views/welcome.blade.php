<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SAPP</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/page1/assets/img/itel_logo_sapp.png" type="image/x-icon">
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="/page1/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/page1/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="/page1/assets/css/animate.css" />
    <link rel="stylesheet" href="/page1/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="/page1/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="/page1/assets/css/main.css" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand logo" href="index.html">
                                <img class="logo1" src="/page1/assets/img/itel_logo_sapp.png" height="50px" alt="Logo" />
                            </a>
                            <div>
                                
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="" aria-controls=""
                                aria-expanded="" aria-label="">
                                        <a href="/login" class="btn" style="
                                        width: 88px;
                                        background-color: #004d8b;
                                        margin-right: 12px;
                                        margin-bottom: 10px;
                                        color: #fff;
                                    ">Entrar</a>
                            </button>

                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            </div>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">

                                    <li class="nav-item">
                                        <a href="#osapp">SAPP</a>
                                    </li>
                                    <li class="nav-item"><a href="#funcionalidades">Funcionalidades</a></li>
                                    <li class="nav-item"><a href="#devteam">DevTeam</a></li>

                                  <!--  <li class="nav-item"><a href="contact.html">Contactos</a></li> -->
                                </ul>

                            </div>
                            <!-- navbar collapse -->
                            @if(Auth::check())
                            <div class="button">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout" class="btn"  onclick="event.preventDefault();
                                    this.closest('form').submit();"></i>Sair</a>
                                </form>
                            </div>
                            @else
                            <div class="button">
                                <a href="/login" class="btn">Entrar</a>
                            </div>
                            @endif
                        </nav>
                        <!-- navbar -->

                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area">
        <!-- Single Slider -->
        <div class="hero-inner" style="
        background: #f9f9f9;
    ">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-6 col-12">
                        <div class="home-slider">
                            <div class="hero-text">
                                <h1 class="wow fadeInUp" data-wow-delay=".4s">Seja Bem-Vindo ao <br> Sistema de Auxilio de Projectos da PAP</h1>
                                <p class="wow fadeInUp" data-wow-delay=".6s">Uma plataforma consebida especialmente para estudantes do último ano de cursos técnicos.
                                    Acreditamos que facilitará para os alunos o processo de criação e para os professores a correção dos relatórios.
                                    <br></p>
                                    @if(Auth::check())
                                <div class="button wow fadeInUp" data-wow-delay=".8s">
                                    <a href="/dashboard" class="btn btn_comecar">Dashboard</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Single Slider -->
    </section>
    <!--/ End Hero Area -->

    <!-- Start Service Area -->
    <section class="services section" id="osapp">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title align-left">
                        <img src="/page1/assets/img/nerd-animate_sapp.svg" class="vector_sapp" alt="" height="500px">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-title align-left" style="top: 20%;">
                        <span class="wow fadeInDown" data-wow-delay=".2s"></span>
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">SAPP</h2>
                        <h5>Sistema de Auxílio de Projectos da PAP</h5><br>
                        <p class="wow fadeInUp" data-wow-delay=".3s">O SAPP é um plataforma de auxílio para estudantes do último ano de Cursos Técnicos.
                            Foi desenvolvida nos finais do ano 2022, e tem como foco principal
                            facilitar o processo mais teórico do desenvolvimento da Prova de Aptidão Profissional.<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Services Area -->





    <section class="services section" id="funcionalidades">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title align-left" style="top: 20%;">
                    <span class="wow fadeInDown" data-wow-delay=".2s"></span>
                    <h2 class="wow fadeInUp" data-wow-delay=".2s">Funcionalidades</h2><br>

                </div>
            </div>
            <div class="single-head">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service wow fadeInUp align-items-center justify-content-center" data-wow-delay=".2s">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-command text-white icone_serv" viewBox="0 0 16 16">
                                <path d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3zM6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5H6zm4 1v4H6V6h4zm1-1V3.5A1.5 1.5 0 1 1 12.5 5H11zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5V11zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11H5z"/>
                              </svg>
                        </div><br>
                        <h3 class="text-white"><a href="">Ambiente de interação entre professores e alunos.</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book text-white icone_serv" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                              </svg>
                        </div><br>
                        <h3><a href="">Acompanhamento do aluno com ajudas e sugestões.</a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle text-white icone_serv" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                              </svg>
                        </div><br>
                        <h3><a href="">Atribuição de notas consernete ao desempenho.</a></h3>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".8s">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-boxes text-white icone_serv" viewBox="0 0 16 16">
                                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/>
                              </svg>
                        </div><br>
                        <h3><a href="">Criacão de salas e Gerar Relátorios</a></h3>

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>



    <!-- Start Intro Video Area -->
    <section class="intro-video-area overlay section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title white-text">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Depoimentos </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Verifique aqui a esperiência de usuários que já interagiram com a plataforma.
                        </p>
                        <a href="" class="btn btn-primaty" style="
                        background: transparent;
                        border: 1px solid #f9f9f9;
                        color: #f9f9f9;
                        margin-top: 20px;
                        padding: 10px 20px 10px 20px;
                    ">Comentarios</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="services section" id="devteam">
        <div class="container">
            <div class="col-md-12 section-title align-left" style="top: 20%;">
                <span class="wow fadeInDown" data-wow-delay=".2s"></span>
                <h2 class="wow fadeInUp" data-wow-delay=".4s">Desenvolvedores</h2><br>

            </div>
            <div class="row bootstrap snippets bootdey align-items-center justify-content-center  wow fadeInUp" data-wow-delay=".8s">
                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Rachel James Johnes" class="img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">Otoniel Emanuel</div>
                                <div class="team-position">Dev Full-Stake e UI designer</div>
                            </div>

                            <figcaption>

                                <p class="icon-links">
                                    <a href="#!"><i class="fa fa-facebook"></i></a>
                                    <a href="#!"><i class="fa fa-google"></i></a>
                                    <a href="#!"><i class="fa fa-linkedin"></i></a>
                                    <a href="#!"><i class="fa fa-github"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="#!">tel: +244 929 392 384</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>

                <div class="col-md-4">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Rachel James Johnes" class="img img-responsive">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">Valentim Prado</div>
                                <div class="team-position">Dev Back-End</div>
                            </div>
                            <figcaption>
                                <p class="icon-links">
                                    <a href="#!"><i class="fa fa-facebook"></i></a>
                                    <a href="#!"><i class="fa fa-google"></i></a>
                                    <a href="#!"><i class="fa fa-linkedin"></i></a>
                                    <a href="#!"><i class="fa fa-github"></i></a>
                                </p>

                                <p class="phone-number">
                                    <a href="#!">tel: +244 947 374 452</a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>
            </div>
            </div>
    </section>

 <!--

                    <div class="subscribe-text wow fadeInLeft" data-wow-delay=".2s">
                        <h6>Inscreva-se para receber as atualizações</h6>
                        <p class="">Inscreva-separa receber as últimas novidades em primeira mão.</p>
                        <form class="newsletter-inner">
                            <input name="EMAIL" placeholder="E-mail" class="common-input"
                                type="email" required="requijjred">
                            <div class="button">
                                <button class="btn btn_comecar">Subscrever agora</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="mini-call-action wow fadeInRight" data-wow-delay=".4s">
                        <h4>Este é um espeço reservado para si.</h4>
                        <p>Preenche o formulário de mensagens e fale conosco, aqui poderá deixar as suas dúvidas críticas e sugestões sobre o sistema!</p>
                        <div class="button">
                            <a href="contact.html" class="btn">Vamos lá</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->

    <!-- Start Footer Area -->
    <footer class="footer">

        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row" style="display: none;">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">


                        </div>
                        <!-- End Single Widget -->
                    </div>



                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row" >
                        <div class="col-12">
                            <div class="left" style="display: none;">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a></p>
                            </div>
                            <div class="left">
                                <p>SAPP - Sistema de Auxílio de Projectos da PAP</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="/page1/assets/js/bootstrap.min.js"></script>
    <script src="/page1/assets/js/count-up.min.js"></script>
    <script src="/page1/assets/js/wow.min.js"></script>
    <script src="/page1/assets/js/tiny-slider.js"></script>
    <script src="/page1/assets/js/glightbox.min.js"></script>
    <script src="/page1/assets/js/imagesloaded.min.js"></script>
    <script src="/page1/assets/js/isotope.min.js"></script>
    <script src="/page1/assets/js/main.js"></script>
    <script type="text/javascript">
        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
</body>

</html>
