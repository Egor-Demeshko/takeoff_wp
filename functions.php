<?php
$script_main = [
    'main-script' => true,
    'preload' => true
];

require get_theme_file_path("/assets/php/api/init.php");
require get_theme_file_path("/assets/php/const.php");


function enqueue_assets() {
    global $template;

    // Register and enqueue a JavaScript file depending on the current page
    if(basename($template) === 'page-wholesale-inqueries.php' || is_front_page() || basename($template) === '404.php') {
        wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/index.js', array(), null, true);
        wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/index.css', array(), null);
    } else if (basename($template) === 'page-location.php') {
        wp_enqueue_script("main-script", get_template_directory_uri() . '/dist/location.js', array(), null, true);
        wp_enqueue_style('location-style', get_template_directory_uri() . '/dist/location.css', array(), null);
        wp_enqueue_script("preload", get_template_directory_uri() . "/dist/menu.js", array(), null, true);
    } else if (basename($template) === 'page-learn-more.php') {
        wp_enqueue_style('learn-more-style', get_template_directory_uri() . '/dist/learn_more.css', array(), null);
        wp_enqueue_script('learn-more', get_template_directory_uri() . '/dist/menu.js', array(), null, true);
    } else if (basename($template) === 'page-verify.php') {
        wp_enqueue_style('verify-style', get_template_directory_uri() . '/dist/verify.css', array(), null);
        wp_enqueue_script('menu', get_template_directory_uri() . '/dist/menu.js', array(), null, true);
        wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/verify.js', array(), null, true);
    }
}

add_action('wp_enqueue_scripts', 'enqueue_assets');

/** Function for adding type=module attribute to the script element */
$enqueue_script_add_type_attribute = static function( $tag, $handle ){
    global $script_main;
    // if not your script, do nothing and return original $tag
    if(isset($script_main[$handle])){

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

add_action( 'init', 'register_custom_post_type' );

function register_custom_post_type() {
    $labels = array(
        'name'               => _x( 'Shops', 'post type general name', 'to_takeoff' ),
        'singular_name'      => _x( 'Shop', 'post type singular name', 'to_takeoff' ),
        'menu_name'          => _x( 'Shops', 'admin menu', 'to_takeoff' ),
        'name_admin_bar'     => _x( 'Shop', 'add new on admin bar', 'to_takeoff' ),
        'add_new'            => _x( 'Add New', 'book', 'to_takeoff' ),
        'add_new_item'       => __( 'Add New Shop', 'to_takeoff' ),
        'new_item'           => __( 'New Shop', 'to_takeoff' ),
        'edit_item'          => __( 'Edit Shop', 'to_takeoff' ),
        'view_item'          => __( 'View Shop', 'to_takeoff' ),
        'all_items'          => __( 'All Shops', 'to_takeoff' ),
        'search_items'       => __( 'Search Shops', 'to_takeoff' ),
        'parent_item_colon'  => __( 'Parent Shops:', 'to_takeoff' ),
        'not_found'          => __( 'No Shops found.', 'to_takeoff' ),
        'not_found_in_trash' => __( 'No Shops found in Trash.', 'to_takeoff' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'to_takeoff' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'shops' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-admin-multisite', // Add this line
        'supports'           => array( 'title' ) // Removed 'editor'
    );

    register_post_type( 'shops', $args );

    $labelsCode = array(
        'name'               => _x( 'Codes', 'post type general name', 'to_takeoff' ),
        'singular_name'      => _x( 'Code', 'post type singular name', 'to_takeoff' ),
        'menu_name'          => _x( 'Codes', 'admin menu', 'to_takeoff' ),
        'name_admin_bar'     => _x( 'Code', 'add new on admin bar', 'to_takeoff' ),
        'add_new'            => _x( 'Add New', 'book', 'to_takeoff' ),
        'add_new_item'       => __( 'Add New Code', 'to_takeoff' ),
        'new_item'           => __( 'New Code', 'to_takeoff' ),
        'edit_item'          => __( 'Edit Code', 'to_takeoff' ),
        'view_item'          => __( 'View Code', 'to_takeoff' ),
        'all_items'          => __( 'All Codes', 'to_takeoff' ),
        'search_items'       => __( 'Search Codes', 'to_takeoff' ),
        'parent_item_colon'  => __( 'Parent Codes:', 'to_takeoff' ),
        'not_found'          => __( 'No Codes found.', 'to_takeoff' ),
        'not_found_in_trash' => __( 'No Codes found in Trash.', 'to_takeoff' )
    );

    $args = array(
        'labels'             => $labelsCode,
        'description'        => __( 'Description.', 'to_takeoff' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'codes' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-warning', // Add this line
        'supports'           => array( 'title' ) // Removed 'editor'
    );

    register_post_type( CODE_POSTTYPE, $args );
}

function add_theme_path_to_head() {
    echo '<script type="text/javascript">';
    echo 'var to_themePath = "' . get_template_directory_uri() . '";';
    echo '</script>';
}

add_action('wp_head', 'add_theme_path_to_head');
