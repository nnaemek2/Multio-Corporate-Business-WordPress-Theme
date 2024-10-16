<?php
vc_map(
    array(
        'name'     => esc_html__('Icons', 'multio'),
        'base'     => 'ct_icon',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Icons Displayed', 'multio' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
        'params'   => array(

            array(
                'type' => 'param_group',
                'heading' => esc_html__( 'Icons', 'multio' ),
                'param_name' => 'icon',
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
                        'type' => 'vc_link',
                        'heading' =>esc_html__('Link', 'multio'),
                        'param_name' => 'icon_link',
                        'admin_label' => true,
                    ),
                ),
            ),

        )
    )
);

class WPBakeryShortCode_ct_icon extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>