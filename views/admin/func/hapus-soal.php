<?php 
require '../../../model/db.php';
error_reporting(0);

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_headsoal WHERE id_soal = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Soal berhasil dihapus');
			document.location.href = '../soal.php';
		</script>";
} else {
		"<script>
			alert('Soal gagal dihapus');
			document.location.href = '../soal.php#hapus';
		</script>";
	}
}