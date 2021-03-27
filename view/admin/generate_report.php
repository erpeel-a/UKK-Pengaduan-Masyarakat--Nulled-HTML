<?php
session_start();
require('../../function.php');
$conn = DBConnection();

  //cek sesi
  if(!isset($_SESSION['login'])){
    header('location:login.php');
    exit;
  }
  //cek level 
  if($_SESSION['level'] != 'admin'){
    header('location:login.php');
  }

  $pengaduan = FetchAllData("SELECT * FROM tanggapan INNER JOIN pengaduan ON tanggapan.id_pengaduan=pengaduan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas=tanggapan.id_petugas INNER JOIN masyarakat ON masyarakat.nik=pengaduan.nik");
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
			.btn-danger {
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
					<td><img src="<?= $site_url ?>/img/<?= $item['foto'] ;?>" width="100px" alt=""></td>
					<td><?= $item['tanggapan'] ;?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="index.php">kembali</a>
		<script>
			window.print();
		</script>
	</body>

</html>