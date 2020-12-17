<?php
/* Template Name: Contact page */
get_header();
?>

    <main>
        <section class="hero">
            <div class="wrapper">
                <h1><?php the_title() ?></h1>
            </div>
            <?php the_post_thumbnail( 'full', 'class=hero-slider__img' ) ?>
        </section>

        <section class="texting">
            <div class="wrapper">
                <div class="text-wrap">
                    <?php the_content() ?>
                </div>
                <div class="maps"><?php the_field('map') ?></div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>