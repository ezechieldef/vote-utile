@extends('layouts.app')

@section('titre')
     Détail Article
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Article</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin-articles.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group my-2">
                            <strong>Lien:</strong>
                            <input type="text" value="{{ route('article-reading',$article->code ) }}" class="form-control" readonly/>
                        </div>
                        <div class="d-flex justify-content-between">

                           <p>Catégorie : <strong class="text-capitalize text-primary">{{ $article->categorie()->first()->titre }}</strong></p>
                            <div class="d-flex align-items-center">

                            <strong class="text-dark">Tags / Mots clé : </strong>
                            <div class="my-2 mx-2">
                                @foreach (explode(';',$article->tags) as $tag)
                                    <button class="btn  btn-outline-primary shadow-sm me-2 fw-bold">{{ $tag }}</button>
                                @endforeach
                            </div>
                        </div>
                        </div>

                        <div class="form-group my-2 text-center">

                            <img src="{{ asset(Storage::url($article->url_image)) }}" alt="">
                            {{-- <input type="text" value="{{  }}" class="form-control" readonly/> --}}
                        </div>
                        <h2 class="text-center my-3">{{ $article->titre }}</h2>
                        <div class="text-end text-muted">
                            Écrit le <span class="text-info fw-bold">{{ $article->date }}</span> par <span class="text-info fw-bold">{{ \App\Models\User::find($article->auteur)->name }}</span>
                        </div>
                        {{-- <div class="form-group my-2">
                            <strong>Titre:</strong>
                            <input type="text" value="{{ $article->titre }}" class="form-control" readonly/>
                        </div> --}}
                        {{-- <div class="form-group my-2">
                            <strong>Date:</strong>
                            <input type="text" value="{{ $article->date }}" class="form-control" readonly/>
                        </div> --}}

                        <div class="form-group my-2">

                            <div class="border my-3">
                                <div class="card-body">
                                    <p>
                                        {!! (htmlspecialchars_decode( $article->contenu)) !!}
                                    </p>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
