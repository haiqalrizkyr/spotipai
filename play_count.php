<?php
	include 'koneksi.php';

	$id_song = $_GET['id'];

	$koneksi->query("UPDATE song SET played = played+1 WHERE id_song = '$id_song'");
?>