<header class="header flex gap-0 relative w-full flex-col-reverse hd:flex-row">
    <?php 
    if (have_posts()) :
        while (have_posts()) :
            the_post();            
            $header_data = get_field('header');            
            ?>            
            <div class="w-full hd:w-6/12 flex flex-col bg-green-50 relative">
              <div class="card-years-experience flex flex-col gap-8 p-12 w-11/12 hd:w-[350px] h-[370px] shadow-lg z-50 " style="background-image: url('<?= $header_data['background_imagen']['url']?>');">
                <img class="w-[60px] h-auto" src="<?= $header_data['icono']['url']?>"/>
                <p class="text-[80px] font-bold my-5 text-texto-primary"><?= $header_data['years']?>+</p>
                <p class="text-2xl font-medium text-texto-title">años de experiencia</p>
              </div>
              <div class="py-20 px-20 pb-10 w-full z-10">
                <h1 class="text-bg-secondary title-header max-w-[35vw]"><?= $header_data['title'] ?></h1>
              </div>
              <div class="w-full flex flex-nowrap h-full relative">
                <span class="w-40 block aspect-square absolute left-0 bottom-0 bg-bg-primary"></span>
                <div class="flex-1 px-20 ">
                  <p class=" text-2xl max-w-[300px] relative"><?=  $header_data['paragraph'] ?></p>               
                  <a class="animation-link w-fit relative mt-5 z-20 block uppercase text-bg-secondary font-bold no-underline" href="<?=$header_data['link'][0]->guid ?>">Ver nuestro catálogo</a>
                </div>
              </div>
            </div>
            <div class="w-6/12 h-full swiper home-header-slider ">
              <div class="w-full h-full swiper-wrapper">
              <?php 
                foreach ($header_data['gallery'] as $value) { ?>
                  <div class="swiper-slide w-full">
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

<header class="header-movil flex gap-0 relative w-full flex-col-reverse">
    <?php 
    if (have_posts()) :
        while (have_posts()) :
            the_post();            
            $header_data = get_field('header');            
            ?>            
            <div class="w-full  flex flex-col bg-green-50 relative pb-10">              
              <div class="p-10 w-full z-10">
                <h1 class="text-bg-secondary title-header"><?= $header_data['title'] ?></h1>
              </div>
              <div class="w-full flex flex-nowrap h-full relative">
              
                <div class="flex-1 px-10">
                  <p class=" text-2xl max-w-[300px] relative"><?=  $header_data['paragraph'] ?></p>               
                  <a class="animation-link w-fit relative mt-5 z-20 block uppercase text-bg-secondary font-bold no-underline" href="<?=$header_data['link'][0]->guid ?>">Ver nuestro catálogo</a>
                </div>
              </div>
              <div class="mt-16 card-years-experience-mobile flex flex-col gap-8 p-12 mx-auto w-11/12 sm:w-[350px] h-[370px] shadow-lg z-50 " style="background-image: url('<?= $header_data['background_imagen']['url']?>');">
                <img class="w-[60px] h-auto" src="<?= $header_data['icono']['url']?>"/>
                <p class="text-[80px] font-bold my-5 text-texto-primary"><?= $header_data['years']?>+</p>
                <p class="text-2xl font-medium text-texto-title">años de experiencia</p>
              </div>
            </div>
            <div class="w-full  max-h-[380px] h-full swiper home-header-slider ">
              <div class="w-full h-full swiper-wrapper">
              <?php 
                foreach ($header_data['gallery'] as $value) { ?>
                  <div class="swiper-slide w-full">
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