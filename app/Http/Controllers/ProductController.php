<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',        // Ganti nama_produk dengan name
            'description' => 'required|string',        // Ganti deskripsi dengan description
            'price' => 'required|numeric',             // Ganti harga dengan price
            'stok' => 'required|integer',              
            'status' => 'required|string',
        ]);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Memperbarui produk di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',        // Ganti nama_produk dengan name
            'description' => 'required|string',        // Ganti deskripsi dengan description
            'price' => 'required|numeric',             // Ganti harga dengan price
            'stok' => 'required|integer',              
            'status' => 'required|string',
        ]);
    
        $product = Product::findOrFail($id);
        $product->update($request->all());
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
