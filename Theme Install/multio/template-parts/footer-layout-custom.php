<?php
$back_totop_on = multio_get_opt('back_totop_on', true);
$footer_layout_custom = multio_get_opt('footer_layout_custom');
$custom_footer = multio_get_page_opt('custom_footer', 'false');
$footer_layout_page = multio_get_page_opt('footer_layout');
$footer_layout_custom_page = multio_get_page_opt('footer_layout_custom');
if($custom_footer && $footer_layout_page == 'custom' && !empty($footer_layout_custom_page) ) {
    $footer_layout_custom = $footer_layout_custom_page;
}
?>
<footer id="colophon" class="site-footer-custom">
    <?php if(!empty($footer_layout_custom)) :  ?>
        <div class="footer-custom-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php multio_content_by_slug($footer_layout_custom, 'footer'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>