<?php
require '../../../model/db.php';
function ubah($data)
{
	global $conn;
	
	$id = $_POST['id'];
	$nisn =  htmlspecialchars($data["nisn"]);
	$siswa =  htmlspecialchars($data["siswa"]);
	$kelas =  htmlspecialchars($data["kelas"]);

	$query = "UPDATE tb_siswa SET
		nisn = '$nisn',
		nama_siswa = '$siswa',
		id_kelas = '$kelas'
		WHERE id_siswa = '$id'
		";

	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}




if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Siswa berhasil diubah');
		document.location.href = '../siswa.php';
		</script>";
} else {
		echo "<script>
		alert('Siswa gagal diubah');
		document.location.href = '../siswa.php#edit';
		</script>";
	}
}