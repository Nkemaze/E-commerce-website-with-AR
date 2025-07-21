<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\allcontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ARController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () { return view('index');});
Route::get('/index', function () { return view('index');});
Route::get('/about', function () { return view('about');});
Route::get('/contact', function () { return view('contact');});
Route::get('/shop', function () {
    $products = \App\Models\Product::all();
    return view('shop', compact('products'));
})->name('shop');
Route::get('/cart', function () { return view('cart');});
Route::get('/cart2', function () { return view('cart2');});
Route::get('/cart3', function () { return view('cart3');});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () { 
    $products = \App\Models\Product::orderBy('updated_at', 'desc')
                                 ->take(8)
                                 ->get();
    return view('home', compact('products'));
})->middleware(['auth', 'verified'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{key}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart2', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.place-order');
Route::get('/cart3', [CartController::class, 'confirmation'])->name('cart.confirmation');
Route::post('/cart/buy-now/{id}', [CartController::class, 'buyNow'])->name('cart.buy-now');

Route::get('/ar/try-on/{product}', [ARController::class, 'tryOn'])->name('ar.try-on');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', [AllController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('admin/add-product', function () { return view('admin/add-product');});
    Route::post('/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])
    ->name('admin.products.store');

});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
});