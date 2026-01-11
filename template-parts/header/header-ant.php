  <div class="w-full h-auto flex flex-col">
    <div class="bg-bg-secondary flex items-center justify-between h-10 px-2 md:px-8 ">
      <div class="header-contact w-full flex justify-between items-center">
            <!-- Redes sociales -->
            <div class="flex items-center gap-4">
                <?php if(get_option('yato_social_facebook')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_facebook')); ?>" 
                       target="_blank"
                       class="text-white hover:text-bg-primary transition-colors">
                        <i class='bx bxl-facebook text-lg'></i>
                    </a>
                <?php endif; ?>
                
                <?php if(get_option('yato_social_instagram')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_instagram')); ?>" 
                       target="_blank"
                       class="text-white hover:text-bg-primary transition-colors">
                        <i class='bx bxl-instagram text-lg'></i>
                    </a>
                <?php endif; ?>
                
                <?php if(get_option('yato_social_linkedin')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_linkedin')); ?>" 
                       target="_blank"
                       class="text-white hover:text-bg-primary transition-colors">
                        <i class='bx bxl-linkedin text-lg'></i>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Enlaces de navegación -->
            <nav class="hidden md:flex items-center gap-6 text-sm text-white">
                <a href="#" class="text-white transition-colors">UBÍCANOS</a>
            </nav>
        </div>
    </div>
    <div class="w-full flex justify-between items-center bg-bg-gray px-2 md:px-8 h-20 pr-0 md:pr-0">
      <div class="logo-container w-[250px]">
        <?php if (has_custom_logo()): 
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
            <a href="<?php echo home_url('/'); ?>" class="w-full block no-underline pr-8">
                <img src="<?php echo esc_url($logo[0]); ?>" 
                     alt="<?php echo get_bloginfo('name'); ?>" 
                     class="w-full logo" />
            </a>
        <?php else: ?>
            <a href="<?php echo home_url('/'); ?>" class="text-xl w-full no-underline">
              <span class="font-titillium text-3xl text-texto-primary font-extrabold ">YATO</span>

            </a>
        <?php endif; ?>
      </div>
     
        <?php 
        $args = array(
          'theme_location' => 'menu-principal',
          'container' => 'nav',
          'container_class' => ' menu-item  w-full h-full flex justify-start items-center'
        );
        wp_nav_menu($args);
      ?>
    
      <div class="menu-nav h-full w-[450px] min-w-[450px]">
        
        <?php 
          $args = array(
            'theme_location' => 'menu-principal2',
            'container' => 'nav',
            'container_class' => ' w-full  flex-1 h-full'
          );
          wp_nav_menu($args);
        ?>
        
      </div>
    </div>
  </div>