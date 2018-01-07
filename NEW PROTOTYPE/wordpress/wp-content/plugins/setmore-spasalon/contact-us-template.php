    <?php 
    /**
     * Template Name: Contact Us
     * Description: Template for the Contact Us page.
     */
    get_header(); ?>
         <?php while ( have_posts() ) : the_post(); ?>
          <div class="intro-copy-box">
            <header class="about-us entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
          </div>
        <?php endwhile; // end of the loop. ?>

         <div id="content" class="clearfix sbfix">
           <div id="main" role="main">
           			<div class="map-wraper" style="margin-top: 20px">
           					<div class="map-wraper-content">
           						<div class="map-wraper-content-map" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
           							<?php 
           							if (function_exists('setmore_spasalon_plugin_google_map')){
           								setmore_spasalon_plugin_google_map();
           							}
           							?>
           						</div>
           					</div>
           			</div>
           			
           			<div class="contact-wraper">
           					<div class="contact-wraper-content">
           							<div id="address-widget" class="contact-us-section">
           									 <div class="about-us-contact">
                            					<div class="about-us-contact-icon">
                               						<i class="fa fa-phone fa-fw"> </i>
                            					</div>
                            					<div class="about-us-contact-icon-text">
                                					<ul>
                                    					<li>
                                        					<?php if ( ! empty($setmore_spasalon_telephone_custom)) : ?>
                                    						<strong><?php echo esc_html($setmore_spasalon_telephone_custom) ?>:</strong><br>
                                    						<?php else: ?>
                                    						<strong>Telephone Enquiry:</strong><br>
                                    						<?php endif; ?>
                                    						<?php if ( ! empty($setmore_spasalon_phone)) : ?>
                                    						<?php echo esc_html($setmore_spasalon_phone) ?>
                                    						<?php endif; ?>
                                    					</li>
                                    					<li>
                                        					<?php if ( ! empty($setmore_spasalon_facsimile_custom)) : ?>
                                    						<strong><?php echo esc_html($setmore_spasalon_facsimile_custom) ?>:</strong><br>
                                    						<?php endif; ?>
                                    						<?php if ( ! empty($setmore_spasalon_facsimile)) : ?>
                                    						<?php echo esc_html($setmore_spasalon_facsimile) ?>
                                    						<?php endif; ?>
                                    						</li>
                                					</ul>
                            					</div>
                   							 </div>
           							</div>
           							
           							<div id="address-widget" class="contact-us-section">
           									 <div class="about-us-email">
                            					<div class="about-us-email-icon">
                                					<i class="fa fa-envelope fa-fw"> </i>
                            					</div>
                           						<div class="about-us-email-icon-text">
                                					<ul>
                                    					<li>
                                        					<?php if ( ! empty($setmore_spasalon_email_custom)) : ?>
                                    						<strong><?php echo esc_html($setmore_spasalon_email_custom) ?>:</strong><br>
                                    						<?php else: ?>
                                    						<strong>Email:</strong><br>
                                    						<?php endif; ?>
                                    						<?php if ( ! empty($setmore_spasalon_email)) : ?>
                                    						<?php echo esc_html($setmore_spasalon_email) ?>
                                    						<?php endif; ?>
                                   						</li>
                                					</ul>
                            					</div>
                    						</div>
           							</div>
           							
           							<div id="address-widget" class="contact-us-section">
           									 <div class="about-us-location">
                            						<div class="about-us-location-icon">
                                							<i class="fa fa-map-marker fa-fw"> </i>
                            						</div>
                           							<div class="about-us-location-icon-text">
                                						<ul>
                                						<?php if ( ! empty($setmore_spasalon_location_custom)) : ?>
                                    					<li><strong><?php echo esc_html($setmore_spasalon_location_custom) ?>:</strong><br>
                                    					<?php echo esc_html($setmore_spasalon_address)?></li>
                                    					<?php else : ?>
                                    					<li><strong>Location:</strong><br>
                                    					<?php echo esc_html($setmore_spasalon_address) ?></li>
                                    					<?php endif;?>
                                					</ul>
                            						</div>
                        					</div>
           							</div>
           					</div>
           			</div>
           	<div id="form-main">
           			
  							<div id="form-div">
  							    <?php get_template_part( 'content', 'single' ); ?>
								<div class="clearfix"></div>
  							</div>
  					<div>
  
           		 <div id="sidebar" class="contact-us-sidebar widget-area col300" role="complementary">
                	<aside id="meta-2" class="widget widget_meta">
                    <?php if ( ! empty($setmore_spasalon_hours_custom)) : ?>
                    <div class="widget-title"><?php echo esc_html($setmore_spasalon_hours_custom) ?></div>
                    <?php else : ?>
                    <div class="widget-title">Business Hours</div>
                    <?php endif;?>
                    <table class="business-hours two">
                        <tr>
                            <td class="business-days">SUN</td>
                            <td><?php echo esc_html($setmore_spasalon_sun_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">MON</td>
                            <td><?php echo esc_html($setmore_spasalon_mon_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">TUE</td>
                            <td><?php echo esc_html($setmore_spasalon_tue_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">WED</td>
                            <td><?php echo esc_html($setmore_spasalon_wed_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">THU</td>
                            <td><?php echo esc_html($setmore_spasalon_thu_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">FRI</td>
                            <td><?php echo esc_html($setmore_spasalon_fri_start) ?></td> 
                        <tr>
                        <tr>
                            <td class="business-days">SAT</td>
                            <td><?php echo esc_html($setmore_spasalon_sat_start) ?></td> 
                        <tr>
                    </table>
                </aside>		
            </div>
        </div>
        </div>        
    <?php get_footer(); ?>