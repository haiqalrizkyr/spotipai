<?php

include 'koneksi.php';

$nama_artist = $_POST['nama_artist'];

$data = mysqli_query($koneksi, "DELETE FROM artist WHERE nama_artist = '$nama_artist'");

echo "<script>alert('artist terhapus');</script>";
	// echo "<script>location='index.php?halaman=genre';</script>";

?>