<!-- Contact Section -->
<section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contato</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="info-wrap" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-5">
                <div class="col-lg-4">
                    <div class="info-item d-flex align-items-center">
                        <a href="https://wa.me/5517981649101" target="_blank"> <i
                                class="bi bi-whatsapp flex-shrink-0"></i>
                        </a>
                        <div>
                            <a href="https://wa.me/5517981649101" target="_blank"
                            ><h3>WhatsApp</h3>
                            </a>

                            <a href="https://wa.me/5517981649101" target="_blank"
                               class="phone_with_ddd">{{ $user->fone }}
                            </a>
                        </div>
                    </div>
                </div><!-- End Info Item -->
                <div class="col-lg-4">
                    <div class="info-item d-flex align-items-center">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Ligar</h3>
                            <p class="phone_with_ddd">{{ $user->fone }}</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4">
                    <div class="info-item d-flex align-items-center">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>E-mail</h3>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>
                </div><!-- End Info Item -->
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->
