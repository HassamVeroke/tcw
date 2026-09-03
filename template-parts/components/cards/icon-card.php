<?php
/**
 * Reusable Icon Card
 *
 * Args:
 * icon
 * title
 * description
 * class
 */

$args = wp_parse_args($args,[
    'icon' => '',
    'title' => '',
    'description' => '',
    'class' => ''
]);
?>

<div class="icon-card <?php echo esc_attr($args['class']); ?>">

    <div class="icon-card_icon_title">

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
    
    </div>

    <?php if (!empty($args['description'])) : ?>

        <div class="icon-card__description">

            <?php echo wpautop(esc_html($args['description'])); ?>

        </div>

    <?php endif; ?>

</div>