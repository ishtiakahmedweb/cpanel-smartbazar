<header class="site__header d-lg-none">
    @include('partials.topbar')
    <div class="mobile-header mobile-header--sticky mobile-header--stuck">
        <div class="mobile-header__panel">
            <div class="container">
                <div class="mobile-header__body">
                    <button class="mobile-header__menu-button">
                        <i class="fas fa-bars" style="font-size: 20px; color: var(--primary);"></i>
                    </button>
                    <a class="mobile-header__logo" href="{{ url('/') }}" wire:navigate.hover>
                        <img src="{{ asset($logo->mobile ?? '') }}" alt="Logo" style="max-height: 48px; width: auto; display: block;" width="auto" height="48">
                    </a>
                    <div class="mobile-header__search">
                        <div class="search mobile-header__search-form">
                            <!-- HTML Markup -->
                            <form action="shop" class="aa-input-container" id="bb-input-container">
                                <input type="search" id="bb-search-input" class="aa-input-search mobile-header__search-input" placeholder="Search for products..." name="search" value="{{ request('search') }}" autocomplete="off" />
                                <svg class="aa-input-icon" viewBox="654 -372 1664 1664" style="fill: var(--primary);">
                                    <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
                                </svg>
                                <button
                                    class="mobile-header__search-button mobile-header__search-button--close"
                                    type="button" style="color: var(--primary);"><svg width="20px" height="20px">
                                        <use xlink:href="{{ asset('strokya/images/sprite.svg#cross-20') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="mobile-header__indicators">
                        <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                            <button class="indicator__button">
                                <span class="indicator__area">
                                    <i class="fas fa-search" style="font-size: 18px; color: var(--primary);"></i>
                                </span>
                            </button>
                        </div>
                        <div class="indicator indicator--trigger--click">
                            <a href="#" class="indicator__button">
                                <span class="indicator__area">
                                    <i class="fas fa-shopping-cart" style="font-size: 18px; color: var(--primary);"></i>
                                    <livewire:cart-count />
                                </span>
                            </a>
                            <div class="indicator__dropdown">
                                <!-- .dropcart -->
                                <livewire:cart-box />
                            </div>
                        </div>
                        @include('partials.auth-indicator')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
