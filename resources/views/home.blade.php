<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amandemy Cafe</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <nav>
        <div class="logo">Amandemy</div>
        <ul>
            <li>Home</li>
            <li>Our Clients</li>
            <li>Products</li>
        </ul>
        <div class="search">
            <input type="text" placeholder="Search...">
        </div>
    </nav>

    <section class="hero" style="background-color: #3498db;">
        <div class="hero-content">
            <h1 style="text-align: center; color: #fff;">Tambah Data Produk</h1>
            <form method="POST" action="{{ route('store.product') }}">
                @csrf <!-- CSRF protection -->
            
                <div class="form-group">
                    <label for="nama-produk">Nama Produk:</label>
                    <input type="text" id="nama-produk" name="nama_produk" class="form-control">
                    @error('nama_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="berat-produk">Berat Produk:</label>
                    <input type="text" id="berat-produk" name="berat_produk" class="form-control">
                    @error('berat_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="harga-produk">Harga Produk:</label>
                    <input type="text" id="harga-produk" name="harga_produk" class="form-control">
                    @error('harga_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="stok-produk">Stok Produk:</label>
                    <input type="text" id="stok-produk" name="stok_produk" class="form-control">
                    @error('stok_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="kondisi-produk">Kondisi Produk:</label>
                    <select id="kondisi-produk" name="kondisi_produk" class="form-control">
                        <option value="">Pilih Kondisi Barang</option>
                        <option value="baru">Baru</option>
                        <option value="bekas">Bekas</option>
                    </select>
                    @error('kondisi_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="deskripsi-produk">Deskripsi Produk:</label>
                    <textarea id="deskripsi-produk" name="deskripsi_produk" class="form-control"></textarea>
                    @error('deskripsi_produk')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="gambar-produk-url">URL Gambar Produk:</label>
                    <input type="text" id="gambar-produk-url" name="gambar_produk_url" class="form-control">
                    @error('gambar_produk_url')
                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error -->
                    @enderror
                </div>
            
                <div class="form-group" style="text-align: center;">
                    <input type="submit" value="Tambah Data Produk" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>

    
    <section class="product-list">
        <h2 style="text-align: center;">Product</h2>
        <table class="product-table">
            <tr>
                <!-- Menampilkan daftar produk -->
                @foreach ($products as $product)
                <td>
                    <div class="product-item">
                        <img src="{{ $product->gambar }}" alt="{{ $product->nama }}">
                        <div class="product-info">
                            <p class="product-name">{{ $product->nama }}</p>
                            <p class="product-price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <p class="product-description">Berat: {{ $product->berat }} | Stok: {{ $product->stok }} | Kondisi: {{ ucfirst($product->kondisi) }}</p>
                            <p class="product-description">{{ $product->deskripsi }}</p>
                            <button class="order-button">Pesan Sekarang</button>
                            <!-- Tulisan "Halaman Admin" berada di dalam kotak produk -->
                            <div class="admin-link">
                                <a href="{{ route('admin.page') }}">Halaman Admin</a>
                            </div>
                        </div>
                    </div>
                </td>
                @endforeach
            </tr>
        </table>
    </section>
    
    
    

   
    <style>
        nav {
            background-color: #248eff;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        nav .logo {
            font-size: 24px;
        }

        nav ul {
            list-style-type: none;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
            cursor: pointer;
        }

        nav .search {
            display: flex;
            align-items: center;
        }

        nav .search input[type="text"] {
            padding: 5px;
            border: none;
            border-radius: 3px;
            margin-right: 5px;
        }

        nav .search button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .hero {
        background-color: #ffffff;
        color: #fff;
        padding: 50px 0;
    }

    .hero-content {
        width: 80%;
        margin: 0 auto;
        text-align: center;
    }

    .hero-content h1 {
        margin-bottom: 20px;
    }

    /* CSS untuk form */
    form {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #09adff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333; /* Tambahkan warna teks untuk label */
    }

    .form-control {
        width: calc(100% - 10px);
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 0 3px 0 #719ECE;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        background-color: #fbfbfb;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #ffffff;
    }

        .product-list {
            padding: 50px;
        }

        .product-list h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .product-list th, .product-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .product-list th {
            background-color: #f2f2f2;
        }

        .product-list td img {
            max-width: 100px;
            height: auto;
        }

        .product-list button {
            background-color: #249cff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .product-list button:hover {
            background-color: #25dbff;
        }
        .product-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #3498db; 
}

.product-item {
    background-color: #fff;
    margin: 20px;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-item img {
    width: 200px; 
    height: auto; 
    margin-bottom: 10px;
}


.product-name {
    font-weight: bold;
}

.product-price {
    font-size: 16px;
    color: #333;
}

.product-description {
    margin-top: 10px;
}

.order-button {
    background-color: #4CAF50; 
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.order-button:hover {
    background-color: #45a049;
}

#admin-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    z-index: 999; /* Mengatur urutan tumpukan agar di atas elemen lain */
}

#admin-button:hover {
    background-color: #2980b9;
}

.admin-link {
    background-color: #3498db; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    padding: 10px 20px; /* Padding */
    border-radius: 5px; /* Sudut border */
    margin-top: 10px; /* Jarak atas */
    text-align: center; /* Posisi teks */
}

.admin-link a {
    color: #fff; /* Warna teks untuk tautan */
    text-decoration: none; /* Hapus dekorasi tautan */
}

.admin-link a:hover {
    text-decoration: underline; /* Tambahkan garis bawah saat tautan dihover */
}


    </style>
</body>
</html>
