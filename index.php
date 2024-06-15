<?php
include "koneksi.php";
ob_start();
session_start();
if (!empty($_SESSION['username'])) {

    if ($_SESSION['level'] === "admin") {
        header("location: admin.php?menu=home");
        exit();
    } else if ($_SESSION['level'] === "user") {
        header("location: admin.php?menu=home");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
    <title>Top Up Game Murah</title>
    <link rel="icon" type="image/png" href="assets/img/tes10.jpeg" sizes="16x16" />
    <link rel="stylesheet" href="assets/index.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="sweetalert2/animate.min.css">
</head>

<body>

    <header>
        <a href=" ">
            <div class="logo">
                <img src="assets/img/tes10.jpeg" alt="Logo">
            </div>
        </a>

        <nav class="navigation">
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <button onclick="window.location.href='#';" class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>

        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="eye-off" onclick="passLogin()" id="pass-icon-login"
                            style="cursor: pointer"></ion-icon></span>
                    <input type="password" id="password-login" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" id="rememberMe" style="cursor: pointer">Remember me</label>
                    <a href="#" onclick="showEmail()" id="forgotPassword">Forgot Password?</a>
                </div>
                <button type="submit" name='login' class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" id="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" name="email" id="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="eye-off" onclick="passRegister()" id="pass-icon-register"
                            style="cursor: pointer"></ion-icon></span>
                    <input type="password" id="password-register" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" style="cursor: pointer">I agree to the therms & conditions</label>
                </div>
                <button type="submit" name="register" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <div id="textContainer">
        <section id="about">
            <h2>Tentang Top Up Game</h2>
            <p>Kami adalah platform top up game yang menyediakan layanan untuk para pemain game dalam melakukan
                pembelian atau pengisian kredit game secara online. Dengan pengalaman kami yang telah terpercaya dan
                teruji, kami bertujuan untuk memberikan pengalaman top up game yang aman, cepat, dan nyaman bagi para
                pengguna kami.</p>
            <h3>Misi Kami</h3>
            <p>Kami berkomitmen untuk memberikan layanan top up game yang terbaik kepada para pemain game. Misi kami
                adalah:</p>
            <ul>
                <li>Menyediakan berbagai pilihan game populer untuk melakukan top up.</li>
                <li>Menjamin keamanan dan kerahasiaan data pengguna kami.</li>
                <li>Menyediakan metode pembayaran yang aman dan terpercaya.</li>
                <li>Memberikan pelayanan pelanggan yang responsif dan ramah.</li>
                <li>Memastikan proses top up yang cepat dan efisien.</li>
            </ul>
        </section>

        <section id="services">
            <h2>Layanan Top Up Game</h2>
            <p>Kami menyediakan berbagai layanan top up game untuk para pemain game yang ingin membeli atau mengisi
                ulang kredit game mereka. Dengan pengalaman dan keahlian kami, kami bertujuan untuk memberikan
                pengalaman top up game yang cepat, aman, dan nyaman bagi para pengguna kami.</p>
            <h3>Daftar Layanan</h3>
            <p>Berikut adalah beberapa layanan top up game yang kami tawarkan:</p>
            <h4>1. Top Up Saldo Game</h4>
            <p>Kami menyediakan layanan top up saldo game untuk berbagai platform game populer seperti Mobile Legends,
                PUBG Mobile, Free Fire, Call of Duty, dan Genshin Impact. Anda dapat membeli saldo game dengan mudah dan
                mengisi ulang kredit game Anda untuk mendapatkan item in-game, skin, atau keuntungan lainnya.</p>
            <h4>2. Layanan Pelanggan</h4>
            <p>Kami juga memberikan layanan pelanggan yang responsif dan siap membantu. Jika Anda memiliki pertanyaan,
                masalah, atau membutuhkan bantuan terkait layanan top up game kami, tim dukungan kami siap membantu Anda
                melalui email atau telepon yang tersedia di halaman Contact kami.</p>
        </section>

        <section id="contact">
            <h2>Hubungi Kami</h2>
            <p>Jika Anda memiliki pertanyaan, masalah, atau membutuhkan bantuan terkait layanan top up game kami, jangan
                ragu untuk menghubungi kami. Kami senang dapat membantu Anda. Silakan hubungi kami melalui salah satu
                metode berikut:</p>
            <h3>Informasi Kontak</h3>
            <ul>
                <li>Email: <a href="mailto:aguspamekasan464@gmail.com">aguspamekasan464@gmail.com</a></li>
                <li>WhatsApp: <a href="https://wa.me/+6281358750738"> +62 81358750738</a></li>
            </ul>
        </section>
    </div>


    <?php
    include "koneksi.php";
    // Login
    if (isset($_POST['login'])) { //jika tombol submit di klik
        $username = $_POST['username'];
        $pass = md5($_POST['password']);
        $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$pass' ");
        //utk mengetahui jumlah baris dari $login
        $ketemu = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);
        // Apabila username dan password ditemukan
        if ($ketemu > 0) {
            $_SESSION['username'] = $r['username'];
            $_SESSION['password'] = $r['password'];
            $_SESSION['level'] = $r['level'];

            $_SESSION['alert'] = "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            $_SESSION['alert'] .= "<script>
            document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
             });

            Toast.fire({
                icon: 'success',
                title: 'Login Berhasil: " . $_SESSION['username'] . "',
                showCloseButton: true
            });
        });
        </script>";
            header("location:admin.php?menu=home");
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              });
              
              Toast.fire({
                icon: 'error',
                title: 'Login Gagal: Username atau password salah',
                showCloseButton: true
              });
		</script>";
        }

    }

    // Register
    if (isset($_POST['register'])) { //jika tombol submit di klik
        //ambil data dari form input
        //mengabaikan tanda petik
        $nama = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = htmlspecialchars(md5($_POST['password']));
        $email = htmlspecialchars($_POST['email']); //mengabaikan tag html; 
        $query = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$password','$email','user')");
        $sukses = mysqli_affected_rows($koneksi);
        if ($sukses > 0) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
  
  Toast.fire({
    icon: 'success',
    title: 'Pendaftaran Berhasil',
    showCloseButton: true
  });
</script>";
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
  
  Toast.fire({
    icon: 'error',
    title: 'Pendaftaran Gagal',
    showCloseButton: true
  });
</script>";
        }
    }
    ?>



    <script src="assets/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
    <!-- <script src="bootstrap-4/js/popper.min.js"></script> -->
    <script src="bootstrap-4/js/bootstrap.min.js"></script>
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>