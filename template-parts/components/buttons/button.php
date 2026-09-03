<?php
/**
 * Reusable Button Component
 */

$args = wp_parse_args(
    $args ?? [],
    [
        'button' => [],
        'class' => 'btn btn-primary',
        'icon' => '',
    ]
);

$button = $args['button'];

if (empty($button) || empty($button['url']) || empty($button['title'])) {
    return;
}
?>

<a
    href="<?php echo esc_url($button['url']); ?>"
    class="<?php echo esc_attr($args['class']); ?>"
    target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" data-gsap="fade-in">

    <?php echo esc_html($button['title']); ?>

    <?php if (!empty($args['icon'])) : ?>

        <i class="<?php echo esc_attr($args['icon']); ?>"></i>

    <?php endif; ?>

</a>