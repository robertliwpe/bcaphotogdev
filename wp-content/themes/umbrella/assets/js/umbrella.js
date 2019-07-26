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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/* eslint-disable */

/*!-----------------------------------------------------------------
    Name: Umbrella
    Support: https://nk.ticksy.com/
    License: You must have a valid license purchased only from ThemeForest (the above link) in order to legally use the theme for your project.
    Copyright 2019.
-------------------------------------------------------------------*/
/******/(function (modules) {
    // webpackBootstrap
    /******/ // The module cache
    /******/var installedModules = {};
    /******/
    /******/ // The require function
    /******/function __webpack_require__(moduleId) {
        /******/
        /******/ // Check if module is in cache
        /******/if (installedModules[moduleId]) {
            /******/return installedModules[moduleId].exports;
            /******/
        }
        /******/ // Create a new module (and put it into the cache)
        /******/var module = installedModules[moduleId] = {
            /******/i: moduleId,
            /******/l: false,
            /******/exports: {}
            /******/ };
        /******/
        /******/ // Execute the module function
        /******/modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ // Flag the module as loaded
        /******/module.l = true;
        /******/
        /******/ // Return the exports of the module
        /******/return module.exports;
        /******/
    }
    /******/
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/__webpack_require__.m = modules;
    /******/
    /******/ // expose the module cache
    /******/__webpack_require__.c = installedModules;
    /******/
    /******/ // define getter function for harmony exports
    /******/__webpack_require__.d = function (exports, name, getter) {
        /******/if (!__webpack_require__.o(exports, name)) {
            /******/Object.defineProperty(exports, name, {
                /******/configurable: false,
                /******/enumerable: true,
                /******/get: getter
                /******/ });
            /******/
        }
        /******/
    };
    /******/
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/__webpack_require__.n = function (module) {
        /******/var getter = module && module.__esModule ?
        /******/function getDefault() {
            return module['default'];
        } :
        /******/function getModuleExports() {
            return module;
        };
        /******/__webpack_require__.d(getter, 'a', getter);
        /******/return getter;
        /******/
    };
    /******/
    /******/ // Object.prototype.hasOwnProperty.call
    /******/__webpack_require__.o = function (object, property) {
        return Object.prototype.hasOwnProperty.call(object, property);
    };
    /******/
    /******/ // __webpack_public_path__
    /******/__webpack_require__.p = "";
    /******/
    /******/ // Load entry module and return exports
    /******/return __webpack_require__(__webpack_require__.s = 4);
    /******/
})(
/************************************************************************/
/******/[
/* 0 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    /*------------------------------------------------------------------
    
      Utility
    
    -------------------------------------------------------------------*/
    var $ = jQuery;
    var $wnd = $(window);
    var $doc = $(document);
    var $body = $('body');
    var tween = window.TweenMax;
    var isIOs = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    var isMobile = /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/g.test(navigator.userAgent || navigator.vendor || window.opera);
    var isFireFox = typeof InstallTrigger !== 'undefined';
    var isTouch = 'ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch;

    // check if current page have Umbrella layout
    function isUmbrellaLayout() {
        var $context = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : $doc;

        return $context.find('.nk-main, nk-layout, .nk-blog').length;
    }

    // add 'is-mobile' or 'is-desktop' classname to html tag
    $('html').addClass(isMobile ? 'is-mobile' : 'is-desktop');

    /**
     * window size
     */
    var wndW = 0;
    var wndH = 0;
    var docH = 0;
    function getWndSize() {
        exports.wndW = wndW = $wnd.width();
        exports.wndH = wndH = $wnd.height();
        exports.docH = docH = $doc.height();
    }
    getWndSize();
    $wnd.on('resize load orientationchange', getWndSize);

    /**
     * Debounce resize
     */
    var resizeArr = [];
    var resizeTimeout = void 0;
    $wnd.on('load resize orientationchange', function (e) {
        if (resizeArr.length) {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function () {
                for (var k = 0; k < resizeArr.length; k++) {
                    resizeArr[k](e);
                }
            }, 50);
        }
    });
    function debounceResize(func) {
        if (typeof func === 'function') {
            resizeArr.push(func);
            // in IE <= 11 this method is not supported
        } else if (typeof Event === 'function') {
            window.dispatchEvent(new Event('resize'));
        } else {
            var evt = window.document.createEvent('UIEvents');
            evt.initUIEvent('resize', true, false, window, 0);
            window.dispatchEvent(evt);
        }
    }

    /**
     * Throttle scroll
     * thanks: https://jsfiddle.net/mariusc23/s6mLJ/31/
     */
    var hideOnScrollList = [];
    var didScroll = void 0;
    var lastST = 0;

    $wnd.on('scroll load resize orientationchange', function () {
        if (hideOnScrollList.length) {
            didScroll = true;
        }
    });

    function hasScrolled() {
        var ST = $wnd.scrollTop();

        var type = ''; // [up, down, end, start]

        if (ST > lastST) {
            type = 'down';
        } else if (ST < lastST) {
            type = 'up';
        } else {
            type = 'none';
        }

        if (ST === 0) {
            type = 'start';
        } else if (ST >= docH - wndH) {
            type = 'end';
        }

        hideOnScrollList.forEach(function (value) {
            if (typeof value === 'function') {
                value(type, ST, lastST, $wnd);
            }
        });

        lastST = ST;
    }

    setInterval(function () {
        if (didScroll) {
            didScroll = false;
            window.requestAnimationFrame(hasScrolled);
        }
    }, 250);

    function throttleScroll(callback) {
        hideOnScrollList.push(callback);
    }

    /**
     * Body Overflow
     * Thanks https://jsfiddle.net/mariusc23/s6mLJ/31/
     * Usage:
     *    // enable
     *    bodyOverflow(1);
     *
     *    // disable
     *    bodyOverflow(0);
     */
    var bodyOverflowEnabled = void 0;
    var isBodyOverflowing = void 0;
    var scrollbarWidth = void 0;
    var originalBodyPadding = void 0;
    var $headerContent = $('.nk-header > *');
    function isBodyOverflowed() {
        return bodyOverflowEnabled;
    }
    function bodyGetScrollbarWidth() {
        // thx d.walsh
        var scrollDiv = document.createElement('div');
        scrollDiv.className = 'nk-body-scrollbar-measure';
        $body[0].appendChild(scrollDiv);
        var result = scrollDiv.offsetWidth - scrollDiv.clientWidth;
        $body[0].removeChild(scrollDiv);
        return result;
    }
    function bodyCheckScrollbar() {
        var fullWindowWidth = window.innerWidth;
        if (!fullWindowWidth) {
            // workaround for missing window.innerWidth in IE8
            var documentElementRect = document.documentElement.getBoundingClientRect();
            fullWindowWidth = documentElementRect.right - Math.abs(documentElementRect.left);
        }
        isBodyOverflowing = $body[0].clientWidth < fullWindowWidth;
        scrollbarWidth = bodyGetScrollbarWidth();
    }
    function bodySetScrollbar() {
        if (typeof originalBodyPadding === 'undefined') {
            originalBodyPadding = $body[0].style.paddingRight || '';
        }

        if (isBodyOverflowing) {
            $body.add($headerContent).css('paddingRight', scrollbarWidth + 'px');
        }
    }
    function bodyResetScrollbar() {
        $body.css('paddingRight', originalBodyPadding);
        $headerContent.css('paddingRight', '');
    }
    function bodyOverflow(enable) {
        if (enable && !bodyOverflowEnabled) {
            bodyOverflowEnabled = 1;
            bodyCheckScrollbar();
            bodySetScrollbar();
            $body.css('overflow', 'hidden');
        } else if (!enable && bodyOverflowEnabled) {
            bodyOverflowEnabled = 0;
            $body.css('overflow', '');
            bodyResetScrollbar();
        }
    }

    /**
     * In Viewport checker
     * return visible percent from 0 to 1
     */
    function isInViewport($item, returnRect) {
        var rect = $item[0].getBoundingClientRect();
        var result = 1;

        if (rect.right <= 0 || rect.left >= wndW) {
            result = 0;
        } else if (rect.bottom < 0 && rect.top <= wndH) {
            result = 0;
        } else {
            var beforeTopEnd = Math.max(0, rect.height + rect.top);
            var beforeBottomEnd = Math.max(0, rect.height - (rect.top + rect.height - wndH));
            var afterTop = Math.max(0, -rect.top);
            var beforeBottom = Math.max(0, rect.top + rect.height - wndH);
            if (rect.height < wndH) {
                result = 1 - (afterTop || beforeBottom) / rect.height;
            } else if (beforeTopEnd <= wndH) {
                result = beforeTopEnd / wndH;
            } else if (beforeBottomEnd <= wndH) {
                result = beforeBottomEnd / wndH;
            }
            result = result < 0 ? 0 : result;
        }
        if (returnRect) {
            return [result, rect];
        }
        return result;
    }

    /**
     * Scroll To
     */
    function scrollTo($to, callback) {
        var scrollPos = false;
        var speed = this.options.scrollToAnchorSpeed / 1000;

        if ($to === 'top') {
            scrollPos = 0;
        } else if ($to === 'bottom') {
            scrollPos = Math.max(0, docH - wndH);
        } else if (typeof $to === 'number') {
            scrollPos = $to;
        } else {
            scrollPos = $to.offset ? $to.offset().top : false;
        }

        if (scrollPos !== false && $wnd.scrollTop() !== scrollPos) {
            tween.to($wnd, speed, {
                scrollTo: {
                    y: scrollPos,
                    autoKill: true
                },
                ease: Power2.easeOut,
                autoKill: true,
                overwrite: 5
            });
            if (callback) {
                tween.delayedCall(speed, callback);
            }
        } else if (typeof callback === 'function') {
            callback();
        }
    }

    exports.$ = $;
    exports.tween = tween;
    exports.isUmbrellaLayout = isUmbrellaLayout;
    exports.isIOs = isIOs;
    exports.isMobile = isMobile;
    exports.isFireFox = isFireFox;
    exports.isTouch = isTouch;
    exports.$wnd = $wnd;
    exports.$doc = $doc;
    exports.$body = $body;
    exports.wndW = wndW;
    exports.wndH = wndH;
    exports.docH = docH;
    exports.debounceResize = debounceResize;
    exports.throttleScroll = throttleScroll;
    exports.bodyOverflow = bodyOverflow;
    exports.isBodyOverflowed = isBodyOverflowed;
    exports.isInViewport = isInViewport;
    exports.scrollTo = scrollTo;

    /***/
},
/* 1 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
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
            onBeforeAjaxPageLoad: function onBeforeAjaxPageLoad() {
                return false;
            },

            // after ajax page loaded
            onAfterAjaxPageLoad: function onAfterAjaxPageLoad() {},

            // callback to load new posts in blog
            onLoadBlogPosts: function onLoadBlogPosts() {
                var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

                // fake timeout to demonstrate loading
                setTimeout(function () {
                    // new posts will be appended to the current list
                    var newPosts = [{
                        title: 'Other designers are experimenting with backless blouses, cut-out crop tops, and spine-baring slips',
                        url: 'blog-article.html'
                    }, {
                        title: 'The style has long been considered to be the cotton anti-sexy of the underpinning world, with its noticeable seams and overtly full-coverage silhouette',
                        url: 'blog-article.html'
                    }, {
                        title: 'Or a little pantaloon, while maybe not sexy, can be really pretty and sweet',
                        url: 'blog-article.html'
                    }];

                    // if true, ajax loading will never run again
                    var noMorePosts = true;

                    callback(newPosts, noMorePosts);
                }, 1200);
            }
        }
    };

    exports.options = options;

    /***/
},,,
/* 2 */
/* 3 */
/* 4 */
/***/function (module, exports, __webpack_require__) {

    module.exports = __webpack_require__(5);

    /***/
},
/* 5 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    var _createClass = function () {
        function defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);
            }
        }return function (Constructor, protoProps, staticProps) {
            if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;
        };
    }();

    /* Plugins */

    var _options = __webpack_require__(1);

    var _utility = __webpack_require__(0);

    var _setOptions2 = __webpack_require__(6);

    var _updateBrightness2 = __webpack_require__(7);

    var _preloader = __webpack_require__(8);

    var _initPages2 = __webpack_require__(9);

    var _initPageTitles2 = __webpack_require__(10);

    var _initPageSlider2 = __webpack_require__(11);

    var _initPageContent = __webpack_require__(12);

    var _initBlog2 = __webpack_require__(13);

    var _initNavbar2 = __webpack_require__(14);

    var _initForms2 = __webpack_require__(15);

    var _initFormsMailChimp2 = __webpack_require__(16);

    var _initPluginFastClick2 = __webpack_require__(17);

    var _initPluginNano2 = __webpack_require__(18);

    var _initPluginTabs2 = __webpack_require__(19);

    var _initPluginOFI2 = __webpack_require__(20);

    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function");
        }
    }

    /*------------------------------------------------------------------
    
      UMBRELLA Class
    
    -------------------------------------------------------------------*/
    var UMBRELLA = function () {
        function UMBRELLA() {
            _classCallCheck(this, UMBRELLA);

            this.options = _options.options;
        }

        _createClass(UMBRELLA, [{
            key: 'init',
            value: function init() {
                var self = this;
                self.initPages();
                self.initPageTitles();
                self.initPageSlider();
                self.initPageSlidingContent();
                self.initNavbar();
                self.initBlog();
                self.initForms();
                self.initFormsMailChimp();

                // init plugins
                self.initPluginFastClick();
                self.initPluginNano();
                self.initPluginTabs();
                self.initPluginOFI();

                return self;
            }
        }, {
            key: 'setOptions',
            value: function setOptions(newOpts) {
                return _setOptions2.setOptions.call(this, newOpts);
            }
        }, {
            key: 'updateBrightness',
            value: function updateBrightness(func) {
                return _updateBrightness2.updateBrightness.call(this, func);
            }
        }, {
            key: 'debounceResize',
            value: function debounceResize(func) {
                return _utility.debounceResize.call(this, func);
            }
        }, {
            key: 'throttleScroll',
            value: function throttleScroll(callback) {
                return _utility.throttleScroll.call(this, callback);
            }
        }, {
            key: 'bodyOverflow',
            value: function bodyOverflow(type) {
                return _utility.bodyOverflow.call(this, type);
            }
        }, {
            key: 'isInViewport',
            value: function isInViewport($item, returnRect) {
                return _utility.isInViewport.call(this, $item, returnRect);
            }
        }, {
            key: 'scrollTo',
            value: function scrollTo($to, callback) {
                return _utility.scrollTo.call(this, $to, callback);
            }
        }, {
            key: 'runPreloader',
            value: function runPreloader(type) {
                return _preloader.runPreloader.call(this, type);
            }
        }, {
            key: 'stopPreloader',
            value: function stopPreloader(type) {
                return _preloader.stopPreloader.call(this, type);
            }
        }, {
            key: 'initPages',
            value: function initPages() {
                return _initPages2.initPages.call(this);
            }
        }, {
            key: 'initPageTitles',
            value: function initPageTitles() {
                return _initPageTitles2.initPageTitles.call(this);
            }
        }, {
            key: 'initPageSlider',
            value: function initPageSlider() {
                return _initPageSlider2.initPageSlider.call(this);
            }
        }, {
            key: 'initPageSlidingContent',
            value: function initPageSlidingContent() {
                return _initPageContent.initPageContent.call(this);
            }
        }, {
            key: 'initNavbar',
            value: function initNavbar() {
                return _initNavbar2.initNavbar.call(this);
            }
        }, {
            key: 'initBlog',
            value: function initBlog() {
                return _initBlog2.initBlog.call(this);
            }
        }, {
            key: 'initForms',
            value: function initForms() {
                return _initForms2.initForms.call(this);
            }
        }, {
            key: 'initFormsMailChimp',
            value: function initFormsMailChimp() {
                return _initFormsMailChimp2.initFormsMailChimp.call(this);
            }
        }, {
            key: 'initPluginFastClick',
            value: function initPluginFastClick() {
                return _initPluginFastClick2.initPluginFastClick.call(this);
            }
        }, {
            key: 'initPluginNano',
            value: function initPluginNano($context) {
                return _initPluginNano2.initPluginNano.call(this, $context);
            }
        }, {
            key: 'initPluginTabs',
            value: function initPluginTabs($context) {
                return _initPluginTabs2.initPluginTabs.call(this, $context);
            }
        }, {
            key: 'initPluginOFI',
            value: function initPluginOFI() {
                return _initPluginOFI2.initPluginOFI.call(this);
            }
        }]);

        return UMBRELLA;
    }();

    /*------------------------------------------------------------------
    
      Init Umbrella
    
    -------------------------------------------------------------------*/

    window.Umbrella = new UMBRELLA();

    /***/
},
/* 6 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.setOptions = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
      Set Custom Options
    
    -------------------------------------------------------------------*/
    function setOptions(newOpts) {
        var self = this;

        var optsEvents = _utility.$.extend({}, this.options.events, newOpts && newOpts.events || {});
        self.options = _utility.$.extend({}, self.options, newOpts);
        self.options.events = optsEvents;
    }

    exports.setOptions = setOptions;

    /***/
},
/* 7 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.updateBrightness = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Update Brightness
    
     -------------------------------------------------------------------*/
    var timeout = void 0;
    // eslint-disable-next-line
    var $targets = (0, _utility.$)('.nk-layout').find('.nk-layout-top-left, .nk-layout-top-left-rotated, .nk-layout-top-center, .nk-layout-top-right, .nk-layout-bottom-left, .nk-layout-bottom-right, .nk-layout-bottom-center, .nk-layout-content-subtitle, .nk-layout-content-tagline');
    var $logo = (0, _utility.$)('.nk-layout [data-logo-dark]');
    $logo.attr('data-logo-light', $logo.attr('src'));
    var imagesSelectors = '.nk-slider-current-slide, .nk-slider-current-slide img, .nk-navbar-bg, .nk-main-bg';

    if ((0, _utility.isUmbrellaLayout)()) {
        window.BackgroundCheck.init({
            // debug: true,
            targets: $targets.add($logo),
            images: imagesSelectors,
            minComplexity: 0,
            maxDuration: 1000,
            threshold: 60,
            classes: {
                dark: 'text-white',
                light: 'text-dark',
                complex: ''
            },
            callback: function callback(elem, result) {
                if (elem.nodeName === 'IMG' && $logo.is(elem)) {
                    if (result === 'dark') {
                        $logo.attr('src', $logo.attr('data-logo-light'));
                    } else {
                        $logo.attr('src', $logo.attr('data-logo-dark'));
                    }
                }
            }
        });
    }
    function updateBrightness() {
        var recheck = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

        if (!(0, _utility.isUmbrellaLayout)()) {
            return;
        }

        clearTimeout(timeout);

        // recheck
        if (recheck) {
            window.BackgroundCheck.set('images', imagesSelectors);
            return;
        }

        timeout = setTimeout(function () {
            if (typeof window.BackgroundCheck !== 'undefined') {
                window.BackgroundCheck.refresh();
            }
        }, 100);
    }

    exports.updateBrightness = updateBrightness;

    /***/
},
/* 8 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.stopPreloader = exports.runPreloader = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Run Preloader
     type = page, blog
    
     -------------------------------------------------------------------*/
    var $spinnerPlace = (0, _utility.$)('.nk-loading-spinner-place');
    var $preloader = (0, _utility.$)('<div class="nk-preloader">').appendTo(_utility.$body);
    var spinner = '<div class="nk-spinner"><span></span></div>';
    var blogSpinnerInSpinnerPlace = 0;

    function runPreloader() {
        var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'page';

        var self = this;

        // show overlay
        $preloader.show();

        // show blog spinner like normal ajax spinner on mobile devices
        blogSpinnerInSpinnerPlace = type === 'blog' && _utility.wndW <= self.options.mobile;

        if (type === 'blog' && !blogSpinnerInSpinnerPlace) {
            self.updateBlogPageIndicator(spinner);
        } else {
            $spinnerPlace.html(spinner);
        }
    }
    function stopPreloader() {
        var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'page';

        var self = this;

        // hide overlay
        $preloader.hide();

        if (type === 'blog' && !blogSpinnerInSpinnerPlace) {
            self.updateBlogPageIndicator();
        } else {
            $spinnerPlace.html('');
            blogSpinnerInSpinnerPlace = 0;
        }
    }

    exports.runPreloader = runPreloader;
    exports.stopPreloader = stopPreloader;

    /***/
},
/* 9 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPages = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Init AJAX Page Loading
    
     -------------------------------------------------------------------*/
    function initPages() {
        var self = this;
        var $layout = (0, _utility.$)('.nk-layout:eq(0)');
        var $main = (0, _utility.$)('.nk-main');
        var $blog = (0, _utility.$)('.nk-blog');
        var $mainBg = $main.next('.nk-main-bg');

        // current page data (with dynamic changed titles). Available data see in generatePageData function
        var cur = {};

        // default page data (current loaded page data without dynamic changes). Available data see in generatePageData function
        var def = {};

        // set default page data
        self.setDefaultPageData = function () {
            var newDef = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

            def = _utility.$.extend(def, newDef);
        };

        // get default page data
        self.getDefaultPageData = function () {
            return _utility.$.extend(true, {}, def);
        };

        // set current page data
        self.setCurrentPageData = function () {
            var newCur = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

            cur = _utility.$.extend(cur, newCur);
        };

        // get current page data
        self.getCurrentPageData = function () {
            return _utility.$.extend(true, {}, cur);
        };

        // generate page data from dom
        self.generatePageData = function ($href, $page) {
            if (!$href) {
                $href = window.location.href;
            }
            if (!$page) {
                $page = (0, _utility.$)('html').prop('outerHTML');
                $page = $page.replace('<body', '<div data-ajax-body').replace('</body>', '</div>');
                $page = (0, _utility.$)('<div>').html($page);
            }

            var $newLayout = $page.find('.nk-layout:eq(0)');
            var $newMain = $page.find('.nk-main:eq(0)');
            var $newBlog = $page.find('.nk-blog:eq(0)');
            var $slider = $newLayout.find('.nk-slider');
            var $sliderNav = $page.find('.nk-slider-nav');

            return {
                $page_html: $page.prop('outerHTML') || $page.prop('innerHTML'),

                href: $href,
                title: $page.find('title:eq(0)').text() || document.title,
                pageTitle: $newLayout.find('.nk-layout-content-title').html(),
                pageSubtitle: $newLayout.find('.nk-layout-content-subtitle').html(),
                pageTagline: $newLayout.find('.nk-layout-content-tagline').html(),

                slider: $slider,
                sliderCategory: $slider.attr('data-active-category'),
                sliderTransitionSpeed: $slider.attr('data-transition-speed'),
                sliderTransitionEffect: $slider.attr('data-transition-effect'),
                sliderCategoryTransitionSpeed: $slider.attr('data-category-transition-speed'),
                sliderCategoryTransitionEffect: $slider.attr('data-category-transition-effect'),
                sliderAutoplay: $slider.attr('data-autoplay'),
                sliderForceReload: $slider.attr('data-force-reload'),
                sliderHideTitles: $slider.hasClass('nk-slider-hide-titles'),
                sliderNavSlim: $sliderNav.hasClass('nk-slider-nav-slim'),

                navTopCenterShow: !$newLayout.find('.nk-layout-top-center .nk-nav-hide').length,
                navTopLeftShow: !$newLayout.find('.nk-layout-top-left-rotated .nk-nav-hide').length,
                navBottomLeftShow: !$newLayout.find('.nk-layout-bottom-left .nk-nav-hide').length,
                navBottomLeftBlogShow: !$newLayout.find('.nk-layout-bottom-left-blog .nk-nav-hide').length,
                navBottomCenterShow: !$newLayout.find('.nk-layout-bottom-center .nk-nav-hide').length,

                contentHTML: $newMain.html(),
                contentShow: $newMain.hasClass('active'),
                contentLowerTitle: $newMain.hasClass('nk-main-lower-title'),
                contentTransitionIn: $newMain.attr('data-transition-in'),
                contentTransitionOut: $newMain.attr('data-transition-out'),
                contentCustomColor: $newMain.attr('data-color') || false,
                contentCustomBg: $newMain.next('.nk-main-bg').attr('data-bg') || false,
                contentCustomBgMobile: $newMain.next('.nk-main-bg').attr('data-bg-mobile') || false,

                blog: $newBlog,
                blogShow: $newBlog.hasClass('active')
            };
        };

        // show / hide blog
        function toggleBlog() {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (def.blogShow && !cur.blogShow) {
                $blog.addClass('active');

                var posts = [];
                def.blog.find('> .nk-blog-item a').each(function () {
                    posts.push({
                        title: (0, _utility.$)(this).text(),
                        url: (0, _utility.$)(this).attr('href')
                    });
                });

                self.pushNewPosts(posts, true);
                self.showBlogPostsList(callback);
            } else if (cur.blogShow && !def.blogShow) {
                $blog.removeClass('active');
                self.hideBlogPostsList(callback);

                // regenerate slider navigation
                self.sliderCreateNavigation(function () {
                    self.sliderActivateNavigationItem(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
                });
            } else {
                callback();
            }
        }

        // update content text and background colors
        var contentColorsStyles = false;
        function updateContentColors() {
            if (!contentColorsStyles) {
                contentColorsStyles = document.createElement('style');
                contentColorsStyles.setAttribute('type', 'text/css');
                contentColorsStyles.setAttribute('id', '#umbrella-content-styles');
                var head = document.head || document.getElementsByTagName('head')[0];
                head.appendChild(contentColorsStyles);
            }

            var styles = [];

            if (def.contentCustomColor) {
                styles.push('.nk-main {', '   color: ' + def.contentCustomColor + ';', '}');
            }
            if (def.contentCustomBg) {
                styles.push('.nk-main + .nk-main-bg {', '   background-color: ' + def.contentCustomBg + ';', '}');
            }
            if (def.contentCustomBgMobile) {
                styles.push('@media (max-width: ' + self.options.mobile + 'px) {', '.nk-main + .nk-main-bg {', '   background-color: ' + def.contentCustomBgMobile + ';', '}', '}');
            }

            styles = styles.join('\n');

            // add clip styles inline (this method need for support IE8 and less browsers)
            if (contentColorsStyles.styleSheet) {
                contentColorsStyles.styleSheet.cssText = styles;
            } else {
                contentColorsStyles.innerHTML = styles;
            }
        }

        // update content text
        function updateContent() {
            var animate = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

            var $content = (0, _utility.$)(def.contentHTML);
            var $mainNano = $main.find('.nano-content');
            var $mainLayout = $main.find('.nk-layout');

            // animate
            if (animate) {
                // hide layout title
                _utility.tween.to($mainLayout, 0.3, {
                    opacity: 0,
                    onComplete: function onComplete() {
                        $mainLayout.html($content.filter('.nk-layout').html());
                        _utility.tween.to($mainLayout, 0.3, {
                            opacity: 1
                        });
                    }
                });

                // hide content
                _utility.tween.to($mainNano, 0.3, {
                    opacity: 0,
                    force3D: true,
                    onComplete: function onComplete() {
                        $mainNano.html($content.find('.nano-content').html());
                        $main[(def.contentLowerTitle ? 'add' : 'remove') + 'Class']('nk-main-lower-title');

                        updateContentColors();
                        self.initForms();

                        // show content
                        _utility.tween.to($mainNano, 0.3, {
                            opacity: 1,
                            force3D: true,
                            onComplete: function onComplete() {
                                $content.remove();
                                $content = null;
                                $mainNano = null;
                                $mainLayout = null;
                                (0, _utility.debounceResize)();
                            }
                        });
                    }
                });

                // no animate
            } else {
                $mainNano.html($content.find('.nano-content').html());
                $mainLayout.html($content.filter('.nk-layout').html());
                $main[(def.contentLowerTitle ? 'add' : 'remove') + 'Class']('nk-main-lower-title');

                updateContentColors();
                self.initForms();

                $content.remove();
                $content = null;
                $mainNano = null;
                $mainLayout = null;
                (0, _utility.debounceResize)();
            }
        }

        // show / hide content
        function toggleContent() {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            $main.attr('data-transition-in', def.contentTransitionIn);
            $main.attr('data-transition-out', def.contentTransitionOut);

            // show new content
            if (def.contentShow && def.contentHTML !== cur.contentHTML) {
                // hide old container and show new
                if (def.contentLowerTitle !== cur.contentLowerTitle) {
                    self.hideContent(function () {
                        // remove transition from background
                        $mainBg.css('transition', 'none');

                        // update content
                        updateContent();

                        // restore transition
                        $mainBg.css('transition', '');

                        // show new content
                        self.showContent(callback);
                    });

                    // only hide and show content inside container
                } else if (cur.contentShow === def.contentShow) {
                    // hide navbar
                    self.hideNavbar();

                    updateContent(true);
                    self.updateBrightness();

                    callback();

                    // update content and show container
                } else if (def.contentShow) {
                    updateContent();
                    self.showContent(callback);
                }
            } else {
                // hide content
                self.hideContent(function () {
                    updateContent();

                    // hide navbar
                    self.hideNavbar();

                    callback();
                });
            }
        }

        // activate / deactivate menu items
        function updateMenuItems() {
            (0, _utility.$)('.nk-nav ul:not(.nk-slider-categories) > li > a').each(function () {
                var $li = (0, _utility.$)(this).parent('li');
                if (this.href === def.href) {
                    $li.addClass('active');
                } else {
                    $li.removeClass('active');
                }
            });
        }

        // check if currently in page loading queue
        var pageLoading = false;
        self.isInPageLoadQueue = function () {
            return pageLoading;
        };

        // show default page data
        self.showDefaultPageData = function () {
            var effect = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'right';

            // update items when new href
            if (cur.href === def.href) {
                return;
            }

            pageLoading = true;

            // regenerate slider
            self.sliderRegenerate({
                slider: def.slider,
                activeCategory: def.sliderCategory,
                transitionSpeed: def.sliderTransitionSpeed,
                transitionEffect: def.sliderTransitionEffect,
                categoryTransitionSpeed: def.sliderCategoryTransitionSpeed,
                categoryTransitionEffect: def.sliderCategoryTransitionEffect,
                autoplay: def.sliderAutoplay,
                forceReload: def.sliderForceReload,
                hideTitles: def.sliderHideTitles
            }, function () {
                // change slider navigation style
                (0, _utility.$)('.nk-slider-nav')[(def.sliderNavSlim ? 'add' : 'remove') + 'Class']('nk-slider-nav-slim');
            });
            if (def.blogShow || cur.blogShow) {
                // change slider navigation style
                (0, _utility.$)('.nk-slider-nav')[(def.sliderNavSlim ? 'add' : 'remove') + 'Class']('nk-slider-nav-slim');
            }

            // show / hide navigations
            $layout.find('.nk-layout-top-center .nk-nav')[(def.navTopCenterShow ? 'remove' : 'add') + 'Class']('nk-nav-hide');
            $layout.find('.nk-layout-top-left-rotated .nk-nav')[(def.navTopLeftShow ? 'remove' : 'add') + 'Class']('nk-nav-hide');
            $layout.find('.nk-layout-bottom-left .nk-nav')[(def.navBottomLeftShow ? 'remove' : 'add') + 'Class']('nk-nav-hide');
            $layout.find('.nk-layout-bottom-left-blog .nk-nav')[(def.navBottomLeftBlogShow ? 'remove' : 'add') + 'Class']('nk-nav-hide');
            $layout.find('.nk-layout-bottom-center .nk-nav')[(def.navBottomCenterShow ? 'remove' : 'add') + 'Class']('nk-nav-hide');

            // show blog
            if (def.blogShow && !cur.blogShow) {
                toggleContent(function () {
                    // show layout titles
                    self.showTitle(def.pageTitle, effect);
                    self.showSubtitle(def.pageSubtitle);
                    self.showTagline(def.pageTagline);

                    toggleBlog();

                    self.updateBrightness(true);

                    updateMenuItems();
                    self.setCurrentPageData(self.getDefaultPageData());

                    pageLoading = false;
                });

                // hide blog
            } else {
                toggleBlog(function () {
                    // show layout titles
                    self.showTitle(def.pageTitle, effect);
                    self.showSubtitle(def.pageSubtitle);
                    self.showTagline(def.pageTagline);

                    toggleContent(function () {
                        self.updateBrightness(true);
                        updateMenuItems();
                        self.setCurrentPageData(self.getDefaultPageData());
                        pageLoading = false;
                    });
                });
            }
        };

        /**
         * AJAX Page Loading
         */
        var xhr = {};

        // Return the `href` component of given URL object with the hash portion removed.
        function stripHash(href) {
            return href.replace(/#.*/, '');
        }

        // cache pages
        var cache = {};
        function setCache() {
            var key = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
            var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

            if (!key || !data || cache[key]) {
                return;
            }
            cache[key] = data;
        }
        function getCache() {
            var key = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

            if (!key || !cache[key]) {
                return false;
            }
            return cache[key];
        }

        // render new page from cache
        function renderNewPageFromCache(data) {
            // store data
            self.setDefaultPageData(data);

            // show new data
            self.showDefaultPageData();

            // callback
            if (typeof self.options.events.onAfterAjaxPageLoad !== 'undefined') {
                self.options.events.onAfterAjaxPageLoad(self.getDefaultPageData());
            }
        }

        // parse and render new page content
        function renderNewPage() {
            var href = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
            var $newHTML = arguments[1];

            // store data
            self.setDefaultPageData(self.generatePageData(href, $newHTML));

            // save page cache
            setCache(href, self.getDefaultPageData());

            // show new data
            self.showDefaultPageData();

            // callback
            if (typeof self.options.events.onAfterAjaxPageLoad !== 'undefined') {
                self.options.events.onAfterAjaxPageLoad(self.getDefaultPageData());
            }
        }

        // load new page
        function loadPage() {
            var href = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
            var clicked = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

            var currentPageData = self.getDefaultPageData();

            // stop when the same urls
            if (!href || stripHash(href) === stripHash(currentPageData.href)) {
                return;
            }

            // return cached version
            var cached = getCache(href);
            if (cached) {
                renderNewPageFromCache(cached);

                // push state for new page
                if (clicked && typeof History !== 'undefined' && self.options.ajax) {
                    History.pushState(null, cached.title, href);
                }
                return;
            }

            // stop previous request
            if (xhr && xhr.abort) {
                xhr.abort();
                xhr = {};
            }

            // new ajax request
            self.runPreloader();
            xhr = _utility.$.ajax({
                url: href,
                success: function success(responseHtml) {
                    if (!responseHtml) {
                        window.location = href;
                        return;
                    }

                    // change <body> tag to <div> with `data-ajax-body` attribute
                    responseHtml = responseHtml.replace('<body', '<div data-ajax-body').replace('</body>', '</div>');

                    var $newHTML = (0, _utility.$)('<div>').html(responseHtml);
                    var title = $newHTML.find('title:eq(0)').text() || document.title;

                    // check for Umbrella layout
                    if (!(0, _utility.isUmbrellaLayout)($newHTML)) {
                        window.location = href;
                        return;
                    }

                    // render new content
                    renderNewPage(href, $newHTML);

                    // push state for new page
                    if (typeof History !== 'undefined' && self.options.ajax) {
                        History.pushState(null, title, href);
                    }

                    // remove stored data
                    $newHTML.remove();
                    $newHTML = null;

                    self.stopPreloader();
                },
                error: function error(msg) {
                    if (msg.status !== 0) {
                        console.log('error', msg);
                    } else {
                        window.location = href;
                    }

                    self.stopPreloader();
                }
            });
        }

        // first run
        self.setDefaultPageData(self.generatePageData());
        self.setCurrentPageData(self.getDefaultPageData());
        setCache(cur.href, self.getCurrentPageData());

        // update content colors
        $mainBg.css('transition', 'none');
        updateContentColors();
        $mainBg.css('transition', '');

        if (!(0, _utility.isUmbrellaLayout)()) {
            return;
        }

        // click on links
        _utility.$doc.on('click', 'a:not(.no-ajax):not([target="_blank"]):not([href^="#"]):not([href^="mailto"]):not([href^="javascript:"])', function (e) {
            var link = e.currentTarget;

            // Stop if AJAX is not supported
            if (!self.options.ajax) {
                return;
            }

            // Middle click, cmd click, and ctrl click should open
            // links in a new tab as normal.
            if (e.which > 1 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) {
                return;
            }

            // Ignore cross origin links
            if (window.location.protocol !== link.protocol || window.location.hostname !== link.hostname) {
                return;
            }

            // Ignore case when a hash is being tacked on the current URL
            var currentPageData = self.getDefaultPageData();
            if (link.href.indexOf('#') > -1 && stripHash(link.href) === stripHash(currentPageData.href)) {
                return;
            }

            // Ignore if local file protocol
            if (window.location.protocol === 'file:') {
                return;
            }

            // Ignore e with default prevented
            if (e.isDefaultPrevented()) {
                return;
            }

            // Check for function in options
            if (typeof self.options.events.onBeforeAjaxPageLoad !== 'undefined' && self.options.events.onBeforeAjaxPageLoad(e)) {
                return;
            }

            e.preventDefault();

            loadPage(link.href, true);
        });

        // on state change
        if (typeof History !== 'undefined' && self.options.ajax) {
            History.Adapter.bind(window, 'statechange', function () {
                loadPage(History.getState().url);
                History.replaceState(null, document.title, History.getState().url);
            });
        }
    }

    exports.initPages = initPages;

    /***/
},
/* 10 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPageTitles = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Init Pages Titles
    
     -------------------------------------------------------------------*/
    function initPageTitles() {
        var self = this;
        var $layout = (0, _utility.$)('.nk-layout:eq(0)');
        var $title = $layout.find('.nk-layout-content-title');
        var $subtitle = $layout.find('.nk-layout-content-subtitle');
        var $tagline = $layout.find('.nk-layout-content-tagline');

        // create shadow items for transitions
        var $titleShadow = (0, _utility.$)('<h4>').css('display', 'none').addClass('nk-layout-content-title').insertAfter($title);
        var $subtitleShadow = (0, _utility.$)('<h4>').css('display', 'none').addClass('nk-layout-content-subtitle').insertAfter($subtitle);
        var $taglineShadow = (0, _utility.$)('<div>').css('display', 'none').addClass('nk-layout-content-tagline').insertAfter($tagline);

        // show title
        // effects: left, right, fade
        self.showTitle = function () {
            var title = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';
            var effect = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'right';

            var cur = self.getCurrentPageData();

            // prevent transition if the same title
            if (cur.pageTitle === title) {
                return;
            }

            var shadowX = '0%';
            var X = '0%';
            var startOpacity = effect === 'fade' ? 0 : 1;

            if (effect === 'left') {
                shadowX = '150%';
            } else if (effect === 'right') {
                shadowX = '-150%';
            }

            if (effect === 'left') {
                X = '-150%';
            } else if (effect === 'right') {
                X = '150%';
            }

            cur.pageTitle = title;

            // add new title
            $titleShadow.html(title);

            // transition
            _utility.tween.set($titleShadow, {
                x: shadowX,
                opacity: startOpacity,
                display: 'block'
            });
            _utility.tween.to($title, 0.7, {
                x: X,
                opacity: startOpacity,
                ease: Power2.easeIn,
                force3D: true
            });
            _utility.tween.to($titleShadow, 0.7, {
                x: '0%',
                opacity: 1,
                ease: Power2.easeOut,
                delay: 0.3,
                force3D: true,
                onComplete: function onComplete() {
                    // restore titles after effect end
                    $title.html(title);
                    _utility.tween.set($title, {
                        x: '0%',
                        opacity: 1,
                        display: 'block'
                    });
                    $titleShadow.html('').css('display', 'none');
                }
            });
        };

        // show subtitle
        self.showSubtitle = function () {
            var subtitle = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';

            var cur = self.getCurrentPageData;

            // prevent transition if the same subtitle
            if (cur.pageSubtitle === subtitle) {
                return;
            }

            cur.pageSubtitle = subtitle;

            // add new title
            $subtitleShadow.html(subtitle);

            // transition
            _utility.tween.set($subtitleShadow, {
                opacity: 0,
                display: 'block'
            });
            _utility.tween.to($subtitle, 0.5, {
                opacity: 0,
                ease: window.Power0.easeNone,
                delay: 0.3,
                force3D: true
            });
            _utility.tween.to($subtitleShadow, 0.5, {
                opacity: 1,
                ease: window.Power0.easeNone,
                delay: 0.3,
                force3D: true,
                onComplete: function onComplete() {
                    // restore titles after effect end
                    $subtitle.html(subtitle);
                    _utility.tween.set($subtitle, {
                        opacity: 1,
                        display: 'block'
                    });
                    $subtitleShadow.html('').css('display', 'none');
                }
            });
        };

        // show tagline
        self.showTagline = function () {
            var tagline = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';

            var cur = self.getCurrentPageData;

            // prevent transition if the same tagline
            if (cur.pageTagline === tagline || !$tagline.is(':visible')) {
                return;
            }

            cur.pageTagline = tagline;

            // add new title
            $taglineShadow.html(tagline);

            // transition
            _utility.tween.set($taglineShadow, {
                opacity: 0,
                display: 'block'
            });
            _utility.tween.to($tagline, 0.5, {
                opacity: 0,
                ease: window.Power0.easeNone,
                delay: 0.3,
                force3D: true
            });
            _utility.tween.to($taglineShadow, 0.5, {
                opacity: 1,
                ease: window.Power0.easeNone,
                delay: 0.3,
                force3D: true,
                onComplete: function onComplete() {
                    // restore titles after effect end
                    $tagline.html(tagline);
                    _utility.tween.set($tagline, {
                        opacity: 1
                    });
                    $taglineShadow.html('').css('display', 'none');
                }
            });
        };
    }

    exports.initPageTitles = initPageTitles;

    /***/
},
/* 11 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPageSlider = undefined;

    var _utility = __webpack_require__(0);

    /* Init Page Slider */
    function initPageSlider() {
        var $slider = (0, _utility.$)('.nk-slider');
        var self = this;

        if (!$slider.length) {
            return;
        }

        // options
        var transitionEffect = $slider.attr('data-transition-effect') || 'fade';
        var transitionSpeed = parseInt($slider.attr('data-transition-speed'), 10) || 600;
        var categoryTransitionEffect = $slider.attr('data-category-transition-effect') || 'top';
        var categoryTransitionSpeed = parseInt($slider.attr('data-category-transition-speed'), 10) || 600;
        var autoplay = parseInt($slider.attr('data-autoplay'), 10) || 0;
        if (autoplay && transitionSpeed >= autoplay) {
            autoplay = transitionSpeed + 100;
        }
        var hideTitles = $slider.hasClass('nk-slider-hide-titles');
        var activeCategory = $slider.attr('data-active-category') || '*';
        var activeCatOnBigScreens = activeCategory;

        var $sliderNav = (0, _utility.$)('.nk-slider-nav');
        var $sliderNavItemsCont = $sliderNav.children('ul');
        var $sliderCategories = (0, _utility.$)('.nk-slider-categories');
        var $sliderSlide = (0, _utility.$)('<div class="nk-slider-current-slide"></div>').css({
            position: 'absolute',
            top: 0,
            left: 0,
            right: 0,
            bottom: 0
        }).appendTo($slider);

        // prepare img tags
        $sliderSlide.append('<img />');

        var $sliderNextSlide = $sliderSlide.clone().removeClass('nk-slider-current-slide').addClass('nk-slider-next-slide').css({
            display: 'none',
            opacity: 0,
            zIndex: 1
        }).appendTo($slider);
        // additional blocks for divide slider transition
        var $sliderNextSlide2 = $sliderNextSlide.clone().css({
            display: 'block',
            opacity: 1
        }).removeClass('nk-slider-next-slide').appendTo($sliderNextSlide);
        var $sliderNextSlide2Inner = $sliderNextSlide2.clone().appendTo($sliderNextSlide2);
        var $sliderNextSlide3 = $sliderNextSlide2.clone().appendTo($sliderNextSlide);
        var $sliderNextSlide3Inner = $sliderNextSlide3.children('div');
        var $sliderVideoSlide = (0, _utility.$)('<div>').css('position', 'relative');
        (0, _utility.$)('<div class="nk-slider-video-slide"></div>').css({
            position: 'absolute',
            top: 0,
            left: 0,
            right: 0,
            bottom: 0,
            zIndex: 2
        }).append($sliderVideoSlide).appendTo($slider);
        var slides = [];
        var busy = 0;

        $sliderNextSlide.append('<img />');
        $sliderNextSlide2Inner.append('<img />');
        $sliderNextSlide3Inner.append('<img />');

        // parse slides
        self.sliderParseSlides = function () {
            var $instance = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : $slider;

            var newSlides = [];
            var i = 0;
            $instance.find('.nk-slider-item').each(function () {
                var $img = (0, _utility.$)(this).find('img').css({
                    'object-position': (0, _utility.$)(this).attr('data-background-position') || '50% 50%'
                });

                newSlides.push({
                    index: i++,
                    active: (0, _utility.$)(this).hasClass('active'),
                    $img: $img,
                    src: $img.attr('data-src') || $img.attr('src'),
                    categories: ((0, _utility.$)(this).attr('data-categories') || '').split('|'),
                    videoBackground: (0, _utility.$)(this).find('[data-bg-video]').attr('data-bg-video'),
                    videoBackgroundSize: (0, _utility.$)(this).find('[data-bg-video-size]').attr('data-bg-video-size') || '16x9'
                });
            });
            return newSlides;
        };

        // get available slides
        self.sliderGetSlides = function () {
            var specificCat = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : activeCategory;

            var result = [];

            Object.keys(slides).forEach(function (k) {
                var item = slides[k];
                if (item.categories && item.categories.length) {
                    Object.keys(item.categories).forEach(function (i) {
                        var cat = item.categories[i];
                        if (cat === specificCat || cat === '*' || specificCat === '*') {
                            result.push(item);
                        }
                    });
                }
            });

            return result;
        };

        // get current slide
        self.sliderGetCurrentSlide = function () {
            var currentSlides = self.sliderGetSlides();
            var returnData = false;

            Object.keys(currentSlides).forEach(function (k) {
                var item = currentSlides[k];
                if (!returnData && item.active) {
                    returnData = item;
                }
            });

            if (returnData) {
                return returnData;
            }

            // if there is no active slide, return first
            if (currentSlides[0]) {
                currentSlides[0].active = true;
                return currentSlides[0];
            }

            return false;
        };

        // get slide index in current activated category
        self.sliderGetSlideRealIndex = function (checkSlide) {
            var i = 0;
            var currentSlides = self.sliderGetSlides();
            var returnData = 0;

            Object.keys(currentSlides).forEach(function (k) {
                var item = currentSlides[k];
                if (!returnData && item.index === checkSlide.index) {
                    returnData = i;
                }
                i++;
            });

            return returnData;
        };

        self.sliderActivateCategory = function (name) {
            if (busy) {
                return;
            }

            activeCatOnBigScreens = name;
            if (self.options.sliderShowAllCategoriesOnMobile && _utility.wndW <= self.options.mobile) {
                activeCategory = '*';
            } else {
                activeCategory = name;
            }

            // activate current category
            $sliderCategories.find('.active').removeClass('active');
            $sliderCategories.find('[data-category="' + activeCategory + '"]').addClass('active');
        };

        // create categories
        self.sliderCreateCategories = function () {
            var allSlides = self.sliderGetSlides('*');

            // categories
            var catNav = '';
            var categories = {};

            Object.keys(allSlides).forEach(function (k) {
                var slide = allSlides[k];
                Object.keys(slide.categories).forEach(function (i) {
                    var cat = slide.categories[i];
                    if (!categories[cat] && cat !== '*') {
                        categories[cat] = 1;
                        catNav += '<li data-category="' + cat + '"><a href="javascript:void(0)">' + cat + '</a></li>';
                    }
                });
            });

            $sliderCategories.html(catNav);
        };

        // prepare slider structure
        self.sliderCreateNavigation = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (self.getDefaultPageData().blogShow) {
                return;
            }

            var newSlides = self.sliderGetSlides();

            // navigation
            var nav = '';

            Object.keys(newSlides).forEach(function (k) {
                nav += '<li data-slide="' + k + '">' + (k >= 9 ? '' : '0') + (parseInt(k, 10) + 1) + '</li>';
            });

            // transition if there are nav items
            _utility.tween.to($sliderNavItemsCont, 0.3, {
                display: 'none',
                opacity: 0,
                force3D: true,
                onComplete: function onComplete() {
                    $sliderNavItemsCont.html(nav);
                    _utility.tween.to($sliderNavItemsCont, 0.3, {
                        display: 'block',
                        opacity: 1,
                        force3D: true
                    });
                    callback();
                }
            });
        };

        // activate item in navigation
        self.sliderActivateNavigationItem = function (index) {
            if (self.getDefaultPageData().blogShow) {
                return;
            }
            $sliderNavItemsCont.find('.active').removeClass('active');
            $sliderNavItemsCont.find('li:eq(' + index + ')').addClass('active');
        };

        // correct video background size and position
        var curVideoSize = '16x9';
        self.sliderCorrectVideo = function () {
            // video size
            var vW = parseFloat(curVideoSize.split('x')[0]);
            var vH = parseFloat(curVideoSize.split('x')[1]);

            var styles = {};

            if (_utility.wndW / vW > _utility.wndH / vH) {
                styles = {
                    width: _utility.wndW,
                    height: vH * _utility.wndW / vW,
                    marginTop: (_utility.wndH - vH * _utility.wndW / vW) / 2,
                    marginLeft: 0
                };
            } else {
                styles = {
                    width: vW * _utility.wndH / vH,
                    height: _utility.wndH,
                    marginTop: 0,
                    marginLeft: (_utility.wndW - vW * _utility.wndH / vH) / 2
                };
            }

            // hide progress bar
            styles.marginTop -= 220;
            styles.height += 440;

            $sliderVideoSlide.css(styles);
        };
        (0, _utility.debounceResize)(function () {
            self.sliderCorrectVideo();
        });

        // run video background
        self.sliderPlayVideo = function () {
            var slide = self.sliderGetCurrentSlide();
            var videoSrc = slide.videoBackground;
            var videoSize = slide.videoBackgroundSize;

            if (!videoSrc || typeof VideoWorker === 'undefined') {
                return;
            }

            var video = new VideoWorker(videoSrc, {
                autoplay: true,
                loop: true,
                volume: 0,
                mute: true
            });

            if (video.isValid()) {
                curVideoSize = videoSize;

                self.sliderCorrectVideo();

                video.on('started', function () {
                    _utility.tween.set(this.$video, {
                        left: 0
                    });
                    _utility.tween.to(this.$video, 0.5, {
                        display: 'block',
                        opacity: 1,
                        force3D: true
                    });
                    self.sliderCorrectVideo();
                });

                video.getIframe(function (iframe) {
                    var $iframe = (0, _utility.$)(iframe);
                    var $parent = $iframe.parent();

                    $sliderVideoSlide.append($iframe);

                    // remove parent iframe element (created by VideoWorker)
                    $parent.remove();

                    self.sliderCorrectVideo();
                });
            }
        };

        // stop video background
        self.sliderStopVideo = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            // hide old video
            var $videoParent = $sliderVideoSlide.children();
            if ($videoParent.length) {
                _utility.tween.to($videoParent, 0.5, {
                    display: 'none',
                    opacity: 0,
                    force3D: true,
                    onComplete: function onComplete() {
                        $videoParent.remove();
                        callback();
                    }
                });
            } else {
                callback();
            }
        };

        // run autoplay
        var autoplayInterval = void 0;
        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }
        function runAutoplay() {
            stopAutoplay();
            autoplayInterval = setInterval(function () {
                window.requestAnimationFrame(self.sliderShowNext);
            }, autoplay);
        }

        // preload image lazy.
        function unveilImage(img) {
            if (typeof window.lazySizes !== 'undefined') {
                window.lazySizes.loader.unveil(img);
            }
        }

        // show slide by index
        // available effects: fade, divide, top, left, right, bottom
        var hideTitlesCount = 0;
        self.sliderShowSlide = function (index) {
            var effect = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : transitionEffect;
            var speed = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : transitionSpeed;
            var force = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;

            if (self.getDefaultPageData().blogShow && !force) {
                return;
            }

            var curSlides = self.sliderGetSlides();
            if (typeof curSlides[index] === 'undefined' || busy) {
                return;
            }
            busy = 1;

            // stop autoplay
            if (autoplay) {
                stopAutoplay();
            }

            self.sliderStopVideo(function () {
                // update slides array
                self.sliderGetCurrentSlide().active = false;
                curSlides[index].active = true;

                // activate current nav item
                self.sliderActivateNavigationItem(index);

                // hide titles
                if (hideTitles) {
                    hideTitlesCount++;

                    if (hideTitlesCount > 1) {
                        self.showTitle('', 'fade');
                        self.showSubtitle('');
                        self.showTagline('');
                    }
                } else {
                    hideTitlesCount = 0;
                }

                var $prevImg = $sliderSlide.find('img');

                // transition effect
                switch (effect) {
                    case 'top':
                    case 'left':
                    case 'right':
                    case 'bottom':
                        {
                            var y = '-100%';
                            var x = '0%';

                            switch (effect) {
                                case 'left':
                                    y = '0%';
                                    x = '-100%';
                                    break;
                                case 'right':
                                    y = '0%';
                                    x = '100%';
                                    break;
                                case 'bottom':
                                    y = '100%';
                                    x = '0%';
                                    break;
                                // no default
                            }

                            _utility.tween.set($sliderNextSlide, {
                                display: 'block',
                                opacity: 1,
                                y: '0%',
                                x: '0%'
                            });

                            $sliderNextSlide.find('img').replaceWith($prevImg.clone());
                            $sliderSlide.find('img').replaceWith(curSlides[index].$img.clone());
                            _utility.tween.set($sliderSlide, {
                                display: 'none',
                                opacity: 0,
                                scale: 1.3
                            });
                            _utility.tween.to($sliderNextSlide, speed / 1000, {
                                y: y,
                                x: x,
                                force3D: true,
                                ease: Power1.easeIn,
                                onComplete: function onComplete() {
                                    _utility.tween.set($sliderNextSlide, {
                                        display: 'none',
                                        opacity: 0,
                                        y: '0%'
                                    });

                                    unveilImage(curSlides[index].$img[0]);
                                }
                            });
                            _utility.tween.to($sliderSlide, 1.3 * speed / 1000, {
                                display: 'block',
                                opacity: 1,
                                scale: 1,
                                force3D: true,
                                ease: Power1.easeOut,
                                onComplete: function onComplete() {
                                    busy = 0;

                                    // start autoplay
                                    if (autoplay) {
                                        runAutoplay();
                                    }

                                    // force reload brightness for layout texts
                                    self.updateBrightness(1);

                                    // run video
                                    self.sliderPlayVideo();
                                }
                            });
                            break;
                        }
                    case 'divide':
                        // place current image on left and right side of transition
                        $sliderNextSlide2.css({
                            right: '50%',
                            overflow: 'hidden'
                        });
                        $sliderNextSlide3.css({
                            left: '50%',
                            overflow: 'hidden'
                        });
                        $sliderNextSlide2Inner.css({
                            right: 'auto',
                            width: '200%'
                        });
                        $sliderNextSlide3Inner.css({
                            left: 'auto',
                            width: '200%'
                        });
                        _utility.tween.set($sliderNextSlide2, {
                            x: '0%'
                        });
                        _utility.tween.set($sliderNextSlide3, {
                            x: '0%'
                        });
                        _utility.tween.set($sliderNextSlide, {
                            display: 'block',
                            opacity: 1,
                            x: '0%',
                            y: '0%'
                        });

                        // set new background image to next slide
                        $sliderNextSlide.children('img').replaceWith('<img />');
                        $sliderNextSlide2Inner.find('img').replaceWith($prevImg.clone());
                        $sliderNextSlide3Inner.find('img').replaceWith($prevImg.clone());
                        $sliderSlide.find('img').replaceWith(curSlides[index].$img.clone());

                        _utility.tween.set($sliderSlide, {
                            display: 'none',
                            opacity: 0,
                            scale: 1.3
                        });

                        // start transition
                        _utility.tween.to($sliderSlide, 1.3 * speed / 1000, {
                            display: 'block',
                            opacity: 1,
                            scale: 1,
                            force3D: true,
                            ease: Power1.easeOut,
                            onComplete: function onComplete() {
                                busy = 0;

                                // start autoplay
                                if (autoplay) {
                                    runAutoplay();
                                }

                                // force reload brightness for layout texts
                                self.updateBrightness(1);

                                // run video
                                self.sliderPlayVideo();

                                unveilImage(curSlides[index].$img[0]);
                            }
                        });
                        _utility.tween.to($sliderNextSlide2, speed / 1000, {
                            x: '-100%',
                            force3D: true,
                            ease: Power2.easeIn
                        });
                        _utility.tween.to($sliderNextSlide3, speed / 1000, {
                            x: '100%',
                            force3D: true,
                            ease: Power2.easeIn,
                            onComplete: function onComplete() {
                                _utility.tween.set($sliderNextSlide, {
                                    display: 'none',
                                    opacity: 0
                                });
                            }
                        });

                        break;
                    default:
                        // fade
                        $sliderNextSlide.find('img').replaceWith(curSlides[index].$img.clone());
                        _utility.tween.to($sliderNextSlide, speed / 1000, {
                            display: 'block',
                            opacity: 1,
                            force3D: true,
                            ease: window.Power0.easeNone,
                            onComplete: function onComplete() {
                                var $clone = $sliderNextSlide.find('img:eq(0)').clone();

                                // this event fixes iOs image flushing.
                                $clone.one('load', function () {
                                    $sliderSlide.find('img').replaceWith($clone);

                                    _utility.tween.set($sliderNextSlide, {
                                        display: 'none',
                                        opacity: 0
                                    });
                                    busy = 0;

                                    // start autoplay
                                    if (autoplay) {
                                        runAutoplay();
                                    }

                                    // force reload brightness for layout texts
                                    self.updateBrightness(1);

                                    // run video
                                    self.sliderPlayVideo();

                                    unveilImage(curSlides[index].$img[0]);
                                });
                            }
                        });
                }
            });
        };

        // show next / prev
        self.sliderShowNext = function () {
            if (self.getDefaultPageData().blogShow) {
                return;
            }

            var curSlides = self.sliderGetSlides();
            var current = self.sliderGetCurrentSlide();
            var index = self.sliderGetSlideRealIndex(current);
            var newIndex = index + 1;
            if (!current) {
                return;
            }

            if (newIndex >= curSlides.length) {
                newIndex = 0;
            }

            if (newIndex === index) {
                return;
            }

            self.sliderShowSlide(newIndex);
        };
        self.sliderShowPrev = function () {
            if (self.getDefaultPageData().blogShow) {
                return;
            }

            var curSlides = self.sliderGetSlides();
            var current = self.sliderGetCurrentSlide();
            var index = self.sliderGetSlideRealIndex(current);
            var newIndex = index - 1;
            if (!current) {
                return;
            }

            if (index - 1 < 0) {
                newIndex = curSlides.length - 1;
            }

            if (newIndex === index) {
                return;
            }

            self.sliderShowSlide(newIndex);
        };

        // regenerate slider
        self.sliderRegenerate = function () {
            var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
            var callback = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : function () {};

            var forceReload = options.forceReload;
            var newSlides = options.slider ? self.sliderParseSlides(options.slider) : slides;

            if (options.transitionEffect) {
                transitionEffect = options.transitionEffect;
            }
            if (options.transitionSpeed) {
                transitionSpeed = parseInt(options.transitionSpeed, 10) || 600;
            }
            if (options.categoryTransitionEffect) {
                categoryTransitionEffect = options.categoryTransitionEffect;
            }
            if (options.categoryTransitionSpeed) {
                categoryTransitionSpeed = parseInt(options.categoryTransitionSpeed, 10) || 600;
            }
            if (options.autoplay) {
                autoplay = parseInt(options.autoplay, 10) || 0;
            }
            if (autoplay && transitionSpeed >= autoplay) {
                autoplay = transitionSpeed + 100;
            }
            hideTitles = !!options.hideTitles;

            $slider[(hideTitles ? 'add' : 'remove') + 'Class']('nk-slider-hide-titles');
            $slider.attr('data-transition-effect', transitionEffect);
            $slider.attr('data-transition-speed', transitionSpeed);
            $slider.attr('data-category-transition-effect', categoryTransitionEffect);
            $slider.attr('data-category-transition-speed', categoryTransitionSpeed);
            $slider.attr('data-autoplay', autoplay);

            // check if new slider structure differs from the current
            var tempSlides = _utility.$.extend(true, [], slides);
            var tempNewSlides = _utility.$.extend(true, [], newSlides);
            tempSlides.forEach(function (item, k) {
                tempSlides[k].active = false;
            });
            tempNewSlides.forEach(function (item, k) {
                tempNewSlides[k].active = false;
            });
            var theSameSlides = true;
            try {
                theSameSlides = JSON.stringify(tempSlides) === JSON.stringify(tempNewSlides);
            } catch (e) {}
            // error.


            // reload
            if (forceReload) {
                $slider.attr('data-force-reload', forceReload);
            }
            if (forceReload === 'true' || forceReload === 'fade' || forceReload === 'divide' || !theSameSlides) {
                slides = newSlides;

                // activate new category
                if (options.activeCategory) {
                    activeCategory = options.activeCategory;
                    $slider.attr('data-active-category', activeCategory);
                }

                // create categories structure and activate
                self.sliderCreateCategories();
                self.sliderActivateCategory(activeCategory);
                self.sliderCreateNavigation(function () {
                    // activate current nav item
                    self.sliderActivateNavigationItem(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
                    callback();
                });

                // run slider
                self.sliderShowSlide(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()), forceReload, transitionSpeed, true);
            } else {
                callback();
            }
        };

        /**
         * Controlling
         */

        // first run
        slides = self.sliderParseSlides();
        self.sliderCreateCategories();
        self.sliderActivateCategory(activeCategory);
        self.sliderCreateNavigation(function () {
            // activate current nav item
            self.sliderActivateNavigationItem(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
        });
        self.sliderShowSlide(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()), transitionEffect, transitionSpeed, true);

        // on click nav item
        $sliderNavItemsCont.on('click', 'li', function () {
            self.sliderShowSlide((0, _utility.$)(this).index());
        });
        $sliderNav.on('click', '.nk-slider-nav-next', function () {
            self.sliderShowNext();
        });
        $sliderNav.on('click', '.nk-slider-nav-prev', function () {
            self.sliderShowPrev();
        });

        // on click categories
        $sliderCategories.on('click', 'li:not(.active)', function () {
            if (busy) {
                return;
            }
            self.sliderActivateCategory((0, _utility.$)(this).attr('data-category'));
            self.sliderCreateNavigation(function () {
                // activate current nav item
                self.sliderActivateNavigationItem(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
            });
            self.sliderShowSlide(0, categoryTransitionEffect, categoryTransitionSpeed);
        });

        // mouse scroll
        var wheelEvent = void 0;
        if ('onwheel' in document.createElement('div')) {
            wheelEvent = 'wheel';
        } else if ('onmousewheel' in document.createElement('div')) {
            wheelEvent = 'mousewheel';
        }
        if (wheelEvent) {
            var lastScrollDate = new Date().getTime();
            var thisScrollDate = lastScrollDate;
            _utility.$wnd.on(wheelEvent, function (e) {
                // check if delta >= 2 and mouse under slider
                if (Math.abs(e.originalEvent.deltaY) < 2 || !(0, _utility.$)(e.target).parents('.nk-layout').length) {
                    return;
                }

                // fix magic mouse scroll
                lastScrollDate = thisScrollDate;
                thisScrollDate = new Date().getTime();
                if (thisScrollDate - lastScrollDate < 100) {
                    return;
                }

                // animate slider
                if (e.originalEvent.deltaY > 0) {
                    self.sliderShowNext();
                } else if (e.originalEvent.deltaY < 0) {
                    self.sliderShowPrev();
                }
            });
        }

        // merge categories on mobile device
        var isSmallScreen = _utility.wndW <= self.options.mobile;
        (0, _utility.debounceResize)(function () {
            if (!self.options.sliderShowAllCategoriesOnMobile) {
                return;
            }
            if (isSmallScreen && _utility.wndW <= self.options.mobile || !isSmallScreen && _utility.wndW > self.options.mobile) {
                return;
            }
            isSmallScreen = _utility.wndW <= self.options.mobile;
            self.sliderActivateCategory(activeCatOnBigScreens);
            self.sliderCreateNavigation(function () {
                // activate current nav item
                self.sliderActivateNavigationItem(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
            });
            self.sliderShowSlide(self.sliderGetSlideRealIndex(self.sliderGetCurrentSlide()));
        });

        // swipe
        if (!_utility.isTouch || typeof Hammer === 'undefined') {
            return;
        }
        var $layout = (0, _utility.$)('.nk-layout');
        var mc = new Hammer($layout[0], {
            domEvents: true
        });
        mc.get('swipe').set({ direction: Hammer.DIRECTION_ALL });
        $layout.on('swipedown swiperight', function (e) {
            if ((0, _utility.$)(e.target).parents('.nk-layout').length) {
                self.sliderShowPrev();
            }
        });
        $layout.on('swipeup swipeleft', function (e) {
            if ((0, _utility.$)(e.target).parents('.nk-layout').length) {
                self.sliderShowNext();
            }
        });
    }

    exports.initPageSlider = initPageSlider;

    /***/
},
/* 12 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPageContent = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Init Page Content
    
     -------------------------------------------------------------------*/
    function initPageContent() {
        var self = this;
        var $navbar = (0, _utility.$)('.nk-navbar');
        var $main = (0, _utility.$)('.nk-main');
        var $mainBg = $main.next('.nk-main-bg');
        var $mainAndBg = $main.add($mainBg);
        var busy = 0;

        // check side for animation (right, top, bottom)
        function checkSide() {
            var type = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'in';

            var result = $main.attr('data-transition-' + type);
            if (result !== 'top' && result !== 'bottom' && result !== 'right') {
                result = 'right';
            }
            return result;
        }

        // show sliding content
        self.showContent = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (busy || $main.hasClass('active')) {
                callback();
                return;
            }

            // hide navbar
            if ($navbar.hasClass('active')) {
                self.hideNavbar(function () {
                    self.showContent(callback);
                });
                return;
            }

            busy = 1;

            // options
            var side = checkSide('in');
            var transitionSpeed = parseInt($main.attr('data-transition-speed'), 10) || 500;

            $main.addClass('active');

            // stop previous tween
            _utility.tween.killTweensOf($mainAndBg);

            // set default styles
            switch (side) {
                case 'top':
                    _utility.tween.set($mainAndBg, {
                        y: '-100%',
                        x: '0%',
                        margin: 0
                    });
                    break;
                case 'bottom':
                    _utility.tween.set($mainAndBg, {
                        y: '100%',
                        x: '0%',
                        margin: 0
                    });
                    break;
                default:
                    _utility.tween.set($mainAndBg, {
                        y: '0%',
                        x: '100%',
                        margin: 0
                    });
            }

            // transition
            _utility.tween.to($mainAndBg, transitionSpeed / 1000, {
                x: '0%',
                y: '0%',
                force3D: true,
                ease: Power2.easeOut,
                onComplete: function onComplete() {
                    busy = 0;
                    callback();
                    self.updateBrightness();
                }
            });
        };

        // hide sliding content
        self.hideContent = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (busy || !$main.hasClass('active')) {
                callback();
                return;
            }

            busy = 1;

            // options
            var side = checkSide('out');
            var transitionSpeed = parseInt($main.attr('data-transition-speed'), 10) || 500;

            $main.removeClass('active');

            // stop previous tween
            _utility.tween.killTweensOf($mainAndBg);

            // set default styles
            _utility.tween.set($mainAndBg, {
                y: '0%',
                x: '0%',
                margin: 0
            });

            function onComplete() {
                busy = 0;
                callback();
                self.updateBrightness();
            }

            // hide animation
            switch (side) {
                case 'top':
                    _utility.tween.to($mainAndBg, transitionSpeed / 1000, {
                        y: '-100%',
                        x: '0%',
                        force3D: true,
                        ease: Power2.easeIn,
                        onComplete: onComplete
                    });
                    break;
                case 'bottom':
                    _utility.tween.to($mainAndBg, transitionSpeed / 1000, {
                        y: '100%',
                        x: '0%',
                        force3D: true,
                        ease: Power2.easeIn,
                        onComplete: onComplete
                    });
                    break;
                default:
                    _utility.tween.to($mainAndBg, transitionSpeed / 1000, {
                        y: '0%',
                        x: '100%',
                        force3D: true,
                        ease: Power2.easeIn,
                        onComplete: onComplete
                    });
            }
        };

        // show active main content
        if (self.getDefaultPageData().contentShow) {
            // small timeout
            setTimeout(function () {
                $main.removeClass('active');
                self.showContent();
            }, 200);
        }
    }

    exports.initPageContent = initPageContent;

    /***/
},
/* 13 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initBlog = undefined;

    var _utility = __webpack_require__(0);

    // jQuery Reverse
    _utility.$.fn.reverse = [].reverse;

    /*------------------------------------------------------------------
    
      Init Blog
    
    -------------------------------------------------------------------*/
    function initBlog() {
        var $blog = (0, _utility.$)('.nk-blog');
        var $navbar = (0, _utility.$)('.nk-navbar');
        var $sliderNav = (0, _utility.$)('.nk-slider-nav');
        var $sliderNavItemsCont = $sliderNav.children('ul');
        var $renderedBlog = (0, _utility.$)('<div class="nk-blog-rendered">').hide().appendTo($blog);
        // insert posts containers
        for (var k = 0; k < 3; k++) {
            $renderedBlog.append('<div class="nk-blog-item"><h2><a href=""></a></h2></div>');
        }
        var blogList = [];
        var self = this;
        var page = 0;
        var busy = 0;
        var noMorePosts = false; // true will be set after ajax load if no more posts

        // get posts from page
        function getPosts(fromPage) {
            var result = [];
            var startFrom = fromPage * 3; // 3 - posts per screen

            if (blogList[startFrom]) {
                for (var _k = 0; _k <= 2; _k++) {
                    if (blogList[startFrom + _k]) {
                        result.push(blogList[startFrom + _k]);
                    }
                }
            }
            return result;
        }

        // push new posts to list
        self.pushNewPosts = function () {
            var posts = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
            var reload = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

            if (reload) {
                blogList = [];
                page = 0;
                noMorePosts = false;
            }
            posts.forEach(function (post) {
                var words = (post.title || '').split(' ');
                var text = '';

                Object.keys(words).forEach(function (i) {
                    text += ' <span><span>' + words[i] + '</span></span>';
                });

                blogList.push({
                    title: text,
                    url: post.url
                });
            });
        };

        // update blog list
        self.updateBlogList = function () {
            var reload = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

            if (!self.getDefaultPageData().blogShow) {
                return;
            }
            var result = [];
            $blog.find('> .nk-blog-item a').each(function () {
                result.push({
                    title: (0, _utility.$)(this).text(),
                    url: (0, _utility.$)(this).attr('href')
                });
            });
            self.pushNewPosts(result, reload);
        };

        // render new posts
        self.renderPosts = function () {
            var posts = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : getPosts(page);
            var direction = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'bottom';
            var callback = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : function () {};

            // animate
            var callbackDelay = 3;
            function staggerCallback() {
                callbackDelay--;
                if (callbackDelay <= 0) {
                    callback();
                }
            }
            $renderedBlog.find('.nk-blog-item').each(function () {
                var $this = (0, _utility.$)(this);
                var $link = $this.find('a');
                var i = $this.index();
                var post = typeof posts[i] !== 'undefined' ? posts[i] : {
                    url: '',
                    title: ''
                };
                var $newTitle = (0, _utility.$)('<a>').attr('href', post.url).html(post.title);

                // don't show post if currently visible
                if ($link.text() === $newTitle.text()) {
                    staggerCallback();
                    return;
                }

                var $words = $link.find('> span > span');
                var $newWords = $newTitle.find('> span > span');

                // reverse
                if (direction !== 'bottom') {
                    $words = $words.reverse();
                    $newWords = $newWords.reverse();
                }

                // show new words
                function showNew() {
                    // show new words
                    _utility.tween.set($newWords, {
                        y: direction === 'bottom' ? '100%' : '-100%'
                    });
                    $link.replaceWith($newTitle);

                    if ($newWords.length) {
                        _utility.tween.staggerTo($newWords, 0.25, {
                            y: '0%',
                            force3D: true,
                            ease: Power2.easeOut
                        }, 0.015, staggerCallback);
                    } else {
                        staggerCallback();
                    }
                }

                // hide words
                if (!$words.length) {
                    showNew();
                } else {
                    _utility.tween.staggerTo($words, 0.25, {
                        y: direction === 'bottom' ? '-100%' : '100%',
                        force3D: true,
                        ease: Power2.easeIn,
                        delay: (direction === 'bottom' ? i : 3 - i) * 0.15
                    }, 0.015, showNew);
                }
            });
        };

        // update blog page indicator
        var indicatorTimeout = void 0;
        self.updateBlogPageIndicator = function () {
            var custom = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

            // hide old
            $sliderNavItemsCont.find('li').addClass('old-active').removeClass('active');

            // add new indicator
            var content = custom || '' + (page >= 9 ? '' : '0') + (parseInt(page, 10) + 1);
            $sliderNavItemsCont.append('<li class="active">' + content + '</li>');

            // remove old indicator
            clearTimeout(indicatorTimeout);
            indicatorTimeout = setTimeout(function () {
                $sliderNavItemsCont.find('.old-active').remove();
            }, 1000);
        };

        // show next 3 blog posts
        self.showNextPosts = function () {
            if (busy) {
                return;
            }
            busy = 1;

            var nextPosts = getPosts(page + 1);
            if (nextPosts.length > 0) {
                self.renderPosts(nextPosts, 'bottom', function () {
                    page++;
                    self.updateBlogPageIndicator();
                    busy = 0;
                });
            } else if (!noMorePosts) {
                // ajax load for new blog posts
                self.runPreloader('blog');
                var loadNewPage = getPosts(page).length === 3;
                self.options.events.onLoadBlogPosts(function () {
                    var result = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : [];
                    var noPosts = arguments[1];

                    self.stopPreloader('blog');

                    // no more posts
                    if (noPosts) {
                        noMorePosts = noPosts;
                    }

                    // store new loaded posts in array
                    if (result) {
                        self.pushNewPosts(result);

                        // rerun loading posts
                        var newNextPosts = getPosts(page + (loadNewPage ? 1 : 0));
                        if (newNextPosts.length > 0) {
                            self.renderPosts(newNextPosts, 'bottom', function () {
                                if (loadNewPage) {
                                    page++;
                                    self.updateBlogPageIndicator();
                                }
                                busy = 0;
                            });
                        }
                    }
                });
            } else {
                busy = 0;
            }
        };

        // show prev 3 blog posts
        self.showPrevPosts = function () {
            if (busy) {
                return;
            }
            busy = 1;

            var nextPosts = getPosts(page - 1);
            if (nextPosts.length > 0) {
                self.renderPosts(nextPosts, 'top', function () {
                    page--;
                    self.updateBlogPageIndicator();
                    busy = 0;
                });
            } else {
                busy = 0;
            }
        };

        // show blog posts list
        var isShown = false;
        self.showBlogPostsList = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (isShown) {
                return;
            }
            isShown = 1;

            // clear items
            var $items = $renderedBlog.find('.nk-blog-item:eq(0), .nk-blog-item:eq(1)');
            var $hideItems = $renderedBlog.find('.nk-blog-item > *');
            $renderedBlog.find('.nk-blog-item a').html('');

            // stop previous tween
            _utility.tween.killTweensOf($items);
            _utility.tween.killTweensOf($hideItems);

            // prepare items
            _utility.tween.set($items, {
                scaleY: 0
            });

            // show rendered blog container
            $renderedBlog.show();

            // animate items
            _utility.tween.staggerTo($items, 0.5, {
                scaleY: 1,
                transformOrigin: '0 0',
                force3D: true,
                ease: Power2.easeOut
            }, 0.2, function () {
                _utility.tween.set($hideItems, {
                    opacity: 1
                });
                self.renderPosts();
                callback();
            });

            // update page indicator
            self.updateBlogPageIndicator();
        };

        // hide blog posts list
        self.hideBlogPostsList = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (!isShown) {
                return;
            }

            // hide navbar
            if ($navbar.hasClass('active')) {
                self.hideNavbar(function () {
                    self.hideBlogPostsList(callback);
                });
                return;
            }

            isShown = 0;

            // clear items
            var $items = $renderedBlog.find('.nk-blog-item:eq(0), .nk-blog-item:eq(1)');
            var $hideItems = $renderedBlog.find('.nk-blog-item > *');

            // stop previous tween
            _utility.tween.killTweensOf($items);
            _utility.tween.killTweensOf($hideItems);

            // prepare items
            _utility.tween.set($items, {
                scaleY: 1
            });

            _utility.tween.to($hideItems, 0.3, {
                force3D: true,
                opacity: 0
            });

            // animate items
            _utility.tween.staggerTo($items, 0.5, {
                scaleY: 0,
                delay: 0.3,
                transformOrigin: '0 100%',
                force3D: true,
                ease: Power2.easeOut
            }, 0.2, function () {
                // hide rendered blog container
                $renderedBlog.hide();

                callback();
            });
        };

        // fist run
        if ($blog.hasClass('active')) {
            self.updateBlogList();

            // small timeout
            setTimeout(function () {
                self.showBlogPostsList();
            }, 200);
        }

        // on click nav item
        $sliderNav.on('click', '.nk-slider-nav-next', function () {
            if (self.getDefaultPageData().blogShow) {
                self.showNextPosts();
            }
        });
        $sliderNav.on('click', '.nk-slider-nav-prev', function () {
            if (self.getDefaultPageData().blogShow) {
                self.showPrevPosts();
            }
        });

        // mouse scroll
        var wheelEvent = void 0;
        if ('onwheel' in document.createElement('div')) {
            wheelEvent = 'wheel';
        } else if ('onmousewheel' in document.createElement('div')) {
            wheelEvent = 'mousewheel';
        }
        if (wheelEvent) {
            _utility.$wnd.on(wheelEvent, function (e) {
                // check if delta >= 2 and mouse under slider
                if (!self.getDefaultPageData().blogShow || Math.abs(e.originalEvent.deltaY) < 2 || !(0, _utility.$)(e.target).parents('.nk-layout, .nk-blog').length) {
                    return;
                }

                if (e.originalEvent.deltaY > 0) {
                    self.showNextPosts();
                } else if (e.originalEvent.deltaY < 0) {
                    self.showPrevPosts();
                }
            });
        }

        // swipe
        if (!_utility.isTouch || typeof Hammer === 'undefined') {
            return;
        }
        var mc = new Hammer(_utility.$body[0], {
            touchAction: 'auto'
        });
        mc.get('swipe').set({ direction: Hammer.DIRECTION_ALL });
        mc.on('swipeup swipeleft', function (e) {
            if (self.getDefaultPageData().blogShow && (0, _utility.$)(e.target).parents('.nk-layout, .nk-blog').length) {
                self.showNextPosts();
            }
        });
        mc.on('swipedown swiperight', function (e) {
            if (self.getDefaultPageData().blogShow && (0, _utility.$)(e.target).parents('.nk-layout, .nk-blog').length) {
                self.showPrevPosts();
            }
        });
    }

    exports.initBlog = initBlog;

    /***/
},
/* 14 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initNavbar = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
     Init Navbar
    
     -------------------------------------------------------------------*/
    function initNavbar() {
        var self = this;
        var $main = (0, _utility.$)('.nk-main');
        var $navbar = (0, _utility.$)('.nk-navbar');
        var $navbarBg = $navbar.next('.nk-navbar-bg');
        var $navbarBgImage = $navbarBg.find('.nk-navbar-image');
        var busy = 0;

        // toggle navbars
        function updateTogglers() {
            (0, _utility.$)('.nk-nav-toggle').each(function () {
                var active = $navbar.hasClass('active');
                (0, _utility.$)(this)[(active ? 'add' : 'remove') + 'Class']('active');
            });
        }
        self.toggleNavbar = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            self[$navbar.hasClass('active') ? 'hideNavbar' : 'showNavbar'](callback);
        };
        self.showNavbar = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (busy || $navbar.hasClass('active') || self.isInPageLoadQueue()) {
                return;
            }

            // hide main content
            if ($main.hasClass('active')) {
                self.hideContent(function () {
                    self.showNavbar(callback);
                });
                return;
            }

            busy = 1;
            $navbar.addClass('active');

            // stop previous tweens
            _utility.tween.killTweensOf($navbar);
            _utility.tween.killTweensOf($navbarBg);
            _utility.tween.killTweensOf($navbarBgImage);

            // show background
            _utility.tween.set($navbarBg, {
                y: '0%'
            });
            _utility.tween.to($navbarBg, 0.35, {
                y: '100%',
                force3D: true
            });

            // show background image if visible
            if ($navbarBgImage.is(':visible')) {
                _utility.tween.set($navbarBgImage, {
                    opacity: 0,
                    ease: Power2.easeOut
                });
                _utility.tween.to($navbarBgImage, 0.5, {
                    opacity: 1,
                    ease: Power2.easeOut,
                    force3D: true,
                    delay: 0.2
                });
            }

            // show navbar
            _utility.tween.to($navbar, 0.35, {
                x: '-100%',
                ease: Power2.easeOut,
                force3D: true,
                delay: 0.2,
                onComplete: function onComplete() {
                    busy = 0;
                    callback();
                    self.updateBrightness();
                }
            });

            updateTogglers();
        };
        self.hideNavbar = function () {
            var callback = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : function () {};

            if (busy || !$navbar.hasClass('active')) {
                return;
            }
            busy = 1;
            $navbar.removeClass('active');

            // stop previous tweens
            _utility.tween.killTweensOf($navbar);
            _utility.tween.killTweensOf($navbarBg);
            _utility.tween.killTweensOf($navbarBgImage);

            // hide background
            _utility.tween.to($navbarBg, 0.35, {
                y: '200%',
                ease: Power2.easeIn,
                force3D: true,
                delay: 0.2,
                onComplete: function onComplete() {
                    busy = 0;

                    callback();

                    // show main content if closed all items
                    if (!self.isInPageLoadQueue()) {
                        if (self.getDefaultPageData().contentShow && !$main.add($navbar).is('.active')) {
                            self.showContent();
                        } else {
                            self.updateBrightness();
                        }
                    }
                }
            });

            // hide background image if visible
            if ($navbarBgImage.is(':visible')) {
                _utility.tween.set($navbarBgImage, {
                    opacity: 1,
                    z: 0
                });
                _utility.tween.to($navbarBgImage, 0.5, {
                    opacity: 0,
                    ease: Power2.easeIn,
                    force3D: true
                });
            }

            // hide navbar
            _utility.tween.to($navbar, 0.35, {
                x: '0%',
                ease: Power2.easeIn,
                force3D: true
            });

            updateTogglers();
        };
        _utility.$doc.on('click', '.nk-nav-toggle', function (e) {
            e.preventDefault();
            self.toggleNavbar();
        });

        // close on click on layout elements
        _utility.$doc.on('click', '.nk-layout', function (e) {
            if (!e.isDefaultPrevented()) {
                self.hideNavbar();
            }
        });

        // close on escape
        _utility.$doc.on('keyup', function (e) {
            if (e.which === 27) {
                self.hideNavbar();
            }
        });
    }

    exports.initNavbar = initNavbar;

    /***/
},
/* 15 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initForms = undefined;

    var _utility = __webpack_require__(0);

    /*------------------------------------------------------------------
    
      Init AJAX Forms
    
    -------------------------------------------------------------------*/
    function initForms() {
        if (typeof _utility.$.fn.ajaxSubmit === 'undefined' || typeof _utility.$.validator === 'undefined') {
            return;
        }
        var self = this;

        // Validate Forms
        (0, _utility.$)('form:not(.nk-form-ajax):not(.nk-mchimp):not(.ready)').addClass('ready').each(function () {
            (0, _utility.$)(this).validate({
                errorClass: 'nk-error',
                errorElement: 'div',
                errorPlacement: function errorPlacement(error, element) {
                    var $parent = element.parent('.input-group');
                    if ($parent.length) {
                        $parent.after(error);
                    } else {
                        element.after(error);
                    }
                    self.debounceResize();
                }
            });
        });
        // ajax form
        (0, _utility.$)('form.nk-form-ajax:not(.ready)').addClass('ready').each(function () {
            (0, _utility.$)(this).validate({
                errorClass: 'nk-error',
                errorElement: 'div',
                errorPlacement: function errorPlacement(error, element) {
                    var $parent = element.parent('.input-group');
                    if ($parent.length) {
                        $parent.after(error);
                    } else {
                        element.after(error);
                    }
                    self.debounceResize();
                },

                // Submit the form via ajax (see: jQuery Form plugin)
                submitHandler: function submitHandler(form) {
                    var $responseSuccess = (0, _utility.$)(form).find('.nk-form-response-success');
                    var $responseError = (0, _utility.$)(form).find('.nk-form-response-error');
                    (0, _utility.$)(form).ajaxSubmit({
                        type: 'POST',
                        success: function success(response) {
                            response = JSON.parse(response);
                            if (response.type && response.type === 'success') {
                                $responseError.hide();
                                $responseSuccess.html(response.response).show();
                                form.reset();
                            } else {
                                $responseSuccess.hide();
                                $responseError.html(response.response).show();
                            }
                            self.debounceResize();
                        },
                        error: function error(response) {
                            $responseSuccess.hide();
                            $responseError.html(response.responseText).show();
                            self.debounceResize();
                        }
                    });
                }
            });
        });
    }

    exports.initForms = initForms;

    /***/
},
/* 16 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initFormsMailChimp = undefined;

    var _utility = __webpack_require__(0);

    /* eslint-disable */

    /*------------------------------------------------------------------
    
      Init MailChimp
    
    -------------------------------------------------------------------*/
    function initFormsMailChimp() {
        var $mchimp = (0, _utility.$)('form.nk-mchimp');
        if (typeof _utility.$.fn.ajaxSubmit === 'undefined' || typeof _utility.$.validator === 'undefined' || !$mchimp.length) {
            return;
        }
        var self = this;

        // Additional Validate Methods From MailChimp
        // Validate a multifield birthday
        _utility.$.validator.addMethod('mc_birthday', function (date, element, grouping_class) {
            var isValid = false;
            var $fields = (0, _utility.$)('input:not(:hidden)', (0, _utility.$)(element).closest(grouping_class));
            if ($fields.filter(':filled').length === 0 && this.optional(element)) {
                isValid = true; // None have been filled out, so no error
            } else {
                var dateArray = new Array();
                dateArray.month = $fields.filter('input[name*="[month]"]').val();
                dateArray.day = $fields.filter('input[name*="[day]"]').val();

                // correct month value
                dateArray.month -= 1;

                var testDate = new Date(1970, dateArray.month, dateArray.day);
                if (testDate.getDate() !== dateArray.day || testDate.getMonth() !== dateArray.month) {
                    isValid = false;
                } else {
                    isValid = true;
                }
            }
            return isValid;
        }, 'Please enter a valid month and day.');

        // Validate a multifield date
        _utility.$.validator.addMethod('mc_date', function (date, element, grouping_class) {
            var isValid = false;
            var $fields = (0, _utility.$)('input:not(:hidden)', (0, _utility.$)(element).closest(grouping_class));
            if ($fields.filter(':filled').length === 0 && this.optional(element)) {
                isValid = true; // None have been filled out, so no error
            } else {
                var dateArray = new Array();
                dateArray.month = $fields.filter('input[name*="[month]"]').val();
                dateArray.day = $fields.filter('input[name*="[day]"]').val();
                dateArray.year = $fields.filter('input[name*="[year]"]').val();

                // correct month value
                dateArray.month -= 1;

                // correct year value
                if (dateArray.year.length < 4) {
                    dateArray.year = parseInt(dateArray.year, 10) < 50 ? 2000 + parseInt(dateArray.year, 10) : 1900 + parseInt(dateArray.year, 10);
                }

                var testDate = new Date(dateArray.year, dateArray.month, dateArray.day);
                if (testDate.getDate() !== dateArray.day || testDate.getMonth() !== dateArray.month || testDate.getFullYear() !== dateArray.year) {
                    isValid = false;
                } else {
                    isValid = true;
                }
            }
            return isValid;
        }, 'Please enter a valid date');

        // Validate a multifield phone number
        _utility.$.validator.addMethod('mc_phone', function (phone_number, element, grouping_class) {
            var isValid = false;
            var $fields = (0, _utility.$)('input:filled:not(:hidden)', (0, _utility.$)(element).closest(grouping_class));
            if ($fields.length === 0 && this.optional(element)) {
                isValid = true; // None have been filled out, so no error
            } else {
                phone_number = $fields.eq(0).val() + $fields.eq(1).val() + $fields.eq(2).val();
                isValid = phone_number.length === 10 && phone_number.match(/[0-9]{9}/);
            }
            return isValid;
        }, 'Please specify a valid phone number');

        _utility.$.validator.addMethod('skip_or_complete_group', function (value, element, grouping_class) {
            var $fields = (0, _utility.$)('input:not(:hidden)', (0, _utility.$)(element).closest(grouping_class)),
                $fieldsFirst = $fields.eq(0),
                validator = $fieldsFirst.data('valid_skip') ? $fieldsFirst.data('valid_skip') : _utility.$.extend({}, this),
                numberFilled = $fields.filter(function () {
                return validator.elementValue(this);
            }).length,
                isValid = numberFilled === 0 || numberFilled === $fields.length;

            // Store the cloned validator for future validation
            $fieldsFirst.data('valid_skip', validator);

            // If element isn't being validated, run each field's validation rules
            if (!(0, _utility.$)(element).data('being_validated')) {
                $fields.data('being_validated', true);
                $fields.each(function () {
                    validator.element(this);
                });
                $fields.data('being_validated', false);
            }
            return isValid;
        }, _utility.$.validator.format('Please supply missing fields.'));

        _utility.$.validator.addMethod('skip_or_fill_minimum', function (value, element, options) {
            var $fields = (0, _utility.$)(options[1], element.form),
                $fieldsFirst = $fields.eq(0),
                validator = $fieldsFirst.data('valid_skip') ? $fieldsFirst.data('valid_skip') : _utility.$.extend({}, this),
                numberFilled = $fields.filter(function () {
                return validator.elementValue(this);
            }).length,
                isValid = numberFilled === 0 || numberFilled >= options[0];
            // Store the cloned validator for future validation
            $fieldsFirst.data('valid_skip', validator);

            // If element isn't being validated, run each skip_or_fill_minimum field's validation rules
            if (!(0, _utility.$)(element).data('being_validated')) {
                $fields.data('being_validated', true);
                $fields.each(function () {
                    validator.element(this);
                });
                $fields.data('being_validated', false);
            }
            return isValid;
        }, _utility.$.validator.format('Please either skip these fields or fill at least {0} of them.'));

        _utility.$.validator.addMethod('zipcodeUS', function (value, element) {
            return this.optional(element) || /^\d{5}-\d{4}$|^\d{5}$/.test(value);
        }, 'The specified US ZIP Code is invalid');

        $mchimp.each(function () {
            var $form = (0, _utility.$)(this);
            if (!$form.length) {
                return;
            }

            var validator = $form.validate({
                errorClass: 'nk-error',
                errorElement: 'div',
                // Grouping fields makes jQuery Validation display one error for all the fields in the group
                // It doesn't have anything to do with how the fields are validated (together or separately),
                // it's strictly for visual display of errors
                groups: function groups() {
                    var groups = {};
                    $form.find('.input-group').each(function () {
                        var inputs = (0, _utility.$)(this).find('input:text:not(:hidden)'); // TODO: What about non-text inputs like number?
                        if (inputs.length > 1) {
                            var mergeName = inputs.first().attr('name');
                            var fieldNames = _utility.$.map(inputs, function (f) {
                                return f.name;
                            });
                            groups[mergeName.substring(0, mergeName.indexOf('['))] = fieldNames.join(' ');
                        }
                    });
                    return groups;
                },

                // Place a field's inline error HTML just before the div.input-group closing tag
                errorPlacement: function errorPlacement(error, element) {
                    element.closest('.input-group').after(error);
                    self.debounceResize();
                },

                // Submit the form via ajax (see: jQuery Form plugin)
                submitHandler: function submitHandler() {
                    var $responseSuccess = $form.find('.nk-form-response-success');
                    var $responseError = $form.find('.nk-form-response-error');
                    var url = $form.attr('action');
                    url = url.replace('/post?u=', '/post-json?u=');
                    url += '&c=?';

                    $form.ajaxSubmit({
                        type: 'GET',
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        url: url,
                        success: function success(resp) {
                            $responseSuccess.hide();
                            $responseError.hide();

                            // On successful form submission, display a success message and reset the form
                            if (resp.result === 'success') {
                                $responseSuccess.show().html(resp.msg);
                                $form[0].reset();

                                // If the form has errors, display them, inline if possible, or appended to #mce-error-response
                            } else {
                                // Example errors - Note: You only get one back at a time even if you submit several that are bad.
                                // Error structure - number indicates the index of the merge field that was invalid, then details
                                // Object {result: "error", msg: "6 - Please enter the date"}
                                // Object {result: "error", msg: "4 - Please enter a value"}
                                // Object {result: "error", msg: "9 - Please enter a complete address"}

                                // Try to parse the error into a field index and a message.
                                // On failure, just put the dump thing into in the msg letiable.
                                var index = -1;
                                var msg = void 0;
                                try {
                                    var parts = resp.msg.split(' - ', 2);
                                    if (typeof parts[1] === 'undefined') {
                                        msg = resp.msg;
                                    } else {
                                        i = parseInt(parts[0], 10);
                                        if (i.toString() === parts[0]) {
                                            index = parts[0];
                                            msg = parts[1];
                                        } else {
                                            index = -1;
                                            msg = resp.msg;
                                        }
                                    }
                                } catch (e) {
                                    index = -1;
                                    msg = resp.msg;
                                }

                                try {
                                    // If index is -1 if means we don't have data on specifically which field was invalid.
                                    // Just lump the error message into the generic response div.
                                    if (index === -1) {
                                        $responseError.show().html(msg);
                                    } else {
                                        var fieldName = $form.find('input[name]:eq(' + index + ')').attr('name'); // Make sure this exists
                                        var data = {};
                                        data[fieldName] = msg;
                                        validator.showErrors(data);
                                    }
                                } catch (e) {
                                    $responseError.show().html(msg);
                                }
                            }
                            self.debounceResize();
                        },
                        error: function error(response) {
                            $responseSuccess.hide();
                            $responseError.html(response.responseText).show();
                            self.debounceResize();
                        }
                    });
                }
            });
        });

        // Custom validation methods for fields with certain css classes
        _utility.$.validator.addClassRules('birthday', { digits: true, mc_birthday: '.datefield' });
        _utility.$.validator.addClassRules('datepart', { digits: true, mc_date: '.datefield' });
        _utility.$.validator.addClassRules('phonepart', { digits: true, mc_phone: '.phonefield' });
    }

    exports.initFormsMailChimp = initFormsMailChimp;

    /***/
},
/* 17 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    /* FastClick */
    function initPluginFastClick() {
        if (typeof FastClick !== 'undefined') {
            FastClick.attach(document.body);
        }
    }

    exports.initPluginFastClick = initPluginFastClick;

    /***/
},
/* 18 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPluginNano = undefined;

    var _utility = __webpack_require__(0);

    /* Nano Scroller */
    function initPluginNano($context) {
        if (typeof _utility.$.fn.nanoScroller !== 'undefined') {
            ($context || _utility.$doc).find('.nano').nanoScroller();
        }
    }

    exports.initPluginNano = initPluginNano;

    /***/
},
/* 19 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPluginTabs = undefined;

    var _utility = __webpack_require__(0);

    /* Bootstrap Tabs */
    function initPluginTabs() {
        var self = this;
        _utility.$wnd.on('shown.bs.tab', function () {
            self.debounceResize();
        });
    }

    exports.initPluginTabs = initPluginTabs;

    /***/
},
/* 20 */
/***/function (module, exports, __webpack_require__) {

    "use strict";

    Object.defineProperty(exports, "__esModule", {
        value: true
    });
    exports.initPluginOFI = undefined;

    var _utility = __webpack_require__(0);

    /* OFI */
    function initPluginOFI() {
        if (typeof objectFitImages === 'undefined') {
            return;
        }

        // ofi and lazysizes conflicted, so we need to run lazysizes
        // first and then run ofi polyfill.
        objectFitImages('.nk-slider img:not(.lazyload)');

        (0, _utility.$)(document).on('lazybeforeunveil', function (e) {
            var $img = (0, _utility.$)(e.target);

            if ($img.hasClass('lazyload') && $img.closest('.nk-slider').length) {
                $img.one('load', function () {
                    objectFitImages($img[0]);
                });
            }
        });
    }

    exports.initPluginOFI = initPluginOFI;

    /***/
}]
/******/);

/***/ })

/******/ });