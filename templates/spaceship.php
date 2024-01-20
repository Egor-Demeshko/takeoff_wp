<div class="spaceship">
    <img class="spaceship__image" src="<?php echo get_template_directory_uri() . '/public/images/cabin.png'; ?>" 
        alt="<?php __("spaceship cabin", "to_takeoff")?>" role="presentation" />
    <a class="spaceship__link" href="/learn_more" 
        aria-label="<?php __("Learn more", "to_takeoff")?>">
        <img class="learn_more" src="<?php echo get_template_directory_uri() . '/public/media/Learn_more.gif'; ?>" 
        alt="learn more text" role="presentation"/>
    </a>
    <a class="spaceship__link" href="/location_near">
        <img class="spaceship__location" src="<?php echo get_template_directory_uri() . '/public/media/Location_near_me.gif'; ?>" 
        alt="location text" role="presentation"/>
    </a>
    <a class="spaceship__link" href="/verify_product">
        <img class="spaceship__verify" src="<?php echo get_template_directory_uri() . '/public/media/Verify_Product.gif'; ?>" 
        alt="Verify link" role="presentation"/>
    </a>
    <a class="spaceship__link" href="/verify_product">
        <img class="spaceship__wholesale" src="<?php echo get_template_directory_uri() . '/public/media/wholesale_inqueries.gif'; ?>" 
        alt="Wholesale link" role="presentation"/>
    </a>
</div>