import Swiper from 'swiper';
import {Navigation, Pagination, Autoplay} from 'swiper/modules';

document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
});
