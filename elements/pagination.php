<!-- WP Paginate plugin should be installed to make this work properly. In the plugin settings, choose to put pagination in .well or .jumbotron -->

<?php if(function_exists('wp_paginate')) {
  echo '<div class="paginate-container col-sm-12 hidden-xs">';
    wp_paginate('');
  echo '</div>';
  // we need different settings on mobile
  echo '<div class="paginate-container hidden-lg hidden-md hidden-sm col-xs-12">';
    echo '<div class="paginate-title col-xs-12"><span class="title">Pages:</span></div>';
    echo '<div class="paginate-pages col-xs-12"><span class="title">';
      wp_paginate('title=&range=1&anchor=1&gap=0');
    echo '</div>';
  echo '</div>';
}
else { ?>

<div id="pagination">
	<div class="nav-previous alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
		</div>
<?php } ?>
