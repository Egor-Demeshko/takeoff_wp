<?php

$shop = $args["shop"];

$fields = $shop->custom_fields;
$background_id = $fields["background_picture"];
$background_url = wp_get_attachment_image_url($background_id, "medium");

$logo_id = $fields["to_logo_picture"];
$logo_url = wp_get_attachment_image_url($logo_id, "medium");

$clearedPhone = str_replace(['-', ' ', '(', ')'], '', $fields["to_phone_number"]);

?>
<div class="address_card" role="region" aria-label="<?php _e('Shop card', '');?>">
    <div class="address_card__top" style="background-image: url('<?php echo ($background_url) ? 
            $background_url : get_template_directory_uri() . '/public/images/shop_card_default.jpg'?>');" 
            role="presentation" 
            aria-label="<?php _e('Shop card background', 'to_takeoff'); ?>">
    </div>
    <div class="address_card__bottom">
        <div class="address_card__logo" role="presentation" 
        aria-label="<?php _e('Shop logo', 'to_takeoff'); ?>" 
        title="<?php _e('Shop logo', 'to_takeoff'); ?>">
            <img aria-hidden="true" src="<?php echo ($logo_url) ? 
                $logo_url : get_template_directory_uri() . '/public/logos/Take-off_v1-1-1.png'?> "/>
        </div>
        <div class="address_card__info">

            <a class="address_card__info--accent" href="tel:<?= $clearedPhone ?>" role="link" aria-label="<?php _e('Phone number', 'to_takeoff'); ?>"><?php echo $fields["to_phone_number"]?></a>

            <a class="address_card__info--black" 
            target="_blank" 
            href="<?php echo $fields["to_google_maps_link"];?>" 
            role="link" 
            aria-label="<?php _e('Google maps link', 'to_takeoff'); ?>" 
            title="<?php _e('Google maps link', 'to_takeoff'); ?>">
                101 Stanton St, New York, NY 10002
            </a>
        </div>
    </div>
</div>
