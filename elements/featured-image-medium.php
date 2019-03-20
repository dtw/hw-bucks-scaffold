<?php // check if the post has a Post Thumbnail assigned to it.
if ( has_post_thumbnail() ) { ?>

<p class="text-center">
<a title="<?php the_title(); ?> &raquo;" href="<?php echo the_permalink(''); ?>">

		<?php the_post_thumbnail('medium'); ?>

			</a>
</p>
<?php } ?>