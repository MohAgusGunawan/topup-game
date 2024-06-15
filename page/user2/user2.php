<?php
include "koneksi.php";

//mengambil id yang dikirim melalui URL..
$id = $_SESSION['username'];
//query ke tabel sesuai dengan ID yang ada di URL
$edit = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$id'");
$d = mysqli_fetch_array($edit);
?>

<head>
	<link rel="stylesheet" href="page/user2/user.css">
</head>

<h2>Data Profil</h2>
<hr />
<div class="row">
	<div class="col-sm-4">
		<form method="POST">
			<input type="hidden" name="id" value="<?= $d['id_user']; ?>" />
			<div class="form-group">
				<label for="username">Nama</label>
				<input type="text" class="form-control" name="username" id="username"
					value="<?php echo $d['username']; ?>" required placeholder="Nama" autocomplete="off" readonly />
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email"
					value="<?php echo $d['email']; ?>" />
			</div>
			<label class="notifError">Data tidak boleh kosong</label>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Password"
					value="<?= $d['password']; ?>" />
			</div>
			<label class="notifError2">Data tidak boleh kosong</label>


			<button type="submit" name="submit" class="btn btn-success">Edit Data</button>
		</form>
	</div>
</div> <!-- end row -->
<?php
if (isset($_POST['submit'])) { //jika tombol submit di klik
	//ambil data dari form input
	$id = $_POST['id'];
	$nama = mysqli_real_escape_string($koneksi, $_POST['username']); //mengabaikan tanda petik
	$email = htmlspecialchars($_POST['email']); //mengabaikan tag html;
	$password = $_POST['password'];
	if ($email == null && $password == null) {
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
				.notifError {
					display: block;
				}
			</style>
		<?php
	} else if ($password == null) {
		?>
				<style>
					.notifError2 {
						display: block;
					}
				</style>
		<?php
	} else {
		// Check the length of the password
		if (strlen($password) > 25) {
			// Do not use MD5 for passwords longer than 25 characters
			$hashedPassword = $password;
		} else {
			// Use MD5 for passwords with 25 characters or fewer
			$hashedPassword = md5($password);
		}

		$saldo = $_POST['saldo'];
		$query = mysqli_query($koneksi, "UPDATE user SET 
		username='$nama', email='$email', password='$hashedPassword', saldo='$saldo'
		WHERE id_user='$id' ");
		$sukses = mysqli_affected_rows($koneksi);
		if ($sukses > 0) {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
			echo "<script>
			Swal.fire({
				position: 'top',
				icon: 'success',
				title: 'Data Berhasil di Ubah',
				showConfirmButton: false,
				timer: 1500
			});
			
			setTimeout(function() {
				window.location.href = '?menu=user';
			}, 1500);
			</script>";
		} else {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
			echo "<script>
			Swal.fire({
				position: 'top',
				icon: 'error',
				title: 'Data Gagal di Ubah',
				showConfirmButton: false,
				timer: 1500
			});
			
			setTimeout(function() {
				window.location.href = '?menu=user';
			}, 1500);
			</script>";
		}
	}
}