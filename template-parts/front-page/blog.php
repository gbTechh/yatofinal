<?php $blog = get_field('blog'); ?>

<section class="py-16 hd:py-24 px-5 hd:px-20 relative">
  <!-- Fondo sutil con gradiente -->
  <div class="absolute inset-0 bg-gradient-to-b from-gray-50/50 to-white"></div>

  <!-- Elementos decorativos -->
  <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-1 bg-gradient-to-r from-transparent via-gray-300/30 to-transparent"></div>
  <div class="absolute -bottom-10 right-10 w-32 h-32 rounded-full bg-bg-primary/5 blur-2xl"></div>

  <div class="max-w-7xl mx-auto relative z-10">
    <!-- Header de sección -->
    <div class="text-center mb-12 hd:mb-16">
      <span class="inline-block text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">
        Conocimiento Especializado
      </span>
      <h2 class="text-2xl hd:text-3xl font-bold text-gray-900 mb-4">
        <?= esc_html($blog["titulo"]); ?>
      </h2>
      <div class="w-16 h-1 bg-gradient-to-r from-bg-primary/50 to-bg-primary rounded-full mx-auto mb-6"></div>

      <?php if ($blog["texto"]): ?>
        <div class="max-w-2xl mx-auto">
          <p class="text-gray-600 text-lg leading-relaxed">
            <?= esc_html($blog["texto"]); ?>
          </p>
        </div>
      <?php endif; ?>
    </div>

    <!-- Subtítulo -->
    <div class="text-center mb-10 hd:mb-12">
      <h3 class="text-xl hd:text-2xl font-semibold text-gray-800 inline-flex items-center gap-2">
        <svg class="w-6 h-6 text-bg-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
        </svg>
        Noticias y Eventos
      </h3>
    </div>

    <!-- Posts Grid -->
    <div class="mb-12 hd:mb-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hd:gap-8">
        <?php
        if ($blog["articulos"]) {
          foreach ($blog["articulos"] as $post) {
            setup_postdata($post);
            $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
            $categories = get_the_category($post->ID);
            $post_date = get_the_date('d M, Y', $post->ID);
            $excerpt = wp_trim_words(get_the_excerpt($post->ID), 15);
        ?>

            <div class="group/card-blog no-underline">
              <a href="<?php echo get_permalink($post->ID); ?>" class="block h-full">
                <div class="bg-white rounded-2xl flex flex-col h-full relative overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100">

                  <!-- Imagen del post -->
                  <div class="relative overflow-hidden">
                    <?php if ($thumbnail): ?>
                      <div class="aspect-video overflow-hidden">
                        <img
                          src="<?php echo esc_url($thumbnail); ?>"
                          alt="<?php echo esc_attr(get_the_title($post->ID)); ?>"
                          class="w-full h-full object-cover transition-transform duration-700 group-hover/card-blog:scale-110">
                      </div>
                    <?php else: ?>
                      <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                      </div>
                    <?php endif; ?>

                    <!-- Overlay verde en hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover/card-blog:opacity-100 transition-opacity duration-500"></div>

                    <!-- Badge de categoría -->
                    <?php if (!empty($categories)): ?>
                      <div class="absolute top-4 left-4">
                        <span class="inline-block px-3 py-1 bg-white/90 backdrop-blur-sm text-bg-primary text-xs font-medium rounded-full">
                          <?php echo esc_html($categories[0]->name); ?>
                        </span>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Contenido del post -->
                  <div class="flex-1 p-6 hd:p-7">
                    <!-- Fecha -->
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                      <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <?php echo esc_html($post_date); ?>
                    </div>

                    <!-- Título -->
                    <h3 class="text-gray-800 group-hover/card-blog:text-bg-primary font-semibold text-lg hd:text-xl mb-3 transition-colors duration-300">
                      <?php echo esc_html(get_the_title($post->ID)); ?>
                    </h3>

                    <!-- Extracto -->
                    <?php if ($excerpt): ?>
                      <div class="mb-4">
                        <p class="text-gray-600 text-sm hd:text-base leading-relaxed line-clamp-2 no-underline">
                          <?php echo esc_html($excerpt); ?>
                        </p>
                      </div>
                    <?php endif; ?>
                  </div>

                  <!-- Footer con CTA -->
                  <div class="p-6 hd:p-7 pt-0 ">
                    <div class="relative overflow-hidden rounded-full bg-gradient-to-r from-gray-50 to-white group-hover/card-blog:from-bg-primary/5 group-hover/card-blog:to-bg-primary/10 transition-all duration-300">
                      <div class="py-3 flex items-center justify-center">
                        <span class="no-underline! inline-flex items-center text-gray-600 group-hover/card-blog:text-white font-medium text-sm transition-all duration-300 relative z-10 ">
                          Leer artículo
                          <svg class="w-4 h-4 ml-2 transform group-hover/card-blog:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                          </svg>
                        </span>
                      </div>

                      <!-- Efecto de fondo que se expande -->
                      <div class="absolute inset-0 bg-gradient-to-r from-bg-primary to-bg-primary/80 transform -translate-x-full group-hover/card-blog:translate-x-0 transition-transform duration-500 rounded-full"></div>
                    </div>
                  </div>

                  <!-- Borde exterior animado -->
                  <div class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover/card-blog:border-bg-primary/10 transition-all duration-500 pointer-events-none"></div>
                </div>
              </a>
            </div>

        <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>

    <!-- CTA -->
    <?php if ($blog["blog_link"] && $blog["texto_link"]): ?>
      <div class="text-center">
        <div class="inline-flex no-underline">
          <a href="<?= esc_url($blog["blog_link"]); ?>"
            class="group/btn-blog inline-flex items-center px-8 py-4 bg-bg-primary text-white font-semibold rounded-full hover:bg-bg-primary/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 no-underline">
            <span class="mr-3 no-underline text-white"><?= esc_html($blog["texto_link"]); ?></span>
            <svg class="w-5 h-5 transform group-hover/btn-blog:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </a>
        </div>


      </div>
    <?php endif; ?>
  </div>
</section>

<style>
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>