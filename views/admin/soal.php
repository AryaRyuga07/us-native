<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyExam | Soal</title>
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
				<a href="mapel.php" class="off">
					<span class="material-symbols-sharp">menu_book</span>
					<h3>Mata Pelajaran</h3>
				</a>
				<a href="soal.php" class="active">
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
			<h1>Soal</h1>

			<div class="recent-orders">
					<h2>Daftar Soal</h2>
					<table>
						<thead>
							<tr>
								<th>ID Soal</th>
								<th>ID Guru</th>
								<th>Waktu</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								require '../../model/db.php'; 
								// error_reporting(0);
								$soal = mysqli_query($conn, "SELECT * FROM tb_headsoal ORDER BY id_soal DESC");
								if (mysqli_num_rows($soal) > 0) {
								while ($s = mysqli_fetch_object($soal)) {
							?>
							<tr>
								<td><?= $s->id_soal ?></td>
								<td><?= $s->id_guru ?></td>
								<td><?= $s->waktu ?></td>
								<td>
									<a href="soal.php?id=<?= $s->id_soal ?>#edit" class="primary">Edit</a>
									<div class="overlay" id="edit">
										<a href="soal.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Edit Soal</h1>
													<div class="form">
														<form action="func/ubah-soal.php" method="post" class="input-form">
															<?php 
																$id = $_GET['id'];
																$s_sl = mysqli_query($conn, "SELECT * FROM tb_headsoal WHERE id_soal = '$id'");
																$sl = mysqli_fetch_object($s_sl);
															?>
															<input type="text" name="id" value="<?= $sl->id_soal ?>" placeholder="ID Soal">
															<select name="guru" required>
															<option value="">--pilih guru--</option>
																<?php 
																	$guru = mysqli_query($conn, "SELECT * FROM tb_guru ORDER BY id_guru DESC");
																	while ($g = mysqli_fetch_object($guru)) {
						 										?>
															<option value="<?= $g->id_guru ?>" <?= ($sl->id_guru == $g->id_guru)? 'selected':''; ?>><?= $g->nama_guru ?></option>
															<?php } ?>
															</select>
															<select name="mapel" required>
															<option value="">--pilih mapel--</option>
																<?php 
																	$mapel = mysqli_query($conn, "SELECT * FROM tb_mapel ORDER BY id_mapel DESC");
																	while ($m = mysqli_fetch_object($mapel)) {
						 										?>
															<option value="<?= $m->id_mapel ?>" <?= ($sl->id_mapel == $m->id_mapel)? 'selected':''; ?>><?= $m->nama_mapel ?></option>
															<?php } ?>
															</select>
															<input type="text" name="waktu" placeholder="Masukkan Waktu" value="<?= $sl->waktu ?>" autocomplete="off">
															<button name="edit">Save</button>
														</form>
														<form action="soal.php" method="post" class="cancel-form">
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
								<a href="soal.php?id=<?= $s->id_soal ?>#del" class="danger">
									Delete
								</a>
									<div class="overlay" id="del">
										<a href="soal.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h2>Apakah anda ingin menghapus data ini?</h2>
													<div class="form">
														<form action="func/hapus-soal.php" method="post" class="input-form">
															<input type="hidden" name="id" value="<?= $s->id_soal ?>">
															<button name="del">Delete</button>
														</form>
														<form action="soal.php" method="post" class="cancel-form">
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
										<a href="soal.php" class="close"><span class="material-symbols-sharp">close</span></a>
										<div class="add-card">
											<div class="middle">
												<div class="left">
													<h1>Detail Soal</h1>
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
					<a href="#tambah" class="primary">+ Tambah soal</a>
					<div class="overlay" id="tambah">
						<a href="soal.php" class="close"><span class="material-symbols-sharp">close</span></a>
						<div class="add-card">
							<div class="middle">
								<div class="left">
									<h1>Tambah soal</h1>
									<div class="form">
									<form action="func/tambah-soal.php" method="post" class="input-form">
										<input type="text" name="id" placeholder="ID Soal">
										<select name="guru" required>
											<option value="">--pilih guru--</option>
												<?php 
													$guru = mysqli_query($conn, "SELECT * FROM tb_guru ORDER BY id_guru DESC");
													while ($g = mysqli_fetch_object($guru)) {
						 						?>
													<option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
												<?php } ?>
										</select>
										<select name="mapel" required>
										<option value="">--pilih mapel--</option>
											<?php 
												$mapel = mysqli_query($conn, "SELECT * FROM tb_mapel ORDER BY id_mapel DESC");
												while ($m = mysqli_fetch_object($mapel)) {
						 					?>
										<option value="<?= $m->id_mapel ?>"><?= $m->nama_mapel ?></option>
										<?php } ?>
										</select>
										<input type="text" name="waktu" placeholder="Masukkan Waktu" autocomplete="off">
										<button name="save">Save</button>
									</form>
									<form action="soal.php" method="post" class="cancel-form">
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