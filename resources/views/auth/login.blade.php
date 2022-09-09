@extends('layouts.base')

@section('main')
<section class="section-login">
    <div class="grid-container">
        <h1>Connexion</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Adresse e-mail</label>
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password">Mot de passe</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label for="remember">Se souvenir de moi</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">Se connecter</button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
