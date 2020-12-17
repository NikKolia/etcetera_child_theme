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
                    <div class="frontCounter">
                        <?php dynamic_sidebar('filter'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="our-production">
            <div class="wrapper">
                <?php
                global $post;
                $args = array(
                    'numberposts' => 10,
                    'post_type' => 'property',
                    'publish' => true
                );
                $page_posts = get_posts($args);
                foreach ($page_posts as $post) {
                    ?>
                    <div class="our-production__cont">
                        <div class="our-production__block>

                            <div class="our-production__block">
                                <a href="<?php the_permalink(); ?>"class="our-production__img">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'article-image'); ?>
                                </a>
                            </div>
                            <div class="line">
                                <hr/>
                            </div>

                            <h3>
                                <a href="<?php the_permalink(); ?>"class="news-title"><?php the_title(); ?></a>
                            </h3>
                            <?php the_excerpt(); ?>
                            <?php
                                $network = get_field('network_grid');

                                foreach ($network as $grid) {
                                    echo '<p>Название дома: '. $grid['building_title']['title'] .'</p>';
                                    echo '<p>Координаты местонахождения: '. $grid['building_location']['location'] .'</p>';
                                    echo '<p>Количество этажей: '. $grid['floors_number']['number'] .'</p>';
                                    echo '<p>Тип строения: '. $grid['building_type']['type'] .'</p>';
                                    echo '<p>Экологичность: '. $grid['building_eco']['eco'] .'</p>';
                                    $content = $grid['building_image'];
                                    $image = $content['image']['sizes']['medium_large'];
                                    ?>
                                    <p>Изображение дома: </p>
                                    <img src="<?php echo $image ?>" alt="" class="our-production__img">
                                    <?php
                                    echo '<div class="">';

                                    echo '<h4>Помещения:</h4>';
                                    foreach ($grid['grid_items'] as $item) {
                                        $content = $item['grid_item'];
                                        $image = $content['image_img']['sizes']['medium_large'];
                                        ?>
                                        <p>Площадь: <?php echo $item['square'] ?></p>
                                        <p>Кол.комнат : <?php echo $item['rooms'] ?></p>
                                        <p>Балкон : <?php echo $item['balcony'] ?></p>
                                        <p>Санузел: <?php echo $item['bathroom'] ?></p>
                                        <p>Изображение помещения: </p>
                                        <a href="<?php the_permalink(); ?>" class="our-production__block" target="_blank">
                                            <img src="<?php echo $image ?>" alt="" class="our-production__img">
                                            <span class="our-production__title"><?php echo $content['image_text'] ?></span>
                                        </a>
                                    <?php }

                                    echo '</div>';
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </section>
    </main>

<?php get_footer(); ?>