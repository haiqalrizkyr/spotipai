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
<div class="content">
	<h1 style="color: white; margin-top: 70px;">For You</h1>
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
				$query = $koneksi->query("SELECT s.id_song, s.title AS jlagu, s.played, al.id_album, al.title AS jalbum, al.year FROM song s LEFT JOIN song_album sal ON s.id_song = sal.id_song LEFT JOIN album al ON sal.id_album = al.id_album ORDER BY rand() LIMIT 15");

				while ($lagu = $query->fetch_assoc()) {

					$countfav = $koneksi->query("SELECT id_user_fav_song FROM user_fav_song WHERE id_song = '$lagu[id_song]'");
				?>
					<tr>
						<th scope="row"><?= $no ?></th>
						<td><a href="play.php?id=<?= $lagu['id_song'] ?>"><?= $lagu['jlagu'] ?></a></td>
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