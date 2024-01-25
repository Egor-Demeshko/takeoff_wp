<?php

 $shops = $args["shops"];
 
?>

<div class="dropdown">
    <p class="dropdown__label"><?php echo __('Filter by the City: ', 'to_takeoff') ?></p>
    <div class="dropdown__default">
        <span class="dropdown__placeholder"><?php echo __('Choose from the list', 'to_takeoff') ?></span>
        <div class="icon_wrapper">
            <?php  get_template_part('templates/svg/arrow', '', [
                "id" => "dropdown"
            ])?>
        </div>
    </div>

    <div class="dropdown__menu" 
        aria-assertive="true"
        aria-label="<?php echo __("Choose City from the list", "to_takeoff"); ?>">
        <div class="dropdown__item" data-value="All"><?php echo __("All", "to_takeoff"); ?></div>
        <?php 
            foreach ($shops as $shop) {
                $to_name = $shop->custom_fields['to_city'];
                $post_id = $shop->ID;
            ?>
            <div class="dropdown__item" data-value="<?= $to_name ?>" data-id="<?= $post_id ?>"><?php echo $to_name ?></div>
            <?php
        }
        ?>
        
    </div>
</div>
