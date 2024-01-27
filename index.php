<?php
// Display the header
get_header();
require "assets/php/menu/create_mobile_menu.php";

get_template_part("templates/global__loader", "");

get_template_part("templates/space", "");
get_template_part("templates/video", "");
get_template_part('templates/top', '');
create_mobile_menu();

// Display the footer
get_footer();
?>
