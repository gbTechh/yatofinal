document.addEventListener('DOMContentLoaded', function () {
  const swiper = new Swiper('.categories-slider', {
    effect: 'coverflow',
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 0,
      modifier: 1,
      slideShadows: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
      },
      740: {
        slidesPerView: 2,
      },
      1130: {
        slidesPerView: 3,
      },
      1440: {
        slidesPerView: 4,
      },
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
  });
  
});
