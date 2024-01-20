<?php

function enqueue_assets() {
    // Register and enqueue a JavaScript file
    wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/index.js', array(), null, true);
    // Register and enqueue a CSS file
    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/index.css', array(), null);
}

add_action('wp_enqueue_scripts', 'enqueue_assets');


function theme_prefix_setup() {
    add_theme_support( 'custom-logo');
}

add_action( 'after_setup_theme', 'theme_prefix_setup' );


add_action('after_setup_theme', function () {
    show_admin_bar(false);
});

add_action( 'init', function () {
    register_nav_menu('mobile_menu',__( 'Mobile Menu' ));
});

