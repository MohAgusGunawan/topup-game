<?php
include "koneksi.php";
//untuk ngecek, apakah ada atau tidak tipe get menu di URL browser, agar tidak muncul error 
//jika menu tidak di tulis
$menu = isset($_GET['menu']) ? $_GET['menu'] : "home";
?>

<?php
if ($_SESSION['level'] == "admin") {
  ?>

  <head>
    <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
    <style>
      @media only screen and (max-width: 636px) {
        .cash {
          display: none;
        }

        .cah {
          font-size: 13px;
        }
      }

      @media only screen and (min-width: 636px) {
        .cah {
          display: none;
        }
      }
    </style>
  </head>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1B1535;">
    <a href="?menu=home"><img src="assets/img/tes10.jpeg" class="navbar-brand"
        style="height: 40px; width: 40px; border-radius: 100%;"></a>
    <?php
    $id = $_SESSION['username'];
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
    $d = mysqli_fetch_array($edit);
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="width: 100%;">
        <li class="nav-item <?= ($menu == "user") ? "active" : "" ?>">
          <a class="nav-link" href="?menu=user">
            <span><ion-icon name="contact" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle; margin-left: -3px;">User</span>
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item <?= ($menu == "transaksi") ? "active" : "" ?>">
          <a class="nav-link" href="?menu=transaksi">
            <span><ion-icon name="cart" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle; margin-left: -3px;">Transaksi</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav" style="color: white; width: 70%; justify-content: start;">
        <?php
        $id = $_SESSION['username'];
        $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
        $d = mysqli_fetch_array($edit);
        ?>
      </ul>
      <ul class="navbar-nav mr-auto" style="width: 850px; display: flex; justify-content: flex-end;">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span><ion-icon name="log-out" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle; margin-left: -3px;">LogOut</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <?php

} else {
  ?>

  <head>
    <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
    <style>
      @media only screen and (max-width: 636px) {
        .cash {
          display: none;
        }

        .cah {
          font-size: 13px;
        }
      }

      @media only screen and (min-width: 636px) {
        .cah {
          display: none;
        }
      }
    </style>
  </head>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1B1535;">
    <img src="assets/img/tes10.jpeg" class="navbar-brand" style="height: 40px; width: 40px; border-radius: 100%;">
    <?php
    $id = $_SESSION['username'];
    $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
    $d = mysqli_fetch_array($edit);
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="width: 100%;">
        <li class="nav-item <?= ($menu == "user") ? "active" : "" ?>">
          <a class="nav-link" href="?menu=user">
            <span><ion-icon name="contact" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle;">Profil</span>
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item <?= ($menu == "home") ? "active" : "" ?>">
          <a class="nav-link" href="?menu=home">
            <span><ion-icon name="home" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle;">Home</span>
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item <?= ($menu == "transaksi") ? "active" : "" ?>">
          <a class="nav-link" href="?menu=transaksi">
            <span><ion-icon name="cart" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle;">Transaksi</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav" style="color: white; width: 70%; justify-content: start;">
        <?php
        $id = $_SESSION['username'];
        $edit = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
        $d = mysqli_fetch_array($edit);
        ?>
      </ul>
      <ul class="navbar-nav mr-auto" style="width: 850px; display: flex; justify-content: flex-end;">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span><ion-icon name="log-out" style="font-size: 19px; vertical-align: middle;"></ion-icon></span>
            <span style="font-size: 12px; vertical-align: middle;">LogOut</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
}
?>