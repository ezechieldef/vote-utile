@extends('public.template_ml_droite')
@section('page-header')
    <section class="hero-carousel">
        <div class="container-xl">
            <div class="post-carousel-lg">
                <!-- post -->
                @foreach ($articles as  $article)

                <div class="post featured-post-xl">
                    <div class="details clearfix">
                        <a href="/categorie/{{ $article->categorie()->first()->titre }}" class="category-badge lg">{{ $article->categorie()->first()->titre }}</a>
                        <h4 class="post-title"><a href="/articles/{{ $article->code }}">{{ $article->titre }}</a></h4>
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="#">{{ $article->lectures()->count() }} Lecture(s)</a></li>
                            <li class="list-inline-item">{{ date('d M Y', strtotime($article->date)) }}</li>
                        </ul>
                    </div>
                    <a href="/articles/{{ $article->code }}">
                        <div class="thumb rounded">
                            <div class="inner data-bg-image" data-bg-image="{{ asset(Storage::url($article->url_image)) }}"></div>
                        </div>
                    </a>
                </div>
                @endforeach



            </div>
        </div>
    </section>
@endsection
@section('content')
    @foreach (\App\Models\Article::populaire4() as $art)
        <!-- post -->
        <div class="post post-classic rounded bordered">
            <div class="thumb top-rounded">
                <a href="/categorie/{{ $art->categorie()->first()->titre }}"
                    class="category-badge lg position-absolute">{{ $art->categorie()->first()->titre }}</a>
                <span class="post-format">
                    <i class="icon-picture"></i>
                </span>
                <a href="/articles/{{ $art->code }}">
                    <div class="inner">
                        <img src="{{ asset(Storage::url($art->url_image)) }}" style="width: 100%" alt="post-title" />
                    </div>
                </a>
            </div>
            <div class="details">
                <ul class="meta list-inline mb-0">
                    <li class="list-inline-item">{{ $art->lectures()->count() }} Lecture(s)</a></li>
                    <li class="list-inline-item">{{ date('d M Y', strtotime($art->date)) }}</li>
                    <li class="list-inline-item"><i class="icon-bubble"></i> {{ $art->commentaires()->count() }} Commentaires</li>
                </ul>
                <h5 class="post-title mb-3 mt-3"><a href="/articles/{{ $art->code }}">{{ $art->titre }}</a></h5>
                <p class="excerpt mb-0">{!! substr(strip_tags($art->contenu), 0, 100) !!}... </p>
            </div>
            <div class="post-bottom clearfix d-flex align-items-center">
                <div class="social-share me-auto">
                    <button class="toggle-button icon-share"></button>
                    <ul class="icons list-unstyled list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                    </ul>
                </div>
                <div class="float-end d-none d-md-block">
                    <a href="/articles/{{ $art->code }}" class="more-link">Continuer la lecture<i class="icon-arrow-right"></i></a>
                </div>
                <div class="more-button d-block d-md-none float-end">
                    <a href="/articles/{{ $art->code }}"><span class="icon-options"></span></a>
                </div>
            </div>
        </div>
    @endforeach


@endsection
