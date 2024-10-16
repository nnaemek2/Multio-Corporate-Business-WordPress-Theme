<?php
/**
 * Template part for displaying default header layout
 */
$sticky_on = multio_get_opt( 'sticky_on', false );
$topbar_email_label = multio_get_opt( 'topbar_email_label' );
$topbar_email = multio_get_opt( 'topbar_email' );
$topbar_time = multio_get_opt( 'topbar_time' );
$topbar_phone_label = multio_get_opt( 'topbar_phone_label' );
$topbar_phone = multio_get_opt( 'topbar_phone' );
$topbar_address_label = multio_get_opt( 'topbar_address_label' );
$topbar_address = multio_get_opt( 'topbar_address' );

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
$search_on = multio_get_opt( 'search_on', false );
$cart_on = multio_get_opt( 'cart_on', false );
$hidden_sidebar_on = multio_get_opt( 'hidden_sidebar_on', false );
?>
<header id="masthead">
    <div id="header-wrap" class="header-layout5 fixed-height <?php if($sticky_on == 1) { echo 'is-sticky'; } else { echo 'no-sticky'; } ?>" h-data-offset="64">
        <div id="header-top-bar">
            <div class="container">
                <div class="row">
                    <div class="header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="top-bar-info">
                        <div class="top-bar-info-inner">
                            <?php if(!empty($topbar_email) || !empty($topbar_email_label)) { ?>
                                <div class="top-bar-info-item">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 483.3 483.3" style="enable-background:new 0 0 483.3 483.3;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M424.3,57.75H59.1c-32.6,0-59.1,26.5-59.1,59.1v249.6c0,32.6,26.5,59.1,59.1,59.1h365.1c32.6,0,59.1-26.5,59.1-59.1
                                                    v-249.5C483.4,84.35,456.9,57.75,424.3,57.75z M456.4,366.45c0,17.7-14.4,32.1-32.1,32.1H59.1c-17.7,0-32.1-14.4-32.1-32.1v-249.5
                                                    c0-17.7,14.4-32.1,32.1-32.1h365.1c17.7,0,32.1,14.4,32.1,32.1v249.5H456.4z"/>
                                                <path d="M304.8,238.55l118.2-106c5.5-5,6-13.5,1-19.1c-5-5.5-13.5-6-19.1-1l-163,146.3l-31.8-28.4c-0.1-0.1-0.2-0.2-0.2-0.3
                                                    c-0.7-0.7-1.4-1.3-2.2-1.9L78.3,112.35c-5.6-5-14.1-4.5-19.1,1.1c-5,5.6-4.5,14.1,1.1,19.1l119.6,106.9L60.8,350.95
                                                    c-5.4,5.1-5.7,13.6-0.6,19.1c2.7,2.8,6.3,4.3,9.9,4.3c3.3,0,6.6-1.2,9.2-3.6l120.9-113.1l32.8,29.3c2.6,2.3,5.8,3.4,9,3.4
                                                    c3.2,0,6.5-1.2,9-3.5l33.7-30.2l120.2,114.2c2.6,2.5,6,3.7,9.3,3.7c3.6,0,7.1-1.4,9.8-4.2c5.1-5.4,4.9-14-0.5-19.1L304.8,238.55z"
                                                    />
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="top-bar-info-meta">
                                        <label><?php echo esc_attr($topbar_email_label); ?></label>
                                        <a href="mailto:<?php echo esc_attr($topbar_email); ?>"><?php echo esc_attr($topbar_email); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(!empty($topbar_address) || !empty($topbar_address_label)) { ?>
                                <div class="top-bar-info-item">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M256,0C156.748,0,76,80.748,76,180c0,33.534,9.289,66.26,26.869,94.652l142.885,230.257
                                                    c2.737,4.411,7.559,7.091,12.745,7.091c0.04,0,0.079,0,0.119,0c5.231-0.041,10.063-2.804,12.75-7.292L410.611,272.22
                                                    C427.221,244.428,436,212.539,436,180C436,80.748,355.252,0,256,0z M384.866,256.818L258.272,468.186l-129.905-209.34
                                                    C113.734,235.214,105.8,207.95,105.8,180c0-82.71,67.49-150.2,150.2-150.2S406.1,97.29,406.1,180
                                                    C406.1,207.121,398.689,233.688,384.866,256.818z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M256,90c-49.626,0-90,40.374-90,90c0,49.309,39.717,90,90,90c50.903,0,90-41.233,90-90C346,130.374,305.626,90,256,90z
                                                     M256,240.2c-33.257,0-60.2-27.033-60.2-60.2c0-33.084,27.116-60.2,60.2-60.2s60.1,27.116,60.1,60.2
                                                    C316.1,212.683,289.784,240.2,256,240.2z"/>
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="top-bar-info-meta">
                                        <label><?php echo esc_attr($topbar_address_label); ?></label>
                                        <span><?php echo esc_attr($topbar_address); ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(!empty($topbar_phone) || !empty($topbar_phone_label)) { ?>
                                <div class="top-bar-info-item">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.806 473.806" style="enable-background:new 0 0 473.806 473.806;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4
                                                    c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8
                                                    c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6
                                                    c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5
                                                    c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26
                                                    c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9
                                                    c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806
                                                    C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20
                                                    c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6
                                                    c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1
                                                    c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3
                                                    c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5
                                                    c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8
                                                    c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9
                                                    l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1
                                                    C420.456,377.706,420.456,388.206,410.256,398.806z"/>
                                                <path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2
                                                    c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11
                                                    S248.656,111.506,256.056,112.706z"/>
                                                <path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11
                                                    c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2
                                                    c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"/>
                                            </g>
                                        </g>
                                    </svg>
                                    <div class="top-bar-info-meta">
                                        <label><?php echo esc_attr($topbar_phone_label); ?></label>
                                        <a href="tel:<?php echo esc_attr($topbar_phone); ?>"><?php echo esc_attr($topbar_phone); ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            </div>
                        </nav>
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
                            <?php if($hidden_sidebar_on) : ?>
                                <span class="menu-right-item h-btn-sidebar"><i class="far fac-bars"></i></span>
                            <?php endif; ?>
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