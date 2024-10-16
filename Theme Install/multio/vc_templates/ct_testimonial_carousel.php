<?php
extract(shortcode_atts(array(

    'testimonial_item' => '',
    'title_color' => '',
    'content_color' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(multio_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item);
if(!empty($testimonials)) : ?>
    <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-carousel layout1 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $image_url = '';
            if (!empty($image)) {
                $attachment_image = wp_get_attachment_image_src($image, 'thumbnail');
                $image_url = $attachment_image[0];
            }
            $rating = isset($value['rating']) ? $value['rating'] : ''; ?>
            <div class="testimonial-item">
                <div class="testimonial-front">
                    <div class="testimonial-item-inner">
                        <?php if(!empty($image_url)) : ?>
                            <div class="testimonial-image">
                                <img src="<?php echo esc_url($image_url ); ?>" alt="<?php echo esc_html($title); ?>" />
                            </div>
                        <?php endif; ?>
                        <div class="testimonial-content">
                            <?php echo esc_html($content); ?>
                        </div>
                        <div class="testimonial-meta">
                            <h3 class="testimonial-title"><?php echo esc_html($title); ?></h3>
                            <div class="testimonial-rating <?php echo esc_attr($rating); ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-back">
                    <div class="testimonial-item-inner">
                        <div class="testimonial-icon">“</div>
                        <?php if(!empty($image_url)) : ?>
                            <div class="testimonial-image">
                                <img src="<?php echo esc_url($image_url ); ?>" alt="<?php echo esc_html($title); ?>" />
                            </div>
                        <?php endif; ?>
                        <div class="testimonial-content">
                            <?php echo esc_html($content); ?>
                        </div>
                        <div class="testimonial-meta">
                            <h3 class="testimonial-title"><?php echo esc_html($title); ?></h3>
                            <div class="testimonial-rating <?php echo esc_attr($rating); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php endif;?>