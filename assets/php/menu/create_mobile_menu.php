<?php
function create_mobile_menu() {
    wp_nav_menu([
        'theme_location'  => 'mobile_menu',
        'container'       => 'div',
        'container_class' => 'mobile-menu_wrapper',
        'container_id'    => '',
        'menu_class'      => 'mobile_menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => false,
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
    ]);
}