<?php 
require '../../../model/db.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_kelas WHERE id_kelas = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Kelas berhasil dihapus');
			document.location.href = '../kelas.php';
		</script>";
} else {
		"<script>
			alert('Kelas gagal dihapus');
			document.location.href = '../kelas.php#hapus';
		</script>";
	}
}