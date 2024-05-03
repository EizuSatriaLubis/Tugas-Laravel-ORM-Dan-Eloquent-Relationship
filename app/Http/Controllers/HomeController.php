<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar produk.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua produk dari database menggunakan Eloquent
        $products = Product::all();
        
        // Mengirim data produk ke tampilan 'home'
        return view('home', compact('products'));
    }

    /**
     * Menyimpan produk baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric|min:0',
            'stok_produk' => 'required|numeric|min:0',
            'berat_produk' => 'required|string|max:255',
            'kondisi_produk' => 'required|string|in:baru,bekas',
            'deskripsi_produk' => 'required|string',
            'gambar_produk_url' => 'required|url', // Validasi untuk URL gambar
        ]);

        // Membuat instance model Product dan mengisi atributnya
        $product = new Product();
        $product->nama = $request->input('nama_produk');
        $product->harga = $request->input('harga_produk');
        $product->stok = $request->input('stok_produk');
        $product->berat = $request->input('berat_produk');
        $product->kondisi = $request->input('kondisi_produk');
        $product->deskripsi = $request->input('deskripsi_produk');
        $product->gambar = $request->input('gambar_produk_url');
        // Menyimpan produk ke database
        $product->save();

        // Redirect kembali ke halaman utama dengan pesan sukses
        return redirect()->route('home')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menghapus produk berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        // Mencari produk berdasarkan ID
        $product = Product::find($id);
        
        // Jika produk ditemukan, hapus produk tersebut
        if ($product) {
            $product->delete();
            return redirect()->route('home')->with('success', 'Produk berhasil dihapus.');
        } else {
            // Jika produk tidak ditemukan, kembalikan pesan kesalahan
            return redirect()->route('home')->with('error', 'Produk tidak ditemukan.');
        }
    }
}
