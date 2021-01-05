<?php

include 'koneksi.php';

$id = $_GET['id_genre'];

mysqli_query($koneksi, "DELETE FROM song_genre WHERE id_genre = '$id'");

mysqli_query($koneksi, "DELETE FROM genre WHERE id_genre = '$id'");

echo "<script>alert('Genre dihapus!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=genre"</script>';

?>