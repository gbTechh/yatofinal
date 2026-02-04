<?php
/*
Template Name: Pagina de nosotros
*/

get_header();
?>

<?php
if (have_posts()):
  while (have_posts()):
    the_post();
    $banner = get_field('banner');
    $historia = get_field('historia');
    $garantia = get_field('garantia');
    $mision_vision = get_field('mision_vision');
    $valores = get_field('valores');
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
            <img src="<?= $banner["url"] ?>" alt="Fabricación" class="w-full h-full object-cover z-10 relative" />
            <!-- Overlay degradado -->
            <div
              class="absolute inset-0 bg-gradient-to-r from-bg-primary/40 via-bg-primary/15 to-transparent top-0 left-0 z-20">
            </div>
          </div>

        </div>
      </div>

      <!-- Contenido -->
      <div class="relative z-10 container mx-auto px-6 md:px-12 h-full ">
        <div class="grid grid-cols-1 lg:grid-cols-3 h-full items-center">

          <!-- Texto en parte izquierda -->
          <div class="">
            <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 ">Nosotros</h1>
          </div>

          <!-- Imagen ocupa 2 columnas -->
          <div class="hidden lg:block lg:col-span-2"></div>

        </div>
      </div>

    </header>
    <main class=" flex flex-col items-center justify-center">
      <section class="p-6 md:px-20 pt-20 flex flex-col hd:flex-row gap-20 justify-between max-w-[1100px]">
        <div class="flex-1 flex items-center justify-center">
          <img src="<?= $historia["imagen"]["url"] ?>" class="rounded-2xl" />
        </div>
        <div class="flex-1 flex flex-col gap-4 justify-center ">
          <h1 class="text-3xl hd:text-3xl text-black font-black w-full "><?= $historia["titulo"] ?></h1>
          <?php foreach ($historia["texto"] as $text) { ?>
            <p class="paragraph-sm w-full hd:w-3/4"><?= $text['parrafo'] ?></p>
          <?php } ?>
        </div>
      </section>
      <div class="w-full my-4 hd:my-10"></div>
      <section class="py-20 bg-bg-primary/80 relative w-full page-nosotros-rombo">
        <div class="relative w-full py-20 page-nosotros-rombo bg-green-700 ">
          <img src="<?= $garantia["banner"]["url"] ?>" alt="Plantas YATO"
            class="w-full h-full object-cover  absolute left-0 top-0">
          <!-- Contenido -->
          <div class="z-10 p-6 md:px-20 py-10 max-w-[1100px] mx-auto px-4 relative flex flex-col hd:flex-row gap-5">

            <h2 class="text-3xl font-bold flex items-center  text-white flex-1"><?= $garantia["titulo"] ?></h2>
            <p class="flex-1 text-white w-3/4 hd:w-full">
              <?= $garantia["texto"] ?>
            </p>
          </div>
        </div>
      </section>
      <div class="w-full my-4 hd:my-10"></div>
      <section class="w-full p-6 md:px-20  flex flex-col gap-6 max-w-[1100px]">
        <div class=" flex flex-col gap-4 hd:gap-0 hd:flex-row items-center justify-center">
          <div
            class="shadow-lg flex flex-col gap-10 rounded-2xl hd:aspect-square hd:p-10 p-6  h-[350px] hd:rounded-none hd:rounded-l-2xl flex-1 bg-bg-primary">
            <h3 class="text-white">Misión</h3>
            <p class="paragraph-sm text-white"><?= $mision_vision["mision"] ?></p>
          </div>
          <img src="<?= $mision_vision["imagen"]["url"] ?>" class="shadow-lg h-[450px] object-cover flex-1 rounded-2xl " />
          <div
            class="shadow-lg flex flex-col gap-10 rounded-2xl hd:aspect-square hd:p-10 p-6  hd:rounded-none hd:rounded-r-2xl flex-1 h-[350px] bg-bg-primary">
            <h3 class="text-white">Visión</h3>
            <p class="paragraph-sm text-white  "><?= $mision_vision["vision"] ?></p>
          </div>

        </div>
      </section>
      <div class="w-full my-4 hd:my-10"></div>
      <section class="w-full p-6 md:px-20 pb-20 flex flex-col gap-6 max-w-[1250px]">
        <h2 class="text-3xl hd:text-3xl text-black font-black w-full mb-10 hd:mb-20"><?= $valores["titulo"] ?></h2>
        <div class="grid grid-cols-1 hd:grid-cols-2">
          <?php foreach ($valores["item"] as $item) { ?>
            <div class="flex gap-5 py-5">
              <div class="bg-bg-primary  p-6 w-32 h-32 hd:w-40 hd:h-40 flex items-center justify-center flex-1 aspect-square">
                <img src="<?= $item["icono"]["url"] ?>"
                  class="min-w-32  block w-full h-full object-contain brightness-0 invert" />
              </div>
              <div class="flex flex-col gap-2 flex-2">
                <h3 class="text-bg-primary text-xs hd:text-xl"><?= $item["titulo"] ?></h3>
                <p class="paragraph-sm w-full hd:w-3/4"><?= $item['texto'] ?></p>
              </div>
            </div>
          <?php } ?>
        </div>
      </section>

    </main>
  <?php endwhile;
endif;
?>



<?php get_footer(); ?>