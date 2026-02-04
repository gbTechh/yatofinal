<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body class="min-h-screen">
  <div
    class="main-header w-full h-auto flex flex-col relative top-0 left-0 z-50 group hover:bg-white/90 transition-all ">
    <?php
    // get_template_part('template-parts/header/header-top');
    ?>
    <?php
    get_template_part('template-parts/header/header-left');
    ?>

  </div>