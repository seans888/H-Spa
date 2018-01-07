
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
    <a href="#" class="crunchify-top"><i class="fa fa-hand-o-up"></i></a>
    <div id="site-generator">
        <?php echo esc_html('&copy; ', 'setmore-spasalon') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
        <?php _e('- Powered by ', 'setmore-spasalon'); ?><a id="powered-setmore" href="<?php echo esc_url( __( 'http://www.setmore.com/', 'setmore-spasalon' ) ); ?>"><?php _e('SetMore', 'setmore-spasalon'); ?></a>
        <?php setmore_spasalon_footer_nav(); ?>
    </div>
    <?php 
 	//social media page section	
 	global	$setmore_spasalon_linkedin;
 	global	$setmore_spasalon_twitter;
 	global	$setmore_spasalon_google_plus;
 	global	$setmore_spasalon_youtube;
 	global  $setmore_spasalon_email;
 	//custom CS & JS page section
	global	$setmore_spasalon_custom_css;
	global	$setmore_spasalon_custom_js;
	global	$setmore_spasalon_google_tracking_code;
 	$setmore_spasalon_linkedin						= get_theme_mod('linkedin');
 	$setmore_spasalon_twitter						= get_theme_mod('twitter');
 	$setmore_spasalon_google_plus					= get_theme_mod('google_plus');
 	$setmore_spasalon_youtube						= get_theme_mod('youtube');
 	$setmore_spasalon_email							= get_theme_mod('email');
 	$setmore_spasalon_custom_css					= get_option('custom_css');
 	$setmore_spasalon_custom_js						= get_option('custom_js');
 	$setmore_spasalon_google_tracking_code			= get_option('google_tracking_code');
	?>
	<div id="footer-social-buttons">
	<div class="staff-social-buttons">
			<?php if ( ! empty($setmore_spasalon_linkedin) ) : ?>        
			<span class="linkedin-button">
   			<a href="<?php echo esc_url($setmore_spasalon_linkedin) ?>" class="social-li">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_twitter) ) : ?>        
			<span class="twitter-button">
   			<a href="<?php echo esc_url($setmore_spasalon_twitter); ?>" class="social-tw">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_facebook) ) : ?>
			<span class="facebook-button">
   			<a href="<?php echo esc_url($setmore_spasalon_facebook); ?>" class="social-fb">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_google_plus) ) : ?>        
			<span class="google-plus-button">
   			<a href="<?php echo esc_url($setmore_spasalon_google_plus); ?>" class="social-gp">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_email) ) : ?>
			<span class="mailto-button">
   			<a href="mailto:<?php echo sanitize_email($setmore_spasalon_email); ?>" class="social-em">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
			
			<?php if ( ! empty($setmore_spasalon_youtube) ) : ?>
			<span class="youtube-button">
   			<a href="<?php echo esc_url($setmore_spasalon_youtube); ?>" class="social-em">
    		<span class="fa-stack fa-lg fa-fw">
        	<i class="fa fa-circle fa-stack-2x"></i>
        	<i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
   			</span>
    		</a>
			</span>
			<?php endif; ?>
		</div>  
		</div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>