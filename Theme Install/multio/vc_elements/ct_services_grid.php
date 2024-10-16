<?php
vc_map(
    array(
        'name'     => esc_html__('Services Grid', 'multio'),
        'base'     => 'ct_services_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Service Displayed', 'multio' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_services_grid',
                'heading' => esc_html__('Shortcode Template', 'multio'),
                'admin_label' => true,
                'std' => 'ct_services_grid.php',
                'group' => esc_html__('Template', 'multio'),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'multio' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
                'group'            => esc_html__('Template', 'multio')
            ),

            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Content', 'multio' ),
                'param_name' => 'content_list',
                'description' => esc_html__( 'Enter values for team item', 'multio' ),
                'value' => '',
                'group' => esc_html__('Source Settings', 'multio'),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Title', 'multio'),
                        'param_name' => 'title',
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', 'multio'),
                        'param_name' => 'description',
                        'description' => 'Enter description.',
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Icon', 'multio' ),
                        'param_name' => 'icon',
                        'value' => '',
                        'description' => esc_html__( 'Select icon from media library.', 'multio' ),
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__( 'Icon Hover', 'multio' ),
                        'param_name' => 'icon_hover',
                        'value' => '',
                        'description' => esc_html__( 'Select icon hover from media library.', 'multio' ),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' =>esc_html__('Button Text', 'multio'),
                        'param_name' => 'button_text',
                    ),
                    array(
                        'type' => 'vc_link',
                        'class' => '',
                        'heading' => esc_html__('Link', 'multio'),
                        'param_name' => 'button_link',
                        'value' => '',
                    ),
                ),
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns XS", 'multio' ),
                "param_name"       => "col_xs",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4 ),
                "std"              => 1,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns SM", 'multio' ),
                "param_name"       => "col_sm",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4 ),
                "std"              => 2,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns MD", 'multio' ),
                "param_name"       => "col_md",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5 ),
                "std"              => 3,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns LG", 'multio' ),
                "param_name"       => "col_lg",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5, 6 ),
                "std"              => 4,
                "group"            => 'Column Settings',
            ),
            array(
                "type"             => "dropdown",
                "heading"          => esc_html__( "Columns XL", 'multio' ),
                "param_name"       => "col_xl",
                "edit_field_class" => "ct-col-5",
                "value"            => array( 1, 2, 3, 4, 5, 6 ),
                "std"              => 4,
                "group"            => 'Column Settings',
            ),
        )
    )
);

class WPBakeryShortCode_ct_services_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-grid-service');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>