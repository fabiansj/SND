<?php
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php

Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/../midtrans-php-master/Midtrans.php'; //jika php harus diawali dengan "/" jika ingin membuka path sebelumnya
// require_once base_path('midtrans-php-master/Midtrans.php');

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
// SB-Mid-server-hXCZmmfY4Kg68rM10My_UTaL < server key
// \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-hXCZmmfY4Kg68rM10My_UTaL');
// \Midtrans\Config::$serverKey = 'SB-Mid-server-hXCZmmfY4Kg68rM10My_UTaL';
// // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
// \Midtrans\Config::$isProduction = FALSE;
// // Set sanitization on (default)
// \Midtrans\Config::$isSanitized = true;
// // Set 3DS transaction for credit card to true
// \Midtrans\Config::$is3ds = true;

// if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {    
//     // Buat parameter untuk request pembayaran Midtrans
//     $params = array(
//         'transaction_details' => array(
//             'order_id' => rand(),
//             'gross_amount' => $_POST['total'],
//         ),
//         'item_details' => json_decode($_POST['items'], true),
//         'customer_details' => array(
//             'first_name' => $_POST['name'],
//             'email' => $_POST['email'],
//             'phone' => $_POST['phone'],
//         ),
//     );

//     // Dapatkan token Snap dari Midtrans
//     $snapToken = \Midtrans\Snap::getSnapToken($params);

//     // Sekarang Anda dapat menggunakan $snapToken sesuai kebutuhan Anda
//     echo $snapToken;
// } else {
//     // Jika bukan metode POST, Anda dapat menangani kasus ini sesuai kebutuhan Anda
//     // echo "Invalid Request";
//     // kenapa else? karena metode post tersebut diawali dengan null / array kosong jadi tidak ada data yang di post kenapa bisa begitu ? karena data tersebut harus dipilih dahulu / ditambahkan kesebuah checkout baru data post akan dapat digunakan
// }
// ?>