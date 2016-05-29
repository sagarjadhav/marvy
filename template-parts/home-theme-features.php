<div class="home-section home-theme-features">

	<div class="container">

		<h2><?php echo get_option( 'home_theme_feature_title' ); ?></h2>

		<ul class="grid grid-wrap">

			<?php for ( $x = 1; $x <= 6; $x++ ) { ?>

				<li class="grid-cell sm-grid-1-2 lg-grid-1-3">
					<i class="icon <?php echo get_option( 'home_theme_feature_icon_' . $x ); ?>"></i>
					<h4><?php echo get_option( 'home_theme_feature_title_' . $x ); ?></h4>
					<p><?php echo get_option( 'home_theme_feature_desc_' . $x ); ?></p>
				</li>

			<?php } ?>
		</ul>
	</div>

</div>