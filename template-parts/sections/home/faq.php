<?php
/**
 * FAQ Section
*/

$section = tcw_get_section('faq_section');

if (!$section) {
    return;
}

$faqs = $section['faq_items'] ?? [];

?>

<section class="faq-section section">

    <div class="container">

        <?php if (!empty($section['faq_heading'])) : ?>

            <h2 class="section-title text-center" data-gsap="fade-up">

                <?php echo esc_html($section['faq_heading']); ?>

            </h2>

        <?php endif; ?>

        <?php if (!empty($faqs)) : ?>

            <div class="accordion tcw-accordion mx-auto" id="faq" data-gsap="fade-up">

                <?php foreach ($faqs as $index => $faq) : ?>

                    <?php
                    get_template_part(
                        'template-parts/components/accordion/accordion-item',
                        null,
                        [
                            'id' => 'faq-item-' . $index,
                            'parent' => 'faq',
                            'title' => $faq['question'] ?? '',
                            'content' => $faq['answer'] ?? '',
                            'expanded' => $index === 0
                        ]
                    );
                    ?>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>