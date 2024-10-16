<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  multio_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function multio_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'multio')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function multio_page_options_register( $metabox ) {
	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'multio' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => multio_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'multio' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_audio' ) ) {
		$metabox->set_args( 'cms_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'multio' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_link' ) ) {
		$metabox->set_args( 'cms_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'multio' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_quote' ) ) {
		$metabox->set_args( 'cms_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'multio' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_video' ) ) {
		$metabox->set_args( 'cms_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'multio' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'cms_pf_gallery' ) ) {
		$metabox->set_args( 'cms_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'multio' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if (!$metabox->isset_args('product')) {
        $metabox->set_args('product', array(
            'opt_name'            => multio_get_page_opt_name(),
            'display_name'        => esc_html__('Product Settings', 'multio'),
            'show_options_object' => false,
        ), array(
            'context'  => 'advanced',
            'priority' => 'default'
        ));
    }

    /* Extra Post Type */


	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'General', 'multio' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'multio' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'multio' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'multio'),
	                'right' => esc_html__('Right', 'multio'),
	                'none'  => esc_html__('Disabled', 'multio')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
			array(
				'id'       => 'url_video',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Url Video ( Youtube, Vimeo...)', 'multio' ),
				'validate' => 'no_html'
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'multio' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'multio' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Header', 'multio' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'header_layout',
				'type'         => 'image_select',
				'title'        => esc_html__( 'Layout', 'multio' ),
				'subtitle'     => esc_html__( 'Select a layout for header.', 'multio' ),
				'options'      => array(
					'0' => get_template_directory_uri() . '/assets/images/header-layout/h0.jpg',
					'1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
					'2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
					'3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
					'4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
					'5' => get_template_directory_uri() . '/assets/images/header-layout/h5.jpg',
					'6' => get_template_directory_uri() . '/assets/images/header-layout/h6.jpg',
					'7' => get_template_directory_uri() . '/assets/images/header-layout/h7.jpg',
					'8' => get_template_directory_uri() . '/assets/images/header-layout/h8.jpg',
				),
				'default'      => multio_get_option_of_theme_options( 'header_layout' ),
				'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
			),
			array(
                'id'       => 'h_custom_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Menu', 'multio' ),
                'subtitle' => esc_html__( 'Custom menu for current page.', 'multio' ),
                'options'  => multio_get_nav_menu(),
                'default' => '',
                'required' => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
                'force_output' => true
            ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'multio' ),
		'icon'   => 'el-icon-map-marker',
		'fields' => array(
			array(
	            'id'       => 'ptitle_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Displayed', 'multio'),
	            'options'  => array(
	                'themeoption'  => esc_html__('Theme Option', 'multio'),
	                'show'  => esc_html__('Show', 'multio'),
	                'hidden'  => esc_html__('Hidden', 'multio'),
	            ),
	            'default'  => 'themeoption'
	        ),
	        array(
				'id'           => 'custom_title',
				'type'         => 'text',
				'title'        => esc_html__( 'Title', 'multio' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'multio' ),
			),
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Background', 'multio'),
	            'subtitle' => esc_html__('Page title background.', 'multio'),
	            'output'   => array('body #pagetitle'),
	            'background-color'   => false,
	            'background-position'   => false,
	            'background-attachment'   => false,
	            'background-repeat'   => false,
	            'background-size'   => false,
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'multio' ),
		'desc'   => esc_html__( 'Settings for content area.', 'multio' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'multio' ),
				'subtitle' => esc_html__( 'Content background color.', 'multio' ),
				'output'   => array( 'background-color' => '#content, .site-layout-default .site-footer:before' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'multio' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'multio' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'multio' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'multio' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'multio' ),
					'right' => esc_html__( 'Right', 'multio' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
			array(
	            'id'      => 'body_custom_class',
	            'type'    => 'text',
	            'title'   => esc_html__('Body Custom Class', 'multio'),
	            'default' => '',
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'multio' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'multio' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Footer', 'multio' ),
				'default' => false,
				'indent'  => true
			),
			array(
	            'id'       => 'footer_layout',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Layout', 'multio'),
	            'subtitle' => esc_html__('Select a layout for upper footer area.', 'multio'),
	            'options'  => array(
	                '1'  => esc_html__('Default', 'multio'),
	                'custom'  => esc_html__('Custom', 'multio'),
	            ),
	            'default'  => '1',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'          => 'footer_layout_custom',
	            'type'        => 'select',
	            'title'       => esc_html__('Custom Layout', 'multio'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','multio'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
	            'options'     => multio_list_post('footer'),
	            'default'     => '',
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => 'custom' ),
	            'force_output' => true
	        ),
	        array(
	            'title' => esc_html__('Footer Top', 'multio'),
	            'type'  => 'section',
	            'id' => 'page_footer_top',
	            'indent' => true,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'       => 'footer_top_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Background', 'multio'),
	            'output'   => array('.footer-layout1 .top-footer'),
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'       => 'footer_bg_image_on',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Background Images', 'multio'),
	            'options'  => array(
	                ''  => esc_html__('Default', 'multio'),
	                'bg-hide'  => esc_html__('Hide', 'multio'),
	            ),
	            'default'  => '',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'    => 'footer_top_color',
	            'type'  => 'color',
	            'title' => esc_html__('Text Color', 'multio'),
	            'output'   => array('body .site-footer .top-footer'),
	            'transparent' => false,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'      => 'footer_top_link_color',
	            'type'    => 'link_color',
	            'title'   => esc_html__('Links Color', 'multio'),
	            'regular' => true,
	            'hover'   => true,
	            'active'  => false,
	            'visited' => false,
	            'output'  => array('body .site-footer .top-footer a, .site-footer .top-footer ul.menu li a, .site-footer .top-footer .widget_pages ul li a, .site-footer .top-footer .widget_meta ul li a, .site-footer .top-footer .widget_categories ul li a, .site-footer .top-footer .widget_archive ul li a'),
	            'transparent' => false,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'          => 'footer_wg_font',
	            'type'        => 'typography',
	            'title'       => esc_html__('Widget Title Font', 'multio'),
	            'google'      => true,
	            'font-backup' => true,
	            'all_styles'  => true,
	            'font-style'  => false,
	            'font-weight'  => true,
	            'text-align'  => false,
	            'font-size'  => false,
	            'line-height'  => false,
	            'color'  => false,
	            'output'      => array('.site-footer .top-footer .footer-widget-title'),
	            'units'       => 'px',
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'title' => esc_html__('Footer Bottom', 'multio'),
	            'type'  => 'section',
	            'id' => 'page_footer_bottom',
	            'indent' => true,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'       => 'footer_bottom_bg',
	            'type'     => 'background',
	            'title'    => esc_html__('Background Color', 'multio'),
	            'subtitle' => esc_html__('Footer bottom background color.', 'multio'),
	            'default'  => '',
	            'output'   => array('.site-footer .bottom-footer'),
	            'background-repeat' => false,
	            'background-attachment' => false,
	            'background-position' => false,
	            'background-image' => false,
	            'background-clip' => false,
	            'background-origin' => false,
	            'background-size' => false,
	            'transparent' => false,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'    => 'footer_bottom_color',
	            'type'  => 'color',
	            'title' => esc_html__('Text Color', 'multio'),
	            'output'   => array('body .site-footer .bottom-footer'),
	            'transparent' => false,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'      => 'footer_bottom_link_color',
	            'type'    => 'link_color',
	            'title'   => esc_html__('Links Color', 'multio'),
	            'regular' => true,
	            'hover'   => true,
	            'active'  => false,
	            'visited' => false,
	            'output'  => array('body .site-footer .bottom-footer a, body .site-footer .bottom-footer .bottom-copyright a, .site-footer .bottom-footer .bottom-social a'),
	            'transparent' => false,
	            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
	            'force_output' => true,
	        ),
	    )
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'cms_pf_video', array(
		'title'  => esc_html__( 'Video', 'multio' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'multio' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'multio' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'multio' ),
				'desc'  => esc_html__( 'Upload video file', 'multio' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'multio' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'multio' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'multio' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'multio' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'multio' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'multio' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'multio' )
			)
		)
	) );

	$metabox->add_section( 'cms_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'multio' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'multio' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'multio' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_link', array(
		'title'  => esc_html__( 'Link', 'multio' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'multio' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'cms_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'multio' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'multio' )
			)
		)
	) );

}


add_action( 'cms_post_metabox_register', 'multio_page_options_register' );

function multio_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( multio_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}