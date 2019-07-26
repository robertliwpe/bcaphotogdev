'use strict';

/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(7);


/***/ }),

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/*!-----------------------------------------------------------------
  Name: Umbrella
  Purchase: https://themeforest.net/user/_nk/portfolio
  Support: https://nk.ticksy.com
  License: You must have a valid license purchased only from ThemeForest (the above link) in order to legally use the theme for your project.
  Copyright 2016.
-------------------------------------------------------------------*/
(function ($) {
    var $document = $(document);
    var $body = $('body');
    var pageBodyClass = $('body').attr('class');

    /*------------------------------------------------------------------
     Theme Options
     -------------------------------------------------------------------*/
    var options = {
        // mobile device width (need for slider to activate all categories)
        mobile: 991,

        // automatically show all categories on mobile devices
        sliderShowAllCategoriesOnMobile: true,

        // enable AJAX page loading
        ajax: true,

        events: {
            // before ajax loading click. Return true to prevent ajax loading
            onBeforeAjaxPageLoad: function onBeforeAjaxPageLoad(event) {
                var $target = $(event.currentTarget);
                var isCommentReply = $target.is('.comment-reply-link') || $target.is('#cancel-comment-reply-link');
                var isAdminMenu = event.currentTarget.href.indexOf('/wp-admin') !== -1;
                return isCommentReply || isAdminMenu;
            },

            // after ajax page loaded
            onAfterAjaxPageLoad: function onAfterAjaxPageLoad(data) {
                var $newPageHtml = $(data.$page_html);

                // update body class
                $body.removeClass(pageBodyClass);
                pageBodyClass = $newPageHtml.find('[data-ajax-body]').attr('class');
                $body.addClass(pageBodyClass);

                // update ajax info
                var $newAjaxDiv = $newPageHtml.find('.nk-blog-ajax-info');
                var $ajaxDiv = $('.nk-blog-ajax-info');
                if ($newAjaxDiv.length && $ajaxDiv.length) {
                    $ajaxDiv.attr('data-max-pages', $newAjaxDiv.attr('data-max-pages'));
                    $ajaxDiv.attr('data-start-page', $newAjaxDiv.attr('data-start-page'));
                    $ajaxDiv.attr('data-next-post', $newAjaxDiv.attr('data-next-post'));
                }

                // add addComment function from /wp-includes/js/comment-reply.min.js
                var thereIsComment = data.contentHTML.indexOf('class="comment-reply-link"') !== -1 || data.contentHTML.indexOf('id="cancel-comment-reply-link"') !== -1;
                if (thereIsComment && typeof window.addComment === 'undefined') {
                    /* eslint-disable */
                    window.addComment = {
                        moveForm: function moveForm(a, b, c, d) {
                            var e = void 0,
                                f = void 0,
                                g = void 0,
                                h = void 0,
                                i = this,
                                j = i.I(a),
                                k = i.I(c),
                                l = i.I('cancel-comment-reply-link'),
                                m = i.I('comment_parent'),
                                n = i.I('comment_post_ID'),
                                o = k.getElementsByTagName('form')[0];if (j && k && l && m && o) {
                                i.respondId = c, d = d || !1, i.I('wp-temp-form-div') || (e = document.createElement('div'), e.id = 'wp-temp-form-div', e.style.display = 'none', k.parentNode.insertBefore(e, k)), j.parentNode.insertBefore(k, j.nextSibling), n && d && (n.value = d), m.value = b, l.style.display = '', l.onclick = function () {
                                    var a = addComment,
                                        b = a.I('wp-temp-form-div'),
                                        c = a.I(a.respondId);if (b && c) return a.I('comment_parent').value = '0', b.parentNode.insertBefore(c, b), b.parentNode.removeChild(b), this.style.display = 'none', this.onclick = null, !1;
                                };try {
                                    for (var p = 0; p < o.elements.length; p++) {
                                        if (f = o.elements[p], h = !1, 'getComputedStyle' in window ? g = window.getComputedStyle(f) : document.documentElement.currentStyle && (g = f.currentStyle), (f.offsetWidth <= 0 && f.offsetHeight <= 0 || g.visibility === 'hidden') && (h = !0), f.type !== 'hidden' && !f.disabled && !h) {
                                            f.focus();break;
                                        }
                                    }
                                } catch (q) {}return !1;
                            }
                        },
                        I: function I(a) {
                            return document.getElementById(a);
                        }
                    };
                    /* eslint-enable */
                }

                // update antispam captcha
                if (typeof window.anti_spam_init !== 'undefined') {
                    setTimeout(function () {
                        window.anti_spam_init();
                    }, 100);
                }

                // fixed king composer styles loading
                var $kcStyles = $('style#kc-css-render');
                if (!$kcStyles.length) {
                    $kcStyles = $('<style id="kc-css-render">').appendTo('head');
                }
                var $newKcStyles = $newPageHtml.find('style#kc-css-render');
                $kcStyles.html($newKcStyles.length ? $newKcStyles.html() : '');

                // init king composer elements
                if (typeof window.kc_front !== 'undefined') {
                    window.kc_front.init();
                }

                // fix for contact form 7
                if (typeof $.fn.wpcf7InitForm !== 'undefined') {
                    setTimeout(function () {
                        $('div.wpcf7 > form').wpcf7InitForm();
                        $('form.wpcf7-form').each(function () {
                            $(this).find('img.ajax-loader').last().remove();
                        });
                    }, 100);
                }

                $document.trigger('umbrella-ajax-page-load', data);
            },

            // callback to load new posts in blog
            onLoadBlogPosts: function onLoadBlogPosts() {
                var callback = arguments.length <= 0 || arguments[0] === undefined ? function () {} : arguments[0];

                // get archive info
                var $info = $('.nk-blog .nk-blog-ajax-info');
                var info = {
                    maxPages: $info.attr('data-max-pages'),
                    startPage: $info.attr('data-start-page'),
                    nextPostUrl: $info.attr('data-next-post')
                };
                var result = [];

                // prevent loading if only 1 page
                if (info.maxPages === info.startPage) {
                    callback(result, true);
                    return;
                }

                $.ajax({
                    url: info.nextPostUrl,
                    success: function success(responseHtml) {
                        if (!responseHtml) {
                            callback(result, true);
                            return;
                        }

                        var $newHTML = $('<div>').html(responseHtml);
                        var $blog = $newHTML.find('.nk-blog');

                        // check for Umbrella layout
                        if (!$blog.length) {
                            callback(result, true);
                            return;
                        }

                        // prepare new posts array + update info block
                        var $newInfo = $blog.find('.nk-blog-ajax-info');
                        var newInfo = {
                            maxPages: $newInfo.attr('data-max-pages'),
                            startPage: $newInfo.attr('data-start-page'),
                            nextPostUrl: $newInfo.attr('data-next-post')
                        };
                        $blog.find('.nk-blog-item h2 a').each(function () {
                            result.push({
                                title: this.innerHTML,
                                url: this.href
                            });
                        });

                        if (parseInt(newInfo.startPage, 10) < parseInt(newInfo.maxPages, 10)) {
                            $info.attr('data-max-pages', newInfo.maxPages);
                            $info.attr('data-start-page', newInfo.startPage);
                            $info.attr('data-next-post', newInfo.nextPostUrl);
                            callback(result, false);
                        } else {
                            callback(result, true);
                        }

                        // remove stored data
                        $blog.remove();
                        $newHTML.remove();
                        $blog = null;
                        $newHTML = null;
                        $info = null;
                    },
                    error: function error(msg) {
                        // eslint-disable-next-line
                        console.log('error', msg);
                        callback(result, true);
                    }
                });
            }
        }
    };

    if (typeof window.Umbrella !== 'undefined') {
        window.Umbrella.setOptions(options);
        window.Umbrella.init();
    }
})(jQuery);

/***/ })

/******/ });