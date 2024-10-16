<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = multio_get_opt( 'sticky_on', false );
$search_on = multio_get_opt( 'search_on', false );
$cart_on = multio_get_opt( 'cart_on', false );
$main_menu_divider = multio_get_opt( 'main_menu_divider', 'divider-style1' );
?>
<header id="masthead">
    <div id="header-wrap" class="header-layout1 header-trans <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
        <div id="header-main" class="header-main">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="header-navigation">
                        <nav class="main-navigation <?php echo esc_attr($main_menu_divider); ?>">
                            <div class="main-navigation-inner">
                                <div class="menu-mobile-close"><i class="zmdi zmdi-close"></i></div>
                                <?php multio_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                    </div>
                    <div class="site-menu-right">
                        <?php if($search_on) : ?>
                            <span class="menu-right-item h-btn-search"><i class="far fac-search"></i></span>
                        <?php endif; ?>
                        <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                            <div class="menu-right-item menu-right-cart">
                                <span class="h-btn-cart">
                                    <i class="far fac-shopping-cart"></i>
                                    <span class="cart-counter"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'multio' ), WC()->cart->cart_contents_count ); ?></span>
                                </span>
                                <div class="widget_shopping_cart">
                                    <div class="widget_shopping_title">
                                        <?php echo esc_html__( 'Shopping Cart', 'multio' ); ?> <span class="cart-counter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'multio' ), WC()->cart->cart_contents_count ); ?>)</span>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                        <?php woocommerce_mini_cart(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="menu-mobile-overlay"></div>
                </div>
            </div>
            <div id="main-menu-mobile">
                <?php if (class_exists('Woocommerce') && $cart_on) : ?>
                    <div class="mobile-menu-cart">
                        <span class="h-btn-cart"><i class="far fac-shopping-cart"></i></span>
                        <div class="widget_shopping_cart">
                            <div class="widget_shopping_title">
                                <?php echo esc_html__( 'Shopping Cart', 'multio' ); ?> <span class="cart-couter-items">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'multio' ), WC()->cart->cart_contents_count ); ?>)</span>
                            </div>
                            <div class="widget_shopping_cart_content">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <span class="btn-nav-mobile open-menu">
                    <span></span>
                </span>
            </div>
        </div>
    </div>
</header>