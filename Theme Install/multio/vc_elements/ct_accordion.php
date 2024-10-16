<?php
vc_map(array(
    'name' => 'Accordion',
    'base' => 'ct_accordion',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Collapsible content panels', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_accordion',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'std' => 'ct_accordion.php',
            'group' => esc_html__('Template', 'multio'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'multio'),
            'param_name' => 'style',
            'value' => array(
                'Modern' => 'modern',
                'Outline' => 'outline',
            ),
            'group' => esc_html__('Template', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_accordion.php',
                )
            ),
        ),
        
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Active section', 'multio'),
            'param_name' => 'active_section',
            'description' => 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).',
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Accordion Items', 'multio' ),
            'param_name' => 'ct_accordion',
            'description' => esc_html__( 'Enter values for accordion item', 'multio' ),
            'value' => '',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'multio'),
                    'param_name' => 'ac_title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Content', 'multio'),
                    'param_name' => 'ac_content',
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

class WPBakeryShortCode_ct_accordion extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>