<?php
vc_map(array(
    "name" => 'BMI Calculate',
    "base" => "ct_bmi_calculate",
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'BMI Calculate Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Element Title', 'multio' ),
            'param_name' => 'el_title',
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
    )
));

class WPBakeryShortCode_ct_bmi_calculate extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>