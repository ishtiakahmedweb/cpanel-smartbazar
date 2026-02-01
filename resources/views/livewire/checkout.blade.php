<div>
    <style>
        :root {
            --checkout-primary: var(--primary, #e11b2b);
            --checkout-primary-hover: color-mix(in srgb, var(--primary, #e11b2b) 85%, black);
            --checkout-primary-light: color-mix(in srgb, var(--primary, #e11b2b) 10%, white);
            --border-color: #cbd5e1;
            --whatsapp-green: #25d366;
        }

        .checkout-container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 10px; /* Reduced side padding */
        }

        .checkout-header-wrapper {
            text-align: center;
            margin-bottom: 45px;
            padding: 20px 10px;
        }

        .checkout-header-title {
            color: var(--checkout-primary);
            font-weight: 800;
            /* Fluid typography: Min 18px, scale with width, Max 28px */
            font-size: clamp(18px, 4vw + 1rem, 28px);
            margin-bottom: 12px;
            letter-spacing: -0.5px;
            line-height: 1.2;
            word-break: keep-all;
        }

        @media (max-width: 768px) {
            .checkout-container {
                margin-top: 40px;
            }
            .checkout-header-wrapper {
                margin-bottom: 30px;
                padding-top: 10px;
            }
        }

        .checkout-header-subtitle {
            color: #64748b;
            font-size: 16px;
            font-weight: 700;
            max-width: 650px;
            margin: 0 auto;
            line-height: 1.4;
        }

        .checkout-card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 20px;
            box-shadow: 0 2px 5px -1px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .checkout-card-header {
            background: var(--checkout-primary);
            color: white;
            padding: 12px 15px;
            font-weight: 700;
            font-size: 17px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkout-card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
            display: block;
            font-size: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px; /* Slightly increased padding */
            border: 2px solid #e2e8f0;
            border-radius: 10px; /* Rounder corners */
            font-size: 15px;
            color: #374151;
            background-color: #f8fafc;
            transition: all 0.2s;
            font-weight: 500;
        }

        select.form-control {
            height: 50px; /* Fixed height for consistency */
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .form-control:focus {
            border-color: var(--checkout-primary);
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 4px color-mix(in srgb, var(--primary, #e11b2b) 10%, transparent);
        }

        .btn-confirm {
            background: var(--checkout-primary);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-weight: 800;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: all 0.2s;
            box-shadow: 0 4px 6px color-mix(in srgb, var(--primary, #e11b2b) 20%, transparent);
            text-transform: uppercase;
        }

        .btn-confirm:hover {
            background: var(--checkout-primary-hover);
            transform: translateY(-1px);
        }

        .btn-whatsapp {
            background: var(--whatsapp-green);
            color: white !important;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-weight: 800;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 12px;
            text-decoration: none;
        }

        .total-summary {
            background: #f8fafc;
            padding: 15px;
            border-radius: 10px;
            margin-top: 12px;
            border: 1.5px dashed #cbd5e1;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-weight: 700;
            color: #475569;
            font-size: 14px;
        }

        .total-row.grand-total {
            border-top: 2px solid #cbd5e1;
            padding-top: 10px;
            margin-top: 10px;
            font-size: 22px;
            color: var(--checkout-primary);
        }

        .qty-controls {
            display: flex;
            align-items: center;
            border: 1.5px solid #e2e8f0;
            border-radius: 6px;
            overflow: hidden;
            background: #fff;
        }

        .qty-btn {
            background: #f1f5f9;
            border: none;
            padding: 4px 10px;
            cursor: pointer;
            font-weight: 800;
            color: var(--checkout-primary);
        }

        .qty-input {
            border: none;
            text-align: center;
            width: 35px;
            font-weight: 800;
            font-size: 15px;
        }

        .product-item {
            display: flex; 
            gap: 12px; 
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .product-image {
            width: 70px; 
            height: 70px; 
            object-fit: cover; 
            border-radius: 8px; 
            border: 1px solid #e2e8f0;
        }

        .product-name {
            font-weight: 800;
            font-size: 15px;
            color: #0f172a;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .product-remove {
            color: #94a3b8;
            cursor: pointer;
            padding: 5px;
            margin-left: 10px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
        }

        .product-remove:hover {
            color: #ef4444;
            background: #fee2e2;
        }

        .cod-status {
            background: var(--checkout-primary-light);
            border: 2px solid var(--checkout-primary);
            padding: 15px;
            border-radius: 12px;
            margin-top: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            position: relative;
        }

        .cod-status::after {
            content: "✓";
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--checkout-primary);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 900;
            border: 2px solid white;
        }

        .error-bangla {
            color: #dc2626;
            font-weight: 700;
            font-size: 13px;
            margin-top: 5px;
            display: block;
        }

        .error-highlight {
            animation: pulsedRed 2s ease-in-out;
        }

        @keyframes pulsedRed {
            0% { background-color: transparent; }
            30% { background-color: rgba(239, 68, 68, 0.1); }
            70% { background-color: rgba(239, 68, 68, 0.1); }
            100% { background-color: transparent; }
        }

        /* Mobile Specific Fixes */
        @media (max-width: 600px) {
            .checkout-container {
                padding: 0 5px; /* Further reduced gap for flush appearance */
            }
            .checkout-card {
                margin-bottom: 20px;
                border-radius: 12px;
            }
            .checkout-card-body {
                padding: 20px; /* Healthy standard padding inside */
            }
            .product-name {
                font-size: 15px;
            }
            .total-row.grand-total {
                font-size: 22px;
            }
            .btn-confirm {
                font-size: 18px;
                padding: 15px;
            }
            .btn-whatsapp {
                font-size: 15px;
                padding: 14px;
            }
        }
    </style>

    <div class="checkout-container">
        <div class="checkout-header-wrapper">
            <h2 class="checkout-header-title">📍 অর্ডারটি কনফার্ম করতে নিচের ফরমটি পূরণ করুন</h2>
            <p class="checkout-header-subtitle">সঠিক তথ্য দিয়ে ফরমটি পূর্ণ করে 'অর্ডার নিশ্চিত করুন' বাটনে ক্লিক করুন।</p>
        </div>

        @if (session()->has('error'))
            <div id="session-error-alert" style="background: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-weight: 700; display: flex; flex-direction: column; gap: 10px; font-size: 15px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-size: 20px;">⚠️</span> 
                    <span>{{ session('error') }}</span>
                </div>
                
                @if(str_contains(session('error'), 'হোয়াটসঅ্যাপ') || str_contains(session('error'), 'contact') || str_contains(session('error'), 'অর্ডার করেছেন'))
                    @php
                        $company = setting('company');
                        $phone = preg_replace('/[^\d]/', '', $company->whatsapp ?? $company->phone ?? '');
                        $phone = strlen($phone) == 11 ? '88' . $phone : $phone;
                    @endphp
                    <a href="https://wa.me/{{ $phone }}" target="_blank" class="btn-whatsapp" style="margin-top: 5px; padding: 10px; font-size: 14px;">
                        <i class="fab fa-whatsapp"></i> সরাসরি হোয়াটসঅ্যাপে যোগাযোগ করুন
                    </a>
                @endif
            </div>
        @endif

        <form wire:submit="checkout">
            <div class="row m-0">
                <!-- Left Column - Customer Info -->
                <div class="col-lg-7 px-1">
                    <div class="checkout-card">
                        <div class="checkout-card-header">
                            <span>🏠</span> শিপিং ইনফরমেশন (Shipping Info)
                        </div>
                        <div class="checkout-card-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label">আপনার নাম <span style="color:red;">*</span></label>
                                    <input type="text" wire:model.blur="name" class="form-control @error('name') is-invalid @enderror" placeholder="নাম লিখুন">
                                    @error('name') <span class="error-bangla">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">মোবাইল নাম্বার <span style="color:red;">*</span></label>
                                    <input type="tel" wire:model.blur="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="১১ ডিজিটের মোবাইল নম্বর">
                                    @error('phone') <span class="error-bangla">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12 form-group">
                                    <label class="form-label">পুরো ঠিকানা <span style="color:red;">*</span></label>
                                    <textarea wire:model.blur="address" class="form-control @error('address') is-invalid @enderror" rows="2" placeholder="গ্রাম/এলাকা, থানা, জেলা"></textarea>
                                    @error('address') <span class="error-bangla">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">শহর (City) <span style="color:red;">*</span></label>
                                    <select wire:model.live="city_id" wire:key="checkout-city-select" class="form-control @error('city_id') is-invalid @enderror">
                                        <option value="">শহর সিলেক্ট করুন</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id') <span class="error-bangla">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label class="form-label">এলাকা (Area) <span style="color:red;">*</span></label>
                                    <select wire:model.live="area_id" wire:key="checkout-area-select-{{ $city_id }}" @disabled(!$city_id) class="form-control @error('area_id') is-invalid @enderror">
                                        <option value="">এলাকা সিলেক্ট করুন</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id') <span class="error-bangla">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Payment Section moved here -->
                            <div class="mt-4">
                                <label class="form-label">পেমেন্ট পদ্ধতি (Payment Method)</label>
                                <div class="cod-status">
                                    <span style="font-size: 28px;">💵</span>
                                    <div>
                                        <div style="font-weight: 800; font-size: 15px; color: var(--primary-purple);">ক্যাশ অন ডেলিভারি (Cash on Delivery)</div>
                                        <div style="font-size: 13px; color: #6b21a8; font-weight: 700;">পণ্য হাতে পেয়ে টাকা পরিশোধ করুন।</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="col-lg-5 px-1">
                    <div class="checkout-card">
                        <div class="checkout-card-header">
                            <span>🛍️</span> অর্ডার সামারি (Order Summary)
                        </div>
                        <div class="checkout-card-body" style="padding: 10px 15px;">
                            <!-- Products -->
                            @foreach(cart()->content() as $id => $item)
                                <div wire:key="cart-item-{{ $id }}" class="product-item" @if($loop->last) style="border-bottom:0;" @endif>
                                    <img src="{{ asset($item->options->image) }}" class="product-image" alt="{{ $item->name }}">
                                    <div style="flex-grow:1;">
                                        <div style="display:flex; justify-content:space-between; align-items:flex-start;">
                                            <div class="product-name">{{ $item->name }}</div>
                                            @if(cart()->count() > 1)
                                                <button type="button" class="product-remove" wire:click="remove('{{ $id }}')" wire:loading.attr="disabled" title="সরাও">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </div>
                                        <div style="display:flex; justify-content:space-between; align-items:center;">
                                            <div class="qty-controls">
                                                <button type="button" class="qty-btn" wire:click="decreaseQuantity('{{ $id }}')" wire:loading.attr="disabled">−</button>
                                                <input type="text" class="qty-input" value="{{ $item->qty }}" readonly>
                                                <button type="button" class="qty-btn" wire:click="increaseQuantity('{{ $id }}')" wire:loading.attr="disabled">+</button>
                                            </div>
                                            <div style="font-weight:900; color:var(--primary-purple); font-size: 17px;">{!! theMoney($item->price * $item->qty) !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <!-- Totals -->
                            <div class="total-summary">
                                <div class="total-row">
                                    <span>পণ্যের মূল্য:</span>
                                    <span>{!! theMoney(cart()->subtotal()) !!}</span>
                                </div>
                                <div class="total-row">
                                    <span>ডেলিভারি চার্জ:</span>
                                    <span style="color:#ef4444;">+ {!! theMoney(cart()->getCost('deliveryFee') ?? 0) !!}</span>
                                </div>
                                <div class="total-row grand-total">
                                    <span>সর্বমোট:</span>
                                    <span>{!! theMoney(cart()->total()) !!}</span>
                                </div>
                            </div>

                            <button type="submit" class="btn-confirm" wire:loading.attr="disabled" wire:target="checkout">
                                <span wire:loading.remove wire:target="checkout">অর্ডার নিশ্চিত করুন (Confirm) 🚀</span>
                                <span wire:loading wire:target="checkout">অর্ডার হচ্ছে...</span>
                            </button>

                            <a href="https://wa.me/8801339387279?text=আমি%20চেকআউট%20থেকে%20অর্ডার%20করতে%20চাই" target="_blank" class="btn-whatsapp">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.389-4.321 9.771-9.695 9.885M20.52 3.449C18.24 1.245 15.24 0 12.045 0 5.463 0 .104 5.357.101 11.94c0 2.106.541 4.162 1.567 5.996L0 24l6.15-1.612a12.062 12.062 0 005.89 1.547h.005c6.58 0 11.94-5.357 11.944-11.94a11.94 11.94 0 00-3.479-8.546"/>
                                </svg>
                                WhatsApp অর্ডার (Order via WhatsApp)
                            </a>
                            <div style="text-align: center; margin-top: 15px; color: #64748b; font-size: 13px; font-weight: 700;">
                                💯 গুণগত মান নিশ্চিত করে কেনাকাটা করুন।
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            const handleScroll = (selector) => {
                setTimeout(() => {
                    const target = document.querySelector(selector);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        
                        // Add highlight animation
                        target.classList.add('error-highlight');
                        if(target.parentElement && !target.id) {
                             target.parentElement.classList.add('error-highlight');
                        }
                        
                        setTimeout(() => {
                            target.classList.remove('error-highlight');
                            if(target.parentElement) target.parentElement.classList.remove('error-highlight');
                        }, 2000);
                    }
                }, 150);
            };

            Livewire.on('scroll-to-error', () => handleScroll('.error-bangla'));
            Livewire.on('scroll-to-session-error', () => handleScroll('#session-error-alert'));
        });
    </script>
</div>
