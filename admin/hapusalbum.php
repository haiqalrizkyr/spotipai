<?php

include 'koneksi.php';

$id_album = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM song_album WHERE id_album = '$id_album'");

mysqli_query($koneksi, "DELETE FROM album WHERE id_album = '$id_album'");

echo "<script>alert('Album dihapus!');</script>";
		echo '<script type="text/javascript">location="index.php?halaman=album"</script>';

?>