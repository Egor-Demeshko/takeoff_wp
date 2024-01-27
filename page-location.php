<?php
require "assets/php/menu/create_mobile_menu.php";


$shops = get_posts([
    'post_type' => 'shops',
    'numberposts' => -1
]);

foreach ($shops as $shop) {
    $shop->custom_fields = get_fields($shop->ID);
}

wp_reset_postdata();

get_header();

get_template_part("templates/global__loader", "");
?>

<script>
    document.body.style.height = "100vh";

    window.addEventListener('load', function() {
        const themePath = window.to_themePath;
        if(themePath) {
            import(themePath + "/dist/map.js");
        }
    });
</script>
<main class="container vh100">
<?php
    get_template_part("templates/location/dropdown", "", array("shops" => $shops));
    get_template_part("templates/location/slides", "", array("shops" => $shops));
    get_template_part("templates/location/map", "");
?>
</main>
<?php 
    create_mobile_menu();
    get_template_part('templates/top', '');

    get_footer();