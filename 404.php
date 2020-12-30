<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pins-theme
 */

get_header();
?>

    <section class="container">
        <div class="page404">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/img/404.png" alt="">
        </div>
        <div class="page404-back">
            <a href="<?php echo get_home_url(); ?>">Перейти на главную страницу<div class="arrow">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/img/mini-arrow-right.png" alt="">
                </div>
            </a>
        </div>
    </section>

<?php
get_footer();
