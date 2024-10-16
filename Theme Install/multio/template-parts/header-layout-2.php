<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = multio_get_opt( 'sticky_on', false );
$search_on = multio_get_opt( 'search_on', false );
$cart_on = multio_get_opt( 'cart_on', false );
$lang_on = multio_get_opt( 'lang_on', false );
?>
<header id="masthead">
    <div id="header-wrap" class="header-layout2 <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>">
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
                                <?php multio_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                            <div class="site-menu-right">
                                <?php if($search_on) : ?>
                                    <span class="menu-right-item h-btn-search"><i class="far fac-search"></i></span>
                                <?php endif; ?>
                            </div>
                        </nav>
                    </div>
                    <div class="header-right">
                        <div class="header-right-item menu-right-cart">
                            <?php if(class_exists('Woocommerce') && $cart_on) : ?>
                                <span class="h-btn-cart">
                                    <i class="far fac-shopping-cart"></i>
                                    <span class="cart-counter"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'multio' ), WC()->cart->cart_contents_count ); ?></span>
                                </span>
                                <div class="widget_shopping_cart">
                                    <div class="widget_shopping_title">
                                        <?php echo esc_html__( 'Shopping Cart', 'multio' ); ?> <span class="cart-counter-items">(<?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'multio' ), WC()->cart->cart_contents_count ); ?>)</span>
                                    </div>
                                    <div class="widget_shopping_cart_content">
                                        <?php woocommerce_mini_cart(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(class_exists('SitePress')) { ?>
                            <?php if($lang_on) { ?>
                                <div class="header-right-item">
                                    <?php do_action('wpml_add_language_selector'); ?>
                                </div>
                            <?php } ?>
                        <?php } else { 
                            wp_enqueue_style('wpml-style', get_template_directory_uri() . '/assets/css/style-lang.css', array(), '1.0.0');
                            if($lang_on) { ?>
                                <div class="header-right-item header-right-lang">
                                    <div class="wpml-ls-statics-shortcode_actions wpml-ls wpml-ls-legacy-dropdown js-wpml-ls-legacy-dropdown">
                                        <ul>
                                            <li tabindex="0" class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-first-item wpml-ls-item-legacy-dropdown">
                                                <a href="#" class="js-wpml-ls-item-toggle wpml-ls-item-toggle"><img class="wpml-ls-flag" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/flag/en.png'); ?>" alt="en" title="English"><span class="wpml-ls-native">EN</span></a>
                                                <ul class="wpml-ls-sub-menu">
                                                    <li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-fr">
                                                        <a href="#" class="wpml-ls-link"><img class="wpml-ls-flag" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/flag/fr.png'); ?>" alt="fr" title="Français"><span class="wpml-ls-native">FR</span></a>
                                                    </li>
                                                    <li class="wpml-ls-slot-shortcode_actions wpml-ls-item wpml-ls-item-de wpml-ls-last-item">
                                                        <a href="#" class="wpml-ls-link"><img class="wpml-ls-flag" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/flag/ue.png'); ?>" alt="ue" title="UE"><span class="wpml-ls-native">UE</span></a>
                                                    </li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }
                        } ?>
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