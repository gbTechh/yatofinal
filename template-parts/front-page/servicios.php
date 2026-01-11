 <?php if($services_data['title']):?>
          <section class="px-5 py-14 hd:p-20 flex flex-col hd:flex-row  flex-nowrap gap-20">
            <div class="flex-[1] flex flex-col gap-8">
              <h1 class="title text-black"><?= $services_data['title']?></h1>
              <p class="paragraph" ><?= $services_data['paragraph'] ?></p>          
              <a class="link animation-link relative" href="<?= $services_data['link'] ?>">Nusestros servicios</a>
            </div>
            <div class="flex-[3] hidden hd:flex">
              <!--AGREGAR SEVICIOS-->
              <div class="swiper services-slider max-w-[500px]">
                <!-- Navegación personalizada -->
          
                
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'servicio',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );

                    $servicios = new WP_Query($args);

                    if ($servicios->have_posts()) :
                        while ($servicios->have_posts()) : $servicios->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="service-card bg-white relative flex flex-col gap-4">
                                   <a href="<?php the_permalink(); ?>" 
                                      class="title link !text-4xl !text-bg-primary uppercase !font-black mb-6">
                                         <?php the_title(); ?>
                                    </a>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="relative min-h-[400px]  p-8">
                                            <?php the_post_thumbnail('medium', array(
                                                'class' => 'w-full h-full  object-contain  z-10'
                                            )); ?>
                                        </div>
                                    <?php endif; ?>
                                
                                  

                                   
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
              </div>
            </div>
          </section>
          <?php endif; ?>