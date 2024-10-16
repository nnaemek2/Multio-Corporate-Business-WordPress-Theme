<?php
$atts_extra = shortcode_atts(array(
    'content_list'                  => '',
    'col_xl'               => 4,
    'col_lg'               => 4,
    'col_md'               => 3,
    'col_sm'               => 2,
    'col_xs'               => 1,
    'el_class'             => '',
    'img_size'             => '370x416',
), $atts);
$atts = array_merge($atts_extra, $atts);
extract($atts);

$col_xl = 12 / $col_xl;
$col_lg = 12 / $col_lg;
$col_md = 12 / $col_md;
$col_sm = 12 / $col_sm;
$col_xs = 12 / $col_xs;
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
wp_enqueue_script('isotope');
wp_enqueue_script('imagesloaded');
wp_enqueue_script('multio-isotope', get_template_directory_uri() . '/assets/js/isotope.ct.js', array('jquery'), '1.0.0', true);
$service_content_list = (array) vc_param_group_parse_atts( $content_list );
wp_enqueue_script( 'waypoints' );
wp_enqueue_style( 'animate-css' );
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-services-grid-layout1 <?php echo esc_attr($el_class); ?>">

    <div class="ct-grid-inner ct-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($service_content_list as $key => $value) {
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
            $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            ?>
            <div class="<?php echo esc_attr($item_class); ?>">
                <div class="service-item-inner">
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
                                <a class="btn btn-default" href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>