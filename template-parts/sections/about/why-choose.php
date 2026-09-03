<?php
/**
 * Why Choose LumiLex Section
 */

$section = tcw_get_section('why_choose_about_section');

if (!$section) {
    return;
}

$cards = $section['cards'] ?? [];
?>

<section class="why-choose-about section">

    <div class="container">

        <?php
        // get_template_part(
        //     'template-parts/components/section-header',
        //     null,
        //     [
        //         'eyebrow' => $section['eyebrow'] ?? '',
        //         'title' => $section['heading'] ?? '',
        //     ]
        // );
        ?>

        <?php if (!empty($cards)) : ?>

            <div class="row g-4 mt-4">

                <?php foreach ($cards as $card) : ?>

                    <div class="col-md-6 col-lg-4">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/icon-card',
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

        <?php endif; ?>

    </div>

</section>