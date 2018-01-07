<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">

			<?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>

				<aside id="categories" class="widget">
					<div class="widget-title"><?php _e( 'Categories', 'setmore-spasalon' ); ?></div>
					<ul>
						<?php wp_list_categories( array( 
							'title_li' => '',
							'hierarchical' => 0
						) ); ?>
					</ul>
				</aside>
                
                <aside id="recent-posts" class="widget">
					<div class="widget-title"><?php _e( 'Latest Posts', 'setmore-spasalon' ); ?></div>
					<ul>
						<?php
							$setmore_spasalon_args = array( 'numberposts' => '10', 'post_status' => 'publish' );
							$setmore_spasalon_recent_posts = wp_get_recent_posts( $setmore_spasalon_args );
							
							foreach( $setmore_spasalon_recent_posts as $setmore_spasalon_recent ){
								if ($setmore_spasalon_recent["post_title"] == '') {
									 $setmore_spasalon_recent["post_title"] = __('Untitled', 'setmore-spasalon');
								}
								echo '<li><a href="' . esc_url(get_permalink($setmore_spasalon_recent["ID"])) . '" title="Look '.esc_attr($setmore_spasalon_recent["post_title"]).'" >' . esc_attr($setmore_spasalon_recent["post_title"]) .'</a> </li> ';
							}
						?>
                    </ul>
				</aside>

				<aside id="archives" class="widget">
					<div class="widget-title"><?php _e( 'Archives', 'setmore-spasalon' ); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
                
                <aside id="popular-posts" class="widget">
					<div class="widget-title"><?php _e( 'Popular Posts', 'setmore-spasalon' ); ?></div>
					<ul>
						<?php $setmore_spasalon_pc = new WP_Query( array(
							'orderby' => 'comment_count',
							'posts_per_page' => 10,
							'ignore_sticky_posts' => 1
						) ); ?>
						 
						<?php while ($setmore_spasalon_pc->have_posts()) : $setmore_spasalon_pc->the_post(); ?>
                        
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php if(the_title( '', '', false ) !='') the_title(); else _e( 'Untitled', 'setmore-spasalon' ); ?></a>
                        </li>
 
						<?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
