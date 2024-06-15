<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location:index.php");
}
if (isset($_SESSION['alert'])) {
  echo $_SESSION['alert'];
  unset($_SESSION['alert']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="assets/img/tes10.jpeg" sizes="16x16" />
  <script src="bootstrap-4/js/jquery-3.3.1.slim.min.js"></script>
  <script src="bootstrap-4/js/popper.min.js"></script>
  <script src="bootstrap-4/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>


  <!-- <script>
    $(document).ready(function () {
      $('#myTable').DataTable({
        lengthMenu: [3, 5, 7], // Menampilkan opsi 5, 10, 25, 50 pada dropdown "Show entries"
        pageLength: 5 // Jumlah default data per halaman
      });
    });

  </script> -->
  <title>Web App</title>

  <!-- Midtrans -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-rkn1ZlRweBJV0QIv"></script>

</head>

<body class="mt-5">

  <?php
  include "menu.php";
  ?>

  <div class="container">
    <?php
    include "tengah.php";
    ?>
  </div> <!-- container -->

  <div class="mt-5"></div>

  <!-- Footer -->
  <footer>
    <!-- Copyright -->
    <div class="text-center p-3 fixed-bottom"
      style="background-color: #1B1535; color: white; text-shadow: -1px 1px 2px #000;">
      &copy;
      <?php echo date("Y"); ?> Topup Game
      <!-- <a class="text-reset fw-bold"><a href="https://github.com/MohAgusGunawan/">Moh. Agus Gunawan</a> -->
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->






</body>

<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
<script type="text/javascript">
  $(function () {
    $(document).on('click', '#delete', function (e) {
      e.preventDefault();
      var link = $(this).attr("href");

      Swal.fire({
        title: 'Apakah Kamu Yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Saya Yakin!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Lakukan permintaan AJAX untuk menghapus data
          $.ajax({
            url: link,
            method: 'GET',
            success: function (response) {
              // Cek respons dari server
              if (response === 'success') {
                Swal.fire({
                  icon: 'error',
                  title: 'Data Gagal dihapus',
                  showConfirmButton: false,
                  timer: 1500
                });
              } else {
                Swal.fire(
                  'Terhapus!',
                  'Data Anda telah dihapus.',
                  'success'
                ).then((result) => {
                  // Refresh halaman jika penghapusan berhasil
                  window.location.reload();
                });
              }
            },
            error: function () {
              Swal.fire({
                icon: 'error',
                title: 'Terjadi kesalahan',
                showConfirmButton: false,
                timer: 1500
              });
            }
          });
        }
      })
    });
  });
</script>


</html>