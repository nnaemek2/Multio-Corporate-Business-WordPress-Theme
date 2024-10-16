<?php
extract(shortcode_atts(array(

    'showcase_item' => '',
    'arrows' => 'false',
    'el_class' => '',

), $atts));

wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-showcase-carousel');
extract(multio_get_param_carousel($atts));
$showcase = (array) vc_param_group_parse_atts($showcase_item);
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
if(!empty($showcase)) : ?>

    <div id="<?php echo esc_attr($html_id);?>" class="ct-showcase-layout1 owl-carousel <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($showcase as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $content = isset($value['content']) ? $value['content'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $image_url = '';
            if (!empty($image)) {
                $attachment_image = wp_get_attachment_image_src($image, 'full');
                $image_url = $attachment_image[0];
            }
            ?>
            <div class="ct-showcase-item">
                <div class="ct-showcase-item-holder">
                    <?php if(!empty($image_url)) : ?>
                        <div class="showcase-featured bg-image" style="background-image: url(<?php echo esc_url($image_url); ?>);">
                        </div>
                    <?php endif; ?>
                    <div class="showcase-holder">
                        <div class="showcase-holder-inner">
                            <h3 class="showcase-title">
                                <a href="#"><?php echo esc_attr($title); ?></a>
                            </h3>
                            <div class="showcase-description"><?php echo wp_kses_post( $content ); ?></div>
                        </div>
                    </div>
                </div>
                <?php if($arrows == 'true') : ?>
                    <div class="ct-carousel-nav">
                        <span class="ct-nav-prev"><i class="ct-arrow-white-left"></i></span>
                        <span class="ct-nav-next"><i class="ct-arrow-white-right"></i></span>
                    </div>
                <?php endif; ?>
                <?php if(!empty($a_href)) : ?>
                    <a class="item-link" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"></a>
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>

<?php endif;?>