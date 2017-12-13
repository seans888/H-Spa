<?php
/**
 * VW Spa Lite Theme Customizer
 *
 * @package VW Spa Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_spa_lite_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_spa_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-spa-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-spa-lite' )
	) );

	$wp_customize->add_section( 'vw_spa_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-spa-lite' ),
		'priority'   => 30,
		'panel' => 'vw_spa_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_spa_lite_theme_options',array(
	        'default' => '',
	        'sanitize_callback' => 'vw_spa_lite_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('vw_spa_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Do you want this section',
	        'section' => 'vw_spa_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-spa-lite'),
	            'Right Sidebar' => __('Right Sidebar','vw-spa-lite'),
	            'One Column' => __('One Column','vw-spa-lite'),
	            'Three Columns' => __('Three Columns','vw-spa-lite'),
	            'Four Columns' => __('Four Columns','vw-spa-lite'),
	            'Grid Layout' => __('Grid Layout','vw-spa-lite')
	        ),
	    )
    );

	//home page slider
	$wp_customize->add_section( 'vw_spa_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-spa-lite' ),
		'priority'   => 30,
		'panel' => 'vw_spa_lite_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_spa_lite_slidersettings-page-' . $count, array(
				'default'           => '',
				'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_spa_lite_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-spa-lite' ),
			'section'  => 'vw_spa_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );

	}
	
	//home page setting pannel
	$wp_customize->add_section('vw_spa_lite_topbar',array(
        'title' => __('Contact Info','vw-spa-lite'),
        'description'   => __('Contact Info','vw-spa-lite'),
        'panel' => 'vw_spa_lite_panel_id',
    ));
    
    $wp_customize->add_setting('vw_spa_lite_contact',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	
	$wp_customize->add_control('vw_spa_lite_contact',array(
		'label'	=> __('Contact','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	
	$wp_customize->add_control('vw_spa_lite_email',array(
		'label'	=> __('Email','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_topbar',
		'type'		=> 'text'
	));
    
    //Follow us
	$wp_customize->add_section('vw_spa_lite_social_icon',array(
        'title' => __('Social Icon','vw-spa-lite'),
        'description'   => __('social links','vw-spa-lite'),
        'panel' => 'vw_spa_lite_panel_id',
    ));

    $wp_customize->add_setting('vw_spa_lite_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_twitter_url',array(
		'label'	=> __('Twitter url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_google_plus_url',array(
		'label'	=> __('Google plus url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_facebook_url',array(
		'label'	=> __('Facebook url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_pinterest_url',array(
		'label'	=> __('Pinterest url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_linkedin_url',array(
		'label'	=> __('Linkedin url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));

	$wp_customize->add_control('vw_spa_lite_instagram_url',array(
		'label'	=> __('Instagram url ','vw-spa-lite'),
		'section' => 'vw_spa_lite_social_icon',
		'type'	=> 'text'
	));

	//Our Amenities
	$wp_customize->add_section('vw_spa_lite_amaze_service_section',array(
		'title'	=> __('Amazing Service','vw-spa-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_spa_lite_panel_id',
	));
	
	$wp_customize->add_setting('vw_spa_lite_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_main_title',array(
		'label'	=> __('Title','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_amaze_service_section',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_spa_lite_short_desc',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_short_desc',array(
		'label'	=> __('Short Content','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_amaze_service_section',
		'type'	=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_spa_lite_service_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_spa_lite_service_category_setting',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Category to display Latest Post','vw-spa-lite'),
		'section' => 'vw_spa_lite_amaze_service_section',
	));
	
	//footer section
	$wp_customize->add_section('vw_spa_lite_footer_section',array(
		'title'	=> __('Copyright','vw-spa-lite'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'vw_spa_lite_panel_id',
	));
	
	$wp_customize->add_setting('vw_spa_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'wp_kses_post',
	));
	
	$wp_customize->add_control('vw_spa_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-spa-lite'),
		'section'	=> 'vw_spa_lite_footer_section',
		'type'		=> 'textarea'
	));
	/** home page setions end here**/	
}
add_action( 'customize_register', 'vw_spa_lite_customize_register' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_spa_lite_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_spa_lite_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_spa_lite_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'VW SPA Pro', 'vw-spa-lite' ),
					'pro_text' => esc_html__( 'Go Pro',         'vw-spa-lite' ),
					'pro_url'  => 'https://www.vwthemes.com/premium/salon-spa-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-spa-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-spa-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_spa_lite_customize::get_instance();