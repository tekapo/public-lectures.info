<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bricks
 */

get_header(); ?>

	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 font" >

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 font">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #primary -->


<?php get_footer(); ?>