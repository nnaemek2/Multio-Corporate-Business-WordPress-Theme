<?php
$args = array(
    'name' => 'Services Carousel',
    'base' => 'ct_services_carousel',
    'class'    => 'ct-icon-element',
    'description' => esc_html__( 'Services Displayed', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        /* Template */
        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_services_carousel',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'group' => esc_html__('Template', 'multio'),
            'std' => 'ct_services_carousel.php'
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
            'heading' => esc_html__( 'Services Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel.php',
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
                    'type' => 'textfield',
                    'heading' =>esc_html__('Sub Title', 'multio'),
                    'param_name' => 'sub_title',

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
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'multio'),
                    'param_name' => 'item_link',
                    'value' => '',
                ),
                
            ),
        ),

        /* Layout 2 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Services Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item_l2',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout2.php',
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
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'multio'),
                    'param_name' => 'item_link',
                    'value' => '',
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Item Background Image', 'multio' ),
                    'param_name' => 'bg_image_l2',
                    'value' => '',
                    'description' => esc_html__( 'Select icon from media library.', 'multio' ),
                ),
                
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Item Hover Style', 'multio'),
            'param_name' => 'hover_style',
            'value' => array(
                'Readmore' => 'hover-readmore',
                'Line Top' => 'hover-line-top',
                'Line + Readmore' => 'hover-line-readmore',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout2.php',
                )
            ),
        ),

        /* Layout 3 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Services Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item_l3',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout3.php',
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
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image Background Hover', 'multio' ),
                    'param_name' => 'bg_image',
                    'value' => '',
                    'description' => esc_html__( 'Select image background hover from media library.', 'multio' ),
                ),
            ),
        ),

        /* Layout 4 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Services Item', 'multio' ),
            'value' => '',
            'param_name' => 'service_item_l4',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout4.php',
                    'ct_services_carousel--layout5.php',
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
                    'type' => 'vc_link',
                    'class' => '',
                    'heading' => esc_html__('Link', 'multio'),
                    'param_name' => 'item_link',
                    'value' => '',
                ),
                
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Carousel Row', 'multio'),
            'param_name' => 'display_row',
            'value' => array(
                'One' => '',
                'Two' => 'two',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout4.php',
                )
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Item Hover Style', 'multio'),
            'param_name' => 'hover_style_l3',
            'value' => array(
                'Style 1' => 'hover-style1',
                'Style 2' => 'style-construction',
                'Style 3' => 'hover-style3',
                'Style 4' => 'hover-style4',
            ),
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout3.php',
                )
            ),
        ),

        /* Layout 6 */
        array(
            'type' => 'param_group',
            'heading' => esc_html__( 'Services Item', 'multio' ),
            'value' => '',
            'param_name' => 'testimonial_item_l6',
            'dependency' => array(
                'element'=>'cms_template',
                'value'=>array(
                    'ct_services_carousel--layout6.php',
                )
            ),
            'params' => array(
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__( 'Image', 'multio' ),
                    'param_name' => 'image',
                    'value' => '',
                    'description' => esc_html__( 'Select image from media library.', 'multio' ),
                ),
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

    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_services_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>