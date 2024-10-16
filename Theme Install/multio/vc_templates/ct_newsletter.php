<?php
extract(shortcode_atts(array(
    'form' => '',
    'description' => '',
    'button_label' => 'Subscribe',
    'email_label' => 'Enter Your Email',
    'animation'   => '',
    'el_class'   => '',
    'style'   => 'style1',
), $atts));
$animation_tmp = isset($animation) ? $animation : '';
$animation_classes = $this->getCSSAnimation( $animation_tmp );
$defined_forms = array( 'form_1', 'form_2', 'form_3', 'form_4', 'form_5', 'form_6', 'form_7', 'form_8', 'form_9', 'form_10' );
if(class_exists('Newsletter')) { ?>
    <div class="ct-newsletter ct-newsletter-layout1 <?php echo esc_attr( $style.' '.$el_class.' '.$animation_classes ); ?>">
        <div class="ct-newsletter-inner">
            <?php
            if ( in_array( $form, $defined_forms ) ) {
                $form = str_replace( 'form_', '', $form );
                echo do_shortcode( '[newsletter_form form="' . esc_attr( $form ) . '"]' );
            } else {
                echo do_shortcode( '[newsletter_form button_label="'.$button_label.'"][newsletter_field name="email" label="'.$email_label.'"][/newsletter_form]' );
            } ?>
            <?php if(!empty($description)) : ?>
                <div class="ct-newsletter-desc"><?php echo esc_attr($description); ?></div>
            <?php endif; ?>
        </div>
    </div>
<?php } ?>