@extends('layouts.base')

@section('main')
<section class="section-login">
    <div class="grid-container">
        <h1>Inscription</h1>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" >Pseudo</label>
                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email">Adresse e-mail</label>
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="avatar">Avatar</label>
                <div>
                    <input id="avatar" type="file" name="avatar">
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="password-confirm">Confirmation du mot de passe</label>
                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div>
                <div>
                    <button type="submit">S'inscrire</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
