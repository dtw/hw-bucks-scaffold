<?php get_header(); ?>

<div class="container">

<div class="row no-gutter">

	<div id="content" class="col-md-8 col-xs-12">
                



				<?php include('loop/loop-single-local_services.php'); ?>

                <?php include('elements/comments-list.php'); ?>

	 <?php if (!is_user_logged_in()) {  ?>

			
<hr />
<h2 id="respond">Rate and review this service</h2>
<p>Your name and email address and other identifying information will not be published and will be stored in accordance with our <a href="http://www.healthwatchbucks.co.uk/data-protection-privacy-policy/" target="_blank">data protection policy</a>. Required fields are marked with an asterisk.</p>			
			
			
			<?php include('elements/comments-form.php'); 
				} ?>









<?php // echo do_shortcode("[wp_social_sharing social_options='facebook,twitter,googleplus,linkedin' twitter_username='HW_Bucks' facebook_text='Share on Facebook' twitter_text='Share on Twitter' googleplus_text='Share on Google+' linkedin_text='Share on Linkedin' pinterest_text='Share on Pinterest' xing_text='Share on Xing' icon_order='f,t,g,l,p,x' show_icons='1' before_button_text='Share this page' text_position='top' social_image='']"); ?>





                 
                  </div><!-- end of content column -->

    
    <div id="sidebar" class="col-md-4 col-xs-12">


<!-- Insert FEATURED IMAGE -->
<?php // check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) {
	the_post_thumbnail();
} ?>



<!-- Insert CQC WIDGET -->

<?php if (has_term('pharmacy','service_types')) { 

 } else 
 
 { ?>



<h3>How does the Care Quality Commission rate <?php the_title(); ?>?</h3>

<script type='text/javascript' src="http://www.cqc.org.uk/sites/all/modules/custom/cqc_widget/widget.js?data-host=www.cqc.org.uk&amp;type=location&amp;data-id=<?php echo get_post_meta( $post->ID, 'hw_services_cqc_location', true ); ?>">;
		    	</script>



<?php } ?>





     
     
     
     
     
     <div id="view1">
<?php
$aTitle = get_the_title();
$a1 = get_post_meta(get_the_ID(),'hw_services_address_line_1',true);
$a2 = get_post_meta(get_the_ID(),'hw_services_address_line_1',true);
$aCity = get_post_meta(get_the_ID(),'hw_services_city',true);
$aCounty = get_post_meta(get_the_ID(),'hw_services_county',true);
$aPostcode = get_post_meta(get_the_ID(),'hw_services_postcode',true);

$location = $aTitle . " " . $a1 . " " . $a2 . " " . $aCity . " " . $aCounty . " " . $aPostcode . " UK";
?>

<iframe width="1000" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?center=<?php echo $location; ?>&zoom=8&q=<?php echo $location; ?>&size=1000x500&output=embed&iwloc=near"></iframe><br /><br />



























<?php // Get the taxonomy term for this post
$term_list = wp_get_post_terms($post->ID, 'service_types', array("fields" => "ids"));
$service_type = $term_list[0]; ?>



<?php



$args = array(
	'status' => 'approve',
	'posts_per_page' => '1000',
	'post_type' => 'local_services',
	'number' => 1000,
	'post__not_in' => get_the_id(),
);

// The Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );


// Comment Loop
if ( $comments ) {

$the_count = 0;
		
	foreach ( $comments as $comment ) { 
	
if ($the_count > 4) { break; }

	?>




<?php												// Display icon for taxonomy term	

$term_ids = get_the_terms( $comment->comment_post_ID, 'service_types' );	// Find taxonomies
$comment_term_id = $term_ids[0]->term_id;											// Get taxonomy ID
		?>
        

<?php if ($comment_term_id == $service_type) { 

$the_count = $the_count + 1; 


?>




	<div class="text-center"><a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>">
    </a></div>






	<h3 style="margin: 0; padding-bottom: .5rem;"><a href="<?php echo get_the_permalink($comment->comment_post_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a></h3>




<?php // Display star rating
$individual_rating = get_comment_meta( $comment->comment_ID, 'feedback_rating', true ); ?>

<?php if ($individual_rating) { ?>
    
    <p class="star-rating p-rating">
    <?php if ($individual_rating < 1.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 1.25 && $individual_rating < 1.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 1.75 && $individual_rating < 2.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 2.25 && $individual_rating < 2.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
        
    <?php if ($individual_rating >= 2.75 && $individual_rating < 3.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 3.25 && $individual_rating < 3.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 3.75 && $individual_rating < 4.25 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-o fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 4.25 && $individual_rating < 4.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star-half-empty fa-lg"></i>
        <?php } ?> 
    
    <?php if ($individual_rating >= 4.75 ) { ?>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <i class="fa fa-star fa-lg"></i>
        <?php } ?> 
     </p> 
       <p><strong><?php echo human_time_diff( strtotime($comment->comment_date), current_time( 'timestamp' ) ); ?> ago</strong></p>












	<?php } // end of if there is a rating ?>

        <p><?php echo mb_strimwidth($comment->comment_content,0,200," ..."); ?></p>




<?php	}  } // end of loop?


} else {
}


?>






















            </div><!-- end of sidebar -->



</div><!-- end of row -->
</div><!-- end of container -->
</div><!-- end of container fluid -->

            

<?php get_footer(); ?>
