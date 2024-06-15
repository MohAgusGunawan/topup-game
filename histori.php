<?php
include "koneksi.php";
$sql = "SELECT u.username, t.id_transaksi, t.email_user, g.nama_game, t.uid, t.server, t.jumlah_item, t.total_harga, t.tgl_transaksi, t.status FROM transaksi t INNER JOIN user u ON t.username = u.id_user INNER JOIN game g ON t.nama_game = g.id_game ORDER BY t.id_transaksi DESC";
$query = mysqli_query($koneksi, $sql);
?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    h2 {
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }

    th {
        background-color: #dedede;
        color: #333333;
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>

<h2>History Transaksi Topup Game</h2>

<table border="1">
    <thead>
        <tr>
            <th style="width: 5%">No.</th>
            <th style="width: 11%">Username</th>
            <th style="width: 17%">Email</th>
            <th style="width: 13%">Nama Game</th>
            <th style="width: 10%">User ID</th>
            <th style="width: 16%">Item</th>
            <th style="width: 10%">Total Harga</th>
            <th style="width: 10%">Tanggal Transaksi</th>
            <th style="width: 8%">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $i = 1;
        while ($r = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td style="width: 5%"><?php echo $i++ ?></td>
                <td style="width: 11%"><?php echo $r['username'] ?></td>
                <td style="width: 17%"><?php echo $r['email_user'] ?></td>
                <td style="width: 13%"><?php echo $r['nama_game'] ?></td>
                <td style="width: 10%"><?php echo $r['uid'] ?></td>
                <td style="width: 16%"><?php echo $r['jumlah_item'] ?></td>
                <td style="width: 10%"><?php echo $r['total_harga'] ?></td>
                <td style="width: 10%"><?php echo $r['tgl_transaksi'] ?></td>
                <td style="width: 8%"><?php echo $r['status'] ?></td>
            </tr>
            <?php
        }

        ?>
    </tbody>
</table>