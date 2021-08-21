<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<div class="post-share">
	<ul class="list-inline">
		<?php if ( trendymag_option( 'tt-share-button', 'facebook', true ) ) : ?>
			<!--Facebook-->
			<li>
				<a class="facebook large-btn" href="//www.facebook.com/sharer.php?u=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;t=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Facebook!', 'trendymag' ); ?>" target="_blank"><i class="fa fa-facebook-official"></i><span><?php esc_html_e('Share on Facebook', 'trendymag'); ?></span></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'twitter', true ) ) : ?>
			<!--Twitter-->
			<li>
				<a class="twitter large-btn" href="//twitter.com/home?status=<?php echo rawurlencode( sprintf( esc_html__( 'Reading: %s', 'trendymag' ), get_the_permalink() ) ) ?>" title="<?php esc_html_e( 'Share on Twitter!', 'trendymag' ); ?>" target="_blank"><i class="fa fa-twitter"></i><span><?php esc_html_e('Share on Twitter', 'trendymag'); ?></span></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'google', true ) ) : ?>
			<!--Google Plus-->
			<li>
				<a class="google-plus" href="//plus.google.com/share?url=<?php echo rawurlencode( get_the_permalink() ) ?>" title="<?php esc_html_e( 'Share on Google+!', 'trendymag' ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'linkedin', true ) ) : ?>
			<!--Linkedin-->
			<li>
				<a class="linkedin" href="//www.linkedin.com/shareArticle?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;mini=true&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Linkedin!', 'trendymag' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'pinterest', true ) ) : ?>
			<li>
				<a class="pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo rawurlencode( get_the_permalink() ) ?>&media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); echo esc_url($url); ?>" title="<?php esc_html_e( 'Share on Pinterest!', 'trendymag' ); ?>" rel="nofollow" target="_blank"><i class="fa fa-pinterest"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'reddit', false ) ) : ?>
			<li>
				<a class="reddit" href="http://www.reddit.com/submit?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Reddit!', 'trendymag' ); ?>" rel="nofollow" target="_blank"><i class="fa fa-reddit"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'stumbleupon', false ) ) : ?>
			<li>
				<a class="stumbleupon" href="http://www.stumbleupon.com/submit?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Stumble!', 'trendymag' ); ?>" rel="nofollow" target="_blank"><i class="fa fa-stumbleupon"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'digg', false ) ) : ?>
			<li>
				<a class="digg" href="http://digg.com/submit?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Stumble!', 'trendymag' ); ?>" rel="nofollow" target="_blank"><i class="fa fa-digg"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( trendymag_option( 'tt-share-button', 'delicious', false ) ) : ?>
			<li>
				<a class="delicious" href="http://del.icio.us/post?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on delicious!', 'trendymag' ); ?>" rel="nofollow" target="_blank"><i class="fa fa-delicious"></i></a>
			</li>
		<?php endif; ?>
	</ul>
</div> <!-- .post-share -->
