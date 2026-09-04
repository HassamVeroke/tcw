<?php
/**
 * Industry Feature Card Component
 *
 * Args:
 * - badge / number
 * - badge_class
 * - title
 * - description
 * - icon
 * - wrapper_class
 * - data_gsap
 */

$args = wp_parse_args($args ?? [], [
    'badge'         => '',
    'number'        => '',
    'badge_class'   => 'tc-card-number',
    'title'         => '',
    'description'   => '',
    'icon'          => '',
    'wrapper_class' => 'tc-card',
    'data_gsap'     => 'fade-up',
]);

$badge_text = !empty($args['badge']) ? $args['badge'] : $args['number'];
?>

<div class="<?php echo esc_attr($args['wrapper_class']); ?> h-100" <?php if (!empty($args['data_gsap'])) : ?>data-gsap="<?php echo esc_attr($args['data_gsap']); ?>"<?php endif; ?>>

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

    <?php if (!empty($badge_text)) : ?>
        <div class="<?php echo esc_attr($args['badge_class']); ?>">
            <?php echo esc_html($badge_text); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($args['title'])) : ?>
        <h3 class="industry-card-title">
            <?php echo esc_html($args['title']); ?>
        </h3>
    <?php endif; ?>

    <?php if (!empty($args['description'])) : ?>
        <p class="industry-card-text">
            <?php echo esc_html($args['description']); ?>
        </p>
    <?php endif; ?>

</div>
