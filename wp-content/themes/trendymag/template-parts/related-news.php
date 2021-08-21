<?php if (trendymag_option('related-news', false, true)): 
	$post_grid = 'col-md-6 col-sm-6';

	if (trendymag_option('related-post-grid') == 'col-md-4') {
		$post_grid = 'col-md-4 col-sm-6';
	} ?>
	<div class="post-wrapper related-post style-one">
		<?php
		$tt_news_cat = wp_get_object_terms( $post->ID, 'category', array('fields' => 'ids') );
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => trendymag_option('show-post', false, '2'), // you may edit this number
			'tax_query' => array(
				array(
				  'taxonomy' => 'category',
				  'field' => 'id',
				  'terms' => $tt_news_cat
				)
			),
			'post__not_in' => array ($post->ID)
		);
		$member_post = new WP_Query( $args ); ?>

		<?php if ( $member_post->have_posts() ) : ?>
			<div class="row">
				<?php if (trendymag_option('related-text', false, true)): ?>
					<div class="col-md-12">
						<div class="section-intro">
							<h2><?php echo esc_html(trendymag_option('related-text', false, 'Related Article'));?></h2>
						</div>
					</div>
				<?php endif; ?>

				<?php while ( $member_post->have_posts() ) : $member_post->the_post(); ?>
					
					<div class="<?php echo esc_attr($post_grid); ?>">
                      	<div <?php post_class('recent-news'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                            	<div class="entry-meta">
	                                <span class="posted-in"><?php trendymag_post_cat(); ?></span>
	                            </div>
                                <a href="<?php the_permalink(); ?>">
                                    <div class="entry-thumb" itemprop="image">
                                        <?php the_post_thumbnail( 'trendymag-recent-post', array('class' => 'img-responsive', 'alt' => trendymag_alt_text()));?>
                                    </div>
                                </a>
                            <?php endif; ?>

                            <div class="post-contents">

                                <?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );?>
                                
                                <div class="entry-meta">
                                    <ul class="list-inline">

                                        <li><span class="entry-time published" itemprop="datePublished" content="<?php echo get_the_time( get_option( 'date_format' ) ); ?>"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></a></span></li>

                                        <li>
                                            <span class="post-comments-number">
                                                <i class="fa fa-comment-o"></i><?php
                                                comments_popup_link(
                                                    esc_html__('0', 'trendymag'),
                                                    esc_html__('1', 'trendymag'),
                                                    esc_html__('%', 'trendymag'), '',
                                                    esc_html__('Closed', 'trendymag')
                                                ); ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div> <!-- /.entry-meta -->
                            </div> <!-- .post-contents -->
                        </div> <!-- .recent-news -->
                    </div> <!-- .col-# -->
				<?php endwhile; ?>
			</div> <!-- .row -->
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Post not found !', 'trendymag' ); ?></p>
		<?php endif; ?>
	</div> <!-- .post-wrapper -->
<?php endif; ?>