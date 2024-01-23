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

    <div class="dropdown__menu">
        <div class="dropdown__item" data-value="All">All</div>
        <div class="dropdown__item" data-value="Item 1">Item 1</div>
        <div class="dropdown__item" data-value="Item 2">Item 2</div>
        <div class="dropdown__item" data-value="Item 3">Item 3</div>
    </div>
</div>
