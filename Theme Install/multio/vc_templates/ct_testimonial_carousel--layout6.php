<?php
extract(shortcode_atts(array(

    'testimonial_item_l5' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-testimonial-carousel');
extract(multio_get_param_carousel($atts));
$testimonials = (array) vc_param_group_parse_atts($testimonial_item_l5);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($testimonials)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-testimonial-carousel layout6 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($testimonials as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $icon_fontawesome4 = isset($value['icon_fontawesome4']) ? $value['icon_fontawesome4'] : '';
            $social_link = isset($value['social_link']) ? $value['social_link'] : '';
            $link = vc_build_link($social_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $img_size = isset($value['img_size']) ? $value['img_size'] : '252x252';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-testimonial-item">
                <?php if(!empty($image)) : ?>
                    <div class="testimonial-featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                        <?php if(!empty($icon_fontawesome4)) : ?>
                            <a class="testimonial-social" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><i class="<?php echo esc_attr($icon_fontawesome4); ?>"></i></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="testimonial-holder">
                    <div class="testimonial-description"><?php echo wp_kses_post( $content ); ?></div>
                    <h4 class="testimonial-title">
                        <?php echo esc_attr($title).','; ?>
                        <span><?php echo esc_attr($position); ?></span>
                    </h4>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>