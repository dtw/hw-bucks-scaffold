<!-- WP Paginate plugin should be installed to make this work properly. In the plugin settings, choose to put pagination in .well or .jumbotron -->

<?php if(function_exists('wp_paginate')) {
  echo '<div class="paginate-container col-sm-12 hidden-xs">';
    wp_paginate('');
  echo '</div>';
  // we need different settings on mobile
  echo '<div class="paginate-container hidden-lg hidden-md hidden-sm col-xs-12">';
    wp_paginate('range=1&anchor=1&gap=0');
  echo '</div>';
}
else { ?>

<div id="pagination">
	<div class="nav-previous alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
		</div>
<?php } ?>
