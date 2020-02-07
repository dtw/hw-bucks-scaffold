<?php global $post;				// Count unapproved feedback
						$feedback_count = get_comments( array(
							'post_ID' => $post->ID,
							'status' => 'hold',
							'count' => true
						) ); ?>

<?php include_once(ABSPATH.'wp-admin/includes/plugin.php'); // Required for is_plugin_active function ?>

<?php if (											// Check if there are warnings:
is_singular( local_services ) || 						// Is single local service page
($feedback_count > 0) ||								// There's unapproved feedback
 is_plugin_active( 'ajax-search-lite/ajax-search-lite.php' ) 	// Ajax Search Lite not installed
	) { ?>

    		<div class="alert alert-danger container alert-dismissible scaffold-alert" role="alert">

              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>



<!-- LOGGED IN, can't see rate and review form -->

    <?php if (is_singular(local_services)) { ?>

		<p><i class="fas fa-user text-info" aria-hidden="true"></i> You are <strong>logged in</strong>, so don't see the feedback form. <a href="<?php echo wp_logout_url(get_permalink()); ?> ">Logout if you want to see it &raquo;</a></p>

		<?php }


// FEEDBACK WAITING, needs to be approved

if ($feedback_count > 0) {
	echo "<p><i class='fas fa-comments text-warning' aria-hidden='true'></i> You have <strong>" . $feedback_count . " comments</strong> awaiting approval. <a class='scaffold-warning-url' href='" . get_bloginfo(url) . "/wp-admin/edit-comments.php?comment_status=moderated'>Moderate comments &raquo;</a></p>";
} else { echo "<p><i class='fas fa-comments text-info' aria-hidden='true'></i> There are currently <strong>no comments waiting</strong> to be approved.</p>"; }


// If Backup Buddy plugin not activated

/*if ( is_plugin_active ( 'backupbuddy/backupbuddy.php' ) ) { } else {
	echo "<p class='text-danger'><i class='fas fa-exclamation-triangle text-danger' aria-hidden='true'></i> Ensure the <strong>Backup Buddy</strong> plugin is installed and activated. <a href='" . get_bloginfo(url) . "/wp-admin/plugins.php'>See list of plugins &raquo;</a></p>";
}*/


// If Healthwatch plugin not activated

if ( is_plugin_active ( 'healthwatchfeedback/healthwatchfeedback.php' ) ) { } else {
	echo "<p class='text-danger'><i class='fas fa-exclamation-triangle text-danger' aria-hidden='true'></i> Ensure the <strong>Healthwatch Feedback</strong> plugin is installed and activated. <a class='scaffold-warning-url' href='" . get_bloginfo(url) . "/wp-admin/plugins.php'>See list of plugins &raquo;</a></p>";
	}


// If Scaffold Widgets Tweaks plugin not activated

if ( is_plugin_active ( 'scaffold-widgets-tweaks/scaffold-widgets-tweaks.php' ) ) { } else {
	echo "<p class='text-danger'><i class='fas fa-exclamation-triangle text-danger' aria-hidden='true'></i> Ensure the <strong>Scaffold Widgets & Tweaks</strong> plugin is installed and activated. <a class='scaffold-warning-url' href='" . get_bloginfo(url) . "/wp-admin/plugins.php'>See list of plugins &raquo;</a></p>";
	}

// If WP Paginate plugin not activated

if ( is_plugin_active ( 'wp-paginate/wp-paginate.php' ) ) { } else {
	echo "<p class='text-danger'><i class='fas fa-exclamation-triangle text-danger' aria-hidden='true'></i> Ensure the <strong>WP Paginate</strong> plugin is installed and activated. <a class='scaffold-warning-url' href='" . get_bloginfo(url) . "/wp-admin/plugins.php'>See list of plugins &raquo;</a></p>";
	}

	?>

	    </div><!-- end of alert -->

		    <?php } 				// End of IF ?>
