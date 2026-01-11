<?php
get_header();

// Inicio del loop de WordPress
while (have_posts()) :
    the_post();
    
    //boton whatsapp
    $producto_nombre = get_the_title();
    $producto_url = get_the_permalink();
    $producto_imagen = get_the_post_thumbnail_url(get_the_ID(), 'full');
    // Crear el mensaje para WhatsApp
    $mensaje = "Hola, estoy interesado en este producto: *{$producto_nombre}*\n\n{$producto_url}";
    // Codificar el mensaje para URL
    $mensaje_codificado = urlencode($mensaje);
    // Número de WhatsApp (reemplaza con tu número)
    $numero_whatsapp = esc_html(get_option('yato_contact_whatsapp'));

    
    // Obtener todos los campos ACF del producto
    $product_fields = get_fields();
    
    // Obtener las categorías del producto
    $categories = get_the_terms(get_the_ID(), 'categoria_producto');
?>
<style>
dialog {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    text-align: center;
}
dialog::backdrop {
    background-color: rgba(0, 0, 0, 0.5);
}
.btn {
    padding: 10px 20px;
    cursor: pointer;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
}
.btn-video i {
   
    animation: expandRetract 2.5s infinite ease-in-out;
}

/* Animación */
@keyframes expandRetract {
    0%, 100% {
    transform: scale(1);
    }
    50% {
    transform: scale(1.3);
    }
}
</style>

<main class="p-6 hd:px-20 pt-0 flex flex-col items-center justify-center pb-20 hd:pb-32">
    <div class="w-full max-w-[1200px] ">
        <!-- Breadcrumbs -->
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
            <div class=" aspect-square flex items-center flex-col justify-center w-full hd:w-[400px]  h-auto gap-5">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-4 border-[1px] border-gray-300 p-10 js-show-gallery w-full aspect-square">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto rounded-lg object-contain aspect-square']); ?>
                    </div>
                <?php endif; ?>
                 <!-- <a href="https://api.whatsapp.com/send?phone=<?php echo $numero_whatsapp; ?>&text=<?php echo $mensaje_codificado; ?>" target="_blank" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/pattern-blue.svg');" class="bg-no-repeat bg-cover p-10 bg-bg-secondarysoft flex-1 w-full block text-white font-black uppercase text-left">Whatsapp</a> -->
                 <a href="https://api.whatsapp.com/send?phone=<?php echo $numero_whatsapp; ?>&text=<?php echo $mensaje_codificado; ?>" target="_blank" 
                 class="bg-no-repeat bg-cover p-3 px-5 bg-bg-primary flex-1 w-full block text-white font-semibold uppercase text-center rounded-full">Atencíon por Whatsapp</a>
                <?php 
                    $pdf_file = get_field('ficha_tecnica'); 
                    if($pdf_file): ?>
                        <a href="<?php echo esc_url($pdf_file['url']); ?>" 
                        download 
                       class="bg-no-repeat bg-cover p-3 px-5 bg-bg-secondary flex-1 w-full block text-white font-semibold uppercase text-center rounded-full">Descargar ficha ténica</a>
                <?php endif;?>
                <!-- <?php 
                    $pdf_file = get_field('ficha_tecnica'); 
                    if($pdf_file): ?>
                        <a href="<?php echo esc_url($pdf_file['url']); ?>" 
                        download 
                        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/pattern-red.svg');" class="bg-no-repeat bg-cover p-10 bg-red-400 flex-1 w-full block text-white font-black uppercase text-left">Ficha ténica</a>
                <?php endif;?> -->
               
               

            </div>

            <!-- Columna de información -->
            <div class="product-info flex-1">
                <h1 class="text-lg hd:text-3xl !text-black font-black "><?php the_title(); ?></h1>
                <?php if (!empty($product_fields['galeria_de_fotos'])) : ?>
                    <div class="flex flex-row flex-nowrap gap-1 mb-10 mt-5 overflow-x-auto">
                        <?php foreach ($product_fields['galeria_de_fotos'] as $image) : ?>
                            <img 
                                src="<?php echo esc_url($image['sizes']['large']); ?>" 
                                srcset="<?php echo esc_attr(wp_get_attachment_image_srcset($image['ID'], 'large')); ?>" 
                                sizes="(max-width: 600px) 100vw, 20vw" 
                                alt="<?php echo esc_attr($image['alt']); ?>"
                                class="js-item-gallery aspect-square hover:bg-slate-100 transition-all p-2 w-20 block h-auto rounded cursor-pointer">
                        <?php endforeach; ?>
                        <?php $video = get_field('video')?>
                        <?php if($video):?>
                            <button class="aspect-square rounded-lg bg-gray-100 w-20 btn-video" 
                                    onclick="document.getElementById('modal').showModal()">
                            <i class='bx bx-play-circle text-texto-primary text-2xl'></i>
                            </button>

                            <dialog id="modal">
                            <video 
                                id="modalVideo"
                                class="w-full h-full object-cover aspect-video"
                                controls
                                poster="<?php echo get_the_post_thumbnail_url(); ?>">
                                <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                                Your browser does not support the video tag.
                            </video>
                            <button class="btn mt-4" onclick="closeModal()">Cerrar</button>
                            </dialog>
                        <?php endif;?>
                    </div>
                <?php endif; ?>  
                <!-- <?php if (!empty($categories)) : ?>
                    <div class="mb-4">
                        <?php foreach ($categories as $category) : ?>
                            <a href="<?php echo get_term_link($category); ?>" 
                               class="inline-block bg-gray-100 px-3 py-1 rounded-full text-sm mr-2 hover:bg-gray-200">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> -->

                <?php if (!empty($product_fields['descripcion_corta'])) : ?>
                    <p class="paragraph !text-base my-8">
                        <?php echo esc_html($product_fields['descripcion_corta']); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($product_fields['precio'])) : ?>
                    <div class="text-2xl font-bold text-blue-600 mb-8">
                        <?php echo esc_html($product_fields['precio']); ?>
                    </div>
                <?php endif; ?>

                <div class="description-product mb-8">
                    <h2 class="subtitle !text-black mb-6">Descripción del producto</h2>
                    <?php the_content(); ?>
                </div>

                <?php
                // Mostrar campos ACF adicionales
             
                if (!empty($product_fields['especificaciones'])) : ?>
                   <?php $especificaciones = get_field('especificaciones'); ?>
                    <div class="overflow-x-auto">
                        <h2 class="subtitle mb-6">Especificaciones</h2>
                        <table class="min-w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-2 text-left">Características</th>
                                    <?php
                                    // Como sabemos que el primer row contiene los títulos de las columnas
                                    for($i = 1; $i <= 6; $i++) {
                                        if(!empty($especificaciones[0]['columna'.$i])) {
                                            echo '<th class="border p-2 text-left">' . esc_html($especificaciones[0]['columna'.$i]) . '</th>';
                                        }
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Empezamos desde el índice 1 porque el 0 ya lo usamos para los encabezados
                                for($i = 1; $i < count($especificaciones); $i++): ?>
                                    <tr class="even:bg-gray-50">
                                        <td class="border p-2 font-medium">
                                            <?php echo esc_html($especificaciones[$i]['caracteristicas']); ?>
                                        </td>
                                        <?php
                                        // Columnas de datos
                                        for($j = 1; $j <= 6; $j++) {
                                            if(!empty($especificaciones[0]['columna'.$j])) {
                                                echo '<td class="border p-2">' . esc_html($especificaciones[$i]['columna'.$j]) . '</td>';
                                            }
                                        }
                                        ?>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
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
                <div class="mt-12">
                    <h2 class="subtitle  mb-6">Productos relacionados</h2>
                    <div class="grid grid-cols-1 hd:grid-cols-3 gap-6">
                        <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class=" bg-[#80E771]/50 rounded-2xl overflow-hidden p-8 hd:p-12 product-related-card flex items-center justify-center flex-col">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['class' => 'w-full h-auto rounded-lg mb-3']); ?>
                                <?php endif; ?>
                                <h3 class="link "><?php the_title(); ?></h3>
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

<?php
endwhile; ?>

<script>
    
document.addEventListener('DOMContentLoaded', () => {
  document.addEventListener('click', (ev) => {
    if (ev.target && ev.target.classList.contains('js-item-gallery') && ev.target.tagName === 'IMG') {
        const src = ev.target.src;
        const srcset = ev.target.srcset;
        const sizes = ev.target.sizes;
        const gallery = document.querySelector('.js-show-gallery');
        const imgGallery = gallery.querySelector('img');
        imgGallery.src = src;
        imgGallery.srcset = srcset;
        imgGallery.sizes = sizes;
        console.log(imgGallery)
      // Aquí puedes agregar la lógica que desees
    }
  })
   
});
function closeModal() {
    const modal = document.getElementById('modal');
    const video = document.getElementById('modalVideo');
    
    // Detener y reiniciar el video
    video.pause();
    video.currentTime = 0;
    
    // Cerrar el modal
    modal.close();
   }
</script>

<?php
get_footer();
?>