<?php

/**
 * Retrieves coordinates from the 'shops' post type.
 * @return array The array of coordinates.
 */
function to_get_coors() {
    $args = array(
        'post_type' => 'shops',
        'meta_key' => 'to_coordinates',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);
    $coors = array();

    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $coors[] = get_post_meta(get_the_ID(), 'to_coordinates', true);
        }
    }

    wp_reset_postdata();

    return $coors;
}
