<!-- loop / loop-default starts here -->

<div class="loop-default">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php get_template_part('elements/custom-fields-block'); ?>

	<?php the_content(); ?>

		<?php the_tags( '<div class="the-tags"><p>Explore more ', ' ', '</p></div>' ); ?>

	<?php endwhile; ?>

			<?php get_template_part('elements/pagination'); ?>

	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>

   </div><!-- end of Loop Default -->
