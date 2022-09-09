@extends('layouts.base')

@section('main')
<section class="section-email">
    <div class="grid-container">
        <h1>Réinitialisation du mot de passe</h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <label for="email" class="col-md-4 col-form-label text-md-end">Adresse e-mail</label>
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
                <div>
                    <button type="submit">Envoyer le lien de réinitialisation du mot de passe</button>
                </div>
            </div>
            </form>
        </div>
</section>
@endsection
