<?php
/**
 * Intro Section
*/

$section = tcw_get_section('hero_intro_section');

if (!$section) {
    return;
}

$cards = $section['intro_cards'] ?? [];
$image = $section['section_image'] ?? null;

?>

<section class="intro-section section">

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'title' => $section['intro_heading'] ?? '',
                'highlight' => $section['intro_highlight'] ?? '',
                'description' => $section['intro_description'] ?? '',
            ]
        );
        ?>

        <div class="row panel-cards-row g-4 align-items-stretch" data-gsap="stagger-children">

            <div class="col-lg-6 px-lg-0">

                <?php
                if (!empty($cards[0])) {

                    get_template_part(
                        'template-parts/components/cards/panel-card',
                        null,
                        [
                            'title' => $cards[0]['card_title'] ?? '',
                            'content' => $cards[0]['card_feature_list'] ?? '',
                        ]
                    );

                }
                ?>

            </div>

            <div class="col-lg-6 px-lg-0">

                <div class="panel-image h-100">

                    <?php if (!empty($image)) : ?>

                        <video autoplay loop muted playsinline width="100%">
                            <source src="<?php echo esc_attr($image['url']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                    <?php else: ?>

                        <img
                            src="<?php echo site_url() . '/wp-content/uploads/2026/07/card-image.png'; ?>"
                            alt="Video Placeholder">

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <div class="row g-4 mt-1">

            <div class="col-lg-6 ps-lg-0">

                <?php
                if (!empty($cards[1])) {

                    get_template_part(
                        'template-parts/components/cards/panel-card',
                        null,
                        [
                            'class' => 'panel-dark',
                            'title' => $cards[1]['card_title'] ?? '',
                            'content' => $cards[1]['card_feature_list'] ?? '',
                        ]
                    );

                }
                ?>

            </div>

            <div class="col-lg-6 pe-lg-0">

                <?php
                if (!empty($cards[2])) {

                    get_template_part(
                        'template-parts/components/cards/panel-card',
                        null,
                        [
                            'class' => 'panel-blue',
                            'title' => $cards[2]['card_title'] ?? '',
                            'content' => $cards[2]['card_feature_list'] ?? '',
                        ]
                    );

                }
                ?>

            </div>

        </div>

    </div>

</section>