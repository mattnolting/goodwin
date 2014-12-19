<?php
/*
Template Name: Page - Case Studies Archive
*/


get_template_part('templates/page', 'header');

?>

<div class="row row-bordered">
	<div class="client-cat col-md-4">
		<h1>Clients &amp; Impacts</h1>
	</div>

	<div class="client-list col-md-8 border-left">
		<div class="row">
		<?php $case_studies = new WP_Query( array('post_type' => 'case-studies', 'posts_per_page' => '-1' )) ; ?>
		<?php if($case_studies->have_posts()) : $case = 1;?>
			<?php while($case_studies->have_posts()) : $case_studies->the_post(); ?>
				<?php $content_test = get_the_content(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="client-logo col-xs-12 col-sm-4 logo<?php echo $i; ?>">
						<figure class="group">
							<?php if($content_test): ?>
								<a href="<?php echo $post->guid; ?>"><?php the_post_thumbnail(); ?></a>
							<?php else: ?>
								<?php the_post_thumbnail(); ?>
							<?php endif; ?>
						</figure>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</div>
