<?php
	$facebook = ot_get_option( 'facebook' );
	$linkedin = ot_get_option( 'linkedin' );
	$gplus = ot_get_option( 'gplus' );
	$twitter = ot_get_option( 'twitter' );
?>
</main>

<footer class="content-info" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 social-media">
				<div class="wrap">
					<?php if( $facebook || $linkedin || $gplus ) : ?>
						<span class="title">Follow Us</span>
						<div class="icons">
							<?php echo $facebook ? '<a class="facebook sm-icon" href="' . $facebook . '" target="_blank"><span class="icon-facebook"></span><span class="link">' . $facebook . '</span></a>' : null; ?>
							<?php echo $linkedin ? '<a class="linkedin sm-icon" href="' . $linkedin . '" target="_blank"><span class="icon-linkedin"></span><span class="link">' . $linkedin . '</span></a>' : null; ?>
							<?php echo $gplus ? '<a class="gplus sm-icon" href="' . $gplus . '" target="_blank"><span class="icon-googleplus"></span><span class="link">' . $gplus . '</span></a>' : null; ?>
							<?php echo $twitter ? '<a class="twitter sm-icon" href="' . $twitter . '" target="_blank"><span class="icon-twitter"></span><span class="link">' . $twitter . '</span></a>' : null; ?>
						</div>
					<?php endif; ?>
					<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="wrap">
					<menu class="footer-nav"><?php echo wp_nav_menu( array( 'theme_location' => 'footer_navigation', 'link_before' => '<span class="sep">|</span>' ) ); ?></menu>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
