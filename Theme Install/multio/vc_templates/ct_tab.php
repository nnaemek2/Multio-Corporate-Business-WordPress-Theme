<?php
	$atts = array_merge( array(
		'active_section' => 1,
		'layout' => 'layout1',
		'el_class' => '',
	), $atts );
	global $tab_id, $active_section;
	$active_section = $atts['active_section'];
	$tab_id         = 0;
?>
<div class="ct-tabs <?php echo esc_attr($atts['layout'].' '.$atts['el_class']); ?>">
	<ul class="nav nav-tabs">
		<?php 
			echo do_shortcode( $content );
			global $tabs_data_section;
			foreach ( $tabs_data_section as $tab_id => $content ) {
				echo wp_kses_post($content);
			}
		?>
	</ul>
	<div class="tab-content">
		<?php
			global $tabs_data;
			foreach ( $tabs_data as $tab_id => $content ) {
				echo wp_kses_post($content);
			}
		?>
	</div>
</div>