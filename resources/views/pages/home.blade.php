@extends('layouts.base', ['title' => 'Home'])
@section('main')
    <section class="section-one">
        <div class="grid-container">
            <img src="">
            <div class="grid-x align-center medium-up-2 large-up-4 text-center">
                <div class="cell grid-y">
                    <h3>Nos chiffres-clés</h3>
                    <span>L’activité de la Mission Locale Nord en 2020, c’est</span>
                </div>
                <div class="cell grid-y">
                    <span class="count" data-stop="12749">12749</span>
                    <span>jeunes accompagnés</span>
                </div>
                <div class="cell grid-y">
                    <span class="count" data-stop="1795">1795</span>
                    <span>en emploi</span>
                </div>
                <div class="cell grid-y">
                    <span class="count" data-stop="1372">1372</span>
                    <span>en formation</span>
                </div>
            </div>
        </div>
    </section>
    <section class="section-two text-center">
        <div class="grid-container">
            <h3>Restez informé(e)</h3>
            <h2>Les actualités</h2>
            <p>Suivez toutes les actualités qui vous concernent : événements, informations, …</p>
            <div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($news as $new)
                        <div class="swiper-slide">
                            <div class="item grid-y">
                                <img src="https://cdn-images-1.medium.com/max/800/0*oGBtjYlPplnySOLb.jpg" alt="">
                                <h3>{{ $new->title }}</h3>
                                <p>{{ Str::limit($new->body, 60) }}</p>
                                <a href="{{ Route('news') }}/{{ $new->slug }}">En savoir plus</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-three text-center">
        <h2>Nos dernières offres d'emploi</h2>
        <div></div>
        <a href="">Voir toutes nos offres</a>
    </section>
    <section class="section-four">
        <div class="grid-container">
            <div class="grid-x medium-up-3">
                <div class="cell"><img src="{{ asset('/images/france-relance.svg') }}"></div>
                <div class="cell">
                    <p>Retrouvez des offres d’emploi sur la plate-forme 1jeune1solution !</p>
                    <a href="">Accéder au site</a>
                </div>
                <div class="cell">
                    <p>Découvrez les aides auxquelles vous avez droits avec le simulateur.</p>
                    <a href="">Accéder au simulateur</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-five text-center">
        <div class="grid-container">
            <h3>Notre mission ?</h3>
            <h2>Vous accompagner au quotidien</h2>
            <div class="grid-x medium-up-2 large-up-3">
                @foreach ($missions as $mission)
                <div class="cell flip-card card" ontouchstart="this.classList.toggle('hover');">
                    <div class="flip-card-inner">
                      <div class="flip-card-inner-front">
                        <span>{{ $mission->title }}</span>
                      </div>
                      <div class="flip-card-inner-back">
                        <h3 class="flip-card-inner-back-title">{{ $mission->title }}</h3>
                        <p class="flip-card-inner-back-text">{{ $mission->body }}</p>
                        <a href="#" class="button success">En savoir plus</a>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="section-six text-center">
        <div class="grid-container">
            <h3>Nos financeurs</h3>
            <h2>Ils soutiennent la Mission locale nord</h2>
                {{-- <div><img src="{{ asset('/images/logo.png')}}"></div> --}}
            <div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($funders as $funder)
                        <div class="swiper-slide">
                            <div class="item">
                                <img src="{{ $funder->image}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
@endsection