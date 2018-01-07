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
	  $setmore_spasalon_service_cost = get_post_meta( $post->ID, 'service_cost', true ); 
	  $setmore_spasalon_service_symbol = get_theme_mod('setmore_currency');
	  $setmore_spasalon_service_durations = get_post_meta( $post->ID, 'service_duration', true );
	?>
    
	<div class="entry-content people-info">
	    <ul class="staff-pricing-section">
	    	<?php if ( ! empty($setmore_spasalon_service_cost) ) : ?>
	    	<li><i class="fa fa-credit-card fa-fw"></i>
	    		<span>Cost <?php if ( ! empty($setmore_spasalon_service_symbol) ) : ?>(<?php echo esc_html($setmore_spasalon_service_symbol); ?>)<?php endif; ?>
	    		</span>
	    	<?php echo esc_html($setmore_spasalon_service_cost); ?>
	    	</li>
	    	<?php endif; ?>
	    	<?php if ( ! empty($setmore_spasalon_service_durations) ) : ?>
	    	<li><i class="fa fa-clock-o fa-fw"></i><span>Duration</span><?php echo esc_html($setmore_spasalon_service_durations); ?></li>
	    	<?php endif; ?>
	    </ul>
	</div><!-- .entry-content -->
	<?php endif; ?>
	
    
    
</article><!-- #post-<?php the_ID(); ?> -->
