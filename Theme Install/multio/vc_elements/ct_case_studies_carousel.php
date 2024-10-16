<?php
$term_list = cms_get_grid_term_list('case-study');
$args = array(
    'name' => 'Case Studies Carousel',
    'base' => 'ct_case_studies_carousel',
    'class' => 'ct-icon-element',
    'description' => esc_html__( 'Case Studies in Carousel', 'multio' ),
    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
    'params' => array(

        array(
            'type' => 'cms_template_img',
            'param_name' => 'cms_template',
            'shortcode' => 'ct_case_studies_carousel',
            'heading' => esc_html__('Shortcode Template', 'multio'),
            'admin_label' => true,
            'std' => 'ct_case_studies_carousel.php',
            'group' => esc_html__('Template', 'multio'),
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Color Preset', 'multio'),
            'param_name' => 'color_preset',
            'value'      => array(
                'Preset 1'   => 'color-preset1',
                'Preset 2'   => 'color-preset2',
            ),
            'group'      => esc_html__('Template', 'multio')
        ),

        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'multio' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
            'group'            => esc_html__('Template', 'multio')
        ),
        array(
            'type'       => 'checkbox',
            'heading'    => esc_html__('Custom Source', 'multio'),
            'param_name' => 'custom_source',
            'value'      => '1',
            'description'        => 'Check here if you want custom source',
            'group'      => esc_html__('Source Settings', 'multio')
        ),
        array(
            'type'       => 'autocomplete',
            'heading'    => esc_html__('Select Categories', 'multio'),
            'param_name' => 'source',
            'description' => esc_html__('Leave blank to select all category', 'multio'),
            'settings'   => array(
                'multiple' => true,
                'values'   => $term_list['auto_complete'],
            ),
            'dependency' => array(
                'element'=>'custom_source',
                'value'=>array(
                    'true',
                )
            ),
            'group'      => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type'       => 'autocomplete',
            'class'      => '',
            'heading'    => esc_html__('Select Post Name', 'multio'),
            'param_name' => 'post_ids',
            'description' => esc_html__('Leave blank to show all post', 'multio'),
            'settings'   => array(
                'multiple' => true,
                'values'   => cms_get_type_posts_data('case-study')
            ),
            'dependency' => array(
                'element'=>'custom_source',
                'value'=>array(
                    'true',
                )
            ),
            'group'      => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Order by', 'multio'),
            'param_name' => 'orderby',
            'value'      => array(
                'Date'   => 'date',
                'ID'     => 'ID',
                'Author' => 'author',
                'Title'  => 'title',
                'Random' => 'rand',
            ),
            'std'        => 'date',
            'group'      => esc_html__('Source Settings', 'multio')
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Sort order', 'multio'),
            'param_name' => 'order',
            'value'      => array(
                'Ascending'  => 'ASC',
                'Descending' => 'DESC',
            ),
            'std'        => 'DESC',
            'group'      => esc_html__('Source Settings', 'multio')
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__('Total items', 'multio'),
            'param_name' => 'limit',
            'value'      => '6',
            'group'      => esc_html__('Source Settings', 'multio'),
            'description' => esc_html__('Set max limit for items in carousel. Enter number only', 'multio'),
        ),
        array(
            'type'       => 'textfield',
            'heading'    => esc_html__('Except Length', 'multio'),
            'param_name' => 'except_length',
            'value'      => '',
            'group'      => esc_html__('Source Settings', 'multio'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Image Size', 'multio' ),
            'param_name' => 'img_size',
            'value' => '',
            'description' => esc_html__( "Enter image size (Example: 'thumbnail', 'medium', 'large', 'full' or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).", 'multio' ),
            'group'      => esc_html__('Source Settings', 'multio')
        ),

    ));

$args = multio_add_vc_extra_param($args);
vc_map($args);

class WPBakeryShortCode_ct_case_studies_carousel extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-service-carousel');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>