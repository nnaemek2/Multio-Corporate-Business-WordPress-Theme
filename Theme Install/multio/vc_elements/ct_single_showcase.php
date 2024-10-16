<?php
vc_map(array(
    'name' => 'Single Showcase',
    'base' => 'ct_single_showcase',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Single Showcase Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'multio'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'admin_label' => true,
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'multio' ),
            'param_name' => 'showcase_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
        ),
        
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Link', 'multio'),
            'param_name' => 'demo_link',
            'value' => '',
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Coming soon', 'multio'),
            'param_name' => 'coming_soon',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes',
            ),
        ),

        /* Extra */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
            'group'            => esc_html__('Extra', 'multio')
        ),
    )
));

class WPBakeryShortCode_ct_single_showcase extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>