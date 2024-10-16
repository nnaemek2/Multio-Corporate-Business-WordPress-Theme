<?php
	vc_map( array(
		"name"                    => 'Tab Section',
		"base"                    => "ct_tab_section",
		'class'    => 'ct-icon-element',
	    'description' => esc_html__( 'Tab Section Displayed', 'multio' ),
	    'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
		"as_parent"               => array( 'except' => 'ct_tab_section' ),
		"content_element"         => true,
		"js_view"                 => 'VcColumnView',
		"show_settings_on_create" => true,
		"params"                  => array(
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( "Icon Image", "multio" ),
				'param_name' => 'icon_image',
				'value'      => ''
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( "Icon Image Hover", "multio" ),
				'param_name' => 'icon_image_hover',
				'value'      => '',
			),
			array(
	            'type' => 'textfield',
	            'heading' => esc_html__( 'Title', 'multio' ),
	            'param_name' => 'title',
	        ),
		)
	) );
	
	class WPBakeryShortCode_ct_tab_section extends WPBakeryShortCodesContainer {
		
		protected function content( $atts, $content = null ) {
			return parent::content( $atts, $content );
		}
	}
