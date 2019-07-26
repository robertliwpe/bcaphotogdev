(function ($) {
    "use strict";
    var count = 1;


    $(".site-content").fitVids();
    loadMoreArticleIndex();
    menuWidthHeightFix();
    setToltip();
	fixPullquoteClass();

//Placeholder show/hide
    $('input, textarea').on('focus', function () {
        $(this).data('placeholder', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    });
    $('input, textarea').on('blur', function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });

    $(".single-post .entry-info").stick_in_parent({offset_top: 64, parent: ".single-content-wrapper", spacer: ".sticky-spacer"});

//Fix for default menu
    $(".default-menu ul:first").addClass('sm sm-clean main-menu');


    $(window).on('load', function () {

        // Animate the elemnt if is allready visible on load
        animateElement();

//Set menu
        $('.main-menu').smartmenus({
            subMenusSubOffsetX: 1,
            subMenusSubOffsetY: -8,
            markCurrentItem: true
        });

        var $mainMenu = $('.main-menu').on('click', 'span.sub-arrow', function (e) {
            var obj = $mainMenu.data('smartmenus');
            if (obj.isCollapsible()) {
                var $item = $(this).parent(),
                        $sub = $item.parent().dataSM('sub');
                $sub.dataSM('arrowClicked', true);
            }
        }).bind({
            'beforeshow.smapi': function (e, menu) {
                var obj = $mainMenu.data('smartmenus');
                if (obj.isCollapsible()) {
                    var $menu = $(menu);
                    if (!$menu.dataSM('arrowClicked')) {
                        return false;
                    }
                    $menu.removeDataSM('arrowClicked');
                }
            }
        });

        //Blog show feature image
        showFirstBlogPostFeatureImge();
        showBlogPostFeatureImge();

        //Show-Hide header sidebar
        $('#toggle').on("click", multiClickFunctionStop);

        $('.site-content, #toggle').addClass('all-loaded');
        $('.doc-loader').fadeOut();
        $('body').removeClass('wait-preloader');
    });


    $(window).on('resize', function () {

        //Fix for blog item info
        $(".blog-item-holder.has-post-thumbnail").not('.gif').each(function () {
            $(this).find(".item-text").css("margin-top", 0 - $(this).find(".item-info").outerHeight());
        });

    });

    $(window).on('scroll', function () {
        animateElement();
    });




//------------------------------------------------------------------------
//Helper Methods -->
//------------------------------------------------------------------------

    function animateElement(e) {
        $(".animate").each(function (i) {
            var top_of_object = $(this).offset().top;
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if ((bottom_of_window - 70) > top_of_object) {
                $(this).addClass('show-it');
            }
        });
    }    

    function multiClickFunctionStop(e) {
        e.preventDefault();
        $('#toggle').off("click");
        $('#toggle').toggleClass("on");

        $('html, body, .sidebar, .menu-left-part, .menu-right-part, .site-content').toggleClass("open").delay(500).queue(function (next) {
            $(this).toggleClass("done");
            next();
        });
        $('#toggle').on("click", multiClickFunctionStop);
    }    

    function loadMoreArticleIndex() {
        if (parseInt(ajax_var.posts_per_page_index) < parseInt(ajax_var.total_index)) {
            $('.more-posts').css('visibility', 'visible');
            $('.more-posts').animate({opacity: 1}, 1500);
        } else {
            $('.more-posts').css('display', 'none');
        }

        $('.more-posts:visible').on('click', function () {
            $('.more-posts').css('display', 'none');
            $('.more-posts-loading').css('display', 'inline-block');
            count++;
            loadArticleIndex(count);
        });
    }

    function loadArticleIndex(pageNumber) {
        $.ajax({
            url: ajax_var.url,
            type: 'POST',
            data: "action=infinite_scroll_index&page_no_index=" + pageNumber + '&loop_file_index=loop-index&security='+ajax_var.nonce,
            success: function (html) {
                $('.blog-holder').imagesLoaded(function () {
                    $(".blog-holder .more-posts-index-holder").before(html);
                    setTimeout(function () {
                        animateElement();
                        showBlogPostFeatureImge();
                        if (count == ajax_var.num_pages_index)
                        {
                            $('.more-posts').css('display', 'none');
                            $('.more-posts-loading').css('display', 'none');
                            $('.no-more-posts').css('display', 'inline-block');
                        } else
                        {
                            $('.more-posts').css('display', 'inline-block');
                            $('.more-posts-loading').css('display', 'none');
                            $(".more-posts-index-holder").removeClass('stop-loading');
                        }
                    }, 100);
                });
            }
        });
        return false;
    }

    function showFirstBlogPostFeatureImge() {
        $(".blog-item-holder .entry-holder").first().addClass('active-post');
    }

    function showBlogPostFeatureImge() {
        $(".blog-item-holder .entry-holder").on('hover', function () {
            $(".blog-item-holder .entry-holder").removeClass('active-post');
            $(this).addClass('active-post');
        });
    }

    function menuWidthHeightFix() {
        if (!$(".menu-right-text").length)
        {
            $('#header-main-menu').addClass('no-right-text');
        }
        if (!$("#sidebar").length)
        {
            $('.menu-left-part').addClass('no-sidebar');
        }
    }

    function setToltip() {
        $(".tooltip").tipper({
            direction: "left",
            follow: true
        });
    }
	
	function fixPullquoteClass() {
		$("figure.wp-block-pullquote").find('blockquote').first().addClass('cocobasic-block-pullquote');
	}

    function is_touch_device() {
        return !!('ontouchstart' in window);
    }
})(jQuery);