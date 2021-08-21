<div class="breaking-news-wrapper">
	<div class="container">
		<?php if (trendymag_option('prefix-title')): ?>
			<span class="news-prefix-title"><?php echo esc_html(trendymag_option('prefix-title', false, 'Breaking')); ?> </span>
		<?php endif; ?>
	    
	    <ul class="breaking-news">
	    	<?php 
	    	$args  = array(
				'post_type'      => 'post',
				'post_status'    => 'publish'
			);

	    	if (trendymag_option('post-source') == 'selected-post') {
	    		$args = wp_parse_args(
		    		array(
		    			'post__in' => trendymag_option('post-lists'),
		    		)
		    	, $args );
	    	}

	    	if (trendymag_option('post-source') == 'latest-post' || trendymag_option('post-source') == 'category-post') {
	    		$args = wp_parse_args(
		    		array(
		    			'posts_per_page' => trendymag_option('post-limit', false, 5),
		    		)
		    	, $args );
	    	}

	    	if (trendymag_option('post-source') == 'category-post') {
	    		$args = wp_parse_args(
		    		array(
		    			'cat' => trendymag_option('category-lists')
		    		)
		    	, $args );
	    	}

			$query = new WP_Query( $args ); ?>

			<?php if ( $query->have_posts() ) : ?>

				<?php while ( $query->have_posts() ) : $query->the_post(); ?>

					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

				<?php endwhile; ?>

			<?php wp_reset_postdata();

			else : ?>
				<p><?php esc_html_e( 'Post not found !', 'trendymag' ); ?></p>
			<?php endif; ?>
	    </ul>
    </div>
</div>