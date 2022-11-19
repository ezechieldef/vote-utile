@extends('layouts.app')

@section('titre')
    Liste Article
@endsection

@section('content')
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Article') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin-articles.create') }}"
                                    class="btn btn-warning text-dark btn-sm float-right" data-placement="left">
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

                                        <th>Image</th>
                                        <th>Titre</th>
                                        {{-- <th>Contenu</th> --}}

                                        <th>Tags</th>
                                        <th>Auteur</th>
                                        <th>Categorie </th>
                                        <th>Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                <img src="{{ asset(Storage::url($article->url_image)) }}"
                                                    style="max-width: 70px;" alt="">
                                            </td>

                                            <td class="{{ $article->isActive ? 'text-dark' : 'text-muted' }} fw-bold">
                                                {{ $article->titre }}
                                                @if (!$article->isActive)
                                                    <br><small class="text-danger"> <i class="fa fa-circle-info fs-4"></i>
                                                        Ce article est désactivé </small>
                                                @endif
                                            </td>
                                            {{-- <td> <textarea name="" id="" rows="4" readonly>{{ $article->contenu }} </textarea>

                                            </td> --}}
                                            <td>
                                                @foreach (explode(';', $article->tags) as $tag)
                                                    <button
                                                        class="btn btn-sm btn-light my-1 shadow">{{ $tag }}</button>
                                                @endforeach
                                            </td>
                                            <td>{{ \App\Models\User::find($article->auteur)->name }}</td>
                                            <td>{{ \App\Models\Categorie::find($article->categorie_id)->titre }}</td>
                                            <td>{{ $article->date }}</td>

                                            <td>
                                                <form action="{{ route('admin-articles.destroy', $article->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-info text-white "
                                                        href="{{ route('admin-articles.show', $article->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Voir</a>
                                                    <a class="btn btn-sm btn-success text-white"
                                                        href="{{ route('admin-articles.edit', $article->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Modifier</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm text-white show_confirm2"><i
                                                            class="fa fa-fw fa-trash"></i> Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
@endsection
