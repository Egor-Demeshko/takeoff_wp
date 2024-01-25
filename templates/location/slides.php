<?php
    $shops = $args["shops"];
?>

<div class="glide">
    <div class="glide__arrows" data-glide-el="controls" aria-label="<?php _e('Slider navigation buttons', 'to_takeoff') ?>">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<" 
        aria-label="<?php _e('Previous slide', 'to_takeoff') ?>" 
        title="<?php _e('Previous slide', 'to_takeoff') ?>" >
            <?php get_template_part('templates/svg/arrow', '')?>
        </button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"
        aria-label="<?php _e('Next slide', 'to_takeoff') ?>"
        title="<?php _e('Next slide', 'to_takeoff') ?>">
            <?php get_template_part('templates/svg/arrow', '')?>
        </button>
    </div>
    <div class="glide__track" data-glide-el="track" role="region" aria-label="<?php _e('Slider slides', 'to_takeoff') ?>">
        <ul class="glide__slides few_elements">
            <?php
                
                foreach ($shops as $shop) {
                    get_template_part('templates/location/address', 'card', ["shop" => $shop]);                    
                }
                    
            ?>
        </ul>
    </div>
</div>
