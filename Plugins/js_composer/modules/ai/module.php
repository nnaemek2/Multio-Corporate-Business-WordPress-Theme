<?php
/*
 * Module Name: AI
 * Description: Module correspond for all AI related functionality like text generation, translation, etc.
 *
 * @since 7.7
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Module entry point.
 * @since 7.7
 */
class Vc_Ai_Module
{
	/**
	 * Module init.
	 *
	 * @since 7.7
	 */
	public function init() {
		require_once vc_path_dir( 'MODULES_DIR', 'ai/helpers.php' );

		add_action( 'wp_ajax_wpb_ai_api_get_response', [$this, 'get_ai_api_response'] );
		add_action( 'wp_ajax_wpb_ai_generate_content_check_cache', [$this, 'get_generate_ai_content_check_cache'] );
		add_action( 'wp_ajax_wpb_ai_get_modal_data', [$this, 'get_modal_ai_data'] );

		add_filter( 'vc_single_param_edit_holder_output', [$this, 'add_ai_icon_to_attributes'], 10, 2 );

		add_filter( 'vc_roles_parts_list', [$this, 'add_ai_role_parts'], 10, 1 );
	}

	/**
	 * Get response from AI API.
	 *
	 * @sine 7.2
	 */
	public function get_ai_api_response() {
		vc_user_access()->checkAdminNonce()->validateDie();

		require_once vc_path_dir( 'MODULES_DIR', 'ai/class-vc-ai-api-connector.php' );
		$ai_api_connector = new Vc_Ai_Api_Connector();

		$content = $ai_api_connector->get_ai_content( vc_request_param( 'data' ) );

		if ( is_wp_error( $content ) ) {
			wp_send_json_error( $content );
		}

		wp_send_json_success( $content );
	}

	/**
	 * Get content generated by AI.
	 *
	 * @sine 7.2
	 */
	public function get_generate_ai_content_check_cache() {
		vc_user_access()->checkAdminNonce()->validateDie();

		require_once vc_path_dir( 'MODULES_DIR', 'ai/class-vc-ai-api-connector.php' );
		$api_connector = new Vc_Ai_Api_Connector();

		$content = $api_connector->get_api_response_data_from_cache( vc_request_param( 'data' ) );
		if ( is_wp_error( $content ) ) {
			wp_send_json_error( $content );
		}

		wp_send_json_success( $content );
	}

	/**
	 * Gen AI modal content.
	 *
	 * @sine 7.2
	 */
	public function get_modal_ai_data() {
		vc_user_access()->checkAdminNonce()->validateDie();

		require_once vc_path_dir( 'MODULES_DIR', 'ai/class-vc-ai-modal-controller.php' );
		$modal_controller = new Vc_Ai_Modal_Controller();

		$data = $modal_controller->get_modal_data( vc_request_param( 'data' ) );

		// in case of error we should it inside modal content
		wp_send_json_success( $data );
	}

	/**
	 * Add ai icon to our element attributes.
	 *
	 * @since 7.7
	 * @param string $output
	 * @param array $param
	 * @return string
	 */
	public function add_ai_icon_to_attributes( $output, $param ) {
		$form_line = '<div class="edit_form_line">';
		$pos = strpos( $output, $form_line );
		if ( false === $pos ) {
			return $output;
		}

		$add_icon = $this->render_ai_icon( $param );

		return substr_replace( $output, $add_icon, $pos + strlen( $form_line ), 0 );
	}

	/**
	 * Generate html for AI icon.
	 *
	 * @see $this->get_lib_ai_icon_words to find a list of words
	 * if element name contain than we show AI icon for it
	 *
	 * @see $this->get_ai_param_types to find a list of element types
	 * that has AI functionality
	 *
	 * @param array $param
	 * @return string
	 * @since 7.2
	 */
	public function render_ai_icon( $param ) {
		$ai_icon = '';
		$ai_param_types = $this->get_ai_param_types();

		if ( empty( $param['heading'] ) || ! is_array( $ai_param_types ) ) {
			return $ai_icon;
		}

		$heading = $param['heading'];
		$is_ai_param = in_array( $param['type'], $ai_param_types );
		$heading_words = preg_split( '/[\s,]+/', $heading );
		$is_content = false;
		foreach ( $heading_words as $word ) {
			$word = strtolower( $word );
			$lib_of_words = $this->get_lib_ai_icon_words();
			if ( is_array( $lib_of_words ) && in_array( $word, $lib_of_words ) ) {
				$is_content = true;
			}
		}
		$is_content_field = 'textfield' === $param['type'] && 'el_class' !== $param['param_name'] && $is_content;
		if ( ( $is_ai_param || $is_content_field ) && $this->is_user_has_access_to_ai( $param['type'] ) ) {
			$field_id = empty( $param['heading'] ) ?
				'' :
				strtolower( preg_replace( '/[^A-Za-z0-9]+/', '_', $param['heading'] ) );
			$field_id = $param['type'] . '_' . $field_id;
			$ai_icon = wpb_get_ai_icon_template( $param['type'], $field_id, false );
		}

		return $ai_icon;
	}

	/**
	 * Get list of words that element name can
	 * have to apply AI functionality to than
	 *
	 * @since 7.2
	 * @return array
	 */
	public function get_lib_ai_icon_words() {
		return [
			'label',
			'title',
			'text',
			'content',
			'description',
			'message',
			'heading',
			'subheading',
		];
	}

	/**
	 * Get list of param types that has AI functionality
	 *
	 * @since 7.2
	 * @return array
	 */
	public function get_ai_param_types() {
		$params = [
			'textarea_html',
			'textarea',
			'textarea_raw_html',
		];
		$params_addons = [
			'uc_textfield',
			'uc_textarea',
			'uc_editor',
			'us_textarea',
			'us_text',
		];

		return array_merge( $params, $params_addons );
	}

	/**
	 * Check if user has permission to AI
	 *
	 * @param $type
	 *
	 * @return bool
	 * @since 7.2
	 */
	public function is_user_has_access_to_ai( $type ) {
		return ( 'textarea_raw_html' === $type && vc_user_access()->part( 'code_ai' )->can()->get() ) ||
			( 'textarea_raw_html' !== $type && vc_user_access()->part( 'text_ai' )->can()->get() );
	}

	/**
	 * Add AI role parts to our roles manager.
	 *
	 *@since 7.7
	 * @param array $parts
	 * @return array
	 */
	public function add_ai_role_parts( $parts ) {
		$parts[] = 'code_ai';
		$parts[] = 'text_ai';

		return $parts;
	}
}
