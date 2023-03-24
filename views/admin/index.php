<?php 
require '../../model/db.php';
$data = mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_guru) AS jml_guru,
        					(SELECT COUNT(*) FROM tb_mapel) AS jml_mapel,
        					(SELECT COUNT(*) FROM tb_siswa) AS jml_siswa;");
$jml = mysqli_fetch_object($data);
$tgl = date('Y-m-d');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyExam | Dashboard</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
	<div class="container">
		<aside>
			<div class="top">
				<div class="logo">
					<img src="../../assets/img/me.jpg">
					<h2>MyExam</h2>
				</div>
				<div class="close" id="close-btn">
					<span class="material-symbols-sharp">close</span>
				</div>
			</div>

			<div class="sidebar">
				<a href="index.php" class="active">
					<span class="material-symbols-sharp">dashboard</span>
					<h3>Dashboard</h3>
				</a>
				<a href="jurusan.php" class="off">
					<span class="material-symbols-sharp">groups</span>
					<h3>Jurusan</h3>
				</a>
				<a href="kelas.php" class="off">
					<span class="material-symbols-sharp">meeting_room</span>
					<h3>Kelas</h3>
				</a>
				<a href="guru.php" class="off">
					<span class="material-symbols-sharp">supervisor_account</span>
					<h3>Guru</h3>
				</a>
				<a href="siswa.php" class="off">
					<span class="material-symbols-sharp">person</span>
					<h3>Siswa</h3>
				</a>
				<a href="mapel.php" class="off">
					<span class="material-symbols-sharp">menu_book</span>
					<h3>Mata Pelajaran</h3>
				</a>
				<a href="soal.php" class="off">
					<span class="material-symbols-sharp">sticky_note_2</span>
					<h3>Soal</h3>
				</a>
				<a href="detail-soal.php" class="off">
					<span class="material-symbols-sharp">sticky_note_2</span>
					<h3>Detail Soal</h3>
				</a>
				<a href="func/out.php">
					<span class="material-symbols-sharp">logout</span>
					<h3>Logout</h3>
				</a>
			</div>
		</aside>

		<main>
			<h1>Dashboard</h1>

			<div class="date">
				<input type="date" value="<?= $tgl ?>" readonly>
			</div>

			<div class="insights">
				<div class="sales">
					<span class="material-symbols-sharp">supervisor_account</span>
					<div class="middle">
						<div class="left">
							<h3>Total Guru</h3>
							<h1><?= $jml->jml_guru ?> Guru</h1>
						</div>

					</div>
					<small class="text-muted">Last 24 Hours</small>
				</div>

				<div class="expenses">
					<span class="material-symbols-sharp">person</span>
					<div class="middle">
						<div class="left">
							<h3>Total Siswa</h3>
							<h1><?= $jml->jml_siswa ?> Siswa</h1>
						</div>

					</div>
					<small class="text-muted">Last 24 Hours</small>
				</div>

				<div class="income">
					<span class="material-symbols-sharp">menu_book</span>
					<div class="middle">
						<div class="left">
							<h3>Total Mata Pelajaran</h3>
							<h1><?= $jml->jml_mapel ?> Mapel</h1>
						</div>

					</div>
					<small class="text-muted">Last 24 Hours</small>
				</div>
			</div>

			<div class="recent-orders">
					<h2>Status Siswa Terkini</h2>
					<table>
						<thead>
							<tr>
								<th>Nama Siswa</th>
								<th>Kelas</th>
								<th>Nilai</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Danang Harto</td>
								<td>XI RPL A</td>
								<td>A</td>
								<td class="warning">Selesai</td>
								<td class="primary">Details</td>
							</tr>
							<tr>
								<td>Toni Mario</td>
								<td>X TKJ B</td>
								<td>B</td>
								<td class="warning">Belum Selesai</td>
								<td class="primary">Details</td>
							</tr>
						</tbody>
					</table>
					<a href="#" class="primary">Show All</a>
				</div>
		</main>


		<div class="right">
			<div class="top">
				<button id="menu-btn">
					<span class="material-symbols-sharp">menu</span>
				</button>
				<div class="theme-toggler">
					<span class="material-symbols-sharp active">light_mode</span>
					<span class="material-symbols-sharp">dark_mode</span>
				</div>
				<div class="profile">
					<div class="info">
						<p>Hey, <b>Ryuga</b></p>
						<small class="text-muted">Admin</small>
					</div>
					<div class="profile-photo">
						<img src="../../assets/img/profile.png">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="../../assets/js/script.js"></script>
</body>
</html>