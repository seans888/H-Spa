/*-----------------------------------------------------------------------------------*/
/* VW Spa Lite Responsive WordPress Theme */
/*-----------------------------------------------------------------------------------*/

Theme Name      :   VW Spa Lite
Theme URI       :   https://www.vwthemes.com/free/wp-salon-spa-wordpress-theme/
Version         :   1.2.1.0
Tested up to    :   WP 4.8.3
Author          :   VW Themes
Author URI      :   https://www.vwthemes.com/
license         :   GNU General Public License v3.0
License URI     :   http://www.gnu.org/licenses/gpl.html

/*-----------------------------------------------------------------------------------*/
/* About Author - Contact Details */
/*-----------------------------------------------------------------------------------*/

email       	:   support@vwthemes.com

/*-----------------------------------------------------------------------------------*/
/* Features */
/*-----------------------------------------------------------------------------------*/

Manage Slider, services and footer from admin customizer vw setting section.


/*-----------------------------------------------------------------------------------*/
/* Theme Resources */
/*-----------------------------------------------------------------------------------*/

Theme is Built using the following resource bundles.

1 - Bootstrap.js => https://github.com/twbs/bootstrap/releases/download/v3.1.1/bootstrap-3.1.1-dist.zip
  Code and documentation copyright 2011-2016 Twitter, Inc. Code released under the MIT license. Docs released under Creative Commons.

2 - Open Sans font - https://www.google.com/fonts/specimen/Open+Sans
	PT Sans font - https://fonts.google.com/specimen/PT+Sans
	Roboto font - https://fonts.google.com/specimen/Roboto
	License: Distributed under the terms of the Apache License, version 2.0 http://www.apache.org/licenses/LICENSE-2.0.html

3 - Images used from Pixabay.
	Pixabay provides images under CC0 license (https://creativecommons.org/about/cc0)
	Slider Images
		https://pixabay.com/en/wellness-massage-relax-relaxing-285587/
		https://pixabay.com/en/wellness-massage-relaxation-1021131/
		https://pixabay.com/en/pedicure-massage-therapist-spa-1462138/
	Amazing Services
        https://pixabay.com/en/alternative-medicine-beauty-chinese-1327808/
        https://pixabay.com/en/bath-soap-perfume-bottle-oil-585128/
        https://pixabay.com/en/wellness-massage-reiki-285590/
	Footer
        https://pixabay.com/en/towel-rose-clean-care-salon-spa-759980/

4  CSS bootstrap.css
   -- Code and documentation copyright 2011-2016 Twitter, Inc. Code released under the MIT license. Docs released under Creative Commons.
   -- http://www.opensource.org/licenses/mit-license.php
    Font-awesome.css
   --Font Awesome 4.3.0 by @davegandy - http://fontawesome.io - @fontawesome
 	License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)


All the slider images taken from pixabay under Creative Commons Deed CC0 - https://pixabay.com/en/service/terms/

All the icons taken from genericons licensed under GPL License.
http://genericons.com/

VW Spa Lite Premium version
==========================================================
VW Spa Lite Premium version is compatible with GPL licensed.

For any help you can mail us at support[at]vwthemes.com


Changelog
============

Version 1.0
i) Intial version Release

Version 1.1
i) Corrected POT file
ii) Corrected slide images

Version 1.1.1
i) Modified CSS and HTML structure.
ii) Modified Screenshot.

Version 1.1.2
i) Changes as per wordpress standards
	-- Use the_title_attribute()
	-- Prefix add_panel, add_section, add_setting and add_control handles 
	-- Remove header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
	-- Remove unused comment out code ex. searchform.php line 10
	-- Remove full-width-template tag from style.css or add full width template
	-- Fixed Necho the_title() in vw_restaurant_the_breadcrumb
	-- Remove prefix from third party script and styles except Google font

Version 1.1.3
	-- Incorrect use of home.php
	-- Multiple escaping issues
	-- Removed Custom Headers support.
	-- searchform.php - get_search_query() escaping removed. 
	-- home.php - added wp_reset_postdata();
	-- contact.php - you have untranslatable text strings 
	-- Corected demo content.

Version 1.1.4
	-- Corrected CSS issues
	-- Add handle prefix

Version 1.1.5
	-- Fixed minor issues

Version 1.1.6
	-- Fixed issues
	-- REQUIRED: functions.php L163 - Handle bootstrap-style should be bootstrap.
	-- REQUIRED: functions.php L168, L169 - Handle nivo-slider should be jquery-nivo-slider.
	-- REQUIRED: functions.php L170 - Handle bootstrap-js should be bootstrap.
	-- REQUIRED: template-tags.php L40 - Strings should have translatable content
	-- REQUIRED: index.php - title="<?php _e('READ More...','vw-spa-lite'); ?>" should be title="<?php esc_attr_e('READ More...','vw-spa-lite'); ?>"
	-- REQUIRED: page.php - wp_link_pages() missing after the_content(). Check in other files also.
	-- REQUIRED: You are using <?php get_sidebar('page'); ?> but there is no sidebar-page.php file. Can you please check it?
	-- REQUIRED: vw_spa_lite_jetpack_setup() - Is Jetpack infinite scroll working? Remove it if you dont want to implement.
	-- REQUIRED: Remove editor-style theme tag.
	-- REQUIRED: functions.php L63 - Is f1f1f1 correct color for background?
	-- REQUIRED: antispambot is not secure enough for escaping email. You can use like this. <?php echo esc_html( antispambot( get_theme_mod('vw_spa_lite_cont_email','') ) ); ?>
	-- REQUIRED: Static front page issue - When Your latest posts is set as Front page displays custom section should not be displayed. Only blog listing is expected in that page. Similar for Posts Page. If you want to implement custom section like slider, you can use Front Page. Please check http://www.chipbennett.net/2013/09/14/home-page-and-front-page-and-templates-oh-my/

Version 1.1.7
	-- Changed screenshot
	-- Description changed

Version 1.1.8
	-- Changed the layout of theme.
	-- Removed depreceated functions.
	-- Added the static part from the post.

Version 1.1.9
	-- Added the translation ready in theme.
	-- Added rtl language support in theme.

Version 1.2.0
	-- Added e-commerce in theme.

Version 1.2.1.0
	-- Done the customization changes.
	-- change the styling of theme.
