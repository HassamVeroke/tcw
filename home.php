<?php
/**
 * Blog Posts Page
 */

if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = sanitize_title(wp_unslash($_GET['category']));

    add_filter('pre_get_posts', function ($query) use ($category) {

        if ($query->is_main_query() && !is_admin()) {
            $query->set('category_name', $category);
        }

    });
}

get_header();

get_template_part('template-parts/sections/blog/blog-listing');

get_footer();