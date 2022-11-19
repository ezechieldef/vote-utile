@extends('auth.template')

@section('content')
    <form method="POST" action="{{ route('register') }}" role="form" class="text-start">
        @csrf

        <div class="bg-success text-white text-center text-bold p-3 mb-4" style="margin-top: -60px; border-radius:10px;">
            <h3 class="text-white">Inscription</h3>

        </div>
        <div class="row">
            {{ $errors }}
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Nom et Prénoms</label>

                <input id="name" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Email</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Nouveau Mot De Passe</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password"
                     pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$"
                    title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )"
                    minlength="8">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12 text-start my-2">
                <label for="" class="text-dark text-bold">Confirmer Mot De Passe</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;*_=+-]).{8,12}$" title="Doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un symbole ( ! @ # $ % ^ &amp; * _ = + - )" minlength="8">


            </div>

            <div class="col-12 text-start my-2">

                <button type="submit" class="btn btn-success w-100  mb-2 text-white text-bold ">S'inscrire</button>
            </div>
            <div class="d-flex justify-content-around align-items-center w-100">

                <div><a href="/login" class="mt-4 text-sm text-center text-bold">Avez vous déjà un compte
                        ?</a></div>
            </div>

        </div>



    </form>
@endsection
