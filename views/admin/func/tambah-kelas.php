<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$tingkat =  htmlspecialchars($data["tingkat"]);
	$jurusan =  htmlspecialchars($data["jurusan"]);
	$urut =  htmlspecialchars($data["urut"]);
	$kelas = $tingkat." ".$jurusan." ". $urut;

	$kls = mysqli_query($conn, "SELECT * FROM tb_kelas WHERE kelas = '$kelas'");
	$k = mysqli_fetch_object($kls);
	if ($k->kelas == $kelas) {
		echo "<script>
			alert('Kelas sudah ada');
			document.location.href = '../kelas.php#tambah';
		</script>";
	} else {
		$query = "INSERT INTO tb_kelas
				VALUES 
				('','$kelas')
				";
		mysqli_query($conn, "$query");
	}
	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('kelas berhasil ditambahkan');
			document.location.href = '../kelas.php';
		</script>";
	} else {
		"<script>
			alert('Kelas gagal ditambahkan');
			document.location.href = '../kelas.php#tambah';
		</script>";
	}
}

 ?>