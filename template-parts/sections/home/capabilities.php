<?php
/**
 * Capabilities Section
*/

$section = tcw_get_section('capabilities_section');

if (!$section) {
    return;
}
?>

<section class="capabilities section">

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow' => $section['capabilities_eyebrow'] ?? '',
                'title' => $section['capabilities_heading'] ?? '',
                'description' => $section['capabilities_description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($section['capabilities'])) : ?>

            <div class="tcw-slider" data-gsap="fade-up">

                <div class="swiper capabilitiesSwiper">

                    <div class="swiper-wrapper">

                        <?php foreach ($section['capabilities'] as $capability) : ?>

                            <div class="swiper-slide">

                                <?php
                                get_template_part(
                                    'template-parts/components/cards/icon-card',
                                    null,
                                    [
                                        'icon' => $capability['capability_icon'] ?? '',
                                        'title' => $capability['capability_title'] ?? '',
                                        'description' => $capability['capability_description'] ?? '',
                                    ]
                                );
                                ?>

                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

                <div class="slider-controls">

                    <button class="slider-arrow capabilities-prev" aria-label="Previous Slide">

                        <i class="bi bi-arrow-left"></i>

                    </button>

                    <div class="swiper-pagination"></div>

                    <button class="slider-arrow capabilities-next" aria-label="Next Slide">

                        <i class="bi bi-arrow-right"></i>

                    </button>

                </div>

            </div>

        <?php endif; ?>

    </div>

</section>