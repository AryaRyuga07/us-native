<?php 
require '../../../model/db.php';
error_reporting(0);

function tambah($data){
	global $conn;

	$jurusan =  htmlspecialchars($data["jurusan"]);

	$jrs = mysqli_query($conn, "SELECT * FROM tb_jurusan WHERE nama_jurusan = '$jurusan'");
	$j = mysqli_fetch_object($jrs);
	if ($j->nama_jurusan == $jurusan) {
		echo "<script>
			alert('Jurusan sudah ada');
			document.location.href = '../jurusan.php#tambah';
		</script>";
	} else {
		$query = "INSERT INTO tb_jurusan
				VALUES 
				('', '$jurusan')
				";
		mysqli_query($conn, "$query");
	}
	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Jurusan berhasil ditambahkan');
			document.location.href = '../jurusan.php';
		</script>";
	} else {
		"<script>
			alert('Jurusan gagal ditambahkan');
			document.location.href = '../jurusan.php#tambah';
		</script>";
	}
}

 ?>