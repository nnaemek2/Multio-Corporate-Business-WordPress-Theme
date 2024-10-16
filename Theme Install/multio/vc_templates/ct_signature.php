<?php
extract(shortcode_atts(array(
    'signature_image' => '',
    'title' => '',
    'position' => '',
    'el_class' => '',
    'animation' => '',
), $atts));

$signature_image_url = '';
if (!empty($signature_image)) {
    $attachment_image = wp_get_attachment_image_src($signature_image, 'full');
    $signature_image_url = $attachment_image[0];
}
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
?>
<div class="ct-signature <?php echo esc_attr($el_class.' '.$animation_classes); ?>">
    <?php if(!empty($signature_image_url)) : ?>
        <div class="ct-signature-image">
            <img src="<?php echo esc_url( $signature_image_url ); ?>" alt="<?php echo esc_html__('Signature', 'multio'); ?>" />
        </div>
    <?php endif; ?>

    <div class="ct-signature-holder">
        <?php if(!empty($title)) : ?>
            <h3><?php echo wp_kses_post( $title ); ?></h3>
        <?php endif;?>
        <?php if(!empty($position)) : ?>
            <span><?php echo wp_kses_post( $position ); ?></span>
        <?php endif;?>
    </div>
</div>