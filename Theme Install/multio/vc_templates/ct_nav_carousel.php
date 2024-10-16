<?php
extract(shortcode_atts(array(
    'animation' => '',
    'el_class' => '',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<div class="ct-nav-carousel <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <div class="ct-nav-prev"><i class="fal fac-long-arrow-left"></i></div>
	<div class="ct-nav-next"><i class="fal fac-long-arrow-right"></i></div>
</div>