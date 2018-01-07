<?php
function setmore_spasalon_shape_custom_header_setup() {
    $args = array(
        'default-image'          => '',
        'default-text-color'     => 'e9e0e1',
        'width'                  => 1050,
        'height'                 => 250,
        'flex-height'            => true,
        'wp-head-callback'       => 'shape_header_style',
        'admin-head-callback'    => 'shape_admin_header_style',
        'admin-preview-callback' => 'shape_admin_header_image',
    );
 
    $args = apply_filters( 'setmore_spasalon_shape_custom_header_setup', $args );
 
    if ( function_exists( 'wp_get_theme' ) ) {
        add_theme_support( 'custom-header', $args );
    } else {
        // Compat: Versions of WordPress prior to 3.4.
        define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
        define( 'HEADER_IMAGE',        $args['default-image'] );
        define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
        define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
    }
}
add_action( 'after_setup_theme', 'shape_custom_header_setup' );
 
/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package Shape
 * @since Shape 1.1
 */
 
if ( ! function_exists( 'get_custom_header' ) ) {
    function get_custom_header() {
        return (object) array(
            'url'           => get_header_image(),
            'thumbnail_url' => get_header_image(),
            'width'         => HEADER_IMAGE_WIDTH,
            'height'        => HEADER_IMAGE_HEIGHT,
        );
    }
}
?>