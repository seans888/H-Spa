<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
	//booking page section
 	global	$setmore_spasalon_default_booking_page;
 	global	$setmore_spasalon_symbol;
 //home page section
 	global	$setmore_spasalon_company_key;
 	global	$setmore_spasalon_booking_page_url;
 	global	$setmore_spasalon_header_button_name;
 	global	$setmore_spasalon_slider_button_name;
 	global	$setmore_spasalon_home_page_header;
 	global	$setmore_spasalon_home_page_sub_hearder_color;
 	global	$setmore_spasalon_home_page_sub_hearder;
 	global	$setmore_spasalon_home_page_description;
 //contact page section
 	global	$setmore_spasalon_address;
 	global	$setmore_spasalon_about_us;
 	global	$setmore_spasalon_phone;
 	global	$setmore_spasalon_facsimile;
 	global	$setmore_spasalon_email;
//business hours page section
	global	$setmore_spasalon_sun_start;
	global	$setmore_spasalon_mon_start;
	global	$setmore_spasalon_tue_start;
	global	$setmore_spasalon_wed_start;
	global	$setmore_spasalon_thu_start;
	global	$setmore_spasalon_fri_start;
	global	$setmore_spasalon_sat_start;	 
//custom labels page section	
	global	$setmore_spasalon_telephone_custom;
	global	$setmore_spasalon_facsimile_custom;
	global	$setmore_spasalon_email_custom;
	global	$setmore_spasalon_location_custom;
	global	$setmore_spasalon_hours_custom;
	global	$setmore_spasalon_expert_custom;
	global	$setmore_spasalon_email_send_button_custom; 	 
//I-Frame booking page section
 	 global	$setmore_spasalon_frame_service_booking_page;
 	 global	$setmore_spasalon_frame_class_booking_page;	 
 	$setmore_spasalon_default_booking_page 				= get_option('booking_default');
 	$setmore_spasalon_symbol							= get_theme_mod('setmore_currency');
 	$setmore_spasalon_company_key						= get_theme_mod('company_key');
 	$setmore_spasalon_booking_page_url					= get_theme_mod('booking_page_url');
 	$setmore_spasalon_header_button_name				= get_theme_mod('header_button_name');
 	$setmore_spasalon_slider_button_name				= get_theme_mod('slider_button_name');
 	$setmore_spasalon_home_page_header					= get_theme_mod('home_page_header');
 	$setmore_spasalon_home_page_sub_hearder_color		= get_theme_mod('home_page_sub_hearder_color');
 	$setmore_spasalon_home_page_sub_hearder				= get_theme_mod('home_page_sub_hearder');
 	$setmore_spasalon_home_page_description				= get_theme_mod('home_page_description');
 	$setmore_spasalon_address							= get_theme_mod('address');
 	$setmore_spasalon_about_us							= get_theme_mod('about_us');
 	$setmore_spasalon_phone								= get_theme_mod('phone');
 	$setmore_spasalon_facsimile							= get_theme_mod('facsimile');
 	$setmore_spasalon_email								= get_theme_mod('email');
 	$setmore_spasalon_telephone_custom					= get_theme_mod('telephone_custom');
 	$setmore_spasalon_facsimile_custom					= get_theme_mod('facsimile_custom');
 	$setmore_spasalon_email_custom						= get_theme_mod('email_custom');
 	$setmore_spasalon_location_custom					= get_theme_mod('location_custom');
 	$setmore_spasalon_hours_custom						= get_theme_mod('hours_custom');
 	$setmore_spasalon_expert_custom						= get_theme_mod('expert_custom');
 	$setmore_spasalon_email_send_button_custom			= get_theme_mod('email_send_button_custom');
 	$setmore_spasalon_linkedin							= get_theme_mod('linkedin');
 	$setmore_spasalon_twitter							= get_theme_mod('twitter');
 	$setmore_spasalon_google_plus						= get_theme_mod('google_plus');
 	$setmore_spasalon_youtube							= get_theme_mod('youtube');
 	$setmore_spasalon_sun_start							= get_theme_mod('sun_start');
 	$setmore_spasalon_mon_start							= get_theme_mod('mon_start');
 	$setmore_spasalon_tue_start							= get_theme_mod('tue_start');
 	$setmore_spasalon_wed_start							= get_theme_mod('wed_start');
 	$setmore_spasalon_thu_start							= get_theme_mod('thu_start');
 	$setmore_spasalon_fri_start							= get_theme_mod('fri_start');
 	$setmore_spasalon_sat_start							= get_theme_mod('sat_start');
?>

<div id="wrapper">

    <div id="container">
    
        <header id="branding" role="banner">
          <div id="inner-header" class="clearfix">
            <div id="site-heading">
                <?php if ( wp_get_attachment_url(get_theme_mod( 'site_logo' )) ) : ?>
                <div id="site-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'site_logo' ) )); ?>" height="60px" width="60px" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a></div>
                <?php else : ?>
                <div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                <?php endif; ?>
            </div>
           <?php if ( ! empty($setmore_spasalon_default_booking_page) ) : ?> 
            <?php if ($setmore_spasalon_default_booking_page === 'services' ) : ?>
        		<div id="book-now-button">
                	<ul><li><a class="Setmore_button_iframe" id="Setmore_button_iframe" style="float:none" href="https://my.setmore.com/shortBookingPage/<?php echo esc_html($setmore_spasalon_company_key)?>"><?php echo esc_html($setmore_spasalon_header_button_name) ?></a></li></ul>
            	</div>
            <?php endif; ?>
            
            <?php if ($setmore_spasalon_default_booking_page ==='classes' ) : ?>
        		<div id="book-now-button">
                	<ul><li><a class="Setmore_button_iframe" id="Setmore_button_iframe" style="float:none" href="https://my.setmore.com/shortBookingPage/<?php echo esc_html($setmore_spasalon_company_key)?>/bookclass"><?php echo esc_html($setmore_spasalon_header_button_name) ?></a></li></ul>
            	</div>
            <?php endif; ?>
            <?php endif; ?>
            <nav id="access" role="navigation">
                <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'setmore-spasalon' ); ?></h1>
                <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'setmore-spasalon' ); ?>"><?php _e( 'Skip to content', 'setmore-spasalon' ); ?></a></div>
                <?php setmore_spasalon_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            </nav><!-- #access -->
          </div>
           
        </header><!-- #branding -->
