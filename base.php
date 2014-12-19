<?php get_template_part('templates/head'); ?>

<?php if(is_page_template('page-landing-page.php')) : ?>
	<?php $background = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	<body <?php body_class('landing'); ?> style="background-image: <?php echo $background; ?>">
<?php else: ?>
	<body <?php body_class(); ?>>
<?php endif; ?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!--[if lt IE 8]>
	<div class="alert alert-warning">
	  <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
	</div>
  <![endif]-->

	<?php echo '<div class="sticky-wrap">'; ?>
	<?php
		if(!is_page_template('page-homepage.php') && !is_page_template('page-landing-page.php')) {
			do_action('get_header');
			// Use Bootstrap's navbar if enabled in config.php
			if (current_theme_supports('bootstrap-top-navbar')) {
				get_template_part('templates/header-top-navbar');
			} else {
				get_template_part('templates/header');
			}
		}
	?>

	<?php if(is_page_template('page-homepage.php') || is_page_template('page-who-we-are.php')): ?>
		<!-- ================================================================================= -->
		<!-- Homepage -->
		<!-- ================================================================================= -->
		<?php include roots_template_path(); ?>
		<?php echo '</div><!-- sticky-wrap -->'; ?>
		<?php get_template_part('templates/footer'); ?>
	<?php elseif(is_page_template('page-landing-page.php')): ?>
		<!-- ================================================================================= -->
		<!-- Default Page Template -->
		<!-- ================================================================================= -->
		<?php include roots_template_path(); ?>

	<!-- ================================================================================= -->
	<!-- Why Us Page -->
	<!-- ================================================================================= -->
	<?php elseif(is_page_template('page-why-us.php')) : ?>
	<div class="wrap container page" role="document">
		<div class="content row">
			<main class="main col-sm-6 col-md-4">
			<?php while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
			<?php endwhile; ?>
			</main><!-- /.main -->
			<div class="col-sm-6 col-md-8">
				<?php $why_us = new WP_Query( array( 'post_type' => 'why-us-posts' ) ); ?>
				<?php if($why_us -> have_posts() ) : ?>
				<div class="modals">
					<ul class="row">
					<?php while($why_us -> have_posts()) : $why_us->the_post(); ?>
						<li class="col-md-6">
							<div class="box-wrap">
								<h2><?php the_title(); ?></h2>
								<div class="content"><?php the_content(); ?></div>
							</div>
						</li>
					<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; wp_reset_query(); ?>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<div class="modal-body">
								<div class="content"></div>
							</div>
						</div>
					</div>
				</div><!-- modal -->
			</div><!-- col-def -->
		</div><!-- content row -->
	</div><!-- wrap container page -->
	<?php echo '</div><!-- sticky-wrap -->'; ?>
	<?php get_template_part('templates/footer'); ?>

	<!-- ================================================================================= -->
	<!-- Contact Page -->
	<!-- ================================================================================= -->
	<?php elseif(is_page_template('page-contact.php')) : ?>
	<div class="wrap container page" role="document">
		<div class="content">
			<main class="main">
			<?php while (have_posts()) : the_post(); ?>
				<div class="icons center">
					<a class="icon mail" href="mailto:<?php echo ot_get_option( "email" );?>">
						<span class="contact-rollover"><?php echo ot_get_option( "email" );?></span>
					</a>
					<a class="icon phone" data-toggle="modal" data-target="#myModal" a href="callto:<?php ?>">
						<span class="contact-rollover"><?php echo ot_get_option( "phone" );?></span>
					</a>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" style="position: absolute; width: 90%; margin: 0 5%; top: 30%;">
							<div class="modal-content" style="background: #fff">
								<div class="modal-body" style="padding: 24px">
									<h1><a href="tel:<?php echo ot_get_option( "phone" );?>"><?php echo ot_get_option( "phone" );?></a></h1>
								</div>
							</div>
						</div>
					</div>
					<a class="icon linkedin" target="_blank" href="<?php echo ot_get_option( "linkedin" );?>">

					</a>
				</div>
				<div class="contact center">
					<address><?php echo ot_get_option( "address" );?></address>
					<p>send resumes to: <a href="mailto:resume@goodwinsearch.com">resume@goodwinsearch.com</a></p>
				</div>
			<?php endwhile; ?>
			</main><!-- /.main -->
		</div><!-- /.content -->
	</div><!-- /.wrap -->
	<?php echo '</div><!-- sticky-wrap -->'; ?>
	<?php get_template_part('templates/footer'); ?>

	<!-- ================================================================================= -->
	<!-- All Other Pages -->
	<!-- ================================================================================= -->
	<?php else: ?>
	<div class="wrap container page" role="document">
		<div class="content <?php echo roots_display_sidebar() ? 'row row-bordered' : '' ?>">
			<?php if (roots_display_sidebar()) : ?>
			<aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">

				<?php if(is_single('testimonials') || is_singular('testimonials') || is_post_type_archive( 'testimonials' ) ): ?>
					<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/img/g_goodwords-groupshot.jpg" alt="Goodwin Group" />

				<?php elseif(is_single('post') || is_singular('post') || is_month() || is_home()): ?>
					<?php //dynamic_sidebar( 'blog_sidebar' ); ?>
					<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/img/g_goodnews-groupshot.jpg" alt="Goodwin Group" />

				<?php elseif(is_page('value-added-services')): ?>
					<h1><?php the_title(); ?></h1>
					<img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/img/boardroom_prep.jpg" alt="Goodwin Group" />
					<?php include roots_sidebar_path(); ?>

				<?php else: ?>
					<h1><?php the_title(); ?></h1>
					<?php include roots_sidebar_path(); ?>
				<?php endif; ?>

			</aside><!-- /.sidebar -->
			<?php endif; ?>
			<div class="<?php echo roots_main_class(); ?>">
				<?php include roots_template_path(); ?>
			</div><!-- /.main -->
		</div><!-- /.content -->
	</div><!-- /.wrap -->
	<?php echo '</div><!-- sticky-wrap -->'; ?>
	<?php get_template_part('templates/footer'); ?>
	<?php endif; ?>


</body>
</html>
