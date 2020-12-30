<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pins-theme
 */

get_header();
?>


<?php
while (have_posts()) :
    the_post(); ?>

    <section>
        <div class="our-production__img"><?php the_post_thumbnail('middle'); ?></div>
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                <?php
                    echo '<p>Название дома: '. get_field('building_title') .'</p>';
                    echo '<p>Координаты местонахождения: '. get_field('building_location') .'</p>';
                    echo '<p>Количество этажей: '. get_field('floors_number') .'</p>';
                    echo '<p>Тип строения: '. get_field('building_type') .'</p>';
                    echo '<p>Экологичность: '. get_field('building_eco') .'</p>';
                    $image = get_field('building_image');
                    if( !empty( $image ) ): ?>
                        <p>Изображение дома: </p>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="our-production__img"/>
                    <?php endif; ?>
                <div>
                    <?php
                    $grid_items = get_field('grid_items');
                    foreach ($grid_items as $grid_item) {
                        $content = $grid_item['grid_item'];
                        $image = $content['image_img']['sizes']['medium_large'];
                        ?>
                        <h4>Помещение:</h4>
                        <p>Площадь: <?php echo $grid_item['square'] ?></p>
                        <p>Кол.комнат : <?php echo $grid_item['rooms'] ?></p>
                        <p>Балкон : <?php echo $grid_item['balcony'] ?></p>
                        <p>Санузел: <?php echo $grid_item['bathroom'] ?></p>
                        <p>Изображения помещения: </p>
                        <?php
                        echo '<div class="our-production__cont">';

                        foreach ($grid_item['grid_item'] as $item) {
                            $content = $item['item'];
                            $image = $content['image']['sizes']['medium_large'];
                            ?>

                            <a href="<?php the_permalink(); ?>" class="our-production__block" target="_blank">
                                <img src="<?php echo $image ?>" alt="" class="our-production__img">
                                <span class="our-production__title"><?php echo $content['text'] ?></span>
                            </a>
                        <?php }

                        echo '</div>';

                    }

                    echo '</div>';

                ?>
    </section>


<?php
endwhile; // End of the loop.
?>


<?php

get_footer();