<div class="w-full flex justify-between items-center bg-white h-24 container">
    <!-- Logo -->
    <div class="logo-container flex-1 flex items-center max-w-[150px] mr-10 justify-center">
        <?php if (has_custom_logo()):
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo home_url('/'); ?>" class="w-full block no-underline">
                <img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo get_bloginfo('name'); ?>" class="w-full logo" />
            </a>
        <?php else: ?>
            <a href="<?php echo home_url('/'); ?>" class="text-xl w-full no-underline">
                <span class="font-titillium text-3xl text-texto-primary font-extrabold">YATO</span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Menú Hamburguesa (Icono para móviles) -->
    <button id="menu-toggle" class="hd:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>

    <!-- Menú Desktop -->
    <nav id="desktop-menu" class="hidden hd:flex flex-1 paragraph-sm text-black group-hover:text-black">
        <?php
        $args = array(
            'theme_location' => 'menu-principal',
            'container' => false, // Eliminamos el contenedor por defecto
            'menu_class' => 'flex flex-row space-x-6', // Estilos para el menú desktop
        );
        wp_nav_menu($args);
        ?>
    </nav>
</div>

<!-- Menú Mobile (Pantalla completa) -->
<div id="mobile-menu" class="fixed inset-0 bg-white z-50 hidden hd:hidden">
    <!-- Botón para cerrar el menú mobile -->
    <button id="close-menu" class="absolute top-6 right-6 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <!-- Contenido del menú mobile -->
    <nav class="flex flex-col items-center justify-center h-full">
        <?php
        $args = array(
            'theme_location' => 'menu-principal',
            'container' => false, // Eliminamos el contenedor por defecto
            'menu_class' => 'flex flex-col space-y-6 text-center', // Estilos para el menú mobile
        );
        wp_nav_menu($args);
        ?>
    </nav>
</div>

<!-- Script para manejar el menú hamburguesa y el menú mobile -->
<script>
    // Abrir menú mobile
    document.getElementById('menu-toggle').addEventListener('click', function  () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.remove('hidden'); // Mostrar menú mobile
    });

    // Cerrar menú mobile
    document.getElementById('close-menu').addEventListener('click', functio n () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.add('hidden'); // Ocultar menú mobile
    });
</script>