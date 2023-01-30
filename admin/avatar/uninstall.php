<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit();
}

$options = array(
    'wpupa_tinymce',
    'wpupa_show_avatars',
    'wpupa_rating',
    'wpupa_default',
    'wpupa_version',
    'wpupa_allow_upload',
    'wpupa_disable_gravatar',
    'wpupa_show_avatars',
    'wpupa_attachment_id',
);

foreach ($options as $option) {
    delete_option($option);
}

$users = get_users();

foreach ($users as $user) {
    delete_user_meta($user->ID, '_wpupa_attachment_id');
    delete_user_meta($user->ID, '_wpupa_default');
    delete_user_meta($user->ID, '_wpupa_url');
}