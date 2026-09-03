<?php
/**
 * CTA Section
*/

$section = get_field('cta_section', 'option');

if (!$section) {
    return;
}

$image            = $section['brand_image'] ?? '';
$paragraph		  = $section['description'] ?? '';
$paragraph_1	  = $section['description_1'] ?? '';
$primary_button   = $section['primary_button'] ?? '';
$secondary_button = $section['secondary_button'] ?? '';

?>

<section class="cta-section section" data-gsap="fade-up">

    <div class="container">

        <div class="cta-panel text-center">

            <div class="content-wrapper">

                <?php if (!empty($image)) : ?>

                    <div class="brand-mark mx-auto">

                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>">

                    </div>

                <?php endif; ?>

                <?php if (!empty($section['heading'])) : ?>

                    <h2 class="section-title m-0">

                        <?php echo esc_html($section['heading']); ?>

                    </h2>

                <?php endif; ?>

                <?php if (!empty($paragraph) || !empty($paragraph_1) ) : ?>

                    <p class="section-lead mx-auto">

                        <?php echo nl2br(esc_html($paragraph)); ?>
                        <?php if (!empty($paragraph_1) ) : ?>
                            <br><br>
                            <?php echo nl2br(esc_html($paragraph_1)); ?>
                        <?php endif; ?>

                    </p>

                <?php endif; ?>

                <div class="d-flex flex-wrap justify-content-center gap-3">

                    <?php
                        get_template_part(
                            'template-parts/components/buttons/button',
                            null,
                            [
                                'button' => $secondary_button,
                                'class' => 'btn btn-outline-tcw',
                            ]
                        );
                    ?>

                    <?php
                        get_template_part(
                            'template-parts/components/buttons/button',
                            null,
                            [
                                'button' => $primary_button,
                                'class' => 'btn btn-primary-tcw',
                            ]
                        );
                    ?>

                </div>

            </div>

        </div>

    </div>

</section>