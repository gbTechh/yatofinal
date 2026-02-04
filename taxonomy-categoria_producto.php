<?php
get_header();
$current_category = get_queried_object();
$global_banner = get_theme_mod('banner_global_image');
$category_image = get_field('imagen', 'categoria_producto_' . $current_category->term_id);
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
              rgba(0,100,0,0.05) 0%, 
              rgba(0,0,0,0.02) 30%, 
              transparent 100%);
          transform: translateX(-100px);
      "></div>

            <!-- Eco 2 -->
            <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,100,0,0.08) 0%, 
              rgba(0,0,0,0.04) 30%, 
              transparent 100%);
          transform: translateX(-70px);
      "></div>

            <!-- Eco 1 -->
            <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,100,0,0.12) 0%, 
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
                    src="<?= $category_image ? $category_image['url'] : $global_banner ?>"
                    alt="<?php echo esc_html($current_category->name); ?>"
                    class="w-full h-full object-cover z-10 relative" />
                <!-- Overlay degradado -->
                <div class="absolute inset-0 bg-gradient-to-r from-bg-primary/40 via-bg-primary/15 to-transparent top-0 left-0 z-20"></div>
            </div>

        </div>
    </div>

    <!-- Contenido -->
    <div class="relative z-10 container mx-auto px-6 md:px-12 h-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 h-full items-center">

            <!-- Texto en parte izquierda -->
            <div class="">
                <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 leading-7">
                    <?php echo esc_html($current_category->name); ?>
                </h1>
            </div>

            <!-- Imagen ocupa 2 columnas -->
            <div class="hidden lg:block lg:col-span-2"></div>

        </div>
    </div>

</header>

<main class="p-6 md:px-20 pt-16 pb-20 bg-gradient-to-b from-gray-50 to-white">
    <section class="w-full flex flex-col gap-6 max-w-[1400px] mx-auto">

        <!-- Breadcrumb y descripción -->
        <div class="mb-8">
            <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                <a href="<?php echo home_url(); ?>" class="hover:text-green-600 transition-colors">Inicio</a>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <a href="<?php echo get_post_type_archive_link('catalogo'); ?>" class="hover:text-green-600 transition-colors">Categorías</a>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
                <span class="text-green-600 font-semibold"><?php echo esc_html($current_category->name); ?></span>
            </div>

            <?php if ($current_category->description) : ?>
                <div class="bg-white rounded-xl p-6 shadow-sm border border-green-100">
                    <p class="text-gray-600 leading-relaxed"><?php echo esc_html($current_category->description); ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="wrap-categorias gap-10 hd:gap-10">
            <!-- Sidebar de categorías -->
            <aside class="w-full bg-white hd:bg-white rounded-xl p-6 shadow-sm border border-green-100">
                <h2 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Todas las categorías
                </h2>
                <?php
                $categories = get_terms([
                    'taxonomy' => 'categoria_producto',
                    'hide_empty' => false,
                    'parent' => 0
                ]);

                if (!empty($categories)) : ?>
                    <ul class="space-y-2">
                        <?php foreach ($categories as $cat) :
                            $is_active = ($cat->term_id === $current_category->term_id);
                            $active_class = $is_active ? 'bg-gradient-to-r from-green-600 to-emerald-600 text-white border-green-600' : 'bg-white hover:bg-green-50 text-gray-700 border-gray-200';
                        ?>
                            <li class="group">
                                <a href="<?php echo get_term_link($cat); ?>"
                                    class="<?php echo $active_class; ?> flex items-center justify-between p-4 rounded-lg border-2 transition-all duration-300 hover:border-green-400 hover:shadow-md">
                                    <span class="font-medium <?php echo $is_active ? 'text-white' : 'group-hover:text-green-600'; ?>">
                                        <?php echo esc_html($cat->name); ?>
                                    </span>
                                    <span class="<?php echo $is_active ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600 group-hover:bg-green-100 group-hover:text-green-700'; ?> px-3 py-1 rounded-full text-sm font-semibold transition-colors">
                                        <?php echo $cat->count; ?>
                                    </span>
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
                    <?php
                    // Obtener las subcategorías de la categoría actual
                    $subcategories = get_terms([
                        'taxonomy' => 'categoria_producto',
                        'hide_empty' => false,
                        'parent' => $current_category->term_id
                    ]);

                    // Si hay subcategorías, mostrar cards de subcategorías
                    if (!empty($subcategories)) : ?>
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                                <div class="w-1 h-8 bg-gradient-to-b from-green-600 to-emerald-600 rounded-full"></div>
                                Repuestos
                            </h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <?php foreach ($subcategories as $subcategory) :
                                    $subcategory_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                                ?>
                                    <a href="<?php echo get_term_link($subcategory); ?>" class="group relative no-underline block overflow-hidden">
                                        <div class="relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-green-100">

                                            <!-- Fondo gradiente verde suave -->
                                            <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 to-green-50 opacity-60"></div>

                                            <!-- Patrón de puntos decorativo -->
                                            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#059669 1px, transparent 1px); background-size: 20px 20px;"></div>

                                            <!-- Contenido -->
                                            <div class="relative p-6 flex flex-col items-center justify-center min-h-[160px]">
                                                <?php if ($subcategory_image) : ?>
                                                    <div class="relative mb-4">
                                                        <div class="absolute -inset-3 bg-gradient-to-r from-green-100 to-emerald-200 rounded-2xl blur opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                                                        <div class="relative w-16 h-16 rounded-xl overflow-hidden border-3 border-white shadow-lg bg-bg-primary p-2">
                                                            <img
                                                                src="<?php echo esc_url($subcategory_image['url']); ?>"
                                                                alt="<?php echo esc_attr($subcategory->name); ?>"
                                                                class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-300">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <h3 class="text-center text-sm font-bold text-gray-800 group-hover:text-green-700 transition-colors duration-300 mb-2">
                                                    <?php echo esc_html($subcategory->name); ?>
                                                </h3>

                                                <span class="inline-flex items-center px-3 py-1 rounded-full bg-white/80 backdrop-blur-sm border border-green-200 text-green-700 text-xs font-semibold">
                                                    <?php echo $subcategory->count; ?> productos
                                                </span>
                                            </div>

                                            <!-- Esquina decorativa -->
                                            <div class="absolute top-0 right-0 w-16 h-16 overflow-hidden">
                                                <div class="absolute -top-8 -right-8 w-16 h-16 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full"></div>
                                            </div>
                                        </div>

                                        <!-- Sombra verde al hover -->
                                        <div class="absolute -inset-3 bg-gradient-to-r from-green-100 to-emerald-100 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition-opacity duration-500 -z-10"></div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Productos -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                            <div class="w-1 h-8 bg-gradient-to-b from-green-600 to-emerald-600 rounded-full"></div>
                            Productos disponibles
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            <?php while ($query->have_posts()) : $query->the_post();
                                $product_fields = get_fields(get_the_ID());
                            ?>
                                <article class="group relative h-full">
                                    <div class="relative h-full bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 border border-green-100 flex flex-col">

                                        <!-- Fondo gradiente verde suave -->
                                        <div class="absolute inset-0 bg-gradient-to-br from-green-50/50 to-green-50 opacity-60"></div>

                                        <!-- Patrón de puntos decorativo -->
                                        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#059669 1px, transparent 1px); background-size: 20px 20px;"></div>

                                        <!-- Imagen del producto -->
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="relative bg-gradient-to-br from-green-50 to-emerald-50 p-6 overflow-hidden">
                                                <div class="relative aspect-square">
                                                    <?php the_post_thumbnail('medium', [
                                                        'class' => 'w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-500'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Contenido -->
                                        <div class="relative p-6 flex flex-col flex-grow">
                                            <h3 class="text-base font-bold text-gray-800 group-hover:text-green-700 transition-colors duration-300 mb-3 line-clamp-2">
                                                <?php the_title(); ?>
                                            </h3>

                                            <?php if (get_field('descripcion_corta')) : ?>
                                                <p class="text-sm text-gray-600 mb-4 line-clamp-2 flex-grow">
                                                    <?php echo get_field('descripcion_corta'); ?>
                                                </p>
                                            <?php endif; ?>

                                            <a href="<?php the_permalink(); ?>"
                                                class="group/btn relative w-full flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-md hover:shadow-lg overflow-hidden text-sm mt-auto">

                                                <!-- Efecto de brillo -->
                                                <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent transform -translate-x-full group-hover/btn:translate-x-full transition-transform duration-700"></div>

                                                <span class="relative text-white">Ver detalles</span>

                                                <svg class="w-4 h-4 ml-2 relative transform group-hover/btn:translate-x-1 transition-transform duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>

                                        <!-- Esquina decorativa -->
                                        <div class="absolute top-0 right-0 w-20 h-20 overflow-hidden">
                                            <div class="absolute -top-10 -right-10 w-20 h-20 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full"></div>
                                        </div>
                                    </div>

                                    <!-- Sombra verde al hover -->
                                    <div class="absolute -inset-3 bg-gradient-to-r from-green-100 to-emerald-100 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition-opacity duration-500 -z-10"></div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </div>

                <?php
                    wp_reset_postdata();
                else : ?>
                    <div class="bg-white rounded-xl p-12 text-center shadow-sm border border-green-100">
                        <svg class="w-20 h-20 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-xl text-gray-500">No hay productos en esta categoría.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </section>
</main>

<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .wrap-categorias {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    @media (min-width: 1280px) {
        .wrap-categorias {
            grid-template-columns: 300px 1fr;
        }
    }

    @media (max-width: 1279px) {
        aside {
            margin-bottom: 2rem;
        }
    }
</style>

<?php get_footer(); ?>