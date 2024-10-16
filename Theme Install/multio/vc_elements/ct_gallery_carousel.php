<?php
$args = array(
    'name' => 'Image Gallery Carousel',
    'base' => 'ct_gallery_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Image Gallery Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'multio'),
            'param_name' => 'layout',
            'value' => array(
                'Layout 1' => 'layout1',
                'Layout 2' => 'layout2',
                'Layout 3' => 'layout3',
            ),
        ),

        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'multio' ),
            'param_name' => 'images',
            'value' => '',
            'description' => esc_html__( 'Select images from media library.', 'multio' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image size', 'multio' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'multio' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
        ),

        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'multio' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'multio' ),
            'admin_label' => false,
            'weight' => 0,
        ),
    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_gallery_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>