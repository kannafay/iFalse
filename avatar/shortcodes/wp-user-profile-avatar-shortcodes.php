<?php
class WPUPA_Shortcodes {

	/**
	 * Constructor - get the plugin hooked in and ready
	 */
	public function __construct() 
	{
		add_shortcode( 'user_profile_avatar', array( $this, 'user_profile_avatar' ) );
		add_shortcode( 'user_profile_avatar_upload', array( $this, 'user_profile_avatar_upload' ) );		

		add_action( 'wp_ajax_nopriv_update_user_avatar', array( $this, 'update_user_avatar' ) );
		add_action( 'wp_ajax_update_user_avatar', array( $this, 'update_user_avatar' ) );

		add_action( 'wp_ajax_nopriv_remove_user_avatar', array( $this, 'remove_user_avatar' ) );
		add_action( 'wp_ajax_remove_user_avatar', array( $this, 'remove_user_avatar' ) );

		add_action( 'wp_ajax_nopriv_undo_user_avatar', array( $this, 'undo_user_avatar' ) );
		add_action( 'wp_ajax_undo_user_avatar', array( $this, 'undo_user_avatar' ) );
	}

    /**
     * user_profile_avatar function.
     *
     * @access public
     * @param $atts, $content
     * @return 
     * @since 1.0
     */
	public function user_profile_avatar($atts = [], $content = null) 
	{
		global $blog_id, $post, $wpdb;

		$current_user_id = get_current_user_id();

		extract( shortcode_atts( array(
			'user_id' 	=> '',
			'size' 		=> 'thumbnail',
			'align' 	=> 'alignnone',
			'link' 		=> '#',
			'target'	=> '_self',

		), $atts ) );

		ob_start();

		$image_url = get_wpupa_url( $user_id, ['size' => $size ] );

		if($link == 'image') {
	        // Get image src
	        $link = get_wpupa_url( $user_id, ['size' => 'original' ] );
	    } 
	    elseif($link == 'attachment') 
	    {
	        // Get attachment URL
	        $link = get_attachment_link(get_the_author_meta($wpdb->get_blog_prefix($blog_id).'user_avatar', $user_id));
	    }
		
		include_once (WPUPA_PLUGIN_DIR . '/templates/wp-user-avatar.php' );

		return ob_get_clean();

	}

    /**
     * user_profile_avatar_upload function.
     *
     * @access public
     * @param $atts, $content
     * @return 
     * @since 1.0
     */
	public function user_profile_avatar_upload($atts = [], $content = null) 
	{
		extract( shortcode_atts( array(
			
		), $atts ) );

		ob_start();

		if(!is_user_logged_in())
		{
			echo '<h5><strong style="color:red;">' . __( 'ERROR: ', 'wp-event-manager-zoom' ) . '</strong>' . __( 'You do not have enough priviledge to access this page. Please login to continue.', 'wp-user-profile-avatar' ) . '</h5>';

			return false;
		}

		$wpupa_allow_upload = get_option('wpupa_allow_upload');

		$user_id = get_current_user_id();

		$user_data = get_userdata($user_id);

		if(in_array('contributor', $user_data->roles))
		{	
			if(empty($wpupa_allow_upload))
			{
				echo '<h5><strong style="color:red;">' . __( 'ERROR: ', 'wp-event-manager-zoom' ) . '</strong>' . __( 'You do not have enough priviledge to access this page. Please login to continue.', 'wp-user-profile-avatar' ) . '</h5>';

				return false;
			}
		}

		if(in_array('subscriber', $user_data->roles))
		{	
			if(empty($wpupa_allow_upload))
			{
				echo '<h5><strong style="color:red;">' . __( 'ERROR: ', 'wp-event-manager-zoom' ) . '</strong>' . __( 'You do not have enough priviledge to access this page. Please login to continue.', 'wp-user-profile-avatar' ) . '</h5>';

				return false;
			}
		}		

		wp_enqueue_script( 'wp-user-profile-avatar-frontend-avatar' );

		$wpupa_original = get_wpupa_url($user_id, ['size' => 'original']);
		$wpupa_thumbnail = get_wpupa_url($user_id, ['size' => 'thumbnail']);

		$wpupa_attachment_id = get_user_meta($user_id, '_wpupa_attachment_id', true);
		$wpupa_url = get_user_meta($user_id, '_wpupa_url', true);
		
		include_once (WPUPA_PLUGIN_DIR . '/templates/wp-avatar-upload.php' );

		return ob_get_clean();
	}

    /**
     * update_user_avatar function.
     *
     * @access public
     * @param 
     * @return 
     * @since 1.0
     */
	public function update_user_avatar() 
	{
		check_ajax_referer( '_nonce_user_profile_avatar_security', 'security' );
  
		parse_str($_POST['form_data'], $form_data);

		//sanitize each of the values of form data
		$form_wpupa_url =esc_url_raw($form_data['wpupa_url']);
		$form_wpupa_attachment_id =absint($form_data['wpupa_attachment_id']);
		$user_id =absint($form_data['user_id']);

		
		$file = $_FILES['user-avatar'];

        if (isset($file) && !empty($file))
        {
        	
            $post_id = 0;

			//sanitize each of the values of file data
            $file_name=sanitize_file_name($file['name']);
			$file_type=sanitize_text_field($file['type']);
			$file_tmp_name=sanitize_text_field($file['tmp_name']);
			$file_size=absint($file['size']);

            // Upload file
            $overrides     = array('test_form' => false);
            $uploaded_file = $this->handle_upload($file, $overrides);

            $attachment = array(
                'post_title'     => $file_name,
                'post_content'   => '',
                'post_type'      => 'attachment',
                'post_parent'    => null, // populated after inserting post
                'post_mime_type' => $file_type,
                'guid'           => $uploaded_file['url']
            );

            $attachment['post_parent'] = $post_id;
            $attach_id = wp_insert_attachment($attachment, $uploaded_file['file'], $post_id);
            $attach_data = wp_generate_attachment_metadata($attach_id, $uploaded_file['file']);

			if(isset($user_id,$attach_id))
			{
				$result = wp_update_attachment_metadata($attach_id, $attach_data);
            	update_user_meta($user_id, '_wpupa_attachment_id', $attach_id);
			}
        }
        else
        {
        	if(isset($user_id,$form_wpupa_attachment_id))
        		update_user_meta($user_id, '_wpupa_attachment_id', $form_wpupa_attachment_id);
        }

		if(isset($user_id,$form_wpupa_url))
        	update_user_meta($user_id, '_wpupa_url', $form_wpupa_url);

        if(!empty($form_wpupa_attachment_id) || $form_wpupa_url)
		{			
			update_user_meta( $user_id, '_wpupa_default', 'wp_user_profile_avatar' );
		}
		else
		{			
			update_user_meta( $user_id, '_wpupa_default', '' );
		}

        $wpupa_attachment_id = get_user_meta($user_id, '_wpupa_attachment_id', true);
		$wpupa_url = get_user_meta($user_id, '_wpupa_url', true);

		if( empty($wpupa_attachment_id) && empty($wpupa_url))
		{
			$wpupa_original = '';
			$wpupa_thumbnail = '';
			$message = __( 'Error! Select Image', 'wp-user-profile-avatar');
			$class = 'wp-user-profile-avatar-error';
		}
		else
		{
			$wpupa_original = get_wpupa_url($user_id, ['size' => 'original']);
			$wpupa_thumbnail = get_wpupa_url($user_id, ['size' => 'thumbnail']);
			$message = __( 'Successfully Updated Avatar', 'wp-user-profile-avatar');
			$class = 'wp-user-profile-avatar-success';
		}

		echo json_encode(['avatar_original' => $wpupa_original, 'avatar_thumbnail' => $wpupa_thumbnail, 'message' => $message, 'class' => $class]);

        wp_die();
	}

    /**
     * remove_user_avatar function.
     *
     * @access public
     * @param 
     * @return 
     * @since 1.0
     */
	function remove_user_avatar()
    {
        check_ajax_referer( '_nonce_user_profile_avatar_security', 'security' );

        parse_str($_POST['form_data'], $form_data);

		//sanitize each of the values of form data
		$wpupa_url =esc_url_raw($form_data['wpupa_url']);
		$wpupa_attachment_id =absint($form_data['wpupa_attachment_id']);
		$user_id =absint($form_data['user_id']);

		if(isset($user_id))
		{
			update_user_meta($user_id, '_wpupa_attachment_id', '');
        	update_user_meta($user_id, '_wpupa_url', '');
        	update_user_meta( $user_id, '_wpupa_default', '' );

        	//delete also attachment
        	wp_delete_attachment($wpupa_attachment_id,true);
		}

        $wpupa_original = get_wpupa_url($user_id, ['size' => 'original']);
		$wpupa_thumbnail = get_wpupa_url($user_id, ['size' => 'thumbnail']);

		$message = __( 'Successfully Removed Avatar', 'wp-user-profile-avatar');
		$class = 'wp-user-profile-avatar-success';

		echo json_encode(['avatar_original' => $wpupa_original, 'avatar_thumbnail' => $wpupa_thumbnail, 'message' => $message, 'class' => $class]);

        wp_die();
    }

    /**
     * undo_user_avatar function.
     *
     * @access public
     * @param 
     * @return 
     * @since 1.0
     */
    function undo_user_avatar()
    {
        check_ajax_referer( '_nonce_user_profile_avatar_security', 'security' );

        parse_str($_POST['form_data'], $form_data); 

		//sanitize each of the values of form data
		$wpupa_url =esc_url_raw($form_data['wpupa_url']);
		$wpupa_attachment_id =absint($form_data['wpupa_attachment_id']);
		$user_id =absint($form_data['user_id']);

		if(isset($user_id,$wpupa_attachment_id,$wpupa_url))
		{
			update_user_meta($user_id, '_wpupa_attachment_id', $wpupa_attachment_id);
        	update_user_meta($user_id, '_wpupa_url', $wpupa_url);
		}

        if(!empty($wpupa_attachment_id) || $wpupa_url)
		{
			update_user_meta( $user_id, '_wpupa_default', 'wp_user_profile_avatar' );
		}
		else
		{
			update_user_meta( $user_id, '_wpupa_default', '' );
		}

        $wpupa_original = get_wpupa_url($user_id, ['size' => 'original']);
		$wpupa_thumbnail = get_wpupa_url($user_id, ['size' => 'thumbnail']);

		$message = __( 'Successfully Undo Avatar', 'wp-user-profile-avatar');
		$class = 'wp-user-profile-avatar-success';

		echo json_encode(['avatar_original' => $wpupa_original, 'avatar_thumbnail' => $wpupa_thumbnail, 'message' => $message, 'class' => $class]);

        wp_die();
    }

    /**
     * handle_upload function.
     *
     * @access public
     * @param $file_handler, $overrides
     * @return 
     * @since 1.0
     */
	function handle_upload($file_handler, $overrides)
    {
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );

        $upload = wp_handle_upload($file_handler, $overrides);

        return $upload;
    }

}

new WPUPA_Shortcodes();