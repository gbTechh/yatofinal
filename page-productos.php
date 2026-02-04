<?php
/*
Template Name: Todos los productos
*/

get_header();
?>
<?php
get_header();
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
                <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 ">Fabricación</h1>
            </div>

            <!-- Imagen ocupa 2 columnas -->
            <div class="hidden lg:block lg:col-span-2"></div>

        </div>
    </div>

</header>

<main class="p-6 md:px-20 pt-20 flex flex-col items-center justify-center mb-40">
    <section class="w-full flex flex-col gap-6 max-w-[1200px]">

        <!-- Sidebar de categorías -->
        <div class="wrap-categorias gap-10 hd:gap-32">
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
                        <?php foreach ($categories as $cat) : ?>
                            <li class="p-2 border-[1px] border-gray-300 rounded-md">
                                <a href="<?php echo get_term_link($cat); ?>" class="link">
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
                // Obtener TODOS los productos (sin filtrar por categoría)
                $args = array(
                    'post_type' => 'producto', // Nombre del custom post type
                    'posts_per_page' => -1, // Mostrar todos los productos
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) : ?>
                    <div class="grid-products -mt-10">
                        <?php while ($query->have_posts()) : $query->the_post();
                            // Obtener campos ACF del producto si los tienes
                            $product_fields = get_fields(get_the_ID());
                        ?>
                            <article class="product-card mt-10">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="product-image bg-[#1f6306]/20 rounded-2xl overflow-hidden p-8 hd:p-12">
                                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto']); ?>
                                    </div>
                                <?php endif; ?>
                                <h2 class="uppercase text-black text-lg p-6 px-0"><?php the_title(); ?></h2>
                                <a href="<?php the_permalink(); ?>" class="link-card link !text-sm p-2 border-[1px] border-gray-400 text-center w-fit rounded-full !bg-transparent !text-black px-4 !capitalize">Ver más</a>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <p>No hay productos disponibles.</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>

    </section>
</main>

<?php get_footer(); ?>