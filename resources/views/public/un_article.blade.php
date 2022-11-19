@extends('public.template_ml_droite')
@section('head')

<meta charset="utf-8">

<meta name="KEYWORDS" content="{{ str_replace(';',',', $article->tags) }}">
<meta name="description" content="{!! substr(strip_tags($article->contenu), 0, 100) !!}">

<!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->

<meta property="og:type" content="article">
<meta property="og:url"
      content="{{ route('article-reading', $article->code) }}"/>
<meta property="og:title" content="{{ $article->titre }}"/>
<meta property="og:image" content="{{ asset(Storage::url($article->url_image)) }}"/>
{{-- <meta property="og:image:width" content="{{ dd(getimagesize(asset(Storage::url($article->url_image))))  }}">
<meta property="og:image:height" content="{{ imagesy(Storage::path($article->url_image)) }}">
<meta property="og:image:type" content="{{ getimagesize(Storage::path($article->url_image))['mime'] }}"> --}}
<!-- END - Facebook Open Graph and Twitter Card Tags 2.0.8.1 -->

<meta property="og:url" content="{{ route('article-reading', $article->code) }}" />
<meta property="og:title" content="{{ $article->titre }}" />
<meta property="og:image" content="{{ asset(Storage::url($article->url_image)) }}" />



@endsection
@section('page-header')
    <section class="single-cover data-bg-image" data-bg-image="{{ asset(Storage::url($article->url_image)) }}">

        <div class="container-xl">

            <div class="cover-content post">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->titre }}</li>
                    </ol>
                </nav>

                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">{{ $article->titre }}</h1>
                    <ul class="meta list-inline mb-0">

                        <li class="list-inline-item"><a href="#">{{ $article->lectures()->count() }} Lecture(s)</a></li>
                        <li class="list-inline-item"><a href="#">{{ $article->categorie()->first()->titre }}</a></li>
                        <li class="list-inline-item">{{ date('d M Y', strtotime($article->date)) }}</li>
                    </ul>
                </div>
            </div>

        </div>

    </section>
@endsection
@section('content')
    <div class="post post-single">
        <!-- post content -->
        <div class="post-content clearfix">
            {{-- <div class="border my-3">
                <div class="card-body">
                    <p> --}}
            {!! htmlspecialchars_decode($article->contenu) !!}
            {{-- </p>
                </div>
            </div> --}}
        </div>
        <!-- post bottom section -->
        <div class="post-bottom">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 col-12 text-center text-md-start">
                    <!-- tags -->
                    @foreach (explode(';', $article->tags) as $tag)
                        <a href="#" class="tag">{{ $tag }}</a>
                    @endforeach

                </div>
                <div class="col-md-6 col-12">
                    <!-- social icons -->
                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>

                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <div class="spacer" data-height="50"></div>

    <!-- section header -->
    <div class="section-header">
        <h3 class="section-title">Commentaires ({{ $article->commentaires()->count() }})</h3>
        <img src="{{ asset('katen/images/wave.svg') }}" class="wave" alt="wave" />
    </div>
    <!-- post comments -->
    <div class="comments bordered padding-30 rounded">

        <ul class="comments">
            <!-- comment item -->
            @foreach ($article->commentaires()->get() as $comment)

            <li class="comment rounded">
                <div class="thumb">
                    <img src="{{ asset('katen/images/other/comment-1.png') }}" alt="" />
                </div>
                <div class="details">
                    <h4 class="name"><a href="#">{{ $comment->nom }}</a></h4>
                    <span class="date">{{ date('d M Y à H:i', strtotime($comment->created_at)) }} </span>
                    <p>{{ $comment->commentaire }}</p>

                    @if($comment->IP == request()->ip || !is_null(Auth::user()->id ?? null ))

                    <a href="/supprimer-commentaire/{{ $comment->id }}" class="btn btn-default btn-sm">Supprimer mon commentaire</a>
                    @endif

                </div>
            </li>
            @endforeach

        </ul>
    </div>

    <div class="spacer" data-height="50"></div>

    <!-- section header -->
    <div class="section-header">
        <h3 class="section-title">Laisser un Commentaire</h3>
        <img src="{{ asset('katen/images/wave.svg') }}" class="wave" alt="wave" />
    </div>
    <!-- comment form -->
    <div class="comment-form rounded bordered padding-30">

        <form id="comment-form" class="comment-form" method="post" action="/articles/{{ $article->id }}/commenter">

            <div class="messages"></div>

            <div class="row">
@csrf
                <div class="column col-md-12">
                    <!-- Comment textarea -->
                    <div class="form-group">
                        <textarea name="commentaire" id="commentaire" class="form-control" rows="4" placeholder="Votre commentaire ..."
                            required="required"></textarea>
                        {!! $errors->first('commentaire', '<div class="invalid-feedback">:message</div>') !!}

                    </div>
                </div>


                <div class="column col-md-6">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre Nom & Prénoms"
                            required="required">
                        {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}

                    </div>
                </div>
                <div class="column col-md-6">
                    <!-- Email input -->
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse Email"
                            required="required">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}

                    </div>
                </div>



            </div>

            <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Soumettre</button>
            <!-- Submit Button -->

        </form>
    </div>
@endsection
