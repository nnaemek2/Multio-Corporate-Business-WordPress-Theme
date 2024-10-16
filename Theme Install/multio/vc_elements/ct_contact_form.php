<?php
    if(class_exists('WPCF7')) {
        $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

        $contact_forms = array();
        if ( $cf7 ) {
            foreach ( $cf7 as $cform ) {
                $contact_forms[ $cform->post_title ] = $cform->ID;
            }
        } else {
            $contact_forms[ esc_html__( 'No contact forms found', 'multio' ) ] = 0;
        }

        vc_map(array(
            'name' => 'Contact Form',
            'base' => 'ct_contact_form',
            'class'    => 'ct-icon-element',
            'description' => esc_html__( 'Contact Form 7', 'multio' ),
            'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
            'params' => array(

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Select Contact Form', 'multio' ),
                    'param_name' => 'id',
                    'value' => $contact_forms,
                    'save_always' => true,
                    'admin_label' => true,
                    'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'multio' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Styles', 'multio'),
                    'param_name' => 'styles',
                    'value' => array(
                        'Style 1' => 'style1',
                        'Style 2' => 'style2',
                        'Style 3' => 'style3',
                        'Style 4' => 'style4',
                    ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Title', 'multio'),
                    'param_name' => 'title',
                    'dependency' => array(
                        'element'=>'styles',
                        'value'=>array(
                            'style1',
                        )
                    ),
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Title Color', 'multio'),
                    'param_name' => 'title_color',
                    'value' => '',
                    'dependency' => array(
                        'element'=>'styles',
                        'value'=>array(
                            'style1',
                        )
                    ),
                ),
                /* Extra */
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'multio' ),
                    'param_name' => 'el_class',
                    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in Custom CSS.', 'multio' ),
                    'group'      => esc_html__('Extra', 'multio'),
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

        class WPBakeryShortCode_ct_contact_form extends CmsShortCode
        {

            protected function content($atts, $content = null)
            {
                return parent::content($atts, $content);
            }
        }
    }
?>