<?php
/**
 * Industry Hero Section
 */

$section = tcw_get_section('industry_hero_section');

if (!$section) {
    return;
}

$eyebrow     = $section['eyebrow'] ?? '';
$title       = $section['title'] ?? '';
$highlight   = $section['highlight'] ?? '';
$description = $section['description'] ?? '';
$button      = $section['button'] ?? [];
$stats       = $section['stats'] ?? [];
?>

<section class="tc-section tc-hero hero-section">

    <div class="hero-circle"></div>

    <div class="container position-relative">

        <div class="tc-hero-content text-center">

            <?php if (!empty($eyebrow)) : ?>
                <span class="eyebrow tc-label" data-gsap="fade-in">
                    <?php echo esc_html($eyebrow); ?>
                </span>
            <?php endif; ?>

            <?php if (!empty($title) || !empty($highlight)) : ?>
                <h1 class="tc-hero-title hero-title" data-gsap="fade-up">
                    <?php if (!empty($highlight)) : ?>
                        <span class="blue text-primary-tcw d-block"><?php echo esc_html($highlight); ?></span>
                    <?php endif; ?>
                    <?php echo esc_html($title); ?>
                </h1>
            <?php endif; ?>

            <?php if (!empty($description)) : ?>
                <p class="tc-hero-description hero-sub mx-auto" data-gsap="fade-up">
                    <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($button)) : ?>
                <div class="tc-hero-cta" data-gsap="fade-up">
                    <?php
                    get_template_part(
                        'template-parts/components/buttons/button',
                        null,
                        [
                            'button' => $button,
                            'class'  => 'btn btn-primary-tcw btn-lg mt-3',
                            'icon'   => 'bi bi-arrow-right ms-1',
                        ]
                    );
                    ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if (!empty($stats)) : ?>
            <div class="tc-stat-wrapper row g-3 g-md-4 justify-content-center" data-gsap="fade-up">

                <?php foreach ($stats as $stat) : ?>
                    <div class="col-md-4">
                        <div class="tc-stat stat-card h-100">
                            <div class="tc-stat-dot"></div>

                            <?php
                            $raw_val = $stat['stat_number'] ?? '';
                            $numeric = preg_replace('/[^0-9]/', '', $raw_val);
                            preg_match('/^[^0-9]+/', $raw_val, $prefix_m);
                            $prefix = $prefix_m[0] ?? '';
                            preg_match('/[^0-9]+$/', $raw_val, $suffix_m);
                            $suffix = $suffix_m[0] ?? '';
                            ?>

                            <div class="tc-stat-number stat-num"
                                data-target="<?php echo esc_attr($numeric); ?>"
                                data-prefix="<?php echo esc_attr($prefix); ?>"
                                data-suffix="<?php echo esc_attr($suffix); ?>">
                                <?php echo esc_html($raw_val); ?>
                            </div>

                            <div class="tc-stat-text stat-label">
                                <?php echo esc_html($stat['stat_label'] ?? ''); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>
