<?php
/**
 * Tools page.
 *
 * @package Disable_Comments
 */
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wrap">
    <h1><?php _e('Delete Comments', 'disable-comments'); ?></h1>
    <?php
    global $wpdb;
    $comments_count = $wpdb->get_var("SELECT count(comment_id) from $wpdb->comments");
    if ($comments_count <= 0) {
        ?>
        <p><strong><?php _e('No comments available for deletion.', 'disable-comments'); ?></strong></p>
    </div>
    <?php
    return;
}
$options = get_option('disable_comments_options', array());
$typeargs = array('public' => true);

$modified_types = array();
$disabled_post_types = get_disabled_post_types();
if (!empty($disabled_post_types)) {
    foreach ($disabled_post_types as $type) {
        // we need to know what native support was for later.
        if (post_type_supports($type, 'comments')) {
            $modified_types[] = $type;
            remove_post_type_support($type, 'comments');
            remove_post_type_support($type, 'trackbacks');
        }
    }
}
$types = get_post_types($typeargs, 'objects');


if (isset($_POST['delete']) && isset($_POST['delete_mode'])) {
    check_admin_referer('delete-comments-admin');

    if ($_POST['delete_mode'] == 'delete_everywhere') {
        if ($wpdb->query("TRUNCATE $wpdb->commentmeta") != false) {
            if ($wpdb->query("TRUNCATE $wpdb->comments") != false) {
                $wpdb->query("UPDATE $wpdb->posts SET comment_count = 0 WHERE post_author != 0");
                $wpdb->query("OPTIMIZE TABLE $wpdb->commentmeta");
                $wpdb->query("OPTIMIZE TABLE $wpdb->comments");
                echo "<p style='color:green'><strong>" . __('All comments have been deleted.', 'disable-comments') . '</strong></p>';
            } else {
                echo "<p style='color:red'><strong>" . __('Internal error occured. Please try again later.', 'disable-comments') . '</strong></p>';
            }
        } else {
            echo "<p style='color:red'><strong>" . __('Internal error occured. Please try again later.', 'disable-comments') . '</strong></p>';
        }
    } else {
        $delete_post_types = empty($_POST['delete_types']) ? array() : (array) $_POST['delete_types'];
        $delete_post_types = array_intersect($delete_post_types, array_keys($types));

        // Extra custom post types.
        if (!empty($_POST['delete_extra_post_types'])) {
            $delete_extra_post_types = array_filter(array_map('sanitize_key', explode(',', $_POST['delete_extra_post_types'])));
            $delete_extra_post_types = array_diff($delete_extra_post_types, array_keys($types));    // Make sure we don't double up builtins.
            $delete_post_types = array_merge($delete_post_types, $delete_extra_post_types);
        }

        if (!empty($delete_post_types)) {
            // Loop through post_types and remove comments/meta and set posts comment_count to 0.
            foreach ($delete_post_types as $delete_post_type) {
                $wpdb->query("DELETE cmeta FROM $wpdb->commentmeta cmeta INNER JOIN $wpdb->comments comments ON cmeta.comment_id=comments.comment_ID INNER JOIN $wpdb->posts posts ON comments.comment_post_ID=posts.ID WHERE posts.post_type = '$delete_post_type'");
                $wpdb->query("DELETE comments FROM $wpdb->comments comments INNER JOIN $wpdb->posts posts ON comments.comment_post_ID=posts.ID WHERE posts.post_type = '$delete_post_type'");
                $wpdb->query("UPDATE $wpdb->posts SET comment_count = 0 WHERE post_author != 0 AND post_type = '$delete_post_type'");

                $post_type_object = get_post_type_object($delete_post_type);
                $post_type_label = $post_type_object ? $post_type_object->labels->name : $delete_post_type;
                echo "<p style='color:green'><strong>" . sprintf(__('All comments have been deleted for %s.', 'disable-comments'), $post_type_label) . '</strong></p>';
            }

            $wpdb->query("OPTIMIZE TABLE $wpdb->commentmeta");
            $wpdb->query("OPTIMIZE TABLE $wpdb->comments");

            echo "<h4 style='color:green'><strong>" . __('Comment Deletion Complete', 'disable-comments') . '</strong></h4>';
        }
    }

    $comments_count = $wpdb->get_var("SELECT count(comment_id) from $wpdb->comments");
    if ($comments_count <= 0) {
        ?>
        <p><strong><?php _e('No comments available for deletion.', 'disable-comments'); ?></strong></p>
        </div>
        <?php
        return;
    }
}
?>
<form action="" method="post" id="delete-comments">
    <ul>
        <li><label for="delete_everywhere"><input type="radio" id="delete_everywhere" name="delete_mode" value="delete_everywhere" <?php checked(isset($_POST['delete_everywhere'])); ?> /> <strong><?php _e('Everywhere', 'disable-comments'); ?></strong>: <?php _e('Delete all comments in WordPress.', 'disable-comments'); ?></label>
            <p class="indent"><?php printf(__('%s: This function and will affect your entire site. Use it only if you want to delete comments <em>everywhere</em>.', 'disable-comments'), '<strong style="color: #900">' . __('Warning', 'disable-comments') . '</strong>'); ?></p>
        </li>
        <?php $selected = (empty($_POST['delete_everywhere'])) ? 'checked="checked"' : ""; ?>
        <li><label for="selected_delete_types"><input type="radio" id="selected_delete_types" name="delete_mode" value="selected_delete_types" <?php echo $selected; ?> /> <strong><?php _e('For certain post types', 'disable-comments'); ?></strong>:</label>
            <p></p>
            <ul class="indent" id="listofdeletetypes">

                <?php
                if (isset($options['disabled_post_types']) && is_array($options['disabled_post_types'])) {
                    $disabled_post_types = $options['disabled_post_types'];
                } else {
                    $disabled_post_types = [];
                }
                foreach ($types as $k => $v) {
                    echo "<li><label for='post-type-$k'><input type='checkbox' name='delete_types[]' value='$k' " . checked(in_array($k, $disabled_post_types), true, false) . " id='post-type-$k'> {$v->labels->name}</label></li>";
                }
                ?>
            </ul>

            <p class="indent"><?php printf(__('%s: Deleting comments will remove existing comment entries in the database and cannot be reverted without a database backup.', 'disable-comments'), '<strong style="color: #900">' . __('Warning', 'disable-comments') . '</strong>'); ?></p>
        </li>
    </ul>

    <?php wp_nonce_field('delete-comments-admin'); ?>
    <h4><?php _e('Total Comments:', 'disable-comments'); ?> <?php echo $comments_count; ?></h4>
    <p class="submit"><input class="button-primary" type="submit" name="delete" value="<?php _e('Delete Comments', 'disable-comments'); ?>"></p>
</form>
</div>
<script>
    jQuery(document).ready(function ($) {
        function delete_comments_uihelper() {
            var toggle_bits = $("#listofdeletetypes, #extradeletetypes");
            if ($("#delete_everywhere").is(":checked"))
                toggle_bits.css("color", "#888").find(":input").attr("disabled", true);
            else
                toggle_bits.css("color", "#000").find(":input").attr("disabled", false);
        }

        $("#delete-comments :input").change(function () {
            delete_comments_uihelper();
        });

        delete_comments_uihelper();
    });
</script>
