<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<?php get_template_part('elements/header-head'); ?>

<?php // BODY class for ANCESTOR pages
	/* Get the Page Slug to Use as a Body Class, this will only return a value on pages */
	$class = '';
	/* is it a page */
	if( is_page() ) {
		global $post;
			/* Get an array of Ancestors and Parents if they exist */
		$parents = get_post_ancestors( $post->ID );
			/* Get the top Level page->ID count base 1, array base 0 so -1 */
		$id = ($parents) ? $parents[count($parents)-1]: $post->ID;
		/* Get the parent and set the $class with the page slug (post_name) */
			$parent = get_page( $id );
		$class = 'ancestor-' . $parent->post_name;
	}

	?>

	<body <?php body_class( $class ); ?>>

<!-- INCLUDE NAVIGATION -->

	<?php get_template_part('elements/nav'); ?>

	<?php get_template_part('elements/page-title'); ?>

	</div><!-- end of container-fluid -->
