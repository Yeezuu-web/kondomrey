<?php


    //---------------------------------------------------------------------------
    // Recent comments widget
    //---------------------------------------------------------------------------

    class TT_Recent_Comments_Widget extends WP_Widget {
        public function __construct() {
            parent::__construct(
                'tt-comments-widget', // Base ID
                __('TrendyMag Recent Comments', 'tt-pl-textdomain'), // Name
                array('description' => __('Your site\'s most recent comments with user avatar.', 'tt-pl-textdomain')) // Args
            );
        }

        public function form($instance) {
            $defaults = array(
                'title'             => '',
                'comment_number'    => '5',
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('comment_number'); ?>"><?php esc_html_e('Number of comments to show: ', 'tt-pl-textdomain'); ?></label>
                <input id="<?php echo $this->get_field_id('comment_number'); ?>" name="<?php echo $this->get_field_name('comment_number'); ?>" type="text" value="<?php echo esc_attr($instance['comment_number']); ?>">
            </p>

        <?php }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'comment_number' ] = (!empty($new_instance[ 'comment_number' ])) ? strip_tags($new_instance[ 'comment_number' ]) : '5';

            return $instance;
        }

        public function widget($args, $instance) {
            //extract( $args );

            echo $args[ 'before_widget' ];
            $title = apply_filters('widget_title', $instance[ 'title' ]);
            if (!empty($title)) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }
            ?>

            <div class="tt-recent-comments">
                <?php
                    $comment_args = array(
                        'post_type' => 'post',
                        'status'    => 'approve',
                        'number'    => $instance[ 'comment_number' ]
                    );

                    $comments = get_comments($comment_args);
                    foreach ($comments as $comment) { 

                        //print_r($comment);

                        $author_url = $comment->comment_author_url;

                        ?>
                        <div class="media">
                            <div class="media-left author-avatar">
                                <?php
                                    if($author_url): ?>
                                        <a href="<?php echo esc_url($comment->comment_author_url);?>">
                                            <?php echo get_avatar($comment->comment_author_email, 65); ?>
                                        </a>
                                    <?php else :
                                        echo get_avatar($comment->comment_author_email, 65);
                                    endif;
                                ?>
                            </div>
                            <div class="media-body comment-content">

                                <h4 class="comment-title"> <a href="<?php echo get_permalink($comment->comment_post_ID) ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo get_the_title($comment->comment_post_ID) ?></a>
                                </h4>

                                <div class="entry-meta">
                                    <ul class="list-inline">
                                        <li><i class="fa fa-user"></i>
                                            <?php if ($author_url): ?>
                                                <a href="<?php echo esc_url($comment->comment_author_url);?>">
                                                    <?php echo esc_html($comment->comment_author); ?>
                                                </a>
                                            <?php else : 
                                                echo esc_html($comment->comment_author);
                                            endif ?>
                                        </li>
                                        <li><i class="fa fa-clock-o"></i><?php comment_date('j M Y', $comment->comment_ID ); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php }
                ?>
                
            </div> <!-- /tt-recent-comments -->

            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_recent_comments_widget_register')) {
        function tt_recent_comments_widget_register() {
            register_widget('TT_Recent_Comments_Widget');
        }
        add_action('widgets_init', 'tt_recent_comments_widget_register');
    }