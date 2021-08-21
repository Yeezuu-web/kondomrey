/*
Theme Name: TrendyMag
Author: TrendyTheme
*/

/* ======= TABLE OF CONTENTS ================================== 
# Preloader
# Enable bootstrap tooltip
# Tab loading
# Detect IE version
# easeInOutExpo Effect
# Page scrolling
# Mobile Dropdown Menu
# Mobile Toggle Menu
# Dropdown menu offest
# Sticky Menu
# News Ticker
# Sidebar Menu
# Sidebar Overlay
# Sidebar Close
# Video Sticky
# Search box
# Full Screen Background
# Magnific Popup
# Magnific Popup for blog post
# Magnific Popup for embeds
# Masonry Grid
# Gallery
# Weather
# News slider
# Google Map
# Back to Top
# Post Grid
# Filter text replace
# Post loadmore
# Sticky sidebar
# Select to share
# Print text
# Social share popup window
========================================================= */

jQuery(function ($) {

    'use strict';


    /* ======= Preloader ======= */
    (function () {
        $('#status').fadeOut();
        $('#preloader').delay(200).fadeOut('slow');
    }());


    /* ======= Enable bootstrap tooltip ======= */
    (function () {
        $('[data-toggle="tooltip"]').tooltip()
    }());


    /* ======= Tab loading ======= */
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var $target = $($(e.target).attr('href'));
        $target.addClass('loading');

        // example of async content loading
        setTimeout(function() {
            $target.removeClass('loading');
        }, 1000);
    });


    /* === Detect IE version === */
    (function () {
        function getIEVersion() {
            var match = navigator.userAgent.match(/(?:MSIE |Trident\/.*; rv:)(\d+)/);
            return match ? parseInt(match[1], 10) : false;
        }

        if( getIEVersion() ){
            $('html').addClass('ie'+getIEVersion());
        }
    }());


    /* === easeInOutExpo Effect === */
    (function () {
        $.easing = Object.assign({}, $.easing, {
            easeInOutExpo: (x, t, b, c, d) => {
                if (t==0) return b;
                if (t==d) return b+c;
                if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
                return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
            },
        });
    }());


    /* === Page scrolling === */
    (function () {
        $('.navbar-nav > li> a[href^="#"], .tt-scroll').on('click', function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);
            var headerHeight = $('.header-wrapper, .header-wrapper.sticky').outerHeight();
            
            if (target) {
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top - headerHeight + "px"
                }, 1200, 'easeInOutExpo');
            }
        });
    }());


    /* === Mobile Dropdown Menu === */
    (function(){
        $('.dropdown-menu-trigger').each(function() {
            $(this).on('click', function(e){
                e.preventDefault();
                $(this).toggleClass('menu-collapsed');
            });
        });
    }());

    /* === Mobile Toggle Menu === */
    (function(){
        $('.navbar-toggle').on('click', function() {
            $('body').addClass('menu-open');
        });
        $('.menu-close').on('click', function() {
            $('body').removeClass('menu-open');
        });
    }());


    /* === Dropdown menu offest === */
    $(window).on('load resize', function () {
        $(".dropdown-wrapper > ul > li, .msm-menu-item > .msm-submenu").each(function() {
            var $this = $(this),
                $win = $(window);

            if ($this.offset().left + 195 > $win.width() + $win.scrollLeft() - $this.width()) {
                $this.addClass("dropdown-inverse");
            } else {
                $this.removeClass("dropdown-inverse");
            }
        });
    });


    /* === Sticky Menu === */
    (function () {
        if (trendymagJSObject.trendymag_sticky_menu == true) {
            var nav = $('.header-wrapper');
            var scrolled = false;

            $(window).on('scroll', function () {

                if (140 < $(window).scrollTop() && !scrolled) {
                    nav.addClass('sticky').animate({ 'margin-top': '0px' });
                    scrolled = true;
                }

                if (140 > $(window).scrollTop() && scrolled) {
                    nav.removeClass('sticky').css('margin-top', '0px');
                    scrolled = false;
                }
            });
        }
    }());


    /* === News Ticker  === */
    $(window).on('load', function () {
        $('.breaking-news-wrapper').fadeIn();
        if (trendymagJSObject.trendymag_breaking_news == true) {
            $('.breaking-news').newsTicker({
                row_height: 25,
                max_rows: 1,
                speed: 600,
                direction: 'up',
                duration: 4000,
                autostart: 1,
                pauseOnHover: 1
            });
        }
    }());


    /* ======= Sidebar Menu ======= */
    (function () {
        $(".menu-toggle").on('click', function(e) {
            e.preventDefault();
            $("body").toggleClass("sidebar-open");
            $("#wrapper").toggleClass("toggled sidebar-active");
        });
    }());


    /* === Sidebar Overlay === */
    (function(){
        function create(htmlStr) {
            var frag = document.createDocumentFragment(),
                temp = document.createElement('div');
            temp.innerHTML = htmlStr;
            while (temp.firstChild) {
                frag.appendChild(temp.firstChild);
            }
            return frag;
        }

        var fragment = create('<div class="sidebar-bg-overlay"></div><div class="sidebar-close"><i class="fa fa-times"></i></div>');
        document.body.insertBefore(fragment, document.body.childNodes[0]);
    }());


    /* ======= Sidebar Close ======= */
    (function () {
        $(".sidebar-bg-overlay, .sidebar-close").on('click', function(e) {
            e.preventDefault();
            $("body").removeClass("sidebar-open");
            $("#wrapper").removeClass("toggled sidebar-active");
        });
    }());


    /* ======= Video Sticky ======= */
    (function () {
        if ($('.single-post .format-video .post-thumbnail').length > 0) {
            var vid = $('.single-post .format-video .post-thumbnail');
            var top = vid.offset().top - parseFloat(vid.css('margin-top').replace(/auto/, 0));
            $(window).on('scroll', function(event) {
                var y = $(this).scrollTop();
                if (y >= top) {
                    if ( vid.is('.video-sticky') ) {
                        return;
                    }
                    vid.addClass('video-sticky').prepend($('<span class="video-close"><i class="fa fa-times"></i></span>'));          
                } else {
                    vid.removeClass('video-sticky');
                    $('.video-close').remove();
                }

                $('.video-close').on('click', function(){
                    vid.toggleClass('remove-sticky-video');
                });
            });
        }
    }());


    /* ======= Search box ======= */
    (function () {
        var searchBox = $(".search-box-wrap .search-form");
        var searchIcon = $(".search-icon");
        searchBox.hide();
        searchIcon.on('click', function(event) {
            searchIcon.toggleClass("active");
            searchBox.slideToggle();
            $(this).closest('.search-box-wrap').find('input').focus();
        });
    }());


    /* ======= Full Screen Background ======= */
    $(".tt-fullHeight").height($(window).height());
    $(window).resize(function(){
        $(".tt-fullHeight").height($(window).height());
    });


    /* ======= Magnific Popup ======= */
    $(window).load(function(){
        $(".tt-lightbox, .image-link").magnificPopup({
            type: 'image',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            fixedContentPos: false,
            gallery:{
                enabled:true
            }
        });
    });

    /* ======= Magnific Popup for blog post ======= */
    $('.blog-popup').magnificPopup({
        type: 'image',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        fixedContentPos: false,
        gallery:{
            enabled:false
        }
    });


    /* ======= Magnific Popup for embeds ======= */
    $('.tt-popup').magnificPopup({
        disableOn: 200,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: true,
        fixedContentPos: false,
        iframe: {
        patterns: {
          dailymotion: {
            index: 'dailymotion.com',
            id: function(url) {
                var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
                console.log(m);
                if (m !== null) {
                    if(m[4] !== undefined) {
                        return m[4];
                    }
                    return m[2];
                }
                return null;
            },
            
            src: 'http://www.dailymotion.com/embed/video/%id%?autoplay=1'
            
          },

          facebook: {
            index: 'facebook.com',
            id: function(url) {
                var videoId = url.match(/\d+[15]/g);

                return videoId;

            },
            
            src: 'https://www.facebook.com/v2.5/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fvideo.php%3Fv%3D%id%&autoplay=1'
            
          },

          srcAction: 'iframe_src',

        }
      }
    });


    /* === Masonry Grid  === */
    $(window).load(function () {
        var $masonryWrap = $('.masonry-wrap');

        $masonryWrap.masonry({
            "columnWidth" : ".masonry-column"
        });

        $masonryWrap.imagesLoaded().progress( function() {
            $masonryWrap.masonry('layout');
        });
    });


    /* === Gallery === */
    $(window).on('load', function () {
        // The slider being synced must be initialized first
        $('.tt-gallery-wrapper').each(function(i, e){

            var ttGalleryNav = $(this).find('.tt-gallery-nav');
            var ttGalleryThumb = $(this).find('.tt-gallery-thumb');
            var ttGallery = $(this).find('.tt-gallery');
            
            ttGalleryThumb.flexslider({
                animation     : "slide",
                controlNav    : false,
                animationLoop : true,
                slideshow     : false,
                itemWidth     : 85,
                asNavFor      : ttGallery
            });

            ttGallery.flexslider({
                animation     : "slide",
                directionNav  : false,
                controlNav    : false,
                animationLoop : false,
                slideshow     : false,
                sync          : ttGalleryThumb
            });

            // Navigation 
            ttGalleryNav.find('.prev').on('click', function (e) {
                ttGallery.flexslider('prev')
                return false;
            });

            ttGalleryNav.find('.next').on('click', function (e) {
                ttGallery.flexslider('next')
                return false;
            });
        });


        /* === Weather === */
        $('.weather-forecast-wrap').flexslider({
            animation       : "slide",
            animationLoop   : "true",
            controlNav      : false,
            itemWidth       : 60,
            maxItems        : 5,
            touch           : true,
            itemMargin      : 5
        });


        /* === News slider === */
        $('.post-wrapper').each(function(i, e){

            var ttNews = $(this).find('.news-slider');
            var ttGalleryNav = $(this).find('.tt-gallery-nav');

            ttNews.flexslider({
                animation       : "slide",
                animationLoop   : "true",
                controlNav      : false,
                touch           : true,
            });

            // Navigation 
            ttGalleryNav.find('.prev').on('click', function (e) {
                ttNews.flexslider('prev')
                return false;
            });

            ttGalleryNav.find('.next').on('click', function (e) {
                ttNews.flexslider('next')
                return false;
            });
        });
    }());


    /* ======= Back to Top ======= */
    (function(){

        $('body').append('<div id="toTop"><i class="fa fa-angle-up"></i></div>');

        $(window).scroll(function () {
            if ($(this).scrollTop() !== 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        }); 

        $('#toTop').on('click',function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });

    }());


    /* ======= Post Grid ======= */
    if ($('.post-grid').length > 0) {
        $(window).on('load', function () {
            var $grid = $('.post-grid').isotope({
                itemSelector: '.post-grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.post-grid-item'
                },
            });
        });
    }


    /* ======= Filter text replace ======= */
    $(function() {
        $('.catagory-dropdown-wrapper').each(function(i, e){
            var list = $(this).find('.nav-tabs ul');
            var link = $(this).find('.nav-tabs button');
            link.click(function(e) {
                e.preventDefault();
                list.slideToggle(200);
            });
            list.find('li > a').click(function() {
                var text = $(this).html();
                var icon = '<span class="fa fa-chevron-down"></span>';
                link.html(text+icon);
                list.slideToggle(200);
            });
        });
    });



    /* ======= Post loadmore ======= */
    $(window).on('load', function () {

        var $content = $('.post-loadmore');
        var $loader = $('.loadmore-btn');

        var perpage = $loader.data('postlimit');
        var allPosts = $loader.data('allposts');
        var column = $loader.data('grid_column');
        var style = $loader.data('style');
        var postSource = $loader.data('post_source');
        var taxonomies = $loader.data('taxonomies');
        var tags = $loader.data('tags');
        var authors = $loader.data('authors');
        var post_id = $loader.data('post_id');
        var exclude = $loader.data('exclude');
        var category = $loader.data('category');
        var data = $loader.data('date');
        var comment = $loader.data('comment');
        var coloredBorder = $loader.data('colored_border');
        var orderby = $loader.data('orderby');
        var order = $loader.data('order');
        var postHeight = $loader.data('post_height');
        var gradientStyle = $loader.data('gradient_style');
        var gradientColorOne = $loader.data('gradient_color_1');
        var gradientColorTwo = $loader.data('gradient_color_2');
        var gradientOpacityOne = $loader.data('gradient_opacity_1');
        var gradientOpacityTwo = $loader.data('gradient_opacity_2');
        var gradientCustomColorOne = $loader.data('gradient_custom_color_1');
        var gradientCustomColorTwo = $loader.data('gradient_custom_color_2');
        var offset = $content.find('.post-grid-item').length;

        $loader.on( 'click', load_ajax_posts );
         
        function load_ajax_posts() {
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: trendymagJSObject.ajaxurl,
                data: {
                    'perpage'               : perpage, 
                    'gridColumn'            : column, 
                    'postStyle'             : style,
                    'postSource'            : postSource,
                    'taxonomies'            : taxonomies,
                    'tags'                  : tags,
                    'authors'               : authors,
                    'post_id'               : post_id,
                    'exclude'               : exclude,
                    'categoryVisibility'    : category,
                    'dataVisibility'        : data,
                    'commentVisibility'     : comment,
                    'coloredBorder'         : coloredBorder,
                    'orderby'               : orderby,
                    'order'                 : order,
                    'postHeight'            : postHeight,
                    'gradientStyle'         : gradientStyle,
                    'gradientColorOne'      : gradientColorOne,
                    'gradientColorTwo'      : gradientColorTwo,
                    'gradientOpacityOne'    : gradientOpacityOne,
                    'gradientOpacityTwo'    : gradientOpacityTwo,
                    'gradientCustomColorOne': gradientCustomColorOne,
                    'gradientCustomColorTwo': gradientCustomColorTwo,
                    'offset'                : offset,
                    'action'                : 'trendymag_more_post_ajax'
                },
                beforeSend: function(){
                    $('<i class="fa fa-spinner fa-spin"></i>').appendTo( ".loadmore-btn" ).fadeIn(100);
                },
                complete:function(){
                    $('.loadmore-btn .fa-spinner ').remove();
                }
            })

            .done(function(data) {
                var $newItems = $(data);
                $content.isotope('insert', $newItems,function(){
                    $content.isotope('reLayout',{
                        animationEngine: 'jquery',
                        animationOptions: {
                            duration: 400,
                            queue: false
                        }
                    });
                });

                var $gridWrap = $('.post-grid');
                $gridWrap.imagesLoaded().progress( function() {
                    $gridWrap.isotope('layout');
                });

                var newLenght = $content.find('.post-grid-item').length;

                if(allPosts <= newLenght){
                    $('.loadmore-btn-wrap').fadeOut(400,function(){
                        $('.loadmore-btn-wrap').remove();
                    });
                }
            })

            .fail(function() {
                alert('failed');
                console.log("error");
            });
            
            offset += perpage;
            return false;
        }

    });


    /* ======= Sticky sidebar ======= */
    (function(){
        $('.sidebar-sticky').ttStickySidebar({
          additionalMarginTop: 30
        });
    }());

    // 
    /* ======= Select to share ======= */
    (function(){
        if (trendymagJSObject.trendymag_share == true) {

            var facebookAppID = trendymagJSObject.trendymag_facebook_app_id;
            var twitterUsername = trendymagJSObject.trendymag_twitter_username;

            var ttFacebook = '', ttTwitter = '', tumblr = '', stumbleupon = '', digg = '', reddit = '', linkedin = '';
            var shareButton = trendymagJSObject.trendymag_share_button;

            if (shareButton) {
                if (shareButton.facebook == 1) {
                    ttFacebook = 'facebook,';
                }
                if (shareButton.twitter == 1) {
                    ttTwitter = 'twitter,';
                }
                if (shareButton.tumblr == 1) {
                    tumblr = 'tumblr,';
                }
                if (shareButton.stumbleupon == 1) {
                    stumbleupon = 'stumbleupon,';
                }
                if (shareButton.digg == 1) {
                    digg = 'digg,';
                }
                if (shareButton.reddit == 1) {
                    reddit = 'reddit,';
                }
                if (shareButton.linkedin == 1) {
                    linkedin = 'linkedin';
                }
            }
            
            var string = ttFacebook+ttTwitter+tumblr+stumbleupon+digg+reddit+linkedin;
            var array = string.split(',');
            var buttons = array.filter(String);

            shareSelectedText('.entry-content', {
                sanitize: true,      // will sanitize the user selection to respect the Twitter Max length (recommended) 
                buttons: buttons, //facebook+twitter+tumblr+stumbleupon+bbuffer+stumbleupon+digg+reddit+linkedin
                twitterUsername: ''+twitterUsername+'', // for twitter widget, will add 'via @twitterUsername' at the end of the tweet.
                facebookAppID: ''+facebookAppID+'', // Can also be an HTML element inside the <head> tag of your page : <meta property="fb:APP_ID" content="YOUR_APP_ID"/>
                facebookDisplayMode: 'popup', //can be 'popup' || 'page'
                tooltipTimeout: 250  //Timeout before that the tooltip appear in ms
            });
        }
    }());


    /* ======= Print text ======= */
    (function(){
        $(".tt-recipe-wrapper .tt-print").on('click', function() {

            $(".tt-recipe-wrapper").print({
                globalStyles : false,
                mediaPrint : true,
                iframe : true,
                noPrintSelector : "button",
            });
        });
    }());


    /* ======= Social share popup window ======= */
    (function () {
        $('.post-share ul li a').on('click', function () {
            var newwindow = window.open($(this).attr('href'), '', 'height=450,width=700');
            if (window.focus) {
                newwindow.focus()
            }
            return false;
        });
    }());

});