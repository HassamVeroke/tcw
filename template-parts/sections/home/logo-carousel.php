<?php
/**
 * Logo Section
*/

$section = tcw_get_section('logos_section');

if (!$section) {
    return;
}

$heading = $section['logos_heading'] ?? [];
$logos = $section['company_logos'] ?? null;

?>

<?php if ($logos) : ?>

<section class="logo-strip section p-0">

    <div class="container">

        <?php if ($heading) : ?>

            <h2 class="logo-strip-heading" data-gsap="fade-up">

                <?php echo esc_html($heading); ?>

            </h2>

        <?php endif; ?>

    </div>

    <div class="logo-slider" data-gsap="fade-in">

        <div class="logo-track">

            <?php

            /**
             * First Loop
             */

            foreach ($logos as $logo) :

            ?>

                <div class="logo-item">

                    <img
                        src="<?php echo esc_url($logo['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($logo['alt']); ?>">

                </div>

            <?php endforeach; ?>


            <?php

            /**
             * Duplicate Loop
             * Creates an infinite ticker
             */

            foreach ($logos as $logo) :

            ?>

                <div class="logo-item">

                    <img
                        src="<?php echo esc_url($logo['sizes']['medium']); ?>"
                        alt="<?php echo esc_attr($logo['alt']); ?>">

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<?php endif; ?>