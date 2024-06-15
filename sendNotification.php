<?php
// sendNotification.php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Ambil parameter email dan message dari URL
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $message = isset($_GET['message']) ? $_GET['message'] : 'Default Message';

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Ganti bagian ini dengan logika pengiriman email sesuai dengan kebutuhan Anda
        $to = $email;
        $subject = 'Change Password';
        $headers = 'From: aguspamekasan464@gmail.com' . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $body = "Hello,\n\n$message";

        // Gunakan fungsi mail() untuk mengirim email
        if (mail($to, $subject, $body, $headers)) {
            echo json_encode(['success' => true, 'message' => 'Email sent successfully']);
        } else {
            $lastError = error_get_last();
            echo json_encode(['success' => false, 'message' => 'Failed to send email', 'error' => $lastError]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid or missing email parameter']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>