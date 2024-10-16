<?php
vc_map(
    array(
        'name'     => esc_html__('Team Member', 'multio'),
        'base'     => 'ct_team_member',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Team Member Displayed', 'multio' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
        'params'   => array(

            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_team_member',
                'heading' => esc_html__('Shortcode Template', 'multio'),
                'admin_label' => true,
                'std' => 'ct_team_member.php',
                'group' => esc_html__('Template', 'multio'),
            ),
            
            /* Source Settings */
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Title', 'multio'),
                'param_name' => 'title',
                'admin_label' => true,
                'group' => esc_html__('Source Settings', 'multio'),
            ),
            array(
                'type' => 'textfield',
                'heading' =>esc_html__('Position', 'multio'),
                'param_name' => 'position',
                'group' => esc_html__('Source Settings', 'multio'),
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Image', 'multio' ),
                'param_name' => 'image',
                'value' => '',
                'description' => esc_html__( 'Select image from media library.', 'multio' ),
                'group' => esc_html__('Source Settings', 'multio'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Image size', 'multio' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).", "multio" ),
                'group'      => esc_html__('Source Settings', 'multio'),
            ),
            array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'multio'),
                    'param_name' => 'item_link',
                    'value' => '',
                    'group' => esc_html__('Source Settings', 'multio')
                ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Social', 'multio' ),
                'param_name' => 'social',
                'description' => esc_html__( 'Enter values for team item', 'multio' ),
                'value' => '',
                'group' => esc_html__('Source Settings', 'multio'),
                'params' => array(
                    array(
                        'type' => 'iconpicker',
                        'heading' => esc_html__( 'Icon', 'multio' ),
                        'param_name' => 'icon',
                        'value' => '',
                        'settings' => array(
                            'emptyIcon' => true,
                            'type' => 'fontawesome',
                            'iconsPerPage' => 200,
                        ),
                        'description' => esc_html__( 'Select icon from library.', 'multio' ),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Link', 'multio'),
                        'param_name' => 'social_link',
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
                "group" => esc_html__("Extra", 'multio'),
            ),
        )
    )
);

class WPBakeryShortCode_ct_team_member extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>