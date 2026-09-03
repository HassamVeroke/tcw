<?php
/**
 * About Hero Section
 */

$section = tcw_get_section('about_hero_section');

if (!$section) {
    return;
}

?>

<section class="inner-page-hero about-hero text-center">

    <div class="hero-circle"></div>

    <div class="container position-relative">

        <?php if (!empty($section['title'])) : ?>

            <h1 class="hero-title" data-gsap="fade-up">

                <?php if (!empty($section['highlight'])) : ?>

                    <span class="text-primary-tcw">

                        <?php echo esc_html($section['highlight']); ?>

                    </span>

                <?php endif; ?>

                <?php echo esc_html($section['title']); ?>

            </h1>

        <?php endif; ?>

        <?php if (!empty($section['description'])) : ?>

            <p class="hero-sub mx-auto" data-gsap="fade-up">

                <?php echo esc_html($section['description']); ?>

            </p>

        <?php endif; ?>

    </div>

</section>