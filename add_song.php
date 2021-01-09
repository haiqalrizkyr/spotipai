<?php
	session_start();

	include 'koneksi.php';

	if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        echo "<script> alert('Anda belum login. Silakan login terlebih dahulu!') </script>";
        echo "<script>location='index.php';</script>";
    }

    
    $id_playlist = $_GET['id_playlist'];

    $ambilplaylist = $koneksi->query("SELECT nama_playlist FROM user_playlist WHERE id_user_playlist = '$id_playlist'");

    $dataplaylist = $ambilplaylist->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Spotipai - Web Music Player</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
			<?php include 'script.html'?>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
			<script>
			    $(document).ready(function(){
			        $('#tabel-data').DataTable();
			    });
			</script>
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
	<h2 style="color: white; margin-top: 70px;">Add songs to your <strong><?= $dataplaylist['nama_playlist'] ?></strong> playlist</h2>
	<br><br>

	<p style="color:  white;">You can change your playlist's name here</p>
	<form method="post">
		<div style="width: 400px" class="col-sm-4 input-group mb-3">
		  <input type="text" class="form-control" placeholder="New Playlist's Name" aria-label="New Playlist's Name" name="new_name" aria-describedby="button-addon2">
		  <button class="btn btn-success" type="submit" name="ganti_nama" id="button-addon2">Change</button>
		</div>
	</form>
	<br><br>
	<div style="background-color: white;" class="container">
	<br><br>
		<table id="tabel-data" class="table table-light table-hover table-borderless">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Title</th>
					<th scope="col">Artist</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 1;
				$query = $koneksi->query("SELECT id_song, title FROM song ORDER BY title");

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
							<a href="about_artist.php?id_artist=<?= $artis['id_artist'] ?>"><?= $artis['nama_artist'] ?></a> <br>

						<?php } ?>
					</td>
					<td>
						<?php
							$ceklagu = $koneksi->query("SELECT id_user_playlist_song FROM user_playlist_song WHERE id_user_playlist = '$id_playlist' AND id_song = '$lagu[id_song]'");

							if ($ceklagu->num_rows == 0) {
						?>
					  <a class="btn btn-success" href="add_song_act.php?id_pl=<?= $id_playlist ?>&id_song=<?= $lagu['id_song'] ?>">Add to Playlist</a>
						<?php } else { $lagu_dipl = $ceklagu->fetch_assoc(); ?>
					  <a onclick="return confirm('Remove this song from your playlist?')" class="btn btn-outline-danger" href="del_song_act.php?id_lagupl=<?= $lagu_dipl['id_user_playlist_song'] ?>">Delete from Playlist</a>
						<?php } ?>
					</td>
				</tr>
			<?php
				$no++;
				}
			?>
			</tbody>
		</table>
 	<br><br>
	</div>
	<br><br>
	<a class="btn btn-lg btn-primary" style="float: right; margin-right: 30px" href="playlists.php">Finish</a>
</div>
	</body>
</html>

<?php
	if (isset($_POST['ganti_nama'])) {
 	  
 	  if(!empty($_POST['new_name'])){
		$nama_baru = $_POST['new_name'];

		$koneksi->query("UPDATE user_playlist SET nama_playlist = '$nama_baru' WHERE id_user_playlist = '$id_playlist'");

		echo "<script>alert('Playlist's name changed!');</script>";
	  }
	 echo "<script>location='add_song.php?id_playlist=".$id_playlist."';</script>";
	}
?>