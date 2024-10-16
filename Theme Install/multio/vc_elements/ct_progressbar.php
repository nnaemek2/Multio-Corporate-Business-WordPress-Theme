<?php
vc_map(
	array(
		'name' => esc_html__('Progress Bar', 'multio'),
	    'base' => 'ct_progressbar',
	    'class'    => 'ct-icon-element',
	    'description' => esc_html__( 'Progress Bar Displayed', 'multio' ),
	    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
	    'params' => array(
	    
	        array(
	            'type' => 'param_group',
	            'heading' => esc_html__( 'Progress Bar Lists', 'multio' ),
	            'param_name' => 'ct_progressbar_list',
	            'value' => '',
	            'params' => array(
	                array(
			            'type' => 'textfield',
			            'heading' => esc_html__('Item Title', 'multio'),
			            'param_name' => 'item_title',
			            'value' => '',
			            'group' => esc_html__('Progress Bar Settings', 'multio'),
			            'admin_label' => true,
			        ),
					array(
						'type' => 'textfield',
						'class' => '',
						'value' => '',
						'heading' => esc_html__( 'Value', 'multio' ),
						'param_name' => 'value',
						'description' => 'Enter number only 1 to 100',
						'group' => esc_html__('Progress Bar Settings', 'multio'),
						'admin_label' => true,
					),
	            ),
	        ),
	        array(
	            'type' => 'colorpicker',
	            'heading' => esc_html__('Title Color', 'multio'),
	            'param_name' => 'title_color',
	            'value' => '',
	        ),
	        array(
	            'type' => 'colorpicker',
	            'heading' => esc_html__('Value Color', 'multio'),
	            'param_name' => 'value_color',
	            'value' => '',
	        ),
	        array(
	            'type' => 'colorpicker',
	            'heading' => esc_html__('Progress Background Color', 'multio'),
	            'param_name' => 'bg_color',
	            'value' => '',
	        ),
	        array(
	            'type' => 'textfield',
	            'heading' => esc_html__('Extra Class', 'multio'),
	            'param_name' => 'el_class',
	            'value' => '',
	            'group' => esc_html__('Extra', 'multio')
	        ),
	    )
	)
);
class WPBakeryShortCode_ct_progressbar extends CmsShortCode{
	protected function content($atts, $content = null){
		/* CSS */
	    wp_enqueue_style('progressbar', get_template_directory_uri() . '/assets/css/progressbar.min.css', array(), '0.7.1');
	    /* JS */
	    wp_enqueue_script('progressbar', get_template_directory_uri() . '/assets/js/progressbar.min.js', array( 'jquery' ), '0.7.1', true);
	    wp_enqueue_script('ct-progressbar', get_template_directory_uri() . '/assets/js/progressbar.ct.js', array( 'jquery' ), 'all', true);
	    wp_enqueue_script('waypoints');
		return parent::content($atts, $content);
	}
}

?>