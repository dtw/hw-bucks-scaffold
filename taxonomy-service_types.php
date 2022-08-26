<?php
global $wp_query;
query_posts(
	array_merge(
		$wp_query->query,
		array(
  		'order' => 'DSC',
  		'orderby'=>'published',
  		'posts_per_page' => '300',
      'tax_query' => array(
        array(
          'taxonomy' => 'cqc_reg_status',
          'field'    => 'slug',
          'terms'    => 'registered',
        ),
      ),
		)
	)
);

get_header();
?>
            <div class="container">

	<div id="content" class="col-md-12 col-sm-12">

                <div class="row">
									<?php if (have_posts()) {
										echo '<h2>Find a service to rate and review</h2>';
									}?>


				<?php include('loop/loop-taxonomy.php'); ?>

	                </div><!-- end of row -->

    		              </div><!-- end of content column -->



    <div id="sidebar" class="col-md-4 col-xs-12">
        <?php get_sidebar(); ?>
            </div>


<?php get_footer(); ?>
