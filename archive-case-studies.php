<?php
/*
Case Studies Archive
*/


get_template_part('templates/page', 'header');

$taxonomy_list = array( 'case-study-type' );
$taxonomies = get_terms( $taxonomy_list );
?>

<?php foreach($taxonomies as $taxonomy) : ?>
<?php
	// Set Variables - We'll use $name for the categories
	$slug = $taxonomy->slug;
	$name = $taxonomy->name;

	$args = array(
		'post_type' => 'case-studies',
		'tax_query' => array(
			array(
				'taxonomy' => 'case-study-type',
				'field' => 'slug',
				'terms' => $slug
			)
		),
		'posts_per_page' => '-1'
	);
?>
<div class="row">
	<div class="col-xs-4">
		<?php echo $name; ?>
	</div>

	<div class="col-xs-8">
		<div class="clients">
			<?php $case_studies = new WP_Query( $args) ; ?>
			<?php if($case_studies->have_posts()) : ?>
				<?php while($case_studies->have_posts()) : $case_studies->the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="client-logo col-xs-4">
							<div class="group">
								<a href="<?php echo $post->guid; ?>"><?php the_post_thumbnail(); ?></a>
							</div>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php endforeach; ?>
