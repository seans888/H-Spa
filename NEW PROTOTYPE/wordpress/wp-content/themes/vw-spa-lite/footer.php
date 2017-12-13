<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Spa Lite
 */
?>
    <div id="footer" class="copyright-wrapper">
      <div class="container">
        <div class="row footer-sec">
           <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
            <div class="col-md-3 col-sm-3">
              <?php dynamic_sidebar( 'footer-4' ); ?>
            </div>
        </div>
      <div>
      <div class="inner">
          <div class="copyright text-center">
            <p><?php echo esc_html(vw_spa_lite_credit1(),'vw-spa-lite'); ?> <?php echo esc_html(get_theme_mod('vw_spa_lite_footer_copy',__('By','vw-spa-lite'))); ?> <?php echo esc_html(vw_spa_lite_credit(),'vw-spa-lite'); ?></p>
          </div>
          <div class="clear"></div>          
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>