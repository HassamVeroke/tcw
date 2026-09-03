<?php
/**
 * Secure & Trusted Section
*/

$section = tcw_get_section('secure_trusted_section');

if (!$section) {
    return;
}

$cards = !empty($section['security_cards']) && is_array($section['security_cards'])
    ? $section['security_cards']
    : [];

?>

<section class="secure-trusted-section section">

    <div class="container text-center">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow' => $section['secure_eyebrow'] ?? '',
                'title' => $section['secure_heading'] ?? '',
                'description' => $section['secure_description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($cards)) : ?>

            <div class="row g-3 text-start" data-gsap="stagger-children">

                <?php foreach ($cards as $card) : ?>

                    <div class="col-md-4">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/feature-card',
                            null,
                            [
                                'icon' => $card['icon_class'] ?? '',
                                'title' => $card['title'] ?? '',
                                'description' => $card['description'] ?? '',
                            ]
                        );
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>