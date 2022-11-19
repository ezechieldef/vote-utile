<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group my-2">
            {{ Form::label('titre') }}
            {{ Form::text('titre', $categorie->titre, ['class' => 'form-control' . ($errors->has('titre') ? ' is-invalid' : ''), 'placeholder' => 'Titre']) }}
            {!! $errors->first('titre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group my-2">
            {{ Form::label('description') }}
            {{ Form::text('description', $categorie->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success text-bold text-white w-100">Soumettre</button>
    </div>
</div>
