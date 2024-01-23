<?php
require "assets/php/menu/create_mobile_menu.php";
get_header();

?>
<main class="container">
<?php
    get_template_part("templates/location/dropdown", "");
    get_template_part("templates/location/slides", "");
    get_template_part("templates/location/map", "");
?>
</main>
<?php 
    create_mobile_menu();
    get_template_part('templates/top', '');

    get_footer();