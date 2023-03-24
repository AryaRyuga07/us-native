<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyExam | Mapel</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="../../assets/css/style.css">
	<link rel="stylesheet" href="../../assets/css/card.css">
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
				<a href="index.php" class="off">
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
				<a href="mapel.php" class="active">
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
			<h1>Mata Pelajaran</h1>

			<div class="recent-orders">
					<h2>Daftar Mata Pelajaran</h2>
					<table>
						<thead>
							<tr>
								<th>ID Mapel</th>
								<th>Nama Mata Pelajaran</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								require '../../model/db.php'; 
								$no = 1;
								$mapel = mysqli_query($conn, "SELECT * FROM tb_mapel ORDER BY id_mapel DESC");
								if (mysqli_num_rows($mapel) > 0) {
								while ($m = mysqli_fetch_object($mapel)) {
							?>
							<tr>
								<td>M<?= $no++ ?></td>
								<td><?= $m->nama_mapel ?></td>
								<td>
									<a href="mapel.php?id=<?= $m->id_mapel ?>#edit" class="primary">Edit</a>
									<div class="overlay" id="edit">
										<a href="mapel.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Edit Siswa</h1>
													<div class="form">
														<form action="func/ubah-mapel.php" method="post" class="input-form">
															<?php 
																$id = $_GET['id'];
																$mp_sl = mysqli_query($conn, "SELECT * FROM tb_mapel WHERE id_mapel = '$id'");
																$sw = mysqli_fetch_object($mp_sl);															 
															?>
															<input type="hidden" name="id" value="<?= $m->id_mapel ?>">
															<input type="text" name="mapel" placeholder="Nama Mapel" autocomplete="off" value="<?= $m->nama_mapel ?>">
															<button name="edit">Save</button>
														</form>
														<form action="mapel.php" method="post" class="cancel-form">
															<button>Cancel</button>
														</form>
													</div>
												</div>
											</div>
											<small class="text-muted"></small>
										</div>
									</div>
								</td>
								<td>
								<a href="mapel.php?id=<?= $m->id_mapel ?>#del" class="danger">
									Delete
								</a>
									<div class="overlay" id="del">
										<a href="mapel.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h2>Apakah anda ingin menghapus data ini?</h2>
													<div class="form">
														<form action="func/hapus-mapel.php" method="post" class="input-form">
															<input type="hidden" name="id" value="<?= $m->id_mapel ?>">
															<button name="del">Delete</button>
														</form>
														<form action="mapel.php" method="post" class="cancel-form">
															<button>Cancel</button>
														</form>
													</div>
												</div>
											</div>
											<small class="text-muted"></small>
										</div>
									</div>
							</td>
								<td>
									<a href="#details" class="primary">Details</a>
									<div class="overlay" id="details">
										<a href="mapel.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Detail Jurusan</h1>
												</div>
											</div>
											<small class="text-muted"></small>
										</div>
									</div>
								</td>
							</tr>
							<?php } } else {?>
								<tr>
									<td colspan="6">Tidak Ada Data</td>
								</tr>
							<?php } ?>	
						</tbody>
					</table>
					<a href="#tambah" class="primary">+ Tambah Mata Pelajaran</a>
					<div class="overlay" id="tambah">
						<a href="mapel.php" class="close"><span class="material-symbols-sharp">close</span></a>
						<div class="add-card">
							<div class="middle">
								<div class="left">
									<h1>Tambah Mapel</h1>
									<div class="form">
									<form action="func/tambah-mapel.php" method="post" class="input-form">
										<input type="text" name="mapel" placeholder="Nama Mapel" autocomplete="off">
										<button name="save">Save</button>
									</form>
									<form action="siswa.php" method="post" class="cancel-form">
										<button>Cancel</button>
									</form>
									</div>
								</div>

							</div>
							<small class="text-muted"></small>
						</div>
					</div>
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