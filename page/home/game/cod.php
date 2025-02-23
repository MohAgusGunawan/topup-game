<link rel="stylesheet" href="page/home/case.css">
<script src="page/home/case.js"></script>
<br>
<div class="kembali">
    <a href="?menu=home" class="btn btn-info" style="height: 30px; width: 30px"><ion-icon name="arrow-round-back"
            style="margin-left: -6px"></ion-icon></a>
</div>
<div class="container">
    <div class="item">
        <div class="bg">
            <img src="assets/img/bgCOD.jpg" alt="..." id="bg">
        </div>
        <div class="teks">
            <h2 class="text-start" style="margin-top:10px">Call Of Duty Mobile</h2>
            <p style="color: red">Masukkan data Transaksi dengan benar, pastikan UID Benar Supaya tidak terjadi hal
                yang tidak di inginkan. Kami tidak bertanggung jawab atas kesalahan user.</p>
            <p>Unduh dan mainkan Call Of Duty sekarang!</p>
            <a href="https://apps.apple.com/id/app/call-of-duty-mobile-garena/id1465688043"><img
                    src="assets/img/app.png" alt=""></a>
            <a href="https://play.google.com/store/apps/details?id=com.garena.game.codm&hl=id"><img
                    src="assets/img/play.png" alt=""></a>
        </div>
    </div>
    <div class="item">
        <div class="item-list">
            <h2>1. Pilih Item</h2>
            <label class="notifError3">Pilih item terlebih dahulu!</label>
            <div class="item-item">
                <div class="list-item" onclick="changeColor(this, '31 CP', '4505')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>31 CP</strong></p>
                    <p style="color: red"><strong>Rp. 4.505</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '62 CP', '9009')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>62 CP</strong></p>
                    <p style="color: red"><strong>Rp. 9.009</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '127 CP', '18000')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>127 CP</strong></p>
                    <p style="color: red"><strong>Rp. 18.000</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '320 CP', '45045')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>320 CP</strong></p>
                    <p style="color: red"><strong>Rp. 45.045</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '645 CP', '90090')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>645 CP</strong></p>
                    <p style="color: red"><strong>Rp. 90.090</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '800 CP', '108108')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>800 CP</strong></p>
                    <p style="color: red"><strong>Rp. 108.108</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '1373 CP', '180180')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>1373 CP</strong></p>
                    <p style="color: red"><strong>Rp. 180.180</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '2059 CP', '270270')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>2059 CP</strong></p>
                    <p style="color: red"><strong>Rp. 270.270</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '2749 CP', '342342')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>2749 CP</strong></p>
                    <p style="color: red"><strong>Rp. 342.342</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '3564 CP', '450450')">
                    <img src="assets/img/diamond.png" alt="">
                    <p><strong>3564 CP</strong></p>
                    <p style="color: red"><strong>Rp. 450.450</strong></p>
                </div>
            </div>
        </div>
        <!-- <br>
    <div class="item-list">
      <h2>2. Pilih Pembayaran</h2>
      <div class="item-item">
        <div class="list-pembayaran" onclick="changeColor2(this)">
          <img src="assets/img/dana.png" alt="">
        </div>
        <div class="list-pembayaran" onclick="changeColor2(this)">
          <img src="assets/img/ovo.png" alt="">
        </div>
        <div class="list-pembayaran" onclick="changeColor2(this)">
          <img src="assets/img/gopay.png" alt="">
        </div>
      </div>
    </div> -->
        <br>
        <form method="POST">
            <?php
            $id = $_SESSION['username'];
            //query ke tabel sesuai dengan ID yang ada di URL
            $nama = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
            $d = mysqli_fetch_array($nama);
            ?>
            <input type="hidden" class="form-control" name="nama_user" id="nama_user" required autocomplete="off"
                value="<?= $d['username']; ?>" readonly />
            <?php
            //query ke tabel sesuai dengan ID yang ada di URL
            $ml = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game=3");
            $d = mysqli_fetch_array($ml);
            ?>
            <input type="hidden" class="form-control" name="nama_game" id="nama_game" value="<?= $d['nama_game']; ?>"
                readonly />
            <input type="hidden" step="any" class="form-control" name="tgl_transaksi" id="tgl_transaksi" required
                autocomplete="off" readonly />
            <script src="page/home/case.js"></script>
            <div class="item-list">
                <h2>2. Masukkan User ID</h2>
                <input type="number" class="form-control" name="uid" id="uid" min="1" max="999999999"
                    placeholder="Masukkan User Id" />
                <label class="notifError">Data tidak boleh kosong!</label>
                <p class="ppp">Untuk mengetahui User ID Anda, silakan klik menu profile dibagian kiri atas pada
                    menu utama game. User ID akan terlihat dibagian bawah Nama Karakter Game Anda. Silakan masukkan User
                    ID Anda
                    untuk menyelesaikan transaksi. Contoh : 12345678.</p>
            </div>
            <br>
            <div class="item-list">
                <h2>3. Detail</h2>
                <p style="margin-top: 20px">Silakan masukkan email kamu untuk mendapatkan tanda terima untuk pembelian
                    ini</p>
                <?php
                $id = $_SESSION['username'];
                //query ke tabel sesuai dengan ID yang ada di URL
                $nama = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
                $d = mysqli_fetch_array($nama);
                ?>
                <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Alamat E-mail"
                    style="margin-top: -5px" value="<?php echo $d['email']; ?>" />
                <label class="notifError2">Data tidak boleh kosong!</label>
                <input type="hidden" name="jumlah_item" id="jumlah">
                <input type="hidden" name="total_harga" id="harga">
                <p id="jumlah_item" style="margin-bottom: -3px; margin-top: 5px; color: crimson"></p>
                <p id="total_harga" style="margin-bottom: -3px; color: crimson"></p>
                <button type="submit" name="submit" class="btn btn-primary">Beli Sekarang</button>
            </div>
        </form>
        <br>
    </div>

</div>
<br>