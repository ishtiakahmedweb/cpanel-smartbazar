{{-- Bootstrap is needed early for UI components, but can be deferred --}}
<script src="{{ cdnAsset('bootstrap.js', 'strokya/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer" defer onerror="window.__loadLocalAsset && window.__loadLocalAsset('bootstrap')"></script>
{{-- Owl Carousel can be deferred - carousels load after initial render --}}
<script src="{{ cdnAsset('owl-carousel.js', 'strokya/vendor/owl-carousel-2.3.4/owl.carousel.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer" defer onerror="window.__loadLocalAsset && window.__loadLocalAsset('owl')"></script>
{{-- <script src="{{ asset('strokya/vendor/nouislider-12.1.0/nouislider.min.js') }}"></script> --}}
<!-- <script src="{{ asset('strokya/js/number.js') }}"></script> -->
{{-- Main.js can be deferred - most functionality is not critical for initial render --}}
<script src="{{ versionedAsset('strokya/js/main.js') }}" defer></script>
{{-- Bootstrap notify can be deferred - notifications appear after page load --}}
<script src="{{ versionedAsset('assets/js/notify/bootstrap-notify.min.js') }}" defer></script>
<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->
{{-- <script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset('strokya/js/algolia.js') }}"></script>
<script src="{{ asset('strokya/vendor/jquery.bootstrap-growl.min.js') }}"></script> --}}
{{-- SVG4Everybody can be deferred - SVG fallbacks are not critical for initial render --}}
<script src="{{ cdnAsset('svg4everybody', 'strokya/vendor/svg4everybody-2.1.9/svg4everybody.min.js') }}" defer onerror="this.onerror=null;this.src='{{ asset('strokya/vendor/svg4everybody-2.1.9/svg4everybody.min.js') }}';"></script>
<script defer>
    // Wait for svg4everybody to load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof svg4everybody !== 'undefined') {
                svg4everybody();
            } else {
                window.addEventListener('load', function() {
                    if (typeof svg4everybody !== 'undefined') {
                        svg4everybody();
                    }
                });
            }
        });
    } else {
        if (typeof svg4everybody !== 'undefined') {
            svg4everybody();
        } else {
            window.addEventListener('load', function() {
                if (typeof svg4everybody !== 'undefined') {
                    svg4everybody();
                }
            });
        }
    }
</script>

<script>
    // Global notify helper
    window.notify = function(message, type = 'info') {
        console.log('Notify:', message, type);
        if (window.$ && typeof window.$.notify === 'function') {
            window.$.notify({ message: message }, { 
                type: type, 
                delay: 3000,
                placement: {
                    from: "top",
                    align: "right"
                }
            });
        }
    };

    // Global function to handle Add to Cart and Order Now buttons
    window.handleAddToCart = function(button) {
        if (window.event) {
            window.event.preventDefault();
            window.event.stopPropagation();
        }

        const productId = button.getAttribute('data-product-id');
        let action = button.getAttribute('data-action') || 'add';
        let instance = (action === 'kart' || action === 'landing') ? action : 'default';
        
        console.log('handleAddToCart called:', { productId, action, instance });

        if (!productId) {
            console.error('No product ID found on button');
            return;
        }
        
        // Disable button to prevent double-clicks
        if (button.disabled) return;
        button.disabled = true;
        
        const originalHTML = button.innerHTML;
        button.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        if (!csrfToken) {
            console.error('CSRF token not found');
            window.notify('Security token missing. Please refresh page.', 'danger');
            button.disabled = false;
            button.innerHTML = originalHTML;
            return;
        }

        // Make AJAX request to add to cart
        fetch('/cart/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: 1,
                instance: instance
            })
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                console.error('Server returned error:', response.status, data);
                throw new Error(data.message || 'Server error');
            }
            return data;
        })
        .then(data => {
            console.log('Add to cart success:', data);
            if (data.success) {
                window.notify(data.message || 'Product added successfully!', 'success');
                
                // Dispatch cart updated event for Livewire components
                window.dispatchEvent(new CustomEvent('cart-updated'));
                
                // If action is 'kart' (order now), redirect to checkout
                if (action === 'kart') {
                    console.log('Redirecting to checkout...');
                    window.location.href = '/checkout';
                }
            } else {
                window.notify(data.message || 'Failed to add product', 'danger'); 
            }
        })
        .catch(error => {
            console.error('Error adding to cart:', error);
            window.notify(error.message || 'An error occurred', 'danger');
        })
        .finally(() => {
            // Re-enable button ONLY if not redirecting (optional, redirect will happen or not)
            if (action !== 'kart' || !window.location.href.includes('checkout')) {
                button.disabled = false;
                button.innerHTML = originalHTML;
            }
        });
    };
</script>
