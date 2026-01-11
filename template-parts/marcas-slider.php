<?php
$marcas = get_field('marcas');

?>
<style>
  @keyframes scroll {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-20%);
    }
  }

  .scroll-container-marcas {
    width: 100%;
    overflow: hidden;
    position: relative;
  }

  .flex-container-marcas {
    display: flex;
    flex-wrap: nowrap;
    animation: scroll 70s linear infinite;
    /* Duplicamos el contenido, así que necesitamos el doble de ancho */
    width: max-content;
  }

  .flex-container-marcas:hover {
    animation-play-state: running;
  }

  .flex-item-marcas {
    flex: 0 0 200px;

    aspect-ratio: 16/9;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  @media (width >=985px) {
    .flex-item-marcas {
      flex: 0 0 250px;
    }
  }
</style>

<!-- Contenedor principal con la clase scroll-container-marcas -->
<div class="scroll-container-marcas">
  <div class="flex-container-marcas gap-4">
    <?php
    // Primera copia de los elementos
    if (!empty($marcas)):
      foreach ($marcas as $marca):

    ?>
        <div class="flex-item-marcas p-5 w-full">
          <div class="relative p-2 rounded-lg   flex items-center justify-center flex-col gap-1 w-full h-full">
            <?php if ($marca['url']): ?>
              <div class="absolute w-full h-full top-0 left-0 z-10 rounded-lg"></div>
              <img
                src="<?php echo esc_url($marca['url']); ?>"
                alt="<?php echo esc_attr('marca'); ?>"
                class="w-full h-full object-contain  opacity-95">
            <?php endif; ?>
          </div>
        </div>
    <?php
      endforeach;
    endif;
    ?>


    <?php
    // Primera copia de los elementos
    if (!empty($marcas)):
      foreach ($marcas as $marca):

    ?>
        <div class="flex-item-marcas p-5 w-full">
          <div class="relative p-2 rounded-lg   flex items-center justify-center flex-col gap-1 w-full h-full">
            <?php if ($marca['url']): ?>
              <div class="bg-black/05 absolute w-full h-full top-0 left-0 z-10 rounded-lg"></div>
              <img
                src="<?php echo esc_url($marca['url']); ?>"
                alt="<?php echo esc_attr('marca'); ?>"
                class="w-full h-full object-contain  opacity-95">
            <?php endif; ?>
          </div>
        </div>
    <?php
      endforeach;
    endif;
    ?>




  </div>
</div>