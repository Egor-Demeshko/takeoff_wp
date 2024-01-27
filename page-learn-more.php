<?php 
    require "assets/php/menu/create_mobile_menu.php";

    get_header();
    get_template_part("templates/global__loader", "");
?>


<video controls autoplay muted class="learn-more__video">
    <source src="<?php echo get_template_directory_uri() . '/public/videos/learn_more.mp4' ?> " type="video/mp4">
    Your browser does not support the video tag.
</video>
<?php
    create_mobile_menu();
    get_template_part('templates/top', '');
    get_footer();
?>