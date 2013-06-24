<?php

require_once('lib/clean.php'); // do all the cleaning and enqueue here
require_once('lib/enqueue-sass.php'); 

require_once('lib/foundation.php'); // load Foundation specific functions like top-bar

/**********************
Add theme supports
**********************/
function reverie_theme_support() {
	// Add language supports. Please note that Reverie does not include language files, not yet
	load_theme_textdomain('reverie', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie')
	));

}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

// Custom Readmore link on Excerpt

function new_excerpt_more( $excerpt ) {
	return str_replace( '[...]', '...', $excerpt );
}
add_filter( 'wp_trim_excerpt', 'new_excerpt_more' );


// Register Talent post type
register_post_type('talent', array(	'label' => 'Talent','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'taxonomies' => array('city',),'labels' => array (
  'name' => 'Talent',
  'singular_name' => 'Talent',
  'menu_name' => 'Talent',
  'add_new' => 'Add Talent',
  'add_new_item' => 'Add New Talent',
  'edit' => 'Edit',
  'edit_item' => 'Edit Talent',
  'new_item' => 'New Talent',
  'view' => 'View Talent',
  'view_item' => 'View Talent',
  'search_items' => 'Search Talent',
  'not_found' => 'No Talent Found',
  'not_found_in_trash' => 'No Talent Found in Trash',
  'parent' => 'Parent Talent',
),) );

// Register Custom Post Type
function custom_post_type() {
	$labels = array(
		'name'                => _x( 'Booking Weeks', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Booking Week', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Bookings', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Week:', 'text_domain' ),
		'all_items'           => __( 'All Weeks', 'text_domain' ),
		'view_item'           => __( 'View Week', 'text_domain' ),
		'add_new_item'        => __( 'Add New Week', 'text_domain' ),
		'add_new'             => __( 'New Week', 'text_domain' ),
		'edit_item'           => __( 'Edit Week', 'text_domain' ),
		'update_item'         => __( 'Update Week', 'text_domain' ),
		'search_items'        => __( 'Search weeks', 'text_domain' ),
		'not_found'           => __( 'No weeks found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No weeks found in Trash', 'text_domain' ),
	);

	$args = array(
		'label'               => __( 'bookings', 'text_domain' ),
		'description'         => __( 'Booking Weeks', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array('title','revisions',),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);

	register_post_type( 'bookings', $args );
}

register_taxonomy('city',array (
  0 => 'bookings',
),array( 'hierarchical' => false,'label' => 'Cities','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'City') );



// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

register_post_type('menus', array(	'label' => 'Menus','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'supports' => array('title','revisions','thumbnail',),'labels' => array (
  'name' => 'Menus',
  'singular_name' => 'Menu',
  'menu_name' => 'Menus',
  'add_new' => 'Add Menu',
  'add_new_item' => 'Add New Menu',
  'edit' => 'Edit',
  'edit_item' => 'Edit Menu',
  'new_item' => 'New Menu',
  'view' => 'View Menu',
  'view_item' => 'View Menu',
  'search_items' => 'Search Menus',
  'not_found' => 'No Menus Found',
  'not_found_in_trash' => 'No Menus Found in Trash',
  'parent' => 'Parent Menu',
),) );