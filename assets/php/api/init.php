<?php

require get_theme_file_path("/assets/php/api/get_shops.php");
require get_theme_file_path("/assets/php/api/get_coors.php");
require get_theme_file_path("/assets/php/api/verify_code.php");
require get_theme_file_path("/assets/php/api/sanitize.php");
/**
 * function initialize all API endpoints
 */


add_action( 'rest_api_init', function () {
    register_rest_route( 'shops/v1', 'shop', array(
        'methods'             => WP_REST_SERVER::READABLE,           
        'callback'            => 'to_get_shops',
        'permission_callback' => '__return_true',
        'args'                => array([
            CITY_NAME => [
                'default' => 'All',
                'type' => 'string',
                'description' => 'Name of the city to get shops',
                'required' => true,
                'sanitize_callback' => 'sanitize_tags',
            ]
        ]),
    ) );


    register_rest_route( 'shops/v1', 'shop/all_coors', array(
        'methods'             => WP_REST_SERVER::READABLE,           
        'callback'            => 'to_get_coors',
        'permission_callback' => '__return_true',
    ) );

    register_rest_route('shops/v1', 'code/verify', array(
        'methods'             => WP_REST_SERVER::READABLE,           
        'callback'            => 'to_verify_code',
        'permission_callback' => '__return_true',
        'args'                => array([
            CODE_POSTTYPE => [
                'type' => 'string',
                'description' => 'Code to verify',
                'required' => true,
                'sanitize_callback' => 'sanitize_tags'
            ]
        ])
    ));
});
