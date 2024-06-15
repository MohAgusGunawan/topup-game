<?php
session_start();
include "../../koneksi.php";

$nama = $_SESSION['nama'];
$email = $_SESSION['email'];
$game = $_SESSION['game'];
$uid = $_SESSION['uid'];
$item = $_SESSION['item'];
$total = $_SESSION['total'];
$tanggal = $_SESSION['tanggal'];

if ($_SESSION['server'] != "") {
    $server = "'" . mysqli_real_escape_string($koneksi, $_SESSION['server']) . "'";
} else {
    $server = "NULL";
}

$user_query = mysqli_query($koneksi, "SELECT id_user FROM user WHERE username = '$nama'");
$user_row = mysqli_fetch_assoc($user_query);
$user = strval($user_row['id_user']);

$nama_game_query = mysqli_query($koneksi, "SELECT id_game FROM game WHERE nama_game = '$game'");
$nama_game_row = mysqli_fetch_assoc($nama_game_query);
$nama_game = strval($nama_game_row['id_game']);

$result = mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL,'$user','$email','$nama_game','$uid', $server,'$item','$total','$tanggal','proses')");

if ($result) {
    $response = ["status" => "success", "message" => "Transaction successful"];
} else {
    $response = ["status" => "error", "message" => "Transaction failed", "error" => mysqli_error($koneksi)];
}

echo json_encode($response);