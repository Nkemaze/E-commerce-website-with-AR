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

    private function findProductInCart($cart, $productId, $size)
    {
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $productId && $item['size'] == $size) {
                return $key;
            }
        }
        return false;
    }
}