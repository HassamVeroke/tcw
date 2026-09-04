<?php
/**
 * Industry Solution Section
 */

$section = tcw_get_section('industry_solution_section');

if (!$section) {
    return;
}

$eyebrow        = $section['eyebrow'] ?? '';
$heading        = $section['heading'] ?? '';
$description    = $section['description'] ?? '';
$description_2  = $section['description_2'] ?? '';
$workflow_title = $section['workflow_title'] ?? 'Logistics Compliance Workflow';
$workflow_steps = $section['workflow_steps'] ?? [];
?>

<section class="tc-section tc-solution section">

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

                <?php if (!empty($description_2)) : ?>
                    <p class="section-lead">
                        <?php echo wp_kses_post(nl2br($description_2)); ?>
                    </p>
                <?php endif; ?>

            </div>

            <div class="col-lg-6 tc-column" data-gsap="fade-left">

                <div class="tc-workflow">

                    <?php if (!empty($workflow_title)) : ?>
                        <div class="tc-workflow-title">
                            <?php echo esc_html($workflow_title); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $step_count = count($workflow_steps);
                    foreach ($workflow_steps as $index => $step) :
                        $is_highlight = !empty($step['is_highlighted']);
                    ?>

                        <div class="tc-workflow-step <?php echo $is_highlight ? 'highlight' : ''; ?>">
                            <?php if (!empty($step['step_number'])) : ?>
                                <small><?php echo esc_html($step['step_number']); ?></small>
                            <?php endif; ?>

                            <div><?php echo esc_html($step['title'] ?? ''); ?></div>
                        </div>

                        <?php if ($index < $step_count - 1) : ?>
                            <div class="tc-arrow">↓</div>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

</section>
