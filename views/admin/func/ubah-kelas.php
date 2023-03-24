<?php
require '../../../model/db.php';
function ubah($data)
{
	global $conn;
	
	$id = $_POST['id'];
	$tingkat =  htmlspecialchars($data["tingkat"]);
	$jurusan =  htmlspecialchars($data["jurusan"]);
	$urut =  htmlspecialchars($data["urut"]);
	$kelas = $tingkat." ".$jurusan." ". $urut;

	$query = "UPDATE tb_kelas SET
		kelas = '$kelas'
		WHERE id_kelas = '$id'
		";

	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}




if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Kelas berhasil diubah');
		document.location.href = '../kelas.php';
		</script>";
} else {
		echo "<script>
		alert('kelas gagal diubah');
		document.location.href = '../kelas.php#edit';
		</script>";
	}
}