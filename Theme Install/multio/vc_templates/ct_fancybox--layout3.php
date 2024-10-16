<?php
extract(shortcode_atts(array(
    'title' => '',
    'title_color' => '',
    'title_number' => '',

    'description' => '',
    'description_color' => '',

    'icon_type' => 'icon',
    'icon_list' => 'fontawesome',
    'icon_fontawesome' => '',
    'icon_fontawesome5' => '',
    'icon_material_design' => '',
    'icon_flaticon' => '',
    'icon_etline' => '',
    'icon_image' => '',
    'icon_image_hover' => '',
    'icon_weight' => '',

    'link_item' => '',

    'animation' => '',
    'el_class' => '',
), $atts));
$link = vc_build_link($link_item);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}
$icon_image_url = '';
if (!empty($icon_image)) {
    $attachment_image = wp_get_attachment_image_src($icon_image, 'full');
    $icon_image_url = $attachment_image[0];
}
$icon_image_url_hover = '';
if (!empty($icon_image_hover)) {
    $attachment_image_hover = wp_get_attachment_image_src($icon_image_hover, 'full');
    $icon_image_url_hover = $attachment_image_hover[0];
}
$icon_name = "icon_" . $icon_list;
$icon_class = isset(${$icon_name}) ? ${$icon_name} : '';
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<div class="ct-fancybox-layout3 <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
	<div class="ct-fancybox-inner">
		<?php if(!empty($icon_image_url) && $icon_type == 'image' ) { ?>
            <div class="ct-fancybox-icon">
                <img class="icon-main" src="<?php echo esc_url( $icon_image_url ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                <?php if(!empty($icon_image_url_hover)) : ?>
                    <img class="icon-hover" src="<?php echo esc_url( $icon_image_url_hover ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
                <?php endif; ?>
            </div>
        <?php } else { ?>
            <?php if($icon_class):?>
                <div class="ct-fancybox-icon">
                    <i class="<?php echo esc_attr($icon_class); ?> <?php if($icon_list == 'fontawesome5' && !empty($icon_weight)) { echo esc_attr($icon_weight); } ?>"></i>
                </div>
            <?php endif;?>
        <?php } ?>
        <?php if(!empty($title_number) || !empty($title) ) { ?>
            <div class="ct-fancybox-meta">
                <?php if(!empty($title_number)) : ?>
                    <div class="ct-fancybox-number">
                        <?php echo esc_attr($title_number); ?>
                    </div>
                <?php endif;?>
                <?php if(!empty($title)) : ?>
                    <h3 class="ct-fancybox-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                        <?php echo wp_kses_post( $title ); ?>
                    </h3>
                <?php endif;?>
            </div>
        <?php } ?>
        <?php if(!empty($description)) : ?>
            <div class="ct-fancybox-content" style="<?php if(!empty($description_color)) { echo 'color:'.esc_attr($description_color).';'; } ?>">
                <?php echo wp_kses_post( $description ); ?>
            </div>
        <?php endif;?>
	</div>
</div>