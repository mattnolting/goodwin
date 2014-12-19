<?php
/**
 * Shortcodes
 */

function icon($atts, $content = null) {
	extract(shortcode_atts(array(
		"icon" => '',
		"link" => '',
		"group" => ''
	), $atts));

    $html = '<a class="icon-large icon-circle" href="' . $link . '"><span class="icon-'. $icon .'"></span></a><h3><a href="' . $link . '" class="link">' . $content . '</a></h3>';

	if($group == 'true') {
		return '<div class="icon-group">' . $html . '</div>';
	} else {
		return $html;
	}
}
add_shortcode("icon", "icon");
