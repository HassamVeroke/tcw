<?php
/**
 * Industry Benefits Section
 */

$section = tcw_get_section('industry_benefits_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$heading     = $section['heading'] ?? '';
$description = $section['description'] ?? '';
$benefits    = $section['benefits'] ?? [];
?>

<section class="tc-section tc-benefits section">

    <div class="container">

        <div class="row align-items-center g-5 tc-two-column">

            <div class="col-lg-6 tc-column" data-gsap="fade-right">

                <?php if (!empty($eyebrow)) : ?>
                    <span class="eyebrow tc-section-label">
                        <?php echo esc_html($eyebrow); ?>
                    </span>
                <?php endif; ?>

                <?php if (!empty($heading)) : ?>
                    <h2 class="section-title">
                        <?php echo esc_html($heading); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($description)) : ?>
                    <p class="section-lead">
                        <?php echo wp_kses_post(nl2br($description)); ?>
                    </p>
                <?php endif; ?>

            </div>

            <div class="col-lg-6 tc-column" data-gsap="fade-left">

                <?php if (!empty($benefits)) : ?>
                    <div class="tc-benefit-list d-flex flex-column gap-4">

                        <?php foreach ($benefits as $benefit) : ?>
                            <div class="tc-benefit">
                                <h3><?php echo esc_html($benefit['title'] ?? ''); ?></h3>
                                <p><?php echo esc_html($benefit['description'] ?? ''); ?></p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>
