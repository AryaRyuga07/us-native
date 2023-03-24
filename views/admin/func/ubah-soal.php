<?php
require '../../../model/db.php';
error_reporting(0);
function ubah($data)
{
	global $conn;

	$soal =  htmlspecialchars($data["id"]);
	$guru =  htmlspecialchars($data["guru"]);
	$mapel =  htmlspecialchars($data["mapel"]);
	$waktu =  htmlspecialchars($data["waktu"]);

	$query = "UPDATE tb_headsoal SET
		id_soal = '$soal',
		id_guru = '$guru',
		id_mapel = '$mapel',
		waktu = '$waktu'
		WHERE id_soal = '$soal'
		";
	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}



if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Soal berhasil diubah');
		document.location.href = '../soal.php';
		</script>";
} else {
		echo "<script>
		alert('Soal gagal diubah');
		document.location.href = '../soal.php#edit';
		</script>";
	}
}