<!-- WP Paginate plugin should be installed to make this work properly. In the plugin settings, choose to put pagination in .well or .jumbotron -->

<?php if(function_exists('wp_paginate')) {
  wp_paginate('before=<div class="paginate-container col-sm-12 hidden-xs">&after=</div>');
  // we need different settings on mobile
  wp_paginate('before=<!--before--><div class="paginate-container hidden-lg hidden-md hidden-sm col-xs-12">&after=<!--after--></div>&range=1&anchor=1&gap=0');
}
else { ?>

<div id="pagination">
	<div class="nav-previous alignleft"><?php next_posts_link( '&laquo; Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></div>
		</div>
<?php } ?>
