<!-- loop / loop-archive starts here -->
<div class="loop-archive">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article>
      <div class="archive-signpost-title">
        <h2>
          <?php the_title(); ?>
        </h2>
        <p class="edit-link"><?php edit_post_link(); ?></p>
      </div>
	    <?php the_content(); ?>
      <?php if (get_the_modified_date() > get_the_date()) { ?>
        <p class="updated-text text-right" >Last updated: <?php echo get_the_modified_date(); ?></p>
      <?php } else { ?>
        <p class="published-text text-right" >First published: <?php echo get_the_date(); ?></p>
      <?php } ?>
      <?php if ( is_user_logged_in() ) {
        the_terms( $post->ID, 'signpost_categories', '<span class="the-taxonomies-archive">', ' ', '</span>' );
      }?>
    </article>
	</div><!-- end of 1st col (post) -->
	<?php endwhile; ?>
	<?php get_template_part('elements/pagination'); ?>
	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>
</div><!-- end of Loop Archive -->
