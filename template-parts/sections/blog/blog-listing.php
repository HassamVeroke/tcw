<?php
/**
 * Blog Listing
 */

$selected_category = isset($args['selected_category'])
    ? absint($args['selected_category'])
    : 0;

$paged = max(
    1,
    get_query_var('paged'),
    get_query_var('page')
);

$query_args = [
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 50,
    'paged'          => $paged,
];

if ($selected_category) {
    $query_args['cat'] = $selected_category;
}

$blog_query = new WP_Query($query_args);

$categories = get_categories([
    'taxonomy'   => 'category',
    'hide_empty' => true,
]);
?>

<section class="inner-page-hero blog-hero text-center">
    <div class="hero-circle"></div>
    
    <div class="container position-relative">
        <span class="eyebrow">
            Blog
        </span>
        <h1 class="hero-title" data-gsap="fade-up">
            <span class="text-primary-tcw">TCW</span>
            <?php // echo esc_html($blog_title); ?>
            Insights
        </h1>
        <p class="hero-sub mx-auto" data-gsap="fade-up">
            Insights, guidance, and perspectives on global trade compliance.
        </p>

    </div>

</section>

<section class="blog-cards-section section">

    <div class="container">

        <?php if (!empty($categories)) : ?>

            <div
                class="blog-filters"
                id="blog-filters" data-gsap="fade-up">

                <button
                    type="button"
                    class="blog-filter <?php echo !$selected_category ? 'active' : ''; ?>"
                    data-category="0">

                    All

                </button>

                <?php foreach ($categories as $category) : ?>

                    <button
                        type="button"
                        class="blog-filter <?php echo $selected_category === $category->term_id ? 'active' : ''; ?>"
                        data-category="<?php echo esc_attr($category->term_id); ?>">

                        <?php echo esc_html($category->name); ?>

                    </button>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

        <div
            id="blog-results"
            class="row blog-grid g-4">

            <?php if ($blog_query->have_posts()) : ?>

                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>

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

            <?php else : ?>

                <div class="col-12">

                    <div class="blog-empty text-center">

                        <p>
                            No articles found.
                        </p>

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php
wp_reset_postdata();
?>