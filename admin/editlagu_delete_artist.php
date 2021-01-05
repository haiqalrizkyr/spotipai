<?php
	include 'koneksi.php';

	$id = $_GET['id'];

	$koneksi->query("DELETE FROM song_artist WHERE id_song_artist = '$id'");

	echo "<script>window.history.back();</script>";

?>