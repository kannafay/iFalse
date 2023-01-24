<?php
/**
 * User display shortcode
 */
if (!defined('ABSPATH'))
    exit;
?>

<div class="author-details">
    <p class="caption-text"><?php echo $details['first_name']; ?></p>
    <p class="caption-text"><?php echo $details['last_name']; ?></p>
    <p class="caption-text"><?php echo $details['description']; ?></p>
    <p class="caption-text"><?php echo $details['email']; ?></p>
    <?php
    if (!empty($details['sabox_social_links'])) {
        foreach ($details['sabox_social_links'] as $name => $link) {
            ?>
            <p class="caption-text"><?php echo $name; ?>:<a href="<?php echo $link; ?>"><?php echo $link; ?></a></p>
                <?php
            }
        }

        if ('' != $details['sabox-profile-image']) {
            ?>
        <img src="<?php echo $details['sabox-profile-image']; ?>" />
    <?php } ?>

</div>