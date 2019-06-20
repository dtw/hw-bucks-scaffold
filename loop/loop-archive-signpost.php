<!-- loop / loop-archive starts here -->
<div class="loop-archive">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <article>
      <div style="display: flex; justify-content:space-between;">
        <h2>
          <?php the_title(); ?>
        </h2>
        <p class="edit-link"><?php edit_post_link(); ?></p>
      </div>
	    <?php the_content(); ?>
			<?php // get_template_part('elements/post-meta'); ?>
      <?php the_tags( '<p><small>Topics: ', ', ', '</small></p>' ); ?>
      <p class="updated-text text-right" >Updated: <?php echo get_the_date(); ?></p>
    </article>
	</div><!-- end of 1st col (post) -->
	<?php endwhile; ?>
	<?php get_template_part('elements/pagination'); ?>
	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>
</div><!-- end of Loop Archive -->
