<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<?php if (trendymag_option('newsletter-subscription', false, true) && shortcode_exists('mc4wp_form')): ?>
    <div class="subscribe-form single-news-newsletter">
        <i class="fa fa-envelope"></i>
        <?php 
        $form_title = trendymag_option('subscription-form-title');
        $form_subtitle = trendymag_option('subscription-form-subtitle');

        if ($form_title) : 
            echo '<h2>'.$form_title.'</h2>';
        endif; 

        if ($form_subtitle) :
            echo '<h3>'.$form_subtitle.'</h3>';
        endif; 
        
            echo do_shortcode('[mc4wp_form]');
        ?>
    </div>
<?php endif; ?>