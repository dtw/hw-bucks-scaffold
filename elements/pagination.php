<!-- WP Paginate plugin should be installed to make this work properly. In the plugin settings, choose to put pagination in .well or .jumbotron -->

<?php if(function_exists('wp_paginate')) {
    wp_paginate();
}
else { ?>

<div id="pagination">
	<div class="nav-previous alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
		</div>
<?php } ?>