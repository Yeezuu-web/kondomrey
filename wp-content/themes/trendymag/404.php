<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="error-page-wrapper">
	<div class="container">
		<div class="error-message text-center">
		    <h2><?php esc_html_e( '404', 'trendymag' ); ?></h2>

		    <h3><?php esc_html_e( 'Page Not Found!', 'trendymag' ); ?></h3>

		    <p><?php esc_html_e( 'Sorry, we couldn\'t find the content you were looking for.', 'trendymag' ); ?></p>

		    <a href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-reply-all"></i><?php esc_html_e( 'Go Back Home', 'trendymag' ); ?></a>
		</div> <!-- /notfound-page -->
	</div><!-- /.container -->
</div> <!-- /.content-wrapper -->
<?php get_footer(); ?>
