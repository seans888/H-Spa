
<article id="post-<?php the_ID(); ?>" <?php post_class('alt-home-list'); ?>>
	
	<?php if ( has_post_thumbnail()) : ?>
        <div class="altthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(75, 75) ); ?></a></div> 
    <?php else : ?>
		<?php
            $setmore_spasalon_postimgs =& get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
            if ( !empty($setmore_spasalon_postimgs) ) {
                $setmore_spasalon_firstimg = array_shift( $setmore_spasalon_postimgs );
                $setmore_spasalon_th_image = wp_get_attachment_image( $setmore_spasalon_firstimg->ID, array(80, 80), false );
             ?>
                <div class="altthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_url($setmore_spasalon_th_image); ?></a></div>
                
        <?php } ?>      
    <?php endif; ?>
	
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'setmore-spasalon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->
	
    <?php if($post->post_content != "") : ?>
	<div class="entry-content post-content">
		<?php echo setmore_spasalon_excerpt(25); ?>
	</div><!-- .entry-content -->
    <?php endif; ?>
    
    <div class="clearfix"></div>
    
</article><!-- #post-<?php the_ID(); ?> -->
