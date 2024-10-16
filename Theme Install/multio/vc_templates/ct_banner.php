<?php
extract(shortcode_atts(array(
    'banner_img1' => '',
    'banner_img2' => '',
    'animation' => '',
    'el_class' => '',
), $atts));

$banner_img1_url = '';
if (!empty($banner_img1)) {
    $attachment_image1 = wp_get_attachment_image_src($banner_img1, 'full');
    $banner_img1_url = $attachment_image1[0];
}
$banner_img2_url = '';
if (!empty($banner_img2)) {
    $attachment_image2 = wp_get_attachment_image_src($banner_img2, 'full');
    $banner_img2_url = $attachment_image2[0];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>
<div class="ct-banner-default <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
	<div class="ct-banner-inner">
		<?php if( !empty($banner_img1_url) ) { ?>
            <div class="ct-banner-img1">
                <img src="<?php echo esc_url( $banner_img1_url ); ?>" />
            </div>
        <?php } ?>
        <?php if( !empty($banner_img2_url) ) { ?>
            <div class="ct-banner-img2 bg-image" style="background-image: url(<?php echo esc_url( $banner_img2_url ); ?>);"></div>
        <?php } ?>
	</div>
</div>