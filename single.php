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

    <section class="single-page-container course-page">
        <div class="single-page-box">
            <div class="single-page-block">

                <!--<div class="needle-9"></div>-->
                <div class="single-page-img"><?php the_post_thumbnail('middle'); ?></div>

            </div>
            <div class="single-page-content">
                <div class="single-page-title"><h1><?php the_title(); ?></h1></div>
                <div class="single-page-double">
                    <div class="single-page-price"><p><?php the_field('price'); ?></p></div>
                    <div class="single-page-time"><p><?php the_field('time'); ?></p></div>
                </div>

                <div class="line-8"></div>

                <div class="single-page-text"><p><?php the_content(); ?></p></div>
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
                    echo '<div class="our-production__cont">';

                    echo '<h4>Помещения:</h4>';
                    foreach ($grid['grid_items'] as $item) {
                        $content = $item['grid_item'];
                        $image = $content['image']['sizes']['medium_large'];
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
            </div>git
        </div>

    </section>


<?php
endwhile; // End of the loop.
?>


<?php

get_footer();