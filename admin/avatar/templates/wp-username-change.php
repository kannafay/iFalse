<?php

/**
 * user name change function Page
 */

namespace WpUserNameChange;

if (!defined('ABSPATH')) {
    exit;
}

Class WpUserNameChange {

    public function __construct() {
        global $wpdb;
        $this->db = $wpdb;
        add_action('admin_menu', array($this, 'Wp_user_list'));
        add_action('init', array($this, 'wp_file_include'));
    }

    public function wp_file_include() {
        if (is_admin()) {
            require_once (plugin_dir_path(__FILE__) . '/wp-user-list.php');
        }
    }

    public function Wp_user_list() {
        $allowed_group = 'manage_options';
        if (function_exists('add_submenu_page')) {
            add_submenu_page('users.php', __('修改用户名', 'WP_Username_change'), __('修改用户名', 'WP_Username_change'), $allowed_group, 'WP_Username_change', 'Wp_username_edit');
            add_submenu_page(null, __('Update', 'WP_Username_change'), __('Update', 'WP_Username_change'), $allowed_group, 'Wp_username_update', 'Wp_user_update');
        }
    }

    public function wpuser_select() {
        $records = $this->db->get_results("SELECT * FROM `" . $this->db->prefix . "users`");
        return $records;
    }

    public function wpuser_update($id, $name) {
        $result = $this->db->update(
                $this->db->prefix . 'users',
                array('user_login' => $name, 'display_name' => $name),
                array('id' => $id)
        );
        return $result;
    }

}

$wpuser = new WpUserNameChange ();
