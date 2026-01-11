<?php
/* Template Name: Página de Contacto */

get_header();
$banner = get_field('banner');
$titulo = get_field('titulo');
$texto = get_field('texto');
?>
<header class="relative bg-bg-primary/80 grid place-items-center clip-banner-contact">
    <img src="<?= $banner["url"] ?>" class="w-full h-full aspect-[20/9] md:aspect-[35/9] object-cover" />
    <div class="absolute flex flex-col gap-4">
        <h1 class="text-center title-categories capitalize font-black !text-white  "><?= $titulo ?></h1>
        <p class="text-white max-w-[500px] text-center"><?= $texto ?></p>
    </div>
</header>
<main class="p-6 md:px-20 pt-0 flex flex-col items-center justify-center -mt-5 sm:-mt-9 hd:-mt-20">
    <div class="w-full max-w-6xl z-10">
        <!--CONTACT-->
        <?php get_template_part('template-parts/contact-form'); ?>
        <!--END CONTACT-->


    </div>
    <div class="my-20 w-full max-w-6xl">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d956.8718027742242!2d-71.58090689374531!3d-16.400064059975563!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91423584f9c323bf%3A0xb3372f0b410b20ea!2sYato!5e0!3m2!1ses-419!2spe!4v1741402190993!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full rounded-2xl"></iframe>
    </div>
</main>

<?php get_footer(); ?>