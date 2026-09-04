<?php
/**
 * Industry Challenges Section
 */

$section = tcw_get_section('industry_challenges_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$heading     = $section['heading'] ?? '';
$description = $section['description'] ?? '';
$challenges  = $section['challenges'] ?? [];
?>

<section class="tc-section tc-challenges section">

    <div class="container">

        <div class="tc-section-heading mb-5">

            <?php if (!empty($eyebrow)) : ?>
                <span class="eyebrow" data-gsap="fade-in">
                    <?php echo esc_html($eyebrow); ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($heading)) : ?>
                <h2 class="section-title" data-gsap="fade-up">
                    <?php echo esc_html($heading); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($description)) : ?>
                <p class="section-lead" data-gsap="fade-up">
                    <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>

        </div>

        <?php if (!empty($challenges)) : ?>
            <div class="row g-4 tc-cards" data-gsap="stagger-children">

                <?php foreach ($challenges as $item) : ?>
                    <div class="col-md-6 col-lg-3">
                        <?php
                        get_template_part(
                            'template-parts/components/cards/industry_feature-card',
                            null,
                            [
                                'number'        => $item['number'] ?? '',
                                'badge_class'   => 'tc-card-number',
                                'title'         => $item['title'] ?? '',
                                'description'   => $item['description'] ?? '',
                                'wrapper_class' => 'tc-card',
                            ]
                        );
                        ?>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>
