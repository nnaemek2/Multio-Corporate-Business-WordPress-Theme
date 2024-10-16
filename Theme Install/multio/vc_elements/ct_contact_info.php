<?php
vc_map(array(
    'name' => 'Contact Info',
    'base' => 'ct_contact_info',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Contact Info Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Content */
    
        array(
            'type' => 'textarea',
            'heading' =>esc_html__('Content', 'multio'),
            'param_name' => 'content_info',
            'admin_label' => true,
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Content Color', 'multio'),
            'param_name' => 'content_color',
            'value' => '',
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Type', 'multio'),
            'param_name' => 'content_type',
            'value' => array(
                'Text' => 'text',
                'Tel' => 'tel',
                'Email' => 'email',
                'Map' => 'map',
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Button Text', 'multio' ),
            'param_name' => 'button_text',
            'value' => '',
            'dependency' => array(
                'element'=>'content_type',
                'value'=>array(
                    'map',
                )
            ),
        ),
        array(
            'type' => 'vc_link',
            'class' => '',
            'heading' => esc_html__('Button Link', 'multio'),
            'param_name' => 'button_link',
            'value' => '',
            'dependency' => array(
                'element'=>'content_type',
                'value'=>array(
                    'map',
                )
            ),
        ),

        /* Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'multio' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'multio' ) => 'fontawesome',
                esc_html__( 'Material Design', 'multio' ) => 'material_design',
                esc_html__( 'Flaticon', 'multio' ) => 'flaticon',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'multio' ),
            'group' => esc_html__('Icon', 'multio'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon Material', 'multio' ),
            'param_name' => 'icon_material_design',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'material-design',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'material_design',
            ),
            'description' => esc_html__( 'Select icon from library.', 'multio' ),
            'group' => esc_html__('Icon', 'multio'),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon FontAwesome', 'multio' ),
            'param_name' => 'icon_fontawesome',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'fontawesome',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome',
            ),
            'description' => esc_html__( 'Select icon from library.', 'multio' ),
            'group' => esc_html__('Icon', 'multio'),
        ),  
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Flaticon', 'multio' ),
            'param_name' => 'icon_flaticon',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'flaticon',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'flaticon',
            ),
            'description' => esc_html__( 'Select icon from library.', 'multio' ),
            'group' => esc_html__('Icon', 'multio'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'multio'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Icon', 'multio'),
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

class WPBakeryShortCode_ct_contact_info extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>