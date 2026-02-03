@php
    // Fetch random products for the fake notifications
    // Cache for 60 minutes
    $fakeSaleProducts = \Illuminate\Support\Facades\Cache::remember('fake_sales_products_v2', 3600, function () {
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
            <p class="fs-action">অর্ডার করেছেন: <a href="#" id="fs-product-link"><span id="fs-product"></span></a></p>
            <p class="fs-time"><small id="fs-time"></small></p>
        </div>
        <button id="fs-close" class="fs-close" aria-label="Close">&times;</button>
    </div>
</div>

<style>
    .fake-sales-notification {
        position: fixed;
        bottom: 25px;
        left: 25px;
        z-index: 99999;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1), 0 2px 10px rgba(0,0,0,0.05); /* Softer, deeper shadow */
        max-width: 380px;
        width: auto;
        padding: 16px;
        font-family: 'SolaimanLipi', 'Hind Siliguri', 'Noto Sans Bengali', sans-serif;
        overflow: visible;
        opacity: 0;
        transform: translateY(20px) scale(0.98);
        transition: all 0.5s cubic-bezier(0.19, 1, 0.22, 1); /* Smoother bezier */
        pointer-events: none;
        border-left: 5px solid var(--primary, #28a745);
        display: flex;
        flex-direction: column;
        background-color: rgba(255, 255, 255, 0.98); /* Slight transparency */
        backdrop-filter: blur(10px); /* Glassmorphism effect */
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

    /* Mobile optimization */
    @media (max-width: 575px) {
        .fake-sales-notification {
            bottom: 70px !important; /* Move up to avoid bottom nav/buttons */
            left: 10px;
            right: auto; /* Don't stretch full width */
            width: auto;
            max-width: 300px; /* Limit width */
            border-left-width: 3px;
            padding: 10px;
            border-radius: 8px;
        }

        .fake-sales-image-wrapper {
            width: 45px; /* Smaller image */
            height: 45px;
            margin-right: 10px;
            border-radius: 4px;
        }

        .fake-sales-text {
            padding-right: 15px;
        }

        .fs-name {
            font-size: 13px; /* Smaller name */
            margin-bottom: 0;
        }

        .fs-verified {
            font-size: 9px; /* Smaller badge */
            padding: 1px 4px;
            margin-left: 5px;
            transform: scale(0.9); /* Visually smaller */
        }

        .fs-action {
            font-size: 12px; /* Smaller action text */
            line-height: 1.3;
        }

        .fs-action a {
            max-width: 180px;
        }
        
        .fs-time {
            font-size: 10px;
            margin-top: 2px;
        }
        
        .fs-close {
            width: 18px;
            height: 18px;
            top: -8px;
            right: -8px;
            font-size: 14px;
        }
    }
</style>

<script>
    (function() {
        // Global variable to track the timeout so we can clear it on navigation
        if (typeof window.fakeSalesTimeout === 'undefined') {
            window.fakeSalesTimeout = null;
        }

        function initFakeSales() {
            // Clear any existing timeout to prevent double loops
            if (window.fakeSalesTimeout) {
                clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = null;
            }

            // Data
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

            const imgEl = document.getElementById('fs-image');
            const customerEl = document.getElementById('fs-customer');
            const productEl = document.getElementById('fs-product');
            const productLinkEl = document.getElementById('fs-product-link');
            const timeEl = document.getElementById('fs-time');
            const closeBtn = document.getElementById('fs-close');

            // Re-attach listener correctly
            const newCloseBtn = closeBtn.cloneNode(true);
            closeBtn.parentNode.replaceChild(newCloseBtn, closeBtn);
            
            newCloseBtn.addEventListener('click', function(e) {
                e.preventDefault();
                hideNotification();
                // Restart cycle after 20s
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(cycleNotification, 20000); 
            });

            function getRandomItem(arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }

            function showNotification() {
                const product = getRandomItem(products);
                const person = getRandomItem(people);
                const time = getRandomItem(times);

                if(imgEl) imgEl.src = product.image;
                if(customerEl) customerEl.textContent = `${person.name}, ${person.location}`;
                if(productEl) productEl.textContent = product.name;
                if(productLinkEl) productLinkEl.href = product.url;
                if(timeEl) timeEl.textContent = time;

                notification.style.display = 'flex';
                // Small delay to ensure display:flex applies before opacity
                requestAnimationFrame(() => {
                    notification.classList.add('show');
                });

                // Hide after 5 seconds
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
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
                // Fixed 5s delay as requested
                const delay = 5000;
                
                if (window.fakeSalesTimeout) clearTimeout(window.fakeSalesTimeout);
                window.fakeSalesTimeout = setTimeout(() => {
                    showNotification();
                    // Schedule next
                    window.fakeSalesTimeout = setTimeout(cycleNotification, 5000 + 1000 + 500); // 5s display + 1s transition + buffer
                }, delay);
            }

            // Start cycle
            cycleNotification();
        }

        // Run on initial load
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initFakeSales);
        } else {
            initFakeSales();
        }
        
        // Run on Livewire navigation (SPA feel)
        document.addEventListener('livewire:navigated', initFakeSales);
        
        // Cleanup BEFORE navigating away
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
