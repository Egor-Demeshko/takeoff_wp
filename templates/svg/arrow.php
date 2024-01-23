<?php 
    //arrow is used in defferent contexts and elements, so we need to pass the element id to decide
    //which class to use
    $element_id = $args["id"] ?? null;
?>
<svg class="<?php echo ($element_id === "dropdown") ? "dropdown__icon": "";?>" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M13 1L7 7L1 1" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>