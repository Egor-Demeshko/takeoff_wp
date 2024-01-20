<?php
    $space = get_field("to_big_image");
    $earth = get_field("to_earth");
    $earth_url = null;
    if($earth){
        $earth_url = wp_get_attachment_url($earth);
    }
?>

<div class="space" id="space">
    <?php 
        if($space){
            ?>
            <img class="space__image" src="<?= $space ?>" />
            <?php
        }?>
    <div>
        <img class="space__earth" src="<?php echo ($earth && $earth_url) ? $earth_url : get_template_directory_uri() .'public/images/earth.png';?>"/>
    </div>
    <img class="space__smoke" src="<?= get_template_directory_uri() . '/public/images/Smoke-PNG-Photos.png'?>">
    <?php get_template_part("templates/spaceship", '')?>
</div>