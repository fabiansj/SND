<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .nav {
            display: inline-block;
            position: relative;
        }

        .nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .nav li {
            display: inline-block;
        }

        .nav a,
        .dropdown-content a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .nav a:hover,
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown {
            display: none;
            position: absolute;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            left: 100%;
            top: 0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content:hover .nested-dropdown {
            display: block;
        }

        .nested-dropdown {
            display: none;
            position: absolute;
            left: 100%;
            top: 0;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
    </style>
</head>

<body>

    <div class="nav">
        <ul>
            <li class="dropdown">
                <a href="{{ asset('home') }}">Produk</a>
                <div class="dropdown-content">
                    <a href="{{ asset('home') }}">Produk 1</a>
                    <a href="{{ asset('home') }}">Produk 2</a>
                    <div class="nested-dropdown">
                        <a href="{{ asset('home') }}">Isi Produk 1</a>
                        <a href="{{ asset('home') }}">Isi Produk 2</a>
                    </div>
                    <a href="{{ asset('home') }}">Produk 3</a>
                </div>
            </li>
        </ul>
    </div>

</body>

</html> -->

<nav class="menu">
    <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="#">Tentang</a>
            <ul>
                <li><a href="#">Visi dan Misi</a></li>
                <li><a href="#">Tim</a></li>
            </ul>
        </li>
        <li><a href="#">Layanan</a></li>
        <li><a href="#">Kontak</a></li>
    </ul>
</nav>

<style>
    .menu ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .menu ul li {
        position: relative;
        float: left;
    }

    .menu ul li a {
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        color: #333;
    }

    .menu ul ul {
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .menu ul ul li {
        float: none;
        width: 200px;
    }

    .menu ul ul a {
        padding: 8px 20px;
    }

    .menu ul li:hover>ul {
        display: block;
    }
</style>
