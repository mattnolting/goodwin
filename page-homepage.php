<?php
/*
Template Name: Page - Homepage
*/

$logo = ot_get_option( 'l_header' );

$b1_headline		= types_render_field("b1-headline", array("raw"=>"true"));
$b1_link_text		= types_render_field("b1-link-text", array("raw"=>"true"));
$b1_url				= types_render_field("b1-url", array("raw"=>"true"));

$b2_headline		= types_render_field("b2-headline", array("raw"=>"true"));
$b2_link_text		= types_render_field("b2-link-text", array("raw"=>"true"));
$b2_url				= types_render_field("b2-url", array("raw"=>"true"));

$b3_headline		= types_render_field("b3-headline", array("raw"=>"true"));
$b3_link_text		= types_render_field("b3-link-text", array("raw"=>"true"));
$b3_url				= types_render_field("b3-url", array("raw"=>"true"));

$b4_headline		= types_render_field("b4-headline", array("raw"=>"true"));
$b4_link_text		= types_render_field("b4-link-text", array("raw"=>"true"));
$b4_url				= types_render_field("b4-url", array("raw"=>"true"));

$b5_headline		= types_render_field("b5-headline", array("raw"=>"true"));
$b5_link_text		= types_render_field("b5-link-text", array("raw"=>"true"));
$b5_url				= types_render_field("b5-url", array("raw"=>"true"));

$b6_headline		= types_render_field("b6-headline", array("raw"=>"true"));
$b6_link_text		= types_render_field("b6-link-text", array("raw"=>"true"));
$b6_url				= types_render_field("b6-url", array("raw"=>"true"));

?>
<script>
$(document).ready(function() {
	$('.flexslider').flexslider({
		controlNav: false,
		backdrop: false,
		slideshowSpeed: 3000
	});
});
</script>
<div class="container-fluid page-wrap">
	<main class="row main-content" role="main">
		<div class="col-sm-5 block1">
			<?php $testimonials = new WP_Query( array( 'post_type' =>'testimonials', 'posts_per_page' => '1' ) ); ?>
			<?php if( $testimonials->have_posts() ) : ?>

			<div class="testimonials group">
				<?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
					<a href="<?php echo home_url('/good-words'); ?>">
						<blockquote>
							<?php $trimmed = wp_trim_words( get_the_content(), 55, '...' ); ?>
							<span class="text"><?php echo $trimmed; ?></span>
							<h3 class="byline"><?php the_title(); ?></h3>
						</blockquote>
					</a>
				<?php endwhile; ?>
			</div>
			<?php endif; wp_reset_query(); ?>
		</div>

		<div class="col-sm-7 block2">
			<div class="row">

				<div class="col-xs-6 col-sm-4">
					<a class="news group" href="<?php echo home_url('/'); echo $b1_url ?>">
						<span class="headline"><?php echo $b1_headline; ?></span>
						<span class="link"><?php echo $b1_link_text; ?></span>
					</a>
				</div>

				<div class="col-xs-6 col-sm-4 flexslider">
					<?php $stats = new WP_Query( array( 'post_type' =>'homepage-stats' ) ); ?>
					<?php if( $stats->have_posts() ) : ?>
						<ul class="slides">
							<?php while ($stats->have_posts()) : $stats->the_post(); ?>
							<li class="slide searches group">
								<span class="circle"><?php the_title(); ?></span>
								<p><?php the_content(); ?></p>
							</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; wp_reset_query(); ?>
				</div>

				<div class="col-xs-6 col-sm-4">
					<a href="<?php echo home_url('/'); echo $b3_url ?>" class="why-us group">
						<span class="headline"><?php echo $b3_headline; ?></span>
						<span class="link"><?php echo $b3_link_text; ?></span>
					</a>
				</div>

				<div class="col-xs-6 col-sm-4">
					<a href="<?php echo home_url('/'); echo $b4_url ?>" class="what-we-do group">
						<span class="headline"><?php echo $b4_headline; ?></span>
						<span class="link"><?php echo $b4_link_text; ?></span>
					</a>
				</div>

				<div class="col-xs-6 col-sm-4">
					<a href="<?php echo home_url('/'); echo $b5_url ?>" class="who-we-are group">
						<span class="headline"><?php echo $b5_headline; ?></span>
						<span class="link"><?php echo $b5_link_text; ?></span>
					</a>
				</div>

				<div class="col-xs-6 col-sm-4">
					<a href="<?php echo home_url('/'); echo $b6_url ?>" class="contact group">
						<span class="headline"><?php echo $b6_headline; ?></span>
						<span class="link"><?php echo $b6_link_text; ?></span>
					</a>
				</div>

			</div><!-- row -->
		</div>
	</main>
	<div class="footer-logo">
		<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo bloginfo( 'name' ); ?>" /></a>
	</div>
</div>

<?php get_footer(); ?>
