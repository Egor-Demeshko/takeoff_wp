<?php
function to_verify_code($request) {
    $code = $request->get_param(CODE_POSTTYPE);

    if (empty($code)) {
        return new WP_REST_Response(['status' => false, 'message' => __("No code provided", "to_takeoff")], 400);
    }

    $result = verify_code($code);

    if ($result === true) {
        return new WP_REST_Response([
            'status' => $result,
            'message' => __("Original product", "to_takeoff")
    ], 200);
    } else {
        return new WP_REST_Response([
            'status' => $result,
            'message' => __("Code is not valid", "to_takeoff")
        ], 200);
    }
}

function verify_code($code){
    $args = array(
    'post_type' => CODE_POSTTYPE,
    'published' => true,
    'meta_query' => array(
        array(
            'key'     => 'to_code',
            'value'   => $code,
            'compare' => '='
        )
    )
);
    //get all posts with type CODES_POSTTYPE
    $query = new WP_Query($args);

    $count = 0;
    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            $count += 1;
        }
    }
    
    wp_reset_postdata();

    if( $count > 0 ) {
        return true;
    }; 

    return false;
}