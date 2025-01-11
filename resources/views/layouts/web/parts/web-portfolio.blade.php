<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Projetos</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Todos</li>
                <li data-filter=".filter-web">Desenvolvimento Web</li>
                <li data-filter=".filter-analise">Análise de dados</li>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                @foreach($user->projects as $project)
                    @if($project->category == "Desenvolvedor")
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-web">
                            <img src="{{ asset('storage/'. $project->cover)}}"
                                 class="img-fluid border border-dark-subtle" alt="{{ $project->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $project->name }}</h4>
                                <a href="{{ route('project.show', $project->id) }}">Detalhes do projeto<i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    @elseif($project->category == "Analista")
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-analise">
                            <img src="{{ asset('storage/'. $project->cover)}}"
                                 class="img-fluid border border-dark-subtle" alt="{{ $project->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $project->name }}</h4>
                                <a href="{{ route('project.show', $project->id) }}">Detalhes do projeto<i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endif
                @endforeach
            </div><!-- End Portfolio Container -->
        </div>
    </div>
</section><!-- /Portfolio Section -->
