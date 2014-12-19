<?php
/**
 * Custom functions
 */

add_filter('roots_wrap_base', 'roots_wrap_base_cpts'); // Add our function to the roots_wrap_base filter

function roots_wrap_base_cpts($templates) {
	$cpt = get_post_type(); // Get the current post type
	if ($cpt) {
		array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
	}
	return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function blog_widget() {

	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'blog_widget' );
