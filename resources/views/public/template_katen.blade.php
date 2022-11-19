<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Vote Utile</title>


    <META NAME="TITLE" CONTENT="Vote Utile">
    <META NAME="AUTHOR" CONTENT="Vote-Utile CM">
    @if (!Request::is('articles*'))
        <meta name="DESCRIPTION"
            content="Meilleur site d'infos en continu au Bénin à l'endroit des élections">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('home') }}" />
        <meta property="og:title" content="Vote-Utile site d'infos socio-politique" />
        <meta property="og:image" content="{{ asset('katen/images/logo.png') }}" />

    @endif
    <META NAME="OWNER" CONTENT="Vote Utile">
    <META NAME="ROBOTS" CONTENT="INDEX">
    <META NAME="Reply-to" CONTENT="contact@vote-utile.bj">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="msapplication-tooltip" content="Vote Utile" />
    <meta name="msapplication-starturl" content="/" />
    <meta name="msapplication-task" content="name=A la Une;action-uri=/;icon-uri=/build/images/front/ico/favicon.ico" />
    {{-- <meta name="msapplication-task" content="name=International;action-uri=/;icon-uri=/build/images/front/ico/international.ico" /> --}}
    <meta name="msapplication-task"
        content="name=Politique;action-uri=/rubrique/politique/;icon-uri=/build/images/front/ico/politique.ico" />
    <meta name="msapplication-task"
        content="name=Election;action-uri=/rubrique/election/;icon-uri=/build/images/front/ico/election.ico" />
    {{-- <meta name="msapplication-task" content="name=Societe;action-uri=/rubrique/securite-humaine/;icon-uri=/build/images/front/ico/politique.ico" /> --}}
    {{-- <meta name="msapplication-task" content="name=Economie;action-uri=/rubrique/economie/;icon-uri=/build/images/front/ico/economie.ico" /> --}}
    {{-- <meta name="msapplication-task" content="name=Culture;action-uri=/rubrique/culture/;icon-uri=/build/images/front/ico/economie.ico" /> --}}
    {{-- <meta name="msapplication-task" content="name=Sport;action-uri=/rubrique/sport/;icon-uri=/build/images/front/ico/sport.ico" /> --}}

    <!-- You can use Open Graph tags to customize link previews.
        Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="og:locale" content="fr_FR">

    <meta property="og:site_name" content="Vote-Utile">
    <!-- END - Facebook Open Graph and Twitter Card Tags 2.0.8.1 -->

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:description"
        content="Vote-utile, meilleur site d'infos en continu au Bénin à l'endroit des élections" />



    @yield('head')

    {{-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png"> --}}

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('katen/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('katen/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('katen/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('katen/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('katen/css/style.css') }}" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-classic">

            <div class="container-xl">
                <!-- header top -->
                <div class="header-top">
                    <div class="row align-items-center">

                        <div class="col-md-4 col-xs-12">
                            <!-- site logo -->
                            <a class="navbar-brand" href="/"><img src="{{ asset('katen/images/logo.png') }}"
                                    style="max-width: 200px;" alt="logo" /></a>

                            <!-- <h3>Vote-Utile <span class="text-danger">.</span> </h3>  -->
                        </div>

                        <div class="col-md-8 d-none d-md-block">
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0 float-end">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg">
                <!-- header bottom -->
                <div class="header-bottom  w-100">

                    <div class="container-xl">
                        <div class="d-flex align-items-center">
                            <div class="collapse navbar-collapse flex-grow-1">
                                <!-- menus -->
                                <ul class="navbar-nav">
                                    <li class="nav-item @if (Request::is('accueil*')) active @endif">
                                        <a class="nav-link" href="/accueil">Accueil</a>
                                    </li>
                                    <li class="nav-item  @if (Request::is('articles*')) active @endif">
                                        <a class="nav-link" href="/articles">Articles</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="category.html">Galerie</a>
                                    </li> --}}
                                    <li class="nav-item @if (Request::is('a-propos*')) active @endif">
                                        <a class="nav-link" href="/a-propos">A Propos</a>
                                    </li>

                                    <li class="nav-item @if (Request::is('contact*')) active @endif">
                                        <a class="nav-link" href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- header buttons -->
                            <div class="header-buttons">
                                <button class="search icon-button">
                                    <i class="icon-magnifier"></i>
                                </button>
                                <button class="burger-menu icon-button ms-2 float-end float-lg-none">
                                    <span class="burger-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>

        </header>

        @yield('page-header')


        <!-- section main content -->
        @yield('main-content')

        <!-- instagram feed -->
        {{-- <div class="instagram">
            <div class="container-xl">
                <!-- button -->
                <!-- <a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a> -->
                <!-- images -->
                <div class="instagram-feed d-flex flex-wrap">
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-1.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-2.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-3.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-4.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-5.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-6.jpg" alt="insta-title" />
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2022 Vote Utile.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>

                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i
                                    class="icon-arrow-up"></i>Défilez vers le haut</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Appuyer ESC pour fermer</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form" action="/recherche" method="POST">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Saisir la recherche et valider ..."
                    aria-label="Search" name="search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('katen/images/logo.png') }}" alt="Katen" />
        </div>

        <!-- menu -->

        <nav>
            <ul class="vertical-menu">
                <li class="@if (Request::is('accueil*')) active @endif">
                    <a href="/accueil">Acueil</a>
                </li>
                <li class="@if (Request::is('articles*')) active @endif"><a href="/articles">Articles</a></li>
                <li class="@if (Request::is('a-propos*')) active @endif"><a href="/a-propos">A Propos</a></li>
                <li class="@if (Request::is('contact*')) active @endif"><a href="/contact">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="/admin-articles"><i class="fa fa-gear"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('katen/js/jquery.min.js') }}"></script>
    <script src="{{ asset('katen/js/popper.min.js') }}"></script>
    <script src="{{ asset('katen/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('katen/js/slick.min.js') }}"></script>
    <script src="{{ asset('katen/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('katen/js/custom.js') }}"></script>
    <style>
        * {
          -webkit-user-select: none;
          -webkit-touch-callout: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;

        }
      </style>
    <script type="text/javascript">
        //<!--
            document.oncontextmenu = new Function("return false");
        //-->
        </script>
    <script>
        $('.carousel').carousel()
    </script>


</body>

</html>
