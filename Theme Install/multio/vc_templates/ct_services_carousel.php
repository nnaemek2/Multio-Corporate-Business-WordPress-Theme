<?php
extract(shortcode_atts(array(

    'testimonial_item' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-service-carousel');
extract(multio_get_param_carousel($atts));
$services = (array) vc_param_group_parse_atts($testimonial_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($services)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-services-layout1 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($services as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $icon = isset($value['icon']) ? $value['icon'] : '';
            $icon_hover = isset($value['icon_hover']) ? $value['icon_hover'] : '';
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
            ?>
            <div class="ct-service-item">
                <div class="service-item-inner">
                    <div class="service-item-front">
                        <?php if(!empty($icon)) : ?>
                            <div class="service-icon">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="service-title">
                            <?php echo esc_attr($title); ?>
                        </h4>
                        <div class="service-sub-title">
                            <?php echo esc_attr($sub_title); ?>
                        </div>
                    </div>
                    <div class="service-item-back">
                        <div class="service-item-back-inner">
                            <?php if(!empty($icon)) : ?>
                                <div class="service-icon">
                                    <?php echo wp_kses_post($thumbnail_hover); ?>
                                </div>
                            <?php endif; ?>
                            <h4 class="service-title">
                                <?php echo esc_attr($title); ?>
                            </h4>
                            <div class="service-sub-title">
                                <?php echo esc_attr($sub_title); ?>
                            </div>
                            <div class="service-more">
                                <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>">+</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php endif;?>