<?php
$args = array(
    'name' => 'Gallery Section',
    'base' => 'ct_gallery_section',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Gallery Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'attach_images',
            'heading' => esc_html__( 'Images', 'multio' ),
            'param_name' => 'images',
            'value' => '',
            'description' => esc_html__( 'Select images from media library.', 'multio' ),
        ),

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'multio'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'admin_label' => true,
        ),

        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Content', 'multio'),
            'param_name' => 'content',
            'description' => 'Enter content.',
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
            'group' => esc_html__('Extra', 'multio')
        ),

        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'multio' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'multio' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'multio')
        ),
    ));
vc_map($args);

class WPBakeryShortCode_ct_gallery_section extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>