<?php
get_header();

while (have_posts()) :
    the_post();

    $producto_nombre = get_the_title();
    $producto_url = get_the_permalink();
    $producto_imagen = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $mensaje = "Hola, estoy interesado en este producto: *{$producto_nombre}*\n\n{$producto_url}";
    $mensaje_codificado = urlencode($mensaje);
    $numero_whatsapp = esc_html(get_option('yato_contact_whatsapp'));
    $product_fields = get_fields();
    $categories = get_the_terms(get_the_ID(), 'categoria_producto');
?>
    <style>
        dialog {
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 0;
            max-width: 90vw;
            max-height: 90vh;
            overflow: hidden;
            background: black;
        }

        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
        }

        .btn-video i {
            animation: expandRetract 2.5s infinite ease-in-out;
        }

        @keyframes expandRetract {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.3);
            }
        }

        .gallery-thumbnail {
            transition: all 0.2s ease;
            border: 2px solid transparent;
        }

        .gallery-thumbnail:hover,
        .gallery-thumbnail.active {
            border-color: #16a34a;
            transform: translateY(-2px);
        }

        .spec-table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .spec-table th {
            position: sticky;
            top: 0;
            background: #16a34a;
        }

        .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>

    <main class="p-6 hd:px-20 pt-0 flex flex-col items-center justify-center pb-20 hd:pb-32">
        <div class="w-full max-w-[1200px]">
            <!-- Breadcrumbs mejorado -->
            <div class="text-sm my-10 hd:mt-20">
                <a href="<?php echo home_url(); ?>" class="link !font-medium mr-4">Inicio</a> |
                <?php if (!empty($categories)) : ?>
                    <a href="<?php echo get_term_link($categories[0]); ?>" class="link !font-medium mx-4">
                        <?php echo esc_html($categories[0]->name); ?>
                    </a> |
                <?php endif; ?>
                <span class="link !font-medium opacity-70 ml-4"><?php the_title(); ?></span>
            </div>
            <!-- Contenido principal -->
            <div class="flex flex-col hd:flex-row gap-10 items-start">
                <!-- Columna de imagen -->
                <div class="w-full hd:w-[400px]">
                    <div class="mb-6 border border-gray-200 rounded-xl p-8 bg-white shadow-sm js-show-gallery w-full aspect-square overflow-hidden flex items-center justify-center">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto max-h-full object-contain transition-opacity duration-300']); ?>
                        <?php endif; ?>
                    </div>

                    <!-- Galería de miniaturas -->
                    <?php if (!empty($product_fields['galeria_de_fotos'])) : ?>
                        <div class="mb-8">
                            <div class="flex flex-row flex-nowrap gap-2 overflow-x-auto pb-3 -mx-1 px-1">
                                <?php foreach ($product_fields['galeria_de_fotos'] as $index => $image) : ?>
                                    <img
                                        src="<?php echo esc_url($image['sizes']['medium']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>"
                                        class="js-item-gallery gallery-thumbnail aspect-square w-16 h-16 object-cover rounded-lg cursor-pointer bg-gray-50 p-1 <?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php endforeach; ?>

                                <?php $video = get_field('video') ?>
                                <?php if ($video): ?>
                                    <button class="aspect-square rounded-lg bg-green-600 w-16 h-16 btn-video hover:bg-green-700 transition-colors flex items-center justify-center shadow-sm"
                                        onclick="document.getElementById('modal').showModal()">
                                        <i class='bx bx-play-circle text-white text-xl'></i>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Botones de acción -->
                    <div class="space-y-3">
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $numero_whatsapp; ?>&text=<?php echo $mensaje_codificado; ?>"
                            target="_blank"
                            class="bg-bg-primary hover:bg-green-700 text-white font-semibold py-3 px-4 rounded-full w-full block text-center transition-colors duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                            <i class='bx bxl-whatsapp text-lg'></i>
                            Atención por Whatsapp
                        </a>

                        <?php $pdf_file = get_field('ficha_tecnica'); ?>
                        <?php if ($pdf_file): ?>
                            <a href="<?php echo esc_url($pdf_file['url']); ?>"
                                download
                                class="bg-bg-secondary hover:bg-amber-600 text-white font-semibold py-3 px-4 rounded-full w-full block text-center transition-colors duration-200 shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                                <i class='bx bx-download text-lg'></i>
                                Descargar ficha técnica
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Columna de información -->
                <div class="product-info flex-1">
                    <!-- Encabezado del producto -->
                    <div class="mb-8">
                        <h1 class="text-lg hd:text-3xl !text-black font-black mb-4"><?php the_title(); ?></h1>

                        <!-- Categorías -->
                        <?php if (!empty($categories)) : ?>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <?php foreach ($categories as $category) : ?>
                                    <a href="<?php echo get_term_link($category); ?>"
                                        class="inline-flex items-center bg-green-50 text-green-700 px-3 py-1 rounded-full text-sm font-medium hover:bg-green-100 transition-colors">
                                        <i class='bx bx-category-alt mr-1 text-xs'></i>
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Precio -->
                        <?php if (!empty($product_fields['precio'])) : ?>
                            <div class="inline-block bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-2 rounded-xl border border-blue-100 mb-6">
                                <span class="text-2xl font-bold text-blue-600"><?php echo esc_html($product_fields['precio']); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Descripción corta -->
                    <?php if (!empty($product_fields['descripcion_corta'])) : ?>
                        <div class="mb-8 p-6 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="flex items-center mb-3">
                                <div class="w-1 h-4 bg-green-500 rounded-full mr-2"></div>
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Resumen</h3>
                            </div>
                            <p class="paragraph !text-base text-gray-700 leading-relaxed">
                                <?php echo esc_html($product_fields['descripcion_corta']); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <!-- Descripción detallada -->
                    <div class="description-product mb-10 pb-8 border-b border-gray-200">
                        <div class="flex items-center mb-6">
                            <div class="w-1 h-6 bg-blue-500 rounded-full mr-3"></div>
                            <h2 class="subtitle !text-black !text-xl">Descripción del producto</h2>
                        </div>
                        <div class="text-gray-700 leading-relaxed space-y-4">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <!-- Especificaciones -->
                    <?php if (!empty($product_fields['especificaciones'])) : ?>
                        <?php $especificaciones = get_field('especificaciones'); ?>
                        <div class="mb-12">
                            <div class="flex items-center mb-6">
                                <div class="w-1 h-6 bg-green-500 rounded-full mr-3"></div>
                                <h2 class="subtitle !text-black !text-xl mb-0">Especificaciones técnicas</h2>
                            </div>

                            <div class="bg-white rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                                <div class="overflow-x-auto">
                                    <table class="spec-table min-w-full">
                                        <thead>
                                            <tr class="bg-green-600">
                                                <th class="border-r border-green-500 p-3 text-left text-white font-semibold text-sm uppercase tracking-wide">
                                                    <div class="flex items-center">
                                                        <i class='bx bx-grid-alt mr-2'></i>
                                                        Características
                                                    </div>
                                                </th>
                                                <?php for ($i = 1; $i <= 6; $i++) : ?>
                                                    <?php if (!empty($especificaciones[0]['columna' . $i])) : ?>
                                                        <th class="border-r border-green-500 p-3 text-left text-white font-semibold text-sm uppercase tracking-wide last:border-r-0">
                                                            <div class="flex items-center">
                                                                <i class='bx bx-column mr-2'></i>
                                                                <?php echo esc_html($especificaciones[0]['columna' . $i]); ?>
                                                            </div>
                                                        </th>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i < count($especificaciones); $i++): ?>
                                                <tr class="even:bg-gray-50 hover:bg-green-50/50 transition-colors duration-150 group">
                                                    <td class="border border-gray-100 p-3 font-medium text-gray-900 group-hover:text-green-700">
                                                        <div class="flex items-center">
                                                            <i class='bx bx-check-circle text-green-500 mr-2 text-sm'></i>
                                                            <?php echo esc_html($especificaciones[$i]['caracteristicas']); ?>
                                                        </div>
                                                    </td>
                                                    <?php for ($j = 1; $j <= 6; $j++) : ?>
                                                        <?php if (!empty($especificaciones[0]['columna' . $j])) : ?>
                                                            <td class="border border-gray-100 p-3 text-gray-700 group-hover:text-gray-900">
                                                                <?php echo esc_html($especificaciones[$i]['columna' . $j]); ?>
                                                            </td>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Productos relacionados -->
            <?php
            if (!empty($categories)) {
                $related_args = array(
                    'post_type' => 'producto',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'categoria_producto',
                            'field' => 'term_id',
                            'terms' => $categories[0]->term_id
                        )
                    )
                );

                $related_products = new WP_Query($related_args);

                if ($related_products->have_posts()) : ?>
                    <div class="mt-16 pt-10 border-t border-gray-200">
                        <div class="flex items-center mb-8">
                            <div class="w-1 h-6 bg-green-500 rounded-full mr-3"></div>
                            <h2 class="subtitle !text-black !text-xl mb-0">Productos relacionados</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 hd:grid-cols-3 gap-8">
                            <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
                                <a href="<?php the_permalink(); ?>" class="group block h-full">
                                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 h-full flex flex-col relative">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="w-full aspect-square flex items-center justify-center p-8 bg-gray-50 group-hover:bg-green-50/30 transition-colors duration-300 relative overflow-hidden">
                                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto max-h-full object-contain group-hover:scale-110 transition-transform duration-500']); ?>
                                                
                                                <!-- Overlay Action -->
                                                <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                                    <span class="bg-white text-green-700 px-6 py-2 rounded-full font-semibold shadow-lg translate-y-4 group-hover:translate-y-0 transition-transform duration-300 text-sm flex items-center gap-2">
                                                        Ver Detalles <i class='bx bx-right-arrow-alt'></i>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="p-6 flex flex-col flex-grow">
                                            <div class="mb-2">
                                                <span class="text-xs font-bold text-green-600 uppercase tracking-wider bg-green-50 px-2 py-1 rounded">Relacionado</span>
                                            </div>
                                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors line-clamp-2">
                                                <?php the_title(); ?>
                                            </h3>
                                            <div class="mt-auto pt-4 flex items-center text-gray-500 text-sm font-medium group-hover:text-green-600 transition-colors">
                                                Explorar producto
                                                <i class='bx bx-chevron-right ml-1 text-lg group-hover:translate-x-1 transition-transform'></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
            <?php
                    wp_reset_postdata();
                endif;
            }
            ?>
        </div>
    </main>

    <!-- Modal para video -->
    <?php if ($video = get_field('video')): ?>
        <dialog id="modal">
            <div class="relative">
                <video
                    id="modalVideo"
                    class="w-full h-auto rounded-lg"
                    controls
                    poster="<?php echo get_the_post_thumbnail_url(); ?>">
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
                <button onclick="closeModal()"
                    class="absolute top-4 right-4 bg-white text-gray-900 w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100 transition-colors shadow-lg">
                    <i class='bx bx-x text-xl'></i>
                </button>
            </div>
        </dialog>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Galería interactiva
            document.addEventListener('click', (ev) => {
                if (ev.target && ev.target.classList.contains('js-item-gallery')) {
                    // Remover clase active de todas las miniaturas
                    document.querySelectorAll('.js-item-gallery').forEach(img => {
                        img.classList.remove('active');
                    });

                    // Agregar clase active a la clickeada
                    ev.target.classList.add('active');

                    const src = ev.target.src;
                    const gallery = document.querySelector('.js-show-gallery img');

                    // Efecto de fade
                    gallery.style.opacity = '0.5';
                    setTimeout(() => {
                        gallery.src = src;
                        gallery.style.opacity = '1';
                    }, 150);
                }
            });

            // Activar primera miniatura por defecto
            const firstThumbnail = document.querySelector('.js-item-gallery');
            if (firstThumbnail) {
                firstThumbnail.classList.add('active');
            }
        });

        function closeModal() {
            const modal = document.getElementById('modal');
            const video = document.getElementById('modalVideo');

            video.pause();
            video.currentTime = 0;
            modal.close();
        }

        // Cerrar modal con ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const modal = document.getElementById('modal');
                if (modal && modal.open) {
                    closeModal();
                }
            }
        });
    </script>

<?php
endwhile;
get_footer();
?>