<?php
extract(shortcode_atts(array(
    'title' => '',
    'price' => '',
    'pricing_time' => '',
    'description' => '',
    'feature_lists' => '',
    'text_button' => '',
    'link_button' => '',
    'el_class' => '',
    'animation' => '',
    'recommended' => '',
), $atts));
$link = vc_build_link($link_button);
$a_href = '';
$a_target = '_self';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
} 
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$feature_lists = (array) vc_param_group_parse_atts($feature_lists);
?>

<div class="ct-pricing-wrapper <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-pricing-inner">
        <div class="ct-pricing-header">
            <?php if(!empty($recommended)) : ?>
                <div class="ct-pricing-recommended"><?php echo esc_attr($recommended); ?></div>
            <?php endif;?>
            <div class="ct-pricing-holder">
                <?php if(!empty($title)) : ?>
                    <h3 class="ct-pricing-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>"><?php echo esc_attr($title);?></h3> 
                <?php endif;?>
                <div class="ct-pricing-desc">
                    <?php echo esc_attr($description); ?>
                </div>
            </div>
            <div class="ct-pricing-meta">
                <span class="ct-pricing-price">
                    <?php echo esc_attr($price);?>  
                </span>
                <span class="ct-pricing-time" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                    <?php echo esc_attr('/ '.$pricing_time);?>  
                </span>
            </div>
        </div>
        <div class="ct-pricing-body">
            <?php if(!empty($feature_lists)) : ?>
                <ul class="ct-pricing-content">
                    <?php foreach ($feature_lists as $key => $value) { 
                        $feature_item = isset($value['feature_item']) ? $value['feature_item'] : '';
                        $active = isset($value['active']) ? $value['active'] : 'no-active';
                        ?>
                        <li class="<?php echo esc_attr($active); ?>"><?php echo esc_html($feature_item); ?></li>
                    <?php } ?>
                </ul>
            <?php endif;?>
            <?php if(!empty($text_button)) : ?>
                <div class="ct-pricing-button">
                    <a href="<?php echo esc_url($a_href);?>" target="<?php echo esc_attr( $a_target ); ?>">
                        <?php echo esc_attr($text_button); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>