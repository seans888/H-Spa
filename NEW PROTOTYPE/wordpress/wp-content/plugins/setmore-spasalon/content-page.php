
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content post-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'setmore-spasalon' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'setmore-spasalon' ), '<span class="edit-link">', '</span>' ); ?>
    
    <div class="post-divider"></div>
    
</article><!-- #post-<?php the_ID(); ?> -->
