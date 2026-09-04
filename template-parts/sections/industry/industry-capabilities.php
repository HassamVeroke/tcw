<?php
/**
 * Industry Capabilities Section
 */

$section = tcw_get_section('industry_capabilities_section');

if (!$section) {
    return;
}

$section_id   = !empty($section['section_id']) ? $section['section_id'] : 'capabilities';
$eyebrow      = $section['eyebrow'] ?? '';
$heading      = $section['heading'] ?? '';
$description  = $section['description'] ?? '';
$capabilities = $section['capabilities'] ?? [];
?>

<section id="<?php echo esc_attr($section_id); ?>" class="tc-section tc-capabilities section">

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

        <?php if (!empty($capabilities)) : ?>
            <div class="row g-4 tc-capability-grid" data-gsap="stagger-children">

                <?php foreach ($capabilities as $item) : ?>
                    <div class="col-md-6">
                        <?php
                        get_template_part(
                            'template-parts/components/cards/industry_feature-card',
                            null,
                            [
                                'badge'         => $item['tag'] ?? '',
                                'badge_class'   => 'tc-capability-number',
                                'title'         => $item['title'] ?? '',
                                'description'   => $item['description'] ?? '',
                                'wrapper_class' => 'tc-capability',
                            ]
                        );
                        ?>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>
