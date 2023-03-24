<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$guru =  htmlspecialchars($data["guru"]);
	$mapel =  htmlspecialchars($data["mapel"]);

	$gr = mysqli_query($conn, "SELECT * FROM tb_guru WHERE nama_guru = '$guru'");
	$g = mysqli_fetch_object($gr);
	if ($g->nama_guru == $guru) {
		echo "<script>
			alert('Nama guru sudah ada');
			document.location.href = '../guru.php#tambah';
		</script>";
	} else {
		$query = "INSERT INTO tb_guru
				VALUES 
				('', '$mapel', '$guru')
				";
		mysqli_query($conn, "$query");
	}
	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Guru berhasil ditambahkan');
			document.location.href = '../guru.php';
		</script>";
	} else {
		"<script>
			alert('Guru gagal ditambahkan');
			document.location.href = '../guru.php#tambah';
		</script>";
	}
}

 ?>