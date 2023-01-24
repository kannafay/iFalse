<?php
/**
 * Author Social Profile Picture page.
 *
 * @package Author Social Profile Picture page.
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<?php

function wp_avatar_social_profile_picture() {
    global $pagenow;

    if ('profile.php' == $pagenow || 'user-edit.php' == $pagenow)
        wp_register_script('wp-avatar-social-profile-picture', i_static().'/admin/avatar/js/wp-avatar.js', array('jquery'), WPUPA_VERSION, true);
}

add_action('wp_enqueue_scripts', 'wp_avatar_social_profile_picture');

// function wp_avatar_users_menu() {
//     add_users_page('Avatar Social Picture', 'Avatar Social Picture', 'activate_plugins', 'avatar-social-picture', 'wp_user_admin');
// }
// 
// add_action('admin_menu', 'wp_avatar_users_menu');

function wp_user_admin() {
    $wp_avatar_add_social_picture = get_option('wp_avatar_add_social_picture', 'read')
    ?>
    <form id="wp-avatar-settings" method="post" action="">
        <h3><?php _e('WP Avatar User Role Settings', 'wp-user-profile-avatar'); ?></h3>
        <table class="form-table">
            <tr>
                <th>
                    <label for="wp-avatar-capabilty">Role Required</label>
                </th>
                <td>
                    <select id="wp-avatar-add-social-picture" name="wp-avatar-add-social-picture">
                        <option value="read" <?php selected($wp_avatar_add_social_picture, 'read', false); ?> >订阅者</option>
                        <option value="edit_posts" <?php selected($wp_avatar_add_social_picture, 'edit_posts', false); ?> >贡献者</option>
                        <option value="edit_published_posts"<?php selected($wp_avatar_add_social_picture, 'edit_published_posts', false); ?> >作者</option>
                        <option value="moderate_comments" <?php selected($wp_avatar_add_social_picture, 'moderate_comments', false); ?> >编辑</option>
                        <option value="activate_plugins" <?php selected($wp_avatar_add_social_picture, 'activate_plugins', false); ?> >管理员</option>
                    </select>
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" class="button button-primary" id="submit" value="Save Changes">
        </p>
    </form>
    <?php
}

// Saving the WP Avatar social profile settings details.
if (isset($_POST['wp-avatar-add-social-picture']))
    update_option('wp_avatar_add_social_picture', $_POST['wp-avatar-add-social-picture']);

function wp_user_add_extra_profile_picture_fields($socialprofile) {
    $wp_avatar_add_social_picture = get_option('wp_avatar_add_social_picture', 'read');

    if (!current_user_can($wp_avatar_add_social_picture))
        return;
    $wp_user_social_profile = get_user_meta($socialprofile->ID, 'wp_user_social_profile', true);
    $wp_social_fb_profile = get_user_meta($socialprofile->ID, 'wp_social_fb_profile', true);
    $wp_social_gplus_profile = get_user_meta($socialprofile->ID, 'wp_social_gplus_profile', true);
    ?>

    <!-- <h3><?php _e('WP Avatar User Role Settings', 'wp-user-profile-avatar'); ?></h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="facebook-profile">Facebook User ID(numeric)</label>
            </th>
            <td>
                <input type="text" name="fb-profile" id="fb-profile" value=" <?php echo $wp_social_fb_profile; ?>" class="regular-text" />&nbsp;
                <span><a href="http://findmyfacebookid.com/" target="_blank">Find your facebook id here</a></span>
            </td>
        <tr>
            <th>
                <label for="use-fb-profile">Use Facebook Profile as Avatar</label>
            </th>
            <td>
                <input type="checkbox" name="wp-user-social-profile" value="wp-facebook" <?php checked($wp_user_social_profile, 'wp-facebook', false) ?> >
            </td>
        </tr>
        <tr>
            <th>
                <label for="gplus-profile">Google+ id</label>
            </th>
            <td>
                <input type="text" name="gplus-profile" id="gplus-profile" value=" <?php echo $wp_social_gplus_profile; ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="use-gplus-profile">Use Google+ Profile as Avatar</label>
            </th>
            <td>
                <input type="checkbox" name="wp-user-social-profile" value="wp-gplus" <?php checked($wp_user_social_profile, 'wp-gplus', false) ?> >
            </td>
        </tr>
        <tr>
            <th>
                <label for="gplus-clear-cache">Clear Google+ Cache</label></th>
            <td>
                <input type="button" name="wp-gplus-clear" value="Clear Cache" user="<?php echo $socialprofile->ID; ?>">
                <span id="msg"></span>
            </td>
        </tr>
    </table> -->
    <?php
}

add_action('show_user_profile', 'wp_user_add_extra_profile_picture_fields');
add_action('edit_user_profile', 'wp_user_add_extra_profile_picture_fields');

function wp_avatar_save_extra_profile_fields($user_id) {

    update_user_meta($user_id, 'wp_social_fb_profile', trim($_POST['fb-profile']));
    update_user_meta($user_id, 'wp_social_gplus_profile', trim($_POST['gplus-profile']));
    update_user_meta($user_id, 'wp_user_social_profile', $_POST['wp-user-social-profile']);
}

add_action('personal_options_update', 'wp_avatar_save_extra_profile_fields');
add_action('edit_user_profile_update', 'wp_avatar_save_extra_profile_fields');

function wp_user_social_profile_cache_clear() {
    $user_id = sanitize_text_field($_POST['user_id']);
    $delete_transient = delete_transient("wp_social_avatar_gplus_{$user_id}");

    echo $delete_transient;
    die();
}

add_action('wp_ajax_wp_social_avatar_gplus_clear_cache', 'wp_user_social_profile_cache_clear');
add_action('wp_ajax_nopriv_wp_social_avatar_gplus_clear_cache', 'wp_user_social_profile_cache_clear');

function wp_user_fb_profile($avatar, $id_or_email, $size, $default, $alt) {


    if (is_int($id_or_email))
        $user_id = $id_or_email;

    if (is_object($id_or_email))
        $user_id = $id_or_email->user_id;

    if (!is_numeric($id_or_email)) {
        return $avatar;
    }
    if (is_string($id_or_email)) {
        $user = get_user_by('email', $id_or_email);
        if ($user)
            $user_id = $user->ID;
        else
            $user_id = $id_or_email;
    }

    $wp_user_social_profile = get_user_meta($user_id, 'wp_user_social_profile', true);
    $wp_social_fb_profile = get_user_meta($user_id, 'wp_social_fb_profile', true);
    $wp_avatar_add_social_picture = get_option('wp_avatar_add_social_picture', 'read');

    if (user_can($user_id, $wp_avatar_add_social_picture)) {
        if ('wp-facebook' == $wp_user_social_profile && !empty($wp_social_fb_profile)) {

            $fb = 'https://graph.facebook.com/' . $wp_social_fb_profile . '/picture?width=' . $size . '&height=' . $size;
            $avatar = "<img alt='facebook-profile-picture' src='{$fb}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";

            return $avatar;
        } else {
            return $avatar;
        }
    } else {
        return $avatar;
    }
}

add_filter('get_avatar', 'wp_user_fb_profile', 10, 5);

function wp_user_gplus_profile($avatar, $id_or_email, $size, $default, $alt) {


    if (is_int($id_or_email))
        $user_id = $id_or_email;

    if (is_object($id_or_email))
        $user_id = $id_or_email->user_id;

    if (!is_numeric($id_or_email)) {
        return $avatar;
    }
    if (is_string($id_or_email)) {
        $user = get_user_by('email', $id_or_email);
        if ($user)
            $user_id = $user->ID;
        else
            $user_id = $id_or_email;
    }

    $wp_user_social_profile = get_user_meta($user_id, 'wp_user_social_profile', true);
    $wp_social_gplus_profile = get_user_meta($user_id, 'wp_social_gplus_profile', true);
    $wp_avatar_add_social_picture = get_option('wp_avatar_add_social_picture', 'read');

    if (user_can($user_id, $wp_avatar_add_social_picture)) {
        if ('wp-gplus' == $wp_user_social_profile && !empty($wp_social_gplus_profile)) {
            if (false === ( $gplus = get_transient("wp_social_avatar_gplus_{$user_id}") )) {
                $url = 'https://www.googleapis.com/plus/v1/people/' . $wp_social_gplus_profile . '?fields=image&key=AIzaSyBrLkua-XeZh637G1T1J8DoNHK3Oqw81ao';
                $results = wp_remote_get($url, array('timeout' => -1));
                if (!is_wp_error($results)) {
                    if (200 == $results['response']['code']) {
                        $gplusdetails = json_decode($results['body']);
                        $gplus = $gplusdetails->image->url;
                        set_transient("wp_social_avatar_gplus_{$user_id}", $gplus, 48 * HOUR_IN_SECONDS);
                        $gplus = str_replace('sz=50', "sz={$size}", $gplus);

                        $avatar = "<img alt='gplus-profile-picture' src='{$gplus}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
                    }
                }
            } else {
                $gplus = str_replace('sz=50', "sz={$size}", $gplus);

                $avatar = "<img alt='gplus-profile-picture' src='{$gplus}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
            }
            return $avatar;
        } else {
            return $avatar;
        }
    } else {
        return $avatar;
    }
}

add_filter('get_avatar', 'wp_user_gplus_profile', 10, 5);
