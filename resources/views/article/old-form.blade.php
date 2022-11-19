<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group my-2">
            {{ Form::label('titre') }}
            {{ Form::text('titre', $article->titre, ['class' => 'form-control' . ($errors->has('titre') ? ' is-invalid' : ''), 'placeholder' => 'Titre']) }}
            {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('date') }}
            {{ Form::text('date', $article->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('contenu') }}
            {{ Form::text('contenu', $article->contenu, ['class' => 'form-control' . ($errors->has('contenu') ? ' is-invalid' : ''), 'placeholder' => 'Contenu']) }}
            {!! $errors->first('contenu', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('url_image') }}
            {{ Form::text('url_image', $article->url_image, ['class' => 'form-control' . ($errors->has('url_image') ? ' is-invalid' : ''), 'placeholder' => 'Url Image']) }}
            {!! $errors->first('url_image', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('code') }}
            {{ Form::text('code', $article->code, ['class' => 'form-control' . ($errors->has('code') ? ' is-invalid' : ''), 'placeholder' => 'Code']) }}
            {!! $errors->first('code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('tags') }}
            {{ Form::text('tags', $article->tags, ['class' => 'form-control' . ($errors->has('tags') ? ' is-invalid' : ''), 'placeholder' => 'Tags']) }}
            {!! $errors->first('tags', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('auteur') }}
            {{ Form::text('auteur', $article->auteur, ['class' => 'form-control' . ($errors->has('auteur') ? ' is-invalid' : ''), 'placeholder' => 'Auteur']) }}
            {!! $errors->first('auteur', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('categorie_id') }}
            {{ Form::text('categorie_id', $article->categorie_id, ['class' => 'form-control' . ($errors->has('categorie_id') ? ' is-invalid' : ''), 'placeholder' => 'Categorie Id']) }}
            {!! $errors->first('categorie_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
