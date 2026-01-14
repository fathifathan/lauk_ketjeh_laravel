<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class ProductController extends Controller
{
    public function index()
    {
        $products = Menu::all();
        return view('admin.product.index', compact('products'));
    }

    public function menu()
    {
        $products = Menu::all();
        return view('admin.menu', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string',
            'desc_menu' => 'required|string',
            'harga_menu' => 'required|numeric|min:0',
            'product_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // simpan file ke storage/app/public/products
        $path = $request->file('product_img')->store('products', 'public');

        Menu::create([
            'nama_menu'   => $request->nama_menu,
            'desc_menu'   => $request->desc_menu,
            'harga_menu'  => $request->harga_menu,
            'product_img' => $path, // simpan path, bukan binary
        ]);

        return redirect()->route('admin.products.index')->with('flash', 'Product added successfully');
    }

    public function destroy($id)
    {
        Menu::where('id_menu', $id)->delete();
        return redirect()->route('admin.product.index')->with('flash', 'Product deleted');
    }

    public function edit($id)
    {
        $product = Menu::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Menu::findOrFail($id);
        $request->validate([
            'update_nama_menu'   => 'required|string',
            'update_desc_menu'   => 'required|string',
            'update_harga_menu'  => 'required|numeric|min:0',
            'update_product_img' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        if ($request->hasFile('update_product_img')) {
            $path = $request->file('update_product_img')->store('products', 'public');
        } else {
            $path = $product->product_img; // tetap pakai path lama
        }

        $product->update([
            'nama_menu'   => $request->update_nama_menu,
            'desc_menu'   => $request->update_desc_menu,
            'harga_menu'  => $request->update_harga_menu,
            'product_img' => $path,
        ]);

        return redirect()->route('admin.products.index')->with('flash', 'Product updated successfully');
    }
}