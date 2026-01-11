<?php
// Obtener todas las categorías padre
$args = array(
    'taxonomy' => 'categoria_producto',
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => false,
    'parent' => 0 // Solo categorías padre
);

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
  position: relative;
}

.flex-container {
  grid-template-columns: repeat(auto-fill, minmax(min(100%, max(220px, calc(20% - 1rem))), 1fr));
  gap: 1rem;
  display: grid;
  /* Duplicamos el contenido, así que necesitamos el doble de ancho */
}


.flex-item {
 
  width: 100%
  height: auto;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 1.5rem;
}

.number{
  color: #4e763f;
}
.img-effect {
  background: #4e763f;
}

</style>

<!-- Contenedor principal con la clase scroll-container -->
<div class="scroll-container">
    <div class="flex-container gap-6">
        <?php 
        $count = 0;
        // Primera copia de los elementos
        if (!empty($all_subcategories)): 
            foreach ($all_subcategories as $subcategory): 
                $count++;
                $category_image = get_field('imagen', 'categoria_producto_' . $subcategory->term_id);
                $image_url = $category_image ? $category_image['url'] : get_template_directory_uri() . '/assets/img/default-category.jpg';
        ?>
            <div class="flex-item bg-bg-primary group p-10">
                <a href="<?php echo get_term_link($subcategory); ?>" class="link-under !no-underline w-full h-full flex flex-col gap-2">
                    <div class="relative aspect-video rounded-full flex items-center justify-between flex-row gap-2 w-full img-div">
                        <?php if ($image_url): ?>
                            <img 
                                src="<?php echo esc_url($image_url); ?>" 
                                alt="<?php echo esc_attr($subcategory->name); ?>"
                                class="img-effect p-4 w-[80px] h-auto aspect-square object-cover border-[1px] border-bg-secondary rounded-full "
                            >
                            <span class="text-[60px] font-bold number">0<?= $count;?></span>
                        <?php endif; ?>
                        
                    </div>
                    <div class="p-2 w-full">
                        <h3 class="text-base hd:text-xl text-center w-full font-semibold text-white !no-underline h-10 group-hover:text-bg-secondary">
                            <?php echo esc_html($subcategory->name); ?>
                        </h3>
                        
                    </div>
                </a>
            </div>
        <?php 
            endforeach;
        endif; 
        ?>       
    </div>
</div>