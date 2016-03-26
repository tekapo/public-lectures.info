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
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>

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
					<?php // the_content(); ?>
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'bricks' ),
						'after'	 => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
				<div id="post-nav"><center><?php bricks_posts_nav(); ?></center></div>
			</article><!-- #post-## -->
			<?php
//			get_template_part( 'content', 'single' );

			if ( class_exists( SCF ) ) {

				$course_title			 = get_the_title();
				$category_list			 = get_the_category_list( ',' );
				$tag_list				 = get_the_tag_list( '', ', ' );
				$syllabus				 = SCF::get( 'syllabus' );
				$syllabus_original_url	 = SCF::get( 'syllabus_original_url' );
				$teacher				 = SCF::get( 'teacher' );
				$start_date				 = SCF::get( 'start-date' );
				$end_date				 = SCF::get( 'end-date' );
				$start_application		 = SCF::get( 'start-application' );
				$end_application		 = SCF::get( 'end-application' );
				$class_day				 = SCF::get( 'day' );
				$class_time				 = SCF::get( 'time' );

				$school_id	 = SCF::get( 'school-name' );
				$page		 = get_page( $school_id[0] );
				$school_name = $page->post_title;
				
				var_dump($class_day);
				
				foreach ($class_day as $day) {
					$days .= $day.'、';
				}

				echo <<< EOL
				
			<table class='course-table'>
				<tr>
					<th>コース名</th>
					<td>$course_title</td>
				</tr>
				<tr>
					<th>概要</th>
					<td>
						<blockquote cite="$syllabus_original_url">
						$syllabus
						</blockquote>
						<div class="quote-from">
							<a href="$syllabus_original_url">
								$syllabus_original_url
							</a>より引用
						</div>
					</td>
				</tr>
				<tr>
					<th>カテゴリー</th>
					<td>$category_list</td>
				</tr>
				<tr>
					<th>タグ</th>
					<td>$tag_list</td>
				</tr>
                <tr>
                    <th>講師</th>
                    <td>$teacher</td>
                </tr>
                <tr>
                    <th>開講期間</th>
                    <td>$start_date - $end_date</td>
                </tr>
                <tr>
                    <th>開講曜日</th>
                    <td>$days</td>
                </tr>
                <tr>
                    <th>開講時間</th>
                    <td>$class_time</td>
                </tr>
                <tr>
                    <th>開催校</th>
                    <td>$school_name</td>
                </tr>
            </table>
EOL;
			}
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