<?php 
require '../../../model/db.php';
error_reporting(0);

function hapus($id, $no)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tb_detail_soal WHERE id_soal = $id AND no = $no");
	return mysqli_affected_rows($conn);
}


$id = $_POST['id_soal'];
$no = $_POST['no'];
if (isset($_POST['del'])) {
if (hapus($id, $no) > 0) {
	echo "<script>
			alert('Soal berhasil dihapus');
			document.location.href = '../detail-soal.php';
		</script>";
} else {
		"<script>
			alert('Soal gagal dihapus');
			document.location.href = '../detail-soal.php#hapus';
		</script>";
	}
}