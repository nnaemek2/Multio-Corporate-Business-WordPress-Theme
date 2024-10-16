<?php
extract(shortcode_atts(array(

    'testimonial_item_l6' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-service-carousel');
extract(multio_get_param_carousel($atts));
$services = (array) vc_param_group_parse_atts($testimonial_item_l6);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($services)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-services-layout6 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
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
            $icon_hover = isset($value['icon_hover']) ? $value['icon_hover'] : '';
            $s_icon_hover = wpb_getImageBySize( array(
                'attach_id'  => $icon_hover,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $thumbnail_hover = $s_icon_hover['thumbnail'];

            $image = isset($value['image']) ? $value['image'] : '';
            $item_image = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => 'full',
                'class'      => '',
            ));
            $item_image = $item_image['thumbnail'];
            ?>
            <div class="ct-service-item">
                <div class="service-item-inner">
                    <?php if(!empty($image)) : ?>
                        <div class="service-featured">
                            <?php echo wp_kses_post($item_image); ?>
                        </div>
                    <?php endif; ?>
                    <div class="service-meta">
                        <h4 class="service-title">
                            <?php echo esc_attr($title); ?>
                        </h4>
                    </div>
                    <div class="service-holder">
                        <div class="service-holder-inner">
                            <?php if(!empty($icon_hover)) : ?>
                                <div class="service-icon">
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
            </div>
        <?php } ?>
    </div>

<?php endif;?>