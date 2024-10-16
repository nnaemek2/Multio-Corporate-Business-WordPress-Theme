<?php
extract(shortcode_atts(array(
    'title'             => '',
    'position'             => '',
    'image'             => '',
    'item_link'             => '',
    'social'             => '',
    'animation'             => '',
    'el_class'             => '',
    'img_size' => '370x330',
), $atts));
$html_id = cmsHtmlID('ct-team-member');
$link = vc_build_link($item_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$img = wpb_getImageBySize( array(
    'attach_id'  => $image,
    'thumb_size' => $img_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$el_social = (array) vc_param_group_parse_atts($social);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-team-member-default <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-team-member-inner">
        <?php if (!empty($image)) : ?>
            <div class="ct-team-image">
                <?php echo wp_kses_post($thumbnail); ?>
                <div class="ct-team-social">
                    <?php foreach ($el_social as $key => $value) {
                        $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                        $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                        <a href="<?php echo esc_url($social_link); ?>"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                    <?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="ct-team-holder">
            <h3 class="ct-team-title">
                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">
                    <?php echo esc_attr( $title ); ?>
                </a>
            </h3>
            <?php if(!empty($position)) : ?>
                <div class="ct-team-position"><?php echo esc_attr( $position ); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>