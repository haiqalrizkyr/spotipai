<?php
	include 'koneksi.php';

	$id = $_GET['id'];

	$koneksi->query("DELETE FROM song_genre WHERE id_song_genre = '$id'");

	echo "<script>window.history.back();</script>";

?>