@php
    // Fetch random products for the fake notifications
    // We get 50 active products with their base image
    $fakeSaleProducts = \Illuminate\Support\Facades\Cache::remember('fake_sales_products', 3600, function () {
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
                    'image' => $product->base_image->src ?? asset('logo.png'), // Fallback to logo if no image
                    'url' => route('products.show', $product->slug),
                    'time' => 'Just now', // Placeholder, will be randomized in JS
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
            <p class="fs-name"><span id="fs-customer"></span></p>
            <p class="fs-action">Purchased <a href="#" id="fs-product-link"><span id="fs-product"></span></a></p>
            <p class="fs-time"><small id="fs-time"></small></p>
        </div>
        <button id="fs-close" class="fs-close" aria-label="Close">&times;</button>
    </div>
</div>

<style>
    .fake-sales-notification {
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 9999;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        max-width: 350px;
        width: 90%;
        padding: 12px;
        font-family: 'Hind Siliguri', 'Inter', sans-serif;
        overflow: hidden;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
        pointer-events: none; /* Initially non-blocking */
        border-left: 4px solid var(--primary, #28a745); /* Uses theme primary color */
    }

    .fake-sales-notification.show {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto; /* Enable clicks when visible */
    }

    .fake-sales-content {
        display: flex;
        align-items: center;
        position: relative;
    }

    .fake-sales-image-wrapper {
        flex-shrink: 0;
        width: 60px;
        height: 60px;
        border-radius: 6px;
        overflow: hidden;
        background: #f8f9fa;
        margin-right: 12px;
    }

    .fake-sales-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .fake-sales-text {
        flex-grow: 1;
        line-height: 1.3;
    }

    .fs-name {
        font-weight: 700;
        font-size: 14px;
        color: #333;
        margin: 0;
    }

    .fs-action {
        font-size: 13px;
        color: #555;
        margin: 2px 0 0;
    }

    .fs-action a {
        color: var(--primary, #0056b3);
        text-decoration: none;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .fs-action a:hover {
        text-decoration: underline;
    }

    .fs-time {
        font-size: 11px;
        color: #999;
        margin: 2px 0 0;
        display: block;
    }

    .fs-close {
        position: absolute;
        top: -8px;
        right: -8px;
        background: transparent;
        border: none;
        font-size: 18px;
        line-height: 1;
        cursor: pointer;
        color: #aaa;
        padding: 5px;
    }

    .fs-close:hover {
        color: #333;
    }

    /* Mobile optimization */
    @media (max-width: 575px) {
        .fake-sales-notification {
            bottom: 70px; /* Avoid covering sticky bottom bars if any */
            left: 10px;
            right: 10px;
            width: auto;
            max-width: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fakeSalesData = {
            products: @json($fakeSaleProducts),
            people: [
                { name: 'Rafiqul Islam', location: 'Dhaka' },
                { name: 'Sumaiya Akter', location: 'Chittagong' },
                { name: 'Md. Hasan', location: 'Sylhet' },
                { name: 'Fatema Begum', location: 'Rajshahi' },
                { name: 'Abdul Karim', location: 'Khulna' },
                { name: 'Nusrat Jahan', location: 'Barisal' },
                { name: 'Sharmin Sultana', location: 'Comilla' },
                { name: 'Mohammad Ali', location: 'Mymensingh' },
                { name: 'Ayesha Siddiqua', location: 'Rangpur' },
                { name: 'Kamrul Hasan', location: 'Gazipur' },
                { name: 'Farhana Yasmin', location: 'Narayanganj' },
                { name: 'Rubel Hossain', location: 'Tangail' },
                { name: 'Jannatul Ferdous', location: 'Bogra' },
                { name: 'Arifur Rahman', location: 'Jessore' },
                { name: 'Shaila Parvin', location: 'Dinajpur' },
                { name: 'Sojib Khan', location: 'Savar' },
                { name: 'Tania Ahmed', location: 'Noakhali' },
                { name: 'Imran Hossain', location: 'Feni' },
                { name: 'Salma Khatun', location: 'Kushtia' },
                { name: 'Rakib Hasan', location: 'Pabna' },
                { name: 'Nasrin Akter', location: 'Faridpur' },
                { name: 'Mahbubur Rahman', location: 'Jamalpur' },
                { name: 'Tasnim Jahan', location: 'Cox\'s Bazar' },
                { name: 'Ripon Mia', location: 'Brahmanbaria' },
                { name: 'Sabina Yasmin', location: 'Narsingdi' },
                { name: 'Zahid Hasan', location: 'Sirajganj' },
                { name: 'Moushumi Akter', location: 'Naogaon' },
                { name: 'Al-Amin', location: 'Manikganj' },
                { name: 'Sadia Islam', location: 'Munshiganj' },
                { name: 'Foysal Ahmed', location: 'Habiganj' },
                { name: 'Rina Begum', location: 'Lakshmipur' },
                { name: 'Shahidul Islam', location: 'Sherpur' },
                { name: 'Rokia Sultana', location: 'Netrokona' },
                { name: 'Masud Rana', location: 'Chandpur' },
                { name: 'Laila Arjumand', location: 'Joypurhat' },
                { name: 'Tariqul Islam', location: 'Natore' },
                { name: 'Nahid Hasan', location: 'Magura' },
                { name: 'Rumana Parvin', location: 'Bagerhat' },
                { name: 'Monir Hossain', location: 'Satkhira' },
                { name: 'Samira Khan', location: 'Chuadanga' },
                { name: 'Kawsar Ahmed', location: 'Meherpur' },
                { name: 'Juthi Akter', location: 'Jhenaidah' },
                { name: 'Sabbir Hossain', location: 'Narail' },
                { name: 'Popy Rani', location: 'Bhola' },
                { name: 'Asaduzzaman', location: 'Patuakhali' },
                { name: 'Rokeya Begum', location: 'Barguna' },
                { name: 'Sohel Rana', location: 'Pirojpur' },
                { name: 'Munni Akter', location: 'Jhalokati' },
                { name: 'Mizanur Rahman', location: 'Sunamganj' },
                { name: 'Shirin Akter', location: 'Moulvibazar' }
            ],
            times: [
                'Just now', '1 minute ago', '2 minutes ago', '5 minutes ago', 
                '10 minutes ago', '15 minutes ago', '20 minutes ago', '30 minutes ago',
                '45 minutes ago', '1 hour ago'
            ]
        };

        const notification = document.getElementById('fake-sales-notification');
        if (!notification || fakeSalesData.products.length === 0) return;

        const imgEl = document.getElementById('fs-image');
        const customerEl = document.getElementById('fs-customer');
        const productEl = document.getElementById('fs-product');
        const productLinkEl = document.getElementById('fs-product-link');
        const timeEl = document.getElementById('fs-time');
        const closeBtn = document.getElementById('fs-close');

        // Close button handler
        closeBtn.addEventListener('click', function() {
            hideNotification();
            // Wait longer if manually closed
            setTimeout(cycleNotification, 20000); 
        });

        function getRandomItem(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        function showNotification() {
            // Select random data
            const product = getRandomItem(fakeSalesData.products);
            const person = getRandomItem(fakeSalesData.people);
            const time = getRandomItem(fakeSalesData.times);

            // Populate DOM
            imgEl.src = product.image;
            customerEl.textContent = `${person.name}, ${person.location}`;
            productEl.textContent = product.name;
            productLinkEl.href = product.url;
            timeEl.textContent = time;

            // Show
            notification.style.display = 'block';
            // Slight delay to allow display:block to apply before opacity transition
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);

            // Hide after ~5 seconds
            setTimeout(hideNotification, 5000);
        }

        function hideNotification() {
            notification.classList.remove('show');
            // Wait for transition to finish before hiding display
            setTimeout(() => {
                notification.style.display = 'none';
            }, 500);
        }

        function cycleNotification() {
            // Random delay between 5-8 seconds
            const delay = Math.floor(Math.random() * (8000 - 5000 + 1) + 5000);
            
            setTimeout(() => {
                showNotification();
                // Schedule next cycle after this one finishes (delay + display time + transition)
                setTimeout(cycleNotification, 5000 + 1000); 
            }, delay);
        }

        // Start the first cycle
        cycleNotification();
    });
</script>
@endif
