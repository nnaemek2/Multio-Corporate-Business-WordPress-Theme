<?php
/**
 * Helper functions for the theme
 *
 * @package Multio
 */

/**
 * Get Post List 
*/
if(!function_exists('multio_list_post')){
    function multio_list_post($post_type = 'post', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type,'posts_per_page' => '-1'));
        foreach($posts as $post){
            $post_list[$post->post_name] = $post->post_title;
        }
        return $post_list;
    }
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function multio_get_opt( $opt_id, $default = false ) {
	$opt_name = multio_get_opt_name();
	if ( empty( $opt_name ) ) {
		return $default;
	}

	global ${$opt_name};
	if ( ! isset( ${$opt_name} ) || ! isset( ${$opt_name}[ $opt_id ] ) ) {
		$options = get_option( $opt_name );
	} else {
		$options = ${$opt_name};
	}
	if ( ! isset( $options ) || ! isset( $options[ $opt_id ] ) || $options[ $opt_id ] === '' ) {
		return $default;
	}
	if ( is_array( $options[ $opt_id ] ) && is_array( $default ) ) {
		foreach ( $options[ $opt_id ] as $key => $value ) {
			if ( isset( $default[ $key ] ) && $value === '' ) {
				$options[ $opt_id ][ $key ] = $default[ $key ];
			}
		}
	}

	return $options[ $opt_id ];
}

/**
 * Get theme option based on its id.
 *
 * @param  string $opt_id Required. the option id.
 * @param  mixed $default Optional. Default if the option is not found or not yet saved.
 *                         If not set, false will be used
 *
 * @return mixed
 */
function multio_get_page_opt( $opt_id, $default = false ) {
	$page_opt_name = multio_get_page_opt_name();
	if ( empty( $page_opt_name ) ) {
		return $default;
	}
	$id = get_the_ID();
	if ( ! is_archive() && is_home() ) {
		if ( ! is_front_page() ) {
			$page_for_posts = get_option( 'page_for_posts' );
			$id             = $page_for_posts;
		}
	}

	return $options = ! empty($id) ? get_post_meta( intval( $id ), $opt_id, true ) : $default;
}

/**
 *
 * Get post format values.
 *
 * @param $post_format_key
 * @param bool $default
 *
 * @return bool|mixed
 */
function multio_get_post_format_value( $post_format_key, $default = false ) {
	global $post;

	return $value = ! empty( $post->ID ) ? get_post_meta( $post->ID, $post_format_key, true ) : $default;
}


/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function multio_get_opt_name() {
	return apply_filters( 'multio_opt_name', 'cms_theme_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function multio_get_page_opt_name() {
	return apply_filters( 'multio_page_opt_name', 'cms_page_options' );
}

/**
 * Get opt_name for Redux Framework options instance args and for
 * getting option value.
 *
 * @return string
 */
function multio_get_post_opt_name() {
	return apply_filters( 'multio_post_opt_name', 'multio_post_options' );
}

/**
 * Get page title and description.
 *
 * @return array Contains 'title'
 */
function multio_get_page_titles() {
	$title = '';

	// Default titles
	if ( ! is_archive() ) {
		// Posts page view
		if ( is_home() ) {
			// Only available if posts page is set.
			if ( ! is_front_page() && $page_for_posts = get_option( 'page_for_posts' ) ) {
				$title = get_post_meta( $page_for_posts, 'custom_title', true );
				if ( empty( $title ) ) {
					$title = get_the_title( $page_for_posts );
				}
			}
			if ( is_front_page() ) {
				$title = esc_html__( 'Blog', 'multio' );
			}
		} // Single page view
        elseif ( is_page() ) {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		} elseif ( is_404() ) {
			$title = esc_html__( 'Error', 'multio' ).' '.'<cite>Page</cite>';
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results', 'multio' );
		} else {
			$title = get_post_meta( get_the_ID(), 'custom_title', true );
			if ( ! $title ) {
				$title = get_the_title();
			}
		}
	} elseif ( is_author() ) {
		$title = esc_html__( 'Author:', 'multio' ) . ' ' . get_the_author();
	} // Author
	else {
		$title = get_the_archive_title();
		if( (class_exists( 'WooCommerce' ) && is_shop()) ) {
			$title = esc_html__( 'Shop', 'multio' );
		}
	}

	return array(
		'title' => $title,
	);
}

/**
 * Generates an excerpt from the post content with custom length.
 * Default length is 55 words, same as default the_excerpt()
 *
 * The excerpt words amount will be 55 words and if the amount is greater than
 * that, then the string '&hellip;' will be appended to the excerpt. If the string
 * is less than 55 words, then the content will be returned as it is.
 *
 * @param int $length Optional. Custom excerpt length, default to 55.
 * @param int|WP_Post $post Optional. You will need to provide post id or post object if used outside loops.
 *
 * @return string           The excerpt with custom length.
 */
function multio_get_the_excerpt( $length = 55, $post = null ) {
	$post = get_post( $post );

	if ( empty( $post ) || 0 >= $length ) {
		return '';
	}

	if ( post_password_required( $post ) ) {
		return esc_html__( 'Post password required.', 'multio' );
	}

	$content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
	$content = str_replace( ']]>', ']]&gt;', $content );

	$excerpt_more = apply_filters( 'multio_excerpt_more', '&hellip;' );
	$excerpt      = wp_trim_words( $content, $length, $excerpt_more );

	return $excerpt;
}


/**
 * Check if provided color string is valid color.
 * Only supports 'transparent', HEX, RGB, RGBA.
 *
 * @param  string $color
 *
 * @return boolean
 */
function multio_is_valid_color( $color ) {
	$color = preg_replace( "/\s+/m", '', $color );

	if ( $color === 'transparent' ) {
		return true;
	}

	if ( '' == $color ) {
		return false;
	}

	// Hex format
	if ( preg_match( "/(?:^#[a-fA-F0-9]{6}$)|(?:^#[a-fA-F0-9]{3}$)/", $color ) ) {
		return true;
	}

	// rgb or rgba format
	if ( preg_match( "/(?:^rgba\(\d+\,\d+\,\d+\,(?:\d*(?:\.\d+)?)\)$)|(?:^rgb\(\d+\,\d+\,\d+\)$)/", $color ) ) {
		preg_match_all( "/\d+\.*\d*/", $color, $matches );
		if ( empty( $matches ) || empty( $matches[0] ) ) {
			return false;
		}

		$red   = empty( $matches[0][0] ) ? $matches[0][0] : 0;
		$green = empty( $matches[0][1] ) ? $matches[0][1] : 0;
		$blue  = empty( $matches[0][2] ) ? $matches[0][2] : 0;
		$alpha = empty( $matches[0][3] ) ? $matches[0][3] : 1;

		if ( $red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255 || $alpha < 0 || $alpha > 1.0 ) {
			return false;
		}
	} else {
		return false;
	}

	return true;
}

/**
 * Minify css
 *
 * @param  string $css
 *
 * @return string
 */
function multio_css_minifier( $css ) {
	// Normalize whitespace
	$css = preg_replace( '/\s+/', ' ', $css );
	// Remove spaces before and after comment
	$css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
	// Remove comment blocks, everything between /* and */, unless
	// preserved with /*! ... */ or /** ... */
	$css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
	// Remove ; before }
	$css = preg_replace( '/;(?=\s*})/', '', $css );
	// Remove space after , : ; { } */ >
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
	// Remove space before , ; { } ( ) >
	$css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
	// Strips leading 0 on decimal values (converts 0.5px into .5px)
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
	// Strips units if value is 0 (converts 0px to 0)
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
	// Converts all zeros value into short-hand
	$css = preg_replace( '/0 0 0 0/', '0', $css );
	// Shortern 6-character hex color codes to 3-character where possible
	$css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

	return trim( $css );
}

/**
 * Header Tracking Code to wp_head hook.
 */
function multio_header_code() {
	$site_header_code = multio_get_opt( 'site_header_code' );
	if ( $site_header_code !== '' ) {
		print wp_kses( $site_header_code, wp_kses_allowed_html() );
	}
}

add_action( 'wp_head', 'multio_header_code' );

/**
 * Footer Tracking Code to wp_footer hook.
 */
function multio_footer_code() {
	$site_footer_code = multio_get_opt( 'site_footer_code' );
	if ( $site_footer_code !== '' ) {
		print wp_kses( $site_footer_code, wp_kses_allowed_html() );
	}
}

add_action( 'wp_footer', 'multio_footer_code' );

/**
 * Custom Comment List
 */
function multio_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
                <div class="comment-inner clearfix">
                    <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 90); ?>
                    <div class="comment-content">
                        <h4 class="comment-title"><?php printf('%s', get_comment_author_link()); ?></h4>
                        <span class="comment-date">
                            <?php
                            echo get_comment_date() . ' - ' . get_comment_time();
                            ?>
                        </span>
                        <div class="comment-text"><?php comment_text(); ?></div>
                        <div class="comment-reply">
                            <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <div class="line-comment"></div>
                    </div>
                </div>
            <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif;
}


add_filter( 'cms_extra_post_types', 'multio_add_posttype' );
function multio_add_posttype( $postypes ) {
	$portfolio_slug = multio_get_opt( 'portfolio_slug', 'portfolio' );
	$portfolio_name = multio_get_opt( 'portfolio_name', esc_attr__('Portfolio', 'multio') );
	$postypes['portfolio'] = array(
		'status' => true,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug
 		 	),
		),
	);
	
	$postypes['footer'] = array(
		'status'     => true,
		'item_name'  => esc_html__( 'Footers', 'multio' ),
		'items_name' => esc_html__( 'Footers', 'multio' ),
		'args'       => array(
			'menu_icon'          => 'dashicons-editor-insertmore',
			'supports'           => array(
				'title',
				'editor',
			),
			'public'             => true,
			'publicly_queryable' => true,
		),
		'labels'     => array()
	);
	
	return $postypes;
}

add_action( 'cms_taxonomy_meta_register', 'multio_taxonomy_portfolio' );
function multio_taxonomy_portfolio( $taxonomy ) {
	$portfolio_category = array(
		'opt_name'     => 'portfolio-category',
		'display_name' => esc_html__( 'Settings', 'multio' ),
	);

	if ( ! $taxonomy->isset_args( 'portfolio-category' ) ) {
		$taxonomy->set_args( 'portfolio-category', $portfolio_category );
	}

}

add_filter( 'cms_extra_taxonomies', 'multio_add_tax' );
function multio_add_tax( $taxonomies ) {

	$tax_portfolio_slug = multio_get_opt( 'tax_portfolio_slug', 'portfolio-category' );
	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => esc_html__( 'Portfolio Category', 'multio' ),
		'taxonomies' => esc_html__( 'Portfolio Categories', 'multio' ),
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $tax_portfolio_slug
 		 	),
		),
		'labels'     => array()
	);

	return $taxonomies;
}

add_filter( 'cms_enable_megamenu', 'multio_enable_megamenu' );
function multio_enable_megamenu() {
	return false;
}
add_filter( 'cms_enable_onepage', 'multio_enable_onepage' );
function multio_enable_onepage() {
	return true;
}

/* Add default pagram Carousel */
function multio_get_param_carousel( $atts ) {
	if (is_rtl()) {
	    $carousel_rtl = 'true';
	} else {
	    $carousel_rtl = 'false';
	}

	$default  = array(
		'col_xs'           => '1',
		'col_sm'           => '2',
		'col_md'           => '3',
		'col_lg'           => '4',
		'col_xl'           => '4',
		'margin'           => '30',
		'margin_md'           => '30',
		'loop'             => 'false',
		'autoplay'         => 'false',
		'autoplay_timeout' => '5000',
		'smart_speed'      => '250',
		'center'           => 'false',
		'stage_padding'    => '0',
		'stage_padding_xl'    => '0',
		'stage_padding_lg'    => '0',
		'arrows'           => 'false',
		'bullets'          => 'false',
	);
	$new_data = array_merge( $default, $atts );
	extract( $new_data );
	$carousel      = array(
		'data-item-xs' => $col_xs,
		'data-item-sm' => $col_sm,
		'data-item-md' => $col_md,
		'data-item-lg' => $col_lg,
		'data-item-xl' => $col_xl,

		'data-margin'          => $margin,
		'data-margin-md'          => $margin_md,
		'data-loop'            => $loop,
		'data-autoplay'        => $autoplay,
		'data-autoplaytimeout' => $autoplay_timeout,
		'data-smartspeed'      => $smart_speed,
		'data-center'          => $center,
		'data-arrows'          => $arrows,
		'data-bullets'         => $bullets,
		'data-stagepadding'    => $stage_padding,
		'data-stagepadding-xl'    => $stage_padding_xl,
		'data-stagepadding-lg'    => $stage_padding_lg,
		'data-rtl'             => $carousel_rtl,
	);
	$carousel_data = '';
	foreach ( $carousel as $key => $value ) {
		if ( isset( $value ) ) {
			$carousel_data .= $key . '=' . $value . ' ';
		}
	}
	$new_data['carousel_data'] = $carousel_data;

	return $new_data;
}

function multio_add_vc_extra_param( $old_param ) {
	$extra_param         = array(
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns XS", 'multio' ),
			"param_name"       => "col_xs",
			"edit_field_class" => "ct-col-5",
			"value"            => array( 1, 2, 3, 4 ),
			"std"              => 1,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns SM", 'multio' ),
			"param_name"       => "col_sm",
			"edit_field_class" => "ct-col-5",
			"value"            => array( 1, 2, 3, 4 ),
			"std"              => 2,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns MD", 'multio' ),
			"param_name"       => "col_md",
			"edit_field_class" => "ct-col-5",
			"value"            => array( 1, 2, 3, 4, 5 ),
			"std"              => 3,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns LG", 'multio' ),
			"param_name"       => "col_lg",
			"edit_field_class" => "ct-col-5",
			"value"            => array( 1, 2, 3, 4, 5, 6 ),
			"std"              => 4,
			"group"            => 'Carousel Settings',
		),
		array(
			"type"             => "dropdown",
			"heading"          => esc_html__( "Columns XL", 'multio' ),
			"param_name"       => "col_xl",
			"edit_field_class" => "ct-col-5",
			"value"            => array( 1, 2, 3, 4, 5, 6 ),
			"std"              => 4,
			"group"            => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Margin Items LG', 'multio' ),
			'param_name'  => 'margin',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 30 )',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Margin Items MD', 'multio' ),
			'param_name'  => 'margin_md',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 30 )',
			"edit_field_class" => "vc_col-sm-6 vc_column",
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Loop Items", 'multio' ),
			"param_name" => "loop",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Autoplay", 'multio' ),
			"param_name" => "autoplay",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Autoplay Timeout', 'multio' ),
			'param_name'  => 'autoplay_timeout',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 5000 )',
			'dependency'  => array(
				'element' => 'autoplay',
				'value'   => 'true',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Smart Speed', 'multio' ),
			'param_name'  => 'smart_speed',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 250 )',
			'dependency'  => array(
				'element' => 'autoplay',
				'value'   => 'true',
			),
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Center", 'multio' ),
			"param_name" => "center",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Stage Padding XXL', 'multio' ),
			'param_name'  => 'stage_padding',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 0 )',
			'dependency'  => array(
				'element' => 'center',
				'value'   => 'true',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Stage Padding XL', 'multio' ),
			'param_name'  => 'stage_padding_xl',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 0 )',
			'dependency'  => array(
				'element' => 'center',
				'value'   => 'true',
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Stage Padding LG', 'multio' ),
			'param_name'  => 'stage_padding_lg',
			'value'       => '',
			'group'       => 'Carousel Settings',
			'description' => 'Enter number: ...( Default 0 )',
			'dependency'  => array(
				'element' => 'center',
				'value'   => 'true',
			),
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Show Arrows", 'multio' ),
			"param_name" => "arrows",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
		array(
			"type"       => "dropdown",
			"heading"    => esc_html__( "Show Bullets", 'multio' ),
			"param_name" => "bullets",
			"value"      => array(
				"No"  => "false",
				"Yes" => "true",
			),
			"group"      => 'Carousel Settings',
		),
	);
	$old_param['params'] = array_merge( $old_param['params'], $extra_param );

	return $old_param;
}

/* Show/hide CMS Carousel */
add_filter( 'enable_cms_carousel', 'multio_enable_cms_carousel' );
function multio_enable_cms_carousel() {
	return false;
}

/*
 * Set post views count using post meta
 */
function multio_set_post_views( $postID ) {
	$countKey = 'post_views_count';
	$count    = get_post_meta( $postID, $countKey, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $countKey );
		add_post_meta( $postID, $countKey, '0' );
	} else {
		$count ++;
		update_post_meta( $postID, $countKey, $count );
	}
}

function multio_build_shortcode_rev_slider()
{
    if (class_exists('RevSlider')) {

        $slider = new RevSlider();
        $arrSliders = $slider->getArrSliders();

        $revsliders = array(''=>'');
        if ($arrSliders) {
            foreach ($arrSliders as $slider) {
                /* @var $slider RevSlider */
                $revsliders[$slider->getAlias()] = $slider->getTitle();
            }
        } else {
            $revsliders[esc_attr__('No sliders found', 'multio')] = 0;
        }
    return $revsliders;
    }
}

/* Get counter post for filter grid */
function multio_get_post_count_of_term_filter($posts, $post_type, $term_id, $tax)
{
    $post_of_term = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => $post_type,
            'tax_query' => array(
                array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array(intval($term_id)),
                    'operator' => 'IN',
                ),
            ),
            'fields' => 'ids'
        )
    );
    $p_count = 0;
    foreach ($posts as $post) {
        if (in_array($post->ID, $post_of_term)) {
            $p_count++;
        }
    }
    return $p_count;
}

/* Create Demo Data */
add_filter('ct_ie_export_mode', 'multio_enable_export_mode');
function multio_enable_export_mode()
{
    return false;
}
/* Dashboard Theme */
add_filter('cms_documentation_link',function(){
     return 'http://casethemes.net/docs/multio/';
});

add_filter('cms_ticket_link', 'multio_add_cms_ticket_link');
function multio_add_cms_ticket_link($url)
{
    $url = array('type' => 'url', 'link' => 'https://casethemes.ticksy.com/');
    return $url;
}
add_filter('cms_video_tutorial_link',function(){
     return 'https://www.youtube.com/watch?v=qVdoAObHaC0';
});