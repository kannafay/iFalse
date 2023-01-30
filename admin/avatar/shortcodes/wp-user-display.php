<?php

/*
 * Class to define user details by using shortcode
 */

class WPUPA_User_Shortcodes {

    /**
     * Constructor 
     */
    public function __construct() {
        add_shortcode('user_display', array($this, 'user_display'));
    }

    /**
     * user_display function
     * 
     * @access public
     * @param $atts
     * @return
     * @since 1.0
     */
    function user_display() {

        $id = get_current_user_id();

        $details = array(
            'first_name' => get_the_author_meta('first_name', $id),
            'last_name' => get_the_author_meta('last_name', $id),
            'description' => get_the_author_meta('description', $id),
            'email' => get_the_author_meta('email', $id),
            'sabox_social_links' => get_the_author_meta('sabox_social_links', $id),
            'sabox-profile-image' => get_the_author_meta('sabox-profile-image', $id),
        );


        ob_start();

        include_once (WPUPA_PLUGIN_DIR . '/templates/wp-display-user.php' );

        return ob_get_clean();
    }

}

new WPUPA_User_Shortcodes();
