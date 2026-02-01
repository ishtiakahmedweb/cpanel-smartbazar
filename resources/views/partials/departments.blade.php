<div class="nav-panel__departments">
    <!-- .departments -->
    @php 
        // Always set $fixed to false to prevent auto-opening as requested
        $fixed = false; 
    @endphp
    <div class="departments" id="shop-by-category-menu">
        <button class="departments__button" type="button" aria-expanded="false" aria-haspopup="true">
            <svg class="departments__button-icon" width="18px" height="14px">
                <use xlink:href="{{ asset('strokya/images/sprite.svg#menu-18x14') }}"></use>
            </svg>
            <span class="departments__button-title">Shop By Category</span>
            <svg class="departments__button-arrow" width="9px" height="6px">
                <use xlink:href="{{ asset('strokya/images/sprite.svg#arrow-rounded-down-9x6') }}"></use>
            </svg>
        </button>
        <div class="departments__body">
            <div class="departments__links-wrapper">
                <ul class="departments__links">
                    @foreach($categories as $category)
                        <li class="departments__item @if($category->childrens->isNotEmpty()) departments__item--menu @endif">
                            <a href="{{ route('categories.products', $category) }}" wire:navigate.hover>
                                {{ $category->name }}
                                @if ($category->childrens->isNotEmpty())
                                    <svg class="departments__link-arrow" width="6px" height="9px">
                                        <use xlink:href="{{ asset('strokya/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                                    </svg>
                                @endif
                            </a>
                            @if($category->childrens->isNotEmpty())
                                <div class="departments__menu">
                                    <ul class="menu menu--layout--classic">
                                        @foreach ($category->childrens as $category)
                                            <li>
                                                <a href="{{ route('categories.products', $category) }}" wire:navigate.hover>
                                                    {{ $category->name }}
                                                    @if ($category->childrens->isNotEmpty())
                                                        <svg class="menu__arrow" width="6px" height="9px">
                                                            <use xlink:href="{{ asset('strokya/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                                                        </svg>
                                                    @endif
                                                </a>
                                                @if($category->childrens->isNotEmpty())
                                                    <div class="menu__submenu">
                                                        <ul class="menu menu--layout--classic">
                                                            @foreach($category->childrens as $category)
                                                                <li><a href="{{ route('categories.products', $category) }}" wire:navigate.hover>{{ $category->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                    <li class="departments__item">
                        <a href="{{ route('categories') }}" wire:navigate.hover>
                            View All Categories
                            <svg class="departments__link-arrow" width="6px" height="9px">
                                <use xlink:href="{{ asset('strokya/images/sprite.svg#arrow-rounded-right-6x9') }}"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!-- .departments / end -->
</div>

<style>
    /* Premium Button Styling */
    .departments__button {
        display: grid !important;
        grid-template-columns: 32px 1fr 32px !important;
        align-items: center !important;
        justify-items: center !important;
        background: var(--header-bg, #fff) !important;
        color: var(--header-text, #333) !important;
        cursor: pointer !important;
        height: 42px !important;
        border: 1px solid rgba(0,0,0,0.1) !important;
        border-radius: 4px !important;
        padding: 0 12px !important;
        font-weight: 600 !important;
        font-size: 14px !important;
        transition: all 0.2s ease !important;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05) !important;
        width: auto !important;
        min-width: 220px;
        margin: 0 auto !important;
        position: relative;
        z-index: 10;
        outline: none !important;
    }

    .departments__button:hover {
        background-color: var(--primary) !important;
        color: #ffffff !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
        border-color: var(--primary) !important;
    }

    .departments__button:hover .departments__button-icon,
    .departments__button:hover .departments__button-arrow {
        fill: #ffffff !important;
    }

    .departments__button-title {
        color: inherit !important;
        grid-column: 2 !important;
        text-align: center !important;
        margin: 0 !important;
        width: 100% !important;
        display: block !important;
        white-space: nowrap !important;
    }

    .departments__button-icon {
        grid-column: 1 !important;
        position: static !important;
        flex-shrink: 0 !important;
        fill: var(--header-text, #333) !important;
    }

    .departments__button-arrow {
        grid-column: 3 !important;
        position: static !important;
        flex-shrink: 0 !important;
        fill: var(--header-text, #333) !important;
        transition: transform 0.3s ease !important;
    }

    /* Smooth Dropdown Animation */
    #shop-by-category-menu .departments__body {
        opacity: 0;
        visibility: hidden;
        display: block !important;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 1000;
        background: #fff !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border: 1px solid #ebebeb;
        border-top: none;
        border-radius: 0 0 5px 5px;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease !important;
        overflow: hidden;
    }

    /* Active State for Dropdown */
    #shop-by-category-menu.departments--open .departments__body {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    #shop-by-category-menu.departments--open .departments__button-arrow {
        transform: rotate(180deg);
    }

    /* Link and Hover States */
    #shop-by-category-menu .departments__links {
        background: #fff !important;
        padding: 8px 0;
        margin: 0;
        list-style: none;
    }

    #shop-by-category-menu .departments__item > a {
        color: #3d464d !important;
        padding: 12px 20px;
        display: block;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.2s ease, color 0.2s ease !important;
    }

    #shop-by-category-menu .departments__item:hover > a {
        background: #f4f4f4 !important;
        color: var(--primary) !important;
    }

    /* Restore Sub-menus (Native Hover) */
    .departments__item--menu:hover .departments__menu {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }

    /* Positioning adjustment for nav panel row */
    .nav-panel__departments {
        padding: 0; /* Centered by flexbox */
    }
</style>

<script>
    (function() {
        function initShopMenu() {
            const container = document.getElementById('shop-by-category-menu');
            const button = container ? container.querySelector('.departments__button') : null;
            
            if (!container || !button) return;

            const toggleMenu = function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isOpen = container.classList.toggle('departments--open');
                button.setAttribute('aria-expanded', isOpen);
            };

            // Modern event listener handling
            button.onclick = toggleMenu;

            // Close on click outside
            document.addEventListener('click', function(e) {
                if (!container.contains(e.target)) {
                    container.classList.remove('departments--open');
                    button.setAttribute('aria-expanded', 'false');
                }
            });
        }

        // Support for standard and Livewire navigation
        if (typeof window.initShopMenu === 'undefined') {
            window.initShopMenu = initShopMenu;
            document.addEventListener('DOMContentLoaded', window.initShopMenu);
            document.addEventListener('livewire:navigated', window.initShopMenu);
        }
    })();
</script>
