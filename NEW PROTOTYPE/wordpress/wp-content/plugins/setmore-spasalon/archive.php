<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="inner-title-wrap">
      <div class="inner-title-box">
	  	<header class="entry-header">
            <h1 class="page-title">
                <?php
                    if ( is_day() ) :
                        printf( __( 'Daily Archives: %s', 'setmore-spasalon' ), '<span>' . get_the_date() . '</span>' );
                    elseif ( is_month() ) :
                        printf( __( 'Monthly Archives: %s', 'setmore-spasalon' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
                    elseif ( is_year() ) :
                        printf( __( 'Yearly Archives: %s', 'setmore-spasalon' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
                    else :
                        _e( 'Archives', 'setmore-spasalon' );
                    endif;
                ?>
            </h1>
        </header>
      </div>
    </div>
    
    <div id="content" class="clearfix sbfix pgsb">
        
        <div id="main" class="col620 clearfix" role="main">

				<?php rewind_posts(); ?>
				<?php /* Adds Odd/Even Classes */
				$setmore_spasalon_i=0;
				$setmore_spasalon_class=array('odd','even'); ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                  <div class="<?php echo esc_html($setmore_spasalon_class[$setmore_spasalon_i++%2]); ?>">
					<?php
						/* Include the Post-Format-specific template for the content.
						 */
						get_template_part( 'content', 'archive' );
					?>
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
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'setmore-spasalon' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

        </div> <!-- end #main -->

        <?php get_sidebar(); ?>

    </div> <!-- end #content -->
    
<?php endif; ?>
<?php get_footer(); ?>