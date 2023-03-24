<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$soal =  htmlspecialchars($data["id"]);
	$guru =  htmlspecialchars($data["guru"]);
	$mapel =  htmlspecialchars($data["mapel"]);
	$waktu =  htmlspecialchars($data["waktu"]);

	$query = "INSERT INTO tb_headsoal
			VALUES 
			('$soal','$guru','$mapel','$waktu')
			";
	mysqli_query($conn, "$query");

	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Soal berhasil ditambahkan');
			document.location.href = '../soal.php';
		</script>";
	} else {
		"<script>
			alert('Soal gagal ditambahkan');
			document.location.href = '../soal.php#tambah';
		</script>";
	}
}

 ?>