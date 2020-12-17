<?php

//function child_theme_scripts() {
//    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//}
//add_action( 'wp_enqueue_scripts', 'child_theme_scripts' );

add_action('wp_enqueue_scripts', 'theme_styles');
add_action('wp_enqueue_scripts', 'theme_js');

function theme_styles() {
    wp_enqueue_style( 'slick', get_theme_file_uri() . '/assets/css/slick.css');
    wp_enqueue_style( 'style', get_theme_file_uri() . '/assets/css/style.css', array('slick') );
}

function theme_js() {
    wp_enqueue_script('slick', get_theme_file_uri() . '/assets/js/slick.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_theme_file_uri() . '/assets/js/main.js', array('jquery'), null, true);
}