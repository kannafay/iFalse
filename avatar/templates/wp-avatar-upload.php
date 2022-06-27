<?php
/**
 * upload user profile shortcode
 */
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="wp-user-profile-avatar-upload">
	<form method="post" name="update-user-profile-avatar" class="update-user-profile-avatar" enctype="multipart/form-data">
		<table class="form-table">
			<tr>
				<td>
					<p>
					<input type="text" name="wpupa_url" class="regular-text code" value="<?php echo $wpupa_url; ?>" placeholder="Enter Image URL">
					</p>

					<p><?php _e('OR Upload Image', 'wp-user-profile-avatar'); ?></p>

					<p id="wp_user_profile_avatar_add_button_existing">
						<?php /* <button type="button" class="button" id="wp_user_profile_avatar_add"><?php _e('Choose Image'); ?></button> */ ?>
						<input type="file" name="wp_user_profile_avatar_upload" class="input-text wp-user-profile-avatar-image" accept="image/jpg, image/jpeg, image/gif, image/png" >

						<input type="hidden" name="wpupa_attachment_id" id="wpupa_attachment_id" value="<?php echo $wpupa_attachment_id; ?>">
						<input type="hidden" name="user_id" id="wp_user_id" value="<?php echo $user_id; ?>">
					</p>
				</td>
			</tr>

			<?php
          	$class_hide = 'wp-user-profile-avatar-hide';
          	if(!empty($wpupa_attachment_id) || !empty($wpupa_url))
          	{
          		$class_hide = '';
          	}
          	?>
			<tr id="wp_user_profile_avatar_images_existing">
				<td>
			      	<p id="wp_user_profile_avatar_preview">
			        	<img src="<?php echo $wpupa_original; ?>" alt="">
			        	<span class="description"><?php _e('Original Size', 'wp-user-profile-avatar'); ?></span>
			      	</p>
			      	<p id="wp_user_profile_avatar_thumbnail">
			        	<img src="<?php echo $wpupa_thumbnail; ?>" alt="">
			        	<span class="description"><?php _e('Thumbnail', 'wp-user-profile-avatar'); ?></span>
			      	</p>
			      	<p id="wp_user_profile_avatar_remove_button" class="<?php echo $class_hide; ?>">
				        <button type="button" class="button" id="wp_user_profile_avatar_remove"><?php _e('Remove Image', 'wp-user-profile-avatar'); ?></button>
			        </p>
			      	<p id="wp_user_profile_avatar_undo_button">
			      		<button type="button" class="button" id="wp_user_profile_avatar_undo"><?php _e('Undo', 'wp-user-profile-avatar'); ?></button>
			      	</p>
		      	</td>
			</tr>

			<tr>
				<td>
					<button type="button" class="button" id="wp_user_profile_avatar_update_profile"><?php _e('Update Profile', 'wp-user-profile-avatar'); ?></button>
				</td>
			</tr>

		</table>
	</form>

	<div id="upload_avatar_responce"></div>

</div>