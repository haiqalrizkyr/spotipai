<?php
	session_start();

	include 'koneksi.php';

	$keyword = $_POST['key'];
						
	$querycari = "SELECT s.id_song, s.title, s.played, al.id_album, al.title AS jalbum, al.year FROM song s 
					LEFT JOIN song_artist sa ON s.id_song = sa.id_song 
					LEFT JOIN artist a ON sa.id_artist = a.id_artist 
					LEFT JOIN song_album sal ON s.id_song = sal.id_song 
					LEFT JOIN album al ON sal.id_album = al.id_album 
					WHERE s.title LIKE '%$keyword%' OR a.nama_artist LIKE '%$keyword%' OR al.title LIKE '%$keyword%' GROUP BY s.id_song";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spotipai - Web Music Player</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'script.html' ?>
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
		<h2 style="color: white; margin-top: 70px">Search result for '<?= $keyword ?>'</h2>
		<br>
		<div class="container">
		<?php


		$ambildata = $koneksi->query($querycari);

		if ($ambildata->num_rows == 0) {
			echo "<h1 style='color: white;'><p>Song not found</p></h1>";
		}

		else{
		?>
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

						while ($datalagu = $ambildata->fetch_assoc()) {

							$countfav = $koneksi->query("SELECT id_user_fav_song FROM user_fav_song WHERE id_song = '$datalagu[id_song]'");
					?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><a href="play.php?id=<?= $datalagu['id_song'] ?>"><?= $datalagu['title'] ?></a></td>
						<td>
							<?php 
								if ($datalagu['id_album'] == NULL ) {echo "Single";} 
								else {echo "<a href='album_song.php?id_album=".$datalagu['id_album']."'>".$datalagu['jalbum']." (".$datalagu['year'].")</a>";} 
							?>
						</td>
						<td>
							<?php
								$queryartis = "SELECT a.id_artist, a.nama_artist FROM song s JOIN song_artist sa 
												ON s.id_song = sa.id_song AND s.id_song = '$datalagu[id_song]' JOIN artist a 
												WHERE sa.id_artist = a.id_artist";

								$ambilartis = $koneksi->query($queryartis);

								while ($artis = $ambilartis->fetch_assoc()) {
							?>
								<a href="about_artist.php?id_artist=<?= $artis['id_artist'] ?>"><?= $artis['nama_artist'] ?></a> <br>

							<?php } ?>
						</td>
						<td style="text-align: center;"><?= number_format($datalagu['played']) ?></td>
						<td style="text-align: center;"><?= number_format($countfav->num_rows) ?></td>
					</tr>
					<?php
								$no++;
							}
					?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</body>
</html>