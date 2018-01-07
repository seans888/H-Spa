<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<div class="inner-title-wrap">
      <div class="inner-title-box">
	  	<header class="entry-header">
            <h1 class="page-title">
                
            <?php
                single_cat_title();
                $setmore_spasalon_term_id = get_queried_object()->term_id;
                $setmore_spasalon_taxonomy_name = 'people_category';
                $setmore_spasalon_termchildren = get_term_children( $setmore_spasalon_term_id, $setmore_spasalon_taxonomy_name );

                foreach ( $setmore_spasalon_termchildren as $setmore_spasalon_child ) {
                $setmore_spasalon_term = esc_html(get_term_by( 'id', $setmore_spasalon_child, $setmore_spasalon_taxonomy_name ));
                echo ' &raquo; ' . '<a href="' . esc_url(get_term_link( $setmore_spasalon_child, $setmore_spasalon_taxonomy_name )) . '">' . esc_html($setmore_spasalon_term->name) . '</a>';
                }
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