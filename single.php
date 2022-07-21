<?php get_header(); ?>

<div class="container">

	<div id="content" class="col-md-8 col-xs-12">



<?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('
<div class="row" id="breadcrumbs">','</div>
');
}
?>


                <div class="row">
									<?php // check if the post has a Post Thumbnail assigned to it.
						            if ( has_post_thumbnail() ) {
														echo '<div id="thumbnail-container-body" class="hidden-lg hidden-md col-sm-12 col-xs-12 text-center">';
						                the_post_thumbnail('medium');
														echo '</div>';
						            } ?>
				<?php get_template_part('loop/loop-default'); ?>


                </div>
                <!-- end of loop row -->

    <?php comments_template(); ?>

                  </div><!-- end of content column -->


    <div id="sidebar" class="col-md-4 col-xs-12">


    <div class="text-center">
    	<?php // check if the post has a Post Thumbnail assigned to it.
            if ( has_post_thumbnail() ) {
								echo '<div id="thumbnail-container-sidebar" class="col-md-12 hidden-sm hidden-xs">';
                the_post_thumbnail('medium');
								echo '</div>';
            } ?>
		</div>


        <?php get_sidebar(); ?>



            </div>
</div>
</div>


<?php get_footer(); ?>
