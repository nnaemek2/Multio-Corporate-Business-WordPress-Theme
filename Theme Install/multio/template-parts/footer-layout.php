<?php
$footer_fixed = multio_get_opt('footer_fixed');
$footer_copyright = multio_get_opt('footer_copyright');
$social_label = multio_get_opt('social_label');
$back_totop_on = multio_get_opt('back_totop_on', true);
$footer_bg_image_on = multio_get_page_opt('footer_bg_image_on'); ?>

<footer id="colophon" class="site-footer footer-layout1 <?php if($footer_fixed) { echo 'ct-footer-fixed'; } ?>">
    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) || is_active_sidebar( 'sidebar-footer-2' ) || is_active_sidebar( 'sidebar-footer-3' ) || is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
        <div class="top-footer <?php echo esc_attr($footer_bg_image_on); ?>">
            <div class="container">
                <div class="row">
                    <?php multio_footer_top(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="bottom-copyright">
                    <?php if ($footer_copyright) {
                        echo wp_kses_post($footer_copyright);
                    } else {
                        echo wp_kses_post(''.esc_attr(date("Y")).' &copy; All rights reserved by <a target="_blank" href="https://themeforest.net/user/case-themes/portfolio">CaseThemes</a>');
                    } ?>
                </div>
                <div class="bottom-social">
                    <?php if(!empty($social_label)) : ?>
                        <label><?php echo esc_attr($social_label); ?></label>
                    <?php endif; ?>
                    <?php multio_social_icon(); ?>
                </div>
            </div>
        </div>
    </div>
</footer>