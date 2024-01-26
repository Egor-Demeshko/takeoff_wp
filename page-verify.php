<?php 
    require "assets/php/menu/create_mobile_menu.php";

        get_header();
    ?>


    <div class="verify__background">
        <video src="<?= get_template_directory_uri() . '/public/videos/smoke.mp4'?>" autoplay loop muted></video>
    </div>


    <form class="verify__form">
        <div class="code">
            <input data-filled='false' class="code__input" type="text" name="code" id="code" required aria-required="true">
            <label class="code__label" for="code"><?php _e("Enter Your Code", "to_takeoff") ?></label>
        </div>
        <div class="verify__status-wrapper" aria-live="assertive" aria-atomic="true" id="status">
            <span class="verify__status"> <?php _e("Code check results", "to_takeoff") ?></span>
        </div>
        <input class="verify__submit" type="submit" value="<?php _e("Check It", "to_takeoff") ?>" aria-label="<?php _e("Check It", "to_takeoff") ?>">
        <?php get_template_part('templates/loader', ''); ?>
    </form>


    <?php
        create_mobile_menu();
        get_template_part('templates/top', '');

        get_footer();