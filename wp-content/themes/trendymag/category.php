<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header();

	$category = get_category( get_query_var( 'cat' ) );
	$cat_id = $category->cat_ID;
	
	$cat_sidebar = trendymag_option('category-layout', false, 'right-sidebar');
	$grid_column = 'col-md-10 col-md-offset-1';

	if ($cat_sidebar == 'right-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-cat-sidebar')) ? 'col-md-8 col-sm-12' : $grid_column;
	elseif ($cat_sidebar == 'left-sidebar') :
		$grid_column = (is_active_sidebar('trendymag-cat-sidebar')) ? 'col-md-8 col-md-push-4 col-sm-12' : $grid_column;
	endif;

	$cat_post_style = trendymag_option('category-post-style', false, 'style-one');
	$individual_style = get_term_meta($cat_id, 'category-post-style', true );

	if ($individual_style == 'inherit-from-theme-option' || empty($individual_style)) :
		$cat_post_style;
	else :
		$cat_post_style = $individual_style;
	endif;


	// featured image
	$featured_image = 'trendymag-two-third';
	$overlay_class = '';

	if ($cat_post_style == 'style-two') :
		$overlay_class = 'overlay-black';
	endif;

	if ($cat_post_style == 'style-four' || $cat_post_style == 'style-seven') :
		$featured_image = 'trendymag-recent-post2';
		$overlay_class = 'overlay-black';
	endif;

	if ($cat_post_style == 'style-five') :
		$featured_image = 'trendymag-half';
	endif;

	// post class
	$post_class = array();
	$post_class[] = 'recent-news';
	if (! has_post_thumbnail()) {
		$post_class[] = 'no-post-thumbnail';
	}

	// content wrapper class
	$row_start = '';
	$row_end = '';
	$content_grid_start = '';
	$content_grid_end = '';
	$masonry_wrap = '';
	$masonry_column = '';

	if ($cat_post_style == 'style-six' || $cat_post_style == 'style-seven' ) {
		$masonry_wrap = 'masonry-wrap';
		$masonry_column = 'masonry-column';
		$featured_image = 'trendymag-masonry-grid';
	}

	if ($cat_post_style == 'style-three' || $cat_post_style == 'style-four' || $cat_post_style == 'style-six' || $cat_post_style == 'style-seven') :
		$row_start = '<div class="row '.$masonry_wrap.'">';
		$row_end = '</div>';
		$content_grid_start = '<div class="col-md-6 col-sm-12  '.$masonry_column.'">';
		$content_grid_end = '</div>';
	endif;
?>

<div class="blog-wrapper post-wrapper category-news <?php echo esc_attr($cat_post_style.' '.$cat_sidebar);?>">
	<div class="container">
		<div class="row">
			<div class="sidebar-sticky <?php echo esc_attr($grid_column); ?>">
				<main id="main" class="posts-content" role="main">
					
					<?php echo wp_kses($row_start, array('div' => array('class' => array(), 'style' => array()))); ?>

						<?php if ( have_posts() ) : 

							$counter = ""; ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php echo wp_kses($content_grid_start, array('div' => array('class' => array(), 'style' => array()))); ?>

									<div <?php post_class($post_class); ?>>
			                            
			                            <a href="<?php the_permalink(); ?>">
			                                <div class="entry-thumb">
			                                    <?php the_post_thumbnail( $featured_image, array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
			                                    <div class="image-overlay <?php echo esc_attr($overlay_class); ?>"></div>
			                                </div>
			                            </a>

			                            <div class="post-contents">
											<?php if ($cat_post_style == 'style-one' || $cat_post_style == 'style-three' || $cat_post_style == 'style-five' || $cat_post_style == 'style-six'): ?>
												<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
											<?php endif; ?>
					                        
					                        <div class="entry-meta">
					                            <?php trendymag_grid_posted_on(); ?>
					                        </div> <!-- .entry-meta -->

					                        <?php if ($cat_post_style == 'style-two' || $cat_post_style == 'style-four' || $cat_post_style == 'style-seven'): ?>
			                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );?>
			                                <?php endif; ?>

											<?php if ($cat_post_style == 'style-one' || $cat_post_style == 'style-five'): ?>
												<div class="entry-content">
					                        		<?php echo wp_trim_words( get_the_content(), trendymag_option('word-limit', false, '25'), '...' ); ?>

					                        		<a href="<?php the_permalink(); ?>" class="more-link"><span class="readmore"><?php esc_html_e('Details', 'trendymag')?><i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a>
					                        	</div>
											<?php endif; ?>

					                    </div> <!-- .post-contents -->
									</div> <!-- .recent-news -->
								<?php echo wp_kses($content_grid_end, array('div' => array('class' => array(), 'style' => array()))); ?>

								<?php
					                $counter++;
					                if ($cat_post_style == 'style-three' || $cat_post_style == 'style-five') {
					                	if($counter % 2 == 0) {
						                    echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
						                }
					                }
					            ?>

							<?php endwhile; ?>

							<?php if ( trendymag_option( 'blog-page-nav', false, true ) ) :
								echo '<div class="col-md-12">';
									echo trendymag_posts_pagination();
								echo '</div>';
								
							else :
								echo '<div class="col-md-12">';
									trendymag_posts_navigation();
								echo '</div>';
							endif; ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>
					<?php echo wp_kses($row_end, array('div' => array('class' => array(), 'style' => array()))); ?>
				</main><!-- .posts-content -->
			</div> <!-- .col-## -->

			<?php if ( $cat_sidebar == 'right-sidebar' and is_active_sidebar('trendymag-cat-sidebar')) : ?>
			    <div class="sidebar-sticky col-md-4 col-sm-12">
			        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
			            <?php dynamic_sidebar('trendymag-cat-sidebar'); ?>
			        </div>
			    </div>
			<?php elseif ( $cat_sidebar == 'left-sidebar' and is_active_sidebar('trendymag-cat-sidebar')) : ?>
			    <div class="sidebar-sticky col-md-4 col-md-pull-8 col-sm-12">
			        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
			            <?php dynamic_sidebar('trendymag-cat-sidebar'); ?>
			        </div>
			    </div>
			<?php endif; ?>

		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer(); ?>