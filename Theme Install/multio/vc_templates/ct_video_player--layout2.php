<?php
extract(shortcode_atts(array(
    'video_link' => '',
    'video_intro' => '',
    'btn_styles' => 'style1',
    'intro_styles' => 'style1',
    'intro_size' => 'full',
    'video_bg' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$img = wpb_getImageBySize( array(
    'attach_id'  => $video_intro,
    'thumb_size' => $intro_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];

$img_bg = wpb_getImageBySize( array(
    'attach_id'  => $video_bg,
    'thumb_size' => 'full',
    'class'      => '',
));
$thumbnail_bg = $img_bg['thumbnail'];


$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-layout2 <?php echo esc_attr( $el_class ); ?>">
    <div class="ct-video-inner">
        <?php if (!empty($video_bg)) : ?>
            <div class="ct-video-bg">
                <?php echo wp_kses_post($thumbnail_bg); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($video_intro)) : ?>
            <div class="ct-video-intro <?php echo esc_attr($animation_classes); ?>">
                <?php echo wp_kses_post($thumbnail); ?>
                <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
                    <i class="fac fac-play"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>