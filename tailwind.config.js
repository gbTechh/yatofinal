/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./header.php", "./front-page.php", "./footer.php", "./page.php", "./page-nosotros.php","./page-fabricacion.php", "./page-categories.php", "./taxonomy-categoria_producto.php", "./single-producto.php", "./*.php", "./*/*.php", "./*/*/*.php", "./template-parts/*/*.php"],
  theme: {   
    extend: {    
      screens: {
        'hd': '985px',
      }, 
      fontSize: {
        'xs': ['0.75rem', { lineHeight: '1rem' }],
        'sm': ['0.875rem', { lineHeight: '1.25rem' }],
        'base': ['1rem', { lineHeight: '1.5rem' }],
        'lg': ['1.125rem', { lineHeight: '1.75rem' }],
        'xl': ['1.25rem', { lineHeight: '1.75rem' }],
        '2xl': ['1.5rem', { lineHeight: '2rem' }],
        '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
        '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
        '5xl': ['3rem', { lineHeight: '1' }],
      },
      colors: {
        bg:{
          primary: '#16A34A',
          primarydark: '#138F40', //#0E2207
          secondary: '#20B512',
          secondarysoft: '#1E8A15',
          gray: '#FAFAFA'
        },
        texto: {
          title: '#000',
          subtitle: '#000',
          paragraph: '#000',
          primary: '#ff1515',
          base: '#212121',     // Color para texto normal
          titulo: '#212121',   // Color para títulos
          link: '#212121',     // Color para enlaces
        },
      },
      fontFamily: {
        titillium: ['Noto Sans TC', 'serif'],
      },
    },
  },
  plugins: [
    function ({ addBase }) {
      addBase({
        // Mobile first
        'h1, .h1': {
          '@apply text-3xl font-bold': {},
        },
        'h2, .h2': {
          '@apply text-2xl font-bold': {},
        },
        'h3, .h3': {
          '@apply text-xl font-bold': {},
        },
        'h4, .h4': {
          '@apply text-lg font-bold': {},
        },
        'h5, .h5': {
          '@apply text-base font-bold': {},
        },
        'h6, .h6': {
          '@apply text-sm font-bold': {},
        },
        'p, .p': {
          '@apply text-sm': {},
        },
        'li, .li': {
          '@apply text-sm': {},
        },
        'a, .a': {
          '@apply text-sm': {},
        },
        'span, .span': {
          '@apply text-sm': {},
        },
        //COLORES
        'body': {
          '@apply text-texto-base': {},
        },
        'p, span, li, td, th, label, input, textarea': {
          '@apply text-texto-base': {},
        },
        'h1, h2, h3, h4, h5, h6': {
          '@apply text-texto-titulo': {},
        },
        'a': {
          '@apply text-texto-link hover:underline': {},
        },
        // Media queries usando las clases de Tailwind
        '@screen md': {
          'h1, .h1': {
            '@apply text-4xl': {},
          },
          'h2, .h2': {
            '@apply text-3xl': {},
          },
          'h3, .h3': {
            '@apply text-2xl': {},
          },
          'h4, .h4': {
            '@apply text-xl': {},
          },
          'h5, .h5': {
            '@apply text-lg': {},
          },
          'h6, .h6': {
            '@apply text-base': {},
          },
          'p, .p': {
            '@apply text-base': {},
          },
          'li, .li': {
            '@apply text-base': {},
          },
          'a, .a': {
            '@apply text-base': {},
          },
          'span, .span': {
            '@apply text-base': {},
          },
        },
        '@screen lg': {
          'h1, .h1': {
            '@apply text-5xl': {},
          },
          'h2, .h2': {
            '@apply text-4xl': {},
          },
          'h3, .h3': {
            '@apply text-3xl': {},
          },
          'h4, .h4': {
            '@apply text-2xl': {},
          },
          'h5, .h5': {
            '@apply text-xl': {},
          },
          'h6, .h6': {
            '@apply text-lg': {},
          },
          'p, .p': {
            '@apply text-base': {},
          },
          'li, .li': {
            '@apply text-base': {},
          },
          'a, .a': {
            '@apply text-base': {},
          },
          'span, .span': {
            '@apply text-base': {},
          },
        },
      });
    },
  ],
}

