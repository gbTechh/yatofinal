<?php
/**
 * Template part for displaying brands gallery
 * 
 * @param array $args['marcas_data'] Array containing title and gallery
 */

$data = $args['marcas_data'] ?? get_field('marcas_galeria');

if (!empty($data) && !empty($data['gallery'])):
    ?>
    <section class="py-20 bg-gray-50/50">
        <div class="text-center mb-12 hd:mb-16">
            <?php
            if (!empty($data) && !empty($data['titulo'])):
                ?>
                <h2 class="text-2xl hd:text-3xl font-bold text-gray-900 mb-4">
                    <?= esc_html($data["titulo"]); ?>
                </h2>
            <?php endif; ?>

        </div>
        <div class="container mx-auto px-4 hd:px-12">
            <?php if (!empty($data['titutlo'])): // Note: User specified 'titutlo' in prompt, assuming strict ACF field name match, or 'titulo' ?>
                <div class="text-center mb-16">
                    <h2 class="text-3xl hd:text-4xl font-black text-gray-900 mb-4 inline-block relative">
                        <?= esc_html($data['titutlo']) ?>
                        <span
                            class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-green-500 rounded-full"></span>
                    </h2>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 hd:gap-8">
                <?php foreach ($data['gallery'] as $marca): ?>
                    <div
                        class="group relative bg-white rounded-xl p-6 flex items-center justify-center aspect-[3/2] shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300 border border-gray-100 ease-out">
                        <img src="<?= esc_url($marca['url']) // Assuming standard gallery field returns array of image objects ?>"
                            alt="<?= esc_attr($marca['alt']) ?>"
                            class="w-full h-full object-contain filter grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition-all duration-300 transform group-hover:scale-105 mix-blend-multiply"
                            loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div class="py-10 w-full"></div>
<?php endif; ?>