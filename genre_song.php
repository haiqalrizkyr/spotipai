<?php
	session_start();

	include 'koneksi.php';

	$id_genre = $_GET['id_genre'];

	$datagenre = $koneksi->query("SELECT nama_genre FROM genre WHERE id_genre = '$id_genre'")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Spotipai - Web Music Player</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="style.css">
			<?php include 'script.html'?>
	</head>
	<body style="background-color: #0e0e0d">
		<?php
		include 'header.php';
		include 'sidebar.php';
		?>
		<div class="content">
			<h1 style="color: white; margin-top: 70px;"><?= $datagenre['nama_genre'] ?></h1>
			<br>
			<div class="container">
				<table class="table table-dark table-hover table-borderless">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Title</th>
							<th scope="col">Artist</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						$query = $koneksi->query("SELECT s.id_song, s.title FROM song s JOIN song_genre sg ON s.id_song = sg.id_song WHERE sg.id_genre = '$id_genre'");

						while ($lagu = $query->fetch_assoc()) {
					?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td><a href="play.php?id=<?= $lagu['id_song'] ?>"><?= $lagu['title'] ?></a></td>
							<td>
								<?php
									$queryartis = "SELECT a.nama_artist FROM song s JOIN song_artist sa 
													ON s.id_song = sa.id_song AND s.id_song = '$lagu[id_song]' JOIN artist a 
													WHERE sa.id_artist = a.id_artist";

									$ambilartis = $koneksi->query($queryartis);

									while ($artis = $ambilartis->fetch_assoc()) {
								?>
									<?= $artis['nama_artist'] ?> <br>

								<?php } ?>
							</td>
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