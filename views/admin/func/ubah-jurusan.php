<?php
require '../../../model/db.php';
function ubah($data)
{
	global $conn;
	
	$id = $_POST['id'];
	$jurusan = htmlspecialchars($data["jurusan"]);
	$query = "UPDATE tb_jurusan SET
		nama_jurusan = '$jurusan'
		WHERE id_jurusan = '$id'
		";
	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}




if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Jurusan berhasil diubah');
		document.location.href = '../jurusan.php';
		</script>";
} else {
		echo "<script>
		alert('Jurusan gagal diubah');
		document.location.href = '../jurusan.php#edit';
		</script>";
	}
}