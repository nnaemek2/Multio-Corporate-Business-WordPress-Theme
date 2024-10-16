<?php
vc_map(array(
    'name' => 'Fancy Box',
    'base' => 'ct_fancybox',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Fancy Box Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_fancybox',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'std' => 'ct_fancybox.php',
            'group' => esc_html__('Template', 'multio'),
        ),

        /* Title */
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Number', 'multio' ),
            'param_name' => 'title_number',
            'group' => esc_html__('Title', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox--layout3.php',
                )
            ),
        ),
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
            'heading' => esc_html__('Title Color', 'multio'),
            'param_name' => 'title_color',
            'value' => '',
            'group' => esc_html__('Title', 'multio'),
            'edit_field_class' => 'vc_col-sm-4 vc_column',
        ),

        /* Description */

        array(
            'type' => 'textarea',
            'heading' => esc_html__('Description', 'multio'),
            'param_name' => 'description',
            'description' => 'Enter description.',
            'group' => esc_html__('Description', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                    'ct_fancybox--layout2.php',
                    'ct_fancybox--layout3.php',
                )
            ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text Color', 'multio'),
            'param_name' => 'description_color',
            'value' => '',
            'group' => esc_html__('Description', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                    'ct_fancybox--layout2.php',
                    'ct_fancybox--layout3.php',
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
                    'ct_fancybox.php',
                    'ct_fancybox--layout2.php',
                    'ct_fancybox--layout3.php',
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
            'type' => 'attach_image',
            'heading' => esc_html__( 'Icon Image Hover', 'multio' ),
            'param_name' => 'icon_image_hover',
            'value' => '',
            'description' => esc_html__( 'Apply layout 2.', 'multio' ),
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
                esc_html__( 'Font Awesome 4', 'multio' ) => 'fontawesome',
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
            'heading' => esc_html__( 'Icon FontAwesome 4', 'multio' ),
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
            'group' => esc_html__('Icon', 'multio'),
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
            'group' => esc_html__('Icon', 'multio'),
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
            'type' => 'vc_link',
            'heading' => __ ( 'Link', 'multio' ),
            'param_name' => 'link_item',
            'value' => '',
            'group' => esc_html__('Link', 'multio'),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_fancybox.php',
                    'ct_fancybox--layout2.php',
                )
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

class WPBakeryShortCode_ct_fancybox extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>