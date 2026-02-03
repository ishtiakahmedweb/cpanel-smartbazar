<style>
    @php 
        $color = optional($color ?? null);
        $primaryColor = $color->primary->background_color ?? '#5E2D8E';
        $primaryHover = $color->primary->background_hover ?? '#4A2472';
        $topbarBg = $color->topbar->background_color ?? $primaryColor;
        $topbarText = $color->topbar->text_color ?? '#ffffff';
        $headerBg = $color->header->background_color ?? '#ffffff';
        $headerText = $color->header->text_color ?? '#333333';
        $navBg = $color->navbar->background_color ?? '#ffffff';
        $navText = $color->navbar->text_color ?? '#333333';
        $footerBg = $color->footer->background_color ?? '#333333';
        $footerText = $color->footer->text_color ?? '#ffffff';
        $footerHover = $color->footer->text_hover ?? '#f8f9fa';
        $sectionBg = $color->section->background_color ?? $primaryColor;
        $sectionText = $color->section->text_color ?? '#ffffff';
    @endphp
    :root {
        --primary: {{ $primaryColor }};
        --primary-hover: {{ $primaryHover }};
        --primary-purple: {{ $primaryColor }}; {{-- Legacy support --}}
        
        --topbar-bg: {{ $topbarBg }};
        --topbar-text: {{ $topbarText }};
        
        --header-bg: {{ $headerBg }};
        --header-text: {{ $headerText }};
        
        --navbar-bg: {{ $navBg }};
        --navbar-text: {{ $navText }};

        --footer-bg: {{ $footerBg }};
        --footer-text: {{ $footerText }};
        --footer-hover: {{ $footerHover }};

        --section-bg: {{ $sectionBg }};
        --section-text: {{ $sectionText }};

        --order-now-bg: {{ $color->order_now->background_color ?? '#ffc107' }};
        --order-now-text: {{ $color->order_now->text_color ?? '#000000' }};
        
        --add-to-cart-bg: {{ $color->add_to_cart->background_color ?? '#eeeeee' }};
        --add-to-cart-text: {{ $color->add_to_cart->text_color ?? '#333333' }};
    }

    ::placeholder {
        color: #ccc !important;
    }

    /* Topbar */
    .topbar, .site-header .topbar {
        background-color: var(--topbar-bg) !important;
        color: var(--topbar-text) !important;
    }
    .topbar .topbar-link, .site-header .topbar .topbar-link {
        color: var(--topbar-text) !important;
    }

    /* Header */
    .site-header {
        background-color: var(--header-bg) !important;
        color: var(--header-text) !important;
    }
    .site-header__phone-title, .site-header__phone-number, .site-header__phone-number a {
        color: var(--header-text) !important;
    }

    /* Mobile Header - Standardized to Header White */
    @media (max-width: 991px) {
        .mobile-header, .mobile-header__panel {
            background-color: var(--header-bg) !important;
        }
        .mobile-header__menu-button i, 
        .mobile-header__indicators .indicator__button i,
        .mobile-header__indicators .indicator__area {
            color: var(--primary) !important;
        }
        .mobile-header__indicators .indicator__value {
            background: var(--primary) !important;
            color: #ffffff !important;
        }
    }

    /* Navbar */
    .site-header .nav-panel {
        background-color: var(--navbar-bg) !important;
    }
    .nav-links__item > a span, .indicator .indicator__area {
        color: var(--navbar-text) !important;
    }

    /* Categories Menu */
    .departments__body {
        background: {{ $color->category_menu->background_color ?? '#ffffff' }} !important;
    }
    .departments__button {
        background-color: var(--primary) !important;
        color: #ffffff !important;
    }
    .departments__links > li:hover > a {
        background: {{ $color->category_menu->background_hover ?? '#f7f7f7' }} !important;
        color: {{ $color->category_menu->text_hover ?? 'var(--primary)' }} !important;
    }

    /* Section Headers */
    .block-header__title, .block-header__arrow {
        background: var(--section-bg) !important;
        color: var(--section-text) !important;
    }
    .block-header__title a {
        color: var(--section-text) !important;
    }
    .block-header__divider {
        background: var(--section-bg) !important;
        opacity: 0.1;
    }

    /* Buttons */
    .btn-primary {
        background-color: var(--primary) !important;
        border-color: var(--primary) !important;
        color: #ffffff !important;
    }
    .btn-primary:hover {
        background-color: var(--primary-hover) !important;
        border-color: var(--primary-hover) !important;
    }
    .product-card__addtocart, .product__addtocart {
        background-color: var(--add-to-cart-bg) !important;
        border-color: var(--add-to-cart-bg) !important;
        color: var(--add-to-cart-text) !important;
    }
    .product-card__ordernow, .product__ordernow {
        background-color: var(--order-now-bg) !important;
        border-color: var(--order-now-bg) !important;
        color: var(--order-now-text) !important;
        animation: driftZoom 2s ease-in-out infinite;
    }

    /* Footer */
    .site-footer {
        background: var(--footer-bg) !important;
        color: var(--footer-text) !important;
    }
    .site-footer li a, .site-footer__widgets h5 {
        color: var(--footer-text) !important;
    }
    .site-footer a:hover {
        color: var(--footer-hover) !important;
    }

    @keyframes driftZoom {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(0.9); }
    }
</style>
