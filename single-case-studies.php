<?php while (have_posts()) : the_post(); ?>
<?php $supporting_info = types_render_field("supporting-info", array("html"=>"true")); ?>

<div class="row">
	<h1 class="col-xs-12 center pink">Goodwin gets the digital home</h1>
</div>

<div class="row row-bordered">
	<div class="col-sm-6 entry-content supporting-text">
		<header>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="client-logo logo">
				<figure><?php the_post_thumbnail(); ?></figure>
			</div>
			<?php endif; ?>
			<h1 class="entry-title hidden"><?php the_title(); ?></h1>
		</header>
		<div class="entry-content entry-supporting-text"><?php echo $supporting_info; ?></div>
	</div>
	<div class="col-sm-6 entry-content border-left">
		<?php the_content(); ?>
	</div>
	<?php comments_template('/templates/comments.php'); ?>
</div>
<?php endwhile; ?>
