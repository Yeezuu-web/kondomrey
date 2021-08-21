<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

	    <?php
		    if(trendymag_option('footer-ad-visibility') == "1") : ?>
		    	<div class="container footer-promo text-center">
		    		<?php get_template_part('template-parts/ads', 'footer' ); ?>
		    	</div>
			<?php endif;
			

		    $tt_footer_style = trendymag_option('footer-style', false, 'footer-default');

		    $page_footer = "";
		    if (function_exists('rwmb_meta')) : 
		        $page_footer = rwmb_meta('trendymag_footer_style');
		    endif;

		    if ($page_footer == 'inherit-theme-option' || empty($page_footer)) :
		        if ($tt_footer_style == 'footer-two') :
			        get_footer('two');
			    elseif ($tt_footer_style == 'footer-three') :
			        get_footer('three');
			    elseif ($tt_footer_style == 'no-footer') :
			    else :
			        get_footer('default');
			    endif;
		    elseif($page_footer == 'footer-two') :
		        get_footer('two');
		   	elseif($page_footer == 'footer-three') :
		   		get_footer('three');
		   	elseif($page_footer == 'no-footer') :
		   	else :
		   		get_footer('default');
		    endif; ?>
		</div><!-- /#page-content-wrapper -->
	</div> <!-- /#wrapper -->

<?php wp_footer(); ?>

</body>
</html>