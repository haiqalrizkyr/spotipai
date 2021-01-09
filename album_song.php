<?php
	session_start();

	include 'koneksi.php';

	$id_album = $_GET['id_album'];

	$dataalbum = $koneksi->query("SELECT al.title, al.year, a.nama_artist, a.id_artist FROM album al JOIN artist a ON al.id_artist = a.id_artist WHERE al.id_album = '$id_album'")->fetch_assoc();
	
	$query = $koneksi->query("SELECT s.id_song, s.title, s.played FROM song s JOIN song_album sa ON s.id_song = sa.id_song WHERE sa.id_album = '$id_album'");
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
			<h1 style="color: white; margin-top: 70px;"><?= $dataalbum['title'] ?> (<?= $dataalbum['year'] ?>)</h1>
			<h3 style="color: white;"><a href="about_artist.php?id_artist=<?= $dataalbum['id_artist'] ?>"><?= $dataalbum['nama_artist'] ?></a></h3>
			<p style="color: white;"><?= number_format($query->num_rows) ?> song(s) in this album</p>
			<br>
			<div class="container">
				<table class="table table-dark table-hover table-borderless">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Artist</th>
							<th style="text-align: center;">Played</th>
							<th style="text-align: center;">Favorited</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;

						while ($lagu = $query->fetch_assoc()) {

							$countfav = $koneksi->query("SELECT id_user_fav_song FROM user_fav_song WHERE id_song = '$lagu[id_song]'");
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
									<a href="about_artist.php?id_artist=<?= $artis['id_artist'] ?>"><?= $artis['nama_artist'] ?></a> <br>

								<?php } ?>
							</td>
							<td style="text-align: center;"><?= number_format($lagu['played']) ?></td>
							<td style="text-align: center;"><?= number_format($countfav->num_rows) ?></td>
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