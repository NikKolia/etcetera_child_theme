<?php
/* Template Name: Products page */
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
            </div>
        </section>

        <section class="our-production">
            <div class="wrapper">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $data= new WP_Query(array(
                    'post_type'=>'property',
                    'posts_per_page' => 1,
                    'paged' => $paged,
                ));

                if($data->have_posts()) :
                    while($data->have_posts())  : $data->the_post();
                        ?>

                                <div class="our-production__block>
                                    <a href="<?php the_permalink(); ?>"class="our-production__img">
                                        <?php echo get_the_post_thumbnail(get_the_ID(), 'article-image'); ?>
                                    </a>
                                </div>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"class="news-title"><?php the_title(); ?></a>
                                </h3>
                                <?php the_excerpt(); ?>
                                <p>Название дома: <?php  the_field('building_title') ?></p>
                                <p>Район: <?php echo strip_tags( get_the_term_list( $post ->ID, 'area'));?></p>
                                <p>Координаты местонахождения: <?php  the_field('building_location') ?></p>
                                <p>Количество этажей: <?php  the_field('floors_number') ?></p>
                                <p>Тип строения: <?php  the_field('building_type') ?></p>
                                <p>Экологичность: <?php  the_field('building_eco') ?></p>
                                <?php
                                $image = get_field('building_image');
                                if( !empty( $image ) ): ?>
                                    <p>Изображение дома: </p>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="our-production__img"/>
                                <?php endif; ?>

                                <div class="">
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
                        <?php
                    endwhile;

                    $total_pages = $data->max_num_pages;

                    if ($total_pages > 1){

                        $current_page = max(1, get_query_var('paged'));

                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« prev'),
                            'next_text'    => __('next »'),
                        ));
                    }
                    ?>
                <?php else :?>
                    <h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>
                <?php endif; ?>
                <?php wp_reset_postdata();?>

            </div>
        </section>
    </main>

<!--    <main>-->
<!--        <section class="hero">-->
<!--            <div class="wrapper">-->
<!--                <h1>--><?php //the_title() ?><!--</h1>-->
<!--            </div>-->
<!--            --><?php //the_post_thumbnail( 'full', 'class=hero-slider__img' ) ?>
<!--        </section>-->
<!---->
<!--        <section class="texting">-->
<!--            <div class="wrapper">-->
<!--                <div class="text-wrap">-->
<!--                    --><?php //the_content() ?>
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
<!---->
<!--        <section class="our-production">-->
<!--            <div class="wrapper">-->
<!--                --><?php
//                global $post;
//                $args = array(
//                    'numberposts' => 10,
//                    'post_type' => 'property',
//                    'publish' => true
//                );
//                $page_posts = get_posts($args);
//                foreach ($page_posts as $post) {
//                ?>
<!--                <div class="our-production__cont">-->
<!--                    <div class="our-production__block>-->
<!---->
<!--                            <div class="our-production__block">-->
<!--                    <a href="--><?php //the_permalink(); ?><!--"class="our-production__img">-->
<!--                        --><?php //echo get_the_post_thumbnail(get_the_ID(), 'article-image'); ?>
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="line">-->
<!--                    <hr/>-->
<!--                </div>-->
<!---->
<!--                <h3>-->
<!--                    <a href="--><?php //the_permalink(); ?><!--"class="news-title">--><?php //the_title(); ?><!--</a>-->
<!--                </h3>-->
<!--                --><?php //the_excerpt(); ?>
<!--                <p>Название дома: --><?php // the_field('building_title') ?><!--</p>-->
<!--                <p>Район: --><?php //echo strip_tags( get_the_term_list( $post ->ID, 'area'));?><!--</p>-->
<!--                <p>Координаты местонахождения: --><?php // the_field('building_location') ?><!--</p>-->
<!--                <p>Количество этажей: --><?php // the_field('floors_number') ?><!--</p>-->
<!--                <p>Тип строения: --><?php // the_field('building_type') ?><!--</p>-->
<!--                <p>Экологичность: --><?php // the_field('building_eco') ?><!--</p>-->
<!--                --><?php
//                $image = get_field('building_image');
//                if( !empty( $image ) ): ?>
<!--                    <p>Изображение дома: </p>-->
<!--                    <img src="--><?php //echo esc_url($image['url']); ?><!--" alt="--><?php //echo esc_attr($image['alt']); ?><!--" class="our-production__img"/>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php
//
//                echo '<div class="">';
//
//                $grid_items = get_field('grid_items');
//                foreach ($grid_items as $grid_item) {
//                    $content = $grid_item['grid_item'];
//                    $image = $content['image_img']['sizes']['medium_large'];
//                    ?>
<!--                    <h4>Помещение:</h4>-->
<!--                    <p>Площадь: --><?php //echo $grid_item['square'] ?><!--</p>-->
<!--                    <p>Кол.комнат : --><?php //echo $grid_item['rooms'] ?><!--</p>-->
<!--                    <p>Балкон : --><?php //echo $grid_item['balcony'] ?><!--</p>-->
<!--                    <p>Санузел: --><?php //echo $grid_item['bathroom'] ?><!--</p>-->
<!--                    <p>Изображения помещения: </p>-->
<!--                    --><?php
//                    echo '<div class="our-production__cont">';
//
//                    foreach ($grid_item['grid_item'] as $item) {
//                        $content = $item['item'];
//                        $image = $content['image']['sizes']['medium_large'];
//                        ?>
<!---->
<!--                        <a href="--><?php //the_permalink(); ?><!--" class="our-production__block" target="_blank">-->
<!--                            <img src="--><?php //echo $image ?><!--" alt="" class="our-production__img">-->
<!--                            <span class="our-production__title">--><?php //echo $content['text'] ?><!--</span>-->
<!--                        </a>-->
<!--                    --><?php //}
//
//                    echo '</div>';
//
//                }
//
//                echo '</div>';
//
//                ?>
<!--            </div>-->
<!--            </div>-->
<!--            --><?php
//            }
//            wp_reset_postdata();
//            ?>
<!--            </div>-->
<!--        </section>-->
<!--    </main>-->

<?php get_footer(); ?>