<?php
session_start();
// if (isset($_SESSION['nama']) || isset($_SESSION['email']) || isset($_SESSION['game']) || isset($_SESSION['uid']) || isset($_SESSION['item']) || isset($_SESSION['total'])) {
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-VnSbj2InN_rC6ZNRzdtdNjHr';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$game = $_SESSION['game'];
$uid = $_SESSION['uid'];
$server = $_SESSION['server'];
$item = $_SESSION['item'];
$total = $_SESSION['total'];
// echo "<script>
//     console.log(" . json_encode($game) . ");
//     </script>";
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $total,
    ),
    'item_details' => array(
        array(
            'id' => strval($uid . " " . $server),
            'price' => $total,
            'quantity' => 1,
            'name' => strval($game),
        ),
    ),
    'customer_details' => array(
        'first_name' => $nama,
        'email' => $email,
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
// }