<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<footer class="footer-section footer-two-wrapper">
    <?php if (is_active_sidebar('trendymag-footer-four-column' )): ?>
        <div class="container">
            <div class="primary-footer">
                <div class="row tt-sidebar-wrapper footer-sidebar clearfix text-left" role="complementary">
                    <?php dynamic_sidebar('trendymag-footer-four-column' );?>
                </div>
            </div> <!-- .primary-footer -->
        </div> <!-- .container -->
    <?php endif; ?>
    
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="copyright">
                        <?php if (trendymag_option('footer-text', false, false)) : ?>
                            <?php echo wp_kses(trendymag_option('footer-text'), array(
                                'a'      => array(
                                    'href'   => array(),
                                    'title'  => array(),
                                    'target' => array(),
                                    'style' => array(),
                                    'class' => array()
                                ),
                                'br'     => array(),
                                'em'     => array(),
                                'strong' => array('style' => array()),
                                'ul'     => array('class' => array(), 'style' => array()),
                                'li'     => array('class' => array(), 'style' => array()),
                                'p'      => array('class' => array(), 'style' => array()),
                                'span'   => array('class' => array(), 'style' => array())
                            )); 
                            
                            else : ?>
                            <?php printf(
                                esc_html__('Copyright &copy; %1$s | %2$s Theme by %3$s | Powered by %4$s', 'trendymag'),
                                date('Y'), 
                                esc_html__('TrendyMag', 'trendymag'),
                                "<a href='http://trendytheme.net'>".esc_html__('TrendyTheme', 'trendymag')."</a>",
                                "<a href='https://wordpress.org'>".esc_html__('WordPress', 'trendymag')."</a>"
                            ); ?>
                        <?php endif; ?>

                        <?php if ( function_exists( 'the_privacy_policy_link' ) ) :
                            the_privacy_policy_link( '&nbsp| &nbsp', '' );
                        endif; ?>
                    </div> <!-- .copyright -->
                </div> <!-- .col-# -->

                <?php if (trendymag_option('social-icon-visibility', false, true)) : ?>
                    <div class="col-sm-6">
                        <div class="social-links-wrap text-right">
                            <?php get_template_part('template-parts/social', 'icons');?>
                        </div> <!-- .social-links-wrap -->
                    </div>
                <?php endif; ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .footer-copyright -->
</footer> <!-- .footer-section -->