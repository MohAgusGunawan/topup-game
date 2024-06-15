<?php
include "koneksi.php";
$action = isset($_GET['submenu']) ? $_GET['submenu'] : '';
switch ($action) {
  default:
    ?>

    <head>
      <!-- <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css"> -->
      <link rel="stylesheet" href="sweetalert2/animate.min.css">
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
      <!-- <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css"> -->
      <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="page/home/home.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
      <!-- <script src="page/home/home.js"></script> -->
      <script src="bootstrap-5/js/bootstrap.min.js"></script>
      <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
      <script src="bootstrap-4/js/popper.min.js"></script>
      <!-- <script src="sweetalert2/js/sweetalert2.min.js"></script> -->
      <!-- <script src="bootstrap-4/js/bootstrap.min.js"></script> -->
    </head>
    <br>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="admin.php?menu=home&submenu=PB"><img src="assets/img/bgPB.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=HI3"><img src="assets/img/bgHI3.png" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=WWH"><img src="assets/img/bgWWH.png" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=FF"><img src="assets/img/bgFF.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=LA"><img src="assets/img/bgLA.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=marvel"><img src="assets/img/bgMarvel.png"
                style="width: 800px; height: 250px;" class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=stumble"><img src="assets/img/bgSTUMBLE.png"
                style="width: 800px; height: 250px;" class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=TE"><img src="assets/img/bgTE.jpeg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=ML"><img src="assets/img/bgML.jpeg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=PUBG"><img src="assets/img/bgPUBG.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=COD"><img src="assets/img/bgCOD.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
          <div class="carousel-item">
            <a href="admin.php?menu=home&submenu=GI"><img src="assets/img/slide5.jpg" style="width: 800px; height: 250px;"
                class="d-block w-100" alt="..."></a>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    </div>
    <br>

    <h1>TOPUP GAME</h1>
    <?php
    $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 1");
    $d = mysqli_fetch_assoc($query);
    ?>
    <div class="card-deck">
      <div class="card">
        <a href="?menu=home&submenu=ML">
          <img src="assets/img/ml.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 5");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=PUBG">
          <img src="assets/img/pubg.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 3");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=COD">
          <img src="assets/img/cod.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 2");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=FF">
          <img src="assets/img/ff.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 4");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=GI">
          <img src="assets/img/genshin.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 6");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=stumble">
          <img src="assets/img/stumble.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
    </div>
    <div class="lol"><br></div>
    <?php
    $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 7");
    $d = mysqli_fetch_assoc($query);
    ?>
    <div class="card-deck">
      <div class="card">
        <a href="?menu=home&submenu=PB">
          <img src="assets/img/pb.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 8");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=HI3">
          <img src="assets/img/hi3.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 9");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=TE">
          <img src="assets/img/te.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 10");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=LA">
          <img src="assets/img/la.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 11");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=marvel">
          <img src="assets/img/marvel.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
      <?php
      $query = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game = 12");
      $d = mysqli_fetch_assoc($query);
      ?>
      <div class="card">
        <a href="?menu=home&submenu=WWH">
          <img src="assets/img/wwh.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="color: black">
              <?= $d['nama_game']; ?>
            </h5>
          </div>
        </a>
      </div>
    </div>
    <br>

    <?php
    break;

  case "ML":
    include "game/ml.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "PUBG":
    include "game/pubg.php";
    include "transaction.php";
    processTransaction();
    ?>


    <?php
    break;
  case "COD":
    include "game/cod.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "FF":
    include "game/ff.php";
    include "transaction.php";
    processTransaction();
    // include "placeOrder.php";
    // processOrder();
    ?>

    <?php
    break;
  case "GI":
    include "game/gi.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "stumble":
    include "game/stumble.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "PB":
    include "game/pb.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "HI3":
    include "game/hi3.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "TE":
    include "game/te.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "LA":
    include "game/la.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
  case "marvel":
    include "game/marvel.php";
    include "transaction.php";
    processTransaction();
    ?>


    <?php
    break;
  case "WWH":
    include "game/wwh.php";
    include "transaction.php";
    processTransaction();
    ?>

    <?php
    break;
}