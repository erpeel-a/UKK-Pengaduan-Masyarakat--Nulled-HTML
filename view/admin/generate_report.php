<?php
session_start(); // mulai session
require('../../function.php'); // menyisipkan file funtion.php agar bisa digunakan fungsi2 yang ada di dalamnya
$conn = DBConnection(); // panggil funsi DBConnection dan masukkan ke dalam variable  $conn
isLogin();// panggil fungsi isLogin yang ada di file functions.php
isRoleAdmin(); // panggil fungsi isRoleAdmin yang digunakan untuk mengecek petugas yang rolenya admin
// tangkap data tanggapan dengan fungsi FetchAllData yang sudah didefinisikan di function.php untuk mengambil data yang dikirimkan sebagai parameter dan masukkan dalam vaiable $laporan
$laporan = FetchAllData("SELECT *  FROM pengaduan P1  INNER JOIN masyarakat M1 ON P1.nik=M1.nik WHERE NOT P1.status='0'");
// var_dump($laporan);
// echo json_encode($laporan)
?>
<?php require('../layouts/header.php')  ?>
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
					<th>NIK Pelapor</th>
					<th>Nama Pelapor</th>
					<th>No Telp</th>
					<th>Isi Pengaduan</th>
					<th>tanggal pengaduan</th>
					<th>foto</th>
					<th>status</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1 ?>
				<?php foreach($laporan as $item){ ?>
				<?php foreach($laporan as $data) : 
      $status = $data['status'];
      if($status == '0'){ // jika status 0maka
        $status = 'terkirim'; // tampilakan "terkirim"
      }else if($status == 'proses'){ // jika status proses
        $status = 'diproses';// tampilakan "diproses"
      }else{
        $status = 'selesai'; // tampilkan selesai
      }
    ?>
				<tr>
					<td><?= $i++;?></td>
					<td><?= $data['nik'];?></td>
					<td><?= $data['nama'];?></td>
					<td><?= $data['telp'];?></td>
					<td><?= $data['isi_laporan'];?></td>
					<td><?= $data['tgl_pengaduan'];?></td>
					<td><img src="<?= site_url ?>/img/<?= $data['foto'] ;?>" width="200px" alt=""></td>
					<td><?= $data['status'];?></td>
				</tr>
				<?php endforeach ;?>
				<?php } ?>
			</tbody>
		</table>
		<a href="index.php">kembali</a>
		<script>
			window.print();
		</script>
	</body>

</html>