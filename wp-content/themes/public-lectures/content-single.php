<?php
/**
 * @package bricks
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-meta">
            <?php echo esc_html( get_the_date() ); ?>
            <div class="course-categories">カテゴリー: <?php the_category( ',' ); ?></div>
            <div class="course-tags">タグ: <?php the_tags( '', ',' ) ?></div>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->



    <div class="entry-content">
        <?php
        $url = '';
        if ( has_post_thumbnail() ):
            ?>
    <?php $url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
            <div class="ent-img">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" class="img-responsive img-thumbnail"></a>
            </div>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'bricks' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->
    <div id="post-nav"><center><?php bricks_posts_nav(); ?></center></div>
</article><!-- #post-## -->

