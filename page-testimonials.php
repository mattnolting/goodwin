<?php
/*
/*
Template Name: Page - Testimonials
*/

get_template_part('templates/page', 'header');

?>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<h1 class="title-small"><?php echo types_render_field("block-1-title", array("raw"=>"true")); ?></h1>
		<p><?php echo types_render_field("block-1-content", array("html"=>"true")); ?></p>
		<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/img/img_testimonials.jpg" alt="Goodwin Group" />
	</div>

	<div class="col-xs-12 col-sm-6">
		<h1 class="title-small"><?php echo types_render_field("block-2-title", array("raw"=>"true")); ?></h1>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<div class="testimonials">
	<h1 class="title-small">WHAT GOOD CUSTOMERS SAY ABOUT US</h1>
	<div class="row">

		<?php $testimonials = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page' => '-1' )) ; ?>
		<?php if($testimonials->have_posts()) : ?>
			<?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
				<div class="testimonial col-xs-12 col-sm-6">
					<div class="group">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
						<blockquote>
							<?php the_content(); ?>
						</blockquote>
						<h3 class="title"><?php the_title(); ?></h3>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
	</div>
</div>
