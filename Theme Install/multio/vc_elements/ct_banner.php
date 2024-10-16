<?php
vc_map(array(
    'name' => 'Banner',
    'base' => 'ct_banner',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Banner Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_banner',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'std' => 'ct_banner.php',
            'group' => esc_html__('Template', 'multio'),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image One', 'multio' ),
            'param_name' => 'banner_img1',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
            'group' => esc_html__('Images', 'multio'),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image Two', 'multio' ),
            'param_name' => 'banner_img2',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
            'group' => esc_html__('Images', 'multio'),
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
            'group'            => esc_html__('Extra', 'multio')
        ),
        array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'multio' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'multio' ),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Extra', 'multio'),
        ),
    )
));

class WPBakeryShortCode_ct_banner extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>