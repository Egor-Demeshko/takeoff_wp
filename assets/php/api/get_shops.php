<?php 

/**
 * This function is used to get shops according to the provided query params
 */
function to_get_shops($request){
    $name = $request->get_param(CITY_NAME);
    $args = null;
    if($name === 'All' || $name === null){
        $args = array(
            'post_type'  => 'shops',
        );
    } else {
        $args = array(
            'post_type'  => 'shops',
            'meta_query' => array(
                array(
                    'key'     => CITY_NAME,
                    'value'   => $name,
                    'compare' => '=',
                ),
            ),
        );
    }
    $query = new WP_Query($args);
    $shops = prepareCityData($query);

    wp_reset_postdata();
    return $shops;
}


function prepareCityData($query){
    $shops = [];


    if($query->have_posts()){
        while($query->have_posts()){
            $shop = [];
            $query->the_post();
            $id = get_the_ID();
            /**get custom fields by id */
            $custom_fields = get_fields($id);

            /**sanitize links in custom fields */
            $custom_fields['to_google_maps_link'] = esc_url($custom_fields['to_google_maps_link']);
            /**get images urls */
            $logo_url = wp_get_attachment_url($custom_fields['to_logo_picture']);
            $background_url = wp_get_attachment_url($custom_fields['background_picture']);
            $custom_fields['to_logo_picture'] = $logo_url ? $logo_url : get_theme_file_uri('/public/logos/Take-off_v1-1-1.png');
            $custom_fields['background_picture'] = $background_url ? $background_url : get_theme_file_uri('/public/images/shop_card_default.jpg');

            $shop['shop_id'] = $id;
            $shop['data'] = $custom_fields;
            $shops[] = $shop;
        }
    }

    return $shops;
}