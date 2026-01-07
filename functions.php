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

function custom_theme_setup() {
    register_nav_menu(
        'header-menu-location',
        'Header Menu Location'
    );
    register_nav_menu(
        'footer-menu-location',
        'Footer Menu Location'
    );
    add_theme_support('title-tag');
}


add_action('wp_enqueue_scripts', 'custom_theme_assets');
add_action('after_setup_theme', 'custom_theme_setup');

add_filter('nav_menu_css_class', function($classes, $item, $args) {
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }

    if (in_array('current-menu-item', $classes) || in_array('current_page_item', $classes)) { $classes[] = 'text-purple-400 font-semibold'; }

    return $classes;
}, 10, 3);