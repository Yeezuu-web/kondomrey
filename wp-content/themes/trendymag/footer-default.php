<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<footer class="footer-section footer-default-wrapper">
    <div class="container">
        <?php if ( class_exists( 'Redux' ) ) : ?>
            <div class="primary-footer">
                <div class="row">
                    <div class="col-md-5">
                        <div class="footer-logo">
                            <a href="<?php echo esc_url(site_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <img src="<?php echo esc_url(trendymag_option('footer-logo', 'url', get_template_directory_uri() . '/images/footer-logo.png')); ?>" data-at2x="<?php echo esc_url(trendymag_option('footer-retina-logo', 'url', get_template_directory_uri() . '/images/footer-logo2x.png')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
                            </a>
                        </div> <!-- .footer-logo -->

                        <div class="footer-about-text">
                            <?php echo wp_kses(trendymag_option('footer-about-text'), array(
                                'a'      => array('href'   => array(), 'title'  => array(), 'target' => array(), 'class' => array(), 'style' => array()),
                                'br'     => array(),
                                'em'     => array(),
                                'strong' => array('style' => array()),
                                'br'     => array(),
                                'ul'     => array('class' => array()),
                                'li'     => array('class' => array()),
                                'p'      => array('class' => array(), 'style' => array()),
                                'span'   => array('class' => array(), 'style' => array()),
                                'address'=> array('class' => array(), 'style' => array())
                            )); ?>
                        </div>
                        
                        <?php if (trendymag_option('social-icon-visibility', false, true)) : ?>
                            <div class="social-links-wrap">
                                <?php get_template_part('template-parts/social', 'icons');?>
                            </div> <!-- /social-links-wrap -->
                        <?php endif; ?>
                    </div> <!-- .col-md-5 -->

                    <div class="col-md-7">
                        <?php if (is_active_sidebar('trendymag-footer-default' )): ?>
                            <div class="row tt-sidebar-wrapper footer-sidebar clearfix" role="complementary">
                                <?php dynamic_sidebar('trendymag-footer-default' );?>
                            </div>
                        <?php endif ?>
                    </div> <!-- .col-md-7 -->
                </div>
            </div> <!-- .primary-footer -->
        <?php endif; ?>
    </div> <!-- .container -->
   
    <div class="footer-copyright text-center">
        <div class="container">
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
                        "<a href='https://trendytheme.net'>".esc_html__('TrendyTheme', 'trendymag')."</a>",
                        "<a href='https://wordpress.org'>".esc_html__('WordPress', 'trendymag')."</a>"
                    ); ?>
                <?php endif; ?>

                <?php if ( function_exists( 'the_privacy_policy_link' ) ) :
                    the_privacy_policy_link( '&nbsp| &nbsp', '' );
                endif; ?>
            </div> <!-- .copyright -->
        </div> <!-- .container -->
    </div> <!-- .footer-copyright -->
</footer> <!-- .footer-section -->