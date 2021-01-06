<?php
	session_start();

	include 'koneksi.php';

	if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
        echo "<script>location='index.php';</script>";
    }

    $id_user = $_SESSION['user']['id_user'];

    $id_playlist = $_GET['id'];

    $takepl = $koneksi->query("SELECT nama_playlist, date_created FROM user_playlist WHERE id_user_playlist = '$id_playlist'")->fetch_assoc();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Spotipai - Web Music Player</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="style.css">
			<?php include 'script.html'?>
			<style type="text/css">
				a {
					text-decoration: none;
					color: inherit;
				}

				a:hover {
					text-decoration: underline;
					color: inherit;
				}
			</style>
	</head>
	<body style="background-color: #0e0e0d">
		<?php
		include 'header.php';
		include 'sidebar.php';
		?>
		<div class="content">
			<h1 style="color: white; margin-top: 70px;"><?= $takepl['nama_playlist'] ?></h1>
			<h3 style="color: white;">Created on <?= $takepl['date_created'] ?></h3>
			<a onclick="return confirm('Are you sure want to delete this playlist?')" href="playlist_delete_act.php?id=<?= $id_playlist ?>" class="btn btn-outline-danger" style="float: right; margin-right: 30px"
				>Delete
			</a>
			<a class="btn btn-primary" style="float: right; margin-right: 10px" href="add_song.php?id_playlist=<?= $id_playlist ?>">Edit</a>
			<br><br>	
			<div class="container">
				<table class="table table-dark table-hover table-borderless">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Artist</th>
							<th scope="col">Added on</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$query = $koneksi->query("SELECT s.id_song, s.title, ps.added_on FROM song s JOIN user_playlist_song ps ON s.id_song = ps.id_song WHERE ps.id_user_playlist = '$id_playlist'");

						while ($lagu = $query->fetch_assoc()) {
					?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><a href="play.php?id=<?= $lagu['id_song'] ?>"><?= $lagu['title'] ?></a></td>
							<td>
								<?php
									$queryartis = "SELECT a.id_artist, a.nama_artist FROM song s JOIN song_artist sa 
													ON s.id_song = sa.id_song AND s.id_song = '$lagu[id_song]' JOIN artist a 
													WHERE sa.id_artist = a.id_artist";

									$ambilartis = $koneksi->query($queryartis);

									while ($artis = $ambilartis->fetch_assoc()) {
								?>
									<a href="#?id_artist=<?= $artis['id_artist'] ?>"><?= $artis['nama_artist'] ?></a> <br>

								<?php } ?>
							</td>
							<td><?= $lagu['added_on'] ?></td>
						</tr>
					<?php
						$no++;
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>