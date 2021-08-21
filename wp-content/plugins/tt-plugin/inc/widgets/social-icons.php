<?php 

    class TT_Social_Icon_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'tt_social_button', // Base ID
                __('TrendyMag Social Icons', 'tt-pl-textdomain'), // Name
                array('description' => __('Displays social icons', 'tt-pl-textdomain'),) // Args
            );
        }

        public function form($instance) {
            $title          = (isset($instance[ 'title' ])) ? $instance[ 'title' ] : '';
            $facebook       = (isset($instance[ 'facebook' ])) ? $instance[ 'facebook' ] : ''; 
            $twitter        = (isset($instance[ 'twitter' ])) ? $instance[ 'twitter' ] : ''; 
            $google         = (isset($instance[ 'google' ])) ? $instance[ 'google' ] : ''; 
            $pinterest      = (isset($instance[ 'pinterest' ])) ? $instance[ 'pinterest' ] : ''; 
            $dribbble       = (isset($instance[ 'dribbble' ])) ? $instance[ 'dribbble' ] : ''; 
            $behance        = (isset($instance[ 'behance' ])) ? $instance[ 'behance' ] : ''; 
            $instagram      = (isset($instance[ 'instagram' ])) ? $instance[ 'instagram' ] : ''; 
            $linkedin       = (isset($instance[ 'linkedin' ])) ? $instance[ 'linkedin' ] : ''; 
            $delicious      = (isset($instance[ 'delicious' ])) ? $instance[ 'delicious' ] : ''; 
            $soundcloud     = (isset($instance[ 'soundcloud' ])) ? $instance[ 'soundcloud' ] : ''; 
            $youtube        = (isset($instance[ 'youtube' ])) ? $instance[ 'youtube' ] : ''; 
            $flickr         = (isset($instance[ 'flickr' ])) ? $instance[ 'flickr' ] : ''; 
            $vimeo          = (isset($instance[ 'vimeo' ])) ? $instance[ 'vimeo' ] : ''; 
            $github         = (isset($instance[ 'github' ])) ? $instance[ 'github' ] : ''; 
            $tumblr         = (isset($instance[ 'tumblr' ])) ? $instance[ 'tumblr' ] : ''; 
            $android        = (isset($instance[ 'android' ])) ? $instance[ 'android' ] : ''; 
            $digg           = (isset($instance[ 'digg' ])) ? $instance[ 'digg' ] : ''; 
            $fontsize       = (isset($instance[ 'fontsize' ])) ? $instance[ 'fontsize' ] : ''; 
            ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>

            <p class="tt-full-block">
                <label for="<?php echo $this->get_field_id('fontsize'); ?>"><?php esc_html_e('Select icon size:', 'tt-pl-textdomain'); ?></label>
                <select id="<?php echo $this->get_field_id('fontsize'); ?>" name="<?php echo $this->get_field_name('fontsize'); ?>" type="text">
                    <option value="small" <?php selected($instance['fontsize'], 'small'); ?>>Small</option>
                    <option value="medium" <?php selected($instance['fontsize'], 'medium');?>>Medium</option>
                    <option value="large" <?php selected($instance['fontsize'], 'large');?>>Large</option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Enter facebook URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Enter twitter URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('google'); ?>"><?php esc_html_e('Enter google URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php esc_html_e('Enter pinterest URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php esc_html_e('Enter dribbble URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('behance'); ?>"><?php esc_html_e('Enter behance URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" name="<?php echo $this->get_field_name('behance'); ?>" type="text" value="<?php echo esc_attr($behance); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php esc_html_e('Enter instagram URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php esc_html_e('Enter linkedin URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('delicious'); ?>"><?php esc_html_e('Enter delicious URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo esc_attr($delicious); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php esc_html_e('Enter soundcloud URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" type="text" value="<?php echo esc_attr($soundcloud); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php esc_html_e('Enter youtube URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php esc_html_e('Enter flickr URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php esc_html_e('Enter vimeo URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('github'); ?>"><?php esc_html_e('Enter github URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('github'); ?>" name="<?php echo $this->get_field_name('github'); ?>" type="text" value="<?php echo esc_attr($github); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php esc_html_e('Enter tumblr URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('android'); ?>"><?php esc_html_e('Enter android URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('android'); ?>" name="<?php echo $this->get_field_name('android'); ?>" type="text" value="<?php echo esc_attr($android); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('digg'); ?>"><?php esc_html_e('Enter digg URL:', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('digg'); ?>" name="<?php echo $this->get_field_name('digg'); ?>" type="text" value="<?php echo esc_attr($digg); ?>">
            </p>

        <?php
        }

        public function update($new_instance, $old_instance) {
            $instance                 = array();
            $instance[ 'title' ]      = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'facebook' ]      = (!empty($new_instance[ 'facebook' ])) ? strip_tags($new_instance[ 'facebook' ]) : '';
            $instance[ 'twitter' ]      = (!empty($new_instance[ 'twitter' ])) ? strip_tags($new_instance[ 'twitter' ]) : '';
            $instance[ 'google' ]      = (!empty($new_instance[ 'google' ])) ? strip_tags($new_instance[ 'google' ]) : '';
            $instance[ 'pinterest' ]      = (!empty($new_instance[ 'pinterest' ])) ? strip_tags($new_instance[ 'pinterest' ]) : '';
            $instance[ 'dribbble' ]      = (!empty($new_instance[ 'dribbble' ])) ? strip_tags($new_instance[ 'dribbble' ]) : '';
            $instance[ 'behance' ]      = (!empty($new_instance[ 'behance' ])) ? strip_tags($new_instance[ 'behance' ]) : '';
            $instance[ 'instagram' ]      = (!empty($new_instance[ 'instagram' ])) ? strip_tags($new_instance[ 'instagram' ]) : '';
            $instance[ 'linkedin' ]      = (!empty($new_instance[ 'linkedin' ])) ? strip_tags($new_instance[ 'linkedin' ]) : '';
            $instance[ 'delicious' ]      = (!empty($new_instance[ 'delicious' ])) ? strip_tags($new_instance[ 'delicious' ]) : '';
            $instance[ 'soundcloud' ]      = (!empty($new_instance[ 'soundcloud' ])) ? strip_tags($new_instance[ 'soundcloud' ]) : '';
            $instance[ 'youtube' ]      = (!empty($new_instance[ 'youtube' ])) ? strip_tags($new_instance[ 'youtube' ]) : '';
            $instance[ 'flickr' ]      = (!empty($new_instance[ 'flickr' ])) ? strip_tags($new_instance[ 'flickr' ]) : '';
            $instance[ 'vimeo' ]      = (!empty($new_instance[ 'vimeo' ])) ? strip_tags($new_instance[ 'vimeo' ]) : '';
            $instance[ 'github' ]      = (!empty($new_instance[ 'github' ])) ? strip_tags($new_instance[ 'github' ]) : '';
            $instance[ 'tumblr' ]      = (!empty($new_instance[ 'tumblr' ])) ? strip_tags($new_instance[ 'tumblr' ]) : '';
            $instance[ 'android' ]      = (!empty($new_instance[ 'android' ])) ? strip_tags($new_instance[ 'android' ]) : '';
            $instance[ 'digg' ]      = (!empty($new_instance[ 'digg' ])) ? strip_tags($new_instance[ 'digg' ]) : '';
            $instance[ 'fontsize' ]      = (!empty($new_instance[ 'fontsize' ])) ? strip_tags($new_instance[ 'fontsize' ]) : '';

            return $instance;
        }

        public function widget($args, $instance)  {
            $title = apply_filters('widget_title', $instance[ 'title' ]);

            echo $args[ 'before_widget' ];

            if (!empty($title))
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];

            ?>
        
            <div class="tt-social-link">
                <ul class="list-inline">
                    <?php $facebook_link = $instance['facebook'];
                        if ($facebook_link) { ?>
                           <li class="facebook <?php echo $instance['fontsize'] ?>"><a href="<?php echo $facebook_link ?>"><i class="fa fa-facebook"></i></a></li> 
                    <?php } ?>

                    <?php $twitter_link = $instance['twitter'];
                        if ($twitter_link) { ?>
                           <li class="twitter <?php echo $instance['fontsize'] ?>"><a href="<?php echo $twitter_link ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>

                    <?php $google_link = $instance['google'];
                        if ($google_link) { ?>
                           <li class="google <?php echo $instance['fontsize'] ?>"><a href="<?php echo $google_link ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php } ?>

                    <?php $pinterest_link = $instance['pinterest'];
                        if ($pinterest_link) { ?>
                            <li class="pinterest <?php echo $instance['fontsize'] ?>"><a href="<?php echo $pinterest_link ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>

                    <?php $dribbble_link = $instance['dribbble'];
                        if ($dribbble_link) { ?>
                            <li class="dribbble <?php echo $instance['fontsize'] ?>"><a href="<?php echo $dribbble_link ?>"><i class="fa fa-dribbble"></i></a></li>
                    <?php } ?>

                    <?php $behance_link = $instance['behance'];
                        if ($behance_link) { ?>
                            <li class="behance <?php echo $instance['fontsize'] ?>"><a href="<?php echo $behance_link ?>"><i class="fa fa-behance"></i></a></li>
                    <?php } ?>

                    <?php $instagram_link = $instance['instagram'];
                        if ($instagram_link) { ?>
                            <li class="instagram <?php echo $instance['fontsize'] ?>"><a href="<?php echo $instagram_link ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>

                    <?php $linkedin_link = $instance['linkedin'];
                        if ($linkedin_link) { ?>
                            <li class="linkedin <?php echo $instance['fontsize'] ?>"><a href="<?php echo $linkedin_link ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>

                    <?php $delicious_link = $instance['delicious'];
                        if ($delicious_link) { ?>
                            <li class="delicious <?php echo $instance['fontsize'] ?>"><a href="<?php echo $delicious_link ?>"><i class="fa fa-delicious"></i></a></li>
                    <?php } ?>

                    <?php $soundcloud_link = $instance['soundcloud'];
                        if ($soundcloud_link) { ?>
                            <li class="soundcloud <?php echo $instance['fontsize'] ?>"><a href="<?php echo $soundcloud_link ?>"><i class="fa fa-soundcloud"></i></a></li>
                    <?php } ?>

                    <?php $youtube_link = $instance['youtube'];
                        if ($youtube_link) { ?>
                            <li class="youtube <?php echo $instance['fontsize'] ?>"><a href="<?php echo $youtube_link ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php } ?>

                    <?php $flickr_link = $instance['flickr'];
                        if ($flickr_link) { ?>
                            <li class="flickr <?php echo $instance['fontsize'] ?>"><a href="<?php echo $flickr_link ?>"><i class="fa fa-flickr"></i></a></li>
                    <?php } ?>

                    <?php $vimeo_link = $instance['vimeo'];
                        if ($vimeo_link) { ?>
                            <li class="vimeo <?php echo $instance['fontsize'] ?>"><a href="<?php echo $vimeo_link ?>"><i class="fa fa-vimeo-square"></i></a></li>
                    <?php } ?>

                    <?php $github_link = $instance['github'];
                        if ($github_link) { ?>
                            <li class="github <?php echo $instance['fontsize'] ?>"><a href="<?php echo $github_link ?>"><i class="fa fa-github"></i></a></li>
                    <?php } ?>

                    <?php $tumblr_link = $instance['tumblr'];
                        if ($tumblr_link) { ?>
                            <li class="tumblr <?php echo $instance['fontsize'] ?>"><a href="<?php echo $tumblr_link ?>"><i class="fa fa-tumblr"></i></a></li>
                    <?php } ?>

                    <?php $android_link = $instance['android'];
                        if ($android_link) { ?>
                            <li class="android <?php echo $instance['fontsize'] ?>"><a href="<?php echo $android_link ?>"><i class="fa fa-android"></i></a></li>
                    <?php } ?>

                    <?php $digg_link = $instance['digg'];
                        if ($digg_link) { ?>
                            <li class="digg <?php echo $instance['fontsize'] ?>"><a href="<?php echo $digg_link ?>"><i class="fa fa-digg"></i></a></li>
                    <?php } ?>
 
                </ul>                  
            </div>   


            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_social_icon_register')) {
        function tt_social_icon_register() {
            register_widget('TT_Social_Icon_Widget');
        }

       add_action('widgets_init', 'tt_social_icon_register');
    }