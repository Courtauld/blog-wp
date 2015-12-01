<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'COURTAULD_VERSION', 1.0 );


// Enqueue Styles and Scripts

function courtauld_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	
	// add fitvid
	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), COURTAULD_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), COURTAULD_VERSION, true );
    
}
add_action( 'wp_enqueue_scripts', 'courtauld_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

// Add a custom Header image, and allow users to edit it, also define defaults
$defaults = array(
	'default-image'          => get_template_directory_uri() . '/images/header.jpg',
	'width'                  => 1800,
	'height'                 => 256,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '#FEFEFE',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

/* Register widgetised areas */
function courtauld_register_sidebars() {
	// Primary Widget area
	register_sidebar( array(
		'name' => __( 'Sidebar', 'courtauld-blogs' ),
		'id' => 'primary-widget-area',
		'description' => __( 'Here you can put one or two of your main widgets (like an intro text, your page navigation or some social site links) in the right hand sidebar.', 'courtauld-blogs' ),
		'before_widget' => '<div id="%1$s" class="primary-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="primary-widget-title">',
		'after_title' => '</h3>',
	) );
}
/* Register sidebars by running ari_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'courtauld_register_sidebars' );

// Add featured images to post editing pages
add_theme_support( 'post-thumbnails' );

// Add extra social media links to profiles, and remove Yahoo, AOL, and XMPP

function modify_user_contact_methods( $user_contact ) {

	/* Add user contact methods */
	$user_contact['twitter'] = __( 'Twitter Username' );
    $user_contact['facebook'] = __( 'Facebook URL' );
    $user_contact['instagram'] = __( 'instagram Username' );
    $user_contact['pinterest'] = __( 'Pinterest Username' );

	/* Remove user contact methods */
	unset( $user_contact['aim'] );
	unset( $user_contact['jabber'] );
    unset( $user_contact['yim']);

	return $user_contact;
}
add_filter( 'user_contactmethods', 'modify_user_contact_methods' );

// Allow the Theme Customiser to change the logo!!!

function courtauld_blogs_theme_customizer( $wp_customize ) {
    $wp_customize->add_section( 'courtauld_blogs_logo_section' , array(
    'title'       => __( 'Logo', 'courtauld-blogs' ),
    'priority'    => 30,
    'description' => '<p><strong>Default Logo</strong></p><img src="http://courtauld.ac.uk/wp-content/themes/courtauld/images/base/logo.jpg" alt="The Courtauld Institute of Art"/> <p>Upload a logo to replace the default Courtauld Institute logo.</p><p>Please use PNG images, as these will not blur.</p>',
) );
    
    $wp_customize->add_setting( 'courtauld_blogs_logo' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'courtauld_blogs_logo', array(
    'label'    => __( 'Replacement Logo', 'courtauld-blogs' ),
    'section'  => 'courtauld_blogs_logo_section',
    'settings' => 'courtauld_blogs_logo',
) ) );
    
}
add_action( 'customize_register', 'courtauld_blogs_theme_customizer' );


// Put a caption beneath the featured image if it has one!

function the_post_thumbnail_caption() {
 global $post;

 $thumbnail_id    = get_post_thumbnail_id($post->ID);
 $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
   return '<p class="wp-caption-text">'.$thumbnail_image[0]->post_excerpt.'</p>';
  } else {
    return;
  }
}

// Hide Meta Boxes
function customize_meta_boxes() {
     remove_meta_box('postcustom','post','normal');
}
add_action('admin_init','customize_meta_boxes');

// Filter Yoast Meta Priority
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

//Change Excerpt Read More
function new_excerpt_more( $more ) {
	return '<a class="read-more href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read more', 'your-text-domain' ) . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// END