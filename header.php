<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options;
 
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
	
	$settings = array(
					'enable_slides' => 'true'
					);
					
	$settings = woo_get_dynamic_values( $settings );
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>

<!--this javascript conditional statement loads an additional stylesheet for browsers that are smaller or equal to 1280px, useful to hides the corners-->
<script type="text/JavaScript">
    var screenwidth = screen.width;
    if (screenwidth < 1280) {
      document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />');
      document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/small-style.css" />');
    }
    else {
      document.write('<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />');
    }
</script>
<!--hides the corners for 1024 browsers-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	wp_head();
	woo_head();
?>

<!-- Clearing Default Field Values with jQuery for Gravity forms-->
<script type="text/javascript">

jQuery(document).ready(function() {

	jQuery.fn.cleardefault = function() {
	return this.focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
};
jQuery(".clear_input input, .clear_input textarea").cleardefault();

});

</script>
<!-- ends Clearing Default Field Values with jQuery for Gravity forms-->

</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>
<?php
	if ( $settings['enable_slides'] == 'true' && is_front_page() ) {
		// Load the slider background images.
		get_template_part( 'includes/slider', 'background' );
	}
?>
<div id="wrapper">

	<div id="header-wrap">

	<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>

	<div id="top">
		<nav class="col-full" role="navigation">
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
		</nav>
	</div><!-- /#top -->

    <?php } ?>
	
    <div id="corners-top">
    	<div id="corners-top-left" class="sprite"></div>
		<div id="corners-top-right" class="sprite"></div>
    </div>
	
    <header id="header" class="col-full">
		
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
        
		<?php
		    $logo = get_template_directory_uri() . '/images/logo.png';
		    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
		?>
		<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
		    <a id="logo" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>">
		    	<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
		    </a>
	    <?php } ?>
	    
	    <hgroup>
	        
			<h1 class="site-title"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		      	
		</hgroup>

		<?php if ( isset( $woo_options['woo_ad_top'] ) && $woo_options['woo_ad_top'] == 'true' ) { ?>
        <div id="topad">
			<?php
				if ( isset( $woo_options['woo_ad_top_adsense'] ) && $woo_options['woo_ad_top_adsense'] != '' ) {
					echo stripslashes( $woo_options['woo_ad_top_adsense'] );
				} else {
					if ( isset( $woo_options['woo_ad_top_url'] ) && isset( $woo_options['woo_ad_top_image'] ) )
			?>
				<a href="<?php echo $woo_options['woo_ad_top_url']; ?>"><img src="<?php echo $woo_options['woo_ad_top_image']; ?>" width="468" alt="advert" /></a>
			<?php } ?>
		</div><!-- /#topad -->
        <?php } ?>
        
	<nav id="navigation" class="col-right" role="navigation">
		<?php
		if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
			wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
		} else {
		?>
        <ul id="main-nav" class="nav fl">
			<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
			<li class="<?php echo $highlight; ?>"><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
			<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
		</ul><!-- /#nav -->
        <?php } ?>
	</nav><!-- /#navigation -->
  
	
	</header><!-- /#header -->
	
	</div><!-- /#header-wrap -->
