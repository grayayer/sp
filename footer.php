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

		<div id="copyright" class="col-left">
		<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {

				echo stripslashes( $woo_options['woo_footer_left_text'] );

		} else { ?>
			<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
		<?php } ?>
		</div>

		<div id="credit" class="col-right">
<a href="http://www.studiok40.com/">Wordpress Web Development &amp; Design by Gray Ayer of StudioK40</a>	
		</div>

	</footer><!-- /#footer  -->
	<div id="corners-bottom">
    	<div id="corners-bottom-left" class="sprite"></div>
		<div id="corners-bottom-right" class="sprite"></div>
    </div>
</div><!-- /#wrapper -->

<?php wp_footer(); ?>
<?php woo_foot(); ?>

<script>
// CLEAR FORM FIELDS OF LABEL ON FOCUS THEN ADD BACK ON BLUR IF EMPTY (class of 'clear_field' must be added to form field) //
 
$(document).ready(function(){
	$(".clear_field input").focus(function () {
		var origval = $(this).val();
		$(this).val("");
		//console.log(origval);
		$(".clear_field input").blur(function () {
			if($(this).val().length === 0 ) {
				$(this).val(origval);
				origval = null;
			}else{
				origval = null;
			};
		});
	});
});
</script>

</div><!--ends top cloud div-->


</body>
</html>