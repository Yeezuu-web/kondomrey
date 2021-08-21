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
				<div id="main" class="posts-content" role="main">
					<?php if ( have_posts() ) : ?>

						<?php get_search_form(); ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
							get_template_part( 'template-parts/content', 'search' );
							?>

						<?php endwhile; ?>

						<?php if ( trendymag_option( 'blog-page-nav', false, true ) ) {
							echo trendymag_posts_pagination();
						} else {
							trendymag_posts_navigation();
						} ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>
				</div><!-- .posts-content -->
			</div> <!-- .col-## -->

			<!-- Sidebar -->
			<?php get_sidebar(); ?>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->

<?php get_footer(); ?>