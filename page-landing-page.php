<?php
/*
Template Name: Page - Landing Page
*/

$facebook = ot_get_option( 'facebook' );
$linkedin = ot_get_option( 'linkedin' );
$gplus = ot_get_option( 'gplus' );
$twitter = ot_get_option( 'twitter' );
?>

<?php get_template_part('templates/page', 'header'); ?>

<div class="valign">
	<a class="logo-landing" href="<?php echo home_url('/home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/l_landing.png" alt="<?php echo bloginfo( 'name' ); ?>" /></a>

	<?php while (have_posts()) : the_post(); ?>
		<h1><?php the_content(); ?></h1>
	<?php endwhile; ?>

	<a class="btn btn-landing" href="<?php echo home_url('/home'); ?>">Enter Site</a>

	<div class="copyright">All rights reserved. Copyrights <?php echo date('Y'); ?>.</div>
	<div class="icon-list">
		<?php if($facebook) : ?>
			<a class="icon-circle icon-simple" target="_blank" href="<?php echo $facebook; ?>"><span class="icon-facebook"></span></a>
		<?php endif; ?>
		<?php if($gplus) : ?>
			<a class="icon-circle icon-simple" target="_blank" href="<?php echo $gplus; ?>"><span class="icon-googleplus"></span></a>
		<?php endif; ?>
		<?php if($linkedin) : ?>
			<a class="icon-circle icon-simple" target="_blank" href="<?php echo $linkedin; ?>"><span class="icon-linkedin"></span></a>
		<?php endif; ?>
		<?php if($twitter) : ?>
			<a class="icon-circle icon-simple" target="_blank" href="<?php echo $twitter; ?>"><span class="icon-twitter"></span></a>
		<?php endif; ?>
	</div>
</div>
