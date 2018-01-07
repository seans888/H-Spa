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
	  $setmore_spasalon_service_cost = get_post_meta( $post->ID, 'service_cost', true ); 
      $setmore_spasalon_service_symbol = get_theme_mod('setmore_currency');
	  $setmore_spasalon_service_durations = get_post_meta( $post->ID, 'service_duration', true );
	?>
	<div class="entry-content post-content people-info">
	     
	     <div class="cost-detials">
	     	<table class="business-hours two">
                        <tbody>
                        <tr>
                            <?php if ( ! empty($setmore_spasalon_service_cost) ) : ?>
                            <th><span>Cost
	    					</span></th>
                            <?php endif; ?>
                            <?php if ( ! empty($setmore_spasalon_service_durations) ) : ?>
                            <th><span>Duration
	    					</span></th>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <?php if ( ! empty($setmore_spasalon_service_cost) ) : ?>
                            <td><?php if ( ! empty($setmore_spasalon_service_symbol) ) : ?>(<span><?php echo esc_html($setmore_spasalon_service_symbol); ?></span>)<?php endif; ?> <?php echo esc_html($setmore_spasalon_service_cost); ?></td>
                            <?php endif; ?>
                            <?php if ( ! empty($setmore_spasalon_service_durations) ) : ?>
                            <td><?php echo esc_html($setmore_spasalon_service_durations); ?></td> 
                            <?php endif; ?>
                        </tr>
                        </tbody>
        	</table>
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
