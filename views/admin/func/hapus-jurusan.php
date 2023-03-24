<?php 
require '../../../model/db.php';

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_jurusan WHERE id_jurusan = $id");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id'];
if (isset($_POST['del'])) {
if (hapus($id) > 0) {
	echo "<script>
			alert('Jurusan berhasil dihapus');
			document.location.href = '../jurusan.php';
		</script>";
} else {
		"<script>
			alert('Jurusan gagal dihapus');
			document.location.href = '../jurusan.php#hapus';
		</script>";
	}
}