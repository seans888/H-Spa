<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package VW Spa Lite
 */

get_header(); ?>

<section id="post-section">
    <div class="innerlightbox">
        <div class="container">
            <?php
                $left_right = get_theme_mod( 'vw_spa_lite_theme_options','One Column');
                if($left_right == 'Left Sidebar'){ ?>
                <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
                <section id="our-services" class="services flipInX col-md-8 col-sm-8">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;
                        
                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div class="clearfix"></div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <section id="our-services" class="services flipInX col-md-8 col-sm-8">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
            <?php }else if($left_right == 'One Column'){ ?>
                <section id="our-services" class="services flipInX col-md-12">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
            <?php }else if($left_right == 'Three Columns'){ ?>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <section id="our-services" class="services flipInX col-md-6 col-sm-6">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
            <?php }else if($left_right == 'Four Columns'){ ?>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar( 'sidebar-1' ); ?></div>
                <section id="our-services" class="services flipInX col-md-3 col-sm-3">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content' ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div class="col-md-3 col-sm-3">
                    <div id="sidebar"><?php dynamic_sidebar( 'sidebar-2' ); ?></div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div id="sidebar"><?php dynamic_sidebar( 'sidebar-3' ); ?></div>
                </div>
            <?php }else if($left_right == 'Right Sidebar'){ ?>
                <section id="our-services" class="services flipInX col-md-9 col-sm-9">
                    <h1 class="entry-title"><?php printf( 'Results For: %s', '<span>' . get_search_query() . '</span>' ); ?></h1>
                    <?php if ( have_posts() ) :
                        /* Start the Loop */
                          
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/grid-layout' ); 
                          
                        endwhile;

                        else :

                            get_template_part( 'no-results', 'archive' ); 

                        endif; 
                    ?>
                    <div class="navigation">
                        <?php
                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => __( 'Previous page', 'vw-spa-lite' ),
                                'next_text'          => __( 'Next page', 'vw-spa-lite' ),
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'vw-spa-lite' ) . ' </span>',
                            ) );
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </section>
                <div class="col-md-3 col-sm-3"><?php get_sidebar(); ?></div>
            <?php }?>
        </div>
    </div>
</section>

<?php get_footer(); ?>