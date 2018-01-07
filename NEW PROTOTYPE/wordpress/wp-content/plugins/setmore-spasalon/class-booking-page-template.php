<?php 
/**
 * Template Name: Class Booking Page
 * Description: Main Homepage Template for the "Services" Custom Post Type.
 */
get_header(); ?>
	 <?php while ( have_posts() ) : the_post(); ?>
          <div class="intro-copy-box">
            <header class="about-us entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
          </div>
        <?php endwhile; // end of the loop. ?>

    <div id="content" class="clearfix">
        
        <div id="main" class="class-booking-main-content clearfix" role="main">
                    <div class="staff-fadeout imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>
                    <?php get_template_part( 'content', 'single' ); ?>
                   <div class="clear"></div>
        </div> <!-- end #main -->
        
        
        <div id="main" class="clearfix" role="main">
        <div id="class-booking-page" style="z-index: 3001">
        	<?php 
           		if (function_exists('setmore_spasalon_plugin_frame_class_booking_page')){
           					setmore_spasalon_plugin_frame_class_booking_page();
           		}
           	?>
		</div>

        </div> <!-- end #content -->
        
<?php get_footer(); ?>