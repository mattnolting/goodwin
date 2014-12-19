<?php
/*
Case Studies Archive
*/


get_template_part('templates/page', 'header');

?>
<div class="row">
	<div class="col-xs-12 col-sm-6">
		<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/img/g_value-pic.jpg" alt="Goodwin Group" />
	</div>

	<div class="col-xs-12 col-sm-6">
	</div>

</div>
<div class="testimonials">
	<div class="row">
		<?php $testimonials = new WP_Query( array( 'post_type' => 'testimonials' )) ; ?>
		<?php if($testimonials->have_posts()) : ?>
			<?php while($testimonials->have_posts()) : $testimonials->the_post(); ?>
				<div class="client-logo col-xs-12 col-sm-6">
					<div class="group">
						<?php the_title(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo $post->guid; ?>"><?php the_post_thumbnail(); ?></a>
					<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
	</div>
</div>