<?php
if ( ! function_exists( 'get_wpupa_rating' ) ) {
	/**
     * get_wpupa_rating function.
     *
     * @access public
     * @param 
     * @return array
     * @since 1.0
     */
	function get_wpupa_rating() {
		return apply_filters( 'wp_user_avatar_rating', array(
			'G' => __('G &#8212; 适合任何年龄的访客查看','wp-user-profile-avatar'),
          	'PG' => __('PG &#8212; 可能有争议的头像，只适合13岁以上读者查看','wp-user-profile-avatar'),
          	'R' => __('R &#8212; 成人级，只适合17岁以上成人查看','wp-user-profile-avatar'),
          	'X' => __('X &#8212; 最高等级，不适合大多数人查看','wp-user-profile-avatar')
		) );
	}
}

if ( ! function_exists( 'get_wpupa_default_avatar' ) ) {
	/**
     * get_wpupa_default_avatar function.
     *
     * @access public
     * @param 
     * @return array
     * @since 1.0
     */
	function get_wpupa_default_avatar() {
		return apply_filters( 'wp_user_default_avatar', array(
			'mystery' => __('默认','wp-user-profile-avatar'),
	      	// 'blank' => __('Blank','wp-user-profile-avatar'),
	      	// 'gravatar_default' => __('Gravatar Logo','wp-user-profile-avatar'),
	      	// 'identicon' => __('Identicon (Generated)','wp-user-profile-avatar'),
	      	// 'wavatar' => __('Wavatar (Generated)','wp-user-profile-avatar'),
	      	// 'monsterid' => __('MonsterID (Generated)','wp-user-profile-avatar'),
	      	// 'retro' => __('Retro (Generated)','wp-user-profile-avatar')
		) );
	}
}

if ( ! function_exists( 'get_wpupa_default_avatar_url' ) ) {
	/**
     * get_wpupa_default_avatar_url function.
     *
     * @access public
     * @param $args
     * @return string
     * @since 1.0
     */
	function get_wpupa_default_avatar_url($args = []) {
		
		$size = !empty($args['size']) ? $args['size'] : 'thumbnail';
		$user_id = !empty($args['user_id']) ? $args['user_id'] : '';

		$wpupa_default = get_option('wpupa_default');

		/*
		if($size == 'admin')
		{
			$wpupa_default = '';
		}
		*/

		if($wpupa_default == 'wp_user_profile_avatar' || $size == 'admin')
		{
			$attachment_id = get_option('wpupa_attachment_id');

			if(!empty($attachment_id))
			{
				$image_attributes = wp_get_attachment_image_src($attachment_id, $size);

				if(!empty($image_attributes))
				{
					return $image_attributes[0];
				}
				else
				{
					return get_template_directory_uri() . '/avatar/assets/images/wp-user-'. $size .'.png';
				}
			}
			else
			{
				return get_template_directory_uri() . '/avatar/assets/images/wp-user-'. $size .'.png';
			}
		}
		else
		{
			if(!empty($wpupa_default))
			{
				if($size == 'admin')
				{
					return get_template_directory_uri() . '/avatar/assets/images/wp-user-'. $size .'.png';
				}
				else if($size == 'original')
				{
					$size_no = 512;
				}
				else if($size == 'medium')
				{
					$size_no = 150;
				}
				else if($size == 'thumbnail')
				{
					$size_no = 150;
				}
				else
				{
					$size_no = 32;
				}

				$avatar = get_avatar('unknown@gravatar.com', $size_no, $wpupa_default);

				preg_match('%<img.*?src=["\'](.*?)["\'].*?/>%i', $avatar, $matches);

				if(!empty($matches[1]))
				{
					return $matches[1] . 'forcedefault=1';
				}
				else
				{
					return get_template_directory_uri() . '/avatar/assets/images/wp-user-'. $size .'.png';	
				}
			}
			else
			{
				return get_template_directory_uri() . '/avatar/assets/images/wp-user-'. $size .'.png';	
			}
			
		}
		
	}
}

if ( ! function_exists( 'get_wpupa_url' ) ) {
	/**
     * get_wpupa_url function.
     *
     * @access public
     * @param $user_id, $args
     * @return string
     * @since 1.0
     */
	function get_wpupa_url($user_id, $args = []) 
	{
		$size = !empty($args['size']) ? $args['size'] : 'thumbnail';

		$wpupa_url = get_user_meta($user_id, '_wpupa_url', true);

		$attachment_id = get_user_meta($user_id, '_wpupa_attachment_id', true);

		$wpupa_default = get_user_meta($user_id, '_wpupa_default', true);

		if(!empty($wpupa_url))
		{
			return $wpupa_url;
		}
		else if(!empty($attachment_id))
		{
			$image_attributes = wp_get_attachment_image_src($attachment_id, $size);

			if(!empty($image_attributes))
			{
				return $image_attributes[0];
			}
			else
			{
				return get_wpupa_default_avatar_url(['user_id' => $user_id, 'size' => $size]);
			}
		}
		else
		{
			return get_wpupa_default_avatar_url(['user_id' => $user_id, 'size' => $size]);
		}
	}
}

if ( ! function_exists( 'check_wpupa_url' ) ) {
	/**
     * check_wpupa_url function.
     *
     * @access public
     * @param $user_id
     * @return boolean
     * @since 1.0
     */
	function check_wpupa_url($user_id = '')
	{
		$attachment_url = get_user_meta($user_id, '_wpupa_url', true);

		$attachment_id = get_user_meta($user_id, '_wpupa_attachment_id', true);

		$wpupa_default = get_user_meta($user_id, '_wpupa_default', true);

		if(!empty($attachment_url) || !empty($attachment_id))
		{
			return true;			
		}
		else
		{
			return false;
		}
	}
}

if ( ! function_exists( 'check_wpupa_gravatar' ) ) {
	/**
     * check_wpupa_gravatar function.
     *
     * @access public
     * @param $id_or_email, $check_gravatar, $user, $email
     * @return boolean 
     * @since 1.0
     */
	function check_wpupa_gravatar($id_or_email="", $check_gravatar=0, $user="", $email="") 
	{
	    $wp_user_hash_gravatar = get_option('wp_user_hash_gravatar');

	    $wpupa_default = get_option('wpupa_default');

	    if(trim($wpupa_default) != 'wp_user_profile_avatar')
	      return true;
	   
	    if(!is_object($id_or_email) && !empty($id_or_email)) {
	      // Find user by ID or e-mail address
	      $user = is_numeric($id_or_email) ? get_user_by('id', $id_or_email) : get_user_by('email', $id_or_email);
	      // Get registered user e-mail address
	      $email = !empty($user) ? $user->user_email : "";
	    }

	    if($email == ""){

	      if(!is_numeric($id_or_email) and !is_object($id_or_email))
	        $email = $id_or_email;
	      elseif(!is_numeric($id_or_email) and is_object($id_or_email))
	        $email = $id_or_email->comment_author_email;
	    }
	    if($email!="")
	    {
	      $hash = md5(strtolower(trim($email)));
	      //check if gravatar exists for hashtag using options
	      
	      if(is_array($wp_user_hash_gravatar)){
	    
	        
	      if ( array_key_exists($hash, $wp_user_hash_gravatar) and is_array($wp_user_hash_gravatar[$hash]) and array_key_exists(date('m-d-Y'), $wp_user_hash_gravatar[$hash]) )
	      {
	        return (bool) $wp_user_hash_gravatar[$hash][date('m-d-Y')];
	      } 
	      
	      }
	      
	      //end
	       if ( isset( $_SERVER['HTTPS'] ) && ( 'on' == $_SERVER['HTTPS'] || 1 == $_SERVER['HTTPS'] ) || isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && 'https' == $_SERVER['HTTP_X_FORWARDED_PROTO'] ) { 
	        $http='https';
	      }else{
	        $http='http';
	      }
	      $gravatar = $http.'://www.gravatar.com/avatar/'.$hash.'?d=404';
	      
	      $data = wp_cache_get($hash);

	      if(false === $data) {
	        $response = wp_remote_head($gravatar);
	        $data = is_wp_error($response) ? 'not200' : $response['response']['code'];
	        
	        wp_cache_set($hash, $data, $group="", $expire=60*5);
	        //here set if hashtag has avatar
	        $check_gravatar = ($data == '200') ? true : false;
	        if($wp_user_hash_gravatar == false){
	        $wp_user_hash_gravatar[$hash][date('m-d-Y')] = (bool)$check_gravatar;
	        add_option('wp_user_hash_gravatar',serialize($wp_user_hash_gravatar));
	        }
	        else{

	          if(is_array($wp_user_hash_gravatar) && !empty($wp_user_hash_gravatar)){

	              if (array_key_exists($hash, $wp_user_hash_gravatar)){

	                  unset($wp_user_hash_gravatar[$hash]);
	                  $wp_user_hash_gravatar[$hash][date('m-d-Y')] = (bool)$check_gravatar;
	                  update_option('wp_user_hash_gravatar',serialize($wp_user_hash_gravatar));
	              }
	              else
	              {
	                $wp_user_hash_gravatar[$hash][date('m-d-Y')] = (bool)$check_gravatar;
	                update_option('wp_user_hash_gravatar',serialize($wp_user_hash_gravatar));

	              }

	          }
	        
	        }
	      //end
	      }
	      $check_gravatar = ($data == '200') ? true : false;
	      
	    }
	    else
	      $check_gravatar = false;

	    // Check if Gravatar image returns 200 (OK) or 404 (Not Found)
	    return (bool) $check_gravatar;
	}
}

if ( ! function_exists( 'get_wpupa_image_size' ) ) {
	/**
     * get_wpupa_image_size function.
     *
     * @access public
     * @param 
     * @return array
     * @since 1.0
     */
	function get_wpupa_image_sizes() {
		return apply_filters( 'wp_image_sizes', array(
			'original' => __('Original','wp-user-profile-avatar'),
          	'large' => __('Large','wp-user-profile-avatar'),
          	'medium' => __('Medium','wp-user-profile-avatar'),
          	'thumbnail' => __('Thumbnail','wp-user-profile-avatar'),
		) );
	}
}

if ( ! function_exists( 'get_wpupa_image_alignment' ) ) {
	/**
     * get_wpupa_image_alignment function.
     *
     * @access public
     * @param 
     * @return array
     * @since 1.0
     */
	function get_wpupa_image_alignment() {
		return apply_filters( 'wp_image_alignment', array(
			'aligncenter' => __('Center','wp-user-profile-avatar'),
          	'alignleft' => __('Left','wp-user-profile-avatar'),
          	'alignright' => __('Right','wp-user-profile-avatar'),
		) );
	}
}

if ( ! function_exists( 'get_wpupa_image_link_to' ) ) {
	/**
     * get_wpupa_image_link_to function.
     *
     * @access public
     * @param 
     * @return array
     * @since 1.0
     */
	function get_wpupa_image_link_to() {
		return apply_filters( 'wp_image_link_to', array(
			'image' => __('Image File','wp-user-profile-avatar'),
          	'attachment' => __('Attachment Page','wp-user-profile-avatar'),
          	'custom' => __('Custom URL','wp-user-profile-avatar'),
		) );
	}
}