<?php
extract(shortcode_atts(array(

    'testimonial_item_l2' => '',
    'hover_style' => 'hover-readmore',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-service-carousel');
extract(multio_get_param_carousel($atts));
$services = (array) vc_param_group_parse_atts($testimonial_item_l2);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($services)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-services-layout2 owl-carousel <?php echo esc_attr( $hover_style.' '.$el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($services as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $description = isset($value['description']) ? $value['description'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $icon = isset($value['icon']) ? $value['icon'] : '';
            $s_icon = wpb_getImageBySize( array(
                'attach_id'  => $icon,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail = $s_icon['thumbnail'];
            $bg_image_l2 = isset($value['bg_image_l2']) ? $value['bg_image_l2'] : '';
            $bg_image_url = '';
            if (!empty($bg_image_l2)) {
                $attachment_image = wp_get_attachment_image_src($bg_image_l2, 'full');
                $bg_image_url = $attachment_image[0];
            }
            ?>
            <div class="ct-service-item">
                <div class="service-item-inner" <?php if(!empty($bg_image_url)) : ?>style="background-image: url(<?php echo esc_url($bg_image_url); ?>);"<?php endif; ?>>
                    <?php if(!empty($icon)) : ?>
                        <div class="service-icon">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <h4 class="service-title">
                        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                    </h4>
                    <div class="service-description">
                        <?php echo esc_attr($description); ?>
                    </div>
                    <div class="service-more">
                        <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><i class="ct-icon-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>