<?php
require '../../../model/db.php';
function ubah($data)
{
	global $conn;
	
	$id = $_POST['id'];
	$mapel = htmlspecialchars($data["mapel"]);
	$query = "UPDATE tb_mapel SET
		nama_mapel = '$mapel'
		WHERE id_mapel = '$id'
		";
	mysqli_query($conn, "$query");
	return mysqli_affected_rows($conn);
}




if (isset($_POST["edit"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
		alert('Mapel berhasil diubah');
		document.location.href = '../mapel.php';
		</script>";
} else {
		echo "<script>
		alert('Mapel gagal diubah');
		document.location.href = '../mapel.php#edit';
		</script>";
	}
}