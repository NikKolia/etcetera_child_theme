<?php
/* Template Name: Home page */
get_header();
?>

    <main>
        <section class="hero-slider">
            <?php
            if( have_rows('slider') ):
                while ( have_rows('slider') ) : the_row();
                    if( get_row_layout() == 'slide' ):
                        if( have_rows('slide_image') ):

                            echo '<div class="hero-slider__block">';
                                while ( have_rows('slide_image') ) : the_row();
                                    $image = get_sub_field('image');
                                    echo '<img class="hero-slider__img" src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
                                endwhile;

                                echo '<div class="wrapper">';
                                    while ( have_rows('slide_text') ) : the_row();
                                        echo '<h2>';
                                            echo the_sub_field('first_text');
                                        echo '</h2>';
                                        echo '<h4 class="white">';
                                            echo the_sub_field('second_text');
                                        echo '</h4>';
                                    endwhile;
                                echo '</div>';
                            echo '</div>';

                        endif;
                    endif;
                endwhile;
            else :
                // макетов не найдено
            endif;
            ?>
        </section>

        <section class="texting">
            <div class="wrapper">
                <div class="text-wrap">
                    <?php the_content() ?>
                </div>
            </div>
        </section>

        <section class="filter">
            <div class="wrapper">
                <?php if (is_active_sidebar('filter')) : ?>
                    <div class="filter">
                        <?php dynamic_sidebar('filter'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
    </main>

<?php get_footer(); ?>