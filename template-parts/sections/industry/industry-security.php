<?php
/**
 * Industry Security Section
 */

$section = tcw_get_section('industry_security_section');

$heading = !empty($section['heading'])
    ? $section['heading']
    : (!empty($section['title']) ? $section['title'] : 'Secure by Design');

$content = !empty($section['content'])
    ? $section['content']
    : (!empty($section['description'])
        ? $section['description']
        : 'TCW is fully deployed on AWS GovCloud (US). Production environments and client data are accessible only to U.S. persons, with role-based permissions and complete audit logs.');

$features = !empty($section['features']) && is_array($section['features'])
    ? $section['features']
    : [
        [
            'icon_class'  => 'bi bi-cloud-check-fill',
            'title'       => 'AWS GovCloud (US)',
            'description' => 'Dedicated cloud infrastructure meeting stringent federal compliance requirements.',
        ],
        [
            'icon_class'  => 'bi bi-person-check-fill',
            'title'       => 'U.S. Persons Only',
            'description' => 'Production environments and client data are accessible strictly to verified U.S. persons.',
        ],
        [
            'icon_class'  => 'bi bi-shield-lock-fill',
            'title'       => 'Role-Based Audit Logs',
            'description' => 'Granular permission controls with immutable logging for complete audit readiness.',
        ],
    ];
?>

<section class="tc-section tc-security section">

    <div class="container">

        <div class="tc-security-card" data-gsap="fade-up">

            <div class="tc-security-header text-center mx-auto">

                <?php if (!empty($heading)) : ?>
                    <h2 class="section-title mb-3" data-gsap="fade-up">
                        <?php echo esc_html($heading); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($content)) : ?>
                    <p class="tc-security-lead mx-auto" data-gsap="fade-up">
                        <?php echo wp_kses_post(nl2br($content)); ?>
                    </p>
                <?php endif; ?>

            </div>

            <?php if (!empty($features)) : ?>
                <div class="row g-4 tc-security-features mt-4" data-gsap="stagger-children">

                    <?php foreach ($features as $feature) : ?>
                        <div class="col-md-4">
                            <div class="tc-security-feature-item h-100">
                                <?php if (!empty($feature['icon_class'])) : ?>
                                    <div class="tc-security-feature-icon">
                                        <i class="<?php echo esc_attr($feature['icon_class']); ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <h3 class="tc-security-feature-title">
                                    <?php echo esc_html($feature['title'] ?? ''); ?>
                                </h3>
                                <p class="tc-security-feature-text">
                                    <?php echo esc_html($feature['description'] ?? ''); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

    </div>

</section>
