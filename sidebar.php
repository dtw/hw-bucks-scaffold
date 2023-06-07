<?php if ( is_tax('') || is_singular('local_services') || is_search() || is_page_template('template-find-services.php') ) { ?>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Services Sidebar')) : endif; ?>
<?php } ?>

<?php if (is_page()) { ?>
	<?php if ( is_page_template('template-single-page.php') ) { ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Pages without menu')) : endif; ?>
	<?php } else { ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Pages')) : endif; ?>
	<?php } ?>
<?php } ?>

<!-- show sub-category navigation, if necessary -->
<?php if ( is_archive() ) { ?>
	<?php $this_cat = (get_query_var('cat')) ? get_query_var('cat') : 1; ?>
	<?php $this_category = get_category($this_cat);
	if ( isset ($this_category->parent) ) { $this_cat = $this_category->parent; } ?>
	<?php // Check whether this category's parent has children
	$term = get_queried_object();
	$children = get_terms( $term->taxonomy, array(
		'parent'    => $term->term_id,
		'hide_empty' => false
		)
	);
	// print_r($children); // uncomment to examine for debugging
	if($children) { // get_terms will return false if tax does not exist or term wasn't found. ?>
		<h2>In this section</h2>
			<ul class='child-menu'>
				<?php wp_list_categories('orderby=slug&order=ASC&show_option_none=&title_li=&child_of=' . $this_cat . ''); ?>
			</ul>
	<?php } ?>
<?php } ?>

<?php if ( is_tax('') || is_singular('local_services') ) { } else { ?>
	<?php if ( is_archive('') ) { ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Posts')) : endif; ?>
	<?php } ?>
<?php } ?>

<?php if ( is_tax('') || is_singular('local_services') ) { } else { ?>
	<?php if ( is_single('') ) { ?>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Single Post')) : endif; ?>
	<?php } ?>
<?php } ?>
