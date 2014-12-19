<?php
/*
Template Name: Page - News
*/

get_template_part('templates/page', 'header');

$b1_title		= types_render_field("b1-headline", array("raw"=>"true"));
$b1_content		= types_render_field("b1-copy", array("raw"=>"true"));
$b1_text		= types_render_field("b1-link-text", array("raw"=>"true"));
$b1_url		= types_render_field("b1-url", array("raw"=>"true"));

$b2_title		= types_render_field("b2-headline", array("raw"=>"true"));
$b2_content		= types_render_field("b2-copy", array("raw"=>"true"));
$b2_text		= types_render_field("b2-link-text", array("raw"=>"true"));
$b2_url		= types_render_field("b2-url", array("raw"=>"true"));

$b3		= types_render_field("bubble-3", array("raw"=>"true"));
$b4		= types_render_field("bubble-4", array("raw"=>"true"));
$b5		= types_render_field("bubble-5", array("raw"=>"true"));
$b6		= types_render_field("bubble-6", array("raw"=>"true"));
?>

<div class="box-holder">
	<div class="home-content">
		<div id="primary" class="">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php //comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->

		<div class="row center">
			<div class="col-sm-6">
				<div class="getnews circle circle-large">
					<div class="group">
						<h1><?php echo $b1_title; ?></h1>
						<p><?php echo $b1_content; ?></p>
						<p><a href="<?php echo $b1_url; ?>"><?php echo $b1_text; ?></a></p>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="getnews circle circle-large">
					<div class="group">
						<h1><?php echo $b2_title; ?></h1>
						<p><?php echo $b2_content; ?></p>
						<p><a href="<?php echo $b2_url; ?>"><?php echo $b2_text; ?></a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row center">
			<div class="col-sm-6 col-md-3">
				<div class="stats circle circle-small">
					<div class="group">
						<?php echo $b3; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="stats circle circle-small">
					<div class="group">
						<?php echo $b4; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="stats circle circle-small">
					<div class="group">
						<?php echo $b5; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="stats circle circle-small">
					<div class="group">
						<?php echo $b6; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_footer();
