<?php
/**
 * Template Name: Industries
 */

get_header();
?>

<main class="industries-page">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>

            <section class="industries-intro section">
                <div class="container">
                    <h1 class="section-title text-center"><?php the_title(); ?></h1>
                    <?php if (trim(get_the_content())) : ?>
                        <div class="industries-intro__content section-lead mx-auto text-center">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <?php
            $industry_pages = new WP_Query(
                [
                    'post_type'      => 'page',
                    'post_parent'    => get_the_ID(),
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'orderby'        => [
                        'menu_order' => 'ASC',
                        'title'      => 'ASC',
                    ],
                    'no_found_rows'  => true,
                ]
            );
            ?>

            <section class="industries-list section" aria-label="<?php esc_attr_e('Industry pages', 'tcw'); ?>">
                <div class="container">
                    <?php if ($industry_pages->have_posts()) : ?>
                        <div class="industries-grid">
                            <?php while ($industry_pages->have_posts()) : ?>
                                <?php
                                $industry_pages->the_post();
                                $industry_id = get_the_ID();
                                ?>
                                <article class="industries-card">
                                    <?php if (has_post_thumbnail($industry_id)) : ?>
                                        <a
                                            class="industries-card__image-link"
                                            href="<?php the_permalink(); ?>"
                                            aria-label="<?php echo esc_attr(sprintf(__('Explore %s', 'tcw'), get_the_title())); ?>"
                                        >
                                            <?php
                                            echo get_the_post_thumbnail(
                                                $industry_id,
                                                'large',
                                                ['class' => 'industries-card__image']
                                            );
                                            ?>
                                        </a>
                                    <?php endif; ?>

                                    <div class="industries-card__content">
                                        <h2 class="industries-card__title"><?php the_title(); ?></h2>
                                        <p class="industries-card__excerpt"><?php echo esc_html(get_the_excerpt($industry_id)); ?></p>
                                        <a class="btn-primary-tcw industries-card__cta" href="<?php the_permalink(); ?>">
                                            <?php esc_html_e('Explore Industry', 'tcw'); ?>
                                        </a>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <?php wp_reset_postdata(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
