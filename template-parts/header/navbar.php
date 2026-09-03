<?php
$front_page = get_option('page_on_front');
$cta = get_field('header_cta_button', $front_page);
?>

<header class="tcw-header">

    <nav class="navbar navbar-expand-lg py-2 py-lg-3">

        <div class="container">

            <!-- Logo -->

            <div class="navbar-brand d-flex align-items-center gap-2">

                <?php
                if (has_custom_logo()) {

                    the_custom_logo();

                } else {
                ?>

                    <span class="brand-title text-white">
                        <?php bloginfo('name'); ?>
                    </span>

                <?php } ?>

            </div>

            <!-- Mobile -->

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#primaryMenu">

                <i class="bi bi-list text-white fs-3"></i>

            </button>

            <div class="collapse navbar-collapse justify-content-end"
                 id="primaryMenu">

                <?php

                wp_nav_menu(array(

                    'theme_location' => 'primary',

                    'container' => false,

                    'menu_class' => 'navbar-nav align-items-lg-center gap-lg-4',

                    'fallback_cb' => false,

                    'depth' => 2

                ));

                ?>

                <?php if ($cta) : ?>

                    <a class="btn btn-primary-tcw ms-lg-3"

                       href="<?php echo esc_url($cta['url']); ?>"

                       target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">

                        <?php echo esc_html($cta['title']); ?>

                    </a>

                <?php endif; ?>

            </div>

        </div>

    </nav>

</header>