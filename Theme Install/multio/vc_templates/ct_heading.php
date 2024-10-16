<?php
extract(shortcode_atts(array(
    'styles' => 'style1',
    'text_source' => 'custom-text',
    'text' => '',
    'tag' => 'h3',
    'align_lg' => 'align-left',
    'align_md' => 'align-left-md',
    'align_sm' => 'align-left-sm',
    'align_xs' => 'align-left-xs',
    'divider' => 'none',

    'font_size' => '',
    'font_size_md' => '',
    'font_size_sm' => '',
    'font_size_xs' => '',

    'line_height' => '',
    'line_height_md' => '',
    'line_height_sm' => '',
    'line_height_xs' => '',

    'font_weight' => '',
    'letter_spacing' => '',
    'text_transform' => '',

    'subtitle' => '',
    'subtitle_color' => '',
    'subtitle_font_size' => '',
    'subtitle_line_height' => '',

    'description' => '',
    'description_color' => '',
    'description_font_weight' => 'inherit',

    'margin_top' => '',
    'margin_right' => '',
    'margin_bottom' => '',
    'margin_left' => '',
    'text_color' => '',
    'custom_fonts' => 'false',
    'google_fonts' => '',

    'animation' => '',
    'el_class' => '',

    'typingout' => '',
    'title_link' => '',
    'show_gap' => 'hide',
    'gap_color' => '',
    'text_style' => '',
), $atts));
if(!empty($typingout)) {
    wp_enqueue_script('typingout', get_template_directory_uri() . '/assets/js/typingout.js', array( 'jquery' ), '1.0.0', true);
}
$link = vc_build_link($title_link);
$a_href = '';
$a_target = '';
if ( strlen( $link['url'] ) > 0 ) {
    $a_href = $link['url'];
    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
}

$inline_style = '';
if($custom_fonts == 'true') {
    $styles = array();
    // Build the data array
    $googleFontsParam = new Vc_Google_Fonts();
    $fieldSettings = array();
    $text_font_data = strlen( $google_fonts ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $google_fonts ) : '';

    // Build the inline style
    if(isset($text_font_data['values']['font_family'])) {
        $fontFamily = explode( ':', $text_font_data['values']['font_family'] );
        $styles[] = 'font-family:' . $fontFamily[0];
    }
    if(isset($text_font_data['values']['font_style'])) {
        $fontStyles = explode( ':', $text_font_data['values']['font_style'] );
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];
    }
    if(isset($text_font_data['values']['font_family']) || isset($text_font_data['values']['font_style'])) {
        foreach( $styles as $attribute ){
            $inline_style .= $attribute.'; ';
        }
    }
    // Enqueue the right font
    $settings = get_option( 'wpb_js_google_fonts_subsets' );
    if ( is_array( $settings ) && ! empty( $settings ) ) {
        $subsets = '&subset=' . implode( ',', $settings );
    } else {
        $subsets = '';
    }
    // We also need to enqueue font from googleapis
    if ( isset( $text_font_data['values']['font_family'] ) ) {
        wp_enqueue_style(
            'vc_google_fonts_' . vc_build_safe_css_class( $text_font_data['values']['font_family'] ),
            '//fonts.googleapis.com/css?family=' . $text_font_data['values']['font_family'] . $subsets
        );
    }
} else {
    $inline_style = '';
}

$styles_title = array(
    'margin-top'    => $margin_top.'px',
    'margin-right'  => $margin_right.'px',
    'margin-bottom' => $margin_bottom.'px',
    'margin-left'   => $margin_left.'px',
    'color'   => $text_color,
    'font-size'   => $font_size.'px',
    'line-height'   => $line_height.'px',
    'letter-spacing'   => $letter_spacing,
    'text-transform'   => $text_transform,
    'font-weight'   => $font_weight,
);
$title_styles = '';
foreach ($styles_title as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $title_styles .= $key . ':' . $value . ';';
    }
}

$styles_sub = array(
    'color'   => $subtitle_color,
    'font-size'   => $subtitle_font_size.'px',
    'line-height'   => $subtitle_line_height.'px',
);
$subtitle_styles = '';
foreach ($styles_sub as $key => $value) {
    if (!empty($value) && $value != 'px') {
        $subtitle_styles .= $key . ':' . $value . ';';
    }
}

$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );

?>
<div id="<?php echo esc_attr($atts['html_id']);?>" class="ct-heading <?php echo esc_attr( $styles.' '.$align_lg.' '.$align_md.' '.$align_sm.' '.$align_xs.' '.$animation_classes ); ?>">
    
    <div class="ct-inline-css"  data-css="
        <?php if(!empty($font_size_md) || !empty($line_height_md)) : ?>
            @media (min-width: 991px) and (max-width: 1199px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_md)) : ?>
                        font-size: <?php echo esc_attr($font_size_md).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_md)) : ?>
                        line-height: <?php echo esc_attr($line_height_md).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        <?php if(!empty($font_size_sm) || !empty($line_height_sm)) : ?>
            @media (min-width: 768px) and (max-width: 991px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_sm)) : ?>
                        font-size: <?php echo esc_attr($font_size_sm).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_sm)) : ?>
                        line-height: <?php echo esc_attr($line_height_sm).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        <?php if(!empty($font_size_xs) || !empty($line_height_xs)) : ?>
            @media screen and (max-width: 767px) {
                #<?php echo esc_attr($atts['html_id']);?> .ct-heading-tag {
                    <?php if(!empty($font_size_xs)) : ?>
                        font-size: <?php echo esc_attr($font_size_xs).'px'; ?> !important;
                    <?php endif; ?>
                    <?php if(!empty($line_height_xs)) : ?>
                        line-height: <?php echo esc_attr($line_height_xs).'px'; ?> !important;
                    <?php endif; ?>
                }
            }
        <?php endif; ?>
        ">
    </div>
    
    <?php if(!empty($subtitle)) : ?>
        <div class="ct-heading-sub" <?php echo !empty($subtitle_styles) ? 'style="' . esc_attr($subtitle_styles) . '"' : '' ?>>
            <?php echo wp_kses_post( $subtitle  ); ?>
        </div>
    <?php endif; ?>
    <<?php echo esc_attr( $tag ); ?> class="ct-heading-tag <?php echo esc_attr( $el_class ); ?>" <?php echo !empty($title_styles) ? 'style="' . esc_attr($title_styles) . ' '. $inline_style .'"' : '' ?>>
        <?php if($text_source == 'custom-text' && !empty($text)) { ?>
            <?php if(!empty($a_href)) : ?><a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php endif; ?>
                <?php echo wp_kses_post( $text ); ?>
                <?php if(!empty($typingout)) { ?>
                    <span class="ct-typingout-typed" data-period="2000" data-type='[ <?php echo esc_attr($typingout); ?> ]'>
                        <span class="ct-typingout-animation"></span>
                    </span>
                <?php } ?>
            <?php if(!empty($a_href)) : ?></a><?php endif; ?>
        <?php } else {
            echo get_the_title();
        } ?>
    </<?php echo esc_attr( $tag ); ?>>
    <?php if($show_gap == 'show') : ?>
        <div class="h-gap">
            <span>
                <i <?php if(!empty($gap_color)) : ?>style="background-color:<?php echo esc_attr($gap_color); ?>" <?php endif; ?>></i>
                <i <?php if(!empty($gap_color)) : ?>style="background-color:<?php echo esc_attr($gap_color); ?>" <?php endif; ?>></i>
                <i <?php if(!empty($gap_color)) : ?>style="background-color:<?php echo esc_attr($gap_color); ?>" <?php endif; ?>></i>
                <i <?php if(!empty($gap_color)) : ?>style="background-color:<?php echo esc_attr($gap_color); ?>" <?php endif; ?>></i>
            </span>
        </div>
    <?php endif; ?>
    <?php if(!empty($description)) : ?>
        <div class="ct-heading-desc fw-<?php echo esc_attr($description_font_weight); ?> <?php echo esc_attr($text_style); ?>" <?php if(!empty($description_color)) : ?>style="color:<?php echo esc_attr($description_color); ?>"<?php endif; ?>><?php echo wp_kses_post( $description ); ?></div>
    <?php endif; ?>
</div>