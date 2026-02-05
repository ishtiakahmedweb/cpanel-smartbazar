@extends('layouts.yellow.master')

@title(request()->is('thank-you') ? 'অর্ডার সফল হয়েছে' : 'অর্ডারের অবস্থা')

@if(($isNewPurchase ?? false) && request()->is('thank-you'))
<script>
(function() {
  const orderId = "{{ (string) $order->id }}";
  const storageKey = 'purchase_fired_' + orderId;
  
  if (!localStorage.getItem(storageKey)) {
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
      event: "purchase",
      eventID: "{{ generateEventId() }}",
      ecommerce: {
        transaction_id: orderId,
        value: {{ (float) ($order->data['subtotal'] ?? 0) }},
        shipping: {{ (float) ($order->data['shipping_cost'] ?? 0) }},
        currency: "BDT",
        items: [
          @foreach($order->products as $item)
          {
            item_id: "{{ $item->product_id ?? $item->id }}",
            item_name: "{{ $item->name }}",
            item_category: "{{ (string) ($item->category ?? '') }}",
            price: {{ (float) $item->price }},
            quantity: {{ (int) $item->quantity }}
          },
          @endforeach
        ]
      },
      user_data: {
        external_id: "{{ (string) ($order->user_id ?? '') }}",
        email: "{{ $order->email }}",
        phone: "{{ formatPhone880($order->phone) }}",
        fbp: "{{ getFbCookie('_fbp') }}",
        fbc: "{{ getFbCookie('_fbc') }}",
        client_ip_address: "{{ request()->ip() }}",
        client_user_agent: "{{ request()->userAgent() }}",
        "address": {
          "first_name": "{{ explode(' ', $order->name)[0] ?? '' }}",
          "last_name": "{{ count(explode(' ', $order->name)) > 1 ? explode(' ', $order->name)[count(explode(' ', $order->name)) - 1] : '' }}",
          "city": "{{ $order->data['city_name'] ?? 'Dhaka' }}",
          "region": "{{ getBDIsoCode($order->data['city_name'] ?? 'Dhaka') }}",
          "street": "{{ (string) $order->address }}",
          "country": "BD"
        }
      }
    });
    
    localStorage.setItem(storageKey, 'true');
  }
})();
</script>
@endif

@section('content')
<style>
    :root {
        --thank-primary: var(--primary, #e11b2b);
        --thank-primary-hover: color-mix(in srgb, var(--primary, #e11b2b) 85%, black);
        --thank-primary-light: color-mix(in srgb, var(--primary, #e11b2b) 10%, white);
        --border-color: #cbd5e1;
    }

    .thank-you-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 0 15px;
    }

    .status-card {
        background: white;
        border-radius: 16px;
        border: 1px solid var(--border-color);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 30px;
    }

    .status-card__header {
        background: var(--thank-primary);
        color: white;
        padding: 40px 20px;
        text-align: center;
    }

    .success-icon {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: #16a34a;
        font-size: 45px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .status-card__title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 15px;
    }

    .status-card__subtitle {
        font-size: 18px;
        font-weight: 600;
        opacity: 0.95;
        line-height: 1.5;
    }

    .notice-box {
        background: #fffbeb;
        border: 1.5px solid #fcd34d;
        padding: 20px;
        border-radius: 12px;
        margin: 30px 20px;
        display: flex;
        gap: 15px;
        align-items: flex-start;
    }

    .notice-box i {
        font-size: 24px;
        color: #d97706;
    }

    .notice-text {
        font-size: 15px;
        color: #92400e;
        line-height: 1.6;
        font-weight: 600;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        padding: 0 20px 30px;
    }

    .info-item {
        background: #f8fafc;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    .info-label {
        color: #64748b;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .info-value {
        color: #0f172a;
        font-size: 18px;
        font-weight: 800;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .order-table th {
        background: #f1f5f9;
        padding: 15px;
        text-align: left;
        font-weight: 700;
        color: #475569;
        font-size: 15px;
        border-bottom: 2px solid #e2e8f0;
    }

    .order-table td {
        padding: 15px;
        border-bottom: 1px solid #f1f5f9;
        color: #1e293b;
        font-size: 16px;
    }

    .product-cell {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 20px;
        font-weight: 700;
        color: #475569;
    }

    .summary-row.total {
        background: #f8fafc;
        border-top: 2px solid #e2e8f0;
        padding: 20px;
        font-size: 24px;
        color: var(--thank-primary);
    }

    .btn-action {
        display: inline-block;
        background: var(--thank-primary);
        color: white !important;
        padding: 15px 30px;
        border-radius: 10px;
        font-weight: 800;
        text-decoration: none;
        transition: all 0.3s;
        text-align: center;
        margin: 10px;
    }

    .btn-action:hover {
        background: var(--thank-primary-hover);
        transform: translateY(-2px);
    }

    @media (max-width: 600px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
        .status-card__title {
            font-size: 22px;
        }
        .status-card__subtitle {
            font-size: 16px;
        }
    }
</style>

<div class="thank-you-container">
    <div class="status-card">
        <div class="status-card__header">
            @if (request()->is('thank-you'))
                <div class="success-icon">✓</div>
                <h1 class="status-card__title">অর্ডার করার জন্য ধন্যবাদ!</h1>
                <p class="status-card__subtitle">আপনার অর্ডারটি নিশ্চিত করতে আমাদের প্রতিনিধি খুব শীঘ্রই আপনাকে কল করবেন।</p>
            @else
                <h1 class="status-card__title">অর্ডারের বিস্তারিত তথ্য</h1>
                <p class="status-card__subtitle">অর্ডার আইডি: #{{ $order->id }} | বর্তমান অবস্থা: {{ $order->status }}</p>
            @endif
        </div>

        <div class="notice-box">
            <span>⚠️</span>
            <div class="notice-text">
                প্রিয় গ্রাহক, অনলাইন নীতিমালা অনুযায়ী আমরা প্রতিটি অর্ডারের ডেলিভারি রেকর্ড যাচাই করি। সাধারণত অগ্রিম টাকা নেওয়া হয় না; তবে রেকর্ড অনুযায়ী কোনো অর্ডারে ঝুঁকি থাকলে নিরাপত্তার স্বার্থে শুধুমাত্র ডেলিভারি চার্জটুকু অগ্রিম প্রয়োজন হতে পারে। আপনার সহযোগিতা ও বিশ্বাস আমাদের একান্ত কাম্য। ধন্যবাদ!
            </div>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">অর্ডার নম্বর (Order ID)</div>
                <div class="info-value">#{{ $order->id }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">অর্ডারের তারিখ (Date)</div>
                <div class="info-value">{{ $order->created_at->format('d M, Y') }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">মোবাইল নম্বর (Phone)</div>
                <div class="info-value">{{ $order->phone }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">পেমেন্ট মাধ্যম (Payment)</div>
                <div class="info-value">ক্যাশ অন ডেলিভারি</div>
            </div>
        </div>

        <div style="padding: 0 20px;">
            <div class="info-label" style="margin-bottom: 15px;">অর্ডারের বিবরণ (Order Details)</div>
            <div class="table-responsive">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>পণ্য (Product)</th>
                            <th style="text-align: right;">মূল্য (Price)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($data = $order->data)
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <div class="product-cell">
                                        <div>
                                            <div style="font-weight: 800; font-size: 15px;">{{ $product->name }}</div>
                                            <div style="color: #64748b; font-size: 13px;">পরিমাণ (Qty): {{ $product->quantity }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: right; font-weight: 800;">{!! theMoney($product->quantity * $product->price) !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div style="margin-top: 20px;">
            <div class="summary-row">
                <span>পণ্যের মূল্য (Subtotal):</span>
                <span>{!! theMoney((float) ($data['subtotal'] ?? 0)) !!}</span>
            </div>
            @php($couponDiscount = (float) ($data['coupon_discount'] ?? 0))
            @if ($couponDiscount > 0)
                <div class="summary-row">
                    <span>কুপন ডিসকাউন্ট (Discount):</span>
                    <span style="color: #16a34a;">- {!! theMoney($couponDiscount) !!}</span>
                </div>
            @endif
            <div class="summary-row">
                <span>ডেলিভারি চার্জ (Delivery):</span>
                <span style="color: #ef4444;">+ {!! theMoney((float) ($data['shipping_cost'] ?? 0)) !!}</span>
            </div>
            <div class="summary-row total">
                <span>সর্বমোট (Grand Total):</span>
                <span>{!! theMoney((float) ($data['subtotal'] ?? 0) + (float) ($data['shipping_cost'] ?? 0) - $couponDiscount) !!}</span>
            </div>
        </div>

        <div style="padding: 20px; background: #f8fafc; border-top: 1px solid #e2e8f0;">
            <div class="info-label">ডেলিভারি ঠিকানা (Shipping Address)</div>
            <div style="font-size: 16px; font-weight: 700; margin-top: 10px; color: #1e293b;">
                {{ $order->name }}<br>
                {{ $order->address }}<br>
                {{ $order->data['area_name'] ?? '' }}{{ ($order->data['area_name'] ?? false) ? ', ' : '' }}{{ $order->data['city_name'] ?? '' }}
            </div>
        </div>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ url('/') }}" class="btn-action">হোম পেজে ফিরে যান</a>
    </div>
</div>
@endsection
