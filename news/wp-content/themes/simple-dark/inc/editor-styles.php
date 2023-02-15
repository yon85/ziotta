<?php
/**
 * Simpledark modify editor
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_theme_support( 'editor-styles' );
add_action( 'after_setup_theme', 'simpledark_add_editor_styles' );
if ( ! function_exists( 'simpledark_add_editor_styles' ) ) {
	function simpledark_add_editor_styles() {
		add_editor_style( 'css/theme.min.css' );
		add_editor_style( 'css/editor-style.min.css' );
	}
}