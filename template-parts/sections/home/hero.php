<?php
/**
 * Hero Section
*/

$section = tcw_get_section('hero_section');

if (!$section) {
    return;
}

$title       = $section['hero_title'] ?? '';
$highlight   = $section['hero_highlight'] ?? '';
$description = $section['hero_description'] ?? '';
$button      = $section['hero_button'] ?? '';
$image  = $section['hero_image'] ?? '';
$stats       = $section['hero_stats'] ?? [];

?>

<section class="hero-section section">
    
    <div id="particles-js"></div>
    <div class="hero-circle"></div>

    <?php if ($image): ?>

        <div class="hero-globe">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>" class="img-fluid" fetch-priority="high">
        </div>

    <?php endif; ?>

    <div class="container position-relative text-center">

        <?php if ($title): ?>

            <h1 class="hero-title" data-gsap="fade-up">

                <?php if ($highlight): ?>

                    <span class="text-primary-tcw">

                        <?php echo esc_html($highlight); ?>

                    </span>

                <?php endif; ?>

                <?php echo esc_html($title); ?>

            </h1>

        <?php endif; ?>

        <?php if ($description): ?>

            <p class="hero-sub mx-auto" data-gsap="fade-up">

                <?php echo esc_html($description); ?>

            </p>

        <?php endif; ?>

        <?php
        get_template_part(
            'template-parts/components/buttons/button',
            null,
            [
                'button' => $button,
                'class' => 'btn btn-primary-tcw btn-lg mt-3',
                'icon' => 'bi bi-arrow-right ms-1'
            ]
        );
        ?>

        <?php if (!empty($stats)): ?>

            <div class="row g-3 g-md-4 justify-content-center hero-stats" data-gsap="fade-up">

                <?php
                $card_classes = [
                    '',
                    'secondCard',
                    'lastCard'
                ];

                foreach ($stats as $index => $stat):

                    $extra_class = $card_classes[$index] ?? '';
                ?>

                    <div class="col-md-4">

                        <div class="stat-card <?php echo esc_attr($extra_class); ?>">

                            <div class="stat-icon">
								<i class="bi bi-circle-fill"></i>
                            </div>

                            <?php
                                $raw_value = $stat['stat_number'] ?? '';
                                $numeric_target = preg_replace('/[^0-9]/', '', $raw_value);
                                preg_match('/^[^0-9]+/', $raw_value, $prefix_matches);
                                $prefix = $prefix_matches[0] ?? '';
                                preg_match('/[^0-9]+$/', $raw_value, $suffix_matches);
                                $suffix = $suffix_matches[0] ?? '';
                            ?>

                            <div class="stat-num" 
                                data-target="<?php echo esc_attr($numeric_target); ?>" 
                                data-prefix="<?php echo esc_attr($prefix); ?>"
                                data-suffix="<?php echo esc_attr($suffix); ?>">
                                <?php
                                echo esc_html($prefix . '0' . $suffix); 
                                ?>
                            </div>

                            <div class="stat-label">

                                <?php echo esc_html($stat['stat_label'] ?? ''); ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>