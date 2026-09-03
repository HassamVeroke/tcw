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

            <div class="tcw-grid" data-gsap="fade-up">

                <?php foreach ($section['capabilities'] as $capability) : ?>

                    <div class="tcw-grid-item">

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

        <?php endif; ?>

    </div>

</section>