<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$nisn =  htmlspecialchars($data["nisn"]);
	$siswa =  htmlspecialchars($data["siswa"]);
	$kelas =  htmlspecialchars($data["kelas"]);

	$sw = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE nama_siswa = '$siswa'");
	$s = mysqli_fetch_object($sw);
	if ($s->nama_siswa == $siswa) {
		echo "<script>
			alert('Siswa sudah ada');
			document.location.href = '../siswa.php#tambah';
		</script>";
	} else {
		$query = "INSERT INTO tb_siswa
				VALUES 
				('','$nisn', '$siswa','$kelas')
				";
		mysqli_query($conn, "$query");
	}
	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Jurusan berhasil ditambahkan');
			document.location.href = '../siswa.php';
		</script>";
	} else {
		"<script>
			alert('Jurusan gagal ditambahkan');
			document.location.href = '../siswa.php#tambah';
		</script>";
	}
}

 ?>