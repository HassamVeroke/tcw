<?php
/**
 * Legal Page Section
 */

$section = tcw_get_section('legal_page');

if (!$section) {
    return;
}

$content_sections = $section['sections'] ?? [];

?>

<section class="legal-page-section">

    <div class="container">

        <?php
            get_template_part(
                'template-parts/components/legal-header',
                null,
                [
                    'heading'     => $section['heading'] ?? '',
                    'highlight'   => $section['highlight'] ?? '',
                    'description' => $section['description'] ?? '',
                ]
            );
        ?>

        <?php if (!empty($content_sections)) : ?>

            <div class="legal-content">

                <?php foreach ($content_sections as $content_section) : ?>

                    <div class="legal-block">

                        <?php if (!empty($content_section['heading'])) : ?>

                            <h2 class="legal-heading">

                                <?php echo esc_html($content_section['heading']); ?>

                            </h2>

                        <?php endif; ?>

                        <?php if (!empty($content_section['content'])) : ?>

                            <div class="legal-body">

                                <?php echo wp_kses_post(wpautop($content_section['content'])); ?>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>