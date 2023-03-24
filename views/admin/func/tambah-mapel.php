<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$mapel =  htmlspecialchars($data["mapel"]);

	$mp = mysqli_query($conn, "SELECT * FROM tb_mapel WHERE nama_mapel = '$mapel'");
	$m = mysqli_fetch_object($mp);
	if ($m->nama_mapel == $mapel) {
		echo "<script>
			alert('mapel sudah ada');
			document.location.href = '../mapel.php#tambah';
		</script>";
	} else {
		$query = "INSERT INTO tb_mapel
			VALUES 
			('', '$mapel')
			";
		mysqli_query($conn, "$query");
	}
	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Mapel berhasil ditambahkan');
			document.location.href = '../mapel.php';
		</script>";
	} else {
		"<script>
			alert('Mapel gagal ditambahkan');
			document.location.href = '../mapel.php#tambah';
		</script>";
	}
}

 ?>