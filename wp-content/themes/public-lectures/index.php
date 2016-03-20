<?php
/**
 */
get_header();
?>

<div class="row list js-masonry" >

    <?php
    $args        = array(
        'posts_per_page'   => 20,
        'offset'           => 0,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'school',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );
    $posts_array = get_posts( $args );

    foreach ( $posts_array as $page ) {

        $page_permalink = get_permalink( $page->ID );
        $page_title     = $page->post_title;
        $page_content   = $page->post_content;

        $format = '<div class = "post2 item masonry-brick">'
                . '<h2><a href="%1$s">%2$s</a></h2>'
                . '<p class="description">%3$s</p>'
                . '</div >';

        echo sprintf(
                $format, $page_permalink, $page_title, $page_content
        );
    }
    ?>		


</div><!-- #main -->

<div class="navigation" >
<?php bricks_posts_nav(); ?>
</div>

</div><!-- #primary -->





<?php get_footer(); ?>