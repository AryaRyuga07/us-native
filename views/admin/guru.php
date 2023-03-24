<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyExam | Guru</title>
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
				<a href="guru.php" class="active">
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
			<h1>Guru</h1>

			<div class="recent-orders">
					<h2>Daftar Guru</h2>
					<table>
						<thead>
							<tr>
								<th>ID Guru</th>
								<th>Nama Guru</th>
								<th>Mata Pelajaran</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								require '../../model/db.php'; 
								$no = 1;
								$guru = mysqli_query($conn, "SELECT * FROM tb_guru ORDER BY id_guru DESC");
								if (mysqli_num_rows($guru) > 0) {
								while ($g = mysqli_fetch_object($guru)) {
							?>
							<tr>
								<td>G<?= $no++ ?></td>
								<td><?= $g->nama_guru ?></td>
								<td><?= $g->id_mapel ?></td>
								<td>
									<a href="guru.php?id=<?= $g->id_guru ?>#edit" class="primary">Edit</a>
									<div class="overlay" id="edit">
										<a href="guru.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Edit Guru</h1>
													<div class="form">
														<form action="func/ubah-guru.php" method="post" class="input-form">
															<?php 
																$id = $_GET['id'];
																$g_sl = mysqli_query($conn, "SELECT * FROM tb_guru WHERE id_guru = '$id'");
																$gs = mysqli_fetch_object($g_sl);															 
															?>
															<input type="hidden" name="id" value="<?= $gs->id_guru ?>">
															<input type="text" name="nama" placeholder="Nama Guru" autocomplete="off" value="<?= $gs->nama_guru ?>">
															<select name="mapel" required>
																<option value="">--pilih mapel--</option>
																	<?php 
																		$mapel = mysqli_query($conn, "SELECT * FROM tb_mapel ORDER BY id_mapel DESC");
																		while ($m = mysqli_fetch_object($mapel)) {
						 											?>
																		<option value="<?= $m->id_mapel ?>" <?= ($gs->id_mapel == $m->id_mapel)? 'selected':''; ?>><?= $m->nama_mapel ?></option>
																	<?php } ?>
															</select>
															<button name="edit">Save</button>
														</form>
														<form action="guru.php" method="post" class="cancel-form">
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
								<a href="guru.php?id=<?= $g->id_guru ?>#del" class="danger">
									Delete
								</a>
									<div class="overlay" id="del">
										<a href="guru.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h2>Apakah anda ingin menghapus data ini?</h2>
													<div class="form">
														<form action="func/hapus-guru.php" method="post" class="input-form">
															<input type="hidden" name="id" value="<?= $g->id_guru ?>">
															<button name="del">Delete</button>
														</form>
														<form action="guru.php" method="post" class="cancel-form">
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
										<a href="guru.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Detail Guru</h1>
												</div>
											</div>
											<small class="text-muted"></small>
										</div>
									</div>
								</td>
							</tr>
							<?php } } else {?>
								<tr>
									<td colspan="5">Tidak Ada Data</td>
								</tr>
							<?php } ?>						
						</tbody>
					</table>
					<a href="#tambah" class="primary">+ Tambah Guru</a>
					<div class="overlay" id="tambah">
						<a href="guru.php" class="close"><span class="material-symbols-sharp">close</span></a>
						<div class="add-card">
							<div class="middle">
								<div class="left">
									<h1>Tambah Guru</h1>
									<div class="form">
									<form action="func/tambah-guru.php" method="post" class="input-form">
										<input type="text" name="guru" placeholder="Nama Guru" autocomplete="off">
										<select name="mapel" required>
											<option value="">--pilih mapel--</option>
												<?php 
													$mapel = mysqli_query($conn, "SELECT * FROM tb_mapel ORDER BY id_mapel DESC");
													while ($m = mysqli_fetch_object($mapel)) {
						 						?>
													<option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?></option>
													<?php } ?>
										</select>
										<!-- <textarea name="desc"></textarea> -->
										<button name="save">Save</button>
									</form>
									<form action="guru.php" method="post" class="cancel-form">
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