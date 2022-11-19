@extends('public.template_ml_gauche')
@section('head')
    <meta name="DESCRIPTION" content="Meilleur site d'infos en continu au Bénin à l'endroit des élections">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('articles') }}" />
    <meta property="og:title" content="Découvrez nos derniers articles | Vote-Utile site d'infos socio-politique" />
    <meta property="og:image" content="{{ asset('katen/images/logo.png') }}" />
@endsection
@section('page-header')
    @if (Request::is('categorie/*'))
        <section class="page-header">
            <div class="container-xl">
                <div class="text-center">
                    <h1 class="mt-0 mb-2">Catégorie : {{ $categ->titre }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    @elseif(Request::is('recherche*'))
        <section class="page-header">
            <div class="container-xl">
                <div class="text-center">
                    <h1 class="mt-0 mb-2">Résultat de la recherche : {{ request()->all()['search'] ?? '' }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    @else
        <section class="page-header">
            <div class="container-xl">
                <div class="text-center">
                    <h1 class="mt-0 mb-2">Articles Classé par catégorie</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>
    @endif
@endsection
@section('content')
    <div class="row gy-4">

        @forelse ($articles as $art)
            <div class="col-sm-6">
                <!-- post -->
                <div class="post post-grid rounded bordered">
                    <div class="thumb top-rounded">
                        <a href=""
                            class="category-badge position-absolute">{{ $art->categorie()->first()->titre }}</a>
                        <span class="post-format">
                            <i class="icon-picture"></i>
                        </span>
                        <a href="{{ route('article-reading', $art->code) }}">
                            <div class="inner">
                                <img src="{{ asset(Storage::url($art->url_image)) }}" alt="image" />
                            </div>
                        </a>
                    </div>
                    <div class="details">
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="#">{{ $art->lectures()->count() }} Lecture(s)</a>
                            </li>
                            <li class="list-inline-item">{{ date('d M Y', strtotime($art->date)) }}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><a href="/articles/{{ $art->code }}">{{ $art->titre }}</a>
                        </h5>
                        <p class="excerpt mb-0">{!! substr(strip_tags($art->contenu), 0, 100) !!}...</p>
                    </div>
                    <div class="post-bottom clearfix d-flex align-items-center">
                        <div class=""></div>
                        {{-- <div class="social-share me-auto">
                            <button class="toggle-button icon-share"></button>
                            <ul class="icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                            </ul>
                        </div> --}}
                        <div class="more-button float-end">
                            <a href="/articles/{{ $art->code }}"><span class="icon-options"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body text-center py-5">
                    <div class="h3 text-dark">Aucune correspondance</div>
                    <p>Nous n'avons trouvé aucun résultat à votre recherche</p>
                    <a href="/articles" class="btn btn-success"> Voir tous les articles</a>
                </div>
            </div>
        @endforelse


    </div>
    {{-- {!! $articles->links() !!} --}}
    @if (count($articles) != 0 && !Request::is('recherche*'))
        <nav>
            <ul class="pagination justify-content-center">

                @for ($i = 1; $i <= $articles->lastPage(); $i++)
                    <li class="page-item @if ($articles->currentPage() == $i) active @endif">
                        <a class="page-link" href="{{ $articles->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

            </ul>
        </nav>
    @endif

@endsection
