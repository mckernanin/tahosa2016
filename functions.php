<?php

class TahosaLodgeTheme {

	function __construct() {

		require_once( 'inc/tahosa-button.php' );

		add_filter( 'upload_mimes', array( $this, 'mime_types' ) );
		add_filter( 'body_class',   array( $this, 'add_slug_body_class' ) );
		add_action( 'send_headers', array( $this, 'custom_headers' ) );

		$this->roots_support();
	}

	public function mime_types( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';

		return $mimes;
	}

	public function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
	}

	public function custom_headers() {
		header( 'Access-Control-Allow-Origin: *' );
	}

	public function roots_support() {
		add_theme_support( 'soil-clean-up' );
		add_theme_support( 'soil-disable-asset-versioning' );
		add_theme_support( 'soil-disable-trackbacks' );
		// add_theme_support( 'soil-google-analytics', '' );
		add_theme_support( 'soil-jquery-cdn' );
		// add_theme_support( 'soil-js-to-footer' );
		add_theme_support( 'soil-nav-walker' );
		add_theme_support( 'soil-nice-search' );
		add_theme_support( 'soil-relative-urls' );
	}

	public function theme_typekit() {
		wp_enqueue_script( 'theme_typekit', 'https://use.typekit.net/xbk1ivk.js' );
		wp_inline_script( 'try{Typekit.load({ async: true });}catch(e){}' );
	}
}

new Wimachtendienk();
