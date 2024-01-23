

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        @font-face {
            font-family: 'Lato';
            src: url('<?php echo get_template_directory_uri() . '/assets/fonts/Lato.ttf'?>') format('truetype');
            font-display: swap;
            font-weight: normal; 
        }

        @font-face {
            font-family: 'Lato';
            src: url('<?php echo get_template_directory_uri() . '/assets/fonts/Lato-Bold.ttf'?>') format('truetype');
            font-display: swap;
            font-weight: bold;
        }

        @font-face {
            font-family: 'Poppins';
            src: url('<?php echo get_template_directory_uri() . '/assets/fonts/Poppins-Regular.ttf'?>') format('truetype');
            font-display: swap;
            font-weight: normal;
        }
        @font-face {
            font-family: 'Poppins';
            src: url('<?php echo get_template_directory_uri() . '/assets/fonts/Poppins-Medium.ttf'?>') format('truetype');
            font-display: swap;
            font-weight: medium;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php

