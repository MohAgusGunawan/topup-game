<?php
include 'koneksi.php';

// Bagian Home
if ($menu == 'home') {
  if ($_SESSION['level'] == "admin") {
    include "page/home2/home.php";
  } else {
    include "page/home/home.php";
  }
}

// Bagian user
elseif ($menu == 'user') {
  if ($_SESSION['level'] == "admin") {
    include "page/user/user.php";
  } else {
    include "page/user2/user2.php";
  }
}

// Bagian transaksi
elseif ($menu == 'transaksi') {
  if ($_SESSION['level'] == "admin") {
    include "page/transaksi/transaksi.php";
  } else {
    include "page/allTransaksi/allTransaksi.php";
  }
}


// Apabila modul tidak ditemukan
else {
  echo "<h4 class='text-center' style='margin-top:60px;'><b>PAGE BELUM ADA ATAU BELUM LENGKAP ATAU ANDA TIDAK BERHAK 
  MENGAKSES HALAMAN INI</b></h4>";
}
?>