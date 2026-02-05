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
            
            <!-- Row 2: Label -->
            <div class="fs-row-label">অর্ডার করেছেন:</div>

            <!-- Row 3: Product Name -->
            <div class="fs-row-product">
                <a href="#" id="fs-product-link" class="fs-product-link"></a>
                <span id="fs-product-text" class="fs-product-text"></span>
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
        bottom: 90px; /* Above WhatsApp button (30px + 45px + gap) */
        right: 20px;
        z-index: 99998; /* Just below WhatsApp z-index if needed */
        background: rgba(255, 255, 255, 0.9); /* Glassmorphism base */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 10px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        width: 320px;
        max-width: 90vw;
        padding: 0;
        font-family: 'SolaimanLipi', 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
        opacity: 0;
        transform: translateX(50px); /* Slide from right start position */
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        pointer-events: none;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.4);
        border-right: 4px solid #ff6a00; /* Sidebar accent on the right */
    }

    .fake-sales-notification.show {
        opacity: 1;
        transform: translateX(0);
        pointer-events: auto;
    }

    .fake-sales-content {
        display: flex;
        align-items: center;
        padding: 12px;
        position: relative;
    }

    .fake-sales-image-wrapper {
        flex-shrink: 0;
        width: 50px;
        height: 50px;
        border-radius: 6px;
        overflow: hidden;
        background: #f8f9fa;
        margin-right: 12px;
        border: 1px solid rgba(0,0,0,0.05);
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
        padding-right: 15px;
    }

    .fs-row-header {
        display: flex;
        align-items: center;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .fs-customer-name {
        font-weight: 700;
        font-size: 13px;
        color: #111;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fs-verified-badge {
        display: inline-flex;
        align-items: center;
        color: #2e7d32; /* Green for verified */
        font-size: 8px;
        margin-left: 5px;
        font-weight: 800;
        text-transform: uppercase;
    }
    
    .fs-verified-badge svg {
        margin-right: 1px;
        width: 10px;
        height: 10px;
    }

    .fs-row-label {
        font-size: 10px;
        color: #666;
        line-height: 1;
        margin-bottom: 1px;
    }

    .fs-row-product {
        width: 100%;
        line-height: 1.2;
    }

    .fs-product-link, .fs-product-text {
        font-size: 13px;
        font-weight: 600;
        color: #ff6a00;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-decoration: none;
    }
    .fs-product-link:hover {
        text-decoration: underline;
    }

    .fs-row-time {
        font-size: 9px;
        color: #888;
        margin-top: 2px;
    }

    .fs-close {
        position: absolute;
        top: 4px;
        right: 4px;
        background: rgba(0,0,0,0.05);
        border: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #666;
        font-size: 14px;
        transition: background 0.2s;
    }
    .fs-close:hover {
        background: rgba(0,0,0,0.1);
    }

    .fs-progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: rgba(0,0,0,0.05);
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
            bottom: 80px !important;
            right: 10px;
            width: 260px;
            border-right: 3px solid #ff6a00;
        }
        .fake-sales-content {
            padding: 8px;
        }
        .fake-sales-image-wrapper {
            width: 42px;
            height: 42px;
            margin-right: 8px;
        }
        .fs-customer-name { font-size: 12px; }
        .fs-product-link, .fs-product-text { font-size: 12px; }
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
                if(productTextEl) productTextEl.textContent = product.name;
                
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
