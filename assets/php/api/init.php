<?php

require get_theme_file_path("/assets/php/api/get_shops.php");
require get_theme_file_path("/assets/php/api/sanitize.php");
/**
 * function initialize all API endpoints
 */

add_action( 'init', 'register_custom_post_type' );


add_action( 'rest_api_init', function () {
    register_rest_route( 'shops/v1', 'shop', array(
        'methods'             => WP_REST_SERVER::READABLE,            // метод запроса: GET, POST ...
        'callback'            => 'to_get_shops',
        'args'                => array([
            CITY_NAME => [
                'default' => 'All',
                'type' => 'string',
                'description' => 'Name of the city to get shops',
                'required' => true,
                'sanitize_callback' => 'sanitize_tags'
            ]
        ]),
    ) );

    register_rest_route( 'shops/v1', 'shop', array(
        'methods'             => WP_REST_SERVER::READABLE,            // метод запроса: GET, POST ...
        'callback'            => 'to_get_shops',
    ) );
} );
