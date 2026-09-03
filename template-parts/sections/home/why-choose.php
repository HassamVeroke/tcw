<?php
/**
 * Secure & Trusted Section
*/

$section = tcw_get_section('why_choose_section');

if (!$section) {
    return;
}

$cards = $section['feature_cards'] ?? [];

?>

<section class="why-choose-section section">

    <div class="container text-center">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
//                 'eyebrow' => $section['why_eyebrow'] ?? '',
                'title' => $section['why_heading'] ?? '',
                'description' => $section['why_description'] ?? '',
            ]
        );
        ?>

        <div class="row why-cards-row g-4 text-start align-items-center" data-gsap="stagger-children">

            <?php foreach ($cards as $card) : ?>

                <div class="col-md-6 col-lg-3">

                    <?php
                    get_template_part(
                        'template-parts/components/cards/why-card',
                        null,
                        [
                            'icon' => $card['icon'] ?? '',
                            'title' => $card['title'] ?? '',
                            'description' => $card['description'] ?? '',
                        ]
                    );
                    ?>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>