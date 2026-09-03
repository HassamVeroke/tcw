<?php
/**
 * Industries Section
*/

$section = tcw_get_section('industries_section');

if (!$section) {
    return;
}

$heading = $section['heading'] ?? [];
$industries = $section['industry_items'] ?? null;

?>

<?php if ($industries) : ?>

<section class="industry-section section p-0">

    <div class="container">

        <?php if ($heading) : ?>

            <h2 class="industry-section-heading" data-gsap="fade-up">

                <?php echo esc_html($heading); ?>

            </h2>

        <?php endif; ?>

    </div>

    <div class="industry-grid" data-gsap="stagger-children">

            <?php

            foreach ($industries as $industry) :

            ?>

                <div class="industry-item text-center">

                    <?php if (!empty($industry['icon'])) : ?>

                        <?php
                        echo wp_get_attachment_image(
                            is_array($industry['icon']) ? $industry['icon']['ID'] : $industry['icon'],
                            'full'
                        );
                        ?>

                    <?php endif; ?>

                    <p><?php echo esc_html($industry['label']); ?></p>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<?php endif; ?>