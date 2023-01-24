<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * WPUPA_Install class.
 */
class WPUPA_Install {

    /**
     * install function.
     *
     * @access public static
     * @param 
     * @return 
     * @since 1.0
     */
    public static function install() {

        update_option('wpupa_tinymce', 1);
        update_option('wpupa_show_avatars', 1);
        update_option('wpupa_rating', 'G');
        update_option('wpupa_default', 'mystery');
        update_option('wpupa_version', WPUPA_VERSION);
    }

}
