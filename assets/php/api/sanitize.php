<?php
function sanitize_tags($param){
    return wp_strip_all_tags($param);
}