<?php
extract(shortcode_atts(array(

    'service_item_l4' => '',
    'display_row' => '',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-service-carousel');
extract(multio_get_param_carousel($atts));
$services = (array) vc_param_group_parse_atts($service_item_l4);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
$item = 0;
$count = 0;
if(!empty($services)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-services-layout4 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
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
            if($display_row == "two") {
                if ($item == 0) {
                    echo '<div class="ct-carousel-item-wrap">';
                }
            }
            $count++;
            ?>
            <div class="ct-service-item">
                <div class="service-item-inner">
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
                    <a class="service-more" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"></a>
                </div>
            </div>
            <?php if($display_row == "two") {
                if ($item == 1 || ($count == count($services))) {
                    echo '</div>';
                    $item = 0;
                } else {
                    $item++;
                }
            }
        } ?>
    </div>

<?php endif;?>