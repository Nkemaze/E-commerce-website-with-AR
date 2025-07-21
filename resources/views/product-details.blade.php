<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} | ARILESHOPE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/product-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <style>
        .btn-ar {
    background: #4285F4;
    color: white;
    padding: 10px 15px;
    border-radius: 4px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
    </style>
</head>
<body>
    @include('partials.header')
    
    <main class="product-details-container">
        <div class="product-images">
            <!-- Main product image only -->
            <div class="main-image">
                @if($product->image_path)
                    <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="No image">
                @endif
            </div>
        </div>
        
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            
            <div class="price-section">
                <span class="price">{{ number_format($product->price, 2) }} FCFA</span>
                @if($product->quantity > 0)
                    <span class="stock in-stock">In Stock</span>
                @else
                    <span class="stock out-of-stock">Out of Stock</span>
                @endif
            </div>
            
            <div class="description">
                <h3>Description</h3>
                <p>{{ $product->description }}</p>
            </div>

            
            
            @if($product->sizes && count($product->sizes))
            <div class="sizes">
                <h3>Available Sizes</h3>
                <div class="size-options">
                    @foreach($product->sizes as $size)
                        <label class="size-option">
                            <input type="radio" name="size" value="{{ $size }}">
                            <span>{{ $size }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endif
            
            <div class="quantity-selector">
                <h3>Quantity</h3>
                <div class="quantity-controls">
                    <button class="quantity-btn minus">-</button>
                    <input type="number" value="1" min="1" max="{{ $product->quantity }}">
                    <button class="quantity-btn plus">+</button>
                </div>
            </div>
            
            <div class="action-buttons">
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="size" id="selected-size" value="">
                    <input type="hidden" name="quantity" id="product-quantity" value="1">
                    <button type="submit" class="add-to-cart">Add to Cart</button>
                </form>
                <form action="{{ route('cart.buy-now', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <input type="hidden" name="size" id="buy-now-size" value="">
                    <input type="hidden" name="quantity" id="buy-now-quantity" value="1">
                    <button type="submit" class="buy-now">Buy Now</button>
                </form>
                <div class="ar-try-on">
                    <a href="{{ route('ar.try-on', $product->id) }}" class="btn btn-ar">
                        <i class="fas fa-camera"></i> Try in AR
                    </a>
                </div>
            </div>
        </div>
    </main>

    @include('partials.footer')
    
    <script src="{{ asset('assets/js/product-details.js') }}"></script>
    <script src=" {{ asset('assets/js/swiper-bundle.min.js') }} "></script>
    <script src=" {{ asset('assets/js/script.js') }} "></script>
    <script src=" {{ asset('assets/js/home.js') }}"></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    // Handle size selection
    const sizeOptions = document.querySelectorAll('input[name="size"]');
    const selectedSizeInput = document.getElementById('selected-size');
    
    sizeOptions.forEach(option => {
        option.addEventListener('change', function() {
            if(this.checked) {
                selectedSizeInput.value = this.value;
            }
        });
    });

    // Set default size if available
    if(sizeOptions.length > 0 && !selectedSizeInput.value) {
        sizeOptions[0].checked = true;
        selectedSizeInput.value = sizeOptions[0].value;
    }

    // Handle quantity
    const quantityInput = document.querySelector('.quantity-controls input');
    const minusBtn = document.querySelector('.quantity-btn.minus');
    const plusBtn = document.querySelector('.quantity-btn.plus');
    const quantityHiddenInput = document.getElementById('product-quantity');

    minusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        if (value > 1) {
            quantityInput.value = value - 1;
            quantityHiddenInput.value = value - 1;
        }
    });
    
    plusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        quantityInput.value = value + 1;
        quantityHiddenInput.value = value + 1;
    });

    quantityInput.addEventListener('change', function() {
        quantityHiddenInput.value = this.value;
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Handle size selection for both forms
    const sizeOptions = document.querySelectorAll('input[name="size"]');
    const selectedSizeInput = document.getElementById('selected-size');
    const buyNowSizeInput = document.getElementById('buy-now-size');
    
    sizeOptions.forEach(option => {
        option.addEventListener('change', function() {
            if(this.checked) {
                selectedSizeInput.value = this.value;
                buyNowSizeInput.value = this.value;
            }
        });
    });

    // Set default size if available
    if(sizeOptions.length > 0) {
        const defaultSize = sizeOptions[0].value;
        sizeOptions[0].checked = true;
        selectedSizeInput.value = defaultSize;
        buyNowSizeInput.value = defaultSize;
    }

    // Handle quantity for both forms
    const quantityInput = document.querySelector('.quantity-controls input');
    const productQuantityInput = document.getElementById('product-quantity');
    const buyNowQuantityInput = document.getElementById('buy-now-quantity');
    const minusBtn = document.querySelector('.quantity-btn.minus');
    const plusBtn = document.querySelector('.quantity-btn.plus');

    const updateQuantityInputs = (value) => {
        productQuantityInput.value = value;
        buyNowQuantityInput.value = value;
    };

    minusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        if (value > 1) {
            quantityInput.value = value - 1;
            updateQuantityInputs(value - 1);
        }
    });
    
    plusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        quantityInput.value = value + 1;
        updateQuantityInputs(value + 1);
    });

    quantityInput.addEventListener('change', function() {
        updateQuantityInputs(this.value);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Handle size selection for both forms
    const sizeOptions = document.querySelectorAll('input[name="size"]');
    const selectedSizeInput = document.getElementById('selected-size');
    const buyNowSizeInput = document.getElementById('buy-now-size');
    
    sizeOptions.forEach(option => {
        option.addEventListener('change', function() {
            if(this.checked) {
                selectedSizeInput.value = this.value;
                buyNowSizeInput.value = this.value;
            }
        });
    });

    // Set default size if available
    if(sizeOptions.length > 0 && !selectedSizeInput.value) {
        sizeOptions[0].checked = true;
        selectedSizeInput.value = sizeOptions[0].value;
        buyNowSizeInput.value = sizeOptions[0].value;
    }

    // Handle quantity for both forms
    const quantityInput = document.querySelector('.quantity-controls input');
    const productQuantityInput = document.getElementById('product-quantity');
    const buyNowQuantityInput = document.getElementById('buy-now-quantity');
    const minusBtn = document.querySelector('.quantity-btn.minus');
    const plusBtn = document.querySelector('.quantity-btn.plus');

    minusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        if (value > 1) {
            quantityInput.value = value - 1;
            productQuantityInput.value = value - 1;
            buyNowQuantityInput.value = value - 1;
        }
    });
    
    plusBtn.addEventListener('click', () => {
        let value = parseInt(quantityInput.value);
        quantityInput.value = value + 1;
        productQuantityInput.value = value + 1;
        buyNowQuantityInput.value = value + 1;
    });

    quantityInput.addEventListener('change', function() {
        productQuantityInput.value = this.value;
        buyNowQuantityInput.value = this.value;
    });
});
    </script>
</body>
</html>