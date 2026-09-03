<?php
/**
 * Integration Section
*/

$section = tcw_get_section('integration_section');

if (!$section) {
    return;
}

$cards = $section['integration_cards'] ?? [];

?>

<section class="integration-section section">

    <div class="container text-center">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow' => $section['integration_eyebrow'] ?? '',
                'title' => $section['integration_heading'] ?? '',
                'description' => $section['integration_description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($cards)) : ?>

            <div class="row cards-row g-4" data-gsap="stagger-children">

                <?php foreach ($cards as $card) :

                    $wrapper = 'int-card';

                    if (!empty($card['right_side'])) {
                        $wrapper .= ' rightSide';
                    }

                ?>

                    <div class="col-md-6 p-0">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/feature-card',
                            null,
                            [
                                'wrapper_class' => $wrapper,
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