<?php
/**
 * Use Card Component
 */

$args = wp_parse_args($args,[
    'title' => '',
    'description' => '',
    'background' => '',
]);

$style = '';

if (!empty($args['background'])) {

    $image_url = '';

    if (is_array($args['background'])) {

        $image_url = $args['background']['url'] ?? '';

    } elseif (is_numeric($args['background'])) {

        $image_url = wp_get_attachment_image_url($args['background'], 'large');

    }

    if ($image_url) {

        $style = 'style="background-image:linear-gradient(0.55deg, rgba(4,4,86,.84) 30.58%, rgba(58,58,58,0) 88.6%),url(' . esc_url($image_url) . ');"';

    }

}
?>

<div class="use-card" <?php echo $style; ?>>

    <div class="use-card-body">

        <?php if (!empty($args['title'])) : ?>

            <h5><?php echo esc_html($args['title']); ?></h5>

        <?php endif; ?>

        <?php if (!empty($args['description'])) : ?>

            <p><?php echo esc_html($args['description']); ?></p>

        <?php endif; ?>

    </div>

</div>