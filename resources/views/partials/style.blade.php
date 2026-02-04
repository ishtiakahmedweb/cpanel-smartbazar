@php
    $color = setting('color');
@endphp
@if($color)
<style>
    :root {
        --topbar-bg: {{ $color->topbar->background_color ?? '#f8f9fa' }};
        --topbar-text: {{ $color->topbar->text_color ?? '#333' }};
        --header-bg: {{ $color->header->background_color ?? '#ffffff' }};
        --header-text: {{ $color->header->text_color ?? '#333' }};
        --navbar-bg: {{ $color->navbar->background_color ?? '#007bff' }};
        --navbar-text: {{ $color->navbar->text_color ?? '#ffffff' }};
        --footer-bg: {{ $color->footer->background_color ?? '#333' }};
        --footer-text: {{ $color->footer->text_color ?? '#fff' }};
        --footer-hover: {{ $color->footer->text_hover ?? '#f8f9fa' }};
        --primary-color: {{ $color->primary->background_color ?? '#007bff' }};
    }

    /* Footer Colors */
    .site__footer {
        background-color: var(--footer-bg) !important;
        color: var(--footer-text) !important;
    }
    .site-footer__copyright, 
    .footer-contacts__title,
    .footer-contacts__text,
    .footer-links__title,
    .footer-newsletter__title,
    .footer-newsletter__text {
        color: var(--footer-text) !important;
    }
    
    .footer-links__link,
    .footer-contacts__contacts li,
    .footer-newsletter__social-link a {
        color: var(--footer-text) !important;
        transition: color 0.3s ease;
    }

    /* Hover Effects */
    .footer-links__link:hover,
    .site-footer a:hover {
        color: var(--footer-hover) !important;
        text-decoration: none;
    }

    /* Topbar */
    .site-header__topbar, .topbar {
        background-color: var(--topbar-bg) !important;
        color: var(--topbar-text) !important;
    }
    .topbar-link, .topbar__item {
        color: var(--topbar-text) !important;
    }

    /* Header */
    .site-header__middle {
        background-color: var(--header-bg) !important;
    }

    /* Navbar/Menu */
    .nav-panel {
        background-color: var(--navbar-bg) !important;
    }
    .nav-links__item > a {
        color: var(--navbar-text) !important;
    }
</style>
@endif
