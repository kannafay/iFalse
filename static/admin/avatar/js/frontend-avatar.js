var FrontendAvatar = function () {

    return {

	    init: function() 
        {
        	jQuery( '#wp_user_profile_avatar_add' ).on('click', FrontendAvatar.actions.chooseAvatar);
            jQuery( '#wp_user_profile_avatar_remove' ).on('click', FrontendAvatar.actions.removeAvatar);
            jQuery( '#wp_user_profile_avatar_undo' ).on('click', FrontendAvatar.actions.undoAvatar);
            jQuery( '#wp_user_profile_avatar_update_profile' ).on('click', FrontendAvatar.actions.updateAvatar);
        },

	    actions:
	    {
            /**
             * removeAvatar function.
             *
             * @access public
             * @param 
             * @return 
             * @since 1.0
             */        
	    	removeAvatar: function (event) 
            {
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-error');
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-success');
                jQuery('#upload_avatar_responce').html('');

                var form_data = jQuery('.update-user-profile-avatar').serialize();

                var fd = new FormData();
                fd.append("action", 'remove_user_avatar');
                fd.append("form_data", form_data);
                fd.append("security", wp_user_profile_avatar_frontend_avatar.wp_user_profile_avatar_security);

                jQuery.ajax({
                    url: wp_user_profile_avatar_frontend_avatar.ajax_url,
                    type: 'post',
                    dataType: 'JSON',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (responce)
                    {
                        jQuery('#upload_avatar_responce').addClass(responce.class);
                        jQuery('#upload_avatar_responce').html(responce.message);

                        if(responce.class == 'wp-user-profile-avatar-success')
                        {
                            jQuery('#wp_user_profile_avatar_preview img').attr('src', responce.avatar_original);
                            jQuery('#wp_user_profile_avatar_thumbnail img').attr('src', responce.avatar_thumbnail);

                            jQuery('.update-user-profile-avatar #wpupa_url').val('');
                            jQuery('.update-user-profile-avatar #wpupa_attachment_id').val('');
                            jQuery('#wp_user_profile_avatar_remove_button').hide(); 
                        }
                    }
                });
            },

            /**
             * undoAvatar function.
             *
             * @access public
             * @param 
             * @return 
             * @since 1.0
             */
            undoAvatar: function (event) 
            {
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-error');
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-success');
                jQuery('#upload_avatar_responce').html('');

                var form_data = jQuery('.update-user-profile-avatar').serialize();

                var fd = new FormData();
                fd.append("action", 'undo_user_avatar');
                fd.append("form_data", form_data);
                fd.append("security", wp_user_profile_avatar_frontend_avatar.wp_user_profile_avatar_security);

                jQuery.ajax({
                    url: wp_user_profile_avatar_frontend_avatar.ajax_url,
                    type: 'post',
                    dataType: 'JSON',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (responce)
                    {
                        jQuery('#upload_avatar_responce').addClass(responce.class);
                        jQuery('#upload_avatar_responce').html(responce.message);

                        if(responce.class == 'wp-user-profile-avatar-success')
                        {
                            jQuery('#wp_user_profile_avatar_preview img').attr('src', responce.avatar_original);
                            jQuery('#wp_user_profile_avatar_thumbnail img').attr('src', responce.avatar_thumbnail);

                            jQuery('#wp_user_profile_avatar_undo_button').hide();    
                        }
                    }
                });
            },

            /**
             * updateAvatar function.
             *
             * @access public
             * @param 
             * @return 
             * @since 1.0
             */
            updateAvatar: function (event) 
            {
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-error');
                jQuery('#upload_avatar_responce').removeClass('wp-user-profile-avatar-success');
                jQuery('#upload_avatar_responce').html('');
                
                var form_data = jQuery('.update-user-profile-avatar').serialize();

                var fd = new FormData();
                fd.append("user-avatar", jQuery('.wp-user-profile-avatar-image')[0].files[0]);
                fd.append("action", 'update_user_avatar');
                fd.append("form_data", form_data);
                fd.append("security", wp_user_profile_avatar_frontend_avatar.wp_user_profile_avatar_security);

                jQuery.ajax({
                    url: wp_user_profile_avatar_frontend_avatar.ajax_url,
                    type: 'post',
                    dataType: 'JSON',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (responce)
                    {
                        jQuery('#upload_avatar_responce').addClass(responce.class);
                        jQuery('#upload_avatar_responce').html(responce.message);

                        if(responce.class == 'wp-user-profile-avatar-success')
                        {
                            jQuery('#wp_user_profile_avatar_preview img').attr('src', responce.avatar_original);
                            jQuery('#wp_user_profile_avatar_thumbnail img').attr('src', responce.avatar_thumbnail);

                            jQuery('#wp_user_profile_avatar_undo_button').show();    
                        }
                    }
                });

            },
		
		} /* end of action */

    }; /* enf of return */

}; /* end of class */

FrontendAvatar = FrontendAvatar();

jQuery(document).ready(function($) 
{
   FrontendAvatar.init();
});
