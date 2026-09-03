<?php
/**
 * Why Choose Feature Card
 */

$args = wp_parse_args($args,[
    'icon' => '',
    'title' => '',
    'description' => ''
]);

?>

<div class="why-card h-100 text-center">

    <?php if (!empty($args['icon'])) : ?>

        <div class="why-icon mx-auto">

            <?php
            echo wp_get_attachment_image(
                is_array($args['icon']) ? $args['icon']['ID'] : $args['icon'],
                'full'
            );
            ?>

        </div>

    <?php endif; ?>

    <?php if (!empty($args['title'])) : ?>

        <h5>

            <?php echo esc_html($args['title']); ?>

        </h5>

    <?php endif; ?>

    <?php if (!empty($args['description'])) : ?>

        <p class="why-description">

            <?php echo esc_html($args['description']); ?>

        </p>

    <?php endif; ?>

</div>