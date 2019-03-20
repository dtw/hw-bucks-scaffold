<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div id="content" class="col-md-8 col-xs-12">


<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<div class="row" id="breadcrumbs">','</div>
');
}
?>
 
                
				<?php include('loop/loop-default.php'); ?>
                

					</div><!-- end of content column -->


    
   
    <div id="sidebar" class="col-md-4 col-xs-12">
        <?php get_sidebar(); ?>
            </div>

</div><!-- end of row -->

<?php get_footer(); ?>