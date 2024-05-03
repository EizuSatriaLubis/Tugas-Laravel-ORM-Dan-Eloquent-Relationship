<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
            <h1 style="text-align: center; color: #fff;">Admin Page</h1>
        </div>
    </section>

    <section class="product-list">
        <div class="list-product-box">
            <h2 style="text-align: center;">List Product</h2>
        </div>
        <table class="product-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Kondisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>{{ $product->berat }}</td>
                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($product->kondisi) }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.delete', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <footer>
        <!-- Footer content here -->
    </footer>

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
        /* CSS yang telah disesuaikan */
        .product-list {
            padding: 50px;
        }

        .list-product-box {
            background-color: #3498db;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .list-product-box h2 {
            color: #fff;
            text-align: center;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .product-table th {
            background-color: #f2f2f2;
        }

        .product-table td {
            color: #333;
        }

        .product-table button {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .product-table button.btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .product-table button.btn-danger:hover {
            background-color: #c82333;
        }

        .product-table button.btn-warning {
            background-color: #28a745;
            color: #fff;
        }

        .product-table button.btn-warning:hover {
            background-color: #218838;
        }
    </style>
</body>
</html>