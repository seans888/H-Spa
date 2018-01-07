<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="inner-title-wrap">
      <div class="inner-title-box">
	  	<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="entry-header">
					<h1 class="page-title author"><?php printf( __( 'Author: %s', 'setmore-spasalon' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>
      </div>
    </div>

    <div id="content" class="clearfix sbfix pgsb">
        
        <div id="main" class="col620 clearfix" role="main">


				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>


				<?php /* Adds Odd/Even Classes */
				$setmore_spasalon_i=0;
				$setmore_spasalon_class=array('odd','even'); ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
                  <div class="<?php echo esc_html($setmore_spasalon_class[$setmore_spasalon_i++%2]); ?>">
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
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