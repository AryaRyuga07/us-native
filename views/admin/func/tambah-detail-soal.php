<?php 
require '../../../model/db.php';
// error_reporting(0);

function tambah($data){
	global $conn;

	$id_soal =  htmlspecialchars($data["id_soal"]);
	$no =  htmlspecialchars($data["no"]);
	$soal =  htmlspecialchars($data["soal"]);
	$a =  htmlspecialchars($data["a"]);
	$b =  htmlspecialchars($data["b"]);
	$c =  htmlspecialchars($data["c"]);
	$d =  htmlspecialchars($data["d"]);
	$jawaban =  htmlspecialchars($data["jawaban"]);

	$query = "INSERT INTO tb_detail_soal
			VALUES 
			('$id_soal','$no','$soal','$a','$b','$c','$d','$jawaban')
			";
	mysqli_query($conn, "$query");

	return mysqli_affected_rows($conn);
}

if (isset($_POST["save"])) {
	if (tambah($_POST) > 0) {
		echo "<script>
			alert('Soal berhasil ditambahkan');
			document.location.href = '../detail-soal.php';
		</script>";
	} else {
		"<script>
			alert('Soal gagal ditambahkan');
			document.location.href = '../detail-soal.php#tambah';
		</script>";
	}
}

 ?>