<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

    //---------------------------------------------------------------------------
    // Latest Post widget
    //---------------------------------------------------------------------------

    class TT_Latest_Post_Widget extends WP_Widget {
        public function __construct() {
            parent::__construct(
                'tt_latest_post', // Base ID
                __('TrendyMag Latest News', 'tt-pl-textdomain'), // Name
                array('description' => esc_html__('Displays latest news', 'tt-pl-textdomain')) // Args
            );
        }

        public function form($instance) {
            $defaults = array(
                'title'            	=> '',
                'post_limit'       	=> '5',
                'order'				=> 'DESC',
                'orderby'			=> 'date',
                'show_meta'        	=> 'yes',
                'thumb'            	=> 'yes'
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('post_limit'); ?>"><?php esc_html_e('Number of posts to show: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('post_limit'); ?>" name="<?php echo $this->get_field_name('post_limit'); ?>" type="text" value="<?php echo esc_attr($instance['post_limit']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('order'); ?>"><?php esc_html_e('Order', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" style="width:100%;">
                    <option value="ASC" <?php selected($instance['order'], 'ASC'); ?>><?php esc_html_e('ASC', 'tt-pl-textdomain') ?></option>
                    <option value="DESC" <?php selected($instance['order'], 'DESC'); ?>><?php esc_html_e('DESC', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php esc_html_e('Orderby', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>" style="width:100%;">
                    <option value="none" <?php selected($instance['orderby'], 'none'); ?>><?php esc_html_e('None', 'tt-pl-textdomain') ?></option>
                    <option value="title" <?php selected($instance['orderby'], 'title'); ?>><?php esc_html_e('Title', 'tt-pl-textdomain') ?></option>
                    <option value="name" <?php selected($instance['orderby'], 'name'); ?>><?php esc_html_e('Name', 'tt-pl-textdomain') ?></option>
                    <option value="date" <?php selected($instance['orderby'], 'date'); ?>><?php esc_html_e('Date', 'tt-pl-textdomain') ?></option>
                    <option value="modified" <?php selected($instance['orderby'], 'modified'); ?>><?php esc_html_e('Modified', 'tt-pl-textdomain') ?></option>
                    <option value="rand" <?php selected($instance['orderby'], 'rand'); ?>><?php esc_html_e('Random', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('show_meta'); ?>"><?php esc_html_e('Show meta ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('show_meta'); ?>" name="<?php echo $this->get_field_name('show_meta'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['show_meta'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['show_meta'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('thumb'); ?>"><?php esc_html_e('Show Post thumbnail ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['thumb'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['thumb'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

        <?php }

        public function update($new_instance, $old_instance) {
            $instance = $old_instance;

            $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'post_limit' ] = (!empty($new_instance[ 'post_limit' ])) ? strip_tags($new_instance[ 'post_limit' ]) : '5';
            $instance[ 'order' ] = (!empty($new_instance[ 'order' ])) ? strip_tags($new_instance[ 'order' ]) : 'DESC';
            $instance[ 'orderby' ] = (!empty($new_instance[ 'orderby' ])) ? strip_tags($new_instance[ 'orderby' ]) : 'date';
            $instance[ 'show_meta' ] = (!empty($new_instance[ 'show_meta' ])) ? strip_tags($new_instance[ 'show_meta' ]) : 'yes';
            $instance[ 'thumb' ] = (!empty($new_instance[ 'thumb' ])) ? strip_tags($new_instance[ 'thumb' ]) : 'yes';

            return $instance;
        }

        public function widget($args, $instance) {

            echo $args[ 'before_widget' ];
            $title = apply_filters('widget_title', $instance[ 'title' ]);
            if (!empty($title)) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }
            ?>

            <div class="tt-latest-news">
                
                <?php
                $pargs = array(
                    'post_type'      	=> 'post',
                    'posts_per_page' 	=> $instance[ 'post_limit' ],
                    'post_status'    	=> 'publish',
                    'order'				=> $instance[ 'order' ],
                    'orderby'			=> $instance[ 'orderby' ],
                    'post__not_in'   	=> get_option('sticky_posts')
                );

                $the_query = new WP_Query($pargs);
                if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : 
                $the_query->the_post(); ?>
            		<article <?php post_class(); ?>>
            			<header class="entry-thumnail">
	                        <?php
	                        $thumb_id = get_post_thumbnail_id(); // Get the featured image id.
	                        $image = wp_get_attachment_image_src($thumb_id, 'trendymag-two-third'); // Get img URL.
	                        //
	                        if ($instance[ 'thumb' ] == 'yes') :
	                            if (has_post_thumbnail()) : ?>
	                                <a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo esc_url($image[ 0 ]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"></a>
	                            <?php 
	                            endif;    
	                        endif; ?>
						</header> <!-- .entry-thumnail -->
	                        
	                    <div class="entry-content">
	                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                    </div> <!-- /.entry-content -->

	                    <?php if ($instance[ 'show_meta' ] == 'yes') : ?>
                            <footer class="entry-meta">
                                <ul class="list-inline">
                                    <li><?php printf('<a class="url fn n" href="%1$s"><i class="fa fa-user"></i>%2$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())) ?></li>
                                    <li><i class="fa fa-clock-o"></i><?php the_time( get_option( 'date_format' ) ); ?></li>
                                </ul>
                            </footer>
                        <?php endif; ?>
            		</article>
                <?php endwhile;

                wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php esc_html_e( 'News Not Found!', 'tt-pl-textdomain'); ?></p>
                <?php endif; ?>

            </div> <!-- latest-news -->

            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_latest_post_widget_register')) {
        function tt_latest_post_widget_register() {
            register_widget('TT_Latest_Post_Widget');
        }

        add_action('widgets_init', 'tt_latest_post_widget_register');
    }