<?php 
require "assets/php/menu/create_mobile_menu.php";
get_header();
get_template_part("templates/global__loader", "");

get_template_part('templates/top', '');
get_template_part("templates/contact", "form");
create_mobile_menu();

get_footer();
?>