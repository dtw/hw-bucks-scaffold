<!-- loop / loop-default starts here -->

<div class="loop-default">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

	<?php //if Post show the date
	if ( is_single() ) { ?>
		<div class="the-date">
			<p><i class="fa fa-clock-o" aria-hidden="true"></i>
				<?php
				$published_date = get_post_datetime($post,'date');
				$mod_date = get_post_datetime($post,'modified');
				$interval = $published_date->diff($mod_date);
				// if it is in the current year don't show the year
				if ($published_date->format('Y') == current_datetime()->format('Y')) {
					$date_str_format = 'j M';
				} else {
					$date_str_format = 'j M, Y';
				}
				// if the interval is less than 2 days, just show pub date
				if ($interval->d <= 2) {
					echo " Published on " . get_the_date($date_str_format);
				} else {
					echo " Published on " . get_the_date($date_str_format) . " (updated " . get_the_modified_date($date_str_format).")";
		    }?>
			</p>
		</div>
	<?php } ?>
	<?php the_tags( "<div class='the-tags'><span class='screen-reader-text'>This post's tags</span><p><span aria-hidden='true'>Explore more </span>", " ", "</p></div>" ); ?>

	<?php endwhile; ?>

			<?php get_template_part('elements/pagination'); ?>

	<?php else: ?>
		<p>Sorry, nothing found.</p>
	<?php endif; ?>

   </div><!-- end of Loop Default -->
