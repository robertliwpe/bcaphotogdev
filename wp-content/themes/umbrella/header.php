<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class( 'nk-body' ); ?>>
<?php

// show in Umbrella style
$show_style = nk_get_metabox( 'page_show_style' );
if ( ! isset( $show_style ) || $show_style === 'umbrella' ) {
    ?>
    <!-- START: Fixed Layout -->
    <div class="nk-layout">
        <?php get_template_part( 'template-parts/layout-slider' ); ?>

        <?php get_template_part( 'template-parts/layout-navigations' ); ?>

        <?php get_template_part( 'template-parts/layout-titles' ); ?>
    </div>
    <!-- END: Fixed Layout -->

    <?php get_template_part( 'template-parts/main-navigation' ); ?>
<?php } ?>
