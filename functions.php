<?php
$script_main = [
    'main-script' => true,
    'preload' => true
];

function enqueue_assets() {
    global $template;

    // Register and enqueue a JavaScript file depending on the current page
    if(basename($template) === 'page-wholesale-inqueries.php' || is_front_page()) {
        wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/index.js', array(), null, true);
        wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/index.css', array(), null);
    } else if (basename($template) === 'page-location.php') {
        wp_enqueue_script("main-script", get_template_directory_uri() . '/dist/location.js', array(), null, true);
        wp_enqueue_style('location-style', get_template_directory_uri() . '/dist/location.css', array(), null);
        wp_enqueue_script("preload", get_template_directory_uri() . "/dist/menu.js", array(), null, true);
    }
}

add_action('wp_enqueue_scripts', 'enqueue_assets');

/** Function for adding type=module attribute to the script element */
$enqueue_script_add_type_attribute = static function( $tag, $handle ){
    global $script_main;
    // if not your script, do nothing and return original $tag
    if($script_main[$handle]){

        // remove the current type if there is one
        $tag = preg_replace( '/ type=([\'"])[^\'"]+\1/', '', $tag ); 
        
        // add type
        $tag = str_replace( 'src=', 'type="module" src=', $tag );
    }
    return $tag;
};

add_filter( 'script_loader_tag', $enqueue_script_add_type_attribute , 10, 3 );




function theme_prefix_setup() {
    add_theme_support( 'custom-logo');
}

add_action( 'after_setup_theme', 'theme_prefix_setup' );


add_action( 'init', function () {
    register_nav_menu('mobile_menu',__( 'Mobile Menu', "to_takeoff" ));
});

