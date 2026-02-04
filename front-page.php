<?php get_header(); ?>

<?php
get_template_part('template-parts/front-page/header-banner');
?>

<?php
if (have_posts()):
  while (have_posts()):
    the_post();
    $services_data = get_field('services');
    $ambiental = get_field('responsabilidad_ambiental');
    $header_data = get_field('header');
    $marcas_data = get_field('marcas_galeria');
    ?>
    <main class=" pb-20 hd:pb-32 relative">
      <section class="pt-0">
        <?php get_template_part('template-parts/marcas-slider'); ?>
      </section>
      <!--MOSTRAR VIDEO -->
      <?php
      $group = get_field('nosotros');
      ?>
      <?php if ($group['titulo']): ?>
        <section
          class="flex flex-col pt-10 px-5 py-20 hd:p-20 items-center justify-center relative gap-4 bg-gradient-to-br from-white via-gray-50 to-bg-primary/5">
          <div class="relative">
            <img src="<?= $group["imagen"]["url"] ?>" class="rounded-2xl min-h-[150px] object-cover">
            <div
              class="md:flex bg-bg-primary absolute -left-[10px] hd:-left-10 -bottom-10 rounded-2xl hidden flex-col p-8 max-w-[350px] xl:aspect-square items-left justify-center gap-8">
              <div>
                <h2 class="text-xl text-white">Sobre Nosotros</h2>
                <span class="block w-1/2 min-w-[100px] rounded-lg h-1 mt-2  bg-white"></span>
              </div>
              <p class="text-sm hd:text-md text-white"><?= $group["texto"] ?></p>
              <a href="<?= $group["link"] ?>"
                class="min-w-[150px] text-center text-sm bg-white rounded-full p-2 block w-fit px-5"><?= $group["texto_link"] ?></a>
            </div>
          </div>
          <div class="md:hidden bg-bg-primary  rounded-2xl flex flex-col p-6 w-full  items-left justify-center gap-4">
            <div>
              <h2 class="text-lg text-white">Sobre Nosotros</h2>
              <span class="block w-1/2 min-w-[100px] rounded-lg h-1 mt-2  bg-white"></span>
            </div>
            <p class="text-xs text-white"><?= $group["texto"] ?></p>
            <a href="<?= $group["link"] ?>"
              class="min-w-[150px] text-center text-xs bg-white rounded-full p-2 block w-fit px-5"><?= $group["texto_link"] ?></a>
          </div>
        </section>
      <?php endif; ?>
      <!--END VIDEO -->

      <!--MOSTRAR CATEGOIRIAS-->
      <?php get_template_part('template-parts/front-page/categorias2'); ?>
      <!--END MOSTRAR CATEGOIRIAS-->
      <!--REPUESTOS-->
      <?php get_template_part('template-parts/front-page/repuestos2'); ?>
      <!--END REPUESTOS-->
      <!--BLOG-->
      <?php get_template_part('template-parts/front-page/blog'); ?>

      <!--MARCAS GALERIA-->
      <?php get_template_part('template-parts/front-page/marcas-galeria'); ?>
      <!--END MARCAS GALERIA-->
      <!--CONTACT-->
      <?php get_template_part('template-parts/contact-form'); ?>
      <!--END CONTACT-->



    </main>
  <?php endwhile;
endif;
?>



<?php get_footer(); ?>