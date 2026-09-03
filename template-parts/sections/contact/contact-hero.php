<?php

$section = tcw_get_section('contact_section');

if (!$section) {
    return;
}

$methods = $section['contact_methods'] ?? [];

?>

<section class="contact-section about-hero section">

    <div class="container">

        <div class="row align-items-start">

            <div class="col-lg-7">

                <?php if (!empty($section['eyebrow'])) : ?>

                    <span class="eyebrow contact-pill">

                        <span class="pill-dot"><i class="bi bi-circle-fill"></i></span>

                        <?php echo esc_html($section['eyebrow']); ?>

                    </span>

                <?php endif; ?>

                <?php if (!empty($section['heading'])) : ?>

                    <h1 class="contact-title">

                        <?php echo esc_html($section['heading']); ?>

                    </h1>

                <?php endif; ?>

                <?php if (!empty($section['description'])) : ?>

                    <p class="contact-lead">

                        <?php echo esc_html($section['description']); ?>

                    </p>

                <?php endif; ?>

                <?php if (!empty($methods)) : ?>

                    <ul class="contact-list">

                        <?php foreach ($methods as $method) : ?>

                            <li>

                                <i class="<?php echo esc_attr($method['icon']); ?>"></i>
								
								<?php if (!empty($section['contact_methods_heading'])) : ?>

									<span>

										<?php echo esc_html($section['contact_methods_heading']); ?>

									</span>

								<?php endif; ?>
								
                                <a href="mailto:<?php echo esc_attr($method['value']); ?>" target="_blank">

                                    <?php echo esc_html($method['value']); ?>

                                </a>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

            </div>

            <div class="col-lg-5">

                <div class="contact-form">

                    <?php

                    if (!empty($section['form_shortcode'])) {

                        echo do_shortcode($section['form_shortcode']);

                    }

                    ?>

                </div>

            </div>

        </div>

    </div>

</section>