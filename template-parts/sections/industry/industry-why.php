<?php
/**
 * Industry Why Section
 */

$section = tcw_get_section('industry_why_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$heading     = $section['heading'] ?? '';
$description = $section['description'] ?? '';
$pills       = $section['pills'] ?? [];
?>

<section class="tc-section tc-why section">

    <div class="container">

        <div class="tc-centered text-center">

            <?php
            get_template_part(
                'template-parts/components/section-header',
                null,
                [
                    'eyebrow'     => $eyebrow,
                    'title'       => $heading,
                    'description' => $description,
                ]
            );
            ?>

            <?php if (!empty($pills)) : ?>
                <div class="tc-pill-wrapper d-flex justify-content-center flex-wrap gap-3 mt-4" data-gsap="fade-up">

                    <?php foreach ($pills as $pill) : ?>
                        <div class="tc-pill">
                            <?php echo esc_html($pill['text'] ?? ''); ?>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>

</section>
