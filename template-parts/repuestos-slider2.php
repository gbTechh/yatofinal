<?php
// Obtener todas las categorías padre
$args = array(
    'taxonomy' => 'categoria_producto',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => false,
    'parent' => 0
);

$parent_categories = get_terms($args);

// Obtener todas las subcategorías
$all_subcategories = array();
foreach ($parent_categories as $parent) {
    $args['parent'] = $parent->term_id;
    $subcategories = get_terms($args);
    if (!empty($subcategories)) {
        foreach ($subcategories as $subcat) {
            $all_subcategories[] = $subcat;
        }
    }
}
?>

<!-- Contenedor principal -->
<div class="relative py-8 hd:py-12">


    <div class="swiper repuestos-slider-circles px-4">
        <div class="swiper-wrapper">
            <?php if (!empty($all_subcategories)): ?>
                <?php foreach ($all_subcategories as $subcategory):
                    $category_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                    $image_url = $category_image ? $category_image['url'] : get_template_directory_uri() . '/assets/img/default-category.jpg';
                ?>
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center">
                            <a href="<?php echo get_term_link($subcategory); ?>" class="block link group/card-circle">
                                <!-- Card circular moderna -->
                                <div class="relative flex items-center justify-center">
                                    <!-- Círculo exterior con efecto hover -->
                                    <div class="w-48 h-48 rounded-full bg-gradient-to-br from-gray-50 to-white shadow-lg border-4 border-white group-hover/card-circle:border-bg-primary/20 transition-all duration-500 flex items-center justify-center relative overflow-hidden">

                                        <!-- Anillo decorativo -->
                                        <div class="absolute inset-0 rounded-full border-8 border-transparent group-hover/card-circle:border-bg-primary/10 transition-all duration-500"></div>

                                        <!-- Círculo interior con imagen -->
                                        <div class="w-40 h-40 rounded-full bg-bg-primary/80 shadow-inner overflow-hidden flex items-center justify-center p-6">
                                            <?php if ($image_url): ?>
                                                <img
                                                    src="<?php echo esc_url($image_url); ?>"
                                                    alt="<?php echo esc_attr($subcategory->name); ?>"
                                                    class="w-full h-full object-contain transition-transform duration-500 group-hover/card-circle:scale-110"
                                                    loading="lazy"
                                                    onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/default-category.jpg'">
                                            <?php else: ?>
                                                <!-- Placeholder elegante -->
                                                <div class="w-full h-full rounded-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                    </svg>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Punto decorativo hover -->
                                        <div class="absolute top-3 right-3 w-3 h-3 rounded-full bg-bg-primary opacity-0 group-hover/card-circle:opacity-100 transition-opacity duration-300"></div>
                                    </div>

                                    <!-- Sombra flotante -->
                                    <div class="absolute inset-0 w-48 h-48 rounded-full bg-black/5 blur-xl group-hover/card-circle:blur-2xl transition-all duration-500 -z-10"></div>
                                </div>

                                <!-- Título debajo del círculo -->
                                <div class="mt-6 text-center">
                                    <h3 class="text-gray-800 font-semibold text-lg group-hover/card-circle:text-bg-primary transition-colors duration-300">
                                        <?php echo esc_html($subcategory->name); ?>
                                    </h3>


                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Card circular placeholder -->
                <div class="swiper-slide">
                    <div class="flex flex-col items-center">
                        <div class="w-48 h-48 rounded-full bg-gradient-to-br from-gray-50 to-gray-100 shadow-lg border-4 border-white flex items-center justify-center">
                            <div class="w-40 h-40 rounded-full bg-white shadow-inner flex items-center justify-center">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <h3 class="text-gray-800 font-semibold text-lg">Próximamente</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Paginación minimalista -->
    <div class="swiper-pagination-circles mt-8 relative flex justify-center items-center gap-2"></div>
</div>

<!-- Script para Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiperCircles = new Swiper('.repuestos-slider-circles', {
            slidesPerView: 1,
            spaceBetween: 40,
            loop: true,
            centeredSlides: false,
            navigation: {
                nextEl: '.swiper-button-next-repuestos',
                prevEl: '.swiper-button-prev-repuestos',
            },

            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
                1536: {
                    slidesPerView: 5,
                    spaceBetween: 40,
                },
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    });
</script>

<style>
    /* Paginación elegante */
    .swiper-bullet-circle {
        opacity: 0.4;
        transition: all 0.3s ease;
    }

    .swiper-bullet-circle-active {
        opacity: 1;
        width: 20px;
        background: linear-gradient(90deg, var(--color-bg-primary), var(--color-bg-primary));
        border-radius: 4px;
    }

    /* Asegurar que las imágenes se muestren bien en círculos */
    .repuestos-slider-circles img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Efecto hover suave */
    .repuestos-slider-circles .swiper-slide {
        opacity: 0.9;
        transition: opacity 0.3s ease;
    }

    .repuestos-slider-circles .swiper-slide:hover {
        opacity: 1;
    }
</style>