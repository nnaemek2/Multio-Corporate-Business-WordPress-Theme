<?php
extract(shortcode_atts(array(

    'testimonial_item_l2' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(multio_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item_l2);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($testimonials)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-carousel layout3 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $img_size = isset($value['img_size']) ? $value['img_size'] : '300x300';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-testimonial-item">
                <div class="grid-item-inner">
                    <div class="testimonial-icon">“</div>
                    <div class="testimonial-description"><?php echo wp_kses_post( $content ); ?></div>
                    <div class="testimonial-holder">
                        <?php if(!empty($image)) : ?>
                            <div class="testimonial-featured">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="testimonial-meta">
                            <h4 class="testimonial-title">
                                <?php echo esc_attr($title); ?>
                            </h4>
                            <div class="testimonial-position">
                                <?php echo esc_attr($position); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>