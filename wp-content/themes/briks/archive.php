<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bricks
 */

get_header(); ?>

	<div class="row list js-masonry" >

		<?php if ( have_posts() ) : ?>

			<header class="page-header post1 item">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							printf( __( 'Category : %s', 'bricks' ), '<span>' . single_cat_title( '', false ) . '</span>' );
						elseif ( is_tag() ) :
							printf( __( 'Tag : %s', 'bricks' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'bricks' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'bricks' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'bricks' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bricks' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'bricks' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bricks' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'bricks');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'bricks');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'bricks' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'bricks' );

						else :
							_e( 'Archives', 'bricks' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>
			

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>
	<div class="navigation" >
		<?php bricks_posts_nav(); ?>
	</div>

<?php get_footer(); ?>
