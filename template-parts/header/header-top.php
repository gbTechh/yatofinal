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