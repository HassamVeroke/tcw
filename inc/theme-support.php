<?php

// Add theme support for various features
function tcw_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ]);
    add_theme_support('menus');
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'tcw_theme_setup');

// Add svg uploads support in WordPress
function allow_svg_uploads($mimes) {
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');
// Restrict to Administrators only
function restrict_svg_to_admins($file) {
   if (strpos($file['type'], 'svg') !== false && !current_user_can('administrator')) {
       $file['error'] = 'Only administrators can upload SVG files.';
   }
   return $file;
}
add_filter('wp_handle_upload_prefilter', 'restrict_svg_to_admins');

// Register Footer Menus
register_nav_menus([
    'primary' => __('Primary Menu', 'tcw'),
    'footer' => __('Footer Menu', 'tcw'),
    'footer_legal' => __('Footer Legal Menu', 'tcw'),
]);

