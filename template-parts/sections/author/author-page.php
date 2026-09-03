<?php
/**
 * Author Page
 */

$author_id = get_queried_object_id();

if (!$author_id) {
    return;
}

$author_name = get_the_author_meta('display_name', $author_id);
$author_description = get_the_author_meta('description', $author_id);

$author_role = get_field('author_role', 'user_' . $author_id);
$author_company = get_field('author_company', 'user_' . $author_id);
$author_bio = get_field('author_bio', 'user_' . $author_id);
$author_social_url = get_field('author_social_url', 'user_' . $author_id);
$author_photo = get_field('author_photo', 'user_' . $author_id);

if (!$author_bio) {
    $author_bio = $author_description;
}

if (!$author_photo) {
    $author_photo = [
        'url' => get_avatar_url($author_id, ['size' => 400]),
        'alt' => $author_name,
    ];
}
?>

<section class="author-page-section section">

    <div class="container">

        <?php
            get_template_part(
                'template-parts/sections/blog/author-box',
                null,
                [
                    'author_id' => $author_id,
                ]
            );
        ?>

        <div class="author-posts pt-5">

            <h2>Articles by <?php echo esc_html($author_name); ?></h2>

            <div class="row g-4 mt-5">

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-md-6 col-lg-4">

                            <?php
                            get_template_part(
                                'template-parts/components/cards/blog-card'
                            );
                            ?>

                        </div>

                    <?php endwhile; ?>

                <?php else : ?>

                    <div class="col-12">

                        <p>No articles found.</p>

                    </div>

                <?php endif; ?>

            </div>

            <?php
            the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => '<i class="bi bi-arrow-left"></i>',
                'next_text' => '<i class="bi bi-arrow-right"></i>',
            ]);
            ?>

        </div>

    </div>

</section>