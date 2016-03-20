<?php
/**
 * @package bricks
 */
?>

		<?php 
   	    $url='';
        if(has_post_thumbnail()):?>
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id());  ?>
            <div class="post2 item " >
                
                <h2><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h2>
                <?php if ( 'post' == get_post_type() ) : ?>
					<div class="entry-meta">
						<?php bricks_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

                <div class="blog-img">
                	<a href="<?php the_permalink(); ?>"><img src="<?php echo $url;?>" class="img-responsive img-thumbnail"></a>
				</div>
                <?php if ( is_search()|| is_home()|| is_archive() ) : // Only display Excerpts for Search ?>
                	<?php the_excerpt(); ?>
				<?php else : ?>
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bricks' ) ); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'bricks' ),
							'after'  => '</div>',
						) );
					?>
				<?php endif; ?>
                
                <a href="<?php the_permalink();?>"><button class="btn btn-success">Read More &raquo;</button></a>		
            </div>
            <?php  else: ?>
                <div class="post2 item">
                    <h2><a href="<?php the_permalink();?>"><?php  the_title(); ?></a></h2>
                    <?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<?php bricks_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
                    
                    <?php if ( is_search()|| is_home()||is_archive() ) : // Only display Excerpts for Search ?>
                		<?php the_excerpt(); ?>
					<?php else : ?>
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'bricks' ) ); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'bricks' ),
								'after'  => '</div>',
							) );
						?>
					<?php endif; ?>

                    <a href="<?php the_permalink();?>"><button class="btn btn-success">Read More &raquo;</button></a>
                </div>
        <?php endif; ?>