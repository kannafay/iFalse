<?php
/**
 * user profile shortcode
 */
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="wp-user-profile-avatar">
	<a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="wp-user-profile-avatar-link">
		<img src="<?php echo $image_url; ?>" class="size-<?php echo $size; ?> <?php echo $align; ?>"  alt="<?php echo $content; ?>" />
	</a>
	<p class="caption-text <?php echo $align; ?>"><?php echo $content; ?></p>
</div>