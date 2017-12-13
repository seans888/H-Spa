<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php /** slider section **/ ?>
	<?php
		// Get pages set in the customizer (if any)
		$pages = array();
		for ( $count = 1; $count <= 5; $count++ ) {
		$mod = absint( get_theme_mod( 'vw_spa_lite_slidersettings-page-' . $count ));
		if ( 'page-none-selected' != $mod ) {
		  $pages[] = $mod;
		}
		}
		if( !empty($pages) ) :
		  $args = array(
		    'posts_per_page' => 5,
		    'post_type' => 'page',
		    'post__in' => $pages,
		    'orderby' => 'post__in'
		  );
		  $query = new WP_Query( $args );
		  if ( $query->have_posts() ) :
		    $count = 1;
		    ?>
			<div class="slider-main">
		    	<div id="slider" class="nivoSlider">
			      <?php
			        $vw_spa_lite_n = 0;
					while ( $query->have_posts() ) : $query->the_post();
					  
					  $vw_spa_lite_n++;
					  $vw_spa_lite_slideno[] = $vw_spa_lite_n;
					  $vw_spa_lite_slidetitle[] = get_the_title();
					  $vw_spa_lite_slidelink[] = esc_url(get_permalink());
					  ?>
					    <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $vw_spa_lite_n ); ?>" />
					  <?php
					$count++;
					endwhile;
			      ?>
			    </div>

		    <?php
		    $vw_spa_lite_k = 0;
		      foreach( $vw_spa_lite_slideno as $vw_spa_lite_sln ){ ?>
		      <div id="slidecaption<?php echo esc_attr( $vw_spa_lite_sln ); ?>" class="nivo-html-caption">
		        <div class="slide-cap  ">
		          <div class="container">
		            <h2><?php echo esc_html($vw_spa_lite_slidetitle[$vw_spa_lite_k] ); ?></h2>
		            <a class="read-more" href="<?php echo esc_url($vw_spa_lite_slidelink[$vw_spa_lite_k] ); ?>"><?php esc_html_e( 'Learn More','vw-spa-lite' ); ?></a>
		          </div>
		        </div>
		      </div>
		        <?php $vw_spa_lite_k++;
		    	wp_reset_postdata();
		    } ?>
			</div>
		    <?php else : ?>
		      <div class="header-no-slider"></div>
		    <?php
		  endif;
		endif;
	?>

<?php /*--our service section--*/?>

<section id="amazing-service" class="darkbox" >
	<?php if( get_theme_mod('vw_spa_lite_main_title') != ''){ ?>
	    <div class="heading-line">
	      	<h3><?php echo esc_html(get_theme_mod('vw_spa_lite_main_title','')); ?> </h3>
	      	<p><?php echo esc_html(get_theme_mod('vw_spa_lite_short_desc','')); ?> </p>
	      	<div class="images_border">
				<img  src="<?php echo esc_html(get_template_directory_uri().'/images/heading-boder.png'); ?>" alt="">
			</div>
	    </div>
    <?php } ?>
	<div class="container">
		<?php 
		    $page_query = new WP_Query(array( 'category_name' => get_theme_mod('vw_spa_lite_service_category_setting','')));?>
		  	<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
		  		<div class="col-md-4 col-sm-4">
		  			<div class="amazing-box">
				    	<div class="amaze-img-box">
				    		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>	    			
				    	</div>
				    	<div class="amaze-con-box">
				    		<h4><?php the_title(); ?></h4>
				    		<p><?php the_excerpt(); ?></p>
				    		<div class="wow bounceInUp"><a class="r_button"  href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','vw-spa-lite'); ?></a>
						    </div>
				    	</div>
				    </div>
			    </div>
			<?php endwhile;
			wp_reset_postdata(); 
		?>
		<div class="clearfix"></div>
	</div>
</section>

<?php get_footer(); ?>