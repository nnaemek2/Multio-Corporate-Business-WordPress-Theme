<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $newsletter_forms = array(
        'default' => esc_html__( 'Default Form', 'multio' )
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $newsletter_forms[ $key ] = sprintf( esc_html__( 'Form %s', 'multio' ), $index );
            $index ++;
        }
    }
} else {
    $newsletter_forms = '';
}

$opt_name = multio_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('CaseThemeCore') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'multio'),
    'page_title'           => esc_html__('Theme Options', 'multio'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('CaseThemeCore') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => class_exists('CaseThemeCore') ? casethemescore()->path('APP_DIR') . '/templates/redux/' : '',
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'multio'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'multio'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'multio'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'multio'),
            'options'  => array(
                'style1'  => esc_html__('Style 1', 'multio'),
                'style2'  => esc_html__('Style 2', 'multio'),
                'style3'  => esc_html__('Style 3', 'multio'),
                'style4'  => esc_html__('Style 4', 'multio'),
                'style5'  => esc_html__('Style 5', 'multio'),
                'style6'  => esc_html__('Style 6', 'multio'),
                'style7'  => esc_html__('Style 7', 'multio'),
                'style8'  => esc_html__('Style 8', 'multio'),
                'style9'  => esc_html__('Style 9', 'multio'),
                'style10'  => esc_html__('Style 10', 'multio'),
                'style11'  => esc_html__('Style 11', 'multio'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'smoothscroll',
            'type'     => 'switch',
            'title'    => esc_html__('Smooth Scroll', 'multio'),
            'default'  => false
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__('Body Boxed Background', 'multio'),
            'required' => array( 0 => 'layout_boxed', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'multio'),
            'description' => 'no minimize , generate css over time...',
            'default'  => false
        ),
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'multio'),
            'default' => ''
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'multio'),
    'icon'   => 'el-icon-website',
    'fields' => array(
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Layout', 'multio'),
            'subtitle' => esc_html__('Select a layout for header.', 'multio'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/assets/images/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/assets/images/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/assets/images/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/assets/images/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/assets/images/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/assets/images/header-layout/h6.jpg',
                '7' => get_template_directory_uri() . '/assets/images/header-layout/h7.jpg',
                '8' => get_template_directory_uri() . '/assets/images/header-layout/h8.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'search_on',
            'type'     => 'switch',
            'title'    => esc_html__('Icon Search', 'multio'),
            'default'  => false
        ),
        array(
            'id'       => 'cart_on',
            'type'     => 'switch',
            'title'    => esc_html__('Icon Cart', 'multio'),
            'default'  => false
        ),
        array(
            'id'       => 'hidden_sidebar_on',
            'type'     => 'switch',
            'title'    => esc_html__('Icon Hidden Sidebar', 'multio'),
            'default'  => false,
            'required' => array( 0 => 'header_layout', 1 => 'equals', 2 => '5' ),
            'force_output' => true
        ),
        array(
            'id'       => 'lang_on',
            'type'     => 'switch',
            'title'    => esc_html__('Language Selector', 'multio'),
            'default'  => false,
            'subtitle' => esc_html__('Support for WPML plugin. Apply header layout 2, 6', 'multio'),
        ),
        array(
            'id'       => 'sticky_on',
            'type'     => 'switch',
            'title'    => esc_html__('Sticky Header', 'multio'),
            'subtitle' => esc_html__('Header will be sticked when applicable.', 'multio'),
            'default'  => false
        ),
        array(
            'id'       => 'lang_on',
            'type'     => 'switch',
            'title'    => esc_html__('Language Selector', 'multio'),
            'default'  => false,
            'subtitle' => esc_html__('Support for WPML plugin. Apply header layout 2, 6', 'multio'),
        ),
        array(
            'id'       => 'top_bar_h3',
            'type'     => 'switch',
            'title'    => esc_html__('Top Bar', 'multio'),
            'default'  => false,
            'subtitle' => esc_html__('Apply header layout 3. Show Menu left and Social right position.', 'multio'),
            'required' => array( 0 => 'header_layout', 1 => 'equals', 2 => '3' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Top Bar', 'multio'),
    'icon'       => 'el el-resize-vertical',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'topbar_email_label',
            'type'     => 'text',
            'title'    => esc_html__('Email Label', 'multio'),
            'desc'     => 'Enter email label.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_email',
            'type'     => 'text',
            'title'    => esc_html__('Email', 'multio'),
            'desc'     => 'Enter email.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_phone_label',
            'type'     => 'text',
            'title'    => esc_html__('Phone Label', 'multio'),
            'desc'     => 'Enter phone label.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_phone',
            'type'     => 'text',
            'title'    => esc_html__('Phone', 'multio'),
            'desc'     => 'Enter phone.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_address_label',
            'type'     => 'text',
            'title'    => esc_html__('Address Label', 'multio'),
            'desc'     => 'Enter address label.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_address',
            'type'     => 'text',
            'title'    => esc_html__('Address', 'multio'),
            'desc'     => 'Enter address.',
            'default'  => '',
        ),
        array(
            'id'       => 'topbar_time',
            'type'     => 'text',
            'title'    => esc_html__('Time', 'multio'),
            'desc'     => 'Enter time.',
            'default'  => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Logo', 'multio'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo',
            'type'     => 'media',
            'title'    => esc_html__('Logo Dark', 'multio'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_light',
            'type'     => 'media',
            'title'    => esc_html__('Logo Light', 'multio'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-light.png'
            )
        ),
        array(
            'id'       => 'logo_sticky',
            'type'     => 'media',
            'title'    => esc_html__('Logo Sticky', 'multio'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-sticky.png'
            )
        ),
        array(
            'id'       => 'logo_mobile',
            'type'     => 'media',
            'title'    => esc_html__('Logo Mobile', 'multio'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo-dark.png'
            )
        ),
        array(
            'id'       => 'logo_maxh',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height (Desktop)', 'multio'),
            'subtitle' => esc_html__('Default: 40px;', 'multio'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_sticky',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height - Sticky (Desktop)', 'multio'),
            'subtitle' => esc_html__('Default: 40px;', 'multio'),
            'width'    => false,
            'unit'     => 'px'
        ),
        array(
            'id'       => 'logo_maxh_md',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max height (Mobile)', 'multio'),
            'subtitle' => esc_html__('Default: 40px;', 'multio'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Navigation', 'multio'),
    'icon'       => 'el el-lines',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'font_menu',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Google Font', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'font-style'  => false,
            'font-weight'  => true,
            'text-align'  => false,
            'font-size'  => false,
            'line-height'  => false,
            'color'  => false,
            'output'      => array('.primary-menu li a'),
            'units'       => 'px',
        ),
        array(
            'id'       => 'menu_font_size',
            'type'     => 'text',
            'title'    => esc_html__('Font Size', 'multio'),
            'validate' => 'numeric',
            'desc'     => 'Enter number',
            'msg'      => 'Please enter number',
            'default'  => ''
        ),
        array(
            'id'       => 'menu_text_transform',
            'type'     => 'select',
            'title'    => esc_html__('Text Transform', 'multio'),
            'options'  => array(
                ''  => esc_html__('Capitalize', 'multio'),
                'uppercase' => esc_html__('Uppercase', 'multio'),
                'lowercase'  => esc_html__('Lowercase', 'multio'),
                'initial'  => esc_html__('Initial', 'multio'),
                'inherit'  => esc_html__('Inherit', 'multio'),
                'none'  => esc_html__('None', 'multio'),
            ),
            'default'  => ''
        ),
        array(
            'id'      => 'main_menu_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'multio'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
        array(
            'id'       => 'main_menu_divider',
            'type'     => 'button_set',
            'title'    => esc_html__('Menu Divider', 'multio'),
            'options'  => array(
                'divider-style1'  => esc_html__('Divider 1', 'multio'),
                'divider-style2'  => esc_html__('Divider 2', 'multio')
            ),
            'default'  => 'divider-style1',
        ),
        
        array(
            'title' => esc_html__('Button Navigation', 'multio'),
            'type'  => 'section',
            'id' => 'button_navigation',
            'indent' => true,
        ),
        array(
            'id' => 'h_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'multio'),
            'default' => '',
        ),
        array(
            'id'       => 'h_btn_link_type',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Link Type', 'multio'),
            'options'  => array(
                'page'  => esc_html__('Page', 'multio'),
                'custom'  => esc_html__('Custom', 'multio')
            ),
            'default'  => 'page',
        ),
        array(
            'id'    => 'h_btn_link',
            'type'  => 'select',
            'title' => esc_html__( 'Page Link', 'multio' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'page' ),
            'force_output' => true
        ),
        array(
            'id' => 'h_btn_link_custom',
            'type' => 'text',
            'title' => esc_html__('Custom Link', 'multio'),
            'default' => '',
            'required' => array( 0 => 'h_btn_link_type', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
        array(
            'id'       => 'h_btn_target',
            'type'     => 'button_set',
            'title'    => esc_html__('Button Target', 'multio'),
            'options'  => array(
                '_self'  => esc_html__('Self', 'multio'),
                '_blank'  => esc_html__('Blank', 'multio')
            ),
            'default'  => '_self',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Sticky', 'multio'),
    'icon'       => 'el el-circle-arrow-down',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'header_bgcolor_sticky',
            'type'        => 'color',
            'title'       => esc_html__('Background Color', 'multio'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'main_menu_color_sticky',
            'type'    => 'link_color',
            'title'   => esc_html__('Menu Item Color', 'multio'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'   => '',
            ),
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Mobile', 'multio'),
    'icon'       => 'el el-iphone-home',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'mobile_header_bgcolor',
            'type'        => 'color',
            'title'       => esc_html__('Mobile Background Color', 'multio'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'mobile_icon_menu_color',
            'type'        => 'color',
            'title'       => esc_html__('Mobile Icon Menu Color', 'multio'),
            'transparent' => false,
            'default'     => ''
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'multio'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(
        array(
            'id'       => 'ptitle_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Displayed', 'multio'),
            'options'  => array(
                'show'  => esc_html__('Show', 'multio'),
                'hidden'  => esc_html__('Hidden', 'multio'),
            ),
            'default'  => 'show'
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'multio'),
            'subtitle' => esc_html__('Page title background.', 'multio'),
            'output'   => array('#pagetitle'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'pagetitle_bg_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Background Color Overlay', 'multio'),
            'output' => array('background-color' => '#pagetitle.bg-overlay:before'),
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_color',
            'type'     => 'color',
            'title'    => esc_html__('Title Color', 'multio'),
            'subtitle' => esc_html__('Page title color.', 'multio'),
            'output'   => array('#pagetitle h1.page-title'),
            'default'  => '',
            'transparent' => false,
            'required' => array( 0 => 'ptitle_on', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'multio'),
            'options'  => array(
                'show'  => esc_html__('Show', 'multio'),
                'hidden'  => esc_html__('Hidden', 'multio'),
            ),
            'default'  => 'show',
        ),
        array(
            'id'             => 'ptitle_content_padding',
            'type'           => 'spacing',
            'output'         => array('#pagetitle.page-title'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Padding', 'multio'),
            'desc'           => esc_html__('Default: Top-206px, Bottom-100px', 'multio'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'multio'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'multio'),
            'desc'           => esc_html__('Default: Top-75px, Bottom-100px', 'multio'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'multio'),
            'default' => '',
            'desc'           => esc_html__('Default: Search Keywords...', 'multio'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Blog Archive', 'multio'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'btn_text_readmore',
            'type'    => 'text',
            'title'   => esc_html__('Readmore Button Text', 'multio'),
            'default' => '',
            'desc'           => esc_html__('Default: Read more', 'multio'),
        ),
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'multio'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'multio'),
            'options'  => array(
                'left'  => esc_html__('Left', 'multio'),
                'right' => esc_html__('Right', 'multio'),
                'none'  => esc_html__('Disabled', 'multio')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'multio'),
            'subtitle' => esc_html__('Show author name on each post.', 'multio'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'multio'),
            'subtitle' => esc_html__('Show date posted on each post.', 'multio'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'multio'),
            'subtitle' => esc_html__('Show category names on each post.', 'multio'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_comments_on',
            'title'    => esc_html__('Comments', 'multio'),
            'subtitle' => esc_html__('Show comments count on each post.', 'multio'),
            'type'     => 'switch',
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'multio'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'multio'),
            'subtitle' => esc_html__('Select a sidebar position', 'multio'),
            'options'  => array(
                'left'  => esc_html__('Left', 'multio'),
                'right' => esc_html__('Right', 'multio'),
                'none'  => esc_html__('Disabled', 'multio')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_text_align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Align', 'multio'),
            'options'  => array(
                'inherit'  => esc_html__('Inherit', 'multio'),
                'justify'  => esc_html__('Justify', 'multio'),
            ),
            'default'  => 'inherit'
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'multio'),
            'subtitle' => esc_html__('Show author name on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'multio'),
            'subtitle' => esc_html__('Show date on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'multio'),
            'subtitle' => esc_html__('Show category names on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'multio'),
            'subtitle' => esc_html__('Show tags count on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_comments_on',
            'title'    => esc_html__('Comments', 'multio'),
            'subtitle' => esc_html__('Show comments count on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'multio'),
            'subtitle' => esc_html__('Show social share on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_comments_form_on',
            'title'    => esc_html__('Comments Form', 'multio'),
            'subtitle' => esc_html__('Show comments form on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_feature_image_on',
            'title'    => esc_html__('Feature Image', 'multio'),
            'subtitle' => esc_html__('Show feature image on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_related_post',
            'title'    => esc_html__('Related', 'multio'),
            'subtitle' => esc_html__('Show related on single post.', 'multio'),
            'type'     => 'switch',
            'default'  => false
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Portfolio', 'multio'),
    'icon'       => 'el el-briefcase',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'multio'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'multio'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
        ),
        array(
            'id'      => 'tax_portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Categories Slug', 'multio'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'multio'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'footer_layout',
            'type'     => 'button_set',
            'title'    => esc_html__('Layout', 'multio'),
            'subtitle' => esc_html__('Select a layout for upper footer area.', 'multio'),
            'options'  => array(
                '1'  => esc_html__('Default', 'multio'),
                'custom'  => esc_html__('Custom', 'multio'),
            ),
            'default'  => '1'
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
            'id'       => 'footer_fixed',
            'type'     => 'switch',
            'title'    => esc_html__('Footer Fixed', 'multio'),
            'default'  => false,
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'multio'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'multio'),
            'default'  => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Top', 'multio'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'footer_top_column',
            'type'     => 'button_set',
            'title'    => esc_html__('Footer Top Columns', 'multio'),
            'options'  => array(
                '1'  => esc_html__('1 Column', 'multio'),
                '2'  => esc_html__('2 Column', 'multio'),
                '3'  => esc_html__('3 Column', 'multio'),
                '4'  => esc_html__('4 Column', 'multio'),
            ),
            'default'  => '4',
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'footer_top_bg',
            'type'     => 'background',
            'title'    => esc_html__('Footer Top Background', 'multio'),
            'output'   => array('.footer-layout1 .top-footer'),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
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
            'id'    => 'footer_top_wg_color',
            'type'  => 'color',
            'title' => esc_html__('Widget Title Color', 'multio'),
            'output'   => array('body .site-footer .top-footer .footer-widget-title'),
            'transparent' => false,
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true,
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Footer Bottom', 'multio'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'=>'footer_copyright',
            'type' => 'textarea',
            'title' => esc_html__('Copyright', 'multio'),
            'validate' => 'html_custom',
            'default' => '',
            'subtitle' => esc_html__('Custom HTML Allowed: a,br,em,strong,span,p,div,h1->h6', 'multio'),
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                    'class' => array(),
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'span' => array(),
                'p' => array(),
                'div' => array(
                    'class' => array()
                ),
                'h1' => array(
                    'class' => array()
                ),
                'h2' => array(
                    'class' => array()
                ),
                'h3' => array(
                    'class' => array()
                ),
                'h4' => array(
                    'class' => array()
                ),
                'h5' => array(
                    'class' => array()
                ),
                'h6' => array(
                    'class' => array()
                ),
                'ul' => array(
                    'class' => array()
                ),
                'li' => array(),
            ),
            'required' => array( 0 => 'footer_layout', 1 => 'equals', 2 => '1' ),
            'force_output' => true
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
            'output'   => array('body .site-footer .bottom-footer, .site-footer .bottom-footer .bottom-social label'),
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
));


/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'multio'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'multio'),
            'transparent' => false,
            'default'     => '#fe2b5b'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'multio'),
            'transparent' => false,
            'default'     => '#191514'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'multio'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => __('Link Colors', 'multio'),
            'default' => array(
                'regular' => '#fe2b5b',
                'hover'   => '#b51937',
                'active'  => '#b51937'
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'el_color',
            'type'        => 'color',
            'title'       => esc_html__('Element Color', 'multio'),
            'transparent' => false,
            'default'     => '#191514'
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::get_option($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'multio'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'multio'),
            'options'  => array(
                'Muli'  => esc_html__('Default', 'multio'),
                'Google-Font'  => esc_html__('Google Font', 'multio'),
            ),
            'default'  => 'Muli',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'multio'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'body_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Color', 'multio'),
            'transparent' => false,
            'default'     => '',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true,
            'output'      => array('body, .single-hentry.archive .entry-content, .single-post .content-area, .ct-related-post .item-holder .item-content'),
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'multio'),
            'options'  => array(
                'Poppins'  => esc_html__('Default', 'multio'),
                'Google-Font'  => esc_html__('Google Font', 'multio'),
            ),
            'default'  => 'Poppins',
        ),
        array(
            'id'          => 'heading_color',
            'type'        => 'color',
            'title'       => esc_html__('Heading Color', 'multio'),
            'transparent' => false,
            'default'     => '',
            'force_output' => true,
            'output'      => array('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6'),
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'multio'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'multio'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'multio'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'multio'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'multio'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'multio'),
            'validate' => 'no_html'
        )
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'multio'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'multio'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'multio'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'multio'),
                    'right' => esc_html__('Right', 'multio'),
                    'none'  => esc_html__('Disabled', 'multio')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'multio'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'multio'),
                'default' => 12,
                'min'  => 6,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
            array(
                'id'       => 'shop_content_padding',
                'type'     => 'spacing',
                'title'    => esc_html__('Content Paddings', 'multio'),
                'subtitle' => esc_html__('Content paddings.', 'multio'),
                'mode'     => 'padding',
                'units'    => array('em', 'px', '%'),
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
                'left'     => false,
                'output'   => array('.woocommerce #content, .woocommerce-page #content'),
                'default'  => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                    'units'  => 'px',
                )
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Social Link
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Social Link', 'multio'),
    'icon'   => 'el el-share',
    'fields' => array(

        array(
            'id'      => 'social_label',
            'type'    => 'text',
            'title'   => esc_html__('Social Label', 'multio'),
            'default' => '',
        ),

        array(
            'id'      => 'social_facebook_url',
            'type'    => 'text',
            'title'   => esc_html__('Facebook URL', 'multio'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_twitter_url',
            'type'    => 'text',
            'title'   => esc_html__('Twitter URL', 'multio'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_inkedin_url',
            'type'    => 'text',
            'title'   => esc_html__('Inkedin URL', 'multio'),
            'default' => '#',
        ),
        array(
            'id'      => 'social_instagram_url',
            'type'    => 'text',
            'title'   => esc_html__('Instagram URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_google_url',
            'type'    => 'text',
            'title'   => esc_html__('Google URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_skype_url',
            'type'    => 'text',
            'title'   => esc_html__('Skype URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_pinterest_url',
            'type'    => 'text',
            'title'   => esc_html__('Pinterest URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_vimeo_url',
            'type'    => 'text',
            'title'   => esc_html__('Vimeo URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_youtube_url',
            'type'    => 'text',
            'title'   => esc_html__('Youtube URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_yelp_url',
            'type'    => 'text',
            'title'   => esc_html__('Yelp URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tumblr_url',
            'type'    => 'text',
            'title'   => esc_html__('Tumblr URL', 'multio'),
            'default' => '',
        ),
        array(
            'id'      => 'social_tripadvisor_url',
            'type'    => 'text',
            'title'   => esc_html__('Tripadvisor URL', 'multio'),
            'default' => '',
        ),
    )
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'multio'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(

        array(
            'id'       => 'description_404_page',
            'type'     => 'textarea',
            'title'    => esc_html__('Description', 'multio'),
            'default' => '',
        ),
        array(
            'id'       => 'btn_text_404_page',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'multio'),
            'default' => '',
        ),
    ),
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'multio'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'multio'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'multio'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'multio'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'multio'),
        ),

    ),
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'multio'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'multio')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'multio'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'multio'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));