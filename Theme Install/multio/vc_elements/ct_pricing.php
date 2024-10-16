<?php
vc_map(array(
    'name' => 'Pricing',
    'base' => 'ct_pricing',
    'class' => 'ct-icon-element',
    'description' => esc_html__( 'Pricing Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(
        
        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_pricing',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'group' => esc_html__('Template', 'multio'),
        ), 

        /* Layout Classic */
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Recommended', 'multio' ),
            'param_name' => 'recommended',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Title', 'multio' ),
            'param_name' => 'title',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
            'admin_label' => true,
        ),
        array(
            'type' => 'textarea',
            'heading' => __ ( 'Description', 'multio' ),
            'param_name' => 'description',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Price', 'multio' ),
            'param_name' => 'price',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __ ( 'Time', 'multio' ),
            'param_name' => 'pricing_time',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Feature Lists', 'multio' ),
            'param_name' => 'feature_lists',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
            'params' => array(
                array(
                    "type" => "textfield",
                    "heading" =>esc_html__("Item", 'multio'),
                    "param_name" => "feature_item",
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Item Active', 'multio'),
                    'param_name' => 'active',
                    'value' => array(
                        'No' => 'no-active',
                        'Yes' => 'active',
                    ),
                ),
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => __ ( 'Text Button', 'multio' ),
            'param_name' => 'text_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
        ),

        array(
            'type' => 'vc_link',
            'heading' => __ ( 'Link Button', 'multio' ),
            'param_name' => 'link_button',
            'value' => '',
            'group' => esc_html__('Source Settings', 'multio'),
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

class WPBakeryShortCode_ct_pricing extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>