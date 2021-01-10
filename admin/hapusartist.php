<?php

include 'koneksi.php';

$id_artist = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM song_artist WHERE id_artist = '$id_artist'");

mysqli_query($koneksi, "DELETE FROM artist WHERE id_artist = '$id_artist'");

echo "<script>alert('Nama artist dihapus!');</script>";
echo '<script type="text/javascript">location="index.php?halaman=artist"</script>';

?>