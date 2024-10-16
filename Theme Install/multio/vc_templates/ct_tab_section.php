<?php
	$atts = array_merge( array(
		'icon_image'  => '',
		'icon_image_hover'  => '',
		'title'  => '',
	), $atts );
	global $tab_id, $tabs_data, $tabs_data_section, $active_section;
	$active               = ( $active_section == ++ $tab_id ) ? 'active' : '';
	$active_content       = ( $active_section == $tab_id ) ? 'show active' : '';
	$id                   = 'tab-' . uniqid();
	$img = wpb_getImageBySize( array(
	    'attach_id'  => $atts['icon_image'],
	    'thumb_size' => 'full',
	    'class'      => 'icon-main',
	));
	$thumbnail = $img['thumbnail'];
	$img_hover = wpb_getImageBySize( array(
	    'attach_id'  => $atts['icon_image_hover'],
	    'thumb_size' => 'full',
	    'class'      => 'icon-hover',
	));
	$thumbnail_hover = $img_hover['thumbnail'];
	$tabs_data_section[ $tab_id ] = '<li class="nav-item"><a id="tab-section-' . $id . '" class="nav-link '.$active.'" data-toggle="tab" href="#tab-content-' . $id . '" aria-controls="tab-content-' . $id . '" aria-selected="true"><span>'.wp_kses_post($thumbnail.$thumbnail_hover) .'</span>'. $atts['title'] . '</a></li>';
	$tabs_data[ $tab_id ] = '<div id="tab-content-' . $id . '" class="tab-pane fade '.$active_content.'" role="tabpanel" aria-labelledby="tab-section-' . $id . '">' . do_shortcode( $content ) . '</div>';
?>