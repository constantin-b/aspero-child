<?php
/**
 * Enqueue parent theme styles
 */
function theme_enqueue_styles() {
	wp_enqueue_style(
		'parent-style',
		get_template_directory_uri() . '/style.css'
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 * Check if it's a Vimeotheque video post
 *
 * @return bool
 */
function is_vimeotheque_video_post(){
	if( defined('VIMEOTHEQUE_VERSION') && version_compare( VIMEOTHEQUE_VERSION, '2.0', '>=' ) ){
		return \Vimeotheque\Helper::get_video_post()->is_video();
	}else if( function_exists( 'cvm_is_video' ) ) {
		return cvm_is_video();
	}

	return false;
}