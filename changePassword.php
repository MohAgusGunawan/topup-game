<?php
$koneksi = mysqli_connect("localhost", "root", "", "topup_game");

$email = $_GET['email'];
$password = $_GET['password'];

// Hash the password using md5 (not recommended, consider using bcrypt or Argon2)
$hashedPassword = md5($password);

// Update the password in the database
$query = mysqli_prepare($koneksi, "UPDATE user SET password = ? WHERE email = ?");
mysqli_stmt_bind_param($query, 'ss', $hashedPassword, $email);
$result = mysqli_stmt_execute($query);

$response = array('success' => $result);

header('Content-Type: application/json');
echo json_encode($response);
?>