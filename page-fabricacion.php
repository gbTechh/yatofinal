<?php
/*
Template Name: Proceso de Fabricación
*/

get_header();

$fabrication_steps = get_field('fabrication_steps'); // Campo ACF Repeater con subcampos: step_number, title, description, video
$link = get_field('link');
$text = get_field('texto');
$banner = get_field('banner');
?>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
?>
    <header class="relative h-[300px] overflow-hidden header-shadow">

      <!-- Fondo verde con patrón (parte izquierda) -->
      <div class="absolute inset-0 z-0">
        <!-- Fondo verde principal -->
        <div class="absolute inset-0 bg-gradient-to-br from-stone-100/70 via-green-50/35 to-stone-100/70">
          <!-- PATRÓN: Líneas diagonales suaves -->
          <div class="absolute inset-0 opacity-10" style="
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 4px, rgba(255,255,255,0.15) 4px, rgba(255,255,255,0.15) 8px);
        "></div>
        </div>

        <!-- Imagen con forma poligonal (parte derecha) -->
        <div class="absolute right-0 top-0 bottom-0 w-[65%] lg:w-[70%]">

          <!-- Eco 3 (más atrás, más transparente) -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.05) 0%, 
              rgba(0,0,0,0.02) 30%, 
              transparent 100%);
          transform: translateX(-100px);
      "></div>

          <!-- Eco 2 -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.08) 0%, 
              rgba(0,0,0,0.04) 30%, 
              transparent 100%);
          transform: translateX(-70px);
      "></div>

          <!-- Eco 1 -->
          <div class="absolute inset-0" style="
          clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
          background: linear-gradient(90deg, 
              rgba(0,0,0,0.12) 0%, 
              rgba(0,0,0,0.06) 30%, 
              transparent 100%);
          transform: translateX(-40px);
      "></div>

          <!-- Imagen principal -->
          <div class="relative h-full w-full" style="
            clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 25% 100%, 0% 50%);
            border-radius: 0 0 0 0;
        ">
            <img
              src="<?= $banner["url"] ?>"
              alt="Fabricación"
              class="w-full h-full object-cover z-10 relative" />
            <!-- Overlay degradado -->
            <div class="absolute inset-0 bg-gradient-to-r from-bg-primary/40 via-bg-primary/15 to-transparent top-0 left-0 z-20"></div>
          </div>

        </div>
      </div>

      <!-- Contenido -->
      <div class="relative z-10 container mx-auto px-6 md:px-12 h-full ">
        <div class="grid grid-cols-1 lg:grid-cols-3 h-full items-center">

          <!-- Texto en parte izquierda -->
          <div class="">
            <h1 class="relative text-xs lg:text-[32px] uppercase font-black !text-gray-900 ">Fabricación</h1>
          </div>

          <!-- Imagen ocupa 2 columnas -->
          <div class="hidden lg:block lg:col-span-2"></div>

        </div>
      </div>

    </header>


    <main class="bg-white min-h-screen py-16">
      <div class="max-w-7xl mx-auto px-4">
        <!-- Título principal -->
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-6">
            Descubre nuestra calidad<br>
            en<span class="bg-bg-primary text-white px-3 py-1 rounded mx-3">la fabricación</span>
          </h2>
          <p class="text-gray-600 max-w-md mx-auto text-lg">
            Donec pulvinar tincidunt tortor sit amet facilisis. Nam id neque nunc. Aenean posuere elit ultricies sem iaculis elementum.
          </p>
        </div>

        <!-- Timeline Container -->
        <div class="timeline-container relative">
          <!-- Línea vertical central -->
          <div class="timeline-line absolute left-1/2 transform -translate-x-1/2 w-1 bg-gray-200 h-full">
            <div class="timeline-progress absolute top-0 left-0 w-full bg-bg-secondary transition-all duration-300 ease-out" style="height: 0%;"></div>
          </div>

          <?php if (!empty($fabrication_steps) && is_array($fabrication_steps)) : ?>
            <?php foreach ($fabrication_steps as $index => $step) : ?>
              <div class="timeline-step relative mb-32 last:mb-0" data-step="<?php echo $index + 1; ?>">
                <!-- Punto en la línea central -->
                <div class="timeline-dot absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-white border-4 border-gray-200 rounded-full z-10 transition-all duration-300">
                  <div class="dot-inner w-full h-full bg-bg-secondary rounded-full scale-0 transition-transform duration-300"></div>
                </div>

                <!-- Contenido del paso -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                  <?php if ($index % 2 == 0) : // Pasos pares: texto izquierda, video derecha 
                  ?>
                    <!-- Contenido de texto -->
                    <div class="lg:pr-16 text-left opacity-0 transform translate-x-[-50px] transition-all duration-700" data-animate="fadeInLeft">
                      <div class="flex items-center gap-2">
                        <div class="bg-bg-primarydark text-white text-4xl font-bold px-4 py-2 w-16 rounded-full aspect-square mb-6 flex items-center justify-center">
                          <?php echo sprintf('%02d', $step['step_number'] ?: $index + 1); ?>
                        </div>
                        <h3 class="text-2xl font-bold text-white bg-bg-primarydark inline-block px-4 py-2 rounded mb-4">
                          <?php echo esc_html($step['title']); ?>
                        </h3>
                      </div>
                      <p class="text-gray-600 leading-relaxed text-lg">
                        <?php echo esc_html($step['description']); ?>
                      </p>
                    </div>

                    <!-- Video -->
                    <div class="lg:pl-16 opacity-0 transform translate-x-[50px] transition-all duration-700 delay-200" data-animate="fadeInRight">
                      <?php if (!empty($step['video'])) : ?>
                        <div class="relative rounded-lg overflow-hidden shadow-xl bg-gray-900 aspect-video">
                          <?php if (is_string($step['video']) && (strpos($step['video'], 'youtube.com') !== false || strpos($step['video'], 'youtu.be') !== false)) : ?>
                            <!-- YouTube embed -->
                            <iframe class="w-full h-full" src="<?php echo esc_url($step['video']); ?>" frameborder="0" allowfullscreen></iframe>
                          <?php elseif (is_array($step['video']) && isset($step['video']['url'])) : ?>
                            <!-- Video subido -->
                            <video class="w-full h-full object-cover" controls>
                              <source src="<?php echo esc_url($step['video']['url']); ?>" type="video/mp4">
                              Tu navegador no soporta el elemento de video.
                            </video>
                          <?php else : ?>
                            <!-- Placeholder si no hay video -->
                            <div class="w-full h-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                              <div class="text-white text-center">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 5v10l7-5-7-5z" />
                                  </svg>
                                </div>
                                <p class="font-medium">Video en proceso</p>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php else : // Pasos impares: video izquierda, texto derecha 
                  ?>
                    <!-- Video -->
                    <div class="lg:pr-16 opacity-0 transform translate-x-[-50px] transition-all duration-700" data-animate="fadeInLeft">
                      <?php if (!empty($step['video'])) : ?>
                        <div class="relative rounded-lg overflow-hidden shadow-xl bg-gray-900 aspect-video">
                          <?php if (is_string($step['video']) && (strpos($step['video'], 'youtube.com') !== false || strpos($step['video'], 'youtu.be') !== false)) : ?>
                            <!-- YouTube embed -->
                            <iframe class="w-full h-full" src="<?php echo esc_url($step['video']); ?>" frameborder="0" allowfullscreen></iframe>
                          <?php elseif (is_array($step['video']) && isset($step['video']['url'])) : ?>
                            <!-- Video subido -->
                            <video class="w-full h-full object-cover" controls>
                              <source src="<?php echo esc_url($step['video']['url']); ?>" type="video/mp4">
                              Tu navegador no soporta el elemento de video.
                            </video>
                          <?php else : ?>
                            <!-- Placeholder si no hay video -->
                            <div class="w-full h-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center">
                              <div class="text-white text-center">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                                  <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M8 5v10l7-5-7-5z" />
                                  </svg>
                                </div>
                                <p class="font-medium">Video en proceso</p>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <!-- Contenido de texto -->
                    <div class="lg:pl-16 text-left opacity-0 transform translate-x-[50px] transition-all duration-700 delay-200" data-animate="fadeInRight">
                      <div class="flex items-center gap-2 mb-4">
                        <div class="bg-bg-primarydark text-white  text-4xl font-bold px-4 py-2 w-16 rounded-full aspect-square flex items-center justify-center">
                          <?php echo sprintf('%02d', $step['step_number'] ?: $index + 1); ?>
                        </div>
                        <h3 class="text-2xl font-bold text-white bg-bg-primarydark inline-block px-4 py-2 rounded">
                          <?php echo esc_html($step['title']); ?>
                        </h3>
                      </div>
                      <p class="text-gray-600 leading-relaxed text-lg">
                        <?php echo esc_html($step['description']); ?>
                      </p>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="text-center py-16">
              <p class="text-gray-600 text-xl">No se han definido pasos para el proceso de fabricación.</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-20 flex items-center justify-center">
          <a href="<?= $link ?>" class="paragraph-base p-4 px-10 rounded-full bg-bg-primary transition-all hover:bg-bg-secondary hover:text-black text-white w-fit relative block font-normal no-underline">
            <?= $text; ?>
          </a>
        </div>
      </div>
    </main>

    <!-- JavaScript para animaciones -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const timelineSteps = document.querySelectorAll('.timeline-step');
        const timelineProgress = document.querySelector('.timeline-progress');
        const timelineDots = document.querySelectorAll('.timeline-dot');

        // Intersection Observer para animaciones
        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const step = entry.target;
              const stepIndex = parseInt(step.dataset.step) - 1;

              // Animar elementos dentro del paso
              const animatedElements = step.querySelectorAll('[data-animate]');
              animatedElements.forEach((el, index) => {
                setTimeout(() => {
                  el.style.opacity = '1';
                  el.style.transform = 'translate(0, 0)';
                }, index * 200);
              });

              // Activar punto de la línea de tiempo
              if (timelineDots[stepIndex]) {
                timelineDots[stepIndex].classList.add('border-bg-secondary');
                const dotInner = timelineDots[stepIndex].querySelector('.dot-inner');
                setTimeout(() => {
                  dotInner.style.transform = 'scale(1)';
                }, 300);
              }
            }
          });
        }, {
          threshold: 0.5,
          rootMargin: '-100px 0px'
        });

        // Observar cada paso
        timelineSteps.forEach(step => {
          observer.observe(step);
        });

        // Actualizar progreso de la línea al hacer scroll
        function updateTimelineProgress() {
          const container = document.querySelector('.timeline-container');
          const containerRect = container.getBoundingClientRect();
          const containerTop = containerRect.top + window.pageYOffset;
          const containerHeight = container.offsetHeight;

          const scrollTop = window.pageYOffset;
          const windowHeight = window.innerHeight;

          // Calcular el progreso basado en el scroll
          const progress = Math.max(0, Math.min(1,
            (scrollTop + windowHeight * 0.5 - containerTop) / containerHeight
          ));

          timelineProgress.style.height = `${progress * 100}%`;
        }

        // Actualizar al hacer scroll
        window.addEventListener('scroll', updateTimelineProgress);
        updateTimelineProgress(); // Ejecutar al cargar
      });
    </script>

    <style>
      .timeline-step {
        position: relative;
      }

      .timeline-dot {
        z-index: 10;
      }

      .timeline-dot.border-bg-secondary {
        border-color: #f9c91a;
      }

      /* Responsive adjustments */
      @media (max-width: 1024px) {
        .timeline-line {
          left: 2rem;
        }

        .timeline-dot {
          left: 2rem;
        }

        .timeline-step .grid {
          grid-template-columns: 1fr;
          margin-left: 5rem;
        }

        .lg\:pr-16,
        .lg\:pl-16 {
          padding-left: 0;
          padding-right: 0;
        }
      }
    </style>

<?php endwhile;
endif;
?>

<?php get_footer();
