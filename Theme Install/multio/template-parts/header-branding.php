<?php
/**
 * Template part for displaying site branding
 */

$logo = multio_get_opt( 'logo', array( 'url' => '', 'id' => '' ) );
$logo_url = $logo['url'];

$custom_header = multio_get_page_opt( 'custom_header', false );
$logo_page = multio_get_page_opt( 'logo' );
if($custom_header && !empty($logo_page['url'])) {
    $logo_url = $logo_page['url'];
}

$logo_light = multio_get_opt( 'logo_light', array( 'url' => '', 'id' => '' ) );
$logo_light_url = $logo_light['url'];

$logo_sticky = multio_get_opt( 'logo_sticky', array( 'url' => '', 'id' => '' ) );
$logo_sticky_url = $logo_sticky['url'];

$logo_mobile = multio_get_opt( 'logo_mobile', array( 'url' => '', 'id' => '' ) );
$logo_mobile_url = $logo_mobile['url'];


if (class_exists('ReduxFramework')) {
    if ($logo_url)
    {
        printf(
            '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_url )
        );
    }
    if($logo_light_url) {
        printf(
            '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_light_url )
        );
    }
    if($logo_sticky_url) {
        printf(
            '<a class="logo-sticky" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_sticky_url )
        );
    }
    if($logo_mobile_url) {
        printf(
            '<a class="logo-mobile" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="%2$s"/></a>',
            esc_url( home_url( '/' ) ),
            esc_attr( get_bloginfo( 'name' ) ),
            esc_url( $logo_mobile_url )
        );
    }
} else {
    printf(
        '<a class="logo-dark" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'multio').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo-dark.png' )
    );
    printf(
        '<a class="logo-light" href="%1$s" title="%2$s" rel="home"><img src="%3$s" alt="'.esc_attr__('Logo', 'multio').'"/></a>',
        esc_url( home_url( '/' ) ),
        esc_attr( get_bloginfo( 'name' ) ),
        esc_url( get_template_directory_uri().'/assets/images/logo-light.png' )
    );
}