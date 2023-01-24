<?php

/*
 * Class to define author box social info by using shortcode
 */

class WPUPA_authorbox_socialinfo_Shortcodes {

    /**
     * Constructor 
     */
    public function __construct() {
        add_shortcode('authorbox_social_link', array($this, 'authorbox_social_link'));
    }

    /**
     * authorbox_social_link function
     * 
     * @access public
     * @param $atts
     * @return
     * @since 1.0
     */
    function authorbox_social_link() {

        $id = get_current_user_id();

        $details = array(
        );
        ob_start();

        include_once (WPUPA_PLUGIN_DIR . '/templates/wp-author-box-social-info.php' );

        return ob_get_clean();
    }

}

new WPUPA_authorbox_socialinfo_Shortcodes();
