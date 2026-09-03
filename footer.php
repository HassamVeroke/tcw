<?php
/**
 * Footer
 */
?>

<?php get_template_part('template-parts/sections/home/cta'); ?>

        <footer class="tcw-footer">

            <div class="container text-center">

                <div class="d-inline-flex align-items-center">

                    <?php
                    if (has_custom_logo()) {

                        the_custom_logo();

                    } else {

                        bloginfo('name');

                    }
                    ?>

                </div>

                <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-nav',
                        'fallback_cb' => false,
                    ]);
                ?>

            </div>

            <div class="container">

                <div class="row footer-bottom">

                    <div class="col-lg-6">

                        <p class="footer-copy">

                            &copy; <?php echo esc_html(date('Y')); ?>

                            <?php bloginfo('name'); ?>.

                            <?php esc_html_e('All rights reserved.', 'tcw'); ?>

                        </p>

                    </div>

                    <div class="col-lg-6">

                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_legal',
                            'container' => false,
                            'menu_class' => 'footer-legal-nav',
                            'fallback_cb' => false,
                        ]);
                        ?>

                    </div>

                </div>

            </div>

        </footer>

    </div>

</div>

<?php wp_footer(); ?>

</body>

</html>