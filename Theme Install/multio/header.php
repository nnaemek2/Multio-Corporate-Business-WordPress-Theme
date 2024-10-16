<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Multio
 */
$footer_fixed = multio_get_opt('footer_fixed');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site <?php if($footer_fixed) { echo 'page-footer-fixed'; } ?>">
        <?php 
        	multio_page_loading();
            
            multio_header_layout();
            
            multio_page_title_layout();
        ?>
        <div id="content" class="site-content">
        	<div class="content-inner">
