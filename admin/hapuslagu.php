<?php

	include 'koneksi.php';

	$id_song = $_GET['id_song'];

	$koneksi->query("DELETE FROM user_fav_song WHERE id_song = '$id_song'");

	$koneksi->query("DELETE FROM user_playlist_song WHERE id_song = '$id_song'");

	$koneksi->query("DELETE FROM song_genre WHERE id_song = '$id_song'");

	$koneksi->query("DELETE FROM song_artist WHERE id_song = '$id_song'");

	$koneksi->query("DELETE FROM song_album WHERE id_song = '$id_song'");

	$koneksi->query("DELETE FROM song WHERE id_song = '$id_song'");

	echo "<script>window.history.back()</script>";

?>