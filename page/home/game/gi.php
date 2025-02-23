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
            <img src="assets/img/bgGI.png" alt="..." id="bg">
        </div>
        <div class="teks">
            <h2 class="text-start" style="margin-top:10px">Genshin Impact</h2>
            <p style="color: red">Masukkan data Transaksi dengan benar, pastikan UID Benar Supaya tidak terjadi hal
                yang tidak di inginkan. Kami tidak bertanggung jawab atas kesalahan user.</p>
            <p>Unduh dan mainkan Genshin Impact sekarang!</p>
            <a href="hhttps://apps.apple.com/us/app/genshin-impact/id1517783697"><img src="assets/img/app.png"
                    alt=""></a>
            <a href="https://play.google.com/store/apps/details?id=com.miHoYo.GenshinImpact&hl=en&gl=US"><img
                    src="assets/img/play.png" alt=""></a>
        </div>
    </div>
    <div class="item">
        <div class="item-list">
            <h2>1. Pilih Item</h2>
            <label class="notifError3">Pilih item terlebih dahulu!</label>
            <div class="item-item">
                <div class="list-item" onclick="changeColor(this, '60 Genesis Crystals', '14865')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>60 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 14.865</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '300 Genesis Crystals', '72973')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>300 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 72.973</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '980 Genesis Crystals', '229770')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>980 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 229770</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '1980 Genesis Crystals', '440541')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>1980 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 440.541</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '3280 Genesis Crystals', '734234')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>3280 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 734.234</strong></p>
                </div>
                <div class="list-item" onclick="changeColor(this, '6480 Genesis Crystals', '1467568')">
                    <img src="assets/img/diamond.png" alt="">
                    <p style="margin-top: -10px"><strong>6480 Genesis Crystals</strong></p>
                    <p style="color: red; margin-top: -10px"><strong>Rp. 1.467.568</strong></p>
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
            $ml = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE id_game=1");
            $d = mysqli_fetch_array($ml);
            ?>
            <input type="hidden" class="form-control" name="nama_game" id="nama_game" value="<?= $d['nama_game']; ?>"
                readonly />
            <input type="hidden" step="any" class="form-control" name="tgl_transaksi" id="tgl_transaksi" required
                autocomplete="off" readonly />
            <script src="page/home/case.js"></script>
            <div class="item-list">
                <h2>2. Masukkan User ID</h2>
                <div class="input-container">
                    <input type="number" class="form-control" name="uid" id="uid" min="1" max="999999999"
                        placeholder="Masukkan User Id" />
                    <select id="server" name="server" style="height: 36px; margin-top: 25px">
                        <option value="America">America</option>
                        <option value="Europe">Europe</option>
                        <option value="Asia">Asia</option>
                    </select>
                </div>
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