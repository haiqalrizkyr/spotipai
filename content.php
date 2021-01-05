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
					<th scope="col">Artist</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$query = $koneksi->query("SELECT id_song, title FROM song ORDER BY rand() LIMIT 10");

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