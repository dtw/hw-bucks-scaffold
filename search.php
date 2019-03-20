<?php get_header(); ?>

<!--
<?php global $wp_query;
query_posts(
	array_merge(
		$wp_query->query,
		array(
		'order' => 'ASC',
		'orderby'=>'title',
		'post_type' => 'local_services',
		'posts_per_page' => '500',
		)
	)
);
?>            -->
    
<div class="container">

	<div class="row">

		<div id="content" class="col-md-12 col-md-12">
                
                <div class="row">
                
				<?php include('loop/loop-taxonomy.php'); ?>
                
                </div><!-- end of loop row -->

					</div><!-- end of content column -->

</div><!-- end of row -->

<?php get_footer(); ?>