<?php
    $i = 0;
?>

<div class="glide">
    <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
            <?php get_template_part('templates/svg/arrow', '')?>
        </button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
            <?php get_template_part('templates/svg/arrow', '')?>
        </button>
    </div>
    <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">
            <?php
                
                while($i < 5){
                    get_template_part('templates/location/address', 'card');
                    $i++;
                }
            ?>
        </ul>
    </div>
</div>
