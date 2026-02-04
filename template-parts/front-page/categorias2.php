<section class="py-16 hd:py-24 container bg-gray-100/0">
    <div class="max-w-7xl mx-auto px-4 hd:px-8">
        <!-- Encabezado de sección -->
        <div class="text-center mb-12 hd:mb-16">
            <span class="inline-block text-sm font-semibold text-gray-600 uppercase tracking-wider mb-3">
                Categorías
            </span>
            <h2 class="text-2xl hd:text-3xl font-bold text-gray-900 mb-4">
                Explora Nuestros Productos
            </h2>
            <div class="w-16 h-1 bg-gradient-to-r from-bg-primary/50 to-bg-primary rounded-full mx-auto"></div>
        </div>

        <div class="relative">
            <!-- Navegación -->


            <div class="swiper categories-slider px-2">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'taxonomy' => 'categoria_producto',
                        'hide_empty' => false,
                        'parent' => 0
                    );
                    $categories = get_terms($args);

                    if (!empty($categories)):
                        foreach ($categories as $category):
                            $imagen = get_field('imagen', 'term_' . $category->term_id);
                            $description = term_description($category->term_id);
                            ?>
                            <div class="swiper-slide">
                                <div clasS="py-10">
                                    <a href="<?php echo get_term_link($category); ?>" class="block link group/card">
                                        <div
                                            class="bg-white rounded-2xl flex flex-col h-full relative overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100">

                                            <!-- Header con efecto hover reveal -->
                                            <div class="relative p-6 overflow-hidden">
                                                <!-- Fondo base -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-white"></div>

                                                <!-- Overlay verde que aparece en hover -->
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-br from-bg-primary/0 via-bg-primary/0 to-bg-primary/0 group-hover/card:from-bg-primary/10 group-hover/card:via-bg-primary/20 group-hover/card:to-bg-primary/30 transition-all duration-500">
                                                </div>

                                                <!-- Elementos decorativos -->
                                                <div
                                                    class="absolute top-0 left-0 w-32 h-32 -translate-x-16 -translate-y-16 rounded-full bg-bg-primary/0 group-hover/card:bg-bg-primary/5 transition-all duration-700">
                                                </div>
                                                <div
                                                    class="absolute bottom-0 right-0 w-24 h-24 translate-x-12 translate-y-12 rounded-full bg-bg-primary/0 group-hover/card:bg-bg-primary/5 transition-all duration-700 delay-100">
                                                </div>

                                                <!-- Contenido del header -->
                                                <div class="relative z-10">
                                                    <div class="flex items-center justify-center mb-4">
                                                        <div
                                                            class="w-12 h-12 rounded-full bg-white shadow-md flex items-center justify-center group-hover/card:bg-bg-primary/10 transition-all duration-300">
                                                            <div
                                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-200 to-gray-100 group-hover/card:from-bg-primary/30 group-hover/card:to-bg-primary/20 flex items-center justify-center transition-all duration-300">
                                                                <!-- Icono opcional -->
                                                                <svg class="w-4 h-4 text-gray-600 group-hover/card:text-bg-primary transition-colors duration-300"
                                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h3
                                                        class="text-gray-800 group-hover/card:text-bg-primary font-bold text-lg hd:text-xl uppercase text-center mb-3 transition-colors duration-300">
                                                        <?php echo esc_html($category->name); ?>
                                                    </h3>

                                                    <!-- Línea decorativa -->
                                                    <div class="relative h-1 w-24 mx-auto overflow-hidden rounded-full">
                                                        <div
                                                            class="absolute inset-0 bg-gradient-to-r from-gray-200 to-gray-300">
                                                        </div>
                                                        <div
                                                            class="absolute inset-0 bg-gradient-to-r from-bg-primary to-bg-primary/80 transform -translate-x-full group-hover/card:translate-x-0 transition-transform duration-500 delay-200">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contenido de la card -->
                                            <div class="flex-1 flex flex-col p-6 pt-4">
                                                <?php if ($imagen): ?>
                                                    <div
                                                        class="flex-1 flex items-center justify-center mb-6 min-h-[200px] hd:min-h-[250px] relative">
                                                        <!-- Contenedor de imagen con bordes especiales -->
                                                        <div class="relative w-full h-full">
                                                            <!-- Marco decorativo -->




                                                            <!-- Imagen -->
                                                            <div class="relative inset-2 overflow-hidden rounded-xl">
                                                                <img src="<?php echo esc_url($imagen['url']); ?>"
                                                                    alt="<?php echo esc_attr($category->name); ?>"
                                                                    class="w-full h-full min-h-[150px] object-contain transition-all duration-500 group-hover/card:scale-110 group-hover/card:rotate-1" />

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($description): ?>
                                                    <div class="mt-2">
                                                        <p
                                                            class="text-gray-600 text-sm line-clamp-2 group-hover/card:text-gray-700 transition-colors duration-300">
                                                            <?php echo wp_trim_words($description, 12); ?>
                                                        </p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Footer de la card -->
                                            <div class="p-6 pt-2">
                                                <div
                                                    class="relative overflow-hidden rounded-full bg-gradient-to-r from-gray-50 to-white group-hover/card:from-bg-primary/5 group-hover/card:to-bg-primary/10 transition-all duration-300">
                                                    <div class="py-3 flex items-center justify-center">
                                                        <span
                                                            class="inline-flex items-center text-gray-600 group-hover/card:text-white font-medium text-sm transition-all duration-300 relative z-10">
                                                            Explorar categoría
                                                            <svg class="w-4 h-4 ml-2 transform group-hover/card:translate-x-2 transition-transform duration-300"
                                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                                            </svg>
                                                        </span>
                                                    </div>

                                                    <!-- Efecto de fondo que se expande -->
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-r from-bg-primary to-bg-primary/80 transform -translate-x-full group-hover/card:translate-x-0 transition-transform duration-500 rounded-full">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Borde exterior animado -->
                                            <div
                                                class="absolute inset-0 rounded-2xl border-2 border-transparent group-hover/card:border-bg-primary/10 transition-all duration-500 pointer-events-none">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>


            </div>
        </div>


    </div>
</section>