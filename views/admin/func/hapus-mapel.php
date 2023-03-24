<?php 
require '../../../model/db.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_mapel WHERE id_mapel = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Mapel berhasil dihapus');
			document.location.href = '../mapel.php';
		</script>";
} else {
		"<script>
			alert('Mapel gagal dihapus');
			document.location.href = '../mapel.php#hapus';
		</script>";
	}
}