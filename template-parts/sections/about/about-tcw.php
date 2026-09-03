<?php
/**
 * About TCW Section
 */

$section = tcw_get_section('about_tcw_section');

if (!$section) {
    return;
}

$blocks = $section['content_blocks'] ?? [];

?>

<section class="about-tcw-section section">

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
//                 'eyebrow'   => $section['eyebrow'] ?? '',
                'title'       => $section['heading'] ?? '',
                'description' => $section['description'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($blocks)) : ?>

            <?php foreach ($blocks as $block) : ?>

                <div class="row g-4 align-items-center zigzag-row <?php echo !empty($block['reverse_layout']) ? 'flex-lg-row-reverse' : ''; ?>">

                    <div class="col-lg-6 <?php echo !empty($block['reverse_layout']) ? 'text-lg-end' : ''; ?>">

                        <?php if (!empty($block['title'])) : ?>

                            <h3 class="zz-title">

                                <?php echo esc_html($block['title']); ?>

                            </h3>

                        <?php endif; ?>

                        <?php if (!empty($block['description'])) : ?>

                            <div class="zz-text">

                                <?php echo wp_kses_post(wpautop($block['description'])); ?>

                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="col-lg-6">

                       <?php if (!empty($block['image'])) : ?>

                            <?php
                            $image = $block['image'];

                            if (is_array($image)) {
                                $image_id = $image['ID'];
                                $alt = !empty($block['image_alt_override'])
                                    ? $block['image_alt_override']
                                    : ($image['alt'] ?? '');
                            } else {
                                $image_id = $image;
                                $alt = !empty($block['image_alt_override'])
                                    ? $block['image_alt_override']
                                    : get_post_meta($image_id, '_wp_attachment_image_alt', true);
                            }
                            ?>

                            <div class="zz-image">

                                <?php
                                echo wp_get_attachment_image(
                                    $image_id,
                                    'full',
                                    false,
                                    [
                                        'class' => 'img-fluid',
                                        'alt'   => $alt
                                    ]
                                );
                                ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>

</section>