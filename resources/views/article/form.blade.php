<script>
    function coder(titre) {
        var t= titre.value.replaceAll(/[^a-zA-Z\d:\s]/gi, '_');
        t=t.replaceAll(' ','_');
        t=t.replaceAll('__','_');
        document.getElementById('codeset').value=t;
    }
</script>
<div class="box box-info padding-1">
    <div class="row">
        <div class="col-md-4 col-12 my-2">
            {{ Form::label('auteur') }}
            {{ Form::text('auteur', Auth::user()->name, ['readonly'=>'readonly', 'class' => 'form-control' . ($errors->has('auteur') ? ' is-invalid' : ''), 'placeholder' => 'Auteur']) }}
            {{ Form::text('auteur', Auth::user()->id, ['class' => 'hide form-control' . ($errors->has('auteur') ? ' is-invalid' : ''), 'placeholder' => 'Auteur']) }}
            {!! $errors->first('auteur', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-4 col-12 my-2">
            {{ Form::label('status') }}
            {{ Form::select('isActive', [true=>'Actif', false=>'Non Visible par le public' ], $article->isActive, ['class' => 'form-select' . ($errors->has('isActive') ? ' is-invalid' : ''),]) }}
            {!! $errors->first('isActive', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-4 col-12 my-2">
            {{ Form::label('categorie') }}
            {{ Form::select('categorie_id', \App\Models\Categorie::pluck('titre','id'), $article->categorie_id, ['class' => 'form-select' . ($errors->has('categorie_id') ? ' is-invalid' : ''), 'placeholder' => '-- Sélectionner --']) }}
            {!! $errors->first('categorie_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="col-md-9 col-12 my-2">
            {{ Form::label('titre') }}
            {{ Form::text('titre', $article->titre, ['class' => 'form-control' . ($errors->has('titre') ? ' is-invalid' : ''), 'onchange'=>'coder(this);', 'placeholder' => 'Titre de votre article']) }}
            {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-3 col-12 my-2">
            {{ Form::label('date') }}
            {{ Form::date('date',( $article->date ?? date('d/m/Y')), ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-4 col-12 my-2">
            {{ Form::label('image') }}
            {{ Form::text('url_image', $article->url_image, ['class' => 'form-control hide ' . ($errors->has('url_image') ? ' is-invalid' : ''), 'accept'=>"image/*", 'placeholder' => 'Url Image']) }}
            {{ Form::file('url_image', ['class' => 'form-control' . ($errors->has('url_image') ? ' is-invalid' : ''), 'accept'=>"image/*", 'placeholder' => 'Url Image']) }}
            {!! $errors->first('url_image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="col-md-8 col-12 my-2">
            {{ Form::label('tags') }}
            {{ Form::text('tags', $article->tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Tags']) }}
            {!! $errors->first('tags', '<div class="invalid-feedback">:message</div>') !!}
            <small class="text-info">
                <i class="fa fa-info me-2"></i> Écrivez les tags (mots clé) de l'article séparés par des point virgules ( <strong>;</strong> )
            </small>
        </div>

        <div class="col-md-12 col-12 my-2">
            {{ Form::label('code') }}
            {{ Form::text('code', $article->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'id'=>'codeset', 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
            <small class="">
                <i class="fa fa-info me-2"></i> Ce code apparaitra dans le lien de l'article pour l'identifier
            </small>
        </div>

        <div class="col-md-12 col-12 my-2">
            {{ Form::label('contenu') }}
            {{ Form::textarea('contenu', $article->contenu, ['class' => 'form-control ' . ($errors->has('contenu') ? ' is-invalid' : ''), 'placeholder' => 'Écrivez le contenu de votre article votre article ici...']) }}
            {!! $errors->first('contenu', '<div class="invalid-feedback">:message</div>') !!}
        </div>





    </div>
    <div class="box-footer mt20 mt-3">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
