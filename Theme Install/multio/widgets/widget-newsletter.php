<?php
class Newsletter_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'newsletter_widget',
            esc_html__('* Newsletter', 'multio'),
            array('description' => esc_html__('Newsletter Widget', 'multio'),)
        );
    }

    function widget($args, $instance) {

        extract($args);

        $title = isset($instance['title']) ? (!empty($instance['title']) ? $instance['title']: '') : '';
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $introduction = isset($instance['introduction']) ? (!empty($instance['introduction']) ? $instance['introduction']: '') : '';
        $email_label = isset($instance['email_label']) ? (!empty($instance['email_label']) ? $instance['email_label']: '') : '';
        $button_label = isset($instance['button_label']) ? (!empty($instance['button_label']) ? $instance['button_label']: '') : '';
        ?>
        <div class="ct-newsletter widget">
            <?php if(!empty($title)) :
                echo wp_kses_post($args['before_title']) . wp_kses_post($title) . wp_kses_post($args['after_title']);
            endif; ?>
            <div class="ct-newsletter-inner">
                <div class="ct-newsletter-introduction"><?php echo wp_kses_post( $introduction ); ?></div>
                <?php echo do_shortcode( '[newsletter_form button_label="'.$button_label.'"][newsletter_field name="email" label="'.$email_label.'"][/newsletter_form]' ); ?>
            </div>
        </div>
    <?php }

    function update( $new_instance, $old_instance ) {
         $instance = $old_instance;
         $instance['title'] = strip_tags($new_instance['title']);
         $instance['introduction'] = strip_tags($new_instance['introduction']);
         $instance['email_label'] = strip_tags($new_instance['email_label']);
         $instance['button_label'] = strip_tags($new_instance['button_label']);

         return $instance;
    }

    function form( $instance ) {
         $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
         $introduction = isset($instance['introduction']) ? esc_attr($instance['introduction']) : '';
         $email_label = isset($instance['email_label']) ? esc_attr($instance['email_label']) : '';
         $button_label = isset($instance['button_label']) ? esc_attr($instance['button_label']) : '';

         ?>
        <p><label for="<?php echo esc_url($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title', 'multio' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('introduction')); ?>"><?php esc_html_e( 'Introduction', 'multio' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('introduction') ); ?>" name="<?php echo esc_attr( $this->get_field_name('introduction') ); ?>" type="text" value="<?php echo esc_attr( $introduction ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('email_label')); ?>"><?php esc_html_e( 'Email Label', 'multio' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('email_label') ); ?>" name="<?php echo esc_attr( $this->get_field_name('email_label') ); ?>" type="text" value="<?php echo esc_attr( $email_label ); ?>" /></p>

        <p><label for="<?php echo esc_url($this->get_field_id('button_label')); ?>"><?php esc_html_e( 'Button Label', 'multio' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('button_label') ); ?>" name="<?php echo esc_attr( $this->get_field_name('button_label') ); ?>" type="text" value="<?php echo esc_attr( $button_label ); ?>" /></p>
    <?php
    }

}
function register_newsletter_widget() {
    if(function_exists('ct_allow_RegisterWidget')){
        ct_allow_RegisterWidget( 'Newsletter_Widget' );
    }
}
add_action('widgets_init', 'register_newsletter_widget');
