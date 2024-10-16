<?php
vc_map(array(
    'name' => 'Row Background Animation',
    'base' => 'ct_row_background_animation',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Row Background Animation Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Background Image', 'multio' ),
            'param_name' => 'image_animation',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
        ),
    )
));

class WPBakeryShortCode_ct_row_background_animation extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>