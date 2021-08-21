<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();

	$blog_sidebar = trendymag_option('blog-sidebar', false, 'right-sidebar');
	$grid_column = 'col-md-12';
	
	if ($blog_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8 col-sm-8' : $grid_column;
	elseif ($blog_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-blog-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-8 col-sm-push-4' : $grid_column;
	endif;
?>
<div class="blog-wrapper news-wrapper">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">
				<main id="main" class="posts-content" role="main">

					<?php if ( have_posts() ) : ?>
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