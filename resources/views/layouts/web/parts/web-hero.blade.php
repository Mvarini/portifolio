<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

    <img src="{{ Vite::asset('resources/images/neon.jpg') }}" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center justify-content-center text-center"
         data-aos="fade-up" data-aos-delay="100">
        <h2>Eu sou {{ $user->name }}</h2>
        <p><span class="typed" data-typed-items="Analista de dados, Desenvolvedor Junior"></span></p>
    </div>

</section><!-- /Hero Section -->
