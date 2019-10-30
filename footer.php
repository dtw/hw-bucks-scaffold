</div> <!-- end of main (content + sidebar) container -->
</div>
</div>









		<?php // Check whether Subfooter area has any widgets 
        	if ( is_active_sidebar( 'subfooter_sidebar' ) ) { ?>

                <!-- Beginning of subfooter -->
                    <div id="subfooter">
                        <div class="container">

<div class="row">
<div class="col-md-8 col-md-offset-2">

					<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('subfooter_sidebar')) : endif; ?>
    
							<?php } else { } ?>



	<?php // Check whether Subfooter area has any widgets 
        	if ( is_active_sidebar( 'subfooter_sidebar' ) ) { ?>


</div><!-- end of col -->
</div><!-- end of row -->


                    </div><!-- end of container -->
                        </div><!-- end of subfooter -->

    
				<?php } else { } ?>

















<footer class="container-fluid">



      <div class="container">


		<div class="row">


	<!-- Footer WIDGET area #1 -->

<div id="footer1" class="footer col-md-4 col-sm-4 col-xs-12">
	<?php if ( is_active_sidebar( 'Footer_1' ) ) { dynamic_sidebar( 'Footer 1' ); } else { ?>
    <h2 class='text-danger'>Footer area 1 is empty</h2><p>Note to administrator: this area is editable via the <strong>WordPress Dashboard > Appearance > Widgets</strong></p>
    	<?php } ?>
	    </div>

	<!-- Footer WIDGET area #2 -->

		<?php // Check whether Footer area #3 has any widgets 
        	if ( is_active_sidebar( 'footer_3' ) ) { ?>
                  <div id="footer2" class="footer col-md-4 col-sm-4 col-xs-12">

		<?php } else { // If not, Footer area #2 takes up 2 columns instead of 1 ?>
			  <div id="footer2" class="footer col-md-8 col-sm-8 col-xs-12">
		<?php } ?>
		
			<?php if ( is_active_sidebar( 'footer_2' ) ) { dynamic_sidebar( 'Footer 2' ); } else { ?>
            <h2 class='text-danger'>Footer area 2 is empty</h2><p>Note to administrator: this area is editable via the <strong>WordPress Dashboard > Appearance > Widgets</strong>. It's optional whether or not you use the <strong>Footer 3</strong> area, in which case you'd have three columns rather than two.</p>
                <?php } ?>

                		</div>

	<!-- Footer WIDGET area #3 -->

		<?php // Check whether Footer area #3 has any widgets 
        	if ( is_active_sidebar( 'footer_3' ) ) { ?>
				<div id="footer3" class="footer col-md-4 col-sm-4 col-xs-12">
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer 3')) : endif; ?>
					</div>

			<?php } ?>



		
        	</div><!-- End of main footer row -->

	        	</div><!-- End of main footer container -->



        
      </footer>



















<!-- Beginning of COPYRIGHT -->
<div id="copyright" class="container-fluid">

<div class="container">



   
    <div class="row">
        
        <div id="copyright" class="col-md-6 col-sm-6 col-xs-12">
            <p>&copy; <strong><?php bloginfo('name'); ?></strong> <?php echo date('Y'); ?></p>
                </div><!-- end of col 1 -->
        

        <div id="author" class="col-md-6 col-sm-6 col-xs-12">
        <?php $theme_author_url = 'https://www.kingjason.co.uk/wordpress-theme-plugin-healthwatch/'; ?>
            <p class="text-right">WordPress website built by <a href="<?php echo $theme_author_url; ?>" target="_blank" title="Non-profit web design by Jason King"><strong>Jason King</strong></a></p>
                </div><!-- end of col 2 -->


					</div><!-- end of row  -->

</div><!-- end of container -->

</div><!-- end of copyright / container-fluid -->












	<?php  if (is_user_logged_in()) {  
			get_template_part('elements/warnings'); 
				} ?>
     
	    <?php wp_footer(); ?>

  </body>
</html>