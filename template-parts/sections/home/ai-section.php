<?php
/**
 * AI Engineered Section
*/

$ai_section = tcw_get_section('ai_engineered_section');

if (!$ai_section) {
    return;
}

?>

<section class="ai-section section">

    <div class="container text-center">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow' => $ai_section['ai_eyebrow'] ?? '',
                'title' => $ai_section['ai_heading'] ?? '',
                'description' => $ai_section['ai_description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($ai_section['ai_features'])) : ?>

            <div class="row g-4 mt-3 text-start" data-gsap="stagger-children">

                <?php foreach ($ai_section['ai_features'] as $item) : ?>

                    <div class="col-md-4">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/feature-card',
                            null,
                            [
                                'icon' => $item['icon_class'] ?? '',
                                'title' => $item['title'] ?? '',
                                'description' => $item['description'] ?? '',
                            ]
                        );
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>