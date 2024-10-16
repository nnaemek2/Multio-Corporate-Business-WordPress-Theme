<?php
$atts_extra = shortcode_atts(array(
    'title_color'               => '',
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'el_class'             => '',
    'img_size'             => '645x440',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('portfolio', $atts));
extract(multio_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-carousel-portfolio-layout2 owl-carousel <?php echo esc_attr($el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

    <?php
    if (is_array($posts)):
        foreach ($posts as $key => $post) {
            the_post();
            $img_id = get_post_thumbnail_id($post->ID);
            $img = wpb_getImageBySize( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail']; 
            ?>
            <div class="ct-carousel-item">
                <div class="grid-item-inner">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) : ?>
                        <div class="item-featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <div class="item-overlay"></div>
                        </div>
                    <?php endif; ?>
                    <div class="item-holder">
                        <h3 class="item-title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                        <a class="item-readmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">+</a>
                    </div>
                </div>
            </div>
        <?php }
    endif; ?>
    
</div>