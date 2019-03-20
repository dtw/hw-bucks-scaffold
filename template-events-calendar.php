<?php /* Template Name: Healthwatch Events Calendar */ ?>

<?php get_header(); ?>

<div class="container">

	<div id="content" class="col-md-8 col-xs-12">
                
                <div class="row">
                

				<?php include('loop/loop-default.php'); ?>
                
                
                </div><!-- end of loop row -->
                
                  </div><!-- end of content column -->

	<div id="sidebar" class="col-md-3 col-md-offset-1 col-xs-12">

		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Events Sidebar')) : endif; ?>
			
            </div><!-- end of sidebar -->


<?php get_footer(); ?>