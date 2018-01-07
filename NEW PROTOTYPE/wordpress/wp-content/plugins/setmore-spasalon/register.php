<?php
 
// =============================================================================
// REGISTER.PHP
// -----------------------------------------------------------------------------
// Sets up the options to be used in the Customizer.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
// 	01. Register Options
// =============================================================================

// Register Options
// =============================================================================

function setmore_spasalon_register_customizer_options( $wp_customize ) {

	//
	// 	Font data.
	// 	1. Fonts.
	// 	2. Font weights.
	// 	3. All font weights.
	//

	$list_fonts        		= array(); // 1
	$list_font_weights 		= array(); // 2
	$webfonts_array    		= file( get_template_directory_uri() . '/fonts.json');
	$webfonts          		= implode( '', $webfonts_array );
	$list_fonts_decode 		= json_decode( $webfonts, true );
	$list_fonts['default'] 	= 'Theme Default';
	foreach ( $list_fonts_decode['items'] as $key => $value ) {
		$item_family                     = $list_fonts_decode['items'][$key]['family'];
		$list_fonts[$item_family]        = $item_family; 
		$list_font_weights[$item_family] = $list_fonts_decode['items'][$key]['variants'];
	}

	$list_all_font_weights = array( // 3
		'100'       => __( 'Ultra Light', 'setmore-spasalon' ),
		'100italic' => __( 'Ultra Light Italic', 'setmore-spasalon' ),
		'200'       => __( 'Light', 'setmore-spasalon' ),
		'200italic' => __( 'Light Italic', 'setmore-spasalon' ),
		'300'       => __( 'Book', 'setmore-spasalon' ),
		'300italic' => __( 'Book Italic', 'setmore-spasalon' ),
		'400'       => __( 'Regular', 'setmore-spasalon' ),
		'400italic' => __( 'Regular Italic', 'setmore-spasalon' ),
		'500'       => __( 'Medium', 'setmore-spasalon' ),
		'500italic' => __( 'Medium Italic', 'setmore-spasalon' ),
		'600'       => __( 'Semi-Bold', 'setmore-spasalon' ),
		'600italic' => __( 'Semi-Bold Italic', 'setmore-spasalon' ),
		'700'       => __( 'Bold', 'setmore-spasalon' ),
		'700italic' => __( 'Bold Italic', 'setmore-spasalon' ),
		'800'       => __( 'Extra Bold', 'setmore-spasalon' ),
		'800italic' => __( 'Extra Bold Italic', 'setmore-spasalon' ),
		'900'       => __( 'Ultra Bold', 'setmore-spasalon' ),
		'900italic' => __( 'Ultra Bold Italic', 'setmore-spasalon' )
	);

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
		'li'		=> "List (li tags)",
	);


	//
	// 	Section.
	//

	$wp_customize->add_setting( 'gwfc_customizer_section_fonts', array(
		'sanitize_callback' => 'esc_attr',
	) );

	$wp_customize->add_section( 'gwfc_customizer_section_fonts', array(
		'title'    => __( 'Fonts Customizer', 'setmore-spasalon' ),
		'description'    => __( '<strong>Note.</strong><br />Please enable tags section checkbox for activate and use Google Web Fonts on selected tags.', 'setmore-spasalon' ),
		'priority' => 1
	));

	$i_priority = 5;

	foreach ($list_tags as $key => $value) {

		//
		//	Checkbox
		//

		$wp_customize->add_setting( 'gwfc_' . $key . '_checkbox', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_attr',
		));

		$wp_customize->add_control( 'gwfc_' . $key . '_checkbox', array(
			'label' => esc_attr( 'Enable ' . $value, 'setmore-spasalon' ),
			'section' => 'gwfc_customizer_section_fonts',
			'settings' => 'gwfc_' . $key . '_checkbox',
			'type' => 'checkbox',
			'priority' 	=> $i_priority++
		));


		/* sub title */

		$wp_customize->add_setting( 'gwfc_' . $key . '_sub_title', array(
			'sanitize_callback' => 'esc_attr',
		));
		$wp_customize->add_control( 
			new gwfc_sub_title( $wp_customize, 'gwfc_' . $key . '_sub_title', array(
			'label'		=> esc_attr( $value, 'setmore-spasalon' ),
			'section'   => 'gwfc_customizer_section_fonts',
			'settings'  => 'gwfc_' . $key . '_sub_title',
			'priority' 	=> $i_priority++ //Determines priority
		) ) );

		/* font family */

		$wp_customize->add_setting( 'gwfc_' . $key . '_font_family', array(
			'default' => 'default',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_attr',
		));

		$wp_customize->add_control( 'gwfc_' . $key . '_font_family', array(
			'type'     => 'select',
			'label'    => __( 'Font Family', 'setmore-spasalon' ),
			'section'  => 'gwfc_customizer_section_fonts',
			'priority' => $i_priority++,
			'choices'  => $list_fonts
		));

		/* font weight */

		$wp_customize->add_setting( 'gwfc_' . $key . '_font_weight', array(
			'default' => '400',
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_attr',
		));

		$wp_customize->add_control( 'gwfc_' . $key . '_font_weight', array(
			'type'     => 'select',
			'label'    => __( 'Font Weight', 'setmore-spasalon' ),
			'section'  => 'gwfc_customizer_section_fonts',
			'priority' => $i_priority++,
			'choices'  => $list_all_font_weights
		));

		/* font color */

		$wp_customize->add_setting( 'gwfc_' . $key . '_font_color', array(
			'transport' => 'postMessage',
			'sanitize_callback' => 'esc_attr',
		));

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gwfc_' . $key . '_font_color', array(
			'label'	=> __( 'Font Color', 'setmore-spasalon' ),
			'section' => 'gwfc_customizer_section_fonts',
			'priority' => $i_priority++,
			'settings' => 'gwfc_' . $key . '_font_color',
		)));

	}

}

add_action( 'customize_register', 'setmore_spasalon_register_customizer_options' );

