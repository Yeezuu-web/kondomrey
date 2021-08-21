<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();

	$blog_sidebar = trendymag_option('blog-sidebar', false, 'right-sidebar');
	$grid_column = 'col-md-12';
	
	if ($blog_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8' : $grid_column;
	elseif ($blog_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8 col-md-push-4' : $grid_column;
	endif;
?>
<div class="blog-wrapper news-wrapper">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">
				<main id="main" class="posts-content" role="main">
					<?php if ( have_posts() ) : ?>

						<div class="post-author">
							<div class="media">
							    <div class="media-left">
							        <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'trendymag_author_avatar_size', 300 ) ); 
							            ?>
							    </div>
							    
							    <div class="media-body">
									<div class="author-info">
									    <div class="author-intro">
						                    <h2><?php echo get_the_author() ?></h2>
						                    <span class="post-count"><?php esc_html_e( 'Total Post: ', 'trendymag' );?><?php echo count_user_posts( get_the_author_meta( 'ID' ) , 'post' );?></span>
						                    <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
						                </div>
										
										<?php get_template_part( 'template-parts/author-social', 'info'); ?>
								    </div>
							    </div>
							</div> <!-- .media -->
						</div> <!-- .post-author -->

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

						<?php endwhile; ?>

						<?php if ( trendymag_option( 'blog-page-nav', false, true ) ) {
							echo trendymag_posts_pagination();
						} else {
							trendymag_posts_navigation();
						} ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				</main><!-- .posts-content -->
			</div> <!-- .col-## -->

			<!-- Sidebar -->
			<?php get_sidebar(); ?>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer(); ?>