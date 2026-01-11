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

<header class="relative bg-bg-primary/80 grid place-items-center">
    <?php if ($global_banner) : ?>
        <img src="<?php echo esc_url($global_banner); ?>"  class="w-full h-full aspect-[20/9] md:aspect-[37/9] object-cover"/>   
        <h1 class="absolute title-categories uppercase font-black !text-white my-14">
            Todos los Productos
        </h1>         
    <?php endif; ?>
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