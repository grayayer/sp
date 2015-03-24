<?php 

/*********Gray's custom funcitons***********/

// add the function to the init hook
add_action( 'init', 'woo_add_googlefonts', 20 );
 

// add a font to the $google_fonts variable
function woo_add_googlefonts () {
    global $google_fonts;
    $google_fonts[] = array( 'name' => 'Fugaz One', 'variant' => ':r,b,i,bi')
	;
}


/* Remove the "Links" Menu Item */
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
     remove_menu_page('link-manager.php');
}

//*meta box addtion

// custom admin login logo 
function custom_login_logo() {
	echo '
	<style type="text/css">
	
	h1 a { background-image: url('.get_bloginfo('stylesheet_directory').'/images/custom-login-logo.png) !important;
	padding-bottom: 70px !important;
	background-size: 326px 110px !important;
	}
	
	#login { padding: 50px 0 0; }
	
	</style>';
}
add_action('login_head', 'custom_login_logo');

/* 	DOESN'T WORK SO WELL AFTER WP VERSION 3.4.1
// changing the login page URL
    function put_my_url(){
    return bloginfo('url'); // changes the url link from wordpress.org to your blog or website's url
    }
    add_filter('login_headerurl', 'put_my_url');

// changing the login page URL hover text
    function put_my_title(){
    return bloginfo('name'); // changing the title from "Powered by WordPress" to whatever you wish
    }
    add_filter('login_headertitle', 'put_my_title');
*/

/**
 * This order's the shop automatically by most recent items added. - OUTDATED AS OF 5-10-12  because of new default sorting feature
add_filter('woocommerce_default_catalog_orderby', 'woo_custom_orderby');

	function woo_custom_orderby() {

		return 'date';// Can also use title and price

	}
	
	 **/


// Custom Query Filter - doesn't actually work.
add_action('pre_get_posts', 'woo_custom_query_filter' );
function woo_custom_query_filter( $query ) {

  global $wp_query;

  if ($query->is_post_type_archive('press')) {

  	$query->set('meta_key','_publication_date');
  	$query->set('orderby','meta_value_num');
  	$query->set('order','DESC');

  	$query->parse_query();
  }

  return $query;

}



/* list the event posts in descending order of the event date that they are occurring, rather than the post published date

add_filter( 'woo_events_query_order_direction', 'woo_custom_events_query_order_direction' );

function woo_custom_events_query_order_direction ( $direction ) {
	return 'ASC';
} // End woo_custom_events_query_order_direction()

*/

/*Turn On More Buttons in the WordPress Visual Editor
function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}

add_filter("mce_buttons_3", "add_more_buttons");
*/
?>