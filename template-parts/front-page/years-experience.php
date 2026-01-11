<section class="p-20 relative w-full h-[200px] hd:block hidden">
  <div class=" flex items-center  justify-center relative ">
    <img src="<?= $header_data['imagen_movible']['url']?>" class="animation-tractor-header "/>
    <div class="mt-16 card-years-experience-mobile flex flex-col gap-8 p-12 mx-auto w-11/12 sm:w-[350px] h-[370px] shadow-lg z-50 " style="background-image: url('<?= $header_data['background_imagen']['url']?>');">
      <img class="w-[60px] h-auto" src="<?= $header_data['icono']['url']?>"/>
      <p class="text-[80px] font-bold my-5 text-texto-primary"><?= $header_data['years']?>+</p>
      <p class="text-2xl font-medium text-texto-title">años de experiencia</p>
    </div>
  </div>
</section>