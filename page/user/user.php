<style>
	body {
		background: #eaeaea;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 15px;
	}

	::-webkit-scrollbar {
		height: 0;
		width: 0.5rem;
		position: absolute;
		/* display: none; */
	}

	::-webkit-scrollbar-track {
		background: #292e33;
	}

	::-webkit-scrollbar-thumb {
		background: #1abc9c;
		border-radius: 5rem;
	}

	/* Misalnya, untuk mengurangi ukuran teks dalam notifikasi */
	.swal2-popup {
		font-size: 14px;
	}

	/* Atau untuk mengurangi lebar dan tinggi dari notifikasi */
	.swal2-popup {
		width: 320px;
		height: 250px;
	}

	/* Misalnya, untuk mengurangi ukuran ikon dalam notifikasi */
	.swal2-icon {
		font-size: 12px;
	}

	@media only screen and (max-width: 636px) {

		/* Misalnya, untuk mengurangi ukuran teks dalam notifikasi */
		.swal2-popup {
			font-size: 10px;
		}

		/* Atau untuk mengurangi lebar dan tinggi dari notifikasi */
		.swal2-popup {
			width: 220px;
			height: 210px;
		}

		/* Misalnya, untuk mengurangi ukuran ikon dalam notifikasi */
		.swal2-icon {
			font-size: 10px;
		}

		#sip {
			padding-left: 20px;
		}
	}

	hr {
		border: 1px solid #ccc;
		margin: 10px 0;
	}
</style>

<head>
	<!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
	<script>
		$(document).ready(function () {
			$('#myTable').DataTable({
				lengthMenu: [3, 5, 7], // Menampilkan opsi 5, 10, 25, 50 pada dropdown "Show entries"
				pageLength: 5 // Jumlah default data per halaman
			});
		});

	</script>
</head>

<?php
include "koneksi.php";
$action = isset($_GET['submenu']) ? $_GET['submenu'] : '';
switch ($action) {
	default:
		?>
		<style>
			body {
				text-align: center;
			}
		</style>
		<h2 class="text-center" style="margin-top:60px; text-shadow: -1px 1px 2px white;">Data Akun User</h2>
		<hr />
		<div class="row">
			<div class="col-sm">

				<div class="table-responsive">
					<table class=" table table-hover" id="myTable" style="background-color: white;">
						<thead class="thead-dark">
							<tr>
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">Nama</th>
								<th style="text-align: center;">Email</th>
								<th style="text-align: center;">Level</th>
								<th style="text-align: center;" id="sip">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST['cari'])) {
								$kata = $_POST['kata'];
								$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username LIKE '%$kata%' OR email LIKE '%$kata%' ORDER BY id_user ASC");
								$totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user WHERE username LIKE '%$kata%'"));
							} else {
								$query = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id_user ASC");
								$totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
							}

							$no = 1;
							while ($d = mysqli_fetch_assoc($query)) {
								// Ini menghasilkan array associative
								?>
								<tr>
									<td>
										<?= $no; ?>
									</td>
									<td>
										<?= strtolower($d['username']); ?>
									</td>
									<td>
										<?= strtolower($d['email']); ?>
									</td>
									<td>
										<?= $d['level']; ?>
									</td>
									<td>

										<a class="btn btn-primary" name="submit" style="padding: 1px 5px; width: 25px; height: 25px"
											href="?menu=user&submenu=edit&id=<?= $d['id_user']; ?>"><ion-icon name="create"
												style="font-size: 13px;"></ion-icon></a>

										<a class="btn btn-danger" id="delete" style="padding: 1px 5px; width: 25px; height: 25px"
											href="?menu=user&submenu=hapus&id=<?= $d['id_user']; ?>"><ion-icon name="trash"
												style="font-size: 13px;"></ion-icon></a>
									</td>
								</tr>
								<?php
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div> <!-- end row -->
		<?php
		if (isset($_POST['submit'])) { //jika tombol submit di klik
			//ambil data dari form input
			$id = $_POST['id'];
			$level = $_POST['level'];
			$query = mysqli_query($koneksi, "UPDATE user SET level='$level' WHERE id_user='$id' ");
			$sukses = mysqli_affected_rows($koneksi);
			if ($sukses > 0) {
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
				echo "<script>
					Swal.fire({
						position: 'top',
						icon: 'success',
						title: 'Edit Level Berhasil',
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
						title: 'Edit Level Gagal',
						showConfirmButton: false,
						timer: 1500
					});
					
					setTimeout(function() {
						window.location.href = '?menu=user';
					}, 1500);
					</script>";
			}
		} ?>

		<?php
		break;
	case "edit":
		$id = $_GET['id'];
		$edit = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
		$ada = mysqli_num_rows($edit);
		if ($ada > 0) {
			$d = mysqli_fetch_array($edit);
		} else {
			echo "<h1>MAAF ID TIDAK DI KENAL</h1>";
			exit();
		}

		?>
		<style>
			/* Style untuk garis pemisah */
			hr {
				border: 1px solid #ccc;
				margin: 10px 0;
			}

			/* Style untuk form */
			.form-group {
				margin-bottom: 20px;
			}

			/* Style untuk label */
			label {
				font-weight: bold;
			}

			/* Style untuk input */
			.form-control {
				width: 100%;
				padding: 10px;
				border: 1px solid #ccc;
				border-radius: 4px;
			}

			/* Style untuk tombol Edit Data */
			.btn-primary {
				background-color: #007bff;
				color: #fff;
				border: none;
				padding: 10px 20px;
				border-radius: 4px;
				cursor: pointer;
			}

			/* Style untuk tombol Kembali */
			.btn-info {
				background-color: #17a2b8;
				color: #fff;
				border: none;
				padding: 10px 20px;
				border-radius: 4px;
				cursor: pointer;
			}

			/* Style untuk radio button */
			input[type="radio"] {
				margin-right: 5px;
			}

			/* Style untuk radio button yang dipilih */
			input[type="radio"]:checked+label {
				font-weight: bold;
				color: #007bff;
			}

			/* Style untuk kolom form yang readonly */
			.form-control[readonly] {
				background-color: #f8f9fa;
				cursor: not-allowed;
			}

			/* Style untuk kolom form yang readonly dengan warna teks */
			.form-control[readonly] {
				background-color: #f8f9fa;
				cursor: not-allowed;
				color: #000;
			}

			/* Style untuk container dari form-group */
			.form-group-container {
				display: flex;
				flex-direction: row;
				justify-content: space-between;
			}

			/* Style untuk label */
			.form-group label {
				flex: 1;
				text-align: right;
				padding-right: 10px;
				margin-bottom: 0;
			}

			/* Style untuk input */
			.form-group input {
				flex: 2;
				margin-bottom: 0;
			}

			.form-control {
				width: 350px;
			}
		</style>
		<h2 class="text-center" style="margin-top:60px;"> Edit Halaman User</h2>
		<hr />
		<div class="row">
			<div class="col-sm-4">
				<form method="POST">
					<input type="hidden" name="id" value="<?= $d['id_user']; ?>" />
					<div class="form-group">
						<label for="username">Nama</label><br />
						<input type="text" class="form-control" name="username" id="username" value="<?= $d['username']; ?>"
							required autocomplete="off" readonly />
					</div>
					<div class="form-group" style="display: none">
						<label for="password">Password</label><br />
						<input type="password" class="form-control" name="password" id="password" value="<?= $d['password']; ?>"
							readonly />
					</div>
					<div class="form-group">
						<label for="email">Email</label><br />
						<input type="email" class="form-control" name="email" id="email" value="<?= $d['email']; ?>" />
					</div>
					<div class="form-group">
						<label for="level">Level</label><br />
						<input type="radio" name="level" id="admin" value="admin" <?php if ($d['level'] === 'admin')
							echo 'checked'; ?> />
						<label for="admin">Admin</label><br />
						<input type="radio" name="level" id="user" value="user" <?php if ($d['level'] === 'user')
							echo 'checked'; ?> />
						<label for="user">User</label><br />
					</div>


					<button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
					<a href="?menu=user" class="btn btn-info">Kembali</a>
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

			// Check the length of the password
			if (strlen($password) > 25) {
				// Do not use MD5 for passwords longer than 25 characters
				$hashedPassword = $password;
			} else {
				// Use MD5 for passwords with 25 characters or fewer
				$hashedPassword = md5($password);
			}

			$level = $_POST['level'];
			$query = mysqli_query($koneksi, "UPDATE user SET 
			username='$nama', email='$email', password='$hashedPassword', level='$level'
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
		break;
	case "hapus":
		$query = mysqli_query($koneksi, "SELECT id_user FROM user WHERE id_user='$_GET[id]'");
		$cek = mysqli_num_rows($query);
		if ($cek > 0) {
			$hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$_GET[id]'");
			if ($hapus) {
				echo "success"; // Kirimkan respons success jika penghapusan berhasil
			} else {
				echo "error"; // Kirimkan respons error jika penghapusan gagal
			}
		} else {
			echo "not_found"; // Kirimkan respons not_found jika data pengguna tidak ditemukan
		}
		break;

}