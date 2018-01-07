    <?php 
    /**
     * Template Name: About Us Template
     * Description: Template for the About us page.
     */
    get_header(); ?>
         <?php while ( have_posts() ) : the_post(); ?>
          <div class="intro-copy-box">
            <header class="about-us entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
          </div>
        <?php endwhile; // end of the loop. ?>

         <div id="content" class="clearfix sbfix">

            <div id="main" class="col620 clearfix" role="main">
                    <div class="staff-fadeout imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>
                    <?php get_template_part( 'content', 'single' ); ?>

            </div> <!-- end #main -->

            <div id="sidebar" class="about-us-sidebar widget-area col300" role="complementary">
                <aside id="meta-2" class="widget widget_meta">

                    <div id="contact-us-info"> 
                			<div id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                  </div>
                <div id="contact-us-diary">  
                    <?php if ( ! empty($setmore_spasalon_about_us)) : ?>  
                    <div class="about-us-text">
                        <p><?php echo esc_html($setmore_spasalon_about_us) ?></p>
                    </div>
                    <?php endif;?>
                    <div class="about-us-contact">
                            <div class="about-us-contact-icon">
                                <i class="fa fa-phone fa-fw"> </i>
                            </div>
                            <div class="about-us-contact-icon-text">
                                <ul>
                                    <li>
                                        <?php if ( ! empty($setmore_spasalon_telephone_custom)) : ?>
                                    	<strong><?php echo esc_html($setmore_spasalon_telephone_custom) ?>:</strong><br>
                                    	<?php else: ?>
                                    	<strong>Telephone Enquiry:</strong><br>
                                    	<?php endif; ?>
                                    	<?php if ( ! empty($setmore_spasalon_phone)) : ?>
                                    	<?php echo esc_html($setmore_spasalon_phone) ?>
                                    	<?php endif; ?>
                                    </li>
                                    <li>
                                        <?php if ( ! empty($setmore_spasalon_facsimile_custom)) : ?>
                                    	<strong><?php echo esc_html($setmore_spasalon_facsimile_custom) ?>:</strong><br>
                                    	<?php endif; ?>
                                    	<?php if ( ! empty($setmore_spasalon_facsimile)) : ?>
                                    	<?php echo esc_html($setmore_spasalon_facsimile) ?>
                                    	<?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                    </div>
                    <div class="about-us-email">
                            <div class="about-us-email-icon">
                                <i class="fa fa-envelope fa-fw"> </i>
                            </div>
                            <div class="about-us-email-icon-text">
                                <ul>
                                    <li>
                                        <?php if ( ! empty($setmore_spasalon_email_custom)) : ?>
                                    	<strong><?php echo esc_html($setmore_spasalon_email_custom) ?>:</strong><br>
                                    	<?php else: ?>
                                    	<strong>Email:</strong><br>
                                    	<?php endif; ?>
                                    	<?php if ( ! empty($setmore_spasalon_email)) : ?>
                                    	<?php echo esc_html($setmore_spasalon_email) ?>
                                    	<?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>

                    <div id="contact-us-info"> 
                    <?php if ( ! empty($setmore_spasalon_location_custom)) : ?>
                    <div class="widget-title"><?php echo esc_html($setmore_spasalon_location_custom) ?></div>
                    <?php else : ?>
                    <div class="widget-title">Location</div>
                    <?php endif; ?>
                        <div class="about-us-location">
                            <div class="about-us-location-icon">
                                <i class="fa fa-map-marker fa-fw"> </i>
                            </div>
                            <div class="about-us-location-icon-text">
                                <?php if ( ! empty($setmore_spasalon_address)) : ?>
                                <p><?php echo esc_html($setmore_spasalon_address) ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="contact-us-gm">
                               <div class="contact-us-map">
									<?php 
           								if (function_exists('setmore_spasalon_plugin_google_map')){
           									setmore_spasalon_plugin_google_map();
           								}
           							?>
                               </div>
                        </div>
                    </div>
                    <?php if ( ! empty($setmore_spasalon_hours_custom)) : ?>
                    <div class="widget-title"><?php echo esc_html($setmore_spasalon_hours_custom) ?></div>
                    <?php else : ?>
                    <div class="widget-title">Business Hours</div>
                    <?php endif;?>
                    <table class="business-hours two">
                        <tr>
                            <td class="business-days">SUN</td>
                            <td><?php echo esc_html($setmore_spasalon_sun_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">MON</td>
                            <td><?php echo esc_html($setmore_spasalon_mon_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">TUE</td>
                            <td><?php echo esc_html($setmore_spasalon_tue_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">WED</td>
                            <td><?php echo esc_html($setmore_spasalon_wed_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">THU</td>
                            <td><?php echo esc_html($setmore_spasalon_thu_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">FRI</td>
                            <td><?php echo esc_html($setmore_spasalon_fri_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">SAT</td>
                            <td><?php echo esc_html($setmore_spasalon_sat_start) ?></td> 
                        <tr>
                        
                        
                    </table>
                </aside>		
            </div>
        </div>
        <div id="content" class="clearfix sbfix">
                    

                        <?php 
                        if ( get_query_var('paged') ) {
                                $setmore_spasalon_paged = get_query_var('paged');
                        } elseif ( get_query_var('page') ) {
                                $setmore_spasalon_paged = get_query_var('page');
                        } else {
                                $setmore_spasalon_paged = 1;
                        }

                        $setmore_spasalon_args = array(
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'post_type' => 'people',
                            'people_category' => '',
                            'paged' => $setmore_spasalon_paged
                        );
                        $setmore_spasalon_people_query = new WP_Query($setmore_spasalon_args);
                    ?>

                    <?php if ( $setmore_spasalon_people_query->have_posts() ) : ?>
                        <?php if ( ! empty($setmore_spasalon_expert_custom)) : ?>                    
                            <div class="custom_title about-us-team-title">
                                <h1 style="text-align:center;"><?php echo esc_html($setmore_spasalon_expert_custom) ?></h1>
                                <div class="clear">
                                </div>
                            </div>
                        <?php else : ?>                    
                        <div class="custom_title about-us-team-title">
                            <h1 style="text-align:center;">Our Experts</h1>
                            <div class="clear">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div id="grid-wrap" class="about-us-staff-section clearfix">
                        <?php /* Start the Loop */ ?>
                        <?php while ( $setmore_spasalon_people_query->have_posts() ) : $setmore_spasalon_people_query->the_post(); ?>
                            <div <?php post_class('grid-box'); ?>>
                            <?php if ( has_post_thumbnail()) : ?>
                            <div class="staff-fadeout imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>

                        <?php else : ?>
                        <?php
                            $setmore_spasalon_postimgs =& get_children( array( 'post_parent' => $setmore_spasalon_post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
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
                                // get_template_part( 'content', 'people' );
                                
                            ?>
                            <article class="about-us-staff" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header people-title">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'setmore-spasalon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php setmore_spasalon_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
    
    
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
    	<?php if ( has_post_thumbnail()) : ?>
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(150, 125) ); ?></a></div>       
    	<?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
    
    <?php 
	  $setmore_spasalon_staff_job_title = get_post_meta( $post->ID, 'job_title', true ); 
	  $setmore_spasalon_staff_phone_number = get_post_meta( $post->ID, 'phone_number', true );
	  $setmore_spasalon_staff_linkedin = get_post_meta( $post->ID, 'linkedin', true );
	  $setmore_spasalon_staff_twitter = get_post_meta( $post->ID, 'twitter', true );
	  $setmore_spasalon_staff_facebook = get_post_meta( $post->ID, 'facebook', true );
	  $setmore_spasalon_staff_googlep = get_post_meta( $post->ID, 'googleplus', true );
	  $setmore_spasalon_staff_staffbp = get_post_meta( $post->ID, 'staffbookingpage', true );
	  $setmore_spasalon_staff_mailto = get_post_meta( $post->ID, 'email', true );
	  $setmore_spasalon_staff_youtube = get_post_meta( $post->ID, 'youtube', true );
	?>
    
	<div class="entry-content post-content people-info">
    	<?php if ( ! empty($setmore_spasalon_staff_job_title) ) : ?>
        	<div class="people-job"><?php echo esc_html($setmore_spasalon_staff_job_title); ?></div>
        <?php endif; ?>        
        
	</div><!-- .entry-content -->
	<?php endif; ?>
	<div class="staff-social-buttons">
			<?php if ( ! empty($setmore_spasalon_staff_linkedin) ) : ?>        
			<span class="linkedin-button">
   			<a href="<?php echo esc_url($setmore_spasalon_staff_linkedin); ?>" class="social-li">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_staff_twitter) ) : ?>        
			<span class="twitter-button">
   			<a href="<?php echo esc_url($setmore_spasalon_staff_twitter); ?>" class="social-tw">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_staff_facebook) ) : ?>
			<span class="facebook-button">
   			<a href="<?php echo esc_url($setmore_spasalon_staff_facebook); ?>" class="social-fb">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_staff_googlep) ) : ?>        
			<span class="google-plus-button">
   			<a href="<?php echo esc_url($setmore_spasalon_staff_googlep); ?>" class="social-gp">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_staff_mailto) ) : ?>
			<span class="mailto-button">
   			<a href="mailto:<?php echo sanitize_email($setmore_spasalon_staff_mailto); ?>" class="social-em">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_staff_youtube) ) : ?>
			<span class="youtube-button">
   			<a href="<?php echo esc_url($setmore_spasalon_staff_youtube); ?>" class="social-em">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
		</div>  
    
    
</article>
     
                            </div>
                        <?php endwhile; ?>

                        </div>

                        <?php if (function_exists("setmore_spasalon_pagination")) {
                                    setmore_spasalon_pagination(); 
                        } elseif (function_exists("setmore_spasalon_content_nav")) { 
                                    setmore_spasalon_content_nav( 'nav-below' );
                        }?>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <!-- removed no result found section -->
                    <?php endif; ?>
        <div>
    <?php get_footer(); ?>