<?php
/**
 * Blog Author Box
 */

$author_id = isset($args['author_id']) ? absint($args['author_id']) : get_the_author_meta('ID');

if (!$author_id) {
    return;
}

$author_name = get_the_author_meta('display_name', $author_id);
$author_url = get_author_posts_url($author_id);

$author_role = get_field('author_role', 'user_' . $author_id);
$author_company = get_field('author_company', 'user_' . $author_id);
$author_bio = get_field('author_bio', 'user_' . $author_id);
$author_social_url = get_field('author_social_url', 'user_' . $author_id);
$author_social_label = get_field('author_social_label', 'user_' . $author_id);
$author_photo = get_field('author_photo', 'user_' . $author_id);

if (!$author_photo) {
    $author_photo = [
        'url' => get_avatar_url($author_id, ['size' => 200]),
        'alt' => $author_name,
    ];
}
?>

<section class="single-blog-author">

    <div class="single-blog-author-image">

        <img
            src="<?php echo esc_url($author_photo['url']); ?>"
            alt="<?php echo esc_attr($author_photo['alt'] ?: $author_name); ?>"
            loading="lazy">

    </div>

    <div class="single-blog-author-content">

        <h2>

            <a href="<?php echo esc_url($author_url); ?>">
                <?php echo esc_html($author_name); ?>
            </a>

        </h2>

        <?php if ($author_role || $author_company) : ?>

            <div class="single-blog-author-role">

                <?php if ($author_role) : ?>

                    <span>
                        <?php echo esc_html($author_role); ?>
                    </span>

                <?php endif; ?>

                <?php if ($author_company) : ?>

                    <span>
                        <?php echo esc_html($author_company); ?>
                    </span>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <?php if ($author_social_url) : ?>

            <a
                href="<?php echo esc_url($author_social_url); ?>"
                class="single-blog-author-social"
                target="_blank"
                rel="noopener noreferrer">

                <i class="bi bi-linkedin"></i>

            </a>

        <?php endif; ?>

        <?php if ($author_bio) : ?>

            <p>
                <?php echo esc_html($author_bio); ?>
            </p>

        <?php endif; ?>

    </div>

</section>