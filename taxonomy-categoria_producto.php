<?php
get_header();
$current_category = get_queried_object();
$global_banner = get_theme_mod('banner_global_image');
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
                <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 "> <?php echo esc_html($current_category->name); ?></h1>
            </div>

            <!-- Imagen ocupa 2 columnas -->
            <div class="hidden lg:block lg:col-span-2"></div>

        </div>
    </div>

</header>

<main class="p-6 md:px-20 pt-20 flex flex-col items-center justify-center mb-40">
    <section class="w-full flex flex-col gap-6 max-w-[1200px]">

        <!-- Agregar esto después del h1 en taxonomy-categoria_producto.php -->
        <div class="wrap-categorias gap-10 hd:gap-32">
            <!-- Sidebar de categorías -->
            <aside class="w-full bg-gray-100 hd:bg-transparent rounded-xl p-5 hd:p-0">
                <h2 class="text-sm text-slate-400 uppercase mb-4">Todas las categorías</h2>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'categoria_producto',
                    'hide_empty' => false,
                    'parent' => 0
                ]);

                if (!empty($categories)) : ?>
                    <ul class="space-y-2">
                        <?php foreach ($categories as $cat) :
                            $active_class = ($cat->term_id === $current_category->term_id) ? 'text-blue-600 !font-bold ' : '';
                        ?>
                            <li class="<?php echo $active_class; ?> p-2 border-[1px] border-gray-300 rounded-md">
                                <a href="<?php echo get_term_link($cat); ?>" class="<?php echo $active_class; ?> link ">
                                    <?php echo esc_html($cat->name); ?>
                                    (<?php echo $cat->count; ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </aside>

            <!-- Contenido de productos -->
            <div class="w-full">
                <?php
                // Obtener productos de esta categoría
                $args = array(
                    'post_type' => 'producto',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categoria_producto',
                            'field'    => 'term_id',
                            'terms'    => $current_category->term_id,
                            'include_children' => false
                        ),
                    ),
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) : ?>
                    <!--AQUI PONER TODOS LSO PRODUCTOS DE LAS SUBCATEGORIAS-->
                    <?php
                    // Obtener las subcategorías de la categoría actual
                    $subcategories = get_terms([
                        'taxonomy' => 'categoria_producto',
                        'hide_empty' => false,
                        'parent' => $current_category->term_id
                    ]);

                    // Si hay subcategorías, primero mostrar las cards de subcategorías
                    if (!empty($subcategories)) : ?>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10 ">
                            <?php foreach ($subcategories as $subcategory) :
                                $subcategory_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                            ?>
                                <a href="<?php echo get_term_link($subcategory); ?>" class="no-underline block text-white">
                                    <div class="bg-bg-primary shadow-md rounded-lg p-4 hover:shadow-lg transition-shadow duration-300 flex flex-col items-center justify-center min-h-[120px]">
                                        <?php if ($subcategory_image) : ?>
                                            <img
                                                src="<?php echo esc_url($subcategory_image['url']); ?>"
                                                alt="<?php echo esc_attr($subcategory->name); ?>"
                                                class="w-12 h-12 object-contain mb-2">
                                        <?php endif; ?>
                                        <h3 class="text-center text-sm font-semibold text-white">
                                            <?php echo esc_html($subcategory->name); ?>
                                        </h3>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    // Obtener las subcategorías de la categoría actual
                    $subcategories = get_terms([
                        'taxonomy' => 'categoria_producto',
                        'hide_empty' => false,
                        'parent' => $current_category->term_id
                    ]);

                    // Si hay subcategorías, mostrar sus productos
                    if (!empty($subcategories)) {
                        foreach ($subcategories as $subcategory) {
                            // Obtener productos de esta subcategoría
                            $subcategory_args = array(
                                'post_type' => 'producto',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'categoria_producto',
                                        'field'    => 'term_id',
                                        'terms'    => $subcategory->term_id,
                                    ),
                                ),
                            );

                            $subcategory_query = new WP_Query($subcategory_args);

                            if ($subcategory_query->have_posts()) : ?>
                                <!---                        
                            <div class="mb-20 pb-20 border-b-[1px] border-b-gray-200">
                                <h2 class="text-2xl font-bold text-bg-primary mb-6"><?php echo esc_html($subcategory->name); ?></h2>
                                <div class="grid-products">
                                    <?php while ($subcategory_query->have_posts()) : $subcategory_query->the_post(); ?>
                                        <article class="shadow-lg rounded-lg flex flex-col">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="product-image">
                                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto']); ?>
                                                </div>
                                            <?php endif; ?>
                                            <h3 class="uppercase text-bg-secondary text-lg p-6"><?php the_title(); ?></h3>

                                            <div class="p-6 bg-bg-gray relative pb-16">
                                                <div class="paragraph-sm">
                                                    <?php echo get_field('descripcion_corta') ?>
                                                </div>
                                                <div class="w-full absolute -bottom-8 left-0 h-auto flex items-center justify-center">
                                                    <a href="<?php the_permalink(); ?>" class="link-card link p-4 border-[1px] border-bg-secondary text-center w-4/5 bg-white">Ver detalles</a>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile; ?>
                                </div>
                            </div>--->
                    <?php endif;
                            wp_reset_postdata();
                        }
                    } ?>
                    <!--END PRODUCTOS DE LAS SUBCATEGORIAS-->

                    <div class="grid-products -mt-10 ">
                        <?php while ($query->have_posts()) : $query->the_post();
                            // Obtener campos ACF del producto si los tienes
                            $product_fields = get_fields(get_the_ID());
                        ?>
                            <article class="product-card mt-10 ">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="product-image bg-[#80E771]/50 rounded-2xl overflow-hidden p-8 hd:p-12">
                                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto']); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="uppercase text-black text-lg p-6 px-0"><?php the_title(); ?></h2>
                                <a href="<?php the_permalink(); ?>" class="link-card link !text-sm p-2 border-[1px] border-gray-400 text-center w-fit rounded-full !bg-transparent !text-black px-4 !capitalize ">Ver más</a>
                                <!-- <div class="p-6 bg-bg-gray relative pb-16">
                                    
                                    <div class="paragraph-sm">
                                        <?php echo get_field('descripcion_corta') ?>
                                    </div>
                                    <div class="w-full absolute -bottom-8 left-0 h-auto flex items-center justify-center">
                                      <a href="<?php the_permalink(); ?>" class="link-card link p-4 border-[1px] border-bg-secondary text-center w-4/5 bg-white">Ver detalles</a>
                                    </div>
                                </div> -->
                            </article>
                        <?php endwhile; ?>
                    </div>

                <?php
                    // Paginación si la necesitas
                    wp_reset_postdata();
                else : ?>
                    <p>No hay productos en esta categoría.</p>
                <?php endif; ?>
            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>