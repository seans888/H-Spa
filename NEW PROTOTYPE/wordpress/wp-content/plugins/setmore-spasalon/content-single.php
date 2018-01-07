
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'setmore-spasalon' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
    
    <?php if (get_theme_mod('setmore_spasalon_author_bio') ) : ?>
    <!--BEGIN .author-bio-->
	<div class="author-bio clearfix">        
		<?php 
		$setmore_spasalon_author_avatar = get_avatar( get_the_author_meta('email'), '75' );
		if ($setmore_spasalon_author_avatar) : ?>
        	<div class="author-thumb"><?php echo esc_url($setmore_spasalon_author_avatar); ?></div>
        <?php endif; ?>
        
        <div class="author-info">
        	<?php $setmore_spasalon_author_posts_url = get_author_posts_url( get_the_author_meta( 'ID' )); ?> 
            <h4 class="author-title"><?php _e('Written by ', 'setmore-spasalon'); ?><a href="<?php echo esc_url($setmore_spasalon_author_posts_url); ?>" title="<?php printf( __( 'View all posts by %s', 'setmore-spasalon' ), get_the_author() ) ?>"><?php the_author(); ?></a></h4>
            <?php $setmore_spasalon_author_desc = get_the_author_meta('description');
			if ( $setmore_spasalon_author_desc ) : ?>
            <p class="author-description"><?php echo esc_html($setmore_spasalon_author_desc); ?></p>
            <?php endif; ?>
            <?php $setmore_spasalon_author_url = get_the_author_meta('user_url');
			if ( $setmore_spasalon_author_url ) : ?>
            <p><?php _e('Website: ', 'setmore-spasalon') ?><a href="<?php echo esc_url($setmore_spasalon_author_url); ?>"><?php echo esc_url($setmore_spasalon_author_url); ?></a></p>
            <?php endif; ?>
        </div>
    </div>
	<!--END .author-bio-->
    <?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$setmore_spasalon_categories_list = get_the_category_list( __( ', ', 'setmore-spasalon' ) );
				if ( $setmore_spasalon_categories_list && setmore_spasalon_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="meta-cat"></span> %1$s', 'setmore-spasalon' ), $setmore_spasalon_categories_list ); ?>
			</span>

			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$setmore_spasalon_tags_list = get_the_tag_list( '', __( ', ', 'setmore-spasalon' ) );
				if ( $setmore_spasalon_tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( '<span class="meta-tag"></span> %1$s', 'setmore-spasalon' ), $setmore_spasalon_tags_list ); ?>
			</span>

			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php edit_post_link( __( 'Edit', 'setmore-spasalon' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
    <div class="post-divider navi"></div>
</article><!-- #post-<?php the_ID(); ?> -->

