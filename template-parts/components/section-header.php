<?php
/**
 * Reusable Section Header
 *
 * Args:
 * eyebrow
 * title
 * highlight
 * description
 */

$args = wp_parse_args($args, [

    'eyebrow' => '',

    'title' => '',

    'highlight' => '',

    'description' => ''

]);

?>

<?php if (
    $args['title'] ||
    $args['description'] ||
    $args['eyebrow']
) : ?>

<div class="section-header text-center">

    <?php if ($args['eyebrow']) : ?>

        <span class="eyebrow" data-gsap="fade-in">

            <?php echo esc_html($args['eyebrow']); ?>

        </span>

    <?php endif; ?>


    <?php if ($args['title']) : ?>

        <h2 class="section-title" data-gsap="fade-up">

            <?php echo esc_html($args['title']); ?>

            <?php if ($args['highlight']) : ?>

                <span class="text-primary-tcw">

                    <?php echo esc_html($args['highlight']); ?>

                </span>

            <?php endif; ?>

        </h2>

    <?php endif; ?>


    <?php if ($args['description']) : ?>

        <p class="section-lead mx-auto" data-gsap="fade-up">

            <?php echo wp_kses_post($args['description']); ?>

        </p>

    <?php endif; ?>

</div>

<?php endif; ?>