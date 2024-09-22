<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kelola Produk')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            padding: 15px 20px;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            margin-left: 250px; /* Initial margin for navbar */
            transition: margin-left 0.5s ease; /* Transisi halus */
            position: relative; /* Untuk positioning dropdown */
        }
        .navbar button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        .navbar button:hover {
            background-color: #0056b3;
        }
        .navbar button i {
            font-size: 1.2em; /* Atur ukuran ikon sesuai kebutuhan */
        }
        .dropdown {
            position: absolute;
            right: 20px;
            top: 100%; /* Letakkan dropdown tepat di bawah navbar */
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            display: none; /* Sembunyikan dropdown secara default */
            z-index: 1000; /* Pastikan dropdown di atas konten lain */
        }
        .dropdown button {
            width: 100%;
            background: none;
            border: none;
            color: #343a40;
            padding: 10px 15px;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .dropdown button:hover {
            background-color: #f1f1f1;
        }
        .sidebar {
            height: 100%;
            width: 250px; /* Sidebar terbuka secara default */
            position: fixed;
            top: 0;
            left: 0;
            background-color: #212529;
            overflow-x: hidden;
            transition: width 0.5s ease;
            padding-top: 20px; /* Sesuaikan padding atas */
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.2);
        }
        .sidebar.collapsed {
            width: 60px; /* Lebar sidebar ketika dikompres */
        }
        .sidebar .logo {
            display: flex;
            align-items: center;
            justify-content: center; /* Pusatkan logo dan teks */
            color: #f8f9fa;
            margin-bottom: 20px; /* Spasi di bawah logo */
        }
        .sidebar .logo img {
            width: 40px; /* Ukuran logo */
            height: 40px; /* Ukuran logo */
            margin-right: 10px;
        }
        .sidebar .logo span {
            transition: opacity 0.3s ease;
        }
        .sidebar.collapsed .logo span {
            opacity: 0; /* Sembunyikan teks ketika collapsed */
            pointer-events: none; /* Nonaktifkan interaksi */
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #f8f9fa;
            display: flex;
            align-items: center;
            position: relative;
            transition: color 0.3s ease;
            overflow: hidden; /* Mencegah teks meluber */
            white-space: nowrap; /* Mencegah teks untuk membungkus */
        }
        .sidebar a span {
            display: inline-block; /* Memastikan teks dapat disembunyikan */
            transition: opacity 0.3s ease;
            overflow: hidden; /* Sembunyikan teks yang tidak muat */
            text-overflow: ellipsis; /* Menambahkan ... jika teks terlalu panjang */
            max-width: 150px; /* Atur lebar maksimum sesuai kebutuhan */
        }
        .sidebar a.collapsed span {
            display: none; /* Sembunyikan teks jika sidebar terkompresi */
        }
        .sidebar a i {
            margin-right: 10px;
        }
        .sidebar a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 4px;
            height: 0;
            background-color: #007bff;
            transition: height 0.3s ease, top 0.3s ease;
        }
        .sidebar a:hover::before {
            height: 100%;
            top: 0;
        }
        .sidebar a:hover {
            color: #007bff;
        }
        .navbar a.active, .sidebar a.active {
            background-color: #007bff;
            color: white;
            border-radius: 6px;
        }
        .content {
            padding: 20px;
            margin-left: 250px; /* Menyesuaikan margin konten agar tidak tertutup */
            transition: margin-left 0.5s ease;
        }
        h1 {
            color: #343a40;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <nav class="navbar" id="navbar">
        <button id="menu-button"><i class="fas fa-bars"></i></button>
        <button id="account-button"><i class="fas fa-user"></i></button>
        <div class="dropdown" id="account-dropdown">
            <button id="shop-button">Shop</button>
            <button id="logout-button">Logout</button>
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <div class="logo">
            <img src="/img/icon_m.png" alt="">
        </div>
        <a href="#" class="active"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
        <a href="#"><i class="fas fa-box"></i><span> Produk</span></a>
        <a href="#"><i class="fas fa-user-alt"></i><span> User</span></a>
        <a href="#"><i class="fas fa-archive"></i><span> Barang Inventaris</span></a>
    </div>
    
    <div class="content" id="content">
        <h1>Daftar Produk</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Produk A</td>
                    <td>Rp 100.000</td>
                    <td>Aktif</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Produk B</td>
                    <td>Rp 150.000</td>
                    <td>Nonaktif</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Produk C</td>
                    <td>Rp 200.000</td>
                    <td>Aktif</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <script>
        $(document).ready(function(){
            $("#menu-button").click(function(){
                var sidebar = $("#sidebar");
                var content = $(".content");
                var navbar = $("#navbar");

                sidebar.toggleClass("collapsed");
                content.css("margin-left", sidebar.hasClass("collapsed") ? "60px" : "250px");
                navbar.css("margin-left", sidebar.hasClass("collapsed") ? "60px" : "250px");
            });

            $("#account-button").click(function(){
                $("#account-dropdown").toggle(); // Menampilkan atau menyembunyikan dropdown
            });

            // Menutup dropdown jika klik di luar dropdown
            $(document).click(function(event) {
                if (!$(event.target).closest("#account-button, #account-dropdown").length) {
                    $("#account-dropdown").hide(); // Menyembunyikan dropdown
                }
            });
        });
    </script>

</body>
</html>
