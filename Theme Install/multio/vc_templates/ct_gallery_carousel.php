<?php
extract(shortcode_atts(array(

    'layout' => 'layout1',
    'images' => '',
    'img_size' => '600x600',
    'el_class' => '',
    'animation' => '',

), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$ct_images = explode( ',', $images );
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
extract(multio_get_param_carousel($atts));
if ($layout == 'layout1' || $layout == 'layout2') : ?>
    <div class="ct-gallery-carousel-<?php echo esc_attr($layout); ?> images-light-box owl-carousel <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($ct_images as $img_id) :
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-image-gallery-item">
                <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><?php echo wp_kses_post($thumbnail); ?></a>
            </div> 
        <?php endforeach; ?> 
    </div>
<?php endif; ?>

<?php if ($layout == 'layout3') : 
    wp_enqueue_script('gallery-carousel', get_template_directory_uri() . '/assets/js/ct-gallery-carousel.js', array( 'jquery' ), 'all', true);
    if (is_rtl()) {
        $carousel_rtl = 'true';
    } else {
        $carousel_rtl = 'false';
    }
    ?>
    <div class="ct-image-gallery-carousel images-light-box desktop-lg <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>">
        <div class="poster-main" id="gallery-carousel" data-setting='{
            "width":1170,
            "height":605,
            "posterWidth":305,
            "posterHeight":605,
            "scale":0.85,
            "speed":1000,
            "autoPlay":true,
            "delay":6000,
            "verticalAlign":"middle"
            }'> 
           <div class="poster-btn poster-prev-btn"></div> 
                <ul class="poster-list"> 
                    <?php foreach ($ct_images as $img_id) :
                        $img = wpb_getImageBySize( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $img_size,
                            'class'      => '',
                        ));
                        $thumbnail = $img['thumbnail'];
                        ?>
                        <li class="poster-item">
                            <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><?php echo wp_kses_post($thumbnail); ?></a>
                        </li> 
                    <?php endforeach; ?> 
                </ul> 
            <div class="poster-btn poster-next-btn"></div> 
        </div>
    </div>

    <div class="ct-image-gallery-carousel images-light-box desktop-md owl-carousel <?php echo esc_attr( $el_class ); ?>" data-item-xs="1" data-item-sm="2" data-item-md="3" data-item-lg=4 data-item-xl="5" data-margin="30" data-margin-md="30" data-loop="true" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="true" data-stagepadding="0" data-stagepadding-xl="0" data-stagepadding-lg="0" data-rtl="<?php echo esc_attr( $carousel_rtl ); ?>">
        <?php foreach ($ct_images as $img_id) :
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-image-gallery-item">
                <a class="light-box" href="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full'));?>"><?php echo wp_kses_post($thumbnail); ?></a>
            </div> 
        <?php endforeach; ?> 
    </div>
<?php endif; ?>