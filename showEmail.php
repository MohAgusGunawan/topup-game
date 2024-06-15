<?php
$koneksi = mysqli_connect("localhost", "root", "", "topup_game");

// Get the email parameter from the GET request
$email = $_GET['email'];

// Use prepared statements to prevent SQL injection
$query = mysqli_prepare($koneksi, "SELECT COUNT(*) AS count FROM user WHERE email = ?");
mysqli_stmt_bind_param($query, 's', $email);
mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);
$row = mysqli_fetch_assoc($result);

$response = array('exists' => $row['count'] > 0);

header('Content-Type: application/json');
echo json_encode($response);
?>