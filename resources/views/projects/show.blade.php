@extends('layouts.web.web-default')
@section('body-class', 'portfolio-details-page')
@section('content')

    @include('layouts.web.parts.web-header')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Detalhes do Projeto</h1>
            </div>
        </div><!-- End Page Title -->

        <!-- Portfolio Details Section -->
        <section id="portfolio" class="portfolio-details section">

            <div class="container" data-aos="fade-up">

                <div class="portfolio-details-slider swiper init-swiper">
                    <div class="swiper-wrapper align-items-center">

                        @foreach($project->galleries as $gallery)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $gallery->image) }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="row justify-content-between gy-4 mt-4">

                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="portfolio-description">
                            <h2>{{ $project->name }}</h2>
                            <p>
                                {!! $project->description !!}
                            </p>

                            <div class="testimonial-item">
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>Nunca desista quando o sofrimento e a insegurança estiverem no auge. Se for necessário bater em retirada, desista no momento em que as coisas estiverem fáceis, não difíceis.</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                                <div>
                                    <img src="{{ asset('storage/' . $project->user->image)}}"
                                         class="testimonial-img"
                                         alt="">
                                    <h3>{{ $project->user->name }}</h3>
                                    <h4>Analista de dados e Desenvolvedor Web</h4>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="portfolio-info">
                            <h3>Informações do projeto</h3>
                            <ul>
                                <li><strong>Categoria</strong>{{ $project->category }}</li>
                                <li><strong>Cliente</strong>{{ $project->client }}</li>
                                <li>
                                    <strong>Data</strong> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $project->date_at)->format('d/m/Y')  }}
                                </li>
                                @if(!$project->category == 'Analista')
                                    <li><strong>URL</strong> <a href="{{ $project->url }}"
                                                                target="_blank">{{ $project->name }}</a></li>
                                    <li><a href="{{ $project->url }}" target="_blank"
                                           class="btn-visit align-self-start">Visitar
                                            Projeto</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Portfolio Details Section -->

        @include('layouts.web.parts.web-footer')
    </main>
@endsection

