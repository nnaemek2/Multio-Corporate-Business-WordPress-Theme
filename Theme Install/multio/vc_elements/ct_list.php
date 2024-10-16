<?php
vc_map(array(
    'name' => 'List',
    'base' => 'ct_list',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'List Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Content', 'multio'),
            'param_name' => 'description_list',
            'description' => 'Enter description.',
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'multio'),
            'param_name' => 'description_color',
            'value' => '',
        ),

        /* Icon */
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Type', 'multio'),
            'param_name' => 'icon_type',
            'value' => array(
                'Icon' => 'icon',
                'Image' => 'image',
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Icon Image', 'multio' ),
            'param_name' => 'icon_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
            'dependency' => array(
                'element'=>'icon_type',
                'value'=>array(
                    'image',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Icon Library', 'multio' ),
            'value' => array(
                esc_html__( 'Font Awesome', 'multio' ) => 'fontawesome',
                esc_html__( 'Font Awesome 5', 'multio' ) => 'fontawesome5',
                esc_html__( 'Material Design', 'multio' ) => 'material_design',
                esc_html__( 'Flaticon', 'multio' ) => 'flaticon',
                esc_html__( 'ET Line', 'multio' ) => 'etline',
            ),
            'param_name' => 'icon_list',
            'description' => esc_html__( 'Select icon library.', 'multio' ),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
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
        ),  
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon FontAwesome 5', 'multio' ),
            'param_name' => 'icon_fontawesome5',
            'value' => '',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'awesome5',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome5',
            ),
            'description' => esc_html__( 'Select icon from library.', 'multio' ),
        ),  

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Weight', 'multio'),
            'param_name' => 'icon_weight',
            'value' => array(
                'Solid' => '',
                'Regular' => 'icon-far',
                'Light' => 'icon-fal',
                'Brands' => 'icon-fab',
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'fontawesome5',
            ),
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
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon ET Line', 'multio' ),
            'param_name' => 'icon_etline',
            'settings' => array(
                'emptyIcon' => true,
                'type' => 'etline',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'icon_list',
                'value' => 'etline',
            ),
            'description' => esc_html__( 'Select icon from library.', 'multio' ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'multio'),
            'param_name' => 'icon_color',
            'value' => '',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon Font Size', 'multio'),
            'param_name' => 'icon_font_size',
            'description' => 'Enter number.',
            'dependency' => array(
                'element' => 'icon_type',
                'value' => 'icon',
            ),
            'edit_field_class' => 'vc_col-sm-6 vc_column',
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

class WPBakeryShortCode_ct_list extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>