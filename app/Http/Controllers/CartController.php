<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $size = $request->input('size');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        // Check if product with same size already exists in cart
        $key = $this->findProductInCart($cart, $id, $size);

        if ($key !== false) {
            // Update quantity if product exists
            $cart[$key]['quantity'] += $quantity;
        } else {
            // Add new item to cart
            $cart[] = [
                "product_id" => $id,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image_path,
                "size" => $size
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);
        
        if(isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    /**
     * Helper method to find a product in the cart
     */
    private function findProductInCart($cart, $productId, $size)
    {
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId && $item['size'] == $size) {
                return $key;
            }
        }
        return false;
    }

    public function checkout()
{
    $cart = session()->get('cart', []);
    return view('cart2', compact('cart'));
}

public function placeOrder(Request $request)
{
    // Validate form data
    $validated = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'pincode' => 'required',
        'state' => 'required',
        'city' => 'required',
        'house_no' => 'required',
        'road_name' => 'required',
        'quater' => 'required',
        'payment' => 'required'
    ]);

    // Get cart items
    $cart = session()->get('cart', []);
    
    // Calculate totals
    $subtotal = array_reduce($cart, function($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);
    
    $vat = $subtotal * 0.15; // Example 15% VAT
    $total = $subtotal + $vat;

    // Create order data
    $order = [
        'order_number' => 'ORD-' . now()->format('Ymd') . '-' . rand(1000, 9999),
        'date' => now()->format('d/m/Y H:i'),
        'total' => $total,
        'payment_method' => $request->payment,
        'shipping_info' => $validated,
        'items' => $cart,
        'subtotal' => $subtotal,
        'vat' => $vat
    ];

    // Store order in session
    session()->put('order', $order);

    // Clear the cart
    session()->forget('cart');

    // Redirect to confirmation page with order data
    return redirect()->route('cart.confirmation')->with('order', $order);
}

public function confirmation()
{
    // Get order from session or flash data
    $order = session()->get('order') ?? session()->get('_old_input')['order'] ?? null;

    if (!$order) {
        // Create empty order structure if none exists
        $order = [
            'order_number' => '',
            'date' => '',
            'total' => 0,
            'payment_method' => '',
            'items' => [],
            'subtotal' => 0,
            'vat' => 0,
            'shipping_info' => [
                'name' => '',
                'phone' => '',
                'pincode' => '',
                'state' => '',
                'city' => '',
                'house_no' => '',
                'road_name' => '',
                'quater' => ''
            ]
        ];
    }

    return view('cart3', ['order' => $order]);
}
public function buyNow(Request $request, $id)
{
    // First clear any existing cart items
    session()->forget('cart');

    // Then add the current product
    $product = Product::findOrFail($id);
    $size = $request->input('size');
    $quantity = $request->input('quantity', 1);

    $cart = [];
    $cart[] = [
        "product_id" => $id,
        "name" => $product->name,
        "quantity" => $quantity,
        "price" => $product->price,
        "image" => $product->image_path,
        "size" => $size
    ];

    session()->put('cart', $cart);
    
    // Redirect directly to checkout page
    return redirect()->route('cart.index');
}
}