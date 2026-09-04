<?php

function tcw_enqueue_assets() {

    // --- Global Styles ---
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        array(),
        '1.11.3'
    );

    wp_enqueue_style(
        'tcw-base',
        get_template_directory_uri() . '/assets/css/base.css',
        array('bootstrap'),
        filemtime(get_template_directory() . '/assets/css/base.css')
    );

    wp_enqueue_style(
        'tcw-header',
        get_template_directory_uri() . '/assets/css/header.css',
        array('bootstrap', 'tcw-base'),
        filemtime(get_template_directory() . '/assets/css/header.css')
    );

    wp_enqueue_style(
        'tcw-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        array('bootstrap', 'tcw-base'),
        filemtime(get_template_directory() . '/assets/css/footer.css')
    );


    // --- Page-Specific Conditional Styles (Template Based) ---
    $responsive_dependencies = array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer');

    if (is_front_page()) {
        wp_enqueue_style(
            'tcw-home',
            get_template_directory_uri() . '/assets/css/home.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/home.css')
        );
        $responsive_dependencies[] = 'tcw-home';
    }

    if (is_home() || is_category() || is_tag() || is_author() || is_archive() || (is_single() && get_post_type() === 'post')) {

        wp_enqueue_style(
            'tcw-blog',
            get_template_directory_uri() . '/assets/css/blog.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/blog.css')
        );

        wp_enqueue_script(
            'tcw-blog',
            get_template_directory_uri() . '/assets/js/blog.js',
            array(),
            filemtime(get_template_directory() . '/assets/js/blog.js'),
            true
        );

        wp_localize_script(
            'tcw-blog',
            'tcwBlog',
            array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('tcw_blog_filter'),
            )
        );

        $responsive_dependencies[] = 'tcw-blog';
    }

    if ( (is_single() && get_post_type() === 'post') || is_page_template('templates/page-author.php') || is_author() ) {
        wp_enqueue_style(
            'tcw-single-blog',
            get_template_directory_uri() . '/assets/css/single-blog.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/single-blog.css')
        );
        $responsive_dependencies[] = 'tcw-single-blog';
    }

    if (is_page_template('templates/page-about.php')) {
        wp_enqueue_style(
            'tcw-about',
            get_template_directory_uri() . '/assets/css/about.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/about.css')
        );
        $responsive_dependencies[] = 'tcw-about';
    }

    if (is_page_template('templates/page-contact.php')) {
        wp_enqueue_style(
            'tcw-contact',
            get_template_directory_uri() . '/assets/css/contact.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/contact.css')
        );
        $responsive_dependencies[] = 'tcw-contact';
    }

    if (is_page_template('templates/page-legal.php')) {
        wp_enqueue_style(
            'tcw-legal',
            get_template_directory_uri() . '/assets/css/legal.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/legal.css')
        );
        $responsive_dependencies[] = 'tcw-legal';
    }

    if (is_page_template('templates/page-industry.php')) {
        wp_enqueue_style(
            'tcw-industry',
            get_template_directory_uri() . '/assets/css/industry.css',
            array('bootstrap', 'tcw-base', 'tcw-header', 'tcw-footer'),
            filemtime(get_template_directory() . '/assets/css/industry.css')
        );
        $responsive_dependencies[] = 'tcw-industry';
    }


    // --- Global Responsive Styles (Loaded last with dynamic dependencies) ---
    wp_enqueue_style(
        'tcw-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        $responsive_dependencies,
        filemtime(get_template_directory() . '/assets/css/responsive.css')
    );


    // --- Global Scripts ---
    wp_enqueue_script(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.3',
        true
    );

    wp_enqueue_script(
        'particles',
        'https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        array('gsap'),
        null,
        true
    );

    wp_enqueue_script(
        'gsap-scrollsmoother',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.15.0/ScrollSmoother.min.js',
        array('gsap'),
        null,
        true
    );

    wp_enqueue_script(
        'custom-animations',
        get_template_directory_uri() . '/assets/js/animations.js',
        array('gsap', 'gsap-scrolltrigger'),
        null,
        true
    );

    wp_enqueue_script(
        'tcw-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );
    
}

add_action('wp_enqueue_scripts', 'tcw_enqueue_assets');

/**
 * Add Google Analytics (gtag.js) globally to <head>
 */
function tcw_add_google_analytics() {
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-4HY9GJY1RP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-4HY9GJY1RP');
    </script>
    <?php
}
add_action('wp_head', 'tcw_add_google_analytics', 1);