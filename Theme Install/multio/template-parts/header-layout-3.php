<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = multio_get_opt( 'sticky_on', false );
$topbar_email = multio_get_opt( 'topbar_email' );
$topbar_time = multio_get_opt( 'topbar_time' );
$topbar_phone = multio_get_opt( 'topbar_phone' );
$top_bar_h3 = multio_get_opt( 'top_bar_h3', false );

$h_btn_text = multio_get_opt( 'h_btn_text' );
$h_btn_link_type = multio_get_opt( 'h_btn_link_type', 'page' );
$h_btn_link = multio_get_opt( 'h_btn_link' );
$h_btn_link_custom = multio_get_opt( 'h_btn_link_custom' );
$h_btn_target = multio_get_opt( 'h_btn_target', '_self' );
if($h_btn_link_type == 'page') {
    $h_btn_url = get_permalink($h_btn_link);
} else {
    $h_btn_url = $h_btn_link_custom;
}
?>
<header id="masthead">
    <div id="header-wrap" class="header-layout3 header-trans <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <?php if(!empty($top_bar_h3)) : ?>
            <div id="header-top-bar">
                <div class="container">
                    <div class="row">
                        <?php if ( has_nav_menu( 'top-bar' ) ) : ?>
                            <div class="top-bar-menu-wrap">
                                <?php 
                                    $footer_bottom_menu = array(
                                        'theme_location' => 'top-bar',
                                        'container'  => '',
                                        'menu_id'    => 'top-bar-menu',
                                        'menu_class' => 'top-bar-menu',
                                        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
                                        'depth' => 2
                                    );
                                    wp_nav_menu( $footer_bottom_menu );
                                ?>
                            </div>
                        <?php endif; ?>
                        <div class="header-top-social">
                            <?php multio_header_social_icon(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                                <?php if(!empty($h_btn_text)) : ?>
                                    <a class="btn booking-mobile btn-block" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?><i></i></a>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                    <div class="site-header-button">
                        <?php if(!empty($h_btn_text)) : ?>
                            <a class="btn" href="<?php echo esc_url( $h_btn_url ); ?>" target="<?php echo esc_attr($h_btn_target); ?>"><?php echo esc_attr( $h_btn_text ); ?><i></i></a>
                        <?php endif; ?>
                        <div class="site-header-meta">
                            <?php if(!empty($topbar_time)) { ?>
                                <div class="site-header-time"><?php echo esc_attr($topbar_time); ?></div>
                            <?php } ?>
                            <?php if(!empty($topbar_phone)) { ?>
                                <div class="site-header-phone"><a href="tel:<?php echo esc_attr($topbar_phone); ?>"><?php echo esc_attr($topbar_phone); ?></a></div>
                            <?php } ?>
                            <?php if(!empty($topbar_email)) { ?>
                                <div class="site-header-email"><a href="mailto:<?php echo esc_attr($topbar_email); ?>"><?php echo esc_attr($topbar_email); ?></a></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>