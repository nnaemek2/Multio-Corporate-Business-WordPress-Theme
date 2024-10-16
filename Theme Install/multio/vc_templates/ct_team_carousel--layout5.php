<?php
extract(shortcode_atts(array(

    'content_list_l5' => '',
    'title_color' => '',
    'img_size' => '310x310',
    'el_class' => '',
    'animation' => '',

), $atts));
wp_enqueue_script( 'owl-carousel' );
wp_enqueue_script( 'multio-carousel' );
$html_id = cmsHtmlID('ct-team-carousel');
extract(multio_get_param_carousel($atts));
$el_content_list = array();
$el_content_list = (array) vc_param_group_parse_atts( $content_list_l5 );
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

if(!empty($el_content_list)) : ?>
<div class="ct-team-carousel-wrap">
    <div id="<?php echo esc_attr($html_id);?>" class="ct-team-carousel-layout5 owl-carousel <?php echo esc_attr( $el_class.' '.$animation_classes ); ?>" <?php echo !empty($carousel_data) ?  esc_attr($carousel_data) : '' ?>>
        <?php foreach ($el_content_list as $key => $value) {
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $item_link = isset($value['item_link']) ? $value['item_link'] : '';
            $link = vc_build_link($item_link);
            $a_href = '';
            $a_target = '';
            if ( strlen( $link['url'] ) > 0 ) {
                $a_href = $link['url'];
                $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
            }
            $social = isset($value['social']) ? $value['social'] : '';
            $el_social = (array) vc_param_group_parse_atts( $social );
            $image = isset($value['image']) ? $value['image'] : '';
            $img = wpb_getImageBySize( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-team-item">
                <div class="ct-team-item-inner">
                    <div class="team-featured">
                        <?php echo wp_kses_post($thumbnail); ?>
                    </div>
                    <div class="team-holder">
                        <h3 class="team-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                        </h3>
                        <div class="team-position">
                            <?php echo esc_attr($position); ?>
                        </div>
                        <div class="team-social">
                            <?php foreach ($el_social as $key => $value) {
                                $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                                $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                                <a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="team-holder hover">
                        <h3 class="team-title" style="<?php if(!empty($title_color)) { echo 'color:'.esc_attr($title_color).';'; } ?>">
                            <a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($title); ?></a>
                        </h3>
                        <div class="team-position">
                            <?php echo esc_attr($position); ?>
                        </div>
                        <div class="team-description">
                            <?php echo esc_attr($desc); ?>
                        </div>
                        <div class="team-social">
                            <?php foreach ($el_social as $key => $value) {
                                $social_link = isset($value['social_link']) ? $value['social_link'] : '';
                                $icon_class = isset($value['icon']) ? $value['icon'] : ''; ?>
                                <a href="<?php echo esc_url($social_link); ?>" target="_blank"><i class="<?php echo esc_attr( $icon_class ); ?>"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php endif;?>