@extends('layouts.app')

@section('titre')
     Détail Categorie
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="float-left">
                            <span class="card-title">Détail Categorie</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin-categories.index') }}"> Retour</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group my-2">
                            <strong>Titre:</strong>
                            <input type="text" value="{{ $categorie->titre }}" class="form-control" readonly/>
                        </div>
                        <div class="form-group my-2">
                            <strong>Description:</strong>
                            <input type="text" value="{{ $categorie->description }}" class="form-control" readonly/>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
