<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('functions/functions-json-ld.php'); ?>
    <script type="application/ld+json">
    // <![CDATA[
    <?php echo json_encode($payload); ?>
    // ]]
    </script>

    <?php if(is_home()) {
      echo '
      <!-- add disable brower cache on frontpage -->
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" />
      ';
    }
    ?>

<!-- META TAGS -->

	<?php if (is_home('')) {
				$thedescription = get_bloginfo('description'); } else {

		if (is_single() || is_page()) {
				$thedescription = get_the_excerpt(); }

		if (is_singular('local_services')) {

				$aCity = get_post_meta(get_the_ID(),'hw_services_city',true);


				$thedescription = "Rate and review the service offered by " . get_the_title() . ", " .  $aCity;

			}?>
      <meta name="description" content="<?php echo $thedescription; ?>" />
    <?php }
				?>


<!-- SUPPORT FOR INTERNET EXPLORER -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<!-- SHOW / HIDE NAV MENU ON SCROLL -->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
	  </head>


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
