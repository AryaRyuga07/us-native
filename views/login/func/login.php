<?php
require '../../../model/db.php';
$username = $_POST["user"];
$password = $_POST["pass"];
$result = mysqli_query($conn, "SELECT * FROM tb_login WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($result);
$login = mysqli_fetch_object($result);

if (isset($_POST["log"])) {
	if ($cek === 1) {
		if ($login->level == 'admin') {
			$_SESSION["login"] = true;
			header("Location: ../../admin/index.php");
			exit;
		} else if ($login->level == 'guru') {
			$_SESSION["login"] = true;
			header("Location: ../../guru/index.php");
			exit;
		} else if ($login->level == 'siswa') {
			$_SESSION["login"] = true;
			header("Location: ../../siswa/index.php");
			exit;
		}
	} else {
		echo '<script>alert("Username/Password Salah")</script>';
		echo '<script>window.location="../login.php"</script>';
	}
}