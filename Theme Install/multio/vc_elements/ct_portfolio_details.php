<?php
vc_map(
    array(
        'name'     => esc_html__('Portfolio Details', 'multio'),
        'base'     => 'ct_portfolio_details',
        'class'    => 'ct-icon-element',
        'description' => esc_html__( 'Portfolio Details Displayed', 'multio' ),
        'category' => esc_html__('CaseThemes Shortcodes', 'multio'),
        'params'   => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Client:', 'multio'),
                'param_name' => 'portfolio_client',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Date:', 'multio'),
                'param_name' => 'portfolio_date',
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Website:', 'multio'),
                'param_name' => 'portfolio_website',
            ),
        )
    )
);

class WPBakeryShortCode_ct_portfolio_details extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>