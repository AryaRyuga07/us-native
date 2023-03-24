<?php 
require '../../../model/db.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_siswa WHERE id_siswa = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Siswa berhasil dihapus');
			document.location.href = '../siswa.php';
		</script>";
} else {
		"<script>
			alert('Siswa gagal dihapus');
			document.location.href = '../siswa.php#hapus';
		</script>";
	}
}