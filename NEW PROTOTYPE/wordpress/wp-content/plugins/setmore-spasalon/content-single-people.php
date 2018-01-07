<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	   
    
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
    	<?php if ( has_post_thumbnail()) : ?>
            <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(150, 125) ); ?></a></div>       
    	<?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
    
    <?php if ( has_post_thumbnail()) : ?>
       	<div class="profile-thumb-mobile"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full' ); ?></a></div>
    <?php else :?>
        <div class="profile-thumb-mobile pdefault"></div>
   	<?php endif; ?>
    
    <?php 
	  $setmore_spasalon_staff_job_title = get_post_meta( $post->ID, 'job_title', true ); 
	  $setmore_spasalon_staff_phone_number = get_post_meta( $post->ID, 'phone_number', true );
	  $setmore_spasalon_staff_linkedin = get_post_meta( $post->ID, 'linkedin', true );
	  $setmore_spasalon_staff_twitter = get_post_meta( $post->ID, 'twitter', true );
	  $setmore_spasalon_staff_facebook = get_post_meta( $post->ID, 'facebook', true );
	  $setmore_spasalon_staff_googlep = get_post_meta( $post->ID, 'googleplus', true );
	  $setmore_spasalon_staff_mailto = get_post_meta( $post->ID, 'email', true );
	  $setmore_spasalon_staff_youtube = get_post_meta( $post->ID, 'youtube', true );
	  $setmore_spasalon_staff_url = get_post_meta( $post->ID, 'staffbookingpage', true );
	  $setmore_spasalon_staff_staffbp  = 'https://my.setmore.com/bookingpage/'.get_theme_mod('company_key').'/resourcebookingpage/'.$setmore_spasalon_staff_url;
	?>    
	<div class="entry-content post-content people-info">
	  <div class="staff-personnel-info">
    	<?php if ( ! empty($setmore_spasalon_staff_job_title) ) : ?>
        	<div class="people-job"><?php echo esc_html($setmore_spasalon_staff_job_title); ?></div>
        <?php endif; ?>
        
        <?php if ( ! empty($setmore_spasalon_staff_phone_number) ) : ?>
        	<div class="people-phone"><?php echo esc_html($setmore_spasalon_staff_phone_number); ?></div>
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
       
        </div>
        <div class="staff-booking-page-section">
            <?php if ( ! empty($setmore_spasalon_staff_staffbp) ) : ?>
        	<a href="<?php echo esc_url($setmore_spasalon_staff_staffbp); ?>" id="Setmore_button_iframe" class="staff-book-now"><?php _e('Book Now', 'setmore-spasalon') ?></a>
        <?php endif; ?> 
        </div>
        
        <div class="post-divider clearfix"></div>
        
        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'setmore-spasalon' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'setmore-spasalon' ), 'after' => '</div>' ) ); ?>
        
	</div><!-- .entry-content -->
	<?php endif; ?>
	
    <?php if ( ! ( is_home() || is_archive() ) ) : ?>
	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$setmore_spasalon_categories_list = get_the_category_list( __( ', ', 'setmore-spasalon' ) );
				if ( $setmore_spasalon_categories_list && setmore_spasalon_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'setmore-spasalon' ), $setmore_spasalon_categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$setmore_spasalon_tags_list = get_the_tag_list( '', __( ', ', 'setmore-spasalon' ) );
				if ( $setmore_spasalon_tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'setmore-spasalon' ), $setmore_spasalon_tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>


	</footer><!-- #entry-meta -->
    <?php endif; ?>
    
</article><!-- #post-<?php the_ID(); ?> -->
