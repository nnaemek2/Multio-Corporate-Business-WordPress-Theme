<?php
vc_map(array(
    'name' => 'Single Image',
    'base' => 'ct_single_image',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Single Image Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Title */
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Image', 'multio' ),
            'param_name' => 'single_image',
            'value' => '',
            'description' => esc_html__( 'Select icon image from media library.', 'multio' ),
        ),

        array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'multio' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'multio' ),
            ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Absolute', 'multio'),
            'param_name' => 'absolute',
            'value' => array(
                'No' => 'no',
                'Yes' => 'yes'
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Absolute Position', 'multio'),
            'param_name' => 'absolute_position',
            'value' => array(
                'Top Right' => 'top-right',
                'Bottom Right' => 'bottom-right',
                'Top Left' => 'top-left',
                'Bottom Left' => 'bottom-left',
            ),
            'dependency' => array(
                'element'=>'absolute',
                'value'=>array(
                    'yes',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Animate', 'multio'),
            'param_name' => 'animate',
            'value' => array(
                'Left to right' => 'left-to-right',
                'Right to left' => 'right-to-left'
            ),
            'dependency' => array(
                'element'=>'absolute',
                'value'=>array(
                    'no',
                )
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Animate Color 1', 'multio'),
            'param_name' => 'animate_color1',
            'value' => '',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'dependency' => array(
                'element'=>'absolute',
                'value'=>array(
                    'no',
                )
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Animate Color 2', 'multio'),
            'param_name' => 'animate_color2',
            'value' => '',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'dependency' => array(
                'element'=>'absolute',
                'value'=>array(
                    'no',
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
    )
));

class WPBakeryShortCode_ct_single_image extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>