<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            <div class="col-md-6">

                <div class="row justify-content-between gy-4">
                    <div class="col-lg-5">
                        <img src="{{ asset('storage/' . $user->image) }}" class="img-fluid"
                             alt="">
                    </div>
                    <div class="col-lg-7 about-info">
                        <p><strong>Nome: </strong> <span>{{ $user->name }}</span></p>
                        <p><strong>E-mail: </strong> <span>{{ $user->email }}</span></p>
                        <p><strong>Telefone: </strong> <span class="phone_with_ddd">{{ $user->fone }}</span></p>
                    </div>
                </div>

                <div class="skills-content skills-animation">

                    <h5>Habilidades</h5>

                    @foreach($user->skills as $skill)
                        <div class="d-inline-block text-center pe-4">
                            <img width="40px" class="img-fluid"
                                 src="{{ asset('storage/' . $skill->image) }}"
                                 alt="{{ $skill->name }}"/>
                            <p class="fs-8">{{ $skill->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-me">
                    <h4>Sobre mim</h4>
                    <p>
                        "Olá, sou Marciel A. Varini, cientista da computação com uma paixão por desenvolvimento web.
                        Minha jornada, no entanto, tomou um rumo inesperado durante a pandemia, quando me aventurei pela
                        análise de dados. Essa experiência me proporcionou uma visão mais ampla do mundo da tecnologia e
                        despertou em mim um novo interesse.
                    </p>
                    <p>
                        Com o objetivo de me tornar um profissional multidisciplinar, busco constantemente
                        novos desafios e oportunidades de aprendizado. Acredito que a combinação de desenvolvimento web
                        e análise de dados é fundamental para criar soluções inovadoras e impulsionar o crescimento de
                        negócios.
                    </p>
                </div>
            </div>
        </div>

    </div>

</section><!-- /About Section -->
