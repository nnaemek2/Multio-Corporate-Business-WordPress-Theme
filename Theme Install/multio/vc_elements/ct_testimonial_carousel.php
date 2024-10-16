<?php
$args = array(
    'name' => 'Testimonial Carousel',
    'base' => 'ct_testimonial_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Testimonial Carousel Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_testimonial_carousel',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'group' => esc_html__('Template', 'multio'),
            'std' => 'ct_testimonial_carousel.php'
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
            'group'            => esc_html__('Template', 'multio')
        ),
        /* Layout 1 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel.php',
                )
            ),
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
                    'type' => 'dropdown',
                    'heading' => esc_html__('Rating', 'multio'),
                    'param_name' => 'rating',
                    'value' => array(
                        '5 Star' => 'star5',
                        '4 Star' => 'star4',
                        '3 Star' => 'star3',
                        '2 Star' => 'star2',
                        '1 Star' => 'star1',
                    ),
                ),
            ),
        ),

        /* Layout 2 */
        array(
            'type' => 'textfield',
            'heading' =>esc_html__('Element Sub Title', 'multio'),
            'param_name' => 'el_sub_title',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout4.php',
                )
            ),
        ),
        array(
            'type' => 'textarea',
            'heading' =>esc_html__('Element Title', 'multio'),
            'param_name' => 'el_title',
            'admin_label' => true,
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout4.php',
                )
            ),
        ),
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item_l2',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout2.php',
                    'ct_testimonial_carousel--layout3.php',
                    'ct_testimonial_carousel--layout4.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Title', 'multio'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'multio'),
                    'param_name' => 'position',
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
            ),
        ),

        /* Layout 5 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Testimonial Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item_l5',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_testimonial_carousel--layout5.php',
                    'ct_testimonial_carousel--layout6.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' =>esc_html__('Title', 'multio'),
                    'param_name' => 'title',
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textfield',
                    'heading' =>esc_html__('Position', 'multio'),
                    'param_name' => 'position',
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
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Social Icon', 'multio' ),
                    'param_name' => 'icon_fontawesome4',
                    'value' => '',
                    'settings' => array(
                        'emptyIcon' => true,
                        'type' => 'fontawesome',
                        'iconsPerPage' => 200,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'multio' ),
                ),
                array(
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Socail Link', 'multio'),
                    'param_name' => 'social_link',
                    'value' => '',
                ),
            ),
        ),

    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_testimonial_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>