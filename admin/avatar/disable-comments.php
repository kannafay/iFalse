<?php

add_action('admin_menu', 'comments_settings_menu');
add_action('admin_menu', 'comments_tools_menu');

function comments_settings_menu() {
    add_submenu_page('options-general.php', 'Disable Comments', 'Disable Comments', 'manage_options', 'disable_comments_settings', 'comments_settings_page');
}

function comments_settings_page() {
    include dirname(__FILE__) . '/templates/comments-settings-page.php';
}

function comments_tools_menu() {
    add_submenu_page('tools.php', 'Delete Comments', 'Delete Comments', 'manage_options', 'disable_comments_tools', 'comments_tools_page');
}

function comments_tools_page() {
    include dirname(__FILE__) . '/templates/comments-tools-page.php';
}

add_action('init', 'init_filters');

function init_filters() {

    $options = get_option('disable_comments_options', false);

    if (is_array($options) && isset($options['remove_everywhere'])) {

        add_action('template_redirect', 'filter_admin_bar');
        add_action('admin_init', 'filter_admin_bar');
    }
    add_action('wp_loaded', 'init_wploaded_filters');
}

function init_wploaded_filters() {
    $options = get_option('disable_comments_options', array());
    $modified_types = array();
    $disabled_post_types = get_disabled_post_types();
    if (!empty($disabled_post_types)) {
        foreach ($disabled_post_types as $type) {
            if (post_type_supports($type, 'comments')) {
                $modified_types[] = $type;
                remove_post_type_support($type, 'comments');
                remove_post_type_support($type, 'trackbacks');
            }
        }
    }

    // Filters for the admin only.
    if (is_admin()) {

        if (isset($options['remove_everywhere'])) {
            add_action('admin_menu', 'filter_admin_menu');
        }
    }
    // Filters for front end only.
    else {
        add_action('template_redirect', 'check_comment_template');

        if (isset($options['remove_everywhere'])) {
            add_filter('feed_links_show_comments_feed', '__return_false');
        }
    }
}

function discussion_settings_allowed() {
    if (defined('DISABLE_COMMENTS_ALLOW_DISCUSSION_SETTINGS') && DISABLE_COMMENTS_ALLOW_DISCUSSION_SETTINGS == true) {
        return true;
    }
}

function filter_admin_menu() {
    global $pagenow;

    if ($pagenow == 'comment.php' || $pagenow == 'edit-comments.php') {
        wp_die(__('Comments are closed.', 'disable-comments'), '', array('response' => 403));
    }

    remove_menu_page('edit-comments.php');

    if (!discussion_settings_allowed()) {
        if ($pagenow == 'options-discussion.php') {
            wp_die(__('Comments are closed.', 'disable-comments'), '', array('response' => 403));
        }

        remove_submenu_page('options-general.php', 'options-discussion.php');
    }
}

function is_post_type_disabled($type) {
    return in_array($type, get_disabled_post_types());
}

/**
 * Replace the theme's comment template with a blank one.
 * To prevent this, define DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE
 * and set it to True
 */
function check_comment_template() {
    $options = get_option('disable_comments_options', array());
    if (is_singular() && (isset($options['remove_everywhere']) || is_post_type_disabled(get_post_type()) )) {
        if (!defined('DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE') || DISABLE_COMMENTS_REMOVE_COMMENTS_TEMPLATE == true) {
            // Kill the comments template.
            add_filter('comments_template', 'dummy_comments_template');
        }
        // Remove comment-reply script for themes that include it indiscriminately.
        wp_deregister_script('comment-reply');
    }
}

function dummy_comments_template() {
    return dirname(__FILE__) . '/templates/comments-template.php';
}

/**
 * Remove comment links from the admin bar.
 */
function filter_admin_bar() {
    if (is_admin_bar_showing()) {
        // Remove comments links from admin bar.
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        if (is_multisite()) {
            add_action('admin_bar_menu', 'remove_network_comment_links', 500);
        }
    }
}

/**
 * Get an array of disabled post type.
 */
function get_disabled_post_types() {
    $options = get_option('disable_comments_options', false);
    $types = isset($options['disabled_post_types']) ? $options['disabled_post_types'] : '';
    // Not all extra_post_types might be registered on this particular site.
    if (is_array($options) && isset($options['extra_post_types']))
        foreach ($options['extra_post_types'] as $extra) {
            if (post_type_exists($extra)) {
                $types[] = $extra;
            }
        }
    if (!is_array($types)) {
        $types = [];
    }
    return $types;
}

?>