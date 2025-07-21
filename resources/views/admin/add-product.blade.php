<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/add.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.5.2-web/css/all.min.css') }}">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="ARILESHOP-LOGO">
                </div>
                <div class="close" id="close-btn">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="{{ route('admin.dashboard') }}" >
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                    </span>
                    <h3>Customers</h3>
                </a>
                <a href="order.html">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M320-280q17 0 28.5-11.5T360-320q0-17-11.5-28.5T320-360q-17 0-28.5 11.5T280-320q0 17 11.5 28.5T320-280Zm0-160q17 0 28.5-11.5T360-480q0-17-11.5-28.5T320-520q-17 0-28.5 11.5T280-480q0 17 11.5 28.5T320-440Zm0-160q17 0 28.5-11.5T360-640q0-17-11.5-28.5T320-680q-17 0-28.5 11.5T280-640q0 17 11.5 28.5T320-600Zm120 320h240v-80H440v80Zm0-160h240v-80H440v80Zm0-160h240v-80H440v80ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M120-120v-80l80-80v160h-80Zm160 0v-240l80-80v320h-80Zm160 0v-320l80 81v239h-80Zm160 0v-239l80-80v319h-80Zm160 0v-400l80-80v480h-80ZM120-327v-113l280-280 160 160 280-280v113L560-447 400-607 120-327Z"/></svg>
                    </span>
                    <h3>Analysis</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
                    </span>
                    <h3>Message</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                    <h3>Product</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z"/></svg>
                    </span>
                    <h3>Report</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="add-product.html" class="active">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                    </span>
                    <h3>Add Product</h3>
                </a>
                <a href="#">
                    <span>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="left">
                <h1 style="font-size: 1.6rem;">ADD PRODUCT</h1>
                <div>
                    <br>
                    <h2>Description</h2>
                    <div class="first-form">
                        <label for="product_name">Product Name</label><br>
                        <input type="text" name="name" placeholder="Enter product name" class="product-name" required><br>
                        <label for="description">Product Description</label><br>
                        <textarea name="description" id="description" required></textarea>
                        <div class="size-gender">
                            <div class="form-group">
                                <label style="margin-bottom: 10px;">Size</label>
                                <div class="size-buttons">
                                    <button type="button" class="size" data-size="XS" onclick="toggleSize(this)">XS</button>
                                    <button type="button" class="size" data-size="S" onclick="toggleSize(this)">S</button>
                                    <button type="button" class="size" data-size="M" onclick="toggleSize(this)">M</button>
                                    <button type="button" class="size" data-size="L" onclick="toggleSize(this)">L</button>
                                    <button type="button" class="size" data-size="XL" onclick="toggleSize(this)">XL</button>
                                    <button type="button" class="size" data-size="XXL" onclick="toggleSize(this)">XXL</button>
                                </div>
                                <input type="hidden" id="selectedSizes" name="sizes">
                            </div>
                        </div>
                    </div>
                    <h2>Pricing and Stock</h2>
                    <div class="second-form">
                        <label for="price">Base Price</label><br>
                        <input type="number" name="price" placeholder="Enter the price for the product" style="padding-left:10px;" step="0.01" required>
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" style="padding-left: 10px;" required>
                    </div>
                </div>
            </div>
        
            <div class="right">
                <div class="top">
                    <button class="menu" id="menu-btn">
                        <span ><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg></span>
                    </button>
                    <div class="theme-toggler">
                        <span class="active"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 -960 960 960" ><path d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 80q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280ZM200-440H40v-80h160v80Zm720 0H760v-80h160v80ZM440-760v-160h80v160h-80Zm0 720v-160h80v160h-80ZM256-650l-101-97 57-59 96 100-52 56Zm492 496-97-101 53-55 101 97-57 59Zm-98-550 97-101 59 57-100 96-56-52ZM154-212l101-97 55 53-97 101-59-57Zm326-268Z"/></svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Zm0-80q88 0 158-48.5T740-375q-20 5-40 8t-40 3q-123 0-209.5-86.5T364-660q0-20 3-40t8-40q-78 32-126.5 102T200-480q0 116 82 198t198 82Zm-10-270Z"/></svg></span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey <b>Bless</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="assets/images/me3.png" alt="profile-photo">
                        </div>
                    </div>
                </div>
                <h2>Product Image</h2>
                <div class="cart-container">
                    <div class="upload-section">
                        <div class="upload-box" id="dropZone">
                            <i class="fas fa-cloud-upload-alt" style="color: #4e73df;"></i>
                            <p>Drag & drop images here or click to browse</p>
                            <input type="file" id="fileInput" name="image" accept="image/*" required>
                            <input type="file" id="galleryInput" name="gallery[]" multiple accept="image/*" style="display: none;">
                        </div>
                        <div class="upload-info">
                            <p>Supported formats: JPG, PNG, GIF</p>
                            <p>Max file size: 5MB per image</p>
                        </div>
                    </div>
                    
                    <div class="cart-items" id="cartItems">
                      <!-- Images will be added here dynamically -->
                      <div class="empty-cart">
                        <i class="fas fa-images"></i>
                        <p>Your cart is empty</p>
                        <p>Upload some images to get started</p>
                      </div>
                    </div>
                    
                    <div class="cart-actions">
                      <button class="btn btn-clear" id="clearCart">
                        <i class="fas fa-trash"></i> Clear All
                      </button>
                    </div>
                  </div>  
                  
                  <div class="last-form">
                    <h2>Category</h2>
                    <label for="category">Product Category</label>
                    <select name="category" id="category" required>
                        <option value="jacket">Jacket</option>
                        <option value="tshirt">Tshirt</option>
                        <option value="trouser">Trouser</option>
                        <option value="polover">Polover</option>
                        <option value="Women">Women cloth</option>
                        <option value="Up/down">Up/down</option>
                    </select>
                </div>
                  <div class="submit">
                    <input type="submit">
                </div>
            </div>


        </form>
        @auth
    <div style="position: fixed; bottom: 0; background: white; padding: 10px;">
        Your User ID: {{ auth()->id() }}
    </div>
@endauth
    </div>
    <script src=" {{ asset('assets/js/add-script.js') }} "></script>
    <script src=" {{ asset('assets/js/admin-dashboard.js') }} "></script>
    <script src=" {{ asset('assets/js/aad-orders.js') }}"></script>
    <script src=" {{ asset('assets/js/all.main.js') }}"></script>

    
</body>
</html>