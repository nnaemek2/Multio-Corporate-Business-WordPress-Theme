<?php
vc_map(array(
    'name' => 'Video Player',
    'base' => 'ct_video_player',
    'class'    => 'ct-icon-element',
    'description' => 'Embed Youtube/Vimeo player',
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_video_player',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'std' => 'ct_video_player.php',
            'group' => esc_html__('Template', 'multio'),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Video Text', 'multio' ),
            'param_name' => 'video_text',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout3.php',
                )
            ),
        ),

        array(
            'type' => 'vc_link',
            'heading' => esc_html__( 'Video Url', 'multio' ),
            'param_name' => 'video_link',
            'value' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
            'description' => 'Video url on Youtube, Vimeo'
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Video Intro', 'multio' ),
            'param_name' => 'video_intro',
            'value' => '',
            'description' => esc_html__( 'Select intro image from media library.', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player.php',
                    'ct_video_player--layout2.php',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Video Button Styles', 'multio'),
            'param_name' => 'btn_styles',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
                'Style 4' => 'style4',
                'Style 5' => 'style5',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player.php',
                )
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Intro Styles', 'multio'),
            'param_name' => 'intro_styles',
            'value' => array(
                'Style 1' => 'style1',
                'Style 2' => 'style2',
                'Style 3' => 'style3',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player.php',
                )
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Intro Size Crop', 'multio' ),
            'param_name' => 'intro_size',
            'value' => '',
            'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player.php',
                )
            ),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Video Background', 'multio' ),
            'param_name' => 'video_bg',
            'value' => '',
            'description' => esc_html__( 'Select image background from media library.', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout2.php',
                )
            ),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Intro Image 1', 'multio' ),
            'param_name' => 'l4_intro1',
            'value' => '',
            'description' => esc_html__( 'Select intro image from media library, size: 395x515', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout4.php',
                )
            ),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Intro Image 2', 'multio' ),
            'param_name' => 'l4_intro2',
            'value' => '',
            'description' => esc_html__( 'Select intro image from media library, size: 230x234', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout4.php',
                )
            ),
        ),

        array(
            'type' => 'attach_image',
            'heading' => esc_html__( 'Box Icon', 'multio' ),
            'param_name' => 'l4_box_icon',
            'value' => '',
            'description' => esc_html__( 'Select box icon from media library, size: 230x234', 'multio' ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout4.php',
                )
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Box Text', 'multio' ),
            'param_name' => 'l4_box_text',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_video_player--layout4.php',
                )
            ),
        ),

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

class WPBakeryShortCode_ct_video_player extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>