<?php
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function yato_support()
{
    // Enqueue editor styles.
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'yato_support');

function yato_styles()
{
    // Estilos
    // Estilos
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true);
    wp_enqueue_script('categories-slider', get_template_directory_uri() . '/assets/js/categories-slider.js', array('swiper'), '1.0.0', true);
    wp_enqueue_script('app-scripts', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', true);
    wp_register_script('home', get_template_directory_uri() . '/assets/js/home.js', array('swiper'), '1.0.0', true);
    // Registrar y encolar scripts principales
    wp_register_script(
        'formHandler',
        get_template_directory_uri() . '/assets/js/formHandler.js',
        array(),
        '1.0.0',
        true
    );
    wp_script_add_data('formHandler', 'type', 'module');

    // Registrar carrusel
    wp_register_script(
        'carrusel',
        get_template_directory_uri() . '/assets/js/carrusel.js',
        array(), // Quitamos la dependencia circular
        '1.0.0',
        true
    );
    wp_script_add_data('carrusel', 'type', 'module');

    wp_register_script(
        'contact',
        get_template_directory_uri() . '/js/contact.js',
        array('formHandler'),
        '1.0.0',
        true
    );
    wp_script_add_data('contact', 'type', 'module');
    wp_register_script(
        'map',
        get_template_directory_uri() . '/js/contact.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_script_add_data('map', 'type', 'module');

    wp_register_script(
        'services-slider',
        get_template_directory_uri() . '/assets/js/services-slider.js',
        array('swiper'),
        '1.0.0',
        true
    );


    if (is_front_page()) {
        wp_enqueue_script('carrusel');
        wp_enqueue_script('home');
        wp_enqueue_script('services-slider');

    }

    if (is_page('eventos')) {
        wp_enqueue_script('eventos');
    }

    if (is_page('contacto')) {
        wp_enqueue_script('map');
        wp_enqueue_script('contact');
        wp_enqueue_script('formHandler'); // Aseguramos que formHandler se cargue
    }
}
add_action('wp_enqueue_scripts', 'yato_styles');

function yato_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    register_nav_menus(
        array(
            'menu-principal' => esc_html__('Menu principal', 'yato'),
            'menu-principal2' => esc_html__('Menu principal2', 'yato'),
        )
    );
}
add_action('after_setup_theme', 'yato_setup');

require_once get_template_directory() . '/inc/acf-fields.php';

// Manejar el envío del formulario de contacto
function yato_procesar_formulario_contacto()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mensaje_nonce'])) {
        if (!wp_verify_nonce($_POST['mensaje_nonce'], 'submit_mensaje')) {
            die('Verificación de seguridad fallida');
        }

        $nombre = sanitize_text_field($_POST['nombre']);
        $email = sanitize_email($_POST['email']);
        $asunto = sanitize_text_field($_POST['asunto']);
        $mensaje = sanitize_textarea_field($_POST['mensaje']);
        $compania = isset($_POST['compania']) ? sanitize_text_field($_POST['compania']) : '';
        $celular = isset($_POST['celular']) ? sanitize_text_field($_POST['celular']) : '';

        // Crear el post del mensaje
        $post_data = array(
            'post_title' => wp_strip_all_tags($asunto),
            'post_content' => $mensaje,
            'post_status' => 'publish',
            'post_type' => 'mensaje'
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            // Guardar meta datos adicionales
            update_post_meta($post_id, '_contacto_nombre', $nombre);
            update_post_meta($post_id, '_contacto_email', $email);
            update_post_meta($post_id, '_contacto_compania', $compania);
            update_post_meta($post_id, '_contacto_celular', $celular);

            // Obtener el email del administrador o el configurado en las opciones
            $to_email = get_option('yato_contact_email');
            if (empty($to_email)) {
                $to_email = get_option('admin_email');
            }

            $sitio = get_bloginfo('name');
            $sitio_url = get_bloginfo('url');

            // Asunto del correo
            $email_subject = "Nuevo mensaje de contacto - $asunto";

            // Construir el contenido HTML del correo
            $email_body = "
            <html>
            <head>
                <title>Nuevo mensaje de contacto</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        line-height: 1.6;
                        color: #333;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #f9f9f9;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                    }
                    h2 {
                        color: #4CAF50;
                        border-bottom: 1px solid #ddd;
                        padding-bottom: 10px;
                    }
                    .info {
                        margin-bottom: 20px;
                    }
                    .label {
                        font-weight: bold;
                    }
                    .mensaje {
                        background-color: #fff;
                        padding: 15px;
                        border: 1px solid #ddd;
                        border-radius: 3px;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 12px;
                        color: #777;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h2>Nuevo mensaje de contacto en $sitio</h2>
                    <div class='info'>
                        <p><span class='label'>De:</span> $nombre</p>";

            if (!empty($compania)) {
                $email_body .= "<p><span class='label'>Compañía:</span> $compania</p>";
            }

            $email_body .= "
                        <p><span class='label'>Email:</span> $email</p>";

            if (!empty($celular)) {
                $email_body .= "<p><span class='label'>Celular:</span> $celular</p>";
            }

            $email_body .= "
                        <p><span class='label'>Asunto:</span> $asunto</p>
                    </div>
                    <div class='mensaje'>
                        <p><span class='label'>Mensaje:</span></p>
                        <p>" . nl2br($mensaje) . "</p>
                    </div>
                    <div class='footer'>
                        <p>Este mensaje fue enviado desde el formulario de contacto en <a href='$sitio_url'>$sitio</a></p>
                        <p>Puedes ver todos los mensajes en el <a href='" . admin_url('edit.php?post_type=mensaje') . "'>panel de administración</a>.</p>
                    </div>
                </div>
            </body>
            </html>";

            // Cabeceras para enviar correo HTML
            $headers = array(
                'Content-Type: text/html; charset=UTF-8',
                'From: ' . $sitio . ' <' . $to_email . '>',
                'Reply-To: ' . $nombre . ' <' . $email . '>'
            );

            // Enviar el correo
            $mail_sent = wp_mail($to_email, $email_subject, $email_body, $headers);

            // Redirigir con mensaje de éxito
            wp_redirect(add_query_arg('mensaje', $mail_sent ? 'enviado' : 'error', wp_get_referer()));
            exit;
        }
    }
}
add_action('init', 'yato_procesar_formulario_contacto');

// Personalizar columnas en el admin
function yato_columnas_mensajes($columns)
{
    $columns = array(
        'cb' => $columns['cb'],
        'title' => __('Asunto'),
        'nombre' => __('Nombre'),
        'compania' => __('Compañía'),
        'email' => __('Email'),
        'celular' => __('Celular'),
        'fecha' => __('Fecha'),
    );
    return $columns;
}
add_filter('manage_mensaje_posts_columns', 'yato_columnas_mensajes');

// Mostrar contenido en las columnas
function yato_contenido_columnas_mensajes($column, $post_id)
{
    switch ($column) {
        case 'nombre':
            echo get_post_meta($post_id, '_contacto_nombre', true);
            break;
        case 'compania':
            echo get_post_meta($post_id, '_contacto_compania', true);
            break;
        case 'email':
            echo get_post_meta($post_id, '_contacto_email', true);
            break;
        case 'celular':
            echo get_post_meta($post_id, '_contacto_celular', true);
            break;
        case 'fecha':
            echo get_the_date();
            break;
    }
}
add_action('manage_mensaje_posts_custom_column', 'yato_contenido_columnas_mensajes', 10, 2);

function yato_personalizar_editor_mensaje()
{
    global $post_type;
    if ($post_type === 'mensaje') {
        // Mostrar la información del contacto en un metabox
        add_meta_box(
            'informacion_contacto',
            'Información de Contacto',
            'yato_mostrar_info_contacto',
            'mensaje',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'yato_personalizar_editor_mensaje');

// Función para mostrar la información de contacto
function yato_mostrar_info_contacto($post)
{
    $nombre = get_post_meta($post->ID, '_contacto_nombre', true);
    $compania = get_post_meta($post->ID, '_contacto_compania', true);
    $email = get_post_meta($post->ID, '_contacto_email', true);
    $celular = get_post_meta($post->ID, '_contacto_celular', true);
    ?>
    <div style="margin-bottom: 20px;">
        <p><strong>Nombre:</strong> <?php echo esc_html($nombre); ?></p>
        <?php if (!empty($compania)): ?>
            <p><strong>Compañía:</strong> <?php echo esc_html($compania); ?></p>
        <?php endif; ?>
        <p><strong>Email:</strong> <?php echo esc_html($email); ?></p>
        <?php if (!empty($celular)): ?>
            <p><strong>Celular:</strong> <?php echo esc_html($celular); ?></p>
        <?php endif; ?>
    </div>
    <div>
        <strong>Mensaje:</strong>
        <div style="margin-top: 10px; padding: 10px; background: #f8f9fa; border: 1px solid #ddd;">
            <?php echo wpautop(get_post_field('post_content', $post->ID)); ?>
        </div>
    </div>
    <?php
}

// Hacer que el contenido del mensaje no sea editable
function yato_hacer_mensaje_no_editable()
{
    remove_post_type_support('mensaje', 'editor');
}
add_action('init', 'yato_hacer_mensaje_no_editable');

function yato_add_custom_variables()
{
    ?>
    <style>
        :root {
            --pattern-url: url('<?php echo get_template_directory_uri(); ?>/assets/pattern-blue.svg');
        }
    </style>
    <?php
}
add_action('wp_head', 'yato_add_custom_variables');

// Agregar menú de opciones del tema
function yato_theme_options_page()
{
    add_menu_page(
        'Configuración del Tema', // Título de la página
        'Configuración Yato', // Título del menú
        'manage_options', // Capacidad requerida
        'yato-options', // Slug
        'yato_theme_options_page_html', // Función que muestra la página
        'dashicons-admin-generic', // Icono
        20 // Posición
    );
}
add_action('admin_menu', 'yato_theme_options_page');

// Registrar las opciones
function yato_register_settings()
{
    register_setting('yato_options', 'yato_social_facebook');
    register_setting('yato_options', 'yato_social_instagram');
    register_setting('yato_options', 'yato_social_tiktok');
    register_setting('yato_options', 'yato_social_youtube');
    register_setting('yato_options', 'yato_social_twitter');
    register_setting('yato_options', 'yato_contact_phone');
    register_setting('yato_options', 'yato_contact_email');
    register_setting('yato_options', 'yato_contact_whatsapp');
    register_setting('yato_options', 'yato_contact_address');
}
add_action('admin_init', 'yato_register_settings');

// HTML de la página de opciones
function yato_theme_options_page_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('yato_options');
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Facebook</th>
                    <td>
                        <input type="url" name="yato_social_facebook"
                            value="<?php echo esc_attr(get_option('yato_social_facebook')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Instagram</th>
                    <td>
                        <input type="url" name="yato_social_instagram"
                            value="<?php echo esc_attr(get_option('yato_social_instagram')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">TikTok</th>
                    <td>
                        <input type="url" name="yato_social_tiktok"
                            value="<?php echo esc_attr(get_option('yato_social_tiktok')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">YouTube</th>
                    <td>
                        <input type="url" name="yato_social_youtube"
                            value="<?php echo esc_attr(get_option('yato_social_youtube')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Twitter / X</th>
                    <td>
                        <input type="url" name="yato_social_twitter"
                            value="<?php echo esc_attr(get_option('yato_social_twitter')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Teléfono</th>
                    <td>
                        <input type="tel" name="yato_contact_phone"
                            value="<?php echo esc_attr(get_option('yato_contact_phone')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">WhatsApp</th>
                    <td>
                        <input type="tel" name="yato_contact_whatsapp"
                            value="<?php echo esc_attr(get_option('yato_contact_whatsapp')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Email</th>
                    <td>
                        <input type="email" name="yato_contact_email"
                            value="<?php echo esc_attr(get_option('yato_contact_email')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Dirección</th>
                    <td>
                        <textarea name="yato_contact_address" rows="3"
                            class="regular-text"><?php echo esc_textarea(get_option('yato_contact_address')); ?></textarea>
                    </td>
                </tr>
            </table>
            <?php submit_button('Guardar cambios'); ?>
        </form>
    </div>
    <?php
}

// Agregar clases a los enlaces del menú
function yato_add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'yato_add_menu_link_class', 1, 3);

@ini_set('upload_max_filesize', '128M');
@ini_set('post_max_size', '128M');
@ini_set('max_execution_time', '300');



function tu_tema_customizer_settings($wp_customize)
{
    // Añadir sección para el banner global
    $wp_customize->add_section('banner_global_section', array(
        'title' => __('Banner Global', 'tu-tema'),
        'priority' => 30,
    ));

    // Añadir configuración para la imagen del banner
    $wp_customize->add_setting('banner_global_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Añadir control para subir la imagen
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'banner_global_image', array(
        'label' => __('Subir Banner Global', 'tu-tema'),
        'section' => 'banner_global_section',
        'settings' => 'banner_global_image',
    )));
}
add_action('customize_register', 'tu_tema_customizer_settings');

function cargar_api_google_maps()
{
    wp_enqueue_script(
        'google-maps',
        'https://maps.googleapis.com/maps/api/js?key=TU_API_KEY',
        array(),
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'cargar_api_google_maps');


//ACF GUARDADO
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path)
{
    return get_template_directory() . '/acf-json';
}

// 2. Dile a ACF de dónde CARGAR los archivos JSON
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths)
{
    unset($paths[0]); // Limpia la ruta por defecto
    $paths[] = get_template_directory() . '/acf-json';
    return $paths;
}