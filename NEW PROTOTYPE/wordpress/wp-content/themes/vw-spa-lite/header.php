<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Spa Lite
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-spa-lite'); ?></a></div>

  <?php 
    $slide_one = absint( get_theme_mod( 'vw_spa_lite_slidersettings-page-1' ) );
    $slide_two = absint( get_theme_mod( 'vw_spa_lite_slidersettings-page-1' ) );
    $slide_three = absint( get_theme_mod( 'vw_spa_lite_slidersettings-page-1' ) );
    $slide_four = absint( get_theme_mod( 'vw_spa_lite_slidersettings-page-1' ) );

    if($slide_one == '' && $slide_two == '' &&  $slide_three == '' &&  $slide_four == ''){
      $header_no_absolute = '';
    }
    else{
      $header_no_absolute = 'yes';
    }
  ?> 
    <div class="spa-topbar">
      <div class="container">        
        <div class="col-md-6">
          <?php if( get_theme_mod( 'vw_spa_lite_contact','' ) != '') { ?>
            <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_spa_lite_contact',__('512-252-3698','vw-spa-lite') )); ?></span>
          <?php } ?>
          <?php if( get_theme_mod( 'vw_spa_lite_email','' ) != '') { ?>
            <span class="email-spa"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_spa_lite_email', __('example@gmail.com','vw-spa-lite')) ); ?></span>
          <?php } ?>
        </div>
        <div class="col-md-6">
          <div class="social-icon">
            <?php if(get_theme_mod('vw_spa_lite_twitter-url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_twitter_url','') ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(get_theme_mod('vw_spa_lite_google_plus_url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_google_plus_url','') ); ?>"> <i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(get_theme_mod('vw_spa_lite_facebook_url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_facebook_url','') ); ?>"> <i class="fa fa-facebook" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(get_theme_mod('vw_spa_lite_pinterest_url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_pinterest_url','') ); ?>"> <i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(get_theme_mod('vw_spa_lite_linkedin_url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_linkedin_url','') ); ?>"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <?php } ?>
            <?php if(get_theme_mod('vw_spa_lite_instagram_url','') != ''){ ?>
              <a href="<?php echo esc_url( get_theme_mod('vw_spa_lite_instagram_url','') ); ?>"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  <div id="header">
    <div class="container">
      <div class="logo col-md-2 wow bounceInDown">
          <?php vw_spa_lite_the_custom_logo(); ?>
          <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php endif;

          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html( $description ); ?></p>
          <?php endif; ?>
      </div><?php /** logo **/ ?>

      <div class="menubox nav col-md-9">
        <div class="">
		    <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div><?php /** nav  **/ ?>
      </div><?php /** menubox **/ ?>
      <div class="clear"></div>
    </div>
  </div><?php /** header **/ ?>