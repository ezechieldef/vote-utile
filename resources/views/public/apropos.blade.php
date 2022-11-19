@extends('public.template_ml_droite')
@section('page-header')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">A Propos de Nous
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">A Propos de Nous</li>
                        </ol>
                    </nav>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div class="page-content bordered rounded padding-30">

        <img src="{{ asset('katen/images/logo.png') }}" alt="Katen Doe" class="rounded mb-4" />

        {{-- <p>A votre service, Nous sommes un groupe de rédacteur de contenu, ayant pour objectif de mettre les idées au clair.
            Nous avons pour propre de mettre la lumière sur des sujets politiques principalement à l'endroit <strong>des
                élections</strong> , afin que vous puissiez voter ayant les idées claire pour bien public au Bénin</p> --}}
        <p>
            <center> Bienvenue sur <strong> VOTE UTILE </strong> </center>

            VOTE UTILE est votre web journal qui est né de la volonté d’un groupe dynamique de jeunes <strong> BENINOIS
            </strong>
            de rédacteurs de contenus <strong> sociaux politique</strong>. Ce média met à votre disposition toutes les
            <strong> actualités</strong>
            politiques du Bénin en temps et en heure.

            À travers nos analyses, nous vous offrons des contenus originaux et de qualité qui
            vous permettrons d’avoir des idées claires sur les enjeux sociaux-politiques de notre nation.

            Si vous cherchez quelque chose de nouveau, vous êtes au bon endroit.
            Notre mission est de tout faire pour mettre la lumière sur les sujets politiques principalement à l’endroit des
            élections.
            Ceci vous permettra de d’exercer votre de droit de citoyenneté avec les idées claires.
        </p>
        <hr class="my-4" />
        <ul class="social-icons list-unstyled list-inline mb-0">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        </ul>

    </div>
@endsection
