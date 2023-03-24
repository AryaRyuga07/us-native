<?php
require '../../../model/db.php';
function ubah($data)
{
	global $conn;
	
	$id = $_POST['id'];
	$guru = htmlspecialchars($data["nama"]);
	$mapel = htmlspecialchars($data["mapel"]);
	$query = "UPDATE tb_guru SET
		id_mapel = $mapel,
		nama_guru = '$guru'
		WHERE id_guru = '$id'
		";
	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}




if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Guru berhasil diubah');
		document.location.href = '../guru.php';
		</script>";
} else {
		echo "<script>
		alert('Guru gagal diubah');
		document.location.href = '../guru.php#edit';
		</script>";
	}
}