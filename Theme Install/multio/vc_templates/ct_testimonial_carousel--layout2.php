<?php
extract(shortcode_atts(array(

    'testimonial_item_l2' => '',
    'title_color' => '',
    'content_color' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(multio_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item_l2);
if(!empty($testimonials)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-carousel layout2 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => '124x124',
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="testimonial-item">
                <div class="testimonial-item-inner">
                    <div class="testimonial-icon">“</div>
                    <?php if(!empty($image)) : ?>
                        <div class="testimonial-image">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="testimonial-position"><?php echo esc_html($position); ?></div>
                    <div class="testimonial-content">
                        <?php echo esc_html($content); ?>
                    </div>
                    <h3 class="testimonial-title"><?php echo wp_kses_post($title); ?></h3>
                    
                </div>
            </div>
        <?php } ?>
    </div>
<?php endif;?>