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
	<h1 style="color: white; margin-top: 70px;">Your Playlists</h1>
	<button type="button" data-bs-toggle="modal" data-bs-target="#addModal" style="padding: 10px; border-radius: 30px;" title="Add Playlist">
		<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
		</svg>
	</button>
	<br><br><br>
	<div style="color: white;">
		<h2>- <a href="fav_song.php">Your Favorite Song(s)</a></h2>
		<br>
		<?php
		$id_user = $_SESSION['user']['id_user'];

		$ambilplaylist = $koneksi->query("SELECT id_user_playlist, nama_playlist FROM user_playlist WHERE id_user = '$id_user'");
			while ($datapl = $ambilplaylist->fetch_assoc()){
				$banyaklagu = $koneksi->query("SELECT count(id_song) AS jumlah FROM user_playlist_song WHERE id_user_playlist = '$datapl[id_user_playlist]'")->fetch_assoc();
		?>
		<h2>- <a href="playlist_song.php?id=<?= $datapl['id_user_playlist'] ?>"><?= $datapl['nama_playlist'] ?></a> <?= number_format($banyaklagu['jumlah']); ?> song(s)</h2>
		<br>

		<?php } ?>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Enter your playlist's name</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST">
				<div class="modal-body">
					<table align="center">
						<tr>
							<td>
								<input name="nama_playlist" class="form-control" type="text" placeholder="Playlist's Name">
							</td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="simpan" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
if (isset($_POST['simpan'])) {
	$id_user = $_SESSION['user']['id_user'];
	$tanggal = date("d-m-Y");

	$addplaylist = "INSERT INTO user_playlist (id_user, nama_playlist, date_created) VALUES ('$id_user', '$_POST[nama_playlist]', '$tanggal')";

	$koneksi->query($addplaylist);

	$id_playlist = $koneksi->insert_id;

	echo "<script> alert('Playlist ditambahkan, tambahkan lagu ke playlist Anda!') </script>";
	echo "<script>location='add_song.php?id_playlist=" . $id_playlist . "';</script>";
}
?>