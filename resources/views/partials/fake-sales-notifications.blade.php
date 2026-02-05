@php
    // Fetch random products for the fake notifications
    // Cache for 60 minutes
    $fakeSaleProducts = \Illuminate\Support\Facades\Cache::remember('fake_sales_products_v4', 3600, function () {
        return \App\Models\Product::where('is_active', true)
            ->whereNotNull('slug')
            ->with(['images' => function($query) {
                $query->where('img_type', 'base');
            }])
            ->inRandomOrder()
            ->limit(50)
            ->get()
            ->map(function ($product) {
                return [
                    'name' => $product->name,
                    'image' => $product->base_image?->src ?? asset('logo.png'), 
                    'url' => route('products.show', $product->slug),
                    'time' => 'Just now', 
                ];
            });
    });
@endphp

@if($fakeSaleProducts->isNotEmpty())
<div id="fake-sales-notification" class="fake-sales-notification" style="display: none;">
    <div class="fake-sales-content">
        <div class="fake-sales-image-wrapper">
            <img id="fs-image" src="" alt="Product" class="fake-sales-image">
        </div>
        <div class="fake-sales-details">
            <!-- Row 1: Name + Verified -->
            <div class="fs-row-header">
                <span id="fs-customer" class="fs-customer-name"></span>
                <span class="fs-verified-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg> Verified
                </span>
            </div>
            
            <!-- Row 3: Product Name with Order Context -->
            <div class="fs-row-product">
                <span class="fs-order-context">Ordered: </span>
                <a href="#" id="fs-product-link" class="fs-product-link"></a>
            </div>

            <!-- Row 4: Time -->
            <div class="fs-row-time">
                <small id="fs-time"></small>
            </div>
        </div>
        <button id="fs-close" class="fs-close" aria-label="Close">&times;</button>
        <!-- Progress Bar -->
        <div class="fs-progress-bar">
            <div class="fs-progress-fill"></div>
        </div>
    </div>
</div>

<style>
    /* 
       Global / Desktop Styles 
    */
    .fake-sales-notification {
        position: fixed;
        bottom: 50px; /* Ideal height to be noticed but stay clear of most UI */
        left: 20px;
        z-index: 99998;
        background: rgba(255, 255, 255, 0.85); /* Premium Glassmorphism */
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08); /* Soft premium shadow */
        width: 320px;
        max-width: 90vw;
        padding: 0;
        font-family: 'SolaimanLipi', 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
        opacity: 0;
        transform: translateX(-40px); /* Slide from LEFT */
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1); /* Bouncy entry */
        pointer-events: none;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.6);
        border-left: 4px solid #ff6a00; /* Sidebar accent back on the left */
        display: flex;
    }

    .fake-sales-notification.show {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
    }

    .fake-sales-content {
        display: flex;
        align-items: center;
        padding: 12px 14px;
        position: relative;
        width: 100%;
    }

    .fake-sales-image-wrapper {
        flex-shrink: 0;
        width: 55px;
        height: 55px;
        border-radius: 8px;
        overflow: hidden;
        background: #f8f9fa;
        margin-right: 15px;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .fake-sales-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fake-sales-details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-width: 0;
        padding-right: 20px;
    }

    .fs-row-header {
        display: flex;
        align-items: center;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .fs-customer-name {
        font-weight: 800;
        font-size: 14px;
        color: #111;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fs-verified-badge {
        display: inline-flex;
        align-items: center;
        color: #2196F3; /* Pro Blue for Trust */
        font-size: 8px;
        margin-left: 6px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .fs-verified-badge svg {
        margin-right: 2px;
        width: 11px;
        height: 11px;
    }

    .fs-row-product {
        display: flex;
        align-items: baseline;
        width: 100%;
        line-height: 1.3;
        margin-bottom: 2px;
    }

    .fs-order-context {
        font-size: 12px;
        color: #666;
        font-weight: 500;
        margin-right: 4px;
    }

    .fs-product-link {
        font-size: 13px;
        font-weight: 700;
        color: #000; /* Realistic black */
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
        max-width: 160px;
    }
    .fs-product-link:hover {
        text-decoration: underline;
        color: #ff6a00;
    }

    .fs-row-time {
        font-size: 10px;
        color: #888;
        font-weight: 500;
        display: flex;
        align-items: center;
    }
    
    .fs-row-time::before {
        content: '';
        display: inline-block;
        width: 4px;
        height: 4px;
        background: #4caf50; /* Active dot */
        border-radius: 50%;
        margin-right: 5px;
    }

    .fs-close {
        position: absolute;
        top: 6px;
        right: 8px;
        background: transparent;
        border: none;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #ccc;
        font-size: 18px;
        transition: color 0.2s;
    }
    .fs-close:hover {
        color: #666;
    }

    .fs-progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2.5px;
        background: rgba(0,0,0,0.03);
    }
    
    .fs-progress-fill {
        height: 100%;
        background: #ff6a00;
        width: 0%;
        transition: width linear;
    }

    /* MOBILE OPTIMIZATION */
    @media (max-width: 575px) {
        .fake-sales-notification {
            bottom: 25px !important;
            left: 10px;
            width: 280px;
            border-left: 3px solid #ff6a00;
            border-right: none;
        }
        .fake-sales-content {
            padding: 10px;
        }
        .fake-sales-image-wrapper {
            width: 48px;
            height: 48px;
            margin-right: 12px;
        }
        .fs-customer-name { font-size: 12px; }
        .fs-product-link { font-size: 12px; max-width: 130px; }
        .fs-order-context { font-size: 11px; }
    }
</style>

<script>
    (function() {
        if (typeof window.fakeSalesTimeout === 'undefined') {
            window.fakeSalesTimeout = null;
        }
        window.fakeSalesUsedIndices = window.fakeSalesUsedIndices || [];

        function initFakeSales() {
            if (window.fakeSalesTimeout) {
                clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = null;
            }

            const products = @json($fakeSaleProducts);
            if (!products || products.length === 0) return;

            const people = [
                { name: 'রফিকুল ইসলাম', location: 'ঢাকা' },
                { name: 'সুমাইয়া আক্তার', location: 'চট্টগ্রাম' },
                { name: 'মোঃ হাসান', location: 'সিলেট' },
                { name: 'ফাতেমা বেগম', location: 'রাজশাহী' },
                { name: 'আব্দুল করিম', location: 'খুলনা' },
                { name: 'নুসরাত জাহান', location: 'বরিশাল' },
                { name: 'শারমিন সুলতানা', location: 'কুমিল্লা' },
                { name: 'মোহাম্মদ আলী', location: 'ময়মনসিংহ' },
                { name: 'আয়েশা সিদ্দিকা', location: 'রংপুর' },
                { name: 'কামরুল হাসান', location: 'গাজীপুর' },
                { name: 'ফারহানা ইয়াসমিন', location: 'নারায়ণগঞ্জ' },
                { name: 'রুবেল হোসেন', location: 'টাঙ্গাইল' },
                { name: 'জান্নাতুল ফেরদৌস', location: 'বগুড়া' },
                { name: 'আরিফুর রহমান', location: 'যশোর' },
                { name: 'শায়লা পারভীন', location: 'দিনাজপুর' },
                { name: 'সজীব খান', location: 'সাভার' },
                { name: 'তানিয়া আহমেদ', location: 'নোয়াখালী' },
                { name: 'ইমরান হোসেন', location: 'ফেনী' },
                { name: 'সালমা খাতুন', location: 'কুষ্টিয়া' },
                { name: 'রাকিব হাসান', location: 'পাবনা' },
                { name: 'নাসরিন আক্তার', location: 'ফরিদপুর' },
                { name: 'মাহবুবুর রহমান', location: 'জামালপুর' },
                { name: 'তাসনিম জাহান', location: 'কক্সবাজার' },
                { name: 'রিপন মিয়া', location: 'ব্রাহ্মণবাড়িয়া' },
                { name: 'সাবিনা ইয়াসমিন', location: 'নরসিংদী' },
                { name: 'জাহিদ হাসান', location: 'সিরাজগঞ্জ' },
                { name: 'মৌসুমী আক্তার', location: 'নওগাঁ' },
                { name: 'আল-আমিন', location: 'মানিকগঞ্জ' },
                { name: 'সাদিয়া ইসলাম', location: 'মুন্সীগঞ্জ' },
                { name: 'ফয়সাল আহমেদ', location: 'হবিগঞ্জ' },
                { name: 'রিনা বেগম', location: 'লক্ষ্মীপুর' }
            ];

            const times = [
                'এইমাত্র', '১ মিনিট আগে', '২ মিনিট আগে', '৫ মিনিট আগে', 
                '১০ মিনিট আগে', '১৫ মিনিট আগে', '২০ মিনিট আগে', '৩০ মিনিট আগে',
                '৪৫ মিনিট আগে', '১ ঘণ্টা আগে'
            ];

            const notification = document.getElementById('fake-sales-notification');
            if (!notification) return;

            const imgEl = document.querySelector('#fake-sales-notification #fs-image');
            const customerEl = document.querySelector('#fake-sales-notification #fs-customer');
            const productLinkEl = document.querySelector('#fake-sales-notification #fs-product-link');
            const productTextEl = document.querySelector('#fake-sales-notification #fs-product-text');
            const timeEl = document.querySelector('#fake-sales-notification #fs-time');
            const closeBtn = document.querySelector('#fake-sales-notification #fs-close');
            const progressFill = document.querySelector('#fake-sales-notification .fs-progress-fill');

            const newCloseBtn = closeBtn.cloneNode(true);
            closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
            
            newCloseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideNotification();
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(cycleNotification, 20000); 
            });

            function getUniquePerson() {
                if (window.fakeSalesUsedIndices.length >= people.length) {
                    window.fakeSalesUsedIndices = [];
                }
                let availableIndices = [];
                for (let i = 0; i < people.length; i++) {
                    if (!window.fakeSalesUsedIndices.includes(i)) {
                        availableIndices.push(i);
                    }
                }
                if (availableIndices.length === 0) return people[0];
                const randomIndex = availableIndices[Math.floor(Math.random() * availableIndices.length)];
                window.fakeSalesUsedIndices.push(randomIndex);
                return people[randomIndex];
            }

            function getRandomItem(arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }

            function showNotification() {
                const person = getUniquePerson();
                const product = getRandomItem(products);
                const timeStr = getRandomItem(times);

                if(imgEl) imgEl.src = product.image;
                if(customerEl) customerEl.textContent = `${person.name}, ${person.location}`;
                
                if(productLinkEl) {
                    productLinkEl.textContent = product.name;
                    productLinkEl.href = product.url;
                }
                
                if(timeEl) timeEl.textContent = timeStr;

                notification.style.display = 'flex';
                
                // Reset progress
                if(progressFill) {
                    progressFill.style.transition = 'none';
                    progressFill.style.width = '0%';
                }

                requestAnimationFrame(() => {
                    notification.classList.add('show');
                    // Start progress
                    if(progressFill) {
                        requestAnimationFrame(() => {
                            progressFill.style.transition = 'width 10000ms linear';
                            progressFill.style.width = '100%';
                        });
                    }
                });

                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(hideNotification, 10000);
            }

            function hideNotification() {
                const notif = document.getElementById('fake-sales-notification');
                if (notif) {
                    notif.classList.remove('show');
                    setTimeout(() => {
                        notif.style.display = 'none';
                    }, 500);
                }
            }

            function cycleNotification() {
                // Random 10-15s
                const minDelay = 10000;
                const maxDelay = 15000;
                const randomDelay = Math.floor(Math.random() * (maxDelay - minDelay + 1)) + minDelay;
                
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(() => {
                    showNotification();
                    window.fakeSalesTimeout = setTimeout(cycleNotification, 10000 + 500 + 1000); 
                }, randomDelay);
            }

            cycleNotification();
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFakeSales);
        } else {
            initFakeSales();
        }
        
        document.addEventListener('livewire:navigated', initFakeSales);
        document.addEventListener('livewire:navigating', function() {
            if (window.fakeSalesTimeout) {
                clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = null;
            }
            const notif = document.getElementById('fake-sales-notification');
            if (notif) notif.classList.remove('show');
        });

    })();
</script>
@endif
