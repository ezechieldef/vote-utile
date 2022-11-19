@extends('layouts.app')

@section('titre')
    Liste Categorie
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorie') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin-categories.create') }}" class="btn btn-warning text-dark btn-sm float-right"  data-placement="left">
                                  Nouveau
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Titre</th>
										<th>Description</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $categorie)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $categorie->titre }}</td>
											<td>{{ $categorie->description }}</td>

                                            <td>
                                                <form action="{{ route('admin-categories.destroy',$categorie->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-info text-white " href="{{ route('admin-categories.show',$categorie->id) }}"><i class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white" href="{{ route('admin-categories.edit',$categorie->id) }}"><i class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-white show_confirm2"><i class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
