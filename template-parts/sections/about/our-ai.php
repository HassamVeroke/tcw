<?php
/**
 * Our AI Section
 */

$section = tcw_get_section('our_ai_section');

if (!$section) {
    return;
}

$cards = $section['features'] ?? [];

?>
<section class="integration-section about-integration section">

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow'   => $section['eyebrow'] ?? '',
                'title'       => $section['heading'] ?? '',
                'description' => $section['description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($cards)) : ?>

            <div class="row cards-row g-4">

                <?php foreach ($cards as $card) :

                    $wrapper = 'int-card';

                    if (!empty($card['right_side'])) {
                        $wrapper .= ' rightSide';
                    }

                ?>

                    <div class="col-md-6 p-0">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/feature-card-about',
                            null,
                            [
                                'wrapper_class' => $wrapper,
                                'icon' => $card['icon'] ?? '',
                                'title' => $card['title'] ?? '',
                                'description' => $card['description'] ?? '',
                                'contact_link' => $card['contact_link'] ?? '',
                            ]
                        );
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>