<section class="py-20 pl-5 hd:pl-20 bg-gray-100/0">

    <div class="">
        <div class="swiper categories-slider">
            <!-- Navegación personalizada -->
            <div class="flex justify-end mt-8 gap-4 pr-20 pb-20">
                <h1 class="title w-full text-left">Categorías</h1>
                <button
                    class="swiper-button-prev !static !w-12 !h-12 bg-bg-secondary !text-white after:!text-lg hover:!text-bg-secondary"></button>
                <button
                    class="swiper-button-next !static !w-12 !h-12 bg-bg-secondary !text-white after:!text-lg hover:!text-bg-secondary"></button>
            </div>
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
                        ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_term_link($category); ?>" class="block link">
                                <!-- Agregamos el enlace aquí -->
                                <div
                                    class="animation-card-bg-slider group bg-white rounded-lg flex flex-col h-full relative shadow-card p-8 cursor-pointer">
                                    <!-- Agregamos cursor-pointer -->
                                    <h3
                                        class="z-10 text-bg-secondarysoft group-hover:text-white font-black text-2xl uppercase mb-8">
                                        <?php echo esc_html($category->name); ?>
                                    </h3>

                                    <?php if ($imagen): ?>
                                        <div class="flex-1 flex items-center justify-center min-h-[300px]">
                                            <img src="<?php echo esc_url($imagen['url']); ?>"
                                                alt="<?php echo esc_attr($category->name); ?>"
                                                class="w-3/4 shadow-img-black max-h-[300px] object-contain absolute bottom-10 -right-2 block z-10">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        </div>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>


        </div>
    </div>
</section>