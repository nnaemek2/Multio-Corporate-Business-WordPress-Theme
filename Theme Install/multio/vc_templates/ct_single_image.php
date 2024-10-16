<?php
extract(shortcode_atts(array(
    'single_image' => '',
    'img_size' => 'full',
    'animate' => 'left-to-right',
    'animate_color1' => '',
    'animate_color2' => '',
    'absolute' => 'no',
    'absolute_position' => 'top-right',
    'animation' => '',
    'el_class' => '',
), $atts));
$img = wpb_getImageBySize( array(
    'attach_id'  => $single_image,
    'thumb_size' => $img_size,
    'class'      => '',
));
$thumbnail = $img['thumbnail'];
?>
<div class="ct-single-image <?php echo esc_attr($animate.' '.$el_class.' '.$absolute_position); if($absolute == 'yes') { echo ' ct-single-image-absolute'; } ?>">
    <?php if($absolute == 'no') { ?>
        <div class="ct-single-image-before" <?php if(!empty($animate_color1)) { ?>style="background-color: <?php echo esc_attr($animate_color1); ?>;"<?php } ?>></div>
	<?php } ?>
    <div class="ct-single-image-inner">
		<?php if( !empty($single_image) ) { ?>
            <?php echo wp_kses_post($thumbnail); ?>
        <?php } ?>
	</div>
    <?php if($absolute == 'no') { ?>
        <div class="ct-single-image-after" <?php if(!empty($animate_color2)) { ?>style="background-color: <?php echo esc_attr($animate_color2); ?>;"<?php } ?>></div>
    <?php } ?>
</div>