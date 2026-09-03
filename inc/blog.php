<?php

/**
 * Blog AJAX Filtering
 */

function tcw_filter_blog_posts() {

    check_ajax_referer('tcw_blog_filter', 'nonce');

    $category = isset($_POST['category'])
        ? absint($_POST['category'])
        : 0;

    $query_args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 50,
    ];

    if ($category) {
        $query_args['cat'] = $category;
    }

    $query = new WP_Query($query_args);

    ob_start();

    if ($query->have_posts()) {

        while ($query->have_posts()) {

            $query->the_post();
            ?>

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

            <?php
        }

    } else {
        ?>

        <div class="col-12">

            <div class="blog-empty text-center">

                <p>
                    No articles found in this category.
                </p>

            </div>

        </div>

        <?php
    }

    wp_reset_postdata();

    wp_send_json_success([
        'html' => ob_get_clean(),
    ]);
}

add_action(
    'wp_ajax_tcw_filter_blog_posts',
    'tcw_filter_blog_posts'
);

add_action(
    'wp_ajax_nopriv_tcw_filter_blog_posts',
    'tcw_filter_blog_posts'
);