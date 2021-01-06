<?php
	session_start();

	include 'koneksi.php';

	if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
        echo "<script>location='index.php';</script>";
    }

    $id_user = $_SESSION['user']['id_user'];

	$query = $koneksi->query("SELECT s.id_song, s.title, fs.date_favorited FROM song s JOIN user_fav_song fs ON s.id_song = fs.id_song WHERE fs.id_user = '$id_user'");
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
			<h1 style="color: white; margin-top: 70px;">Your Favorite Song(s)</h1>
			<p style="color: white;"><?= number_format($query->num_rows) ?> song(s) in this list</p>
			<br>
			<div class="container">
				<table class="table table-dark table-hover table-borderless">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Artist</th>
							<th scope="col">Favorited on</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;

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
							<td><?= $lagu['date_favorited'] ?></td>
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