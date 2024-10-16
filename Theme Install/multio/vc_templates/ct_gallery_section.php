<?php
extract(shortcode_atts(array(

    'images' => '',
    'title' => '',
    'images' => '',
    'el_class' => '',
    'animation' => '',

), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$ct_images = explode( ',', $images );
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
if (is_rtl()) {
    $carousel_rtl = 'true';
} else {
    $carousel_rtl = 'false';
} ?>
<div class="ct-gallery-section-wrap">
    <div class="ct-gallery-section-carousel owl-carousel <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" data-item-xs="1" data-item-sm="1" data-item-md="1" data-item-lg="1" data-item-xl="1" data-margin="30" data-margin-md="30" data-loop="true" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="true" data-bullets="false" data-stagepadding="0" data-stagepadding-xl="0" data-stagepadding-lg="0" data-rtl="<?php echo esc_attr( $carousel_rtl ); ?>">
        <?php foreach ($ct_images as $img_id) :
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            if (!empty($img_id)) : 
                $thumbnail_url = wp_get_attachment_image_src($img_id, 'full');
                ?>
                <div class="ct-image-item">
                    <div class="bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                </div> 
            <?php endif; ?>
        <?php endforeach; ?> 
    </div>
    <div class="ct-gallery-section-holder">
        <div class="ct-gallery-section-inner">
            <?php if(!empty($title)) : ?>
                <h3 class="ct-gallery-section-title"><?php echo wp_kses_post($title); ?></h3>
            <?php endif; ?>
            <div class="ct-gallery-section-content">
                <?php echo apply_filters('the_content', $content); ?>
            </div>
            <div class="ct-nav-carousel">
                <div class="ct-nav-prev"><i class="far fac-angle-left"></i></div>
                <div class="ct-nav-next"><i class="far fac-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>