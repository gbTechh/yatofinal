document.addEventListener('DOMContentLoaded', function () {
  const header = document.querySelector('.main-header'); 
 
  // Función para manejar el scroll del header
  window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 50) {
      header.classList.add('bg-white')
      header.querySelectorAll('nav').forEach(element => {
        element.style.color = '#000'
      });
    } else {
      header.classList.remove('bg-white')
      header.querySelectorAll('nav').forEach(element => {
        element.removeAttribute("style");
      });
    }

    lastScroll = currentScroll;
  });

})

