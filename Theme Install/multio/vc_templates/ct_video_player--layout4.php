<?php
extract(shortcode_atts(array(
    'video_link' => '',
    'l4_intro1' => '',
    'l4_intro2' => '',
    'l4_box_icon' => '',
    'l4_box_text' => '',
    'animation' => '',
    'el_class' => '',
), $atts));
$html_id = cmsHtmlID('ct-video');
$img_1 = wpb_getImageBySize( array(
    'attach_id'  => $l4_intro1,
    'thumb_size' => 'full',
    'class'      => '',
));
$thumbnail_1 = $img_1['thumbnail'];

$img_2 = wpb_getImageBySize( array(
    'attach_id'  => $l4_intro2,
    'thumb_size' => 'full',
    'class'      => '',
));
$thumbnail_2 = $img_2['thumbnail'];

$icon = wpb_getImageBySize( array(
    'attach_id'  => $l4_box_icon,
    'thumb_size' => 'full',
    'class'      => '',
));
$icon = $icon['thumbnail'];

$link = vc_build_link($video_link);
$a_href = 'https://www.youtube.com/watch?v=SF4aHwxHtZ0';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp ); ?>

<div id="<?php echo esc_attr($html_id);?>" class="ct-video-layout4 <?php echo esc_attr( $el_class ); ?>">
    <div class="ct-video-inner">
        <?php if (!empty($img_1)) : ?>
            <div class="ct-intro-1">
                <?php echo wp_kses_post($thumbnail_1); ?>
                <?php if(!empty($l4_box_text)) : ?>
                    <div class="ct-intro-meta">
                        <div class="ct-intro-holder">
                            <?php echo wp_kses_post($icon); ?>
                            <div class="ct-intro-title"><?php echo wp_kses_post($l4_box_text); ?></div>
                        </div>
                    </div>
                <?php endif; ?>    
            </div>
        <?php endif; ?>
        <?php if (!empty($img_2)) : ?>
            <div class="ct-intro-2 <?php echo esc_attr($animation_classes); ?>">
                <?php echo wp_kses_post($thumbnail_2); ?>
                <a class="ct-video-button style2" href="<?php echo esc_url($a_href);?>">
                    <i class="fac fac-play"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>