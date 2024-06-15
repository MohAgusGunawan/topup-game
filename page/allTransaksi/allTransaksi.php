<style>
	body {
		background: #eaeaea;
		font-family: Arial, Helvetica, sans-serif;
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
		<h2 class="text-center" style="margin-top:60px; text-shadow: -1px 1px 2px white;">History Transaksi</h2>
		<hr />
		<div class="row">
			<div class="col-sm">
				<h4 style="text-shadow: -1px 1px 2px white;">Data Transaksi</h4>

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
								<!-- <th style="padding-left: 15px">Delete</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST['cari'])) {
								// $kata = $_POST['kata'];
								// $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE username LIKE '%$kata%' OR email_user LIKE '%$kata%' OR nama_game LIKE '%$kata%' OR uid LIKE '%$kata%' OR jumlah_item LIKE '%$kata%' OR total_harga LIKE '%$kata%' OR tgl_transaksi LIKE '%$kata%' ORDER BY id_transaksi DESC");
								// $totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE username LIKE '%$kata%'"));
							} else {
								$user = $_SESSION['username'];
								$query = mysqli_query($koneksi, "SELECT u.username, t.email_user, g.nama_game, t.uid, t.server, t.jumlah_item, t.total_harga, t.tgl_transaksi, t.status FROM transaksi t INNER JOIN user u ON t.username = u.id_user INNER JOIN game g ON t.nama_game = g.id_game WHERE u.username = '$user' ORDER BY t.id_transaksi DESC;");
								// $totalData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE username = '$user'"));
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
									<!-- <td>
										<a style="color: #ff0000; vertical-align: middle;"
											href="?menu=transaksi&submenu=hapus&id=<?= $d['id_transaksi']; ?>"
											onClick="return confirm('Yakin mau di hapus?');"><ion-icon name="trash"
												style="font-size: 18px; vertical-align: middle;"></ion-icon>Delete</a>
									</td> -->
								</tr>
								<?php
								$no++;
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- <div class=" col-sm-4"> -->
			<!-- alerts 2-->
			<!-- <div class="alert alert-success" role="alert">
					<h4 class="alert-heading">Penjelasan!</h4>
					<p>Ini adalah History Transaksi, yang terdapat informasi data Transaksi.</p>
					<hr>
					<p class="mb-0">Kamu bisa menambahkan, mengedit, dan juga menghapus daftar Transaksi.</p>
				</div> -->
			<!-- </div> -->
		</div> <!-- end row -->

		<?php
		break;
	// case "hapus":
	// 	$query = mysqli_query($koneksi, "select id_transaksi from transaksi where id_transaksi='$_GET[id]'");
	// 	$cek = mysqli_num_rows($query);
	// 	if ($cek == 0) {
	// 		echo "<script>alert('Hapus Data Gagal, Data Tidak Ditemukan');
	//   window.location=('?menu=transaksi')</script>";
	// 	} else {
	// 		$hapus = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$_GET[id]'");
	// 		if ($hapus) {
	// 			echo "<script>
	//   window.location=('?menu=transaksi')</script>";
	// 		} else {
	// 			echo "<script>alert('Hapus Data Gagal');
	//   window.location=('?menu=transaksi')</script>";
	// 		}
	// 	}
	// 	break;
}