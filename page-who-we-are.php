<?php
/*
Template Name: Page - Who We Are
*/

get_template_part('templates/page', 'header');
?>

<script>
$(document).ready(function() {

	$("#people").owlCarousel({

		loop:true,
		margin:0,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			},
			1600:{
				items:4
			},
		}
	});
});
</script>

<div class="container-fluid">
	<?php $people = new WP_Query( array( 'post_type' =>'people', 'posts_per_page' => '-1' ) ); ?>
	<?php if( $people->have_posts() ) : ?>
	<div id="people" class="owl-carousel">
		<?php $i=1; while ($people->have_posts()) : $people->the_post(); ?>
			<?php
				$button		= types_render_field("button-text", array("raw"=>"true"));
				$title		= types_render_field("title", array("raw"=>"true"));
				$static		= types_render_field("static-text", array("raw"=>"true"));
			?>

			<?php if($static) : ?>
			<div class="group text-block">
				<?php the_content(); ?>
			</div>
			<?php else: ?>
			<div class="group person">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="photo">
						<div class="bio-title equalheights">
							<div class="bio-wrap">
								<h3><?php the_title(); ?></h3>
								<h3><?php echo $title; ?></h3>
								<?php if($button): ?>
									<a class="btn" data-toggle="modal" data-target="#modal<?php echo $i; ?>"><?php echo $button; ?></a>
								<?php else: ?>
									<a class="btn" data-toggle="modal" data-target="#modal<?php echo $i; ?>">Learn More</a>
								<?php endif; ?>
							</div>
						</div>
						<figure><?php the_post_thumbnail(); ?></figure>
					</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		<?php $i++; endwhile; ?>
	</div>
	<?php $i=1; while ($people->have_posts()) : $people->the_post(); ?>
		<?php
			$title		= types_render_field("title", array("raw"=>"true"));
			$phone		= types_render_field("phone", array("raw"=>"true"));
			$email		= types_render_field("email", array("raw"=>"true"));
		?>

		<div class="modal fade" id="modal<?php echo $i; ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="modal-body">
						<h2><?php the_title(); ?> - <?php echo $title; ?></h2>
						<?php the_content(); ?>
					</div>
					<div class="modal-footer">
						<?php echo $phone ? '<span class="tel">' . $phone . '</span>' : null ; ?>
						<?php echo $email ? '<span class="email">' . $email . '</span>' : null ; ?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>	<!-- /.modal -->

	<?php $i++; endwhile; ?>
	<?php endif; wp_reset_query(); ?>
</div>
<?php get_footer(); ?>
