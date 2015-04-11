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



/* list the event posts in descending order of the event date that they are occurring, rather than the post published date*/

add_filter( 'woo_events_query_order_direction', 'woo_custom_events_query_order_direction' );

function woo_custom_events_query_order_direction ( $order ) {
	return 'DESC';
} 
// End woo_custom_events_query_order_direction()



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


##################################################################

// enable images in media uploader

##################################################################
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

##################################################################

// display images on media uploader and feature images

##################################################################

function fix_svg_thumb_display() {
  echo '<style> td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail { width: 100% !important; height: auto !important; } </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

#########

?>