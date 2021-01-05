<?php

include 'koneksi.php';

$nama_genre = $_POST['nama_genre'];

$data = mysqli_query($koneksi, "DELETE FROM genre WHERE nama_genre = '$nama_genre'");

echo "<script>alert('jadwal terhapus');</script>";
	// echo "<script>location='index.php?halaman=genre';</script>";

?>