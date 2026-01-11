<header class="relative h-vh min-h-[600px] ">

  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      $header_data = get_field('header');
  ?>

      <div class="w-full h-[90svh] swiper home-header-slider ">
        <div class="w-full h-[90svh] swiper-wrapper">
          <?php
          foreach ($header_data['gallery'] as $value) { ?>
            <div class="swiper-slide h-full relative">
              <div class="absolute container mx-auto top-0 left-0 z-30 h-full w-full">
                <div class="w-full max-w-[800px] flex flex-col h-full relative justify-end pb-28 hd:pb-32 gap-5 hd:gap-10">
                  <h1 class="text-white title-header"><?= $header_data['title'] ?></h1>
                  <p class="text-white paragraph mb-4"><?= $header_data['paragraph'] ?></p>
                  <a class="paragraph-sm p-4 px-10 rounded-full bg-bg-primary transition-all hover:bg-bg-secondary text-white w-fit relative block font-medium no-underline" href="<?= $header_data['link'][0]->guid ?>">Ver nuestro catálogo</a>
                </div>
              </div>
              <div class="top-0 left-0 w-full h-full absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <img src="<?= $value['url'] ?>" class=" w-full h-full block object-cover " />

            </div>
          <?php }
          ?>
        </div>
      </div>
  <?php
    endwhile;
  endif;
  ?>
</header>