document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.home-header-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    navigation: {
      nextEl: '.services-slider .swiper-button-next',
      prevEl: '.services-slider .swiper-button-prev',
    },
    breakpoints: {
      1024: {
        slidesPerView: 1,
        spaceBetween: 0
      }
    },
    autoplay: {
      delay: 3800,
      disableOnInteraction: false,
    },
  });

});