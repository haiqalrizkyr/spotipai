<?php
	session_start();

	include 'koneksi.php';

	$keyword = $_POST['key'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spotipai - Web Music Player</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'script.html' ?>
</head>
<body style="background-color: #0e0e0d">
	<?php
	include 'header.php';
	include 'sidebar.php';
	?>
	<div class="content">
		<h2>Search result for '<?= $keyword ?>'</h2>
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
						$querycari = "SELECT s.id_song, s.title FROM song s 
										LEFT JOIN song_artist sa ON s.id_song = sa.id_song 
										LEFT JOIN artist a ON sa.id_artist = a.id_artist 
										LEFT JOIN song_album sal ON s.id_song = sal.id_song 
										LEFT JOIN album al ON sal.id_album = al.id_album 
										WHERE s.title LIKE '%$keyword%' OR a.nama_artist LIKE '%$keyword%' OR al.title LIKE '%$keyword%' GROUP BY s.id_song";

						$ambildata = $koneksi->query($querycari);

						if ($ambildata->num_rows == 0) {
							echo "<td></td>";
							echo "<td><p>Song not found</p></td>";
							echo "<td></td>";
						}
						else{
							while ($datalagu = $ambildata->fetch_assoc()) {
					?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><a href="play.php?id=<?= $datalagu['id_song'] ?>"><?= $datalagu['title'] ?></a></td>
						<td>
							<?php
								$queryartis = "SELECT a.nama_artist FROM song s JOIN song_artist sa 
												ON s.id_song = sa.id_song AND s.id_song = '$datalagu[id_song]' JOIN artist a 
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
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>