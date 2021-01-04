<?php
	session_start();

	include 'koneksi.php';

	$id_playlist = $_GET['id'];

	$koneksi->query("DELETE FROM user_playlist_song WHERE id_user_playlist = '$id_playlist'");

	$koneksi->query("DELETE FROM user_playlist WHERE id_user_playlist = '$id_playlist'");

	echo "<script> alert('Playlist deleted!') </script>";
    echo "<script>location='playlists.php';</script>";

?>