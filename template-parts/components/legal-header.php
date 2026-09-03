        <?php
/**
 * Reusable Legal Header
 *
 * Args:
 * heading
 * highlight
 * description
 */

$args = wp_parse_args($args, [

    'heading' => '',

    'highlight' => '',

    'description' => ''

]);

?>

<?php if (
    $args['heading'] ||
    $args['highlight'] ||
    $args['description']
) : ?>
<div class="inner-page-hero legal-hero">

    <div class="hero-circle"></div>

    <div class="legal-header position-relative">

        <?php if (!empty($args['heading'])) : ?>

            <h1 class="section-title text-center" data-gsap="fade-up">

                <?php echo esc_html($args['heading']); ?>

                <?php if (!empty($args['highlight'])) : ?>

                    <span class="text-primary-tcw">

                        <?php echo esc_html($args['highlight']); ?>

                    </span>

                <?php endif; ?>

            </h1>

        <?php endif; ?>

        <?php if (!empty($args['description'])) : ?>

            <p class="m-0">

                <?php echo esc_html($args['description']); ?>

            </p>

        <?php endif; ?>

    </div>
</div>
<?php endif; ?>