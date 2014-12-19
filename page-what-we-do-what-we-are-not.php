<?php
/*
Template Name: Page - What We Do - What We Are Not
*/

get_template_part('templates/page', 'header');
//get_template_part('templates/content', 'page');

// vars
$b1_title			= types_render_field("b1-title", array("raw"=>"true"));
$b1_content			= types_render_field("b1-content", array("raw"=>"true"));
$b2_title			= types_render_field("b2-title", array("raw"=>"true"));
$b2_content			= types_render_field("b2-content", array("raw"=>"true"));
$b3_title			= types_render_field("b3-title", array("raw"=>"true"));
$b3_content			= types_render_field("b3-content", array("raw"=>"true"));
?>

<?php while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>

<div class="options row">
	<div class="option">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h3><?php echo $b1_title; ?></h3>
				</div>
				<div class="flip-back">
					<div class="content"><?php echo $b1_content; ?></div>
				</div>
			</div>
		</div>
	</div>

	<div class="option">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h3><?php echo $b2_title; ?></h3>
				</div>
				<div class="flip-back">
					<div class="content"><?php echo $b2_content; ?></div>
				</div>
			</div>
		</div>
	</div>

	<div class="option">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h3><?php echo $b3_title; ?></h3>
				</div>
				<div class="flip-back">
					<div class="content"><?php echo $b3_content; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer();
