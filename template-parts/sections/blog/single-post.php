<?php
/**
 * Single Blog Post
 */

if (!have_posts()) {
    return;
}

while (have_posts()) :
    the_post();

    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
    $author_url = get_author_posts_url($author_id);
    $reading_time = tcw_get_reading_time(get_the_content());

    $categories = get_the_category();

    $breadcrumb_items = [
        [
            'title' => 'Blog',
            'url' => get_permalink(get_option('page_for_posts')),
        ],
    ];

    if (!empty($categories)) {
        $breadcrumb_items[] = [
            'title' => $categories[0]->name,
            'url' => get_category_link($categories[0]->term_id),
        ];
    }

    $breadcrumb_items[] = [
        'title' => get_the_title(),
        'url' => '',
    ];

    $content_data = tcw_generate_toc(apply_filters('the_content', get_the_content()));

    $article_content = $content_data['content'];
    $toc = $content_data['toc'];
?>

<section class="single-blog-section section">

    <div class="container">

        <div class="single-blog-breadcrumbs">

            <?php foreach ($breadcrumb_items as $index => $item) : ?>

                <?php if ($index > 0) : ?>

                    <span class="breadcrumb-separator">
                        <i class="bi bi-chevron-right"></i>
                    </span>

                <?php endif; ?>

                <?php if (!empty($item['url'])) : ?>

                    <a href="<?php echo esc_url($item['url']); ?>">
                        <?php echo esc_html($item['title']); ?>
                    </a>

                <?php else : ?>

                    <span>
                        <?php echo esc_html($item['title']); ?>
                    </span>

                <?php endif; ?>

            <?php endforeach; ?>

        </div>

        <div class="single-blog-header">

            <?php if (has_post_thumbnail()) : ?>

                <div class="single-blog-featured-image">

                    <?php
                    the_post_thumbnail(
                        'full',
                        [
                            'class' => 'img-fluid',
                        ]
                    );
                    ?>

                </div>

            <?php endif; ?>

            <h1 class="single-blog-title">
                <?php the_title(); ?>
            </h1>

            <div class="single-blog-meta">

                <span>
                    Author:
                    <a href="<?php echo esc_url($author_url); ?>">
                        <?php echo esc_html($author_name); ?>
                    </a>
                </span>

                <span class="meta-separator">|</span>

                <span>
                    <?php echo esc_html($reading_time); ?>
                </span>

                <span class="meta-separator">|</span>

                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(get_the_date('F j, Y')); ?>
                </time>

            </div>

        </div>

        <div class="single-blog-content">

                <?php if (!empty($toc)) : ?>

                    <div class="single-blog-toc">

                        <h2>Table of Contents</h2>

                        <ul>

                            <?php foreach ($toc as $item) : ?>

                                <li class="toc-<?php echo esc_attr($item['level']); ?>">

                                    <a href="#<?php echo esc_attr($item['id']); ?>">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                <?php endif; ?>

                <div class="single-blog-entry">

                    <?php echo $article_content; ?>

                </div>

                <div class="single-blog-share">

                    <span>Share:</span>

                    <a
                        href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo rawurlencode(get_permalink()); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>

                    <a
                        href="https://twitter.com/intent/tweet?url=<?php echo rawurlencode(get_permalink()); ?>&text=<?php echo rawurlencode(get_the_title()); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on X">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(get_permalink()); ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Share on Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a
                        href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode(get_permalink()); ?>"
                        aria-label="Share by Email">
                        <i class="bi bi-envelope"></i>
                    </a>

                </div>

                <?php
                get_template_part(
                    'template-parts/sections/blog/author-box',
                    null,
                    [
                        'author_id' => $author_id,
                    ]
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/sections/blog/related-posts'
                );
                ?>

        </div>

    </div>

</section>

<?php
endwhile;