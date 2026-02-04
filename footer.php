<footer class="bg-bg-primary text-white relative footer-clip-path pt-32 overflow-hidden">
    <!-- Elemento decorativo superior -->
    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600"></div>

    <div class="container mx-auto px-5 py-16">
        <!-- Sección principal del footer -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Columna izquierda: Logo, descripción y contacto -->
            <div class="space-y-8">
                <!-- Logo y nombre de la empresa -->
                <div class="flex items-center gap-4">
                    <?php
                    $logo = get_theme_mod('custom_logo');
                    if ($logo):
                        $logo_url = wp_get_attachment_url($logo);
                    ?>
                        <div class="bg-white/10 backdrop-blur-sm p-4 rounded-2xl border border-white/20 shadow-lg">
                            <img src="<?php echo esc_url($logo_url); ?>"
                                alt="<?php bloginfo('name'); ?>"
                                class="h-20 w-auto object-contain">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Descripción -->
                <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                    <?php echo esc_html(get_option('yato_description', 'Somos una empresa comprometida con ofrecer soluciones innovadoras y de calidad para nuestros clientes.')); ?>
                </p>

                <!-- Información de contacto -->
                <div class="space-y-4">
                    <h4 class="text-xl font-semibold text-white mb-4">Contacto</h4>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <p class="text-gray-300"><?php echo esc_html(get_option('yato_contact_address', 'Av. Principal 123, Arequipa, Perú')); ?></p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" clip-rule="evenodd" />
                            </svg>
                            <a href="tel:<?php echo esc_attr(get_option('yato_contact_phone', '+123 456 789')); ?>"
                                class="text-gray-300 hover:text-yellow-400 transition-colors">
                                <?php echo "+51 " . esc_html(get_option('yato_contact_phone', '+123 456 789')); ?>
                            </a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <a href="mailto:<?php echo esc_attr(get_option('yato_contact_email', 'info@yato.com')); ?>"
                                class="text-gray-300 hover:text-yellow-400 transition-colors">
                                <?php echo esc_html(get_option('yato_contact_email', 'info@yato.com')); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna derecha: Mapa y enlaces rápidos -->
            <div class="space-y-8">
                <!-- Mapa -->
                <div>
                    <h4 class="text-xl font-semibold text-white mb-4">Nuestra Ubicación</h4>
                    <div class="bg-bg-primarydark rounded-xl overflow-hidden shadow-lg">
                        <div class="h-64 md:h-72">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d956.8718027742242!2d-71.58090689374531!3d-16.400064059975563!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91423584f9c323bf%3A0xb3372f0b410b20ea!2sYato!5e0!3m2!1ses-419!2spe!4v1741402190993!5m2!1ses-419!2spe"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-full"
                                title="Ubicación de Yato en Google Maps">
                            </iframe>
                        </div>
                        <div class="p-4 bg-bg-primarydark">
                            <p class="text-gray-300 text-sm"><?php echo esc_html(get_option('yato_contact_address', 'Av. Principal 123, Arequipa, Perú')); ?></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-green-700 pt-8 mt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Redes sociales -->
                <div>
                    <h5 class="text-gray-300 text-sm font-semibold mb-4">Síguenos en redes sociales</h5>
                    <div class="flex gap-4">
                        <?php if (get_option('yato_social_facebook')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_facebook')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_instagram')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_instagram')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.148 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z" />

                                    <!-- Círculo grande central (lente) -->
                                    <path d="M12 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4z" />

                                    <!-- Punto pequeño superior derecho (visor) -->
                                    <circle cx="18.406" cy="5.595" r="1.44" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_tiktok')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_tiktok')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_youtube')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_youtube')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21.58 5.4a2.76 2.76 0 0 0-1.94-1.95C17.92 3 12 3 12 3s-5.92 0-7.64.45A2.76 2.76 0 0 0 2.42 5.4C2 7.12 2 12 2 12s0 4.88.42 6.6a2.76 2.76 0 0 0 1.94 1.95C6.08 21 12 21 12 21s5.92 0 7.64-.45a2.8 2.8 0 0 0 1.94-1.95C22 16.88 22 12 22 12s0-4.88-.42-6.6zM9.75 15.02V8.98L15 12l-5.25 3.02z"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_twitter')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_twitter')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_linkedin')): ?>
                            <a href="<?php echo esc_url(get_option('yato_social_linkedin')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19.7 3H4.3A1.3 1.3 0 003 4.3v15.4A1.3 1.3 0 004.3 21h15.4a1.3 1.3 0 001.3-1.3V4.3A1.3 1.3 0 0019.7 3zM8.339 17.3H5.667v-8.59h2.672v8.59zM7.004 7.547A1.547 1.547 0 115.457 6a1.547 1.547 0 011.547 1.547zM17.3 17.3h-2.669v-4.177c0-.996-.017-2.278-1.387-2.278-1.389 0-1.601 1.086-1.601 2.206v4.249h-2.667v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092V17.3z" />
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (get_option('yato_social_whatsapp')): ?>
                            <a href="https://wa.me/<?php echo esc_attr(get_option('yato_social_whatsapp')); ?>"
                                target="_blank"
                                class="bg-bg-primarydark hover:bg-yellow-500 text-white p-3 rounded-full transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.76.982.998-3.677-.236-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.9 6.994c-.004 5.45-4.438 9.88-9.888 9.88m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.333.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.333 11.893-11.893 0-3.18-1.24-6.162-3.495-8.411" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Menú legal -->
                <div class="text-center md:text-right">
                    <div class="flex flex-wrap justify-center md:justify-end gap-4 text-sm text-gray-300">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-principal2',
                            'container' => false,
                            'menu_class' => 'flex flex-wrap justify-center md:justify-end gap-4',
                            'link_class' => 'hover:text-yellow-400 transition-colors'
                        ));
                        ?>
                    </div>
                    <p class="text-gray-200 text-sm mt-4">
                        &copy; <?php echo date('Y'); ?> <?php echo esc_html(get_option('company_name', 'Yato')); ?>. Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<?php wp_footer(); ?>
</body>

</html>