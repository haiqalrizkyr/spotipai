<?php
	session_start();

	include 'koneksi.php';

	$id_song = $_GET['id'];
	$id_user = $_SESSION['user']['id_user'];
	$tanggal = date("d-m-Y");

	$queryaddsong = "INSERT INTO user_fav_song (id_user, id_song, date_favorited) VALUES ('$id_user', '$id_song', '$tanggal')";

	$koneksi->query($queryaddsong);

	echo "<script> alert('Song added to favorites!') </script>";
    echo "<script>window.history.back();</script>";
?>