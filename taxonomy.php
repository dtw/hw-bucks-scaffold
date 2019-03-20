<?php get_header(); ?>

<?php
global $wp_query;
query_posts(
	array_merge(
		$wp_query->query,
		array(
		'order' => 'ASC',
		'orderby'=>'title',
		'posts_per_page' => '500',
		)
	)
);
?>            
            <div class="container">

	<div id="content" class="col-md-8 col-xs-12">
                
                <div class="row">
                

				<?php include('loop/loop-taxonomy.php'); ?>
                
	                </div><!-- end of row -->
                
    		              </div><!-- end of content column -->

    

    <div id="sidebar" class="col-md-4 col-xs-12">
        <?php get_sidebar(); ?>
            </div>
            

<?php get_footer(); ?>