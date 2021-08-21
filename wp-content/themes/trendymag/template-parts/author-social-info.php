<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
?>

<?php
    $user_url = get_the_author_meta('user_url'); 
    $facebook_profile = get_the_author_meta( 'facebook_profile' );
    $twitter_profile = get_the_author_meta( 'twitter_profile' );
    $google_profile = get_the_author_meta( 'google_profile' );
    $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
    $github_profile = get_the_author_meta( 'github_profile' );

if ($user_url || $facebook_profile || $twitter_profile || $google_profile || $linkedin_profile || $github_profile): ?>
    <div class="author-links">
        <ul class="list-inline">
            <?php 
                
                if ($user_url) : ?>
                    <li class="website"><a href="<?php echo esc_url($user_url); ?>" target="_blank"><i class="fa fa-globe"></i></a></li>
                <?php endif;

                if ( $facebook_profile) : ?>
                    <li class="facebook"><a href="<?php echo esc_url($facebook_profile); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <?php endif;

                if ( $twitter_profile ) : ?>
                    <li class="twitter"><a href="<?php echo esc_url($twitter_profile); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <?php endif;

                if ( $google_profile ) : ?>
                    <li class="google"><a href="<?php echo esc_url($google_profile); ?>" rel="author" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                <?php endif;

                if ( $linkedin_profile ) : ?>
                    <li class="linkedin"><a href="<?php echo esc_url($linkedin_profile); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <?php endif;

                if ( $github_profile ) : ?>
                    <li class="linkedin"><a href="<?php echo esc_url($github_profile); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
                <?php endif;
            ?>
        </ul>
    </div> <!-- .author-links -->
<?php endif; ?>