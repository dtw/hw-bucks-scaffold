<?php /* Template Name: Find local services */ ?>

<?php get_header(); ?>

<div class="container">

	<div id="content" class="col-md-8 col-xs-12 hidden-xs">



<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

<?php if (is_plugin_active('healthwatchfeedback/healthwatchfeedback.php')) { ?>



                
                <div class="row">
                
				<?php include('loop/loop-default.php'); ?>
                

			<?php query_posts('posts_per_page=14&post_type=Local_services&orderby=comment_count'); ?>
				<?php include('loop/loop-taxonomy.php'); ?>

               
                </div><!-- end of loop row -->



<?php } ?>




					</div><!-- end of content column -->


    
   
    <div id="sidebar" class="col-md-4 col-xs-12">
        <?php get_sidebar(); ?>
            </div><!-- end of sidebar -->


<?php get_footer(); ?>