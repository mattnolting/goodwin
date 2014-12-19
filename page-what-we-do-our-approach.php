<?php
/*
Template Name: Page - What We Do - Our Approach
*/

get_template_part('templates/page', 'header');
//get_template_part('templates/content', 'page');

// vars
$phase1			= types_render_field("phase1", array("html"=>"true"));
$phase2			= types_render_field("phase2", array("html"=>"true"));
$phase3			= types_render_field("phase3", array("html"=>"true"));
$phase4			= types_render_field("phase4", array("html"=>"true"));
?>

<h3>Rollover to see our process.</h3>

<div class="phases row">
	<div class="phase">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h2 class="num">Phase</h2>
					<div class="icon-circle">1</div>
				</div>
				<div class="flip-back">
					<?php echo $phase1; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="phase">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h2 class="num">Phase</h2>
					<div class="icon-circle">2</div>
				</div>
				<div class="flip-back">
					<?php echo $phase2; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="phase">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h2 class="num">Phase</h2>
					<div class="icon-circle">3</div>
				</div>
				<div class="flip-back">
					<?php echo $phase3; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="phase">
		<div class="flip">
			<div class="group">
				<div class="flip-front">
					<h2 class="num">Phase</h2>
					<div class="icon-circle">4</div>
				</div>
				<div class="flip-back">
					<?php echo $phase4; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<h3><a href="<?php echo home_url('/contact-us'); ?>">Lets get started.</a></h3>

<?php get_footer();
