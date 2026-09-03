<?php

if (!defined('ABSPATH')) {
    exit;
}

function tcw_get_section($field_name) {
    return get_field($field_name, get_queried_object_id()) ?: [];
}

// Redirect all 404 page to homepage
function custom_redirect_404_to_homepage() {
    if ( is_404() ) {
        wp_redirect( home_url( '/' ), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'custom_redirect_404_to_homepage' );

// Reading Time
function tcw_get_reading_time($content) {
    $content = wp_strip_all_tags($content);
    $word_count = str_word_count($content);
    $minutes = max(1, (int) ceil($word_count / 200));
    return $minutes . ' min read';
}

// Automatic Table of Contents
function tcw_generate_toc($content) {
    $toc = [];
    $used_ids = [];

    $content = preg_replace_callback(
        '/<(h2|h3)([^>]*)>(.*?)<\/\1>/is',
        function ($matches) use (&$toc, &$used_ids) {
            $level = strtolower($matches[1]);
            $attributes = $matches[2];
            $heading = wp_strip_all_tags($matches[3]);
            $base_id = sanitize_title($heading);

            if (!$base_id) {
                $base_id = 'section';
            }

            $id = $base_id;
            $counter = 2;

            while (in_array($id, $used_ids, true)) {
                $id = $base_id . '-' . $counter;
                $counter++;
            }

            $used_ids[] = $id;

            $toc[] = [
                'id' => $id,
                'title' => $heading,
                'level' => $level,
            ];

            if (preg_match('/\sid=["\']([^"\']+)["\']/i', $attributes)) {
                $attributes = preg_replace(
                    '/\sid=["\']([^"\']+)["\']/i',
                    ' id="' . esc_attr($id) . '"',
                    $attributes
                );
            } else {
                $attributes .= ' id="' . esc_attr($id) . '"';
            }

            return '<' . $level . $attributes . '>' . $matches[3] . '</' . $level . '>';
        },
        $content
    );

    return [
        'content' => $content,
        'toc' => $toc,
    ];
}

// Show at least 50 posts in the frontend
function tcw_set_blog_posts_per_page($query) {
    if (
        !is_admin() &&
        $query->is_main_query() &&
        (
            $query->is_home() ||
            $query->is_author()
        )
    ) {
        $query->set('posts_per_page', 50);
    }
}
add_action('pre_get_posts', 'tcw_set_blog_posts_per_page');