<!-- loop / loop-archive starts here -->
<div class="loop-archive">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<div class="row">



    <div class="col-md-2 col-sm-3 hidden-xs">


			<?php // check if the post has a Post Thumbnail assigned to it.
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('thumbnail');
            } ?>

		</div><!-- end of 1st col (featured image) -->





    <div class="col-md-10 col-sm-9">

        <div class="post-title"><h2><a href="<?php echo the_permalink(''); ?>"><?php the_title(); ?></a></h2></div>


       <?php if (is_tag()) {
         echo "<div class='category-terms'><span class='screen-reader-text'>This post's categories</span>";
         $taxonomy = 'category';
         // Get the term IDs assigned to post.
         $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
         // Separator between links.
         $separator = ' ';
         if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
           $term_ids = implode( ',' , $post_terms );
           $terms = wp_list_categories( array(
             'title_li' => '',
             'depth' => 1,
             'style'    => 'none',
             'echo'     => false,
             'taxonomy' => $taxonomy,
             'include'  => $term_ids
           )
         );
         $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
         // Display post categories.
         echo  $terms;
         echo "</div>";
       }
     }?>
     <p><?php echo get_the_excerpt(); ?></p>
     <?php get_template_part('elements/post-meta'); ?>
     <span class="screen-reader-text">Tagged with</span>
     <?php the_tags( '<span class="the-tags-archive">', ' ', '</span>' );?>
   </div><!-- end of 2nd col (post) -->
 </div><!-- end of row -->
</div><!-- end of Post -->
<?php endwhile; ?>

			<?php get_template_part('elements/pagination'); ?>

	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>

 </div><!-- end of Loop Archive -->
