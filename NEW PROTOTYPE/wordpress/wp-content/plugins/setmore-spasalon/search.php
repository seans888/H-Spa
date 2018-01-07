<?php
/**
 * The template for displaying Search Results pages.
 */
get_header(); ?>
<?php if ( have_posts() ) : ?>

	<div class="inner-title-wrap">
      <div class="inner-title-box">
	  	<header class="entry-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'setmore-spasalon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header>
      </div>
    </div>


    <div id="content" class="clearfix sbfix pgsb">
        
        <div id="main" class="col620 clearfix" role="main">

				<?php /* Adds Odd/Even Classes */
				$setmore_spasalon_i=0;
				$setmore_spasalon_class=array('odd','even'); ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                  <div class="<?php echo esc_html($setmore_spasalon_class[$setmore_spasalon_i++%2]); ?>">
					<?php get_template_part( 'content', 'archive' ); ?>
                  </div>
				<?php endwhile; ?>

				<?php if (function_exists("setmore_spasalon_pagination")) {
							setmore_spasalon_pagination(); 
				} elseif (function_exists("setmore_spasalon_content_nav")) { 
							setmore_spasalon_content_nav( 'nav-below' );
				}?>
			
        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
    
<?php else : ?>
	<div id="content" class="clearfix">
        
        <div id="main" class="col620 clearfix" role="main">

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'setmore-spasalon' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'setmore-spasalon' ); ?></p>
						<?php get_search_form(); ?>
                        
                        <p><?php _e('Or you can try these links below.', 'setmore-spasalon'); ?></p>
                        
                        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'setmore-spasalon' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$setmore_spasalon_archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'setmore-spasalon' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$setmore_spasalon_archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
          </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
<?php endif; ?>        
<?php get_footer(); ?>