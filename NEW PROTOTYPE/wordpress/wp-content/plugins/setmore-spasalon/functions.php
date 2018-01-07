<?php
/**
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 */
if ( ! function_exists( 'setmore_spasalon_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function setmore_spasalon_setup() {
		
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'setmore-spasalon', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	//add_theme_support( 'title-tag' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'setmore-spasalon' ),
		'secondary' => __('Footer Menu', 'setmore-spasalon')
	) );

	add_theme_support('post-thumbnails'); 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	
	// custom backgrounds
	$setmore_spasalon_custom_background = array(
		// Background color default
		'default-color' => 'ffffff',
		'default-repeat'=>'no-repeat',
		'default-position-x'=>'center',
		'default-attachment' => 'fixed',
		// Background image default
		'default-image' => '',
		'wp-head-callback' => '_custom_background_cb'
	);
	add_theme_support('custom-background', $setmore_spasalon_custom_background );

	
	// adding post format support
	add_theme_support( 'post-formats', 
		array( 
			'aside', /* Typically styled without a title. Similar to a Facebook note update */
			'gallery', /* A gallery of images. Post will likely contain a gallery shortcode and will have image attachments */
			'link', /* A link to another site. Themes may wish to use the first link tag in the post content as the external link for that post. An alternative approach could be if the post consists only of a URL, then that will be the URL and the title (post_title) will be the name attached to the anchor for it */
			'image', /* A single image. The first <img /> tag in the post could be considered the image. Alternatively, if the post consists only of a URL, that will be the image URL and the title of the post (post_title) will be the title attribute for the image */
			'quote', /* A quotation. Probably will contain a blockquote holding the quote content. Alternatively, the quote may be just the content, with the source/author being the title */
			'status', /*A short status update, similar to a Twitter status update */
			'video', /* A single video. The first <video /> tag or object/embed in the post content could be considered the video. Alternatively, if the post consists only of a URL, that will be the video URL. May also contain the video as an attachment to the post, if video support is enabled on the blog (like via a plugin) */
			'audio', /* An audio file. Could be used for Podcasting */
			'chat' /* A chat transcript */
		)
	);
}
endif;
add_action( 'after_setup_theme', 'setmore_spasalon_setup' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'setmore_spasalon_content_width' ) ) :
	function setmore_spasalon_content_width() {
		global $content_width;
		if (!isset($content_width))
			$content_width = 550; /* pixels */
	}
endif;
add_action( 'after_setup_theme', 'setmore_spasalon_content_width' );


function setmore_spasalon_theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'setmore_spasalon_theme_slug_setup' );

/**
 * Title filter 
 */
if ( ! function_exists( 'setmore_spasalon_filter_wp_title' ) ) :
	function setmore_spasalon_filter_wp_title( $old_title, $sep, $sep_location ) {
		
		if ( is_feed() ) return $old_title;
	
		$site_name = get_bloginfo( 'name' );
		$site_description = get_bloginfo( 'description' );
		// add padding to the sep
		$ssep = ' ' . $sep . ' ';
		
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			return $site_name . ' | ' . $site_description;
		} else {
			// find the type of index page this is
			if( is_category() ) $insert = $ssep . __( 'Category', 'setmore-spasalon' );
			elseif( is_tag() ) $insert = $ssep . __( 'Tag', 'setmore-spasalon' );
			elseif( is_author() ) $insert = $ssep . __( 'Author', 'setmore-spasalon' );
			elseif( is_year() || is_month() || is_day() ) $insert = $ssep . __( 'Archives', 'setmore-spasalon' );
			else $insert = NULL;
			 
			// get the page number we're on (index)
			if( get_query_var( 'paged' ) )
			$num = $ssep . __( 'Page ', 'setmore-spasalon' ) . get_query_var( 'paged' );
			 
			// get the page number we're on (multipage post)
			elseif( get_query_var( 'page' ) )
			$num = $ssep . __( 'Page ', 'setmore-spasalon' ) . get_query_var( 'page' );
			 
			// else
			else $num = NULL;
			 
			// concoct and return new title
			return $site_name . $insert . $old_title . $num;
			
		}
	
	}
endif;
// call our custom wp_title filter, with normal (10) priority, and 3 args
add_filter( 'wp_title', 'setmore_spasalon_filter_wp_title', 10, 3 );


/*******************************************************************
* These are settings for the Theme Customizer in the admin panel. 
*******************************************************************/
if ( ! function_exists( 'setmore_spasalon_theme_customizer' ) ) :
	function setmore_spasalon_theme_customizer( $wp_customize ) {
		
		$wp_customize->add_panel( 'theme_background_settings', array(
	    	'priority' => 11,
	    	'capability' => 'edit_theme_options',
	    	'theme_supports' => '',
	    	'title' => __( 'Images -  All Pages', 'setmore-spasalon' ),
	    	'description' => __( 'Description of what this panel does.', 'setmore-spasalon' ),
		) );
		
		/* Background Image for Service Page */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_service' , array(
			'title'       => __( 'Background Image - Service&rsquo;s', 'setmore-spasalon' ),
			'priority'    => 34,
			'description' => __( 'Upload a background image for your services page', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_service', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_service', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_service',
			'settings' => 'setmore_spasalon_logo_service',
		) ) );
		
		/* Background Image for Staff Page */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_staff' , array(
			'title'       => __( 'Background Image - Staff&rsquo;s', 'setmore-spasalon' ),
			'priority'    => 35,
			'description' => __( 'Upload a background image for your Staff&rsquo;s page', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_staff', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_staff', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_staff',
			'settings' => 'setmore_spasalon_logo_staff',
		) ) );
		
		/* Background Image for About Us Page */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_aboutus' , array(
			'title'       => __( 'Background Image - About Us', 'setmore-spasalon' ),
			'priority'    => 36,
			'description' => __( 'Upload a background image for your About Us page', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_aboutus', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_aboutus', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_aboutus',
			'settings' => 'setmore_spasalon_logo_aboutus',
		) ) );
		
		/* Background Image for Contact Us Us Page */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_contactus' , array(
			'title'       => __( 'Background Image - Contact Us', 'setmore-spasalon' ),
			'priority'    => 37,
			'description' => __( 'Upload a background image for your Contact Us page', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_contactus', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_contactus', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_contactus',
			'settings' => 'setmore_spasalon_logo_contactus',
		) ) );
		
		/* Background Image for Booking Page */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_booking' , array(
			'title'       => __( 'Background Image - Booking Page', 'setmore-spasalon' ),
			'priority'    => 38,
			'description' => __( 'Upload a background image for your Booking page', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_booking', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_booking', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_booking',
			'settings' => 'setmore_spasalon_logo_booking',
		) ) );
		
		/* Background Image for Main Content */
		$wp_customize->add_section( 'setmore_spasalon_logo_section_main_content' , array(
			'title'       => __( 'Background Image - Main Content', 'setmore-spasalon' ),
			'priority'    => 39,
			'description' => __( 'Upload a background image for your main content', 'setmore-spasalon' ),
			'panel' => 'theme_background_settings',
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_logo_main_content', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'setmore_spasalon_logo_main_content', array(
			'label'    => __( '', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_logo_section_main_content',
			'settings' => 'setmore_spasalon_logo_main_content',
		) ) );
		
		
		/* color theme */
		$wp_customize->add_setting( 'setmore_spasalon_theme_color', array (
			'default' => '#27c3bb',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'setmore_spasalon_theme_color', array(
			'label'    => __( 'Theme Color Option', 'setmore-spasalon' ),
			'section'  => 'colors',
			'settings' => 'setmore_spasalon_theme_color',
			'priority' => 101,
		) ) );
		
		/* paragraph font-color theme */
		$wp_customize->add_setting( 'setmore_spasalon_theme_color_paragraph', array (
			'default' => '#788a95',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'setmore_spasalon_theme_color_paragraph', array(
			'label'    => __( 'Paragraph Color Option', 'setmore-spasalon' ),
			'section'  => 'colors',
			'settings' => 'setmore_spasalon_theme_color_paragraph',
			'priority' => 102,
		) ) );
		
		/* author bio in posts option */
		$wp_customize->add_section( 'setmore_spasalon_author_bio_section' , array(
			'title'       => __( 'Display Author Bio', 'setmore-spasalon' ),
			'priority'    => 32,
			'description' => __( 'Option to show/hide the author bio in the posts.', 'setmore-spasalon' ),
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_author_bio', array (
			'sanitize_callback' => 'esc_html',
		) );
		
		 $wp_customize->add_control('author_bio', array(
			'settings' => 'setmore_spasalon_author_bio',
			'label' => __('Show the author bio in posts?', 'setmore-spasalon'),
			'section' => 'setmore_spasalon_author_bio_section',
			'type' => 'checkbox',
		));
		
		/* slider options */
		
		$wp_customize->add_section( 'setmore_spasalon_slider_section' , array(
			'title'       => __( 'Slider Options', 'setmore-spasalon' ),
			'priority'    => 33,
			'description' => __( 'Adjust the behavior of the image slider.', 'setmore-spasalon' ),
		) );
		
		$wp_customize->add_setting( 'setmore_spasalon_slider_effect', array(
			'default' => 'scrollHorz',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_html',
		));
		
		$wp_customize->add_control( 'effect_select_box', array(
			'settings' => 'setmore_spasalon_slider_effect',
			'label' => __( 'Select Effect:', 'setmore-spasalon' ),
			'section' => 'setmore_spasalon_slider_section',
			'type' => 'select',
			'choices' => array(
				'scrollHorz' => 'Horizontal (Default)',
				'scrollVert' => 'Vertical',
				'tileSlide' => 'Tile Slide',
				'tileBlind' => 'Blinds',
				'shuffle' => 'Shuffle',
			),
		));
		
		
		$wp_customize->add_setting( 'setmore_spasalon_slider_timeout', array (
			'sanitize_callback' => 'esc_html',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'setmore_spasalon_slider_timeout', array(
			'label'    => __( 'Autoplay Speed in Seconds', 'setmore-spasalon' ),
			'section'  => 'setmore_spasalon_slider_section',
			'settings' => 'setmore_spasalon_slider_timeout',
		) ) );
	}
endif;
add_action('customize_register', 'setmore_spasalon_theme_customizer');

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'setmore_spasalon_sanitize_checkbox' ) ) :
	function setmore_spasalon_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
endif;

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'setmore_spasalon_sanitize_integer' ) ) :
	function setmore_spasalon_sanitize_integer( $input ) {
		return absint($input);
	}
endif;


/**
* Apply Color Scheme
*/
if ( ! function_exists( 'setmore_spasalon_apply_color' ) ) :
  function setmore_spasalon_apply_color() {
	 if ( get_theme_mod('setmore_spasalon_theme_color') ) {
	?>
	<style id="color-settings">
	<?php if ( get_theme_mod('setmore_spasalon_theme_color') ) : ?>
		.pagination li a:hover, .pagination li.active a, #nav-above .nav-next a, #nav-below .nav-next a, #image-navigation .next-image a, #nav-above .nav-previous a, #nav-below .nav-previous a,	#image-navigation .previous-image a, .commentlist .comment-reply-link, .commentlist .comment-reply-login, #respond #submit, .intro-copy-box, .inner-title-wrap, .post-content ol > li:before, .post-content ul > li:before, .about-us-team-title h1:before, table.two th, .staff-book-now, #button-blue, .crunchify-top{
			background-color: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?>;
		}
		.sendCopy label, .business-days, footer[role=contentinfo] {
			background: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?> !important;
		}
		.otw-button,.wrapup-button {
			background: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?>;
		}
		.feedback-input:focus, #book-now-button a, .panel-button, .staff-book-now:hover, .crunchify-top:hover,.otw-button:hover {
			border: 2px solid <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?>;
		}
		.main-page-post .grid-box:hover, .main-staff-post .grid-box:hover, .services-wrap .grid-box:hover{
			box-shadow: 1px 4px 10px 6px <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?>;
		}
		.staff-book-now:hover, .crunchify-top:hover, .otw-button:hover{
    		background: #fff !important;
    		color: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?> !important;
		}
		a, a:visited, #sidebar .widget-title, #reply-title, .latest-title, #alt-sidebar .widget-title, #wp-calendar caption, .about-us-contact-icon-text ul li strong, .about-us-email-icon-text ul li strong, #contact-us-info .widget-title, .widget-title, #contact-us-info #site-title>a, .custom_title h1, .staff-social-buttons a:link, .about-us-location-icon-text ul li strong, .contact-us-sidebar aside .widget-title, .feedback-input, .panel-textwidget h2, nav[role=navigation] .menu ul li>a:hover, .cost-detials table tr td span, footer .crunchify-top:hover .fa-hand-o-up, nav[role=navigation] .menu #menu-icon {
			color: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color')); ?>;
		}
	<?php endif; ?>
	</style>
	<?php	  
	} 
  }
endif;
add_action( 'wp_head', 'setmore_spasalon_apply_color' );


/**
* Apply Color Scheme
*/
if ( ! function_exists( 'setmore_spasalon_apply_color_paragraph' ) ) :
  function setmore_spasalon_apply_color_paragraph() {
	 if ( get_theme_mod('setmore_spasalon_theme_color_paragraph') ) {
	?>
	<style id="color-settings-paragraph">
	<?php if ( get_theme_mod('setmore_spasalon_theme_color_paragraph') ) : ?>
		p{
			color: <?php echo esc_attr(get_theme_mod('setmore_spasalon_theme_color_paragraph')); ?>;
		}
	<?php endif; ?>
	</style>
	<?php	  
	} 
  }
endif;
add_action( 'wp_head', 'setmore_spasalon_apply_color_paragraph' );




/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
if ( ! function_exists( 'setmore_spasalon_main_nav' ) ) :
function setmore_spasalon_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'theme_location' => 'primary', /* where in the theme it's assigned */
    		'container_class' => 'menu', /* div container class */
    		'fallback_cb' => 'setmore_spasalon_main_nav_fallback' /* menu fallback */
    	)
    );
}
endif;

if ( ! function_exists( 'setmore_spasalon_main_nav_fallback' ) ) :
	function setmore_spasalon_main_nav_fallback() { wp_page_menu( 'show_home=Home&container_class=menu' ); }
endif;

if ( ! function_exists( 'setmore_spasalon_footer_nav' ) ) :
function setmore_spasalon_footer_nav() {
	// display the wp3 menu if available
    wp_nav_menu( 
    	array( 
    		'theme_location' => 'secondary', /* where in the theme it's assigned */
    		'container_class' => 'footer-menu', /* container class */
    		'fallback_cb' => false,
    	)
    );
}
endif;

if ( ! function_exists( 'setmore_spasalon_enqueue_comment_reply' ) ) :
	function setmore_spasalon_enqueue_comment_reply() {
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
					wp_enqueue_script( 'comment-reply' );
			}
	 }
endif;
add_action( 'comment_form_before', 'setmore_spasalon_enqueue_comment_reply' );

if ( ! function_exists( 'setmore_spasalon_page_menu_args' ) ) :
	function setmore_spasalon_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
endif;
add_filter( 'wp_page_menu_args', 'setmore_spasalon_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function setmore_spasalon_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'setmore-spasalon' ),
		'id' => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Home Page Widget Area', 'setmore-spasalon' ),
		'id' => 'sidebar-alt',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Static Page Sidebar', 'setmore-spasalon' ),
		'id' => 'sidebar-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

}
add_action( 'widgets_init', 'setmore_spasalon_widgets_init' );

if ( ! function_exists( 'setmore_spasalon_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 */
function setmore_spasalon_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<nav id="<?php echo esc_attr($nav_id); ?>">
		<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'setmore-spasalon' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr; Previous', 'Previous post link', 'setmore-spasalon' ) . '</span>' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '<span class="meta-nav">' . _x( 'Next &rarr;', 'Next post link', 'setmore-spasalon' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'setmore-spasalon' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'setmore-spasalon' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif;


if ( ! function_exists( 'setmore_spasalon_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function setmore_spasalon_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'setmore-spasalon' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'setmore-spasalon' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>">
			<footer class="clearfix comment-head">
				<div class="comment-author vcard">
					<?php echo esc_url(get_avatar( $comment, 65 )); ?>
					<?php printf( __( '%s', 'setmore-spasalon' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'setmore-spasalon' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'setmore-spasalon' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'setmore-spasalon' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'setmore_spasalon_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function setmore_spasalon_posted_on() {
	printf( __( '<span class="sep meta-on">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="byline"> <span class="sep meta-by">by</span><span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'setmore-spasalon' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'setmore-spasalon' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'setmore_spasalon_body_classes' ) ) :
	function setmore_spasalon_body_classes( $classes ) {
		// Adds a class of single-author to blogs with only 1 published author
		if ( ! is_multi_author() ) {
			$classes[] = 'single-author';
		}
	
		return $classes;
	}
endif;
add_filter( 'body_class', 'setmore_spasalon_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 */
if ( ! function_exists( 'setmore_spasalon_categorized_blog' ) ) :
function setmore_spasalon_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so setmore_spasalon_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so setmore_spasalon_categorized_blog should return false
		return false;
	}
}
endif;
/**
 * Flush out the transients used in setmore_spasalon_categorized_blog
 */
if ( ! function_exists( 'setmore_spasalon_category_transient_flusher' ) ) :
	function setmore_spasalon_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'all_the_cool_cats' );
	}
endif;
add_action( 'edit_category', 'setmore_spasalon_category_transient_flusher' );
add_action( 'save_post', 'setmore_spasalon_category_transient_flusher' );

/**
 * Remove WP default gallery styling
 */
add_filter( 'use_default_gallery_style', '__return_false' );


/**
 * The Pagination Function
 */
if ( ! function_exists( 'setmore_spasalon_pagination' ) ) :
	function setmore_spasalon_pagination() {
	
		global $wp_query; 
		
		$big = 999999999;
		  
		$total_pages = $wp_query->max_num_pages;  
		  
		if ($total_pages > 1){  
		  
		  $current_page = max(1, get_query_var('paged'));  
			
		  echo '<div class="pagination">';  
			
		  echo paginate_links(array(  
			  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),  
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => __('&lsaquo; Prev', 'setmore-spasalon'),  
			  'next_text' => __('Next &rsaquo;', 'setmore-spasalon')  
			));  
		  
		  echo '</div>';  
			
		}
	
	}
endif;


if ( ! function_exists( 'setmore_spasalon_custom_pagination' ) ) :
	function setmore_spasalon_custom_pagination() {
		
		global $alt_posts;
		
		$big = 999999999;
		  
		$total_pages = $alt_posts->max_num_pages; 
		  
		if ($total_pages > 1){
		  
		  $alt_posts->query_vars['paged'] > 1 ? $current_page = $alt_posts->query_vars['paged'] : $current_page = 1;
			
		  echo '<div class="pagination">';  
			
		  echo paginate_links(array(  
			  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			  'current' => $current_page,  
			  'total' => $total_pages,  
			  'prev_text' => __('&lsaquo; Prev', 'setmore-spasalon'),  
			  'next_text' => __('Next &rsaquo;', 'setmore-spasalon')  
			));  
		  
		  echo '</div>';  
			
		}
	
	}
endif;

/**
 * Add "Untitled" for posts without title, 
 */
function setmore_spasalon_post_title($title) {
	if ($title == '') {
		return __('Untitled', 'setmore-spasalon');
	} else {
		return $title;
	}
}
add_filter('the_title', 'setmore_spasalon_post_title');

/**
 * Fix for W3C validation
 */
if ( ! function_exists( 'setmore_spasalon_w3c_valid_rel' ) ) :
	function setmore_spasalon_w3c_valid_rel( $text ) {
		$text = str_replace('rel="category tag"', 'rel="tag"', $text); return $text; 
	}
endif;
add_filter( 'the_category', 'setmore_spasalon_w3c_valid_rel' );

/*
 * Modernizr functions
 */
if ( ! function_exists( 'setmore_spasalon_modernizr_addclass' ) ) :
	function setmore_spasalon_modernizr_addclass($output) {
		return $output . ' class="no-js"';
	}
endif;
add_filter('language_attributes', 'setmore_spasalon_modernizr_addclass');

if ( ! function_exists( 'setmore_spasalon_modernizr_script' ) ) :
	function setmore_spasalon_modernizr_script() {
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/library/js/modernizr-2.6.2.min.js', false, '2.6.2');
	}  
endif;  
add_action('wp_enqueue_scripts', 'setmore_spasalon_modernizr_script');

/**
 * Excerpt
 */
if ( ! function_exists( 'setmore_spasalon_excerpt' ) ) :
	function setmore_spasalon_excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}	
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;
	}
endif;


/**
 * Get Embed Video for post format video
 */
if ( ! function_exists('setmore_spasalon_featured_video') ) :
	function setmore_spasalon_featured_video( &$content ) {
		$url = trim( array_shift( explode( "\n", $content ) ) );
		$w = get_option( 'embed_size_w' );
		if ( !is_single() )
		$url = str_replace( '448', $w, $url );
		
		if ( ( 0 === strpos( $url, 'http://' ) ) || ( 0 === strpos( $url, 'https://' ) ) || ( 0 === strpos( $url, '//www' ) ) ) {
			 echo apply_filters( 'the_content', $url );
			 $content = trim( str_replace( $url, '', $content ) ); 
			 } else if ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
			 $h = get_option( 'embed_size_h' );
			 if ( !empty( $h ) ) {
			 if ( $w === $h ) $h = ceil( $w * 0.75 );
			
			 $url = preg_replace( 
			 array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ), 
			 array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ), 
			 $url 
			 );
		 }
		
		echo esc_url($url);
			$content = trim( str_replace( $url, '', $content ) ); 
		}
	}
endif;

/**
 * Ignore Sticky
 */
 
function setmore_spasalon_ignore_sticky($query) {
    $query->set( 'ignore_sticky_posts', true );
}
add_action('pre_get_posts', 'setmore_spasalon_ignore_sticky');


/**
 * Enqueue scripts & styles
 */
 
 
 add_action( 'wp_enqueue_scripts', 'setmore_spasalon_awesome' );
/**
 * Register the awesomeness and add IE7 support
 *
 * @global $wp_styles
 * @global $is_IE
 */
function setmore_spasalon_awesome() {
	global $wp_styles, $is_IE;
	wp_enqueue_style( 'prefix-font-awesome', get_template_directory_uri() .'/library/font-awesome-4.4.0/css/font-awesome.min.css', array(), '4.3.0' );
	if ( $is_IE ) {
		wp_enqueue_style( 'prefix-font-awesome-ie', get_template_directory_uri() .'/library/font-awesome-4.4.0/css/font-awesome-ie7.min.css', array('prefix-font-awesome'), '3.2.0' );
		// Add IE conditional tags for IE 7 and older
		$wp_styles->add_data( 'prefix-font-awesome-ie', 'conditional', 'lte IE 7' );
	}
}
 
if ( ! function_exists( 'setmore_spasalon_custom_scripts' ) ) :
	function setmore_spasalon_custom_scripts() {
		wp_register_script( 'setmore_script', get_template_directory_uri() . '/library/js/short-booking-page-class.js');
		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/library/js/imagesloaded.pkgd.min.js');
		wp_register_script( 'cycle2', get_template_directory_uri() . '/library/js/jquery.cycle2.min.js' );
		wp_register_script( 'cycle2_tile', get_template_directory_uri() . '/library/js/jquery.cycle2.tile.min.js' );
		wp_register_script( 'cycle2_shuffle', get_template_directory_uri() . '/library/js/jquery.cycle2.shuffle.min.js' );
		wp_register_script( 'cycle2_scrollvert', get_template_directory_uri() . '/library/js/jquery.cycle2.scrollVert.min.js' );
		wp_enqueue_script( 'setmore_spasalon_custom_js', get_template_directory_uri() . '/library/js/scripts.js', array( 'jquery', 'setmore_script', 'imagesloaded', 'cycle2', 'cycle2_tile', 'cycle2_shuffle', 'cycle2_scrollvert', 'jquery-masonry' ), '1.0.0' );
		wp_enqueue_style( 'setmore_spasalon_style', get_stylesheet_uri() );
		wp_enqueue_style( 'gwfc-customizer-css', get_template_directory_uri() .'/gwfc.css');
		wp_enqueue_style( 'setmore-spasalon-droid-sans-customizer-css', '//fonts.googleapis.com/css?family=Droid+Sans');
		wp_enqueue_style( 'setmore-spasalon-noto-sans-customizer-css', '//fonts.googleapis.com/css?family=Noto+Sans:400,400italic,700,700italic');
	}
endif;
add_action('wp_enqueue_scripts', 'setmore_spasalon_custom_scripts');


/**
 *
 * This script will prompt the users to install the plugin recommended to
 * enable the "People" custom post type for this theme.
 *
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'setmore_spasalon_register_recommended_plugins' );
/**
 * Register the recommended plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function setmore_spasalon_register_recommended_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'SetMore Button Customise',
			'slug'      => 'setmore-custom-book-now-button',
			'required'  => false,
		),
		array(
			'name'      => 'SetMore Theme - Custom Post Types',
			'slug'      => 'service-provider-profile-cpt',
			'required'  => false,
		),
	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'setmore-spasalon';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> $theme_text_domain,         		// Text domain - likely want to be the same as your theme.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

// Theme Settings panel
function setmore_spasalon_theme_settings_register( $wp_customize ) {

	$wp_customize->add_panel( 'theme_settings', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'setmore-spasalon' ),
	    'description' => __( 'Description of what this panel does.', 'setmore-spasalon' ),
	) );

// Booking Page section
	
	$wp_customize->add_section( 'service_and_class', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Services Or Classes', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );
	
    $wp_customize->add_setting( 'booking_default', array(
    	'default' => '',
    	'type' => 'option',
    	'sanitize_callback' => 'esc_html',
	) );
 
	$wp_customize->add_control( 'booking_default', array(
    	'label' => 'Booking Page Default',
    	'section' => 'service_and_class',
    	'type' => 'radio',
    	'choices' => array(
        	'services' => 'Services',
        	'classes'  => 'Classes',
    	),
	) );
	
	$wp_customize->add_setting( 'setmore_currency', array(
		'default' => '$',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'setmore_currency', array(
	    'type' => 'textfield',
	    'priority' => 11,
	    'section' => 'service_and_class',
	    'label' => __( 'SetMore Currency', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
//Home Page Section
	$wp_customize->add_section( 'home_page', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home Page', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'company_key', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'company_key', array(
	    'type' => 'textfield',
	    'priority' => 11,
	    'section' => 'home_page',
	    'label' => __( 'Company Key', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'booking_page_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( 'booking_page_url', array(
	    'type' => 'url',
	    'priority' => 12,
	    'section' => 'home_page',
	    'label' => __( 'Booking Page URL', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'header_button_name', array(
		'default' => 'Book Now',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'header_button_name', array(
	    'type' => 'textfield',
	    'priority' => 13,
	    'section' => 'home_page',
	    'label' => __( 'Header Button - Name', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'slider_button_name', array(
		'default' => 'Book a Free Session',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'slider_button_name', array(
	    'type' => 'textfield',
	    'priority' => 14,
	    'section' => 'home_page',
	    'label' => __( 'Slider Button - Name', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'home_page_header', array(
		'default' => 'A Perfect Theme For',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'home_page_header', array(
	    'type' => 'textfield',
	    'priority' => 15,
	    'section' => 'home_page',
	    'label' => __( 'Home Page Header', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'home_page_sub_hearder_color', array(
		'default' => 'Salons',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'home_page_sub_hearder_color', array(
	    'type' => 'textfield',
	    'priority' => 16,
	    'section' => 'home_page',
	    'label' => __( 'Home Page SubHeader(Color Area)', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'home_page_sub_hearder', array(
		'default' => 'From Setmore',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'home_page_sub_hearder', array(
	    'type' => 'textfield',
	    'priority' => 17,
	    'section' => 'home_page',
	    'label' => __( 'Home Page SubHeader', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'home_page_description', array(
		'default' => 'Perfect Hair Needs Pefect Care',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'home_page_description', array(
	    'type' => 'textarea',
	    'priority' => 18,
	    'section' => 'home_page',
	    'label' => __( 'Description', 'setmore-spasalon' ),
	    'description' => '',
	) );

//Contact Detail Section
	$wp_customize->add_section( 'contact_page', array(
	    'priority' => 11,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Contact Details', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'address', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'address', array(
	    'type' => 'textarea',
	    'priority' => 19,
	    'section' => 'contact_page',
	    'label' => __( 'Address', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'about_us', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'about_us', array(
	    'type' => 'textarea',
	    'priority' => 20,
	    'section' => 'contact_page',
	    'label' => __( 'About US ( short description )', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'phone', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'phone', array(
	    'type' => 'textfield',
	    'priority' => 21,
	    'section' => 'contact_page',
	    'label' => __( 'Phone', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'facsimile', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'facsimile', array(
	    'type' => 'textfield',
	    'priority' => 22,
	    'section' => 'contact_page',
	    'label' => __( 'Facsimile', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'email', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'esc_html',
	) );

	$wp_customize->add_control( 'email', array(
	    'type' => 'email',
	    'priority' => 23,
	    'section' => 'contact_page',
	    'label' => __( 'Email', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
//Social Medial Section
	
	$wp_customize->add_section( 'social_media_links', array(
	    'priority' => 12,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Social Media Links', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'linkedin', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'linkedin', array(
	    'type' => 'url',
	    'priority' => 24,
	    'section' => 'social_media_links',
	    'label' => __( 'LinkedIn', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'twitter', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'twitter', array(
	    'type' => 'url',
	    'priority' => 25,
	    'section' => 'social_media_links',
	    'label' => __( 'Twitter', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'google_plus', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'google_plus', array(
	    'type' => 'url',
	    'priority' => 26,
	    'section' => 'social_media_links',
	    'label' => __( 'Google+', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
	$wp_customize->add_setting( 'youtube', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'youtube', array(
	    'type' => 'url',
	    'priority' => 27,
	    'section' => 'social_media_links',
	    'label' => __( 'Youtube', 'setmore-spasalon' ),
	    'description' => '',
	) );
	
//Business Hours Section

	$wp_customize->add_section( 'business_hours', array(
	    'priority' => 13,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Business Hours', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'sun_start', array(
		'default' => 'CLOSED',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sun_start', array(
	    'type' => 'textfield',
	    'priority' => 28,
	    'section' => 'business_hours',
	    'label' => __( 'Sunday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
	$wp_customize->add_setting( 'mon_start', array(
		'default' => '8:00AM - 5:00PM',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mon_start', array(
	    'type' => 'textfield',
	    'priority' => 29,
	    'section' => 'business_hours',
	    'label' => __( 'Monday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
	$wp_customize->add_setting( 'tue_start', array(
		'default' => '8:00AM - 5:00PM',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'tue_start', array(
	    'type' => 'textfield',
	    'priority' => 30,
	    'section' => 'business_hours',
	    'label' => __( 'Tuesday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
	$wp_customize->add_setting( 'wed_start', array(
		'default' => '8:00AM - 5:00PM',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'wed_start', array(
	    'type' => 'textfield',
	    'priority' => 31,
	    'section' => 'business_hours',
	    'label' => __( 'Wednesday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
	$wp_customize->add_setting( 'thu_start', array(
		'default' => '8:00AM - 5:00PM',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'thu_start', array(
	    'type' => 'textfield',
	    'priority' => 32,
	    'section' => 'business_hours',
	    'label' => __( 'Thursday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
	$wp_customize->add_setting( 'fri_start', array(
		'default' => '8:00AM - 5:00PM',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'fri_start', array(
	    'type' => 'textfield',
	    'priority' => 33,
	    'section' => 'business_hours',
	    'label' => __( 'Friday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );	
	
	$wp_customize->add_setting( 'sat_start', array(
		'default' => 'CLOSED',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'sat_start', array(
	    'type' => 'textfield',
	    'priority' => 34,
	    'section' => 'business_hours',
	    'label' => __( 'Saturday', 'setmore-spasalon' ),
	    'description' => '',
	    'input_attrs' => array(
	        'class' => 'example-class',
	        'style' => 'margin: auto;width: 60%;border:3px solid #24afa9;padding: 10px;',
	    )
	) );
	
// Custom Label Section
	
	$wp_customize->add_section( 'custom_labels', array(
	    'priority' => 14,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Labels', 'setmore-spasalon' ),
	    'description' => '',
	    'panel' => 'theme_settings',
	) );

	$wp_customize->add_setting( 'telephone_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'telephone_custom', array(
	    'type' => 'text',
	    'priority' => 35,
	    'section' => 'custom_labels',
	    'label' => __( 'Telephone Enquiry', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
	
	$wp_customize->add_setting( 'facsimile_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'facsimile_custom', array(
	    'type' => 'text',
	    'priority' => 36,
	    'section' => 'custom_labels',
	    'label' => __( 'Facsimile', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
	
	$wp_customize->add_setting( 'email_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'email_custom', array(
	    'type' => 'text',
	    'priority' => 37,
	    'section' => 'custom_labels',
	    'label' => __( 'Email', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
	
	$wp_customize->add_setting( 'location_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'location_custom', array(
	    'type' => 'text',
	    'priority' => 38,
	    'section' => 'custom_labels',
	    'label' => __( 'Location', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
	
	$wp_customize->add_setting( 'hours_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'hours_custom', array(
	    'type' => 'text',
	    'priority' => 39,
	    'section' => 'custom_labels',
	    'label' => __( 'Business Hours', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
	
	$wp_customize->add_setting( 'expert_custom', array(
		'default' => '',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'expert_custom', array(
	    'type' => 'text',
	    'priority' => 40,
	    'section' => 'custom_labels',
	    'label' => __( 'Our Experts', 'setmore-spasalon' ),
	    'description' => 'Provide your desired label name',
	) );
}
add_action( 'customize_register', 'setmore_spasalon_theme_settings_register' );

// 	02. Include Controls, Options Register, Output
// =============================================================================

require_once( 'controls.php' );
require_once( 'register.php' );

// 	03. Include JS & CSS
// =============================================================================

if ( ! function_exists( 'setmore_spasalon_customizer_js' ) ) :
function setmore_spasalon_customizer_js() {
	wp_enqueue_script( 'setmore_spasalon_js', get_template_directory_uri() . '/gwfc.js');
	wp_enqueue_script( 'gwfc-customizer-js', get_template_directory_uri() . '/gwfc-live.js', array( 'jquery','customize-preview' ),'',true);
}
endif;
add_action('wp_enqueue_scripts', 'setmore_spasalon_customizer_js');

// 	04. Enqueue Google Font CSS into head
// =============================================================================


function setmore_spasalon_head_css(){ 

	//
	// 	Tags data
	// 	1. Tags.
	//

	$list_tags = array( // 1
		'body'		=> "All (body tags)",
		'h1'		=> "Headline 1 (h1 tags)",
		'h2'		=> "Headline 2 (h2 tags)",
		'h3'		=> "Headline 3 (h3 tags)",
		'h4'		=> "Headline 4 (h4 tags)",
		'h5'		=> "Headline 5 (h5 tags)",
		'h6'		=> "Headline 6 (h6 tags)",
		'blockquote'=> "Blockquote (blockquote)",		
		'p'			=> "Paragraph (p tags)",
		'li'		=> "Paragraph (li tags)",
	);

	foreach ($list_tags as $key => $value) {

		$font_family = get_theme_mod("gwfc_" . $key . "_font_family");
		$font_weight_style = get_theme_mod("gwfc_" . $key . "_font_weight");
		$font_weight = preg_replace("/[^0-9?! ]/","", $font_weight_style);
		$font_style = preg_replace("/[^A-Za-z?! ]/","", $font_weight_style);
		$font_color = get_theme_mod("gwfc_" . $key . "_font_color");
		
		if( $font_style == "" ){ $font_style = "normal"; }
		if( get_theme_mod( "gwfc_" . $key . "_checkbox" ) == true && $key != 'li'){

		?>
		<link id='gwfc-<?php echo esc_attr($key); ?>-font-family' href="//fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", get_theme_mod("gwfc_" . $key . "_font_family") ) . ":" . $font_weight_style . ( $font_weight_style != '400' ? ',400' : '' ) ; ?>" rel='stylesheet' type='text/css'>

		<style id="<?php echo esc_attr("gwfc-" . $key ."-style"); ?>">
		<?php echo esc_attr($key); ?>{

			<?php if($font_family != 'default'){ ?>
			font-family: '<?php echo esc_attr($font_family);?>', sans-serif !important;
			<?php } ?>			
			font-weight: <?php echo esc_attr($font_weight);?> !important;
			font-style: <?php echo esc_attr($font_style);?> !important;
			<?php if($font_color != false){ ?>
			color: <?php echo esc_attr($font_color);?> !important;
			<?php } ?>
		}

		</style>
		<?php
		
		}
	}
	$list_tags = array( // 1
		'li'		=> "Paragraph (li tags)",
	);
	foreach ($list_tags as $key => $value) {
	if( get_theme_mod( "gwfc_" . $key . "_checkbox" ) == true){
		?>
		<link id='gwfc-<?php echo esc_attr($key); ?>-font-family' href="//fonts.googleapis.com/css?family=<?php echo str_replace(" ", "+", get_theme_mod("gwfc_" . $key . "_font_family") ) . ":" . $font_weight_style . ( $font_weight_style != '400' ? ',400' : '' ) ; ?>" rel='stylesheet' type='text/css'>

		<style id="<?php echo esc_attr("gwfc-" . $key ."-style"); ?>">

		li a{

			<?php if($font_family != 'default'){ ?>
			font-family: '<?php echo esc_attr($font_family);?>', sans-serif !important;
			<?php } ?>			
			font-weight: <?php echo esc_attr($font_weight);?> !important;
			font-style: <?php echo esc_attr($font_style);?> !important;
			<?php if($font_color != false){ ?>
			color: <?php echo esc_attr($font_color);?> !important;
			<?php } ?>
		}

		</style>
		<?php
		
		}
	}
}
add_action( 'wp_head', 'setmore_spasalon_head_css' );

function setmore_spasalon_header_individual_page_images() {
	?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_service' ) ) : ?>
    		<style type="text/css">
			.page.page-template-service-profile-template,.single.single-service{background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_service' ))?>') !important;
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;
  				background-position: center center !important;
				}
				nav[role=navigation] .menu ul li a, #book-now-button li a{
				color: #fff;
				}
			</style>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_staff' ) ) : ?>
    		<style type="text/css">
				.page.page-template-people-profile-template, .single.single-people {background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_staff' ))?>') !important;
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;
  				background-position: center center !important;
				}
				nav[role=navigation] .menu ul li a, #book-now-button li a{
				color: #fff;
				}
			</style>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_aboutus' ) ) : ?>
    		<style type="text/css">
				.page.page-template-about-us-template {background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_aboutus' ))?>') !important;
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;
  				background-position: center center !important;
  				}
  				nav[role=navigation] .menu ul li a, #book-now-button li a{
				color: #fff;
				}
			</style>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_contactus' ) ) : ?>
    		<style type="text/css">
				.page.page-template-contact-us-template{background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_contactus' ))?>') !important;
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;
  				background-position: center center !important;
				}
			</style>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_booking' ) ) : ?>
    		<style type="text/css">
				.page.page-template-regular-booking-page-template, .page.page-template-class-booking-page-template {background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_booking' ))?>') !important;
				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
  				background-size: cover;
  				background-position: center center !important;
				}
				nav[role=navigation] .menu ul li a, #book-now-button li a{
				color: #fff;
				}
			</style>
		<?php endif; ?>
		<?php if ( get_theme_mod( 'setmore_spasalon_logo_main_content' ) ) : ?>
    			<style type="text/css">
					#container {
							background-image:url('<?php echo esc_url(get_theme_mod( 'setmore_spasalon_logo_main_content' ))?>') !important;
							-webkit-background-size: cover;
  							-moz-background-size: cover;
  							-o-background-size: cover;
  							background-size: cover;
  							background-position: center center !important;
					}
				</style>
		<?php endif; ?>
	<?php
}
add_action( 'wp_head', 'setmore_spasalon_header_individual_page_images' );

if ( ! function_exists( 'setmore_spasalon_header_css_file' ) ) :
  function setmore_spasalon_header_css_file() {
  		  if (function_exists( 'setmore_spasalon_plugin_custom_css' )){
  		  	?>
  		  	  	<style type="text/css">
  		  			<?php setmore_spasalon_plugin_custom_css();?>
  		  		</style>
  		  	<?php
  		  }
	} 
endif;
add_action( 'wp_head', 'setmore_spasalon_header_css_file' );

add_action( 'customize_register', 'setmore_spasalon_logo_customize_register' );
function setmore_spasalon_logo_customize_register( $wp_customize ) {
    $wp_customize->add_section('logo', array(
            'title'       => esc_html__( 'Site Logo', 'setmore-spasalon' ),
            'description' => __( 'Upload a logo to replace the default site name in the header', 'setmore-spasalon' ),
            'priority'    => 10,
        )
    );
    $wp_customize->add_setting('site_logo', array(
            'default'           => '',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize,'site_logo', array(
                    'label'       => __( 'Site Logo', 'setmore-spasalon' ),
                    'section'     => 'logo',
                    'flex_width'  => true,
                    'flex_height' => true,
                    'width'       => 240,
                    'height'      => 80,
                    )));
	}
/**
 * Filter the theme page templates.
 *
 * @param array    $page_templates Page templates.
 * @param WP_Theme $this           WP_Theme instance.
 * @param WP_Post  $post           The post being edited, provided for context, or null.
 * @return array (Maybe) modified page templates array.
 */
function wpdocs_filter_theme_page_templates( $page_templates, $this, $post ) {
    
    if( !function_exists( 'wpds_people_profile_cpt' ) ) {
	   if ( isset( $page_templates['people-profile-template.php'] ) ) {
            unset( $page_templates['people-profile-template.php'] );
        }
        if ( isset( $page_templates['service-profile-template.php'] ) ) {
            unset( $page_templates['service-profile-template.php'] );
        }
        if ( isset( $page_templates['regular-booking-page-template.php'] ) ) {
            unset( $page_templates['regular-booking-page-template.php'] );
        }
        if ( isset( $page_templates['class-booking-page-template.php'] ) ) {
            unset( $page_templates['class-booking-page-template.php'] );
        }
    }
    
    if ( $current_blog_id != $food_blog_id ) {
        if ( isset( $page_templates['page-food.php'] ) ) {
            unset( $page_templates['page-food.php'] );
        }
    }
    return $page_templates;
}
add_filter( 'theme_page_templates', 'wpdocs_filter_theme_page_templates', 20, 3 );
?>