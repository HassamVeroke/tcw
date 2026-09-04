<?php
/**
 * Industry Use Cases Section
 */

$section = tcw_get_section('industry_usecases_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$heading     = $section['heading'] ?? '';
$description = $section['description'] ?? '';
$usecases    = $section['usecases'] ?? [];
?>

<section class="tc-section tc-usecases section">

    <div class="container">

        <div class="tc-centered text-center mb-5">

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

        <?php if (!empty($usecases)) : ?>
            <div class="row g-4 tc-cards" data-gsap="stagger-children">

                <?php foreach ($usecases as $item) : ?>
                    <div class="col-md-6 col-lg-3">
                        <?php
                        get_template_part(
                            'template-parts/components/cards/industry_feature-card',
                            null,
                            [
                                'title'         => $item['title'] ?? '',
                                'description'   => $item['description'] ?? '',
                                'wrapper_class' => 'tc-usecase-card tc-card',
                            ]
                        );
                        ?>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>
