 <div class="w-full flex justify-between items-center bg-transparent h-24 container ">
     
     
        <?php 
        $args = array(
          'theme_location' => 'menu-principal',
          'container' => 'nav',
          'container_class' => 'flex-1 paragraph-sm text-white group-hover:text-black '
        );
        wp_nav_menu($args);
      ?>
      <div class="logo-container flex-1 flex items-center max-w-[150px] justify-center">
        <?php if (has_custom_logo()): 
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
        ?>
            <a href="<?php echo home_url('/'); ?>" class="w-full block no-underline">
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
          'theme_location' => 'menu-principal2',
          'container' => 'nav',
          'container_class' => 'flex-1 paragraph-sm text-white group-hover:text-black'
        );
        wp_nav_menu($args);
      ?>
      
    </div>