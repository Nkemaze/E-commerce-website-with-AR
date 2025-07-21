<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.add-product'); // Your add product page
    }

    public function show(Product $product)
    {
        return view('product-details', compact('product'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'sizes' => 'required',
        'category' => 'required',
        'image' => 'required|image|max:5120'
        // Removed gallery validation
    ]);

    // Process main image only
    $imagePath = $request->file('image')->store('products', 'public');

    // Create product with just the main image
    Product::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'quantity' => $validated['quantity'],
        'sizes' => json_decode($validated['sizes']),
        'category' => $validated['category'],
        'image_path' => $imagePath
        // Removed gallery_images
    ]);

    return redirect()->back()->with('success', 'Product added!');
}
}