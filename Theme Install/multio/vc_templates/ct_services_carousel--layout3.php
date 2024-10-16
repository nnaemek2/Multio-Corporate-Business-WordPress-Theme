<?php
extract(shortcode_atts(array(

    'testimonial_item_l3' => '',
    'hover_style_l3' => 'hover-style1',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-service-carousel');
extract(multio_get_param_carousel($atts));
$services = (array) vc_param_group_parse_atts($testimonial_item_l3);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($services)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-services-layout3 owl-carousel <?php echo esc_attr( $hover_style_l3.' '.$el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($services as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $description = isset($value['description']) ? $value['description'] : '';
            $button_text = isset($value['button_text']) ? $value['button_text'] : '';
            $button_link = isset($value['button_link']) ? $value['button_link'] : '';
            $link = vc_build_link($button_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $icon = isset($value['icon']) ? $value['icon'] : '';
            $icon_hover = isset($value['icon_hover']) ? $value['icon_hover'] : '';
            $bg_image = isset($value['bg_image']) ? $value['bg_image'] : '';
            $s_icon = wpb_getImageBySize( array(
                'attach_id'  => $icon,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail = $s_icon['thumbnail'];
            $s_icon_hover = wpb_getImageBySize( array(
                'attach_id'  => $icon_hover,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail_hover = $s_icon_hover['thumbnail'];
            $bg_image_url = '';
            if (!empty($bg_image)) {
                $attachment_image = wp_get_attachment_image_src($bg_image, 'full');
                $bg_image_url = $attachment_image[0];
            }
            ?>
            <div class="ct-service-item">
                <div class="service-item-inner">
                    <div class="service-bg-image bg-image" style="background-image: url(<?php echo esc_url($bg_image_url); ?>);"></div>
                    <div class="service-holder">
                        <?php if(!empty($icon)) : ?>
                            <div class="service-icon">
                                <?php echo wp_kses_post($thumbnail); ?>
                                <?php echo wp_kses_post($thumbnail_hover); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="service-title">
                            <?php echo esc_attr($title); ?>
                        </h4>
                        <div class="service-description">
                            <?php echo esc_attr($description); ?>
                        </div>
                        <?php if($button_text) : ?>
                            <div class="service-more">
                                <a class="btn btn-default" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($button_text); ?><i class="zmdi zmdi-long-arrow-right"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>