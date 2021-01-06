<?php
	session_start();

	include 'koneksi.php';

	$id_genre = $_GET['id_genre'];

	$datagenre = $koneksi->query("SELECT nama_genre FROM genre WHERE id_genre = '$id_genre'")->fetch_assoc();

	$query = $koneksi->query("SELECT s.id_song, s.title, s.played, al.id_album, al.title AS jalbum, al.year FROM song s JOIN song_genre sg ON s.id_song = sg.id_song LEFT JOIN song_album sal ON s.id_song = sal.id_song LEFT JOIN album al ON sal.id_album = al.id_album WHERE sg.id_genre = '$id_genre'");
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
			<h1 style="color: white; margin-top: 70px;"><?= $datagenre['nama_genre'] ?></h1>
			<p style="color: white;"><?= number_format($query->num_rows) ?> Song(s) in this genre</p>
			<br>
			<div class="container">
				<table class="table table-dark table-hover table-borderless">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Album</th>
							<th scope="col">Artist</th>
							<th style="text-align: center;" scope="col">Played</th>
							<th style="text-align: center;" scope="col">Favorited</th>
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
							<td><?php if ($lagu['id_album'] == NULL ) {echo "Single";} else {echo "<a href='album_song.php?id_album=".$lagu['id_album']."'>".$lagu['jalbum']." (".$lagu['year'].")</a>";} ?></td>
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