<?php
/*
Template Name: Pagina de categorías
*/

get_header();

$categories = get_product_categories_with_fields();
?>

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
    $banner = get_field('banner');
?>
    <header class="relative h-[300px] overflow-hidden header-shadow">

      <!-- Fondo verde con patrón (parte izquierda) -->
      <div class="absolute inset-0 z-0">
        <!-- Fondo verde principal -->
        <div class="absolute inset-0 bg-gradient-to-br from-stone-100/70 via-green-50/35 to-stone-100/70">
          <!-- PATRÓN: Líneas diagonales suaves -->
          <div class="absolute inset-0 opacity-10" style="
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 4px, rgba(255,255,255,0.15) 4px, rgba(255,255,255,0.15) 8px);
        "></div>
        </div>

        <!-- Imagen con forma poligonal (parte derecha) -->
        <div class="absolute right-0 top-0 bottom-0 w-[65%] lg:w-[70%]">

          <!-- Eco 3 (más atrás, más transparente) -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.05) 0%, 
              rgba(0,0,0,0.02) 30%, 
              transparent 100%);
          transform: translateX(-100px);
      "></div>

          <!-- Eco 2 -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.08) 0%, 
              rgba(0,0,0,0.04) 30%, 
              transparent 100%);
          transform: translateX(-70px);
      "></div>

          <!-- Eco 1 -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.12) 0%, 
              rgba(0,0,0,0.06) 30%, 
              transparent 100%);
          transform: translateX(-40px);
      "></div>

          <!-- Imagen principal -->
          <div class="relative h-full w-full" style="
            clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
            border-radius: 0 0 0 0;
        ">
            <img
              src="<?= $banner["url"] ?>"
              alt="Fabricación"
              class="w-full h-full object-cover z-10 relative" />
            <!-- Overlay degradado -->
            <div class="absolute inset-0 bg-gradient-to-r from-bg-primary/40 via-bg-primary/15 to-transparent top-0 left-0 z-20"></div>
          </div>

        </div>
      </div>

      <!-- Contenido -->
      <div class="relative z-10 container mx-auto px-6 md:px-12 h-full ">
        <div class="grid grid-cols-1 lg:grid-cols-3 h-full items-center">

          <!-- Texto en parte izquierda -->
          <div class="">
            <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 ">CAtegorías</h1>
          </div>

          <!-- Imagen ocupa 2 columnas -->
          <div class="hidden lg:block lg:col-span-2"></div>

        </div>
      </div>

    </header>
    <main class="p-6 md:px-20 pt-16 pb-20 bg-gradient-to-b from-gray-50 to-white">
      <div class="w-full max-w-[1400px] mx-auto">


        <!-- Grid de categorías -->
        <section class="w-full">
          <?php if (!empty($categories)) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              <?php foreach ($categories as $index => $category) :
                $greenShades = [
                  'light' => 'from-green-50/50 to-green-50',
                  'medium' => 'from-green-100 to-emerald-100',
                  'dark' => 'from-green-200 to-emerald-200'
                ];
                $shade = $index % 3 === 0 ? $greenShades['light'] : ($index % 3 === 1 ? $greenShades['medium'] : $greenShades['dark']);
                $shade = $greenShades['light'];
              ?>
                <div class="group relative h-full">
                  <!-- Card principal -->
                  <div class="relative h-full bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-green-100">

                    <!-- Fondo gradiente verde suave -->
                    <div class="absolute inset-0 bg-gradient-to-br <?= $shade ?> opacity-60"></div>

                    <!-- Patrón de puntos decorativo -->
                    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#059669 1px, transparent 1px); background-size: 20px 20px;"></div>

                    <!-- Contenido -->
                    <div class="relative p-8">
                      <!-- Header -->
                      <div class="flex items-start justify-between mb-6">
                        <div class="flex-1">
                          <!-- Badge de cantidad -->
                          <!-- <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/80 backdrop-blur-sm border border-green-200 text-green-700 text-xs font-semibold mb-4">
                            <svg class="w-3 h-3 mr-2" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <?= esc_html($category->count) ?> productos disponibles
                          </div> -->

                          <!-- Título -->
                          <h2 class="text-2xl font-bold text-gray-800 group-hover:text-green-700 transition-colors duration-300 mb-2">
                            <?php echo esc_html($category->name); ?>
                          </h2>

                          <!-- Subtítulo -->
                          <p class="text-sm text-green-600 font-medium">
                            Categoría especializada
                          </p>
                        </div>

                        <!-- Imagen/Ícono -->
                        <?php if (isset($category->imagen)) : ?>
                          <div class="relative ml-4">
                            <div class="absolute -inset-3 bg-gradient-to-r from-green-100 to-emerald-200 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                            <div class="relative w-16 h-16 md:w-20 md:h-20 rounded-xl overflow-hidden border-3 border-white shadow-lg bg-white p-1">
                              <img class="w-full h-full object-cover rounded-lg transform group-hover:scale-110 transition-transform duration-300"
                                src="<?php echo esc_url($category->imagen['url']); ?>"
                                alt="<?php echo esc_attr($category->imagen['alt']); ?>">
                            </div>
                          </div>
                        <?php else : ?>
                          <div class="w-14 h-14 rounded-lg bg-gradient-to-br from-green-500 to-emerald-500 flex items-center justify-center shadow-md">
                            <span class="text-white text-xl font-bold">
                              <?= strtoupper(substr($category->name, 0, 1)) ?>
                            </span>
                          </div>
                        <?php endif; ?>
                      </div>

                      <!-- Descripción -->
                      <?php if (isset($category->description)) : ?>
                        <div class="mb-8">
                          <div class="flex items-center mb-3">
                            <div class="w-6 h-px bg-green-300 mr-2"></div>
                            <span class="text-xs font-semibold text-green-600 uppercase tracking-wider">Descripción</span>
                          </div>
                          <p class="text-gray-600 leading-relaxed text-sm line-clamp-3 pl-2">
                            <?php echo esc_html($category->description); ?>
                          </p>
                        </div>
                      <?php endif; ?>


                    </div>

                    <!-- Botón -->
                    <div class="px-8 pb-8 pt-0">
                      <a href="<?php echo get_term_link($category->id, 'categoria_producto'); ?>"
                        class="group/btn relative w-full flex items-center justify-between px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-md hover:shadow-lg overflow-hidden">

                        <!-- Efecto de brillo -->
                        <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700"></div>

                        <span class="relative text-white">Ver todos los productos</span>

                        <svg class="w-5 h-5 relative transform group-hover/btn:translate-x-2 transition-transform duration-300"
                          fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                      </a>
                    </div>

                    <!-- Esquina decorativa -->
                    <div class="absolute top-0 right-0 w-24 h-24 overflow-hidden">
                      <div class="absolute -top-12 -right-12 w-24 h-24 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full"></div>
                    </div>
                  </div>

                  <!-- Sombra verde al hover -->
                  <div class="absolute -inset-4 bg-gradient-to-r from-green-100 to-emerald-100 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition-opacity duration-500 -z-10"></div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </section>
      </div>
    </main>
<?php endwhile;
endif;
?>

<style>
  .line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .title-categories {
    font-size: 3.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
  }

  @media (max-width: 768px) {
    .title-categories {
      font-size: 2.5rem;
    }
  }

  /* Animación para la imagen */
  @keyframes gentleBounce {

    0%,
    100% {
      transform: translateY(0) scale(1);
    }

    50% {
      transform: translateY(-5px) scale(1.05);
    }
  }

  .group:hover .relative.ml-4 .relative img {
    animation: gentleBounce 2s ease-in-out infinite;
  }
</style>


<?php get_footer(); ?>