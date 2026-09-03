<?php
/**
 * Reusable Blog Card
 *
 * Args:
 * $post_id
 */

$post_id = isset($args['post_id']) ? absint($args['post_id']) : get_the_ID();

if (!$post_id) {
    return;
}

$categories = get_the_category($post_id);
$category = !empty($categories) ? $categories[0] : null;
?>

<article class="blog-card h-100">

    <?php if (has_post_thumbnail($post_id)) : ?>

        <a
            href="<?php echo esc_url(get_permalink($post_id)); ?>"
            class="blog-card-image"
            aria-label="<?php echo esc_attr(get_the_title($post_id)); ?>">

            <?php
            echo get_the_post_thumbnail(
                $post_id,
                'medium_large',
                [
                    'class'   => 'img-fluid',
                    'loading' => 'lazy',
                ]
            );
            ?>

        </a>

    <?php endif; ?>

    <div class="blog-card-content">

        <?php if ($category) : ?>

            <a class="blog-card-category" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                <?php echo esc_html($category->name); ?>
            </a>

        <?php endif; ?>

        <h2 class="blog-card-title">

            <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                <?php echo esc_html(get_the_title($post_id)); ?>
            </a>

        </h2>

        <div class="blog-card-excerpt">

            <?php
            echo wp_kses_post(
                wpautop(
                    wp_trim_words(
                        get_the_excerpt($post_id),
                        28,
                        '...'
                    )
                )
            );
            ?>

        </div>

        <a
            href="<?php echo esc_url(get_permalink($post_id)); ?>"
            class="blog-read-more">

            Read More

            <i class="bi bi-arrow-right"></i>

        </a>

    </div>

</article>