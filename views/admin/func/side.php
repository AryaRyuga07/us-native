<?php 
session_start();
require 'function.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}


$id = $_GET["id"];

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

if (hapus($id) > 0) {
	echo "<script>
			alert('data berhasil dihapus');
			document.location.href = 'index.php';
		</script>";
} else {
		"<script>
			alert('data gagal dihapus');
			document.location.href = 'index.php';
		</script>";
	}

 ?>