@extends('layouts.app')

@section('titre')
    Modifier Categorie
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header d-flex justify-content-between">
                        <span class="card-title">Formulaire Modification Categorie</span>
                        <div class="float-right">
                                <a href="{{ route('categories.index') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Retour
                                </a>
                              </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', $categorie->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('categorie.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
