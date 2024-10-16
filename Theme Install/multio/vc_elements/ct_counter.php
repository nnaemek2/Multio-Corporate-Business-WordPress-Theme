<?php
vc_map(array(
    'name' => 'Counter',
    'base' => 'ct_counter',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Counter Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_counter',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'std' => 'ct_counter.php',
            'group' => esc_html__('Template', 'multio'),
        ),
        
        /* Title */
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Title', 'multio'),
            'param_name' => 'title',
            'description' => 'Enter title.',
            'group' => esc_html__('Title', 'multio'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'multio'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'multio'),
        ),

        /* Digit */
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Digit', 'multio'),
            'param_name' => 'digit',
            'description' => 'Enter digit.',
            'group' => esc_html__('Digit', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Prefix', 'multio'),
            'param_name' => 'prefix',
            'description' => 'Enter prefix.',
            'group' => esc_html__('Digit', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Suffix', 'multio'),
            'param_name' => 'suffix',
            'description' => 'Enter suffix.',
            'group' => esc_html__('Digit', 'multio'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'multio'),
            'param_name' => 'digit_color',
            'value' => '',
            'group' => esc_html__('Digit', 'multio'),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Use Grouping', 'multio'),
            'param_name' => 'grouping',
            'value' => array(
                'No' => '0',
                'Yes' => '1',
            ),
            'group' => esc_html__('Digit', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Separator', 'multio'),
            'param_name' => 'separator',
            'group' => esc_html__('Digit', 'multio'),
            'dependency' => array(
                'element'=>'grouping',
                'value'=>array(
                    '1',
                )
            ),
        ),

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'multio'),
            'param_name' => 'description',
            'description' => 'Enter description.',
            'group' => esc_html__('Description', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_counter.php',
                )
            ),
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
            'group' => esc_html__('Icon', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_counter.php',
                    'ct_counter--layout2.php',
                )
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
            'group' => esc_html__('Icon', 'multio'),
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
            'group' => esc_html__('Icon', 'multio'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon Color', 'multio'),
            'param_name' => 'icon_color',
            'value' => '',
            'group' => esc_html__('Icon', 'multio'),
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
            'group' => esc_html__('Icon', 'multio'),
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

class WPBakeryShortCode_ct_counter extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>