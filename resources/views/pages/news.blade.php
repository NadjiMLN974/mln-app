@extends('layouts.base')
@section('main')
    @if(Route::is('news'))
    <section class="section-page-actus">
        <div class="grid-container">
            <div class="grid-x">
                @foreach ($news as $new)
                <div class="cell card" style="width: 300px;">
                    <img src="{{ asset('/images/header.jpeg') }}">
                    <div class="card-section">
                        <h4>{{ $new->title }}</h4>
                        <p>{{ Str::limit($new->body, 150) }}</p>
                        <a href="{{ Route('news') }}/{{ $new->slug }}">En savoir plus</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">{{ $news->links() }}</div>
        </div>
    </section>
    @else
    <section class="section-page-actu">
        <div style="background-image: url('{{ asset('/images/header.jpeg') }}'); background-size: cover; background-position: center;">
            <div style="background-color: rgba(0,0,0,.5);">
                 @foreach ($new as $new)
                 <h2 style="padding: 100px; color: white;">{{ $new->title }}</h2>
                 @endforeach
            </div>
        </div>
        <div class="grid-container" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="m-5">
                <p>{{ $new->body }}</p>
            </div>
        </div>
    </section>
    @endif
@endsection