<?php
	session_start();

	include 'koneksi.php';

	$id_lagu = $_GET['id_lagupl'];

	$koneksi->query("DELETE FROM user_playlist_song WHERE id_user_playlist_song = '$id_lagu'");

	echo "<script> alert('Song removed!') </script>";
    echo "<script>window.history.back();</script>";

?>