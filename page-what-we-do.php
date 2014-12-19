<?php
/*
Template Name: Page - What We Do
*/

get_template_part('templates/page', 'header');
get_template_part('templates/content', 'page');

// vars
$logos		= types_render_field("wwd_logos", array("raw"=>"true"));
$icons		= types_render_field("wwd_icons", array("raw"=>"true"));
?>

<div class="icon-list center">
	<?php echo do_shortcode($icons); ?>
</div>
<div class="logo-list center">
	<?php echo $logos; ?>
</div>

<?php get_footer();
