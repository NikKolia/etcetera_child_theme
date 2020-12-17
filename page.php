<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
?>

<?php get_header(); ?>

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
            </div>
        </section>
    </main>

<?php get_footer(); ?>
