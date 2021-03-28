<?php
session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
$conn = DBConnection(); // panggil funsi DBConnection dan masukkan ke dalam variable $conn

if(!isset($_SESSION['login'])){  // check jika user belum login
	header('location:../../index.php'); // alihkan ke halaman index page
	exit;
}
if($_SESSION['level'] != 'admin'){ // jika role petugas bukan admin 
	header('location:index.php'); // alihkan ke index.php (yang ada di folder admin)
}
// tanggkap data  pengaduan , masyarakat , petugas serta tanggapannya dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam variable $pengaduan
$pengaduan = FetchAllData("SELECT * FROM tanggapan T1 INNER JOIN pengaduan P1 ON T1.id_pengaduan=P1.id_pengaduan INNER JOIN petugas P2 ON P2.id_petugas=T1.id_petugas INNER JOIN masyarakat M1 ON P1.nik=M1.nik");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cetak Laporan</title>
</head>

<body>
	<style>
		@media print {
			a {
				display: none;
			}
		}
	</style>

	<body>
		<h3>
			Laporan Pengaduan Masyarakat
		</h3>
		<table border="2">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama masyarakat</th>
					<th>Nama Petugas</th>
					<th>Tanggal Pengaduan</th>
					<th>Tanggal Tanggapan</th>
					<th>Isi Pengaduan</th>
					<th>Foto</th>
					<th>Tanggapan</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php foreach($pengaduan as $item){ ?>
				<tr>
					<td><?= $i++;?></td>
					<td><?= $item['nama'] ; ?></td>
					<td><?= $item['nama_petugas'] ; ?></td>
					<td><?= $item['tgl_pengaduan'] ?></td>
					<td><?= $item['tgl_tanggapan'] ?></td>
					<td><?= $item['isi_laporan'] ;?></td>
					<td><img src="<?= site_url ?>/img/<?= $item['foto'] ;?>" width="100px" alt=""></td>
					<td><?= $item['tanggapan'] ;?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="index.php">kembali</a>
		<script>
		// memaggil fungsi print javascript untuk mencetak dalam bentuk dokumen
			window.print();
		</script>
	</body>

</html>
