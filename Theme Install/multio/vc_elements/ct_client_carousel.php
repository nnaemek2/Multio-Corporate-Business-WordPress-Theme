<?php
$args = array(
    'name' => 'Client Carousel',
    'base' => 'ct_client_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Clients Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Client Item', 'multio' ),
            'value' => '',
            'param_name' => 'client_item',
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'multio' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'multio' ),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'vc_link',
                    'heading' => esc_html__( 'Link', 'multio' ),
                    'param_name' => 'link',
                    'value' => '',
                    'admin_label' => true,
                ),
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Styles', 'multio'),
            'param_name' => 'styles',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
            ),
        ),

    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_client_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>