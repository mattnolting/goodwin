<?php $logo = ot_get_option( 'l_header' ); ?>

<header class="banner navbar navbar-default navbar-static-top masthead" role="banner">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="logo">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo bloginfo( 'name' ); ?>" /></a>
				</div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> -->
				</div>

				<nav class="collapse navbar-collapse main-nav" role="navigation">
				<?php
					if (has_nav_menu('primary_navigation')) :
						wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
					endif;
				?>
				</nav>
			</div>
		</div>
	</div>
</header>
