<?php
ob_start();
?>
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

		document.getElementById('bt-download').addEventListener('click', function () {
			var selectedDate = document.getElementById('bt-date').value;
			window.location.href = '/generate-excel-selesai?date=' + encodeURIComponent(selectedDate);
		});

	</script>
</head>

<?php
include "koneksi.php";
$action = isset($_GET['submenu']) ? $_GET['submenu'] : '';
switch ($action) {
	default:
		?>
		<h2 class="text-center" style="margin-top:60px; text-shadow: -1px 1px 2px white;">Histori Transaksi</h2>
		<hr />
		<div class="row">
			<div class="col-sm">
				<div class="float-right mb-2">
					<form action="" method="POST">
						<input type="submit" name="pdf" value="Cetak" class="btn-success">
					</form>
					<?php
					if (isset($_POST['pdf'])) {
						header("Location: pdf.php");
					}
					?>
				</div>

				<div class="table-responsive">
					<table class=" table table-hover" id="myTable" style="background-color: white;">
						<thead class="thead-dark">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Game</th>
								<th>UID</th>
								<th>Jumlah Item</th>
								<th>Total Harga</th>
								<th>Tanggal Transaksi</th>
								<th>Status</th>
								<th id="sip">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST['cari'])) {
								// $kata = $_POST['kata'];
								// $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE username LIKE '%$kata%' OR email_user LIKE '%$kata%' OR nama_game LIKE '%$kata%' OR uid LIKE '%$kata%' OR jumlah_item LIKE '%$kata%' OR total_harga LIKE '%$kata%' OR tgl_transaksi LIKE '%$kata%' ORDER BY id_transaksi DESC");
								// $totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE username LIKE '%$kata%'"));
							} else {
								$query = mysqli_query($koneksi, "SELECT u.username, t.id_transaksi, t.email_user, g.nama_game, t.uid, t.server, t.jumlah_item, t.total_harga, t.tgl_transaksi, t.status FROM transaksi t INNER JOIN user u ON t.username = u.id_user INNER JOIN game g ON t.nama_game = g.id_game ORDER BY t.id_transaksi DESC;");
								// $totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi"));
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
										<?= strtolower($d['email_user']); ?>
									</td>
									<td>
										<?= strtolower($d['nama_game']); ?>
									</td>
									<td>
										<?= ($d['uid']) . " " . $d['server']; ?>
									</td>
									<td>
										<?= strtolower($d['jumlah_item']); ?>
									</td>
									<td>
										<?= $d['total_harga']; ?>
									</td>
									<td>
										<?= $d['tgl_transaksi']; ?>
									</td>
									<td>
										<?= $d['status']; ?>
									</td>
									<td>

										<a class="btn btn-primary" name="submit" style="padding: 1px 5px; width: 25px; height: 25px"
											href="?menu=transaksi&submenu=edit&id=<?= $d['id_transaksi']; ?>"><ion-icon
												name="create" style="font-size: 13px;"></ion-icon></a>

										<a class="btn btn-danger" id="delete" style="padding: 1px 5px; width: 25px; height: 25px"
											href="?menu=transaksi&submenu=hapus&id=<?= $d['id_transaksi']; ?>"><ion-icon
												name="trash" style="font-size: 13px;"></ion-icon></a>
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
			$status = $_POST['status'];
			$query = mysqli_query($koneksi, "UPDATE transaksi SET status='$status' WHERE id_transaksi='$id' ");
			$sukses = mysqli_affected_rows($koneksi);
			if ($sukses > 0) {
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
				echo "<script>
					Swal.fire({
						position: 'top',
						icon: 'success',
						title: 'Edit Status Berhasil',
						showConfirmButton: false,
						timer: 1500
					});
					
					setTimeout(function() {
						window.location.href = '?menu=transaksi';
					}, 1500);
					</script>";
			} else {
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
				echo "<script>
					Swal.fire({
						position: 'top',
						icon: 'error',
						title: 'Edit Status Gagal',
						showConfirmButton: false,
						timer: 1500
					});
					
					setTimeout(function() {
						window.location.href = '?menu=transaksi';
					}, 1500);
					</script>";
			}
		} ?>
		<?php
		break;
	case "edit":
		$id = $_GET['id'];
		$edit = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
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
				width: 210px;
			}
		</style>
		<h2 class="text-center" style="margin-top:60px;"> Edit History Transaksi</h2>
		<hr />
		<div class="row">
			<div class="col-sm-4">
				<form method="POST">
					<input type="hidden" name="id" value="<?= $d['id_transaksi']; ?>" />
					<div class="form-group-container row">
						<div class="form-group col-sm-5">
							<label for="username">Nama</label><br />
							<input type="text" class="form-control" name="username" id="username" value="<?= $d['username']; ?>"
								required autocomplete="off" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="email_user">Email</label><br />
							<input type="email" class="form-control" name="email_user" id="email_user"
								value="<?= $d['email_user']; ?>" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="nama_game">Game</label><br />
							<input type="text" class="form-control" name="nama_game" id="nama_game"
								value="<?= $d['nama_game']; ?>" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="uid">UID</label><br />
							<input type="number" class="form-control" name="uid" id="uid" min="1" max="999999999"
								value="<?= $d['uid']; ?>" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="jumlah_item">Jumlah Item</label><br />
							<input type="text" class="form-control" name="jumlah_item" id="jumlah_item"
								value="<?= $d['jumlah_item']; ?>" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="total_harga">Harga</label><br />
							<input type="decimal" class="form-control" name="total_harga" id="total_harga" min="1"
								max="10000000" value="<?= $d['total_harga']; ?>" readonly />
						</div>
						<div class="form-group col-sm-6">
							<label for="tgl_transaksi">Tanggal Transaksi</label><br />
							<input type="datetime-local" step="any" class="form-control" name="tgl_transaksi" id="tgl_transaksi"
								value="<?= $d['tgl_transaksi']; ?>" readonly />
						</div>
						<div class="form-group col-sm-5">
							<label for="status">Status</label><br />
							<input type="radio" name="status" id="proses" value="proses" <?php if ($d['status'] === 'proses')
								echo 'checked'; ?> />
							<label for="proses">Proses</label><br />
							<input type="radio" name="status" id="berhasil" value="berhasil" <?php if ($d['status'] === 'berhasil')
								echo 'checked'; ?> />
							<label for="berhasil">Berhasil</label><br />
							<input type="radio" name="status" id="gagal" value="gagal" <?php if ($d['status'] === 'gagal')
								echo 'checked'; ?> />
							<label for="gagal">Gagal</label><br />
						</div>
					</div>


					<button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
					<a href="?menu=transaksi" class="btn btn-info">Kembali</a>
				</form>
				<br>
			</div>
		</div> <!-- end row -->
		<?php
		if (isset($_POST['submit'])) { //jika tombol submit di klik
			//ambil data dari form input
			$id = $_POST['id'];
			$nama = mysqli_real_escape_string($koneksi, $_POST['username']); //mengabaikan tanda petik
			$email = htmlspecialchars($_POST['email_user']); //mengabaikan tag html;
			$game = $_POST['nama_game'];
			$uid = $_POST['uid'];
			$jumlah = $_POST['jumlah_item'];
			$harga = $_POST['total_harga'];
			$tanggal = $_POST['tgl_transaksi'];
			$status = $_POST['status'];
			$query = mysqli_query($koneksi, "UPDATE transaksi SET 
				username='$nama', email_user='$email', nama_game='$game', uid='$uid', jumlah_item='$jumlah', total_harga='$harga', tgl_transaksi='$tanggal' ,status='$status'
				WHERE id_transaksi='$id' ");
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
						window.location.href = '?menu=transaksi';
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
						window.location.href = '?menu=transaksi';
					  }, 1500);
					</script>";
			}
		}
		break;
	case "hapus":
		$query = mysqli_query($koneksi, "SELECT id_transaksi FROM transaksi WHERE id_transaksi='$_GET[id]'");
		$cek = mysqli_num_rows($query);
		if ($cek > 0) {
			$hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
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
ob_end_flush();