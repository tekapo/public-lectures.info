<?php if( !defined('ABSPATH')) exit;
?>
<?php if (post_password_required()) { ?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view any comments.', 'bricks'); ?></p>

    <?php return; } ?>

<?php if (have_comments()) : ?>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','bricks' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','bricks', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

    <ol class="commentlist alert alert-info padding20">
        <?php wp_list_comments('avatar_size=60&type=comment'); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','bricks' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','bricks', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

<?php else : ?>

<?php endif; ?>

<?php
$comments_by_type = separate_comments($comments);
if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
    $count = count($comments_by_type['pings']);
    ($count !== 1) ? $txt = __('Pings&#47;Trackbacks','bricks') : $txt = __('Pings&#47;Trackbacks','bricks');
?>

<h4 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"', 'bricks' ), $count, $txt, get_the_title() )?></h4>

<ol class="commentlist alert alert-warning">
    <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
</ol>


<?php endif; ?>

<?php if (comments_open()) : ?>

    <?php
    $fields = array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name','bricks') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" class="form-control" /></p>',
        'email' => '<p class="comment-form-email"><label for="email">' . __('E-mail','bricks') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"class="form-control" /></p>',
        'url' => '<p class="comment-form-url"><label for="url">' . __('Website','bricks') . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" class="form-control"/></p>',
    );

    $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));

    comment_form($defaults);
    ?>


<?php endif; ?>

<script>
jQuery(document).ready(function($) {
$('.form-submit #submit').addClass('btn-cls btn');
});
</script>
