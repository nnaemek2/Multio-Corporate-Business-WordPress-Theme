<?php
$args = array(
    'name' => 'Showcase Carousel',
    'base' => 'ct_showcase_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Showcase Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Showcase Item', 'multio' ),
            'value' => '',
            'param_name' => 'showcase_item',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Title', 'multio'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea',
                    'heading' => esc_html__('Content', 'multio'),
                    'param_name' => 'content',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'multio' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'multio' ),
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'multio'),
                    'param_name' => 'item_link',
                    'value' => '',
                ),
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
        ),

    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_showcase_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>