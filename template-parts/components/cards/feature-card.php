<?php
/**
 * Reusable Icon Item
 *
 * Args:
 * icon
 * title
 * description
 * wrapper_class
 */

$args = wp_parse_args($args,[
    'icon'=>'',
    'title'=>'',
    'description'=>'',
    'wrapper_class'=>'icon-item'
]);
?>

<div class="<?php echo esc_attr($args['wrapper_class']); ?> h-100">

    <?php if (!empty($args['icon'])) : ?>

        <div class="icon-card__icon">

            <?php
            echo wp_get_attachment_image(
                is_array($args['icon']) ? $args['icon']['ID'] : $args['icon'],
                'full'
            );
            ?>

        </div>

    <?php endif; ?>

    <?php if (!empty($args['title'])) : ?>

        <h3 class="icon-card__title">

            <?php echo esc_html($args['title']); ?>

        </h3>

    <?php endif; ?>

    <?php if(!empty($args['description'])) : ?>

        <p>

            <?php echo esc_html($args['description']); ?>

        </p>

    <?php endif; ?>

    <?php if(!empty($args['contact_link'])) : ?>

        <a class="btn btn-primary-tcw mt-4" href="<?php echo esc_attr($args['contact_link']); ?>">

            <?php echo esc_html("Contact Us"); ?>

        </a>

    <?php endif; ?>

</div>