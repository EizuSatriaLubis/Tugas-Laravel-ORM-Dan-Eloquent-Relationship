<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Metode untuk menampilkan halaman admin
    public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Tampilkan halaman admin dengan daftar produk
        return view('admin', compact('products'));
    }

    // Metode untuk menghapus produk
    public function delete($id)
    {
        // Cari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Hapus produk
        $product->delete();

        // Redirect kembali ke halaman admin
        return redirect()->route('admin.page')->with('success', 'Produk berhasil dihapus');
    }

    public function edit($id)
    {
        // Mengambil data produk berdasarkan ID
        $product = Product::find($id);
        
        // Jika produk ditemukan, tampilkan halaman edit dengan data produk
        if ($product) {
            return view('admin.edit', compact('product'));
        } else {
            // Jika produk tidak ditemukan, kembalikan respons 404
            abort(404);
        }
    }
}
