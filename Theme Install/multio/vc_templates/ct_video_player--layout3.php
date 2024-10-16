<?php
extract(shortcode_atts(array(
    'video_link' => '',
    'video_text' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-layout3 <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
    <div class="ct-video-inner">
        <a class="ct-video-button" href="<?php echo esc_url($a_href);?>">
            <i class="fal fac-play-circle"></i>
            <span><?php echo esc_attr($video_text); ?></span>
        </a>
    </div>
</div>