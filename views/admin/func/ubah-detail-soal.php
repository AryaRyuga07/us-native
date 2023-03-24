<?php
require '../../../model/db.php';
error_reporting(0);
function ubah($data)
{
	global $conn;

	$id_soal =  htmlspecialchars($data["id_soal"]);
	$no =  htmlspecialchars($data["no"]);
	$soal =  htmlspecialchars($data["soal"]);
	$a =  htmlspecialchars($data["a"]);
	$b =  htmlspecialchars($data["b"]);
	$c =  htmlspecialchars($data["c"]);
	$d =  htmlspecialchars($data["d"]);
	$jawaban =  htmlspecialchars($data["jawaban"]);

	$query = "UPDATE tb_detail_soal SET
		id_soal = '$id_soal',
		soal = '$soal',
		a = '$a',
		b = '$b',
		c = '$c',
		d = '$d',
		jawaban = '$jawaban'
		WHERE id_soal = '$id_soal' AND no = '$no'
		";
	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}



if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Soal berhasil diubah');
		document.location.href = '../detail-soal.php';
		</script>";
} else {
		echo "<script>
		alert('Soal gagal diubah');
		document.location.href = '../detail-soal.php#edit';
		</script>";
	}
}