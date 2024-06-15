<div class="jumbotron" style="margin-top: 90px;">
    <h1 class="display-4">Selamat Datang!</h1>
    <h1 class="h4"> Halo,
        <?php echo $_SESSION['username']; ?>
    </h1>
    <p class="lead">Halaman ini adalah Halaman Home Website Topup Game</p>
    <hr class="my-4">

    <?php
    echo "<p>Pada Sesi Ini, anda menggunakan Akun Admin</p>";
    ?>
    <a class="btn btn-danger btn-md" href="logout.php" role="button"> Ganti Akun </a>
</div>