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
														echo '<div id="thumbnail-container" class="hidden-lg hidden-md hidden-sm col-xs-12 text-center">';
						                the_post_thumbnail('medium');
														echo '</div>';
						            } ?>
				<?php get_template_part('loop/loop-default'); ?>


                </div>
                <!-- end of loop row -->

    <?php comments_template(); ?>

<?php // echo do_shortcode('[wp_social_sharing social_options="facebook,twitter,googleplus,linkedin" twitter_username="HW_Bucks" facebook_text="Share on Facebook" twitter_text="Share on Twitter" googleplus_text="Share on Google+" linkedin_text="Share on Linkedin" icon_order="f,t,g,l,p,x" show_icons="1" before_button_text="Share this page" text_position="top"]'); ?>

                  </div><!-- end of content column -->


    <div id="sidebar" class="col-md-4 col-xs-12">


    <div class="text-center">
    	<?php // check if the post has a Post Thumbnail assigned to it.
            if ( has_post_thumbnail() ) {
								echo '<div id="thumbnail-container" class="col-md-12 col-sm-12 hidden-xs">';
                the_post_thumbnail('medium');
								echo '</div>';
            } ?>
		</div>


        <?php get_sidebar(); ?>



            </div>
</div>
</div>


<?php get_footer(); ?>
