<?php
/**
 * Newsletter form for VC
 * Require Newsletter plugin to be installed
 */

if(class_exists('Newsletter')) {
    $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

    $forms_list = array(
        esc_html__( 'Default Form', 'multio' ) => 'default'
    );

    if ( $forms )
    {
        $index = 1;
        foreach ( $forms as $key => $form )
        {
            $forms_list[ sprintf( esc_html__( 'Form %s', 'multio' ), $index ) ] = $key;
            $index ++;
        }
    }

    vc_map(array(
        "name" => 'Newsletter',
        "base" => "ct_newsletter",
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Newsletter Form', 'multio' ),
        "category" => esc_html__('CaseThemes Shortcodes', 'multio'),
        "params" => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Newsletter Form', 'multio' ),
                'description' => esc_html__( 'Pick default or custom forms from Newsletter Plugin.', 'multio' ),
                'value'       => $forms_list,
                'admin_label' => true,
                'param_name'  => 'form'
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Newsletter Description', 'multio' ),
                'param_name' => 'description',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Email Label', 'multio' ),
                'param_name' => 'email_label',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Button Label', 'multio' ),
                'param_name' => 'button_label',
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style', 'multio'),
                'param_name' => 'style',
                'value' => array(
                    'Style 1' => 'style1',
                    'Style 2' => 'style2',
                ),
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", 'multio' ),
                "param_name" => "el_class",
                "description" => esc_html__( "Style particular content element differently - add a class name and refer to it in Custom CSS.", 'multio' ),
                'group' => esc_html__('Extra', 'multio'),
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

    class WPBakeryShortCode_ct_newsletter extends CmsShortCode
    {

        protected function content($atts, $content = null)
        {
            return parent::content($atts, $content);
        }
    }
} ?>