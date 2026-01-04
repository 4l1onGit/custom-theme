<?php

function custom_theme_assets() {
    wp_enqueue_style(
        'custom-theme-style',
        get_template_directory_uri() . '/dist/main.css',
        array(),
        filemtime(get_template_directory() . '/dist/main.css')
    );
    wp_enqueue_style(
        'google-fonts-roboto',
        '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap',

    );

}
add_action('wp_enqueue_scripts', 'custom_theme_assets');
add_action('after_setup_theme', 'custom_theme_setup');

function custom_theme_setup() {
    add_theme_support('title-tag');
}