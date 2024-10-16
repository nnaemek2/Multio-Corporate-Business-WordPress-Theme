<?php
$term_list = cms_get_grid_term_list('post');
vc_map(
    array(
        'name'     => esc_html__('Blog Grid', 'multio'),
        'base'     => 'ct_blog_grid',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Posts in masonry grid', 'multio' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
        'params'   => array(
            array(
                'type' => 'cms_template_img',
                'param_name' => 'cms_template',
                'shortcode' => 'ct_blog_grid',
                'heading' => esc_html__('Shortcode Template', 'multio'),
                'admin_label' => true,
                'std' => 'ct_blog_grid.php',
                'group' => esc_html__('Template', 'multio'),
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
                    'values'   => cms_get_type_posts_data('post')
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
                'description' => esc_html__('Set max limit for items in grid. Enter number only', 'multio'),
            ),
            array(
                'type' => 'textfield',
                'heading' => __( 'Image size', 'multio' ),
                'param_name' => 'img_size',
                'value' => '',
                'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'multio' ),
                'group'      => esc_html__('Grid Settings', 'multio'),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Layout Type', 'multio'),
                'param_name' => 'layout',
                'value'      => array(
                    'Basic'   => 'basic',
                    'Masonry' => 'masonry',
                ),
                'group'      => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Filter on Masonry', 'multio'),
                'param_name' => 'filter',
                'value'      => array(
                    'Enable'  => 'true',
                    'Disable' => 'false'
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Pagination Type', 'multio'),
                'param_name' => 'pagination_type',
                'value'      => array(
                    'Pagination'  => 'pagination',
                    'Loadmore' => 'loadmore',
                    'Disable' => 'false',
                ),
                'dependency' => array(
                    'element' => 'layout',
                    'value'   => 'masonry'
                ),
                'group'      => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Default Title', 'multio'),
                'param_name' => 'filter_default_title',
                'value'      => 'All',
                'group'      => esc_html__('Filter', 'multio'),
                'description' => esc_html__('Enter default title for filter option display, empty: All', 'multio'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),
            array(
                'type'       => 'dropdown',
                'heading'    => esc_html__('Alignment', 'multio'),
                'param_name' => 'filter_alignment',
                'value'      => array(
                    'Center'   => 'center',
                    'Left'   => 'left',
                    'Right'   => 'right',
                ),
                'description' => esc_html__('Select filter alignment.', 'multio'),
                'group'      => esc_html__('Filter', 'multio'),
                'dependency' => array(
                    'element' => 'filter',
                    'value'   => 'true'
                ),
            ),

            array(
                'type'       => 'textfield',
                'heading'    => esc_html__('Item Gap', 'multio'),
                'param_name' => 'gap',
                'value'      => '30',
                'group'      => esc_html__('Grid Settings', 'multio'),
                'description' => esc_html__('Select gap between grid elements. Enter number only', 'multio'),
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XS', 'multio'),
                'param_name'       => 'col_xs',
                'edit_field_class' => 'vc_col-sm-1/5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 1,
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns SM', 'multio'),
                'param_name'       => 'col_sm',
                'edit_field_class' => 'vc_col-sm-1/5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 2,
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns MD', 'multio'),
                'param_name'       => 'col_md',
                'edit_field_class' => 'vc_col-sm-1/5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 3,
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns LG', 'multio'),
                'param_name'       => 'col_lg',
                'edit_field_class' => 'vc_col-sm-1/5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type'             => 'dropdown',
                'heading'          => esc_html__('Columns XL', 'multio'),
                'param_name'       => 'col_xl',
                'edit_field_class' => 'vc_col-sm-1/5 vc_column',
                'value'            => array(1, 2, 3, 4, 6, 12),
                'std'              => 4,
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'multio' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
                'group'            => esc_html__('Grid Settings', 'multio')
            ),
        )
    )
);

class WPBakeryShortCode_ct_blog_grid extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        $html_id = cmsHtmlID('ct-blog-grid');
        $atts['html_id'] = $html_id;
        return parent::content($atts, $content);
    }
}

?>