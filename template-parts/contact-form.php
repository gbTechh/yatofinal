<?php
$phone = get_option('yato_contact_phone');
$email = get_option('yato_contact_email');
$address = get_option('yato_contact_address');
// $whatsapp = get_option('yato_contact_whatsapp'); // Se usa $phone o se añade este si es diferente
?>

<div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
    <div class="flex flex-col md:flex-row">
        <!-- Left column - Company Info -->
        <div class="bg-gray-50 p-12 md:w-2/5">
            <h2 class="text-2xl font-bold text-bg-primary mb-8">Ponte en contacto</h2>

            <div class="flex items-start mb-10">
                <div class="bg-bg-primary text-white p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-bg-primary">Oficina</h3>
                    <p class="text-gray-700 text-sm"><?php echo nl2br(esc_html($address)); ?></p>
                </div>
            </div>

            <div class="flex items-start mb-10">
                <div class="bg-green-600 text-white p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-bg-primary">Correo Electrónico</h3>
                    <p class="text-gray-700"><?php echo esc_html($email); ?></p>
                </div>
            </div>

            <div class="flex items-start mb-10">
                <div class="bg-green-600 text-white p-3 rounded-full mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-bg-primary">Teléfono</h3>
                    <p class="text-gray-700">Celular: +<?php echo esc_html($phone); ?></p>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="mt-12">
                <h3 class="font-bold text-sm text-bg-primary mb-4 border-t-2 border-t-gray-200 pt-4">Sigue nuestras
                    redes sociales</h3>
                <div class="flex space-x-3">
                    <?php if (get_option('yato_social_facebook')): ?>
                        <a href="<?php echo esc_url(get_option('yato_social_facebook')); ?>" target="_blank"
                            class="bg-green-600 text-white p-2 rounded-full hover:bg-bg-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if (get_option('yato_social_instagram')): ?>
                        <a href="<?php echo esc_url(get_option('yato_social_instagram')); ?>" target="_blank"
                            class="bg-green-600 text-white p-2 rounded-full hover:bg-bg-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    <?php endif; ?>

                    <?php if (get_option('yato_social_tiktok')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_tiktok')); ?>"
                        class="bg-green-600 text-white p-2 rounded-full hover:bg-bg-primary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                        </svg>
                    </a>
                    <?php endif; ?>

                    <?php if (get_option('yato_social_youtube')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_youtube')); ?>"
                        class="bg-green-600 text-white p-2 rounded-full hover:bg-bg-primary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>
                    <?php endif; ?>

                     <?php if (get_option('yato_social_twitter')): ?>
                    <a href="<?php echo esc_url(get_option('yato_social_twitter')); ?>"
                        class="bg-green-600 text-white p-2 rounded-full hover:bg-bg-primary transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Right column - Contact Form -->
        <div class="p-12 md:w-3/5">
            <h2 class="text-2xl font-bold text-bg-primary mb-8">Envíanos un mensaje</h2>

            <?php
            // Show success message if form was submitted
            if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'enviado') {
                echo '<div class="bg-green-100 border border-green-400 text-bg-primary px-4 py-3 rounded mb-6" role="alert">
                    <p>¡Gracias! Tu mensaje ha sido enviado exitosamente.</p>
                </div>';
            }
            ?>

            <form id="contactForm" class="space-y-3" method="POST">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="nombre" id="nombre" required
                            class="block w-full rounded-full py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label for="compania" class="block text-sm font-medium text-gray-700 mb-1">Compañía</label>
                        <input type="text" name="compania" id="compania"
                            class="block w-full rounded-full py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="celular" class="block text-sm font-medium text-gray-700 mb-1">Celular</label>
                        <input type="tel" name="celular" id="celular"
                            class="block w-full rounded-full py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input type="email" name="email" id="email" required
                            class="block w-full rounded-full py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm">
                    </div>
                </div>

                <div>
                    <label for="asunto" class="block text-sm font-medium text-gray-700 mb-1">Asunto</label>
                    <input type="text" name="asunto" id="asunto" required
                        class="block w-full rounded-full py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="5" required
                        class="block w-full rounded-2xl py-3 px-3 focus:outline-none focus:ring-2 focus:ring-green-500 bg-gray-200 focus:border-transparent text-sm"></textarea>
                </div>

                <?php wp_nonce_field('submit_mensaje', 'mensaje_nonce'); ?>

                <div>
                    <button type="submit"
                        class="w-full bg-bg-primary text-white py-3 px-4 rounded-full hover:bg-bg-primary transition-colors font-medium">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>