@extends('layouts.app')

@section('titre')
    Modifier Article
@endsection


@section('script')
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire Modification Article</span>
                        <div class="float-right">
                                <a href="{{ route('admin-articles.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin-articles.update', $article->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('article.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
