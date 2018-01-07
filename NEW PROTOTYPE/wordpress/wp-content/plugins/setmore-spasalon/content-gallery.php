
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
      <?php if ( is_single() ) : ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'setmore-spasalon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
      <?php else : ?>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'setmore-spasalon' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <?php endif; ?>

		<div class="entry-meta">
			<?php setmore_spasalon_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
	<div class="entry-summary post-content">
    	<?php if ( has_post_thumbnail()) : ?>                
          <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(100, 85) ); ?></a></div>               
        <?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content post-content">
		<?php if ( post_password_required() ) : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'setmore-spasalon' ) ); ?>

			<?php else : ?>
				<?php
					$setmore_spasalon_images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
					if ( $setmore_spasalon_images ) :
						$setmore_spasalon_total_images = count( $setmore_spasalon_images );
						$setmore_spasalon_image = array_shift( $setmore_spasalon_images );
						$setmore_spasalon_image_img_tag = wp_get_attachment_image( $setmore_spasalon_image->ID, 'thumbnail' );
				?>

				<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $setmore_spasalon_total_images, 'setmore-spasalon' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'setmore-spasalon' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						number_format_i18n( $setmore_spasalon_total_images )
					); ?></em></p>
			<?php endif; ?>
			<?php if ( has_excerpt() ) : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
		<?php endif; ?>
		
	</div><!-- .entry-content -->
	<?php endif; ?>
	
    
</article><!-- #post-<?php the_ID(); ?> -->
