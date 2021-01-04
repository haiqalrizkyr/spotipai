<?php
	session_start();

	include 'koneksi.php';

	$id_user_playlist = $_GET['id_pl'];
	$id_song = $_GET['id_song'];

	$koneksi->query("INSERT INTO user_playlist_song (id_user_playlist, id_song) VALUES ('$id_user_playlist', '$id_song')");

	echo "<script> alert('Song added!') </script>";
    echo "<script>window.history.back();</script>";
	
?>