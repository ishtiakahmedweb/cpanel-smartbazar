@php
    // Fetch random products for the fake notifications
    // Cache for 60 minutes
    $fakeSaleProducts = \Illuminate\Support\Facades\Cache::remember('fake_sales_products_v3', 3600, function () {
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
                    'image' => $product->base_image->src ?? asset('logo.png'), 
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
        <div class="fake-sales-text">
            <p class="fs-name">
                <span id="fs-customer"></span> 
                <span class="fs-verified">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg> Verified
                </span>
            </p>
            <p class="fs-action">অর্ডার করেছেন: 
                <a href="#" id="fs-product-link"><span id="fs-product"></span></a>
                <span id="fs-product-text" style="display:none;"></span> <!-- Plain text for mobile -->
            </p>
            <p class="fs-time"><small id="fs-time"></small></p>
        </div>
        <button id="fs-close" class="fs-close" aria-label="Close">&times;</button>
    </div>
</div>

<style>
    /* Desktop / Default Styles */
    .fake-sales-notification {
        position: fixed;
        bottom: 25px;
        left: 25px;
        z-index: 99999;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1), 0 2px 10px rgba(0,0,0,0.05);
        max-width: 380px;
        width: auto;
        padding: 16px;
        font-family: 'SolaimanLipi', 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
        overflow: visible;
        opacity: 0;
        transform: translateY(20px) scale(0.98);
        transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1);
        pointer-events: none;
        border-left: 5px solid var(--primary, #28a745);
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
    }

    .fake-sales-notification.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    .fake-sales-content {
        display: flex;
        align-items: flex-start;
        position: relative;
    }

    .fake-sales-image-wrapper {
        flex-shrink: 0;
        width: 60px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        margin-right: 15px;
        border: 1px solid #f0f0f0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }

    .fake-sales-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fake-sales-text {
        flex-grow: 1;
        line-height: 1.4;
        font-size: 14px;
        padding-right: 20px;
    }

    .fs-name {
        font-weight: 700;
        font-size: 15px;
        color: #222;
        margin: 0 0 3px 0;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .fs-verified {
        display: inline-flex;
        align-items: center;
        background: #e8f5e9;
        color: #2e7d32;
        font-size: 10px;
        padding: 2px 6px;
        border-radius: 12px;
        margin-left: 8px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: 1px solid #c8e6c9;
    }
    
    .fs-verified svg {
        margin-right: 3px;
        margin-top: -1px;
    }

    .fs-action {
        color: #555;
        margin: 0;
        font-size: 13px;
        line-height: 1.5;
    }

    .fs-action a {
        color: var(--primary, #0056b3);
        text-decoration: none;
        font-weight: 600;
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px;
        margin-top: 2px;
    }
    
    .fs-action a:hover {
        text-decoration: underline;
    }

    .fs-time {
        font-size: 11px;
        color: #888;
        margin: 4px 0 0;
        display: block;
        font-weight: 500;
    }

    .fs-close {
        position: absolute;
        top: -12px;
        right: -12px;
        background: #fff;
        border: 1px solid #eee;
        border-radius: 50%;
        width: 22px;
        height: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #ccc;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.2s;
        z-index: 10;
        padding: 0;
    }

    .fs-close:hover {
        color: #333;
        background: #f8f9fa;
        transform: scale(1.1);
    }

    /* Mobile optimization - Premium Compact Fixed */
    @media (max-width: 575px) {
        .fake-sales-notification {
            top: auto;
            bottom: 20px !important;
            left: 10px;
            right: auto;
            width: 270px;
            height: 75px; /* Fixed height container */
            max-width: 270px;
            border-left-width: 4px;
            padding: 0; /* Remove default padding, use flex alignment */
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15); /* Premium shadow */
            align-items: center; 
            background: #ffffff;
            display: flex;
            transform: translateY(20px);
            overflow: hidden; /* Clip content */
        }

        .fake-sales-notification.show {
            transform: translateY(0);
        }

        .fake-sales-content {
            align-items: center;
            width: 100%;
            height: 100%;
            padding: 8px 10px; /* Internal padding */
            position: relative;
        }

        .fake-sales-image-wrapper {
            width: 48px;
            height: 48px;
            border-radius: 6px;
            margin-right: 12px;
            border: 1px solid #f0f0f0;
            background: #fff;
            flex-shrink: 0;
        }

        .fake-sales-text {
            padding-right: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
            width: 100%;
            overflow: hidden;
            flex: 1; /* Take remaining space */
            min-width: 0; /* Crucial for ellipsis in flex */
        }

        .fs-name {
            font-size: 13px;
            margin-bottom: 2px;
            line-height: 1.1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            color: #222;
        }

        .fs-verified {
            display: none;
        }

        .fs-action {
            font-size: 12px;
            margin-top: 1px;
            line-height: 1.2;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #555;
        }

        /* Show plain text instead of link on mobile */
        .fs-action a {
            display: none;
        }
        #fs-product-text {
            display: inline-block !important; 
            font-weight: 600;
            color: #333;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: bottom;
        }

        .fs-time {
            display: block;
            font-size: 10px;
            margin-top: 2px;
            color: #999;
            line-height: 1;
        }
        
        .fs-close {
            display: block;
            width: 18px;
            height: 18px;
            top: 4px;
            right: 4px;
            font-size: 16px;
            background: transparent;
            box-shadow: none;
            border: none;
            color: #ccc;
            padding: 0;
            line-height: 18px;
        }
    }
</style>

<script>
    (function() {
        if (typeof window.fakeSalesTimeout === 'undefined') {
            window.fakeSalesTimeout = null;
        }

        // Global state to track used indices to avoid repeats
        window.fakeSalesUsedIndices = window.fakeSalesUsedIndices || [];

        function initFakeSales() {
            if (window.fakeSalesTimeout) {
                clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = null;
            }

            const products = @json($fakeSaleProducts);
            if (!products || products.length === 0) return;

            // Updated People List (30)
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

            const imgEl = document.getElementById('fs-image');
            const customerEl = document.getElementById('fs-customer');
            const productEl = document.getElementById('fs-product');
            const productLinkEl = document.getElementById('fs-product-link');
            const productTextEl = document.getElementById('fs-product-text');
            const timeEl = document.getElementById('fs-time');
            const closeBtn = document.getElementById('fs-close');

            const newCloseBtn = closeBtn.cloneNode(true);
            closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
            
            newCloseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideNotification();
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(cycleNotification, 20000); 
            });

            function getUniquePerson() {
                // If we've used everyone, reset the list
                if (window.fakeSalesUsedIndices.length >= people.length) {
                    window.fakeSalesUsedIndices = [];
                }

                // Find an index that hasn't been used yet
                let availableIndices = [];
                for (let i = 0; i < people.length; i++) {
                    if (!window.fakeSalesUsedIndices.includes(i)) {
                        availableIndices.push(i);
                    }
                }

                // Pick random from available
                const randomIndex = availableIndices[Math.floor(Math.random() * availableIndices.length)];
                
                // Mark as used
                window.fakeSalesUsedIndices.push(randomIndex);

                return people[randomIndex];
            }

            function getRandomItem(arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }

            function showNotification() {
                // Pick unique person
                const person = getUniquePerson();
                const product = getRandomItem(products);
                const time = getRandomItem(times);

                if(imgEl) imgEl.src = product.image;
                if(customerEl) customerEl.textContent = `${person.name}, ${person.location}`;
                
                if(productEl) productEl.textContent = product.name;
                if(productTextEl) productTextEl.textContent = product.name;
                
                if(productLinkEl) productLinkEl.href = product.url;
                if(timeEl) timeEl.textContent = time;

                notification.style.display = 'flex';
                requestAnimationFrame(() => {
                    notification.classList.add('show');
                });

                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                // Hide after 5 seconds
                window.fakeSalesTimeout = setTimeout(hideNotification, 5000);
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
                // Random delay between 5 to 10 seconds (5000ms to 10000ms)
                const minDelay = 5000;
                const maxDelay = 10000;
                const randomDelay = Math.floor(Math.random() * (maxDelay - minDelay + 1)) + minDelay;
                
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(() => {
                    showNotification();
                    // Schedule next cycle: Display time (5s) + Fade out (0.5s) + Random Buffer
                    window.fakeSalesTimeout = setTimeout(cycleNotification, 5000 + 500 + 1000); 
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
