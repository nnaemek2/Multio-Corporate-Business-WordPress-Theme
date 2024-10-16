<?php
if (!function_exists('multio_font_flaticon')) :

    add_filter( 'vc_iconpicker-type-flaticon', 'multio_font_flaticon' );
    /**
    * awesome class.
    * 
    * @return string[]
    * @author CaseThemes
    */
    function multio_font_flaticon( $icons ) {
        $flaticon = array (
            array( 'flaticon-verification-mark'                   => esc_html( 'flaticon-verification-mark' ) ),
            array( 'flaticon-close'                   => esc_html( 'flaticon-close' ) ),
            array( 'flaticon-production'                   => esc_html( 'flaticon-production' ) ),
            array( 'flaticon-lightbulb'                   => esc_html( 'flaticon-lightbulb' ) ),
            array( 'flaticon-outsourcing'                   => esc_html( 'flaticon-outsourcing' ) ),
            array( 'flaticon-idea-1'                   => esc_html( 'flaticon-idea-1' ) ),
            array( 'flaticon-diamond'                   => esc_html( 'flaticon-diamond' ) ),
            array( 'flaticon-profits-1'                   => esc_html( 'flaticon-profits-1' ) ),
            array( 'flaticon-settings-1'                   => esc_html( 'flaticon-settings-1' ) ),
            array( 'flaticon-job'                   => esc_html( 'flaticon-job' ) ),
            array( 'flaticon-worker'                   => esc_html( 'flaticon-worker' ) ),
            array( 'flaticon-pie-chart'                   => esc_html( 'flaticon-pie-chart' ) ),

        );
        return array_merge( $icons, $flaticon );
    }
endif;