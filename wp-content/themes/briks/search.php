<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package bricks
 */

get_header(); ?>
<div class="row list js-masonry" >
	

		<?php if ( have_posts() ) : ?>

			<header class="page-header post1 item">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'bricks' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php get_search_form();?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php //bricks_paging_nav(); ?>
			
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

</div>
<div class="navigation" >
	<?php bricks_posts_nav(); ?>
</div>

<?php get_footer(); ?>
