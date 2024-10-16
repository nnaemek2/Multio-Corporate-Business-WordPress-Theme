<?php
vc_map(array(
    'name' => 'Process',
    'base' => 'ct_process',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Process Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Process Lists', 'multio' ),
            'param_name' => 'ct_process_list',
            'value' => '',
            'params' => array(
                /* Title */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Title', 'multio'),
                    'param_name' => 'title',
                    'description' => 'Enter title.',
                    'admin_label' => true,
                ),

                /* Description */
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Description', 'multio'),
                    'param_name' => 'description',
                    'description' => 'Enter description.',
                ),

                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Button Text', 'multio' ),
                    'param_name' => 'button_text',
                    'value' => '',
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Button Link', 'multio'),
                    'param_name' => 'button_link',
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
                
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title Color', 'multio'),
            'param_name' => 'title_color',
            'value' => '',
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Description Color', 'multio'),
            'param_name' => 'description_color',
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

class WPBakeryShortCode_ct_process extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>