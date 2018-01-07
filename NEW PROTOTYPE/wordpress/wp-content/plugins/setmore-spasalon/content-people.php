
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
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
       
        
	</div><!-- .entry-content -->
	<?php endif; ?>
	
    
    
</article><!-- #post-<?php the_ID(); ?> -->
