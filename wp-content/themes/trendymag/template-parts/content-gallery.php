<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; 


if (function_exists('rwmb_meta')) :
    $tt_slides = rwmb_meta('trendymag_post_gallery','type=image_advanced');
endif; ?>

<?php if (function_exists('rwmb_meta')) :
    if ($tt_slides && count($tt_slides) > 0) : ?>
        <div id="news-gallery-<?php echo get_the_ID();?>" class="news-gallery carousel slide">
            <div class="carousel-inner">
                <?php 
                $carousel_count = 1; 
                foreach( $tt_slides as $slide ) : ?>
                    <div class="item <?php if($carousel_count == 1) echo 'active'; ?>">

                        <?php $images_src = wp_get_attachment_image_src( $slide['ID'], 'trendymag-blog-thumbnail'); ?>

                        <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php trendymag_alt_text();?>">
                    </div>
                <?php
                $carousel_count++;
                endforeach; ?>
            </div> <!-- .carousel-inner -->
            
            <!-- Controls -->
            <a class="left carousel-control" href="#news-gallery-<?php echo get_the_ID();?>" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="right carousel-control" href="#news-gallery-<?php echo get_the_ID();?>" data-slide="next"><i class="fa fa-angle-right"></i></a>
        </div> <!-- .blog-gallery-carousel -->
    <?php endif;
endif; ?>