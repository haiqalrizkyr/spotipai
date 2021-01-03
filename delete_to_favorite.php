<?php
	session_start();

	include 'koneksi.php';

	$id_fav = $_GET['id'];

	$query = "DELETE FROM user_fav_song WHERE id_user_fav_song = '$id_fav'";
	
	$koneksi->query($query);

	echo "<script> alert('Song removes from favorites!') </script>";
    echo "<script>window.history.back();</script>";

?>