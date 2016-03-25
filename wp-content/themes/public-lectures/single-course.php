<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bricks
 */
get_header();
?>

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 font" >

        <?php while ( have_posts() ) : the_post(); ?>

            <?php
            get_template_part( 'content', 'single' );

            $syllabus          = SCF::get( 'syllabus' );
            $teacher           = SCF::get( 'teacher' );
            $start_date        = SCF::get( 'start-date' );
            $end_date          = SCF::get( 'end-date' );
            $start_application = SCF::get( 'start-application' );
            $end_application   = SCF::get( 'end-application' );
            $class_day         = SCF::get( 'day' );
            $class_time        = SCF::get( 'time' );

            $school_id   = SCF::get( 'school-name' );
            $page        = get_page( $school_id[0] );
            $school_name = $page->post_title;

            $format = '
            <table>
            $syllabus
                <tr>
                    <th>講師</th>
                    <td>%1$s</td>
                </tr>
                <tr>
                    <th>開講期間</th>
                    <td>%2$s - %3$s</td>
                </tr>
                <tr>
                    <th>開講曜日</th>
                    <td>%4$s</td>
                </tr>
                <tr>
                    <th>開講時間</th>
                    <td>%5$s</td>
                </tr>
                <tr>
                    <th>開催校</th>
                    <td>%8$s</td>
                </tr>
            </table>
            ';
            echo sprintf(
                    $format, $teacher, $start_date, $end_date, $class_day[0], $class_time, $start_application, $end_application, $school_name
            );
            ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile; // end of the loop.   ?>

    </div><!-- #main -->
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 font">
        <?php get_sidebar(); ?>
    </div>
</div><!-- #primary -->


<?php get_footer(); ?>