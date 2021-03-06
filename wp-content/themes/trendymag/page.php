<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

	$page_sidebar = trendymag_option('page-sidebar', false, 'right-sidebar');
	$grid_column = 'col-md-12';
	
	if ($page_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-page-sidebar')) ? 'col-md-8' : $grid_column;
	elseif ($page_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-page-sidebar')) ? 'col-md-8 col-md-push-4' : $grid_column;
	endif;
?>
<div class="page-wrapper content-wrapper">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($grid_column); ?>">
				<div id="main" class="posts-content" role="main">
					
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop. ?>

				</div> <!-- .posts-content -->
			</div> <!-- .col-## -->

			<!-- Page sidebar -->
			<?php get_sidebar('page'); ?>

		</div> <!-- .row -->	
	</div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>