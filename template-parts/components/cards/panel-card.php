<?php
/**
 * Reusable Panel Card
 *
 * Args:
 *
 * title
 * content
 * class
 */

$args = wp_parse_args($args, [

    'title' => '',

    'content' => '',

    'class' => ''

]);

?>

<div class="panel-card <?php echo esc_attr($args['class']); ?> h-100">

    <?php if ($args['title']) : ?>

        <h3 class="panel-title">

            <?php echo esc_html($args['title']); ?>

        </h3>

    <?php endif; ?>

    <?php if ($args['content']) : ?>

        <div class="panel-content">

            <?php echo wp_kses_post($args['content']); ?>

        </div>

    <?php endif; ?>

</div>