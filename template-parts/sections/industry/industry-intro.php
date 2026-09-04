<?php
/**
 * Industry Intro Section
 */

$section = tcw_get_section('industry_intro_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$heading     = $section['heading'] ?? '';
$description = $section['description'] ?? '';
?>

<section class="tc-section tc-intro section">

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

        </div>

    </div>

</section>
