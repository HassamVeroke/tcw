<?php
/**
 * Accordion Item Component
 *
 * Args:
 * id
 * parent
 * title
 * content
 * expanded
 */

$args = wp_parse_args($args,[
    'id' => '',
    'parent' => '',
    'title' => '',
    'content' => '',
    'expanded' => false
]);

$expanded = (bool) $args['expanded'];

?>

<div class="accordion-item">

    <h2 class="accordion-header">

        <button
            class="accordion-button <?php echo $expanded ? '' : 'collapsed'; ?>"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#<?php echo esc_attr($args['id']); ?>"
            aria-expanded="<?php echo $expanded ? 'true' : 'false'; ?>"
            aria-controls="<?php echo esc_attr($args['id']); ?>">

            <?php echo esc_html($args['title']); ?>

        </button>

    </h2>

    <div
        id="<?php echo esc_attr($args['id']); ?>"
        class="accordion-collapse collapse <?php echo $expanded ? 'show' : ''; ?>"
        data-bs-parent="#<?php echo esc_attr($args['parent']); ?>">

        <div class="accordion-body">

            <?php echo wp_kses_post($args['content']); ?>

        </div>

    </div>

</div>