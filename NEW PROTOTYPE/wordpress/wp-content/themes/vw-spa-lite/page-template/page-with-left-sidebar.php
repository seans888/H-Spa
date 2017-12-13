<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<div class="container">
    <div class="middle-align">       
		<div class="col-md-4 col-sm-4">
			<?php get_sidebar(); ?>
		</div>		 
		<div class="col-md-8 col-sm-8" id="content-vw" >
			<?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>   
                <?php the_content(); ?>
                <?php
                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                   	comments_template();
            ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="clear"></div>    
    </div>
</div>
<?php get_footer(); ?>