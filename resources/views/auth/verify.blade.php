@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifiez votre adresse e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">Un lien de vérification a été envoyé vers votre boite e-mail
                        </div>
                    @endif
                    Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification.
                    Si vous n'avez pas reçu l'e-mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Cliquez-ici pour le renvoyer</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
