<?php
vc_map(array(
    'name' => 'Signature',
    'base' => 'ct_signature',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Signature Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Signature Image', 'multio' ),
            'param_name' => 'signature_image',
            'value' => '',
            'description' => esc_html__( 'Select signature image from media library.', 'multio' ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'multio'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'admin_label' => true,
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Position', 'multio'),
            'param_name' => 'position',
            'description' => 'Enter position.',
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

class WPBakeryShortCode_ct_signature extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>