<?php get_header(); ?>
    	<?php
			$setmore_spasalon_text = esc_url($setmore_spasalon_booking_page_url);
			$setmore_spasalon_new_text = "";
			$setmore_spasalon_words = explode("/",$setmore_spasalon_text);
			$setmore_spasalon_inc = 0;
			foreach($setmore_spasalon_words as $setmore_spasalon_word){
    			if($setmore_spasalon_word == "shortBookingPage"){ 
        			$setmore_spasalon_words[$setmore_spasalon_inc] = "bookingpage";
    			}
    			$setmore_spasalon_new_text.= $setmore_spasalon_words[$setmore_spasalon_inc]."/";
    			$setmore_spasalon_inc ++;
				}
				$setmore_spasalon_book_class_text = 'bookclass';
		?>
	<div id="slide-wrap">
			 <div class="cover">
              		<div id="panel_container_wrapper">
              			<div id="content">
              				<div class="panel-fullwidth">
              					<div class="panel-main-content">
              						<div class="entry-content">
              							<div id="panel-id">
              								<div class="panel-grid">
              									<div class="panel-grid-cell">
              										<div class="so-panel">
              											<div class="vspace">
              											</div>
              										</div>
              										<div class="so-panel widget widget_text" id="panel-942-0-0-1">
              											<div class="panel-textwidget">
              												<h1><?php echo esc_html($setmore_spasalon_home_page_header) ?></h1><br>
															<h2><?php echo esc_html($setmore_spasalon_home_page_sub_hearder_color) ?><strong style="color:#fff;">&nbsp;<?php echo esc_html($setmore_spasalon_home_page_sub_hearder)?></strong></h2>
															<h4 style="color: #fff;line-height:30px;text-shadow: 0 0 5px #111;"><?php echo esc_html($setmore_spasalon_home_page_description)?></h4>
														</div>
              										</div>
              										<?php if ( ! empty($setmore_spasalon_slider_button_name) ) : ?>
              										
              										 	<?php if ($setmore_spasalon_default_booking_page === 'services' ) : ?>
        													<div class="panel-button-area">
                												<a class="panel-button" href="<?php echo esc_url($setmore_spasalon_booking_page_url)?>" target="_blank"><?php echo esc_html($setmore_spasalon_slider_button_name) ?></a>
         													<div class="clear">&nbsp;</div>
            											<?php endif; ?>
            
            											<?php if ($setmore_spasalon_default_booking_page === 'classes' ) : ?>
            												<div class="panel-button-area">
                												<a class="panel-button" href="<?php echo esc_url($setmore_spasalon_new_text)?><?php echo esc_html($setmore_spasalon_book_class_text)?>" target="_blank"><?php echo esc_html($setmore_spasalon_slider_button_name)?></a>
         													<div class="clear">&nbsp;</div>
        												<?php endif; ?>
              										
         											<?php endif; ?>
         											</div>
              									</div>
              								</div>
              							</div>
              						</div>
              					</div>
              				</div>
              			</div>
              		</div>
              </div>
        	<?php 
                $setmore_spasalon_args = array(
                    'posts_per_page' => 10,
					'post_status' => 'publish',
                    'post__in' => get_option("sticky_posts")
                );
                $setmore_spasalon_fPosts = new WP_Query( $setmore_spasalon_args );
              ?>
			  
			<?php if ( $setmore_spasalon_fPosts->have_posts() ) : ?>
            
            <div id="load-cycle"></div>
              <div class="cycle-slideshow" <?php 
				  	if ( get_theme_mod('setmore_spasalon_slider_effect') ) {
						echo 'data-cycle-fx="' . wp_kses_post( get_theme_mod('setmore_spasalon_slider_effect') ) . '" data-cycle-tile-count="10"';
					} else {
						echo 'data-cycle-fx="scrollHorz"';
					}
				  ?> data-cycle-slides="> div.slides" <?php
                  	if ( get_theme_mod('setmore_spasalon_slider_timeout') ) {
						$setmore_spasalon_slider_timeout = wp_kses_post( get_theme_mod('setmore_spasalon_slider_timeout') );
						echo 'data-cycle-timeout="' . $setmore_spasalon_slider_timeout . '000"';
					} else {
						echo 'data-cycle-timeout="5000"';
					}
				  ?> data-cycle-prev="#sliderprev" data-cycle-next="#slidernext">
            

            <?php while ( $setmore_spasalon_fPosts->have_posts() ) : $setmore_spasalon_fPosts->the_post();  ?>
			 
			<div class="slides">
			
              <div id="post-<?php the_ID(); ?>" <?php post_class('post-theme'); ?>>

                
                 <?php if ( has_post_thumbnail()) : ?>
                    <div class="slide-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( "full" ); ?></a></div>
                 <?php else : ?>
                 
                    <?php $setmore_spasalon_postimgs = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
                    if ( !empty($setmore_spasalon_postimgs) ) :
                        $setmore_spasalon_firstimg = array_shift( $setmore_spasalon_postimgs );
                        $setmore_spasalon_my_image = wp_get_attachment_image( $setmore_spasalon_firstimg->ID, "full", false );
                    ?>
                    <div class="slide-thumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_url($setmore_spasalon_my_image); ?></a></div>
                    
                    <?php else : ?>
                    
                    <div class="slide-noimg"><p><?php _e('No featured image set for this post.', 'setmore-spasalon') ?></p></div>
                    
                   <?php endif; ?>
                   
                 <?php endif; ?>
				
              </div>      
            </div>
            
 			<?php endwhile; ?>
 			
            
            <div class="slidernav">
                <a id="sliderprev" href="#" title="<?php _e('Previous', 'setmore-spasalon'); ?>"><?php _e('&#9664;', 'setmore-spasalon'); ?></a>
                <a id="slidernext" href="#" title="<?php _e('Next', 'setmore-spasalon'); ?>"><?php _e('&#9654;', 'setmore-spasalon'); ?></a>
            </div>
            </div>
            <?php endif; ?>
            
          <?php wp_reset_postdata(); ?>

     </div>
    <div id="content" class="clearfix">
        
        <div id="main" class="clearfix" role="main">

			<?php if ( have_posts() ) : ?>
            	<div id="grid-wrap" class="main-page-post clearfix">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
				  	<div <?php post_class('grid-box'); ?>>
                    <?php if ( has_post_thumbnail()) : ?>
                    <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>
                    
                	<?php else : ?>
                	<?php
                    $setmore_spasalon_postimgs = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
                    if ( !empty($setmore_spasalon_postimgs) ) {
                        $setmore_spasalon_firstimg = array_shift( $setmore_spasalon_postimgs );
                        $setmore_spasalon_th_image = wp_get_attachment_image( $setmore_spasalon_firstimg->ID, 'full', false );
                     ?>
                        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_url($setmore_spasalon_th_image); ?></a></div>
                        
                	<?php } ?>
                	<?php endif; ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>
				  	</div>
				<?php endwhile; ?>
                
                </div>

				<?php if (function_exists("setmore_spasalon_pagination")) {
							setmore_spasalon_pagination(); 
				} elseif (function_exists("setmore_spasalon_content_nav")) { 
							setmore_spasalon_content_nav( 'nav-below' );
				}?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'setmore-spasalon' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content post-content">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'setmore-spasalon' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
			</div> <!-- end #main -->

    </div> <!-- end #content -->
        
<?php get_footer(); ?>