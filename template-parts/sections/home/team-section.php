<?php
/**
 * AI Engineered Section
*/

$team_section = tcw_get_section('meet_the_team_section');

if (!$team_section) {
    return;
}

?>

<section class="ai-section section">

    <div class="container text-center ai-team-section">

        <?php
        get_template_part(
            'template-parts/components/section-header',
            null,
            [
                'eyebrow' => $team_section['team_eyebrow'] ?? '',
                'title' => $team_section['team_heading'] ?? '',
            ]
        );
        ?>

        <?php if (!empty($team_section['team_cards'])) : ?>

            <div class="row g-4 mt-3 text-start" data-gsap="stagger-children">

                <?php foreach ($team_section['team_cards'] as $card) : ?>

                    <div class="col-md-4">

                        <?php
                        get_template_part(
                            'template-parts/components/cards/use-card',
                            null,
                            [
                                'title' => $card['title'] ?? '',
                                'description' => $card['description'] ?? '',
                                'background' => $card['background_image'] ?? '',
                            ]
                        );
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</section>