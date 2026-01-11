<section class="px-5 py-14 hd:p-20 flex flex-col hd:flex-row  flex-nowrap gap-14 hd:gap-20">
  <div class="flex-1 flex justify-center flex-col gap-6">
    <h1 class="title"><?= $ambiental["titulo"]?></h1>
    <p class="paragraph">
      <?= $ambiental["texto"]?>
    </p>
  </div>
  <div class="flex-1">
    <img src="<?= $ambiental["imagen"]["url"]?>">
  </div>
  
</section>