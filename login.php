<?php
	session_start();

	include 'koneksi.php';

	$cekakun = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$_POST[username]' AND password = '$_POST[sandi]'");

	$rowcount = $cekakun->num_rows;

	if ($rowcount == 1) {
		$dataakun = $cekakun->fetch_assoc();

		if ($dataakun['id_user_role'] == 1) {
			$_SESSION['admin'] = $dataakun;

			echo "<script> alert('Login berhasil! Selamat datang ".$dataakun['nama']."') </script>";
            echo "<script>location='admin/index.php';</script>";
		}
		else{
			$_SESSION['user'] = $dataakun;

			echo "<script> alert('Login berhasil! Selamat datang ".$dataakun['nama']."') </script>";
            echo "<script>location='index.php';</script>";
		}
	}
	else{
		echo "<script> alert('Login Gagal! Username atau Password salah.') </script>";
        echo "<script>location='index.php';</script>";
	}	

?>