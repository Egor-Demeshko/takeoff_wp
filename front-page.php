<?php
require "assets/php/menu/create_mobile_menu.php";
// header.php
get_header(); ?>
<style>
    body {
        overflow: hidden;
    }
</style>
<?php
get_template_part("templates/global__loader", "");
// content.php
get_template_part("templates/space", "");
get_template_part("templates/video", "");
get_template_part('templates/top', '');
create_mobile_menu();


// footer.php
get_footer();
