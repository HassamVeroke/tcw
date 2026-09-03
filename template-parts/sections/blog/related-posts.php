<?php
/**
 * Related Blog Posts
 */

$current_post_id = get_the_ID();

$related_post_ids = get_field(
    'related_post_ids',
    $current_post_id
);

$related_query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => [$current_post_id],
];

if (!empty($related_post_ids)) {

    if (is_array($related_post_ids)) {

        $ids = array_map(
            'absint',
            $related_post_ids
        );

    } else {

        $ids = array_filter(
            array_map(
                'absint',
                preg_split(
                    '/[\s,]+/',
                    $related_post_ids
                )
            )
        );
    }

    if (!empty($ids)) {

        $related_query_args['post__in'] = $ids;
        $related_query_args['orderby'] = 'post__in';

    }

} else {

    $categories = wp_get_post_categories(
        $current_post_id
    );

    if (!empty($categories)) {

        $related_query_args['category__in'] = $categories;

    }
}

$related_posts = new WP_Query(
    $related_query_args
);

if (!$related_posts->have_posts()) {

    wp_reset_postdata();

    return;
}
?>

<section class="related-posts">

    <div class="related-posts-header">

        <h2>
            Related Articles
        </h2>

    </div>

    <div class="row blog-grid g-4">

        <?php while ($related_posts->have_posts()) : ?>

            <?php $related_posts->the_post(); ?>

            <div class="col-md-6 col-lg-4">

                <?php
                get_template_part(
                    'template-parts/components/cards/blog-card',
                    null,
                    [
                        'post_id' => get_the_ID(),
                    ]
                );
                ?>

            </div>

        <?php endwhile; ?>

    </div>

</section>

<?php
wp_reset_postdata();
?>