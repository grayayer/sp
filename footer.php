<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

		<?php $i = 0; while ( $i < $total ) { $i++; ?>
			<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

		<div class="block footer-widget-<?php echo $i; ?>">
        	<?php woo_sidebar( 'footer-' . $i ); ?>
		</div>

	        <?php } ?>
		<?php } // End WHILE Loop ?>

	</section><!-- /#footer-widgets  -->
<?php } // End IF Statement ?>
	<footer id="footer" class="col-full">
		<div id="social">
    			<a title="Connect with me on Facebook" href="http://www.facebook.com//ScottPembertonMusic/">
    				<i class="social-icon fa fa-facebook-square" data-shiftnav-icon="fa fa-facebook-square"></i>
    			</a>
                <a title="Connect with me on Twitter" href="http://twitter.com/#!/scottpemberton1">
                	<i class="social-icon fa fa-tumblr-square" data-shiftnav-icon="fa fa-tumblr-square"></i>
                </a>
                <a title="Connect with me on YouTube" href="http://www.youtube.com/user/leftorbit">
                	<i class="social-icon fa fa-youtube-square" data-shiftnav-icon="fa fa-youtube-square"></i>
            	</a>
                <a title="Send me an email" href="mailto:Info@scottpemberton.com">
                	<i class="social-icon fa fa-envelope" data-shiftnav-icon="fa fa-envelope"></i>
            	</a>	
		</div>

		<div id="copyright" class="col-left">
		<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {

				echo stripslashes( $woo_options['woo_footer_left_text'] );

		} else { ?>
			<p><a href="http://www.scottpemberton.com">Scott Pemberton</a> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>

		<div id="credit" class="col-right">
		<a href="http://www.studiok40.com/">Web Development &amp; Design by Gray Ayer</a>	
		</div>

	</footer><!-- /#footer  -->
	<div id="corners-bottom">
    	<div id="corners-bottom-left" class="sprite"></div>
		<div id="corners-bottom-right" class="sprite"></div>
    </div>
</div><!-- /#wrapper -->

<?php wp_footer(); ?>
<?php woo_foot(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.fitvids.js"></script>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/min/scripts.min.js"></script>

</div><!--ends top cloud div-->


</body>
</html>