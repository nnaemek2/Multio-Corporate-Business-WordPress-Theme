<?php
vc_map(array(
    'name' => 'Table',
    'base' => 'ct_table',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Table Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Element Title', 'multio'),
            'param_name' => 'el_title',
        ),

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Column', 'multio' ),
            'value' => '',
            'param_name' => 'table_td',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Content', 'multio'),
                    'param_name' => 'table_content',
                    'admin_label' => true,
                ),
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

class WPBakeryShortCode_ct_table extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>