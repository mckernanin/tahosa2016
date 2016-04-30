<?php
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * TypeKit Fonts.
 *
 * @since Theme 1.0
 */
function theme_typekit() {
	wp_enqueue_script( 'theme_typekit', '//use.typekit.net/ihq0jhu.js' );
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline(){
	if ( wp_script_is( 'theme_typekit', 'done' ) ) {
		?>
	  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php
	}
}
add_action( 'wp_head', 'theme_typekit_inline' );

function add_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_body_class' );
