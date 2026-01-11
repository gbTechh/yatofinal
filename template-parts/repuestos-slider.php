<?php
// Obtener todas las categorías padre
$args = array(
    'taxonomy' => 'categoria_producto',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => false,
    'parent' => 0 // Solo categorías padre
);

// $parent_categories = get_terms($args);

// // Obtener todas las subcategorías
// $all_subcategories = array();
// foreach ($parent_categories as $parent) {
//     $args['parent'] = $parent->term_id;
//     $subcategories = get_terms($args);
//     if (!empty($subcategories)) {
//         foreach ($subcategories as $subcategory) {
//             // Agregamos el parent_id y parent_link a cada subcategoría
//             $subcategory->parent_id = $parent->term_id;
//             $subcategory->parent_link = get_term_link($parent);
//             $all_subcategories[] = $subcategory;
//         }
//     }
// }
$parent_categories = get_terms($args);

// Obtener todas las subcategorías
$all_subcategories = array();
foreach ($parent_categories as $parent) {
    $args['parent'] = $parent->term_id;
    $subcategories = get_terms($args);
    if (!empty($subcategories)) {
        $all_subcategories = array_merge($all_subcategories, $subcategories);
    }
}

?>
<style>
@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

.scroll-container {
  width: 100%;
  overflow: hidden;
  position: relative;
}

.flex-container {
  display: flex;
  flex-wrap: nowrap;
  animation: scroll 15s linear infinite;
  /* Duplicamos el contenido, así que necesitamos el doble de ancho */
  width: max-content;
}

.flex-container:hover {
  animation-play-state: paused;
}

.flex-item {
  flex: 0 0 200px;
  width: 200px;
  height: 230px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>

<!-- Contenedor principal con la clase scroll-container -->
<div class="scroll-container">
    <div class="flex-container gap-4">
        <?php 
        // Primera copia de los elementos
        if (!empty($all_subcategories)): 
            foreach ($all_subcategories as $subcategory): 
                $category_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                $image_url = $category_image ? $category_image['url'] : get_template_directory_uri() . '/assets/img/default-category.jpg';
        ?>
            <div class="flex-item">
                <a href="<?php echo get_term_link($subcategory); ?>" class="link-under !no-underline block w-full h-full">
                    <div class="relative p-2 rounded-lg hover:bg-red-500 bg-bg-primary shadow-md flex items-center justify-center flex-col gap-1 w-full h-full">
                        <?php if ($image_url): ?>
                            <img 
                                src="<?php echo esc_url($image_url); ?>" 
                                alt="<?php echo esc_attr($subcategory->name); ?>"
                                class="w-36 h-full aspect-square object-cover"
                            >
                        <?php endif; ?>
                        <div class="p-1 w-full">
                            <h3 class="text-lg text-center w-full font-semibold text-white !no-underline">
                                <?php echo esc_html($subcategory->name); ?>
                            </h3>
                            <?php if ($subcategory->description): ?>
                                <p class="text-sm text-gray-600 mt-2">
                                    <?php echo esc_html($subcategory->description); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>

        <?php 
        // Segunda copia de los elementos para crear el efecto infinito
        if (!empty($all_subcategories)): 
            foreach ($all_subcategories as $subcategory): 
                $category_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                $image_url = $category_image ? $category_image['url'] : get_template_directory_uri() . '/assets/img/default-category.jpg';
        ?>
            <div class="flex-item">
                <a href="<?php echo get_term_link($subcategory); ?>" class="link-under !no-underline block w-full h-full">
                    <div class="relative p-2 rounded-lg hover:bg-red-500 bg-bg-primary shadow-md flex items-center justify-center flex-col gap-1 w-full h-full">
                        <?php if ($image_url): ?>
                            <img 
                                src="<?php echo esc_url($image_url); ?>" 
                                alt="<?php echo esc_attr($subcategory->name); ?>"
                                class="w-36 h-full aspect-square object-cover"
                            >
                        <?php endif; ?>
                        <div class="p-1 w-full">
                            <h3 class="text-lg text-center w-full font-semibold text-white !no-underline">
                                <?php echo esc_html($subcategory->name); ?>
                            </h3>
                            <?php if ($subcategory->description): ?>
                                <p class="text-sm text-gray-600 mt-2">
                                    <?php echo esc_html($subcategory->description); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>
    </div>
</div>