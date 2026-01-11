<?php
get_header();
$blog_page_id = get_option('page_for_posts');
$banner_image = get_field('banner', $blog_page_id);
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
                    src="<?= $banner_image["url"] ?>"
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
                <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 ">BLog</h1>
            </div>

            <!-- Imagen ocupa 2 columnas -->
            <div class="hidden lg:block lg:col-span-2"></div>

        </div>
    </div>

</header>
<main class="p-6 md:px-20 pt-20 flex flex-col items-center justify-center">
    <div class="w-full max-w-[1200px]">
        <div class="w-full mb-10">
            <span class="text-xs text-gray-500">Navega y lee las ultimas noticias</span>
            <h2 class="text-2xl hd:text-3xl mt-1">Ultimas noticias</h2>
        </div>
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="h-full ">
                        <div class=" blog-card gap-1 relative">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="relative object-cover aspect-square"
                                    src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                                    alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                            <div class="-mt-10 bg-white z-[1] w-4/5 pt-3 pr-3">
                                <h2 class="text-black !font-medium text-lg"><?php the_title(); ?></h2>

                                <span class="text-xs border-b-[1px] border-b-bg-primary w-fit block py-4 uppercase">
                                    <?php echo get_the_date('d M Y'); ?>
                                </span>

                                <div class="mt-6 paragraph-sm">
                                    <?php the_excerpt(); ?>
                                </div>

                                <div class="relative left-0 w-full flex items-center mt-6 ">
                                    <a href="<?php the_permalink(); ?>"
                                        class="text-left link !font-normal !text-bg-primary !normal-case ">
                                        Ver más ->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="h-20"></div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="mt-8">
                <?php the_posts_pagination(array(
                    'prev_text' => __('Anterior'),
                    'next_text' => __('Siguiente'),
                )); ?>
            </div>
        <?php else : ?>
            <p>No hay entradas disponibles.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>