<?php 
require '../../../model/db.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_guru WHERE id_guru = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Guru berhasil dihapus');
			document.location.href = '../guru.php';
		</script>";
} else {
		"<script>
			alert('Guru gagal dihapus');
			document.location.href = '../guru.php#hapus';
		</script>";
	}
}