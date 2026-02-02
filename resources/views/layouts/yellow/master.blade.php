<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $company->name }} - @yield('title')</title>
    
    {{-- Manual GTM Code from Backend Settings --}}
    {!! setting('gtm_code') ?? '' !!}

    <link rel="icon" type="image/png" href="{{ asset($logo->favicon) }}">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Scroll & Layout Fixes */
        body, html {
            overflow-x: hidden !important;
            position: relative;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .site__body, .site-footer {
            overflow-x: hidden !important;
        }

        /* Fix for Bootstrap negative row margins causing overflow */
        .container, .container-fluid {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        @media (max-width: 768px) {
            .row {
                margin-left: -5px !important;
                margin-right: -5px !important;
            }
            .col, [class*="col-"] {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }

        body, html, p, span, div, h1, h2, h3, h4, h5, h6, input, button, select, textarea, label, a { 
            font-family: 'Hind Siliguri', 'Inter', sans-serif !important; 
        }

        /* Allow Font Awesome to use its own font-family */
        .fa, .fas, .far, .fal, .fa-solid, .fa-regular {
            font-family: "Font Awesome 5 Free" !important;
        }
        .fab, .fa-brands {
            font-family: "Font Awesome 5 Brands" !important;
        }
        
        .fa-solid, .fas {
            font-weight: 900 !important;
        }

        /* Mobile Header & Topbar Refinement */
        @media (max-width: 991px) {
            .site-header__topbar, .topbar {
                background-color: var(--topbar-bg) !important;
                border: none !important;
                box-shadow: none !important;
                margin: 0 !important;
            }
            .topbar-link, .topbar__item {
                color: var(--topbar-text) !important;
            }
            .mobile-header, .mobile-header__panel {
                background-color: var(--topbar-bg) !important;
                border: none !important;
                box-shadow: none !important;
                margin: 0 !important;
            }
            .mobile-header__menu-button i, 
            .mobile-header__indicators .indicator__button,
            .mobile-header__indicators .indicator__button i {
                color: #ffffff !important;
            }
            .indicator__value {
                background-color: #ffc107 !important;
                color: #000 !important;
            }
            .mobile-header__body {
                height: 60px !important;
                border-top: none !important;
            }
        }

        .bn-text, p, span, h1, h2, h3, h4, h5, h6 {
            word-break: keep-all !important;
            overflow-wrap: normal !important;
            word-wrap: normal !important;
            line-height: 1.6;
        }
        /* Premium Button Styles */
        .btn-primary, .btn-confirm, .btn-xl {
            font-weight: 600 !important;
            letter-spacing: 0.3px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
            border-radius: 8px !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .btn-primary:hover, .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }
        /* Bengali Sentence Spacing */
        p, span, label, div {
            line-height: normal;
        }

        .topbar__row {
            display: flex;
            align-items: center;
            height: 40px; /* Standardize topbar height */
        }

        .nav-panel__row {
            display: flex;
            align-items: center;
            height: 60px; /* Increased height for premium feel */
        }

        .nav-panel__nav-links {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .nav-panel__indicators {
            display: flex;
            align-items: center;
            height: 100%;
        }

        .indicator__area {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            height: 100%;
            padding: 0 15px;
        }

        /* Perfect Button Design & Spacing */
        .product__buttons {
            display: flex;
            flex-direction: column;
            gap: 12px !important; /* Perfect vertical gap */
            margin-top: 15px !important;
            margin-bottom: 15px !important;
        }

        .btn-lg.btn-block {
            padding: 0.85rem 1.5rem !important; /* Premium comfortable padding */
            font-size: 18px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 100% !important;
            margin: 0 !important;
        }

        .product__actions-item {
            margin: 0 !important;
            padding: 0 !important;
        }

        @media (min-width: 992px) {
            .product__buttons {
                flex-direction: row;
                gap: 10px !important;
            }
            .btn-lg.btn-block {
                padding: 0.75rem 1.25rem !important;
            }
        }
    </style>

    @php
        $bootstrapCss = cdnAsset('bootstrap.css', 'strokya/vendor/bootstrap-4.2.1/css/bootstrap.min.css');
        $fontawesomeCss = cdnAsset('fontawesome.css', 'strokya/vendor/fontawesome-5.6.1/css/all.min.css');
        $jqueryJs = cdnAsset('jquery', 'strokya/vendor/jquery-3.3.1/jquery.min.js');
    @endphp

    @include('layouts.partials.cdn-fallback', [
        'fallbackAssets' => [
            'jquery' => asset('strokya/vendor/jquery-3.3.1/jquery.min.js'),
            'bootstrap' => asset('strokya/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js'),
            'owl' => asset('strokya/vendor/owl-carousel-2.3.4/owl.carousel.min.js'),
            'svg4everybody' => asset('strokya/vendor/svg4everybody-2.1.9/svg4everybody.min.js'),
        ],
    ])
    {{-- Preload critical CSS --}}
    <link rel="preload" href="{{ $bootstrapCss }}" as="style" crossorigin="anonymous">
    <link rel="preload" href="{{ $fontawesomeCss }}" as="style" crossorigin="anonymous">
    <link rel="preload" href="{{ versionedAsset('strokya/css/style.css') }}" as="style">

    {{-- jQuery is loaded synchronously, no need to preload --}}

    {{-- Preconnect to critical CDN domains only (max 4 to avoid warnings) --}}
    @if (config('cdn.enabled', true))
        <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
        <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    @endif
    {{-- Preconnect to analytics domains for faster loading when deferred scripts execute --}}
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="preconnect" href="https://www.google.com">

    {{-- Polyfill for async CSS loading (preload with onload) --}}
    <script data-navigate-once>
        /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
        (function(w) {
            "use strict";
            var loadCSS = function(href, before, media) {
                var doc = w.document;
                var ss = doc.createElement("link");
                var ref;
                if (before) {
                    ref = before;
                } else {
                    var refs = (doc.body || doc.getElementsByTagName("head")[0]).childNodes;
                    ref = refs[refs.length - 1];
                }
                var sheets = doc.styleSheets;
                ss.rel = "stylesheet";
                ss.href = href;
                ss.media = "only x";
                function ready(cb) {
                    if (doc.body) {
                        return cb();
                    }
                    setTimeout(function() {
                        ready(cb);
                    });
                }
                ready(function() {
                    ref.parentNode.insertBefore(ss, (before ? ref : ref.nextSibling));
                });
                var onloadcssdefined = function(cb) {
                    var resolvedHref = ss.href;
                    var i = sheets.length;
                    while (i--) {
                        if (sheets[i].href === resolvedHref) {
                            return cb();
                        }
                    }
                    setTimeout(function() {
                        onloadcssdefined(cb);
                    });
                };
                ss.onloadcssdefined = onloadcssdefined;
                onloadcssdefined(function() {
                    ss.media = media || "all";
                });
                return ss;
            };
            if (typeof exports !== "undefined") {
                exports.loadCSS = loadCSS;
            } else {
                w.loadCSS = loadCSS;
            }
        }(typeof global !== "undefined" ? global : this));

        // Polyfill for browsers that don't support preload with onload
        (function() {
            function processPreloadLinks() {
                var preloadLinks = document.querySelectorAll('link[rel="preload"][as="style"]');
                preloadLinks.forEach(function(link) {
                    // If onload handler wasn't set or doesn't work, provide fallback
                    if (!link.hasAttribute('data-async-processed')) {
                        link.setAttribute('data-async-processed', 'true');
                        var href = link.href;
                        var originalOnload = link.onload;

                        // Enhanced onload handler
                        link.onload = function() {
                            if (originalOnload) {
                                try {
                                    originalOnload.call(this);
                                } catch(e) {
                                    console.warn('Error in original onload handler:', e);
                                }
                            }
                            this.onload = null;
                            this.rel = 'stylesheet';
                        };

                        // Fallback: if onload doesn't fire within 3 seconds, load synchronously
                        setTimeout(function() {
                            if (link && link.rel === 'preload') {
                                if (typeof loadCSS !== 'undefined') {
                                    loadCSS(href);
                                    link.remove();
                                } else {
                                    link.rel = 'stylesheet';
                                }
                            }
                        }, 3000);
                    }
                });
            }

            // Process immediately and also after DOM is ready
            processPreloadLinks();
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', processPreloadLinks);
            }
        })();
    </script>

    {{-- Global jQuery (needed for SPA navigation) --}}
    <script src="{{ $jqueryJs }}" data-navigate-once crossorigin="anonymous" referrerpolicy="no-referrer"
        onerror="window.__loadLocalAsset && window.__loadLocalAsset('jquery')"></script>

    {{-- Alpine.js (required for Livewire components and interactive elements) --}}
    <script src="{{ cdnAsset('alpine', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js') }}" defer crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script data-navigate-once>
        (function() {
            if (window.runWhenJQueryReady) {
                window.__flushRunWhenJQueryQueue && window.__flushRunWhenJQueryQueue();
                return;
            }

            const queue = [];

            function flushQueue() {
                if (typeof window.jQuery === 'undefined') {
                    return;
                }

                while (queue.length) {
                    const callback = queue.shift();
                    try {
                        callback(window.jQuery);
                    } catch (error) {
                        console.error(error);
                    }
                }
            }

            function scheduleFlush() {
                queueMicrotask(flushQueue);
            }

            window.__flushRunWhenJQueryQueue = flushQueue;

            window.runWhenJQueryReady = function(callback) {
                if (typeof window.jQuery !== 'undefined') {
                    callback(window.jQuery);
                } else {
                    queue.push(callback);
                }
            };

            document.addEventListener('DOMContentLoaded', scheduleFlush, {
                once: true
            });
            document.addEventListener('livewire:navigate', scheduleFlush);
            scheduleFlush();
            if (document.readyState !== 'loading') {
                scheduleFlush();
            }
        })();
    </script>
    </script>

    @livewireStyles
    <!-- css -->
    {{-- Google Tag Manager is injected manually via backend settings (line 12) --}}
    {{-- Spatie GTM package removed to prevent duplicate GTM containers --}}
    @include('layouts.yellow.css')
    <!-- js -->
    <!-- font - fontawesome -->
    @php
        $cdnProvider = config('cdn.provider', 'jsdelivr');
        $fontAwesomeVersion = config('cdn.assets.fontawesome.version', '6.5.1');

        // Determine base URL based on CDN provider
        $fontBaseUrl = match($cdnProvider) {
            'jsdelivr' => "https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@{$fontAwesomeVersion}/webfonts",
            'cdnjs' => "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/{$fontAwesomeVersion}/webfonts",
            'unpkg' => "https://unpkg.com/@fortawesome/fontawesome-free@{$fontAwesomeVersion}/webfonts",
            default => "https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@{$fontAwesomeVersion}/webfonts",
        };
    @endphp

    {{-- Preload critical Font Awesome fonts for faster rendering --}}
    @if(config('cdn.enabled', true))
        <link rel="preload" href="{{ $fontBaseUrl }}/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $fontBaseUrl }}/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="{{ $fontBaseUrl }}/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    @endif

    <link rel="stylesheet" href="{{ $fontawesomeCss }}" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Optimize Font Awesome font loading with font-display: swap -->
    <style>
        /* Override Font Awesome @font-face declarations to add font-display: swap */
        /* This ensures text is visible immediately while fonts load in the background */
        @font-face {
            font-family: 'Font Awesome 6 Brands';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-brands-400.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-regular-400.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Font Awesome 6 Free';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-solid-900.woff2') format('woff2');
        }
        /* Font Awesome 5 compatibility */
        @font-face {
            font-family: 'Font Awesome 5 Brands';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-brands-400.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Font Awesome 5 Free';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-regular-400.woff2') format('woff2');
        }
        @font-face {
            font-family: 'Font Awesome 5 Free';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url('{{ $fontBaseUrl }}/fa-solid-900.woff2') format('woff2');
        }
    </style>
    <!-- font - stroyka -->
    {{-- Defer Stroyka font CSS to prevent render blocking - load asynchronously --}}
    @php
        $stroykaCss = asset('strokya/fonts/stroyka/stroyka.css');
    @endphp
    <link rel="preload" href="{{ $stroykaCss }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ $stroykaCss }}"></noscript>
    @include('layouts.yellow.color')
    <style>
        [x-cloak] {
            display: none !important;
        }

        .topbar__item {
            flex: none;
        }

        .page-header__container {
            padding-bottom: 12px;
        }

        .products-list__item {
            justify-content: space-between;
        }

        @media (max-width: 479px) {

            /* .products-list[data-layout=grid-5-full] .products-list__item {
                width: 46%;
                margin: 8px 6px;
            } */
            .product-card__buttons .btn {
                font-size: 0.75rem;
            }
        }

        @media (max-width: 575px) {
            .mobile-header__search {
                top: 55px;
            }

            .mobile-header__search-form .aa-input-icon {
                display: none;
            }

            .mobile-header__search-form .aa-hint,
            .mobile-header__search-form .aa-input {
                padding-right: 15px !important;
            }

            .block-products-carousel[data-layout=grid-4] .product-card .product-card__buttons .btn {
                height: auto;
            }
        }

        .product-card:before,
        .owl-carousel {
            z-index: 0;
        }

        .block-products-carousel[data-layout^=grid-] .product-card .product-card__info,
        .products-list[data-layout^=grid-] .product-card .product-card__info {
            padding: 0 14px;
        }

        .block-products-carousel[data-layout^=grid-] .product-card .product-card__actions,
        .products-list[data-layout^=grid-] .product-card .product-card__actions {
            padding: 0 14px 14px 14px;
        }

        .product-card__badges-list {
            flex-direction: row;
        }

        .product-card__name {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .product-card__buttons {
            margin-right: -12px !important;
            /* margin-bottom: -12px !important; */
            margin-left: -12px !important;
        }

        .product-card__buttons .btn {
            height: auto !important;
            font-size: 20px !important;
            padding: 0.25rem 0.15rem !important;
            border-radius: 0 !important;
            display: block;
            width: 100%;
        }

        .aa-input-container {
            width: 100%;
        }

        .algolia-autocomplete {
            width: 100%;
            display: flex !important;
        }

        #aa-search-input {
            box-shadow: none;
        }

        .indicator__area {
            padding: 0 8px;
        }

        .mobile-header__search.mobile-header__search--opened {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .mobile-header__search-form {
            width: 100%;
        }

        .mobile-header__search-form .aa-input-container {
            display: flex;
        }

        .mobile-header__search-form .aa-input-search {
            box-shadow: none;
        }

        .mobile-header__search-form .aa-hint,
        .mobile-header__search-form .aa-input {
            height: 54px;
            padding-right: 32px;
        }

        .mobile-header__search-form .aa-input-icon {
            right: 62px;
        }

        .mobile-header__search-form .aa-dropdown-menu {
            background-color: #f7f8f9;
            z-index: 9999 !important;
        }

        .aa-input-container input {
            font-size: 15px;

        }

        .toast {
            position: absolute;
            top: 10%;
            right: 10%;
            z-index: 9999;
        }

        .header-fixed .site__body {
            padding-top: 11rem;
        }

        @media (max-width: 991px) {
            .header-fixed .site__header {
                position: fixed;
                width: 100%;
                z-index: 9999;
            }

            .header-fixed .site__body {
                padding-top: 85px;
            }

            .header-fixed .mobilemenu__body {
                top: 85px;
            }
        }

        .dropcart__products-list {
            max-height: 300px;
            overflow-y: auto;
        }

        /** StickyNav **/
        .site-header.sticky {
            position: fixed;
            top: 0;
            min-width: 100%;
        }

        .site-header.sticky .site-header__middle {
            height: 65px;
        }

        /*.site-header.sticky .site-header__nav-panel,*/
        .site-header.sticky .site-header__topbar {
            display: none;
        }

        ::placeholder {
            color: #777 !important;
        }


        .widget-connect {
            position: fixed;
            bottom: 30px;
            z-index: 99 !important;
            cursor: pointer
        }

        .widget-connect-right {
            right: 27px;
            bottom: 22px
        }

        .widget-connect-left {
            left: 20px
        }

        @media (max-width:768px) {
            .widget-connect-left {
                left: 10px;
                bottom: 10px
            }
        }

        .widget-connect.active .widget-connect__button {
            display: grid;
            place-content: center;
            padding-top: 5px
        }

        .widget-connect__button {
            display: none;
            height: 55px;
            width: 55px;
            margin: auto;
            margin-bottom: 15px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
            font-size: 28px;
            text-align: center;
            line-height: 50px;
            color: #fff;
            outline: 0 !important;
            background-position: center center;
            background-repeat: no-repeat;
            transition: all;
            transition-duration: .2s
        }

        @media (max-width:768px) {
            .widget-connect__button {
                height: 50px;
                width: 50px
            }
        }

        .widget-connect__button-activator:hover,
        .widget-connect__button:hover {
            box-shadow: 2px 2px 8px 2px rgba(0, 0, 0, .4)
        }

        .widget-connect__button:active {
            height: 48px;
            width: 48px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0);
            transition: all;
            transition-duration: .2s
        }

        @media (max-width:768px) {
            .widget-connect__button:active {
                height: 45px;
                width: 45px
            }
        }

        .widget-connect__button-activator {
            margin: auto;
            border-radius: 50%;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
            background-position: center center;
            background-repeat: no-repeat;
            transition: all;
            transition-duration: .2s;
            text-align: right;
            z-index: 99 !important
        }

        .widget-connect__button-activator-icon {
            height: 55px;
            width: 55px;
            background-image: url(/multi-chat.svg);
            background-size: 55%;
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -o-transition-duration: .2s;
            transition-duration: .2s
        }

        @media (max-width:768px) {
            .widget-connect__button-activator-icon {
                height: 50px;
                width: 50px
            }
        }

        .widget-connect__button-activator-icon.active {
            background-image: url(/multi-chat.svg);
            background-size: 45%;
            transform: rotate(90deg)
        }

        .widget-connect__button-telephone {
            background-color: #FFB200;
            background-image: url(/catalog/view/theme/default/image/widget-multi-chat/call.svg);
            background-size: 55%
        }

        .widget-connect__button-messenger {
            background-color: #0866FF;
            background-image: url(/catalog/view/theme/default/image/widget-multi-chat/messenger.svg);
            background-size: 65%;
            background-position-x: 9px
        }

        .widget-connect__button-whatsapp {
            background-color: #25d366 !important;
            background-image: none !important;
            color: white !important;
        }
        
        .widget-connect__button-whatsapp i {
            color: white !important;
            font-size: 28px !important;
        }
        
        /* Product Discount Badge Styles */
        .product-card__badge--discount {
            background-color: #ff4444;
            color: white;
            font-weight: bold;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 4px;
            text-transform: uppercase;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .product-card__badge--sold {
            background-color: #6c757d;
            color: white;
            font-weight: bold;
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        @-webkit-keyframes button-slide {
            0% {
                opacity: 0;
                display: none;
                margin-top: 0;
                margin-bottom: 0;
                -ms-transform: translateY(15px);
                -webkit-transform: translateY(15px);
                -moz-transform: translateY(15px);
                -o-transform: translateY(15px);
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                display: block;
                margin-top: 0;
                margin-bottom: 10px;
                -ms-transform: translateY(0);
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0)
            }
        }

        @-moz-keyframes button-slide {
            0% {
                opacity: 0;
                display: none;
                margin-top: 0;
                margin-bottom: 0;
                -ms-transform: translateY(15px);
                -webkit-transform: translateY(15px);
                -moz-transform: translateY(15px);
                -o-transform: translateY(15px);
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                display: block;
                margin-top: 0;
                margin-bottom: 9px;
                -ms-transform: translateY(0);
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0)
            }
        }

        @-o-keyframes button-slide {
            0% {
                opacity: 0;
                display: none;
                margin-top: 0;
                margin-bottom: 0;
                -ms-transform: translateY(15px);
                -webkit-transform: translateY(15px);
                -moz-transform: translateY(15px);
                -o-transform: translateY(15px);
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                display: block;
                margin-top: 0;
                margin-bottom: 10px;
                -ms-transform: translateY(0);
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0)
            }
        }

        @keyframes button-slide {
            0% {
                opacity: 0;
                display: none;
                margin-top: 0;
                margin-bottom: 0;
                -ms-transform: translateY(15px);
                -webkit-transform: translateY(15px);
                -moz-transform: translateY(15px);
                -o-transform: translateY(15px);
                transform: translateY(15px)
            }

            to {
                opacity: 1;
                display: block;
                margin-top: 0;
                margin-bottom: 10px;
                -ms-transform: translateY(0);
                -webkit-transform: translateY(0);
                -moz-transform: translateY(0);
                -o-transform: translateY(0);
                transform: translateY(0)
            }
        }

        .button-slide {
            -webkit-animation-name: button-slide;
            -moz-animation-name: button-slide;
            -o-animation-name: button-slide;
            animation-name: button-slide;
            -webkit-animation-duration: .2s;
            -moz-animation-duration: .2s;
            -o-animation-duration: .2s;
            animation-duration: .2s;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            -o-animation-fill-mode: forwards;
            animation-fill-mode: forwards
        }

        .button-slide-out {
            -webkit-animation-name: button-slide;
            -moz-animation-name: button-slide;
            -o-animation-name: button-slide;
            animation-name: button-slide;
            -webkit-animation-duration: .2s;
            -moz-animation-duration: .2s;
            -o-animation-duration: .2s;
            animation-duration: .2s;
            -webkit-animation-fill-mode: forwards;
            -moz-animation-fill-mode: forwards;
            -o-animation-fill-mode: forwards;
            animation-fill-mode: forwards;
            -webkit-animation-direction: reverse;
            -moz-animation-direction: reverse;
            -o-animation-direction: reverse;
            animation-direction: reverse
        }

        .widget-connect .tooltip {
            position: absolute;
            z-index: 99 !important;
            display: block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            filter: alpha(opacity=0);
            opacity: 0;
            line-break: auto;
            padding: 5px
        }

        .tooltip-inner {
            max-width: 200px;
            padding: 5px 10px;
            color: #fff;
            text-align: center;
            background-color: #333;
            border-radius: 4px
        }

        .tooltip.left .tooltip-arrow {
            top: 50%;
            right: 0;
            margin-top: -5px;
            border-width: 5px 0 5px 5px;
            border-left-color: #333
        }

        .tooltip.right .tooltip-arrow {
            top: 50%;
            left: 0;
            margin-top: -5px;
            border-width: 5px 5px 5px 0;
            border-right-color: #333
        }

        @media only screen and (max-width: 575px) {
            .widget-connect-right {
                bottom: 50px !important
            }
        }
    </style>
    @stack('styles')
    @livewireStyles
    {{-- Google Fonts are loaded asynchronously, no preconnect needed (reduces preconnect count) --}}
    {{-- Load Google Fonts asynchronously to prevent render blocking --}}
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@100..900&display=swap" rel="stylesheet"></noscript>
{!! $scripts ?? null !!}
    @stack('head')
</head>

<body class="header-fixed" style="margin: 0; padding: 0;">
    {{-- GTM NoScript MUST be first element in body tag per Google requirements --}}
    {!! setting('gtm_noscript') ?? '' !!}
    
    <x-livewire-progress bar-class="bg-warning" track-class="bg-white/50" />
    {{-- Analytics scripts will be loaded after page is interactive to reduce main-thread blocking --}}
    <x-livewire-progress bar-class="bg-warning" track-class="bg-white/50" />
    <script data-navigate-once>
        // Defer analytics body scripts to reduce main-thread blocking
        (function() {
            // Track loaded scripts to prevent duplicates during SPA navigation
            if (!window.__analyticsLoaded) {
                window.__analyticsLoaded = new Set();
            }

            function loadDeferredAnalyticsBody() {
                const bodyDiv = document.getElementById('deferred-analytics-body');
                if (!bodyDiv) {
                    return; // Already processed or doesn't exist
                }

                // Move scripts from hidden div to body, delaying inline script execution
                const scripts = bodyDiv.querySelectorAll('script');
                scripts.forEach(function(script) {
                    // Check if script already exists to prevent duplicates
                    if (script.src) {
                        // Check if script with same src already exists
                        const existingScript = document.querySelector('script[src="' + script.src + '"]');
                        if (existingScript || window.__analyticsLoaded.has(script.src)) {
                            return; // Skip if already loaded
                        }
                        window.__analyticsLoaded.add(script.src);
                    } else {
                        // For inline scripts, check by data attribute or content hash
                        const scriptId = script.getAttribute('data-gtm-id') || script.getAttribute('id');
                        if (scriptId && window.__analyticsLoaded.has(scriptId)) {
                            return; // Skip if already loaded
                        }
                        if (scriptId) {
                            window.__analyticsLoaded.add(scriptId);
                        }
                    }

                    const newScript = document.createElement('script');
                    if (script.src) {
                        // For external scripts, use async to delay loading
                        newScript.src = script.src;
                        newScript.async = true;
                    } else {
                        // For inline scripts, wrap in setTimeout to delay execution
                        newScript.textContent = 'setTimeout(function(){' + script.textContent + '}, 100);';
                    }
                    // Copy data attributes
                    Array.from(script.attributes).forEach(function(attr) {
                        if (attr.name.startsWith('data-')) {
                            newScript.setAttribute(attr.name, attr.value);
                        }
                    });
                    document.body.appendChild(newScript);
                });
                // Move noscript and iframe tags
                const noscripts = bodyDiv.querySelectorAll('noscript');
                noscripts.forEach(function(noscript) {
                    // Check if noscript already exists
                    const noscriptContent = noscript.textContent || noscript.innerHTML;
                    const existingNoscript = Array.from(document.body.querySelectorAll('noscript')).find(function(ns) {
                        return (ns.textContent || ns.innerHTML) === noscriptContent;
                    });
                    if (!existingNoscript) {
                        document.body.appendChild(noscript.cloneNode(true));
                    }
                });
                bodyDiv.remove();
            }

            // Only load if not already loaded (prevent duplicate execution during SPA navigation)
            if (!window.__analyticsBodyLoaded) {
                window.__analyticsBodyLoaded = true;
                // Load after page is interactive (requestIdleCallback with longer timeout)
                if ('requestIdleCallback' in window) {
                    requestIdleCallback(loadDeferredAnalyticsBody, { timeout: 5000 });
                } else if (document.readyState === 'complete') {
                    setTimeout(loadDeferredAnalyticsBody, 3000);
                } else {
                    window.addEventListener('load', function() {
                        setTimeout(loadDeferredAnalyticsBody, 3000);
                    }, { once: true });
                }
            }
        })();
    </script>
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div><!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-20') }}"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse
                    data-collapse-opened-class="mobile-links__item--open">
                    @include('partials.mobile-menu-categories')
                    @include('partials.header.menu.mobile')
                </ul>
            </div>
        </div>
    </div><!-- mobilemenu / end -->
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        @include('partials.header.mobile')
        <!-- mobile site__header / end -->
        <!-- desktop site__header -->
        @include('partials.header.desktop')
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <div class="container">
                {{-- Removed reseller verification alert --}}
                <x-alert-box class="mt-2 row" />
            </div>
            @yield('content')
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        @include('partials.footer')
        <!-- site__footer / end -->
    </div><!-- site / end -->
    @livewireScripts
    <script>
        // Register shared Alpine components (mirrors storefront behavior)
        document.addEventListener('alpine:init', () => {
            Alpine.data('sumPrices', (initialState = {}) => ({
                retail: initialState.retail ?? {},
                advanced: Number(initialState.advanced ?? 0),
                retail_delivery: Number(initialState.retail_delivery ?? initialState
                    .retailDeliveryFee ?? 0),
                retailDiscount: Number(initialState.retailDiscount ?? 0),

                init() {
                    console.log('sumPrices initialized with state:', initialState);
                    
                    const sync = (field, value) => {
                        if (this?.$wire && typeof this.$wire.updateField === 'function') {
                            console.log('Syncing field:', field, 'value:', value);
                            this.$wire.updateField(field, value);
                        }
                    };

                    // Keep UI fully client-side reactive; sync scalar fields to backend in the background.
                    this.$watch('advanced', (value) => sync('advanced', value));
                    this.$watch('retail_delivery', (value) => sync('retailDeliveryFee', value));
                    this.$watch('retailDiscount', (value) => sync('retailDiscount', value));
                    
                    // Watch for retail changes and sync them
                    this.$watch('retail', (value) => {
                        console.log('Retail changed:', value);
                        sync('retail', value);
                    });
                },

                get subtotal() {
                    console.log('Calculating subtotal with retail:', this.retail);
                    
                    if (!this.retail || typeof this.retail !== 'object') {
                        console.log('Retail is not an object, returning 0');
                        return 0;
                    }

                    const total = Object.values(this.retail).reduce((total, item) => {
                        if (!item || typeof item !== 'object') {
                            console.log('Invalid item:', item);
                            return total;
                        }

                        const price = parseFloat(item.price) || 0;
                        const quantity = parseInt(item.quantity) || 0;
                        const itemTotal = price * quantity;
                        
                        console.log('Item calculation:', { price, quantity, itemTotal });
                        
                        return total + itemTotal;
                    }, 0);
                    
                    console.log('Subtotal calculated:', total);
                    return total;
                },

                get sellingTotal() {
                    const total = (
                        this.subtotal +
                        Number(this.retail_delivery || 0) -
                        Number(this.advanced || 0) -
                        Number(this.retailDiscount || 0)
                    );
                    console.log('Selling total calculated:', {
                        subtotal: this.subtotal,
                        retail_delivery: this.retail_delivery,
                        advanced: this.advanced,
                        retailDiscount: this.retailDiscount,
                        total
                    });
                    return total;
                },

                format(price) {
                    const formatted = 'TK ' + (parseFloat(price) || 0).toLocaleString('en-US', {
                        maximumFractionDigits: 0,
                    });
                    console.log('Formatted price:', price, '->', formatted);
                    return formatted;
                },
            }));
        });
    </script>

    @include('layouts.yellow.js')
    {{-- Defer xzoom scripts - only needed on product detail pages, not critical for initial render --}}
    <script src="{{ asset('strokya/vendor/xzoom/xzoom.min.js') }}" defer></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/vendor/modernizr.js') }}" defer></script>
    <script src="{{ asset('strokya/vendor/xZoom-master/example/js/setup.js') }}" defer></script>
    {{-- External JavaScript files for better caching and performance --}}
    <script src="{{ versionedAsset('strokya/js/notify-handler.js') }}" defer></script>
    <script src="{{ versionedAsset('strokya/js/product-gallery.js') }}" defer></script>
    <script src="{{ versionedAsset('strokya/js/storefront-components.js') }}" defer></script>
    <script src="{{ versionedAsset('strokya/js/whatsapp-handlers.js') }}" defer></script>
    <script src="{{ versionedAsset('strokya/js/facebook-events.js') }}" defer></script>
    {{-- All JavaScript has been moved to external files for better caching --}}
    {{-- See: strokya/js/product-gallery.js, notify-handler.js, storefront-components.js, etc. --}}
    <style>
        /* Ensure category submenus show on hover */
        .departments__item--menu:hover>.departments__menu {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            z-index: 1000 !important;
        }

        /* Nested submenus */
        .departments__menu .menu>li:hover>.menu__submenu {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
            z-index: 1001 !important;
        }

        /* CRITICAL: Always allow submenus to overflow when opened */
        /* We handle the closing overflow-hidden via JS now */
        .departments.departments--opened .departments__body,
        .departments.departments--opened .departments__links-wrapper {
            overflow: visible !important;
        }
    </style>
    {{-- Storefront components moved to external file: strokya/js/storefront-components.js --}}
    @livewireScripts
    @stack('scripts')
    @php
        function phone88($phone)
        {
            $phone = preg_replace('/[^\d]/', '', $phone);
            if (strlen($phone) == 11) {
                $phone = '88' . $phone;
            }
            return $phone;
        }
        $messenger = $company->messenger ?? '';
        $phone = phone88($company->whatsapp ?? '');
    @endphp
    @if ($phone && strlen($messenger) > 13)
    <div class="widget-connect widget-connect-right">
            @if ($messenger)
                <a class="widget-connect__button widget-connect__button-telemessenger button-slide-out"
                    style="background: white; color: blue; display: flex; align-items: center; justify-content: center;" href="{{ $messenger }}" data-toggle="tooltip"
                    data-placement="left" title="" target="_blank" data-original-title="Messenger">
            <i class="fab fa-facebook-messenger" style="font-size: 24px;"></i>
        </a>
        @endif
            @if ($phone)
                <a class="widget-connect__button widget-connect__button-whatsapp button-slide-out"
                    style="background: #25d366; color: white; display: flex; align-items: center; justify-content: center;" href="https://wa.me/{{ $phone }}"
                    data-toggle="tooltip" data-placement="left" title="" data-original-title="WhatsApp"
                    data-whatsapp-url="https://wa.me/{{ $phone }}"
                    onclick="window.location.href=this.getAttribute('data-whatsapp-url')||this.href;return false;">
                    <i class="fab fa-whatsapp" style="font-size: 24px;"></i>
                </a>
            @endif
        <div class="widget-connect__button-activator" style="background-color: #ff0000;">
            <div class="widget-connect__button-activator-icon"></div>
        </div>
    </div>
    @elseif ($phone)
        <a href="https://api.whatsapp.com/send?phone={{ $phone }}"
            style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 2px 2px 3px #999;z-index:100;cursor:pointer; display: flex; align-items: center; justify-content: center;"
            data-whatsapp-url="https://api.whatsapp.com/send?phone={{ $phone }}"
            onclick="window.location.href=this.getAttribute('data-whatsapp-url')||this.href;return false;">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.06 3.973L0 16l4.14-1.086c1.17.637 2.483.973 3.81.975h.003c4.368 0 7.926-3.559 7.93-7.93a7.897 7.897 0 0 0-2.342-5.633zM7.994 14.522a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
        </a>
    @elseif (strlen($messenger) > 13)
        <a href="{{ $messenger }}" target="_blank"
            style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#0084ff;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 2px 2px 3px #999;z-index:100; display: flex; align-items: center; justify-content: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.112-2.316-.314l-2.361.918c-.282.11-.563-.122-.49-.403l.428-1.637C1.11 12.564 0 10.3 0 7.76zm8.257-3.528-2.613 2.766 2.378 1.01 2.613-2.766-2.378-1.01z"/>
            </svg>
        </a>
    @endif
    {{-- WhatsApp handlers moved to external file: strokya/js/whatsapp-handlers.js --}}
    {{-- Facebook events moved to external file: strokya/js/facebook-events.js --}}
    {{-- xzoom click handler moved to: strokya/js/product-gallery.js --}}
    <script>
    // Standard dataLayer handler - Meta recommended approach
    window.addEventListener('dataLayer', event => {
        window.dataLayer = window.dataLayer || [];
        const data = event.detail;
        
        // Handle both single objects and arrays of objects
        const items = Array.isArray(data) ? data : [data];
        
        items.forEach(item => {
            if (!item) return;
            
            // Generate eventID if missing
            if (!item.eventID) {
                item.eventID = 'evt_' + Math.random().toString(36).substr(2, 9) + '_' + Date.now();
            }
            
            window.dataLayer.push(item);
        });
    });
    
    </script>
</body>

</html>
