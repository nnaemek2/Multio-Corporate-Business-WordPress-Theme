<?php
$atts_extra = shortcode_atts(array(
    'source'               => '',
    'orderby'              => 'date',
    'order'                => 'DESC',
    'limit'                => '6',
    'post_ids'             => '',
    'img_size'             => '200x200',
    'el_class'             => '',
    'except_length'             => '',
    'color_preset'             => 'color-preset1',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);
extract(cms_get_posts_of_grid('case-study', $atts));
extract(multio_get_param_carousel($atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'vc_waypoints' );
wp_enqueue_style( 'vc_animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-carousel-case-study-layout1 owl-carousel <?php echo esc_attr($color_preset.' '.$el_class); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>

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
            $case_study_except = get_post_meta($post->ID, 'case_study_except', true);
            ?>
            <div class="ct-carousel-item">
                <div class="grid-item-inner">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) { ?>
                        <div class="item-featured">
                            <a  href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    <?php } ?>
                    <div class="item-body">
                        <div class="item-category"><?php the_terms( $post->ID, 'case-study-category', '', ', ' ); ?></div>
                        <h3 class="item-title" style="<?php if(!empty($item_title_color)) { echo 'color:'.esc_attr($item_title_color).';'; } ?>">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if(!empty($except_length)) { ?>
                            <div class="item-except"><?php echo wp_trim_words( $case_study_except, $except_length, '...' ); ?></div>
                        <?php } else { ?>
                            <div class="item-except"><?php echo wp_kses_post($case_study_except); ?></div>
                        <?php } ?>
                        <a class="item-more" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><i class="zmdi zmdi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        <?php }
    endif; ?>
    
</div>