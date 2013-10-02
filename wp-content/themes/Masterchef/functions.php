<?php // FORCE UPDATE HERE

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
	 add_image_size( 'news-thumb', 576, 432, true ); //(cropped)
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('gallery', 'video'));
	
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
	echo '<p class="byline author"><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s.', 'reverie'), get_the_time('l, F jS, Y')) .'</time></p>';
}


/**
 * Convert a string to the file/URL safe "slug" form
 *
 * @param string $string the string to clean
 * @param bool $is_filename TRUE will allow additional filename characters
 * @return string
 */
function sanitize($string = '', $is_filename = FALSE)
{
 // Replace all weird characters with dashes
 $string = preg_replace('/[^\w\-'. ($is_filename ? '~_\.' : ''). ']+/u', '-', $string);

 // Only allow one dash separator at a time (and make string lowercase)
 return mb_strtolower(preg_replace('/--+/u', '-', $string), 'UTF-8');
}



// Custom Readmore link on Excerpt

function new_excerpt_more( $excerpt ) {
	return str_replace( '[...]', '...', $excerpt );
}
add_filter( 'wp_trim_excerpt', 'new_excerpt_more' );


// Register Talent post type
register_post_type('talent', array(	'label' => 'Talent','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','revisions','thumbnail',),'labels' => array (
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


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_bookings',
		'title' => 'Bookings',
		'fields' => array (
			array (
				'key' => 'field_51c8e2131117a',
				'label' => 'Defaults',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'multiple' => 0,
				'allow_null' => 0,
				'choices' => array (
					'sydney' => 'Sydney',
					'melbourne' => 'Melbourne',
				),
				'default_value' => '',
				'key' => 'field_51c8da8dd171b',
				'label' => 'City',
				'name' => 'city',
				'type' => 'select',
			),
			array (
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
				'key' => 'field_51c8db02d171d',
				'label' => 'Start Date (Monday)',
				'name' => 'start_date',
				'type' => 'date_picker',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8db34d171e',
				'label' => 'Default Paragraph Text',
				'name' => 'default_paragraph',
				'type' => 'wysiwyg',
			),
			array (
				'key' => 'field_51c8e2221117b',
				'label' => 'Weekly Boxes',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Default Boxes</h1>',
				'key' => 'field_51c8db72d171f',
				'label' => 'Boxes',
				'name' => '',
				'type' => 'message',
			),
			array (
				'message' => '<h2>Box 1</h2>',
				'key' => 'field_51c8dba3d1720',
				'label' => 'Box 1',
				'name' => '',
				'type' => 'message',
			),
			array (
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'key' => 'field_51c8dc6dd1723',
				'label' => 'Image',
				'name' => 'default_box_1_image',
				'type' => 'image',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8dd0ed1724',
				'label' => 'Text',
				'name' => 'default_box_1_text',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8dd84d1729',
				'label' => 'Internal Link',
				'name' => 'default_box_1_internal_link',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8dddcd172c',
				'label' => 'External Link',
				'name' => 'default_box_1_external_link',
				'type' => 'text',
				'instructions' => 'Please include the http://',
			),
			array (
				'message' => '<h2>Box 2</h2>',
				'key' => 'field_51c8dbb4d1722',
				'label' => 'Box 2',
				'name' => '',
				'type' => 'message',
			),
			array (
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'key' => 'field_51c8dd31d1726',
				'label' => 'Image',
				'name' => 'default_box_2_image',
				'type' => 'image',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8dd58d1728',
				'label' => 'Text',
				'name' => 'default_box_2_text',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8ddb4d172b',
				'label' => 'Internal Link',
				'name' => 'default_box_2_internal_link',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8ddfdd172e',
				'label' => 'External Link',
				'name' => 'default_box_2_external_link',
				'type' => 'text',
				'instructions' => 'Please include the http://',
			),
			array (
				'message' => '<h2>Box 3</h2>',
				'key' => 'field_51c8dbb3d1721',
				'label' => 'Box 3',
				'name' => '',
				'type' => 'message',
			),
			array (
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'key' => 'field_51c8dd31d1725',
				'label' => 'Image',
				'name' => 'default_box_3_image',
				'type' => 'image',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8dd57d1727',
				'label' => 'Text',
				'name' => 'default_box_3_text',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8ddb3d172a',
				'label' => 'Internal Link',
				'name' => 'default_box_3_internal_link',
				'type' => 'text',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8ddfcd172d',
				'label' => 'External Link',
				'name' => 'default_box_3_external_link',
				'type' => 'text',
				'instructions' => 'Please include the http://',
			),
			array (
				'key' => 'field_51c8de4ad172f',
				'label' => 'TUE',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Tuesday</h1>',
				'key' => 'field_51c8e2431117c',
				'label' => 'Tuesday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8de6bd1730',
				'label' => 'Sold Out',
				'name' => 'tue_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8de6123456',
				'label' => 'Closed',
				'name' => 'tue_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8dedcd1731',
				'label' => 'Paragraph Text',
				'name' => 'tue_paragraph',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8df09d1732',
				'label' => 'Booking Link',
				'name' => 'tue_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8df5fd1733',
				'label' => 'Announcements',
				'name' => 'tue_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8df75d1734',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
			array (
				'key' => 'field_51c8dfbed1739',
				'label' => 'WED',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Wednesday</h1>',
				'key' => 'field_51c8e2511117d',
				'label' => 'Wednesday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03ed173e',
				'label' => 'Sold Out',
				'name' => 'wed_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03134567',
				'label' => 'Closed',
				'name' => 'wed_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8e0b8d1743',
				'label' => 'Paragraph Text',
				'name' => 'wed_paragraph_text',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8e118d1748',
				'label' => 'Booking Link',
				'name' => 'wed_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8e16fd1749',
				'label' => 'Announcements',
				'name' => 'wed_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8e16fd174a',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
			array (
				'key' => 'field_51c8dfbed1738',
				'label' => 'THUR',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Thursday</h1>',
				'key' => 'field_51c8e2651117e',
				'label' => 'Thursday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03dd173d',
				'label' => 'Sold Out',
				'name' => 'thur_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03145678',
				'label' => 'Closed',
				'name' => 'thur_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8e0b7d1742',
				'label' => 'Paragraph Text',
				'name' => 'thur_paragraph_text',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8e118d1747',
				'label' => 'Booking Link',
				'name' => 'thur_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8e181d1751',
				'label' => 'Announcements',
				'name' => 'thurs_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8e181d1752',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
			array (
				'key' => 'field_51c8dfbdd1737',
				'label' => 'FRI',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Friday</h1>',
				'key' => 'field_51c8e27811180',
				'label' => 'Friday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03dd173c',
				'label' => 'Sold Out',
				'name' => 'fri_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e0312568',
				'label' => 'Closed',
				'name' => 'fri_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8e0b7d1741',
				'label' => 'Paragraph Text',
				'name' => 'fri_paragraph_text',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8e115d1746',
				'label' => 'Booking Link',
				'name' => 'fri_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8e180d174f',
				'label' => 'Announcements',
				'name' => 'fri_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8e180d1750',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
			array (
				'key' => 'field_51c8dfbcd1736',
				'label' => 'SAT',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Saturday</h1>',
				'key' => 'field_51c8e27d11181',
				'label' => 'Saturday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03cd173b',
				'label' => 'Sold Out',
				'name' => 'sat_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e016587',
				'label' => 'Closed',
				'name' => 'sat_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8e0b5d1740',
				'label' => 'Paragraph Text',
				'name' => 'sat_paragraph_text',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8e114d1745',
				'label' => 'Booking Link',
				'name' => 'sat_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8e180d174d',
				'label' => 'Announcements',
				'name' => 'sat_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8e180d174e',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
			array (
				'key' => 'field_51c8dfbcd1735',
				'label' => 'SUN',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'message' => '<h1>Sunday</h1>',
				'key' => 'field_51c8e2761117f',
				'label' => 'Sunday',
				'name' => '',
				'type' => 'message',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e03cd173a',
				'label' => 'Sold Out',
				'name' => 'sun_sold_out',
				'type' => 'true_false',
			),
			array (
				'default_value' => 0,
				'message' => '',
				'key' => 'field_51c8e0123468',
				'label' => 'Closed',
				'name' => 'sun_closed',
				'type' => 'true_false',
			),
			array (
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'default_value' => '',
				'key' => 'field_51c8e0a4d173f',
				'label' => 'Paragraph Text',
				'name' => 'sun_paragraph_text',
				'type' => 'wysiwyg',
			),
			array (
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_51c8e114d1744',
				'label' => 'Booking Link',
				'name' => 'sun_booking_link',
				'type' => 'text',
			),
			array (
				'key' => 'field_51c8e17fd174b',
				'label' => 'Announcements',
				'name' => 'sun_announcements',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'default_value' => '',
						'formatting' => 'html',
						'key' => 'field_51c8e17fd174c',
						'label' => 'Text',
						'name' => 'text',
						'type' => 'text',
						'column_width' => '',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Announcement',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'bookings',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'slug',
				6 => 'author',
				7 => 'format',
				8 => 'featured_image',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}