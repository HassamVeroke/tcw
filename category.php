<?php
/**
 * Category Archive
 */

get_header();

$category = get_queried_object();

get_template_part(
    'template-parts/sections/blog/blog-listing',
    null,
    [
        'selected_category' => $category->term_id,
    ]
);

get_footer();