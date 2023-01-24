<div class="wrap wp-user-profile-avatar-shortcode-wrap">
    <h2 class="nav-tab-wrapper">
        <a href="#settings_user_avatar" class="nav-tab"><?php _e('User Avatar', 'wp-user-profile-avatar'); ?></a>
        <a href="#settings_upload_avatar" class="nav-tab"><?php _e('Upload Avatar', 'wp-user-profile-avatar'); ?></a>		    
    </h2>

    <div class="admin-setting-left">			     	
        <div class="white-background">
            <div id="settings_user_avatar" class="settings-panel">
                <form name="user_avatar_form" class="user_avatar_form">
                    <table class="form-table">
                        <tr>
                            <th><?php _e('User Name', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <select id="wp_user_id" name="wp_user_id" class="regular-text">
                                    <option value=""><?php _e('Select User', 'wp-user-profile-avatar'); ?>
                                        <?php
                                        foreach (get_users() as $key => $user) {
                                            echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
                                        }
                                        ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Size', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <select id="wp_image_size" name="wp_image_size" class="regular-text">
                                    <option value=""><?php _e('None', 'wp-user-profile-avatar'); ?>
                                        <?php
                                        foreach (get_wpupa_image_sizes() as $name => $label) {
                                            echo '<option value="' . $name . '">' . $label . '</option>';
                                        }
                                        ?>
                                </select>
                                <p class="description"><?php _e('size parameter only work for uploaded avatar not with custom url.', 'wp-user-profile-avatar'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Alignment', 'wp-user-profile-avatar'); ?></th>				    					
                            <td>
                                <select id="wp_image_alignment" name="wp_image_alignment" class="regular-text">
                                    <option value=""><?php _e('None', 'wp-user-profile-avatar'); ?>
                                        <?php
                                        foreach (get_wpupa_image_alignment() as $name => $label) {
                                            echo '<option value="' . $name . '">' . $label . '</option>';
                                        }
                                        ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Link To', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <select id="wp_image_link_to" name="wp_image_link_to" class="regular-text">
                                    <option value=""><?php _e('None', 'wp-user-profile-avatar'); ?>
                                        <?php
                                        foreach (get_wpupa_image_link_to() as $name => $label) {
                                            echo '<option value="' . $name . '">' . $label . '</option>';
                                        }
                                        ?>
                                </select>
                                <p><input type="hidden" name="wp_custom_link_to" id="wp_custom_link_to" class="regular-text" placeholder="<?php _e('Add custom URL', 'wp-user-profile-avatar') ?>"></p>
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Open link in a new window', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <input type="checkbox" name="wp_image_open_new_window" id="wp_image_open_new_window" value="_blank" class="regular-text">
                            </td>
                        </tr>
                        <tr>
                            <th><?php _e('Caption', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <input type="text" name="wp_image_caption" id="wp_image_caption" class="regular-text">
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>
                                <button type="button" class="button-primary" id="user_avatar_form_btn"><?php _e('Insert Shortcode', 'wp-user-profile-avatar'); ?></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div id="settings_upload_avatar" class="settings-panel">
                <form name="upload_avatar_form" class="upload-avatar-form">
                    <table class="form-table">
                        <tr>
                            <th><?php _e('Shortcode', 'wp-user-profile-avatar'); ?></th>
                            <td>
                                <input type="text" name="upload_avatar_shortcode" id="upload_avatar_shortcode" value="[user_profile_avatar_upload]" class="regular-text" readonly >
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="button" class="button-primary" id="upload_avatar_form_btn"><?php _e('Insert Shortcode', 'wp-user-profile-avatar'); ?></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>