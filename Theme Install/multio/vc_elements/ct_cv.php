<?php
vc_map(array(
    'name' => 'CV List',
    'base' => 'ct_cv',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'CV List Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'CV', 'multio' ),
            'value' => '',
            'param_name' => 'cv_item',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Label', 'multio'),
                    'param_name' => 'label',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'multio'),
                    'param_name' => 'content',
                ),
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Label Color', 'multio'),
            'param_name' => 'label_color',
            'value' => '',
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Content Color', 'multio'),
            'param_name' => 'content_color',
            'value' => '',
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Button Text', 'multio' ),
            'param_name' => 'button_text',
            'value' => '',
            'admin_label' => true,
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'multio'),
            'param_name' => 'button_link',
            'value' => '',
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

class WPBakeryShortCode_ct_cv extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>