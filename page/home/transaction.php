<?php
function processTransaction()
{
    include "koneksi.php";
    if (isset($_POST['submit'])) { //jika tombol submit di klik
        //ambil data dari form input
        //mengabaikan tanda petik
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
        $email = htmlspecialchars($_POST['email_user']); //mengabaikan tag html;
        $game = htmlspecialchars($_POST['nama_game']); //mengabaikan tag html; 
        $uid = htmlspecialchars($_POST['uid']); //mengabaikan tag html;
        $item = htmlspecialchars($_POST['jumlah_item']);
        $totalHarga = htmlspecialchars($_POST['total_harga']);
        $tanggal = $_POST['tgl_transaksi'];
        $user = $_SESSION['username'];
        $harga = $_POST['total_harga'];

        $_SESSION['nama'] = $_POST['nama_user'];
        $_SESSION['game'] = $_POST['nama_game'];
        $_SESSION['email'] = $_POST['email_user'];
        $_SESSION['uid'] = $_POST['uid'];
        $_SESSION['server'] = $_POST['server'];
        $_SESSION['item'] = $_POST['jumlah_item'];
        $_SESSION['total'] = $_POST['total_harga'];
        $_SESSION['tanggal'] = $_POST['tgl_transaksi'];

        if ($item == null && $totalHarga == null) {
            ?>
            <style>
                .notifError3 {
                    display: block;
                }
            </style>
            <?php
        } else if ($email == null && $uid == null) {
            ?>
                <style>
                    .notifError {
                        display: block;
                    }

                    .notifError2 {
                        display: block;
                    }
                </style>
            <?php
        } else if ($email == null) {
            ?>
                    <style>
                        .notifError2 {
                            display: block;
                        }
                    </style>
            <?php
        } else if ($uid == null) {
            ?>
                        <style>
                            .notifError {
                                display: block;
                            }
                        </style>
            <?php
        } else {
            try {
                echo "<script>
                    async function placeOrder() {
                        try {
                            const response = await fetch('page/home/placeOrder.php', {
                                method: 'POST',
                                body: JSON.stringify({
                                    nama_user: '$nama',
                                    email_user: '$email',
                                    nama_game: '$game',
                                    uid: '$uid',
                                    jumlah_item: '$item',
                                    total_harga: '$totalHarga',
                                }),
                                headers: {
                                    'Content-type': 'application/json; charset=UTF-8'
                                }
                            });
                            
                            // const data = await response.json();
                            const token = await response.text();
                          
                            // console.log(token);
                            // window.snap.pay(token);
                            // window.history.back();
                            window.snap.pay(token, {
                                onSuccess: function(result){
                                    $.ajax({
                                        url: 'page/home/processTransaction.php',
                                        method: 'POST',
                                        data: {
                                            result: result 
                                        },
                                        success: function(response) {
                                        console.log(response);
                                            try {
                                                var responseObject = JSON.parse(response);
                                                if (responseObject.status === 'success') {
                                                    Swal.fire({
                                                        title: 'Sukses 👍',
                                                        text: 'Transaksi Berhasil!',
                                                        icon: 'success'
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        title: 'Gagal 😢',
                                                        text: 'Transaksi Gagal!',
                                                        icon: 'error'
                                                    });
                                                }
                                            } catch (e) {
                                                Swal.fire({
                                                    title: 'Error 😢',
                                                    text: 'Terjadi kesalahan dalam memproses respons dari server!',
                                                    icon: 'error'
                                                });
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error 😢',
                                                text: 'Terjadi kesalahan pada server!',
                                                icon: 'error'
                                            });
                                        }
                                    });
                                },
                                onPending: function(result){
                                    Swal.fire({
                                        title: 'Menunggu Pembayaran ⏳',
                                        text: 'Transaksi sedang diproses!',
                                        icon: 'info'
                                    });
                                },
                                onError: function(result){
                                    Swal.fire({
                                        title: 'Gagal 😢',
                                        text: 'Transaksi Gagal!',
                                        icon: 'error'
                                    });
                                },
                                onClose: function(){
                                    Swal.fire({
                                        title: 'Konfirmasi 🤔',
                                        text: 'Apakah Anda ingin membatalkan transaksi?',
                                        icon: 'question'
                                    });
                                }
                            });
                        } catch (error) {
                            console.error('Fetch error:', error);
                        }
                    }

                    document.addEventListener('DOMContentLoaded', (event) => {
                        placeOrder();
                    });
                </script>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}